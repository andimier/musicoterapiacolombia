const concatCss = require('gulp-concat-css');
const removeFiles = require('gulp-remove-files');
const cssSrcFiles = ['./cms/css/login.css', './cms/css/shared.css'];

const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();

const cmsmainfile = './cms/scss/main.scss';
const cmssourcefiles = './cms/scss/**/*.scss';

const sitemainfile = './scss/main.scss';
const sitesourcefiles = './scss/**/*.scss';

function compileCmsStyles() {
    return gulp.src(cmsmainfile)
        .pipe(sass())
        .pipe(gulp.dest('./cms/css/'))
        .pipe(browserSync.stream());
}

function compileSiteStyles() {
    return gulp.src(sitemainfile)
        .pipe(sass())
        .pipe(gulp.dest('./css/'))
        .pipe(browserSync.stream());
}

function watchPHPFiles(done) {
    browserSync.reload({ stream: false });
    done();
};

function wt() {
    browserSync.init({
        proxy: 'localhost/prueba/musicoterapiacolombia/'
    });

    gulp.watch(sitesourcefiles, compileSiteStyles);
    gulp.watch(cmssourcefiles, compileCmsStyles);
    gulp.watch('./cms/**/*.php', gulp.series(compileCmsStyles, watchPHPFiles));
    gulp.watch('./**/*.php').on('change', browserSync.reload);
};

exports.watch = wt;
