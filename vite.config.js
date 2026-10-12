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
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
