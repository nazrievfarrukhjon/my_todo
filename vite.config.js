import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/images/app.images', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
