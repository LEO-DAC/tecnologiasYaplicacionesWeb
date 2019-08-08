let mix = require('laravel-mix');

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
/*
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

*/


/*mix.styles([
         'resources/plantilla/assets/vendors/css/base/bootstrap.min.css',
       'resources/plantilla/assets/vendors/css/base/elisyam-1.5.min.css',
       'resources/plantilla/assets/css/animate/animate.min.css',
       'resources/plantilla/assets/css/owl-carousel/owl.carousel.min.css',
       'resources/plantilla/assets/css/owl-carousel/owl.theme.min.css',
], 'public/css/plantilla.css')
 
 .scripts([
        'resources/plantilla/assets/vendors/js/base/jquery.min.js',
        'resources/plantilla/assets/vendors/js/base/core.min.js',
        'resources/plantilla/assets/vendors/js/nicescroll/nicescroll.min.js',
        'resources/plantilla/assets/vendors/js/chart/chart.min.js',
        'resources/plantilla/assets/vendors/js/progress/circle-progress.min.js',
        'resources/plantilla/assets/vendors/js/calendar/moment.min.js',
        'resources/plantilla/assets/vendors/js/calendar/fullcalendar.min.js',
        'resources/plantilla/assets/vendors/js/owl-carousel/owl.carousel.min.js',
        'resources/plantilla/assets/vendors/js/app/app.js',
        'resources/plantilla/assets/js/components/tabs/animated-tabs.min.js',
        'resources/plantilla/assets/js/dashboard/db-default.js',
], 'public/js/plantilla.js')*/
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
 
 