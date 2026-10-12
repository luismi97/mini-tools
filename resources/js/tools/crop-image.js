import { EXTENSIONS, LIMITS, encodeImage, normalizeType, renameWithExtension, validateImageFile } from '../lib/image';
import { centeredRect, clampRect, dragRect } from '../lib/resize';
import { track } from '../lib/analytics';
import { downloadBlob, formatBytes } from '../lib/utils';
import { t } from '../lib/i18n';

const ACCEPT = ['image/jpeg', 'image/png', 'image/webp'];

export const RATIOS = {
    free: { label: 'Free', value: null },
    '1:1': { label: '1:1', value: 1 },
    '4:3': { label: '4:3', value: 4 / 3 },
    '3:2': { label: '3:2', value: 3 / 2 },
    '16:9': { label: '16:9', value: 16 / 9 },
    '9:16': { label: '9:16', value: 9 / 16 },
    '4:5': { label: '4:5', value: 4 / 5 },
};

document.addEventListener('alpine:init', () => {
    window.Alpine.data('cropImage', () => ({
        file: null,
        url: '',
        name: '',
        inputType: '',
        natural: { width: 0, height: 0 },
        rect: { x: 0, y: 0, width: 0, height: 0 },
        ratio: 'free',
        format: 'original',
        quality: 92,
        dragging: false,
        error: '',
        busy: false,
        result: null, // { size, width, height }
        ratios: RATIOS,
        drag: null,

        onDrop(event) {
            this.dragging = false;
            this.load(event.dataTransfer.files[0]);
        },

        onPick(event) {
            this.load(event.target.files[0]);
            event.target.value = '';
        },

        init() {
            window.addEventListener('paste', (event) => {
                const file = event.clipboardData?.files?.[0];
                if (file) this.load(file);
            });
            this.$watch('ratio', () => this.applyRatio());
        },

        load(file) {
            if (!file) return;
            this.error = validateImageFile(file, ACCEPT) ?? '';
            if (this.error) return;
            if (this.url) URL.revokeObjectURL(this.url);
            this.file = file;
            this.name = file.name;
            this.inputType = normalizeType(file);
            this.url = URL.createObjectURL(file);
            this.result = null;
            track('file_upload', { count: 1 });
        },

        onImageLoad(event) {
            const img = event.target;
            if (img.naturalWidth * img.naturalHeight > LIMITS.maxPixels) {
                this.error = t('Image dimensions are too large to process in the browser.');
                this.reset();
                return;
            }
            this.natural = { width: img.naturalWidth, height: img.naturalHeight };
            this.applyRatio();
        },

        applyRatio() {
            if (!this.natural.width) return;
            const ratio = RATIOS[this.ratio].value;
            // Start with a centered selection covering 80% of the image (or the largest fitting ratio box).
            const base = centeredRect(this.natural.width, this.natural.height, ratio);
            const shrink = ratio ? 0.9 : 0.8;
            const width = base.width * shrink;
            const height = base.height * shrink;
            this.rect = clampRect(
                { x: (this.natural.width - width) / 2, y: (this.natural.height - height) / 2, width, height },
                this.natural.width,
                this.natural.height,
            );
        },

        boxStyle() {
            const { width, height } = this.natural;
            if (!width) return '';
            const r = this.rect;
            return `left:${(r.x / width) * 100}%;top:${(r.y / height) * 100}%;width:${(r.width / width) * 100}%;height:${(r.height / height) * 100}%`;
        },

        startDrag(event, mode) {
            event.preventDefault();
            const bounds = this.$refs.stage.getBoundingClientRect();
            this.drag = {
                mode,
                startX: event.clientX,
                startY: event.clientY,
                start: { ...this.rect },
                scale: this.natural.width / bounds.width,
            };
            const move = (e) => this.onDrag(e);
            const up = () => {
                window.removeEventListener('pointermove', move);
                window.removeEventListener('pointerup', up);
                this.drag = null;
            };
            window.addEventListener('pointermove', move);
            window.addEventListener('pointerup', up);
        },

        onDrag(event) {
            if (!this.drag) return;
            const { mode, startX, startY, start, scale } = this.drag;
            this.rect = dragRect(
                start,
                mode,
                (event.clientX - startX) * scale,
                (event.clientY - startY) * scale,
                this.natural.width,
                this.natural.height,
                RATIOS[this.ratio].value,
            );
            this.result = null;
        },

        nudge(event) {
            const step = event.shiftKey ? 10 : 1;
            const delta = { ArrowLeft: [-step, 0], ArrowRight: [step, 0], ArrowUp: [0, -step], ArrowDown: [0, step] }[event.key];
            if (!delta) return;
            event.preventDefault();
            this.rect = clampRect({ ...this.rect, x: this.rect.x + delta[0], y: this.rect.y + delta[1] }, this.natural.width, this.natural.height);
        },

        setField(field, value) {
            const next = { ...this.rect, [field]: Number(value) || 0 };
            const ratio = RATIOS[this.ratio].value;
            if (ratio && field === 'width') next.height = next.width / ratio;
            if (ratio && field === 'height') next.width = next.height * ratio;
            this.rect = clampRect(next, this.natural.width, this.natural.height);
        },

        outputType() {
            return this.format === 'original' ? this.inputType : this.format;
        },

        async crop() {
            if (!this.file || this.busy) return;
            this.busy = true;
            this.error = '';
            try {
                const type = this.outputType();
                const { blob, width, height } = await encodeImage(this.file, { type, quality: Number(this.quality), crop: { ...this.rect } });
                downloadBlob(blob, renameWithExtension(this.name.replace(/(\.\w+)?$/, '-cropped$1'), type));
                this.result = { size: formatBytes(blob.size), width, height, ext: EXTENSIONS[type] };
                track('tool_result', { ratio: this.ratio, format: EXTENSIONS[type] });
                track('file_download', { count: 1, format: EXTENSIONS[type] });
            } catch (e) {
                this.error = e.message || t('Could not crop this image.');
            } finally {
                this.busy = false;
            }
        },

        reset() {
            if (this.url) URL.revokeObjectURL(this.url);
            Object.assign(this, { file: null, url: '', name: '', natural: { width: 0, height: 0 }, result: null });
        },
    }));
});
