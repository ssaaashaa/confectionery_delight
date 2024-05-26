// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';
//
// export default defineConfig({
//     plugins: [
//         laravel({
//             input: ['resources/css/app.css', 'resources/js/app.js'],
//             refresh: true,
//         }),
//     ],
// });
const mix = require('laravel-mix')

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/product.js', 'public/js')
    .js('resources/js/cart.js', 'public/js')
    .js('resources/js/category.js', 'public/js')
    .js('resources/js/cake.js', 'public/js')
    .js('resources/js/bento.js', 'public/js')
    .js('resources/js/account.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/menu.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/admin.css', 'public/css')

