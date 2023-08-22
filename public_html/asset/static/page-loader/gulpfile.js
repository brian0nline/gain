// Gulp packages
var concat = require('gulp-concat'),
	es = require('event-stream'),
	gulp = require('gulp'),
	uglify = require('gulp-uglify');

// Uglify task
gulp.task('uglify', function() {
	return es.merge(
		gulp.src(['harold-loader.js'])
		.pipe(uglify({mangle: false}))
		.pipe(concat('harold-loader.min.js'))
		.pipe(gulp.dest(''))
	);
});

// Watch task
gulp.task('watch', function() {
	gulp.watch('*.js', ['uglify']);
});

// Default task
gulp.task('default', ['uglify', 'watch']);