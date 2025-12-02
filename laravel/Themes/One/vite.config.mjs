import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

export default defineConfig({
    build: {
        outDir: path.resolve(__dirname, 'public'),
        emptyOutDir: false,
        manifest: 'manifest.json',
        //rollupOptions: {
        //    output: {
        //        entryFileNames: 'assets/[name].js',
        //        chunkFileNames: 'assets/[name].js',
        //        assetFileNames: 'assets/[name].[ext]'
        //    }
        //}
    },
    ssr: {
        noExternal: ['chart.js/**']
    },
    plugins: [
        laravel({
            publicDirectory: '../../../public_html/',
            input: [
                path.resolve(__dirname, 'resources/css/app.css'),
                path.resolve(__dirname, 'resources/js/app.js'),
            ],
            refresh: true,
        }),
        //tailwindcss(),
    ],
    server: {
        cors: true,
    },
});
