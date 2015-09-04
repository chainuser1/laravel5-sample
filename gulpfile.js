var elixir = require('laravel-elixir');

/*
 |----------------------------------------------------------------
 | Have a Drink!
 |----------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic
 | Gulp tasks for your Laravel application. Elixir supports
 | several common CSS, JavaScript and even testing tools!
 |
*/

var paths = {
    'jquery': './vendor/bower_components/jquery/dist/jquery.min.js',
    'bootstrap': './vendor/bower_components/bootstrap-sass-official/assets/',
    'cropit':'./vendor/bower_components/cropit/dist/jquery.cropit.js'
}

elixir(function(mix) {
    mix.sass('style.scss', 'public/css/').stylesIn('public/css')
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
        paths.jquery,
        paths.bootstrap + 'javascripts/bootstrap.js',
        paths.cropit
    ], 'public/js/app.js', './')
        .scriptsIn('public/js');
});
