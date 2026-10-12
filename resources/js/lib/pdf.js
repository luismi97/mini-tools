/**
 * PDF helpers. pdf-lib (create/merge/split) and pdf.js (render pages) are
 * large, so they are imported dynamically and only downloaded when used.
 */
import { encodeImage } from './image';
import { t } from './i18n.js';

export const PDF_LIMITS = {
    maxFileSize: 100 * 1024 * 1024,
    maxFiles: 30,
    maxRenderPages: 200,
};

export const PAGE_SIZES = {
    a4: { label: 'A4', size: [595.28, 841.89] },
    letter: { label: 'US Letter', size: [612, 792] },
    fit: { label: 'Fit to image', size: null },
};

export const MARGINS = { none: 0, small: 18, large: 36 };

const ENCRYPTED_MESSAGE = 'This PDF is password-protected. Remove the password first, then try again.';

async function pdfLib() {
    return import('pdf-lib');
}

/** Load a PDF with pdf-lib, translating common failures into friendly messages. */
export async function loadPdf(file) {
    const { PDFDocument } = await pdfLib();
    const bytes = await file.arrayBuffer();
    try {
        return await PDFDocument.load(bytes, { updateMetadata: false });
    } catch (e) {
        if (/encrypt/i.test(e.message)) throw new Error(t(ENCRYPTED_MESSAGE));
        throw new Error(t('This file is not a valid PDF or it is damaged.'));
    }
}

export async function describePdf(file) {
    const doc = await loadPdf(file);
    const pages = doc.getPageCount();
    return `${pages} page${pages === 1 ? '' : 's'}`;
}

/** @param {File[]} files @returns {Promise<Uint8Array>} */
export async function mergePdfs(files) {
    const { PDFDocument } = await pdfLib();
    const merged = await PDFDocument.create();
    for (const file of files) {
        const doc = await loadPdf(file);
        const pages = await merged.copyPages(doc, doc.getPageIndices());
        pages.forEach((page) => merged.addPage(page));
    }
    return merged.save();
}

/**
 * Build one new PDF per group of 0-based page indexes.
 * @param {File} file
 * @param {number[][]} groups
 * @returns {Promise<Uint8Array[]>}
 */
export async function extractPdfPages(file, groups) {
    const { PDFDocument } = await pdfLib();
    const source = await loadPdf(file);
    const outputs = [];
    for (const indexes of groups) {
        const doc = await PDFDocument.create();
        const pages = await doc.copyPages(source, indexes);
        pages.forEach((page) => doc.addPage(page));
        outputs.push(await doc.save());
    }
    return outputs;
}

/**
 * Rotate and/or remove pages, keeping the rest in order.
 * @param {File} file
 * @param {Array<{index: number, rotation: number, keep: boolean}>} pages rotation is extra clockwise degrees (multiple of 90)
 * @returns {Promise<Uint8Array>}
 */
export async function editPdfPages(file, pages) {
    const { PDFDocument, degrees } = await pdfLib();
    const source = await loadPdf(file);
    const kept = pages.filter((p) => p.keep);
    if (kept.length === 0) throw new Error(t('Keep at least one page.'));

    const doc = await PDFDocument.create();
    const copied = await doc.copyPages(source, kept.map((p) => p.index));
    copied.forEach((page, i) => {
        const extra = ((kept[i].rotation % 360) + 360) % 360;
        if (extra) page.setRotation(degrees((page.getRotation().angle + extra) % 360));
        doc.addPage(page);
    });
    return doc.save();
}

/**
 * Images → one PDF. Every image is re-encoded through a canvas so EXIF
 * orientation is applied and WebP/PNG are supported.
 * @param {File[]} files
 * @param {{pageSize: keyof PAGE_SIZES, orientation: 'auto'|'portrait'|'landscape', margin: keyof MARGINS}} options
 */
export async function imagesToPdf(files, { pageSize = 'a4', orientation = 'auto', margin = 'small' }) {
    const { PDFDocument } = await pdfLib();
    const doc = await PDFDocument.create();
    const gap = MARGINS[margin] ?? 0;

    for (const file of files) {
        const { blob, width, height } = await encodeImage(file, { type: 'image/jpeg', quality: 92 });
        const image = await doc.embedJpg(await blob.arrayBuffer());

        let pageWidth;
        let pageHeight;
        if (PAGE_SIZES[pageSize].size === null) {
            // 1 px = 0.75 pt (96 dpi), so the PDF opens at the image's natural size.
            pageWidth = width * 0.75 + gap * 2;
            pageHeight = height * 0.75 + gap * 2;
        } else {
            [pageWidth, pageHeight] = PAGE_SIZES[pageSize].size;
            const landscape = orientation === 'landscape' || (orientation === 'auto' && width > height);
            if (landscape) [pageWidth, pageHeight] = [pageHeight, pageWidth];
        }

        const boxWidth = pageWidth - gap * 2;
        const boxHeight = pageHeight - gap * 2;
        const scale = Math.min(boxWidth / width, boxHeight / height);
        const drawWidth = width * scale;
        const drawHeight = height * scale;

        const page = doc.addPage([pageWidth, pageHeight]);
        page.drawImage(image, {
            x: (pageWidth - drawWidth) / 2,
            y: (pageHeight - drawHeight) / 2,
            width: drawWidth,
            height: drawHeight,
        });
    }
    return doc.save();
}

/* ------------------------------------------------------------- pdf.js */

let pdfjsPromise = null;

async function pdfjs() {
    pdfjsPromise ??= Promise.all([
        import('pdfjs-dist'),
        import('pdfjs-dist/build/pdf.worker.min.mjs?url'),
    ]).then(([lib, worker]) => {
        lib.GlobalWorkerOptions.workerSrc = worker.default;
        return lib;
    });
    return pdfjsPromise;
}

/** Open a PDF for rendering. */
export async function openPdfForRender(file) {
    const lib = await pdfjs();
    try {
        return await lib.getDocument({ data: new Uint8Array(await file.arrayBuffer()) }).promise;
    } catch (e) {
        if (e?.name === 'PasswordException') throw new Error(t(ENCRYPTED_MESSAGE));
        throw new Error(t('This file is not a valid PDF or it is damaged.'));
    }
}

/**
 * Render one page (1-based) to an image blob.
 * @param {object} doc pdf.js document
 * @param {number} pageNumber
 * @param {{dpi: number, type: string, quality: number}} options
 */
export async function renderPdfPage(doc, pageNumber, { dpi = 150, type = 'image/jpeg', quality = 90 }) {
    const page = await doc.getPage(pageNumber);
    const viewport = page.getViewport({ scale: dpi / 72 });
    const canvas = document.createElement('canvas');
    canvas.width = Math.floor(viewport.width);
    canvas.height = Math.floor(viewport.height);
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    await page.render({ canvas, canvasContext: ctx, viewport }).promise;
    const blob = await new Promise((resolve) => canvas.toBlob(resolve, type, quality / 100));
    const result = { blob, width: canvas.width, height: canvas.height };
    canvas.width = canvas.height = 0;
    page.cleanup();
    return result;
}
