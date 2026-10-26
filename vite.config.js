import { cpSync, existsSync, readdirSync, readFileSync } from 'node:fs';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

// Every file in resources/js/tools is its own entry, loaded only by that tool's page.
const toolsDir = 'resources/js/tools';
const toolEntries = existsSync(toolsDir)
    ? readdirSync(toolsDir)
          .filter((file) => file.endsWith('.js'))
          .map((file) => `${toolsDir}/${file}`)
    : [];

// pdf.js needs its standard fonts, CMaps, ICC profiles and wasm image decoders (JPX/JBIG2 in
// scanned PDFs) at runtime, or text and scans render blank. They are copied next to the build
// in a versioned folder (cacheable forever) and passed to getDocument() via __PDFJS_ASSETS__.
const pdfjsVersion = JSON.parse(readFileSync('node_modules/pdfjs-dist/package.json', 'utf8')).version;
const pdfjsDir = `pdfjs-${pdfjsVersion}`;
const pdfjsAssets = () => ({
    name: 'pdfjs-assets',
    writeBundle(options) {
        for (const folder of ['cmaps', 'standard_fonts', 'iccs', 'wasm']) {
            cpSync(`node_modules/pdfjs-dist/${folder}`, `${options.dir}/${pdfjsDir}/${folder}`, { recursive: true });
        }
    },
    configureServer() {
        // Dev server: Laravel serves public/, so copy the assets there once.
        for (const folder of ['cmaps', 'standard_fonts', 'iccs', 'wasm']) {
            cpSync(`node_modules/pdfjs-dist/${folder}`, `public/build/${pdfjsDir}/${folder}`, { recursive: true });
        }
    },
});

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', ...toolEntries],
            refresh: true,
        }),
        tailwindcss(),
        pdfjsAssets(),
    ],
    define: {
        __PDFJS_ASSETS__: JSON.stringify(`/build/${pdfjsDir}/`),
    },
    build: {
        rollupOptions: {
            output: {
                // The pdf.js worker ships as .mjs, which some servers (Cloudways' nginx) send as
                // application/octet-stream; browsers then refuse to run it as a module worker.
                assetFileNames: (asset) => (asset.names?.[0] ?? asset.name ?? '').endsWith('.mjs')
                    ? 'assets/[name]-[hash].js'
                    : 'assets/[name]-[hash][extname]',
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
