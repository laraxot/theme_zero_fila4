import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'

export default defineConfig({
    build: {
        //outDir: '../../../public_html/build',
        outDir: './Resources/dist',
        emptyOutDir: false,
        manifest: true,
        /*rollupOptions: {
			output: {
				entryFileNames: `assets/[name].js`,
				chunkFileNames: `assets/[name].js`,
				assetFileNames: `assets/[name].[ext]`
			}
		}*/
    },
    plugins: [
        laravel({
            publicDirectory: '../../../public_html',
            buildDirectory: 'assets/quaeris',
            //buildDirectory: 'build-mymodule',
            input: [
                //__dirname + '/Resources/assets/sass/app.scss',
                __dirname + '/Resources/assets/css/app.css',
                __dirname + '/Resources/assets/js/app.js'
                //-- registriamo globalmente dal modulo chart
                //__dirname + '/Resources/assets/js/filament-chart-js-plugins'
            ],
            //...refreshPaths,
            //refresh: true,
        }),
    ],
});

//export const paths = [
//    'Modules/Quaeris/Resources/assets/sass/app.scss',
//    'Modules/Quaeris/Resources/assets/js/app.js',
//];