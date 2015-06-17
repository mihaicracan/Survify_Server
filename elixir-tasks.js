var argv     = require('yargs').argv;
var elixir   = require("laravel-elixir");
var gulp     = require("gulp");
var gulpif   = require("gulp-if");
var uglify   = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');

// elixir uglify task
elixir.extend("uglify", function(src, dest) {

    gulp.task('uglify', function() {
      	return gulp.src(src)
        	.pipe(gulpif(argv.production, uglify()))
        	.pipe(gulp.dest(dest));
    });

    return this.queueTask("uglify");
 });


//elixir imagemin task
elixir.extend("imagemin", function(src, dest){

	gulp.task('imagemin', function () {
	    return gulp.src(src)
	        .pipe(imagemin({
	            progressive: true,
	            svgoPlugins: [{removeViewBox: false}],
	            use: [pngquant()]
	        }))
	        .pipe(gulp.dest(dest));
	});

	return this.queueTask("imagemin");
});