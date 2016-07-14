var elixir = require('laravel-elixir');

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
	//.styles(['./public/assets/css/custom.css','./bower_components/uikit/css/uikit.css'],'public/assets/css/all.css');

	mix.scripts([
        './bower_components/jquery/dist/jquery.min.js',
        './bower_components/uikit/js/uikit.min.js',
        './bower_components/uikit/js/components/parallax.min.js',
        './bower_components/uikit/js/components/sticky.min.js',
        './resources/assets/js/splash.js'
    ],'public/assets/js/all.js');
});
