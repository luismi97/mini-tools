import { existsSync, readdirSync } from 'node:fs';
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

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', ...toolEntries],
            refresh: true,
        }),
        tailwindcss(),
    ],
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
