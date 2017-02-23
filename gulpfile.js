var elixir = require('laravel-elixir');
require('laravel-elixir-webpack');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.sass('app.scss','./public/assets/css/all.css');
    mix.sass('admin.scss','./public/assets/css/admin.css');
	//.styles(['./public/assets/css/custom.css','./bower_components/uikit/css/uikit.css'],'public/assets/css/all.css');

	mix.scripts([
        './bower_components/jquery/dist/jquery.min.js',
        './resources/assets/js/settings.js',
        './bower_components/uikit/js/uikit.min.js',

        './bower_components/uikit/js/components/parallax.min.js',
        './bower_components/uikit/js/components/sticky.min.js',
        './bower_components/uikit/js/components/upload.min.js',
        './bower_components/uikit/js/components/notify.min.js',
        './bower_components/uikit/js/components/form-select.min.js',
        './bower_components/uikit/js/components/autocomplete.js',
        './resources/assets/js/timeago.js',
        './resources/assets/js/splash.js',
        './resources/assets/js/home.js',
        './resources/assets/js/search.js',
        './resources/assets/js/messenger.js',
       
        './resources/assets/js/universal.js'
    ],'./public/assets/js/all.js');

    /*mix.webpack(
        'notifications.js',
        './resources/assets/js',
        './public/assets/js'
    );
     './resources/assets/js/notifications.js',*/

    mix.browserify('./public/assets/js/notifications.js');

    mix.scripts([
        './resources/assets/js/settings.js',
    	'./bower_components/uikit/js/components/upload.min.js',
        './bower_components/uikit/js/components/datepicker.min.js',
        './bower_components/uikit/js/components/timepicker.min.js',
        './bower_components/uikit/js/components/autocomplete.min.js',
    	'./resources/assets/js/admin.misc.js',
        './resources/assets/js/admin.files.js',
        './resources/assets/js/admin.imageselect.js',
        './resources/assets/js/admin.editor.js',
        './resources/assets/js/admin.edit_student.js'
    ],'public/assets/js/admin.js');
});
