const mix = require("laravel-mix");

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application.
|
*/

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/site.jsx", "public/js")
    .react()
    .sass("resources/sass/app.scss", "public/css")
    .sourceMaps();
