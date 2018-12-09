const gulp = require('gulp');
const newer = require('gulp-newer');
const imagemin = require('gulp-imagemin');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const reload      = browserSync.reload;
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const rename = require('gulp-rename');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const del = require('del');

var paths = {
  styles: {
    src: 'src/scss/**/*.scss',
    dest: 'dist/css/'
  },
  scripts: {
    src: 'src/js/**/*.js',
    dest: 'dist/js/'
  },
    imgs: {
    src: 'src/img/**/*',
    dest: 'dist/img/'
  }
  ,
    fonts: {
    src: 'src/fonts/**/*',
    dest: 'dist/fonts/'
  }
};

// clean
function clean() {
  return del([ 'dist' ]);
}

// images
function images() {
  return gulp.src(paths.imgs.src)
    .pipe(newer(paths.imgs.dest))
    .pipe(imagemin({ optimizationLevel: 7 }))
    .pipe(gulp.dest(paths.imgs.dest));
}

// fonts
function fonts() {
  return gulp.src(paths.fonts.src)
    .pipe(gulp.dest(paths.fonts.dest));
}

// styles
function styles() {
  return gulp.src(paths.styles.src)
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    /*.pipe(cleanCSS()) <-- activate for deploying */ 
    .pipe(rename({
      basename: 'style',
      suffix: '.min'
    }))
    .pipe(gulp.dest(paths.styles.dest));
}

// scripts
function scripts() {
  return gulp.src(paths.scripts.src)
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(paths.scripts.dest));
}

// BrowserSync
function watch() {

  browserSync.init({
     baseDir: "./",
    files: ['{lib,templates,page-templates}/**/*.php', '*.php'],
    proxy: 'localhost/wordpress',
    snippetOptions: {
      whitelist: ['/wp-admin/admin-ajax.php'],
      blacklist: ['/wp-admin/**']
    }
  });
  gulp.watch(paths.styles.src, styles).on("change", reload);
  gulp.watch(paths.scripts.src, scripts).on("change", reload);
  gulp.watch(paths.fonts.src, fonts).on("change", reload);
  gulp.watch(paths.imgs.src, images).on("change", reload);
}



//dev
var dev = gulp.series(clean, gulp.parallel(styles, scripts, images, fonts), watch);

// build
var build = gulp.series(clean, gulp.parallel(styles, scripts, images, fonts));

gulp.task('build', build);
gulp.task('default', dev);

exports.clean = clean;
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.fonts = fonts;
exports.watch = watch;
exports.dev = dev;