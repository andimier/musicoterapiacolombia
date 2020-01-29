const concatCss = require('gulp-concat-css');
const removeFiles = require('gulp-remove-files');
const cssSrcFiles = ['./cms/css/login.css', './cms/css/shared.css'];

const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const sourceCSSFiles = './cms/scss/**/*.scss';
const sourceMainCSS = './cms/scss/main.scss';

function styles() {
    return gulp.src(sourceMainCSS)
        .pipe(sass())
        .pipe(gulp.dest('./cms/css/'))
        .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        proxy: 'localhost/musicoterapia/cms'
    });

    gulp.watch(sourceCSSFiles, styles);
    gulp.watch('./cms/**/*.php').on('change', browserSync.reload);
    gulp.watch('./**/*.php').on('change', browserSync.reload);
};

exports.watch = watch;