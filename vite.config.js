import { defineConfig } from 'vite';
import { svelte } from '@sveltejs/vite-plugin-svelte';
import laravel from 'laravel-vite-plugin';

const host = '0.0.0.0';

export default defineConfig({
    plugins: [
        svelte(),
        laravel.default({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
    server: {
        host,
        hmr: { host },
    }
});
