const gulp = require('gulp');
const sass = require('gulp-sass');
const concatCss = require('gulp-concat-css');
const removeFiles = require('gulp-remove-files');
const browserSync = require('browser-sync').create();

// const concat = require('gulp-concat'); // for js files
// const bundleFiles = require('gulp-bundle-files');
// const useref = require('gulp-useref');
// const bundles = require('./sample-options.json');

// function bundle() {
//     return bundleFiles(bundles);
// }

const baseRoute = './cms/';
const cssSrcFiles = ['./cms/css/login.css', './cms/css/shared.css'];
const sourceCSSFiles = './cms/scss/**/*.scss';

function styles() {
    return gulp.src(sourceCSSFiles)
        .pipe(sass())
        .pipe(gulp.dest('./cms/css/'));
}

function bundle() {
    return gulp.src(cssSrcFiles)
        .pipe(concatCss('main.css'))
        .pipe(gulp.dest('./cms/css/'))
        .pipe(browserSync.stream());
}

function deleteFiles() {
    return gulp.src(cssSrcFiles)
        .pipe(removeFiles());
}

function watch() {
    browserSync.init({
        proxy: 'localhost/musicoterapia/cms'
    });

    gulp.watch(sourceCSSFiles, gulp.series(styles, bundle, deleteFiles));
    gulp.watch('./cms/*.php').on('change', browserSync.reload);
    gulp.watch('./cms/components/**/*.php').on('change', browserSync.reload);
};

exports.watch = watch;