var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;
elixir.config.registerWatcher("imagemin", "resources/assets/img/**/*");

require("./elixir-tasks");

elixir(function(mix) {
    mix
        .sass([
        "resources/bootstrap.scss",
        "app.scss",
    ], "public/css/all.css")

        .scripts([
    	'resources/jquery.js',
        'resources/jquery.cookie.js',
    	'resources/velocity.js',
    	'resources/bootstrap.js',
    	'app.js'
    	], 'public/js/app.js')

        .scripts([
        'surveys.js'
        ], 'public/js/surveys.js')

        .uglify('public/js/*.js', 'public/js')

        .imagemin('resources/assets/img/**/*', 'public/img');
});