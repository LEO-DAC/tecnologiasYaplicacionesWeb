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
/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/



mix.styles([
    'resources/plantilla/assets/vendors/js/base/jquery.min.css',
    'resources/plantilla/assets/vendors/js/base/jquery.ui.min.css',
    'resources/plantilla/css/bootstrap-select/bootstrap-select.css',
    'resources/plantilla/css/bootstrap-select/bootstrap-select.min.css',
    'resources/plantilla/assets/vendors/css/base/bootstrap.css',
    'resources/plantilla/assets/vendors/css/base/bootstrap.min.css',
    'resources/plantilla/css/animate/animate.css',
    'resources/plantilla/css/animate/animate.min.css',
    'resources/plantilla/css/datatables/datatables.css',
    'resources/plantilla/css/datatables/datatables.min.css',
    'resources/plantilla/css/leaflet/leaflet.css',
    'resources/plantilla/css/leaflet/leaflet.min.css',
    'resources/plantilla/css/lity/lity.css',
    'resources/plantilla/css/lity/lity.min.css',
    'resources/plantilla/css/owl-carousel/owl.carousel.css',
    'resources/plantilla/css/owl-carousel/owl.carousel.min.css',
    'resources/plantilla/css/owl-carousel/owl.theme.css',
    'resources/plantilla/css/owl-carousel/owl.theme.min.css',
    'resources/plantilla/css/photoswipe/default-skin/default-skin.css',
    'resources/plantilla/css/photoswipe/default-skin/default-skin.min.css',
    'resources/plantilla/css/photoswipe/photoswipe.min.css',
    'resources/plantilla/css/photoswipe/photoswipe.css',
    'icons/ionicons/css/ionicons.css',
    'icons/ionicons/css/ionicons.min.css',
    'icons/lineawesome/css/line-awesome-font-awesome.css',
    'icons/lineawesome/css/line-awesome-font-awesome.min.css',
    'icons/lineawesome/css/line-awesome.css',
    'icons/lineawesome/css/line-awesome.min.css',
    'icons/meteocons/css/meteocons.css',
    'icons/meteocons/css/meteocons.min.css',
    'icons/themify/css/themify-icons.css',
    'icons/themify/css/themify-icons.min.css',
    //'resources/plantilla/assets/vendors/css/base/elisyam-1.5-dark.css',
    //'resources/plantilla/assets/vendors/css/base/elisyam-1.5-dark.min.css',
    'resources/plantilla/assets/vendors/css/base/elisyam-1.5.css',
    'resources/plantilla/assets/vendors/css/base/elisyam-1.5.min.css',
    'resources/plantilla/documentation/css/elisyam-bundle.css',
    'resources/plantilla/documentation/css/prism.css',
    'resources/plantilla/assets/vendors/js/app/app.css',
    'resources/plantilla/assets/vendors/js/app/app.min.css',
    'resources/plantilla/assets/vendors/js/base/core.css',
    'resources/plantilla/assets/vendors/js/base/core.min.css',

], 'public/css/plantilla.css')
 
 .scripts([

    'resources/plantilla/assets/vendors/js/tabledit/jquery.tabledit.js',
    'resources/plantilla/assets/vendors/js/tabledit/jquery.tabledit.min.js',
    'resources/plantilla/assets/vendors/js/bootstrap-select/bootstrap-select.js',
    'resources/plantilla/assets/vendors/js/bootstrap-select/bootstrap-select.min.js',
    'resources/plantilla/assets/vendors/js/bootstrap-wizard/bootstrap.wizard.js',
    'resources/plantilla/assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.bootstrap4.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.bootstrap4.min.js',
    'resources/plantilla/assets/vendors/js/calendar/fullcalendar.js',
    'resources/plantilla/assets/vendors/js/calendar/fullcalendar.min.js',
    'resources/plantilla/assets/vendors/js/calendar/moment.min.js',
    'resources/plantilla/assets/vendors/js/chart/chart.min.js',
    'resources/plantilla/assets/vendors/js/chart/chart.min.js',
    'resources/plantilla/assets/vendors/js/countdown/countdown.js',
    'resources/plantilla/assets/vendors/js/countdown/countdown.min.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.colVis.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.colVis.min.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.flash.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.flash.min.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.html5.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.html5.min.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.print.js',
    'resources/plantilla/assets/vendors/js/datatables/buttons.print.min.js',
    'resources/plantilla/assets/vendors/js/datatables/dataTables.buttons.js',
    'resources/plantilla/assets/vendors/js/datatables/dataTables.buttons.min.js',
    'resources/plantilla/assets/vendors/js/datatables/datatables.js',
    'resources/plantilla/assets/vendors/js/datatables/datatables.min.js',
    'resources/plantilla/assets/vendors/js/datatables/jszip.js',
    'resources/plantilla/assets/vendors/js/datatables/jszip.min.js',
    'resources/plantilla/assets/vendors/js/datatables/pdfmake.js',
    'resources/plantilla/assets/vendors/js/datatables/pdfmake.min.js',
    'resources/plantilla/assets/vendors/js/datatables/vfs_fonts.js',
    'resources/plantilla/assets/vendors/js/datepicker/daterangepicker.js',
    'resources/plantilla/assets/vendors/js/datepicker/moment.min.js',
    'resources/plantilla/assets/vendors/js/leaflet/leaflet.js',
    'resources/plantilla/assets/vendors/js/leaflet/leaflet.min.js',
    'resources/plantilla/assets/vendors/js/lity/lity.js',
    'resources/plantilla/assets/vendors/js/lity/lity.min.js',
    'resources/plantilla/assets/vendors/js/nicescroll/nicescroll.js',
    'resources/plantilla/assets/vendors/js/nicescroll/nicescroll.min.js',
    'resources/plantilla/assets/vendors/js/noty/noty.js',
    'resources/plantilla/assets/vendors/js/noty/noty.min.js',
    'resources/plantilla/assets/vendors/js/owl-carousel/owl.carousel.js',
    'resources/plantilla/assets/vendors/js/owl-carousel/owl.carousel.min.js',
    'resources/plantilla/assets/vendors/js/photoswipe/photoswipe-ui-default.js',
    'resources/plantilla/assets/vendors/js/photoswipe/photoswipe-ui-default.min.js',
    'resources/plantilla/assets/vendors/js/photoswipe/photoswipe.js',
    'resources/plantilla/assets/vendors/js/photoswipe/photoswipe.min.js',
    'resources/plantilla/assets/vendors/js/progress/circle-progress.js',
    'resources/plantilla/assets/vendors/js/progress/circle-progress.min.js',
    'resources/plantilla/documentation/js/elisyam.js',
    'resources/plantilla/documentation/js/prism.js',
    'resources/plantilla/assets/js/app/calendar/basic-calendar.js',
    'resources/plantilla/assets/js/app/calendar/basic-calendar.min.js',
    'resources/plantilla/assets/js/app/calendar/event-calendar.js',
    'resources/plantilla/assets/js/app/calendar/event-calendar.min.js',
    'resources/plantilla/assets/js/app/calendar/list-calendar.js',
    'resources/plantilla/assets/js/app/calendar/list-calendar.min.js',
    'resources/plantilla/assets/js/app/chat/chat.js',
    'resources/plantilla/assets/js/app/chat/chat.min.js',
    'resources/plantilla/assets/js/app/contact/contact.js',
    'resources/plantilla/assets/js/app/contact/contact.min.js',
    'resources/plantilla/assets/js/app/mail/mail.js',
    'resources/plantilla/assets/js/app/mail/mail.min.js',
    'resources/plantilla/assets/js/components/chartjs/chartjs.js',
    'resources/plantilla/assets/js/components/chartjs/chartjs.min.js',
    'resources/plantilla/assets/js/components/datepicker/datepicker.js',
    'resources/plantilla/assets/js/components/leaflet/maps-leaflet.js',
    'resources/plantilla/assets/js/components/leaflet/maps-leaflet.min.js',
    'resources/plantilla/assets/js/components/music/music-player.js',
    'resources/plantilla/assets/js/components/music/music-player.min.js',
    'resources/plantilla/assets/js/components/notifications/notifications.js',
    'resources/plantilla/assets/js/components/notifications/notifications.min.js',
    'resources/plantilla/assets/js/components/scrollable/scrollable.js',
    'resources/plantilla/assets/js/components/scrollable/scrollable.min.js',
    'resources/plantilla/assets/js/components/tabledit/tabledit.js',
    'resources/plantilla/assets/js/components/tables/tables.js',
    'resources/plantilla/assets/js/components/tabs/animated-tabs.js',
    'resources/plantilla/assets/js/components/tabs/animated-tabs.min.js',
    'resources/plantilla/assets/js/components/validation/validation.js',
    'resources/plantilla/assets/js/components/validation/validation.min.js',
   // 'resources/plantilla/assets/js/components/widgets/widgets-dark.js',
   // 'resources/plantilla/assets/js/components/widgets/widgets-dark.min.js',
    'resources/plantilla/assets/js/components/widgets/widgets.js',
    'resources/plantilla/assets/js/components/widgets/widgets.min.js',
    'resources/plantilla/assets/js/components/wizard/form-wizard.js',
    'resources/plantilla/assets/js/components/wizard/form-wizard.min.js',
   // 'resources/plantilla/assets/js/dashboard/db-clean-dark.js',
   // 'resources/plantilla/assets/js/dashboard/db-clean-dark.min.js',
    'resources/plantilla/assets/js/dashboard/db-clean.js',
    'resources/plantilla/assets/js/dashboard/db-clean.min.js',
   // 'resources/plantilla/assets/js/dashboard/db-compact-dark.js',
   // 'resources/plantilla/assets/js/dashboard/db-compact-dark.min.js',
    'resources/plantilla/assets/js/dashboard/db-compact.js',
    'resources/plantilla/assets/js/dashboard/db-compact.min.js',
   // 'resources/plantilla/assets/js/dashboard/db-default-dark.js',
  //  'resources/plantilla/assets/js/dashboard/db-default-dark.min.js',
    'resources/plantilla/assets/js/dashboard/db-default.js',
    'resources/plantilla/assets/js/dashboard/db-default.min.js',
   // 'resources/plantilla/assets/js/dashboard/db-modern-dark.js',
   // 'resources/plantilla/assets/js/dashboard/db-modern-dark.min.js',
    'resources/plantilla/assets/js/dashboard/db-modern.js',
    'resources/plantilla/assets/js/dashboard/db-modern.min.js',
   // 'resources/plantilla/assets/js/dashboard/db-smarthome-dark.js',
   // 'resources/plantilla/assets/js/dashboard/db-smarthome-dark.min.js',
    'resources/plantilla/assets/js/dashboard/db-smarthome.js',
    'resources/plantilla/assets/js/dashboard/db-smarthome.min.js',
    'resources/plantilla/assets/js/pages/coming-soon.js',
    'resources/plantilla/assets/js/pages/coming-soon.min.js',
    'resources/plantilla/assets/js/pages/events.js',
    'resources/plantilla/assets/js/pages/events.min.js',
    'resources/plantilla/assets/js/pages/friends.js',
    'resources/plantilla/assets/js/pages/friends.min.js',
    'resources/plantilla/assets/js/pages/newsfeed.js',
    'resources/plantilla/assets/js/pages/newsfeed.min.js',
], 'public/js/plantilla.js')
 
 .js(['resources/js/app.js'], 'public/js/app.js');
 
