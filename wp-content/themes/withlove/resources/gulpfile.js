var gulp = require('gulp'),
    sass = require('gulp-sass');

var concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify-es').default;

gulp.task('scss', function() {
    gulp.src('sass/global.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(rename('global.min.css'))
        .pipe(gulp.dest('../assets/css'));
});

gulp.task('scripts', function() {
    gulp.src('js/**/*.js')
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('../assets/js'))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../assets/js'));
});

var vendor = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/tether/dist/js/tether.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    // 'node_modules/bootstrap/js/src/util.js',
    // 'node_modules/bootstrap/js/src/collapse.js',
    // 'node_modules/bootstrap/js/src/modal.js',
    // 'node_modules/jquery-countdown/dist/jquery.countdown.min.js',
    // 'node_modules/scrollreveal/dist/scrollreveal.min.js',
    'libs/**/*.js'
];

gulp.task('libs-scripts', function() {
    gulp.src(vendor)
        .pipe(concat('libs-scripts.js'))
        .pipe(gulp.dest('../assets/js'))
        .pipe(rename('libs-scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../assets/js'));
});

gulp.task('default', function() {
    gulp.run("scss");
    gulp.run("scripts");
    gulp.run("libs-scripts");

    gulp.watch('./sass/**/*.scss', function(event) {
        gulp.run('scss');
    });

    gulp.watch('js/**/*.js', function(event) {
        gulp.run('scripts');
    });
});
