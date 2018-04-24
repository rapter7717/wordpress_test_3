const gulp = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');


// Styles task

gulp.task('styles', function() {
    gulp.src([
      './src/css/bootstrap.min.css',
      './sass/style.scss',
      './sass/woocommerce.scss'
    ])
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./'))
});

// JS task

gulp.task('js', function() {
    gulp.src([
            './src/js/main.js',
            './src/js/bootstrap.min.js',
        ])
        .pipe(concat('script.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist'));
});

// Default task

gulp.task('default', ['styles','js']);

// Gulp Watch task

gulp.task('watch', function() {
    gulp.watch('src/js/*.js', ['js']);
    gulp.watch('sass/*/*.scss', ['styles']);
});
