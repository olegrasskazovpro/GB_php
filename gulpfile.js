"use strict";

const gulp = require('gulp');
const connect = require('gulp-connect-php');
const browserSync = require('browser-sync');
const reload = browserSync.reload;

let server = new connect();

gulp.task('default', function() {
    connect.server({}, function (){
        browserSync({
            proxy: '127.0.0.1:8888'
        });
    });

    gulp.watch('.1/**/*.php').on('change', function () {
        browserSync.reload({stream: true});
    });
});