const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


mix.styles([
    'resources/assets/css/sb-admin-2.css',
    'resources/assets/css/font-awesome/font-awesome.css',
    'resources/assets/css/style.default.css'

], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/jquery/jquery.js',
    'resources/assets/js/jquery/jquery.easing.js',
    'resources/assets/js/bootstrap/bootstrap.bundle.js',
    'resources/assets/js/sb-admin-2.js',

], 'public/js/libs.js');