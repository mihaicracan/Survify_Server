var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;
elixir.config.registerWatcher("imagemin", "resources/assets/img/**/*");

require("./elixir-tasks");

elixir(function(mix) {
    mix.sass([
        "app.scss",
        "style.scss"
    ], "public/css/all.css");

    mix.scripts(['app.js', 'script.js'], 'public/js/app.js')
    	.uglify('public/js/app.js', 'public/js');

    mix.imagemin('resources/assets/img/**/*', 'public/img');
});