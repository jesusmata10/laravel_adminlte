import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fortawesome from '@fortawesome/fontawesome-free';

export default defineConfig({
    server: {
        origin: 'http://adminlte',
    },
    plugins: [
        // add css and js file
        
        laravel({
            input: ['resources/css/app.css', 'resources/css/login.css', 'resources/js/app.js'],
            refresh: true,
        }),
        
        // auto refresh blade files
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        },
        
    ],
    resolve: {
        alias: {
            '$':  'jQuery', 
            
        },
    },
});
