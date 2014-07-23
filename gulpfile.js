/*
 * Init Gulp dependencies
 */
var gulp =
	require("gulp"),
	sass = require("gulp-ruby-sass"),
	autoprefixer = require("gulp-autoprefixer"),
	uglify = require("gulp-uglify"),
	git = require('gulp-git');

var exec = require("child_process").exec;
var shellescape = require('shell-escape');


/*
 * Gulp tasks
 */
gulp.task("sass", function() {

	gulp.src("assets/css/_src/screen.sass")
	.pipe(sass({
		loadPath: process.cwd() + "/assets/css/_src",
		style: "nested"
	}))
	.pipe(autoprefixer("last 2 version", "> 1%"))
	.pipe(gulp.dest("assets/css"));

});

gulp.task("uglify", function() {

	gulp.src("assets/js/_src/*.js")
	.pipe(uglify())
	.pipe(gulp.dest("assets/js"))

});

gulp.task("watch", function() {

	gulp.watch("assets/css/_src/*/*.sass", ["sass"]);
	gulp.watch("assets/js/_src/*.js", ["uglify"]);

});


/*
 * Default Gulp task
 */
gulp.task("default", function() {
	gulp.start("watch");
});