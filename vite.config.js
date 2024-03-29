import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/table.scss',
                'resources/sass/body.scss',
                'resources/sass/nav.scss',
                'resources/sass/pagination.scss',
                'resources/sass/form.scss',
                'resources/sass/edit.scss',
                'resources/sass/appointment.scss',
            ],
            refresh: true,
        }),
    ],
});
