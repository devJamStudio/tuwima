const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css'); // Minify CSS
const php = require('gulp-connect-php');

// Paths
const paths = {
	scss: './**/scss/**/*.scss', // Path to SCSS files
	cssDest: './theme/build/css', // Output directory for CSS files
	php: './**/*.php', // PHP files for watch
	js: './**/*.js', // JavaScript files for watch
	css: './**/*.css', // CSS files for watch
	baseDir: './', // Base directory for PHP server
};

// Live Reload with PHP server and BrowserSync
function liveReload() {
	php.server({ base: paths.baseDir, port: 8888, keepalive: true });

	browserSync.init({
		proxy: 'http://localhost:8888/FUTURE_DESIGN/future/',
		open: false,
		port: 3000,
	});

	// Watch PHP, CSS, and JS files for changes
	gulp.watch(paths.php).on('change', browserSync.reload);
	gulp.watch(paths.css).on('change', browserSync.reload);
	gulp.watch(paths.scss).on('change', browserSync.reload);

	gulp.watch(paths.js).on('change', browserSync.reload);

}

// Compile and Minify SCSS into CSS
function compileSass() {
	return gulp
		.src(paths.scss)
		.pipe(sass().on('error', sass.logError)) // Compile SCSS and handle errors
		.pipe(cleanCSS()) // Minify CSS
		.pipe(gulp.dest(paths.cssDest)) // Save compiled CSS
		.pipe(browserSync.stream()); // Stream changes to BrowserSync
}

// Watch SCSS files for changes
function watchSass() {
	gulp.watch(paths.scss, compileSass);
}

// Combine tasks into a default workflow
exports.default = gulp.series(compileSass, gulp.parallel(liveReload, watchSass));

// Individual task exports
exports.sass = compileSass;
exports.watch = watchSass;
exports.reload = liveReload;
