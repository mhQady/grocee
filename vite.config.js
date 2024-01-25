import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/apps/WebsiteApp/app.js',
                'resources/apps/DashboardApp/app.js'
            ],
            refresh: true,
        }),
        vue()
    ],
    resolve: {
        alias: {
            '@': '/resources/apps',
            '@img': '/resources/apps/images',
            '@service': '/resources/apps/services',
            '@store': '/resources/apps/store',
            '@model': '/resources/apps/models',
            '@plugins': '/resources/apps/plugins',
            '@lang': '/resources/apps/lang',
            '@api': '/resources/apps/api',
            '@compo': '/resources/apps/composables',
            '@web': '/resources/apps/WebsiteApp',
            '@dash': '/resources/apps/DashboardApp',
        }
    },
});
