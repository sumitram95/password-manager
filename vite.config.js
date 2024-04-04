import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
            'resources/css/style.css',
            'resources/css/svg.scss',
            'resources/js/app.js',
            'resources/css/style.css',
        ],
            refresh: true,
        }),
    ],
});
