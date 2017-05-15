var gulp = require("gulp");
var less = require("gulp-less");
var path = require("path");
var browserSync = require("browser-sync").create();
var reload = browserSync.reload;
var haml = require('gulp-haml');
var sourcemaps = require("gulp-sourcemaps");
var mincss = require("gulp-minify-css");
var concat = require('gulp-concat');
var watch = require("gulp-watch");
var pug = require('gulp-pug');
var deploy = require("sftp-sync-deploy").default;

gulp.task('default', function () {
  browserSync.init({
    files: "assets/**/*",
    watchEvents: ["change", "add"],//watch some events
    proxy: "localhost/nomad",
    online: true,
  });

  watch("assets/less/**/*.less", function () {
    console.log("less changed")
    gulp.src("./assets/less/main.less")
      .pipe(sourcemaps.init())
      .pipe(less())
      .pipe(sourcemaps.write())
      .pipe(mincss())
      // .pipe(concat("style.css"))
      .pipe(gulp.dest("./assets/css"));
    reload();
  });
});

gulp.task("upload", function () {
  var config = {
    host: "134.0.117.92",
    port: "22",
    username: "root",
    password: "rMy!pIYj9ajw5q",
    remoteDir: "/var/www/wordpress/wp-content/themes/nomad-child",
    localDir: "./"
  };
  var options = {
    exclude: [
      'node_modules',
      "Gulpfile.js",
      ".git/"

    ],
    // excludeMode: "remove",
    dryRun: true,
  }

  deploy(config, options).then(function () {
    console.log("Deployed to remote server");
  }).catch(function (err) {
    console.error("Error by deploy: " + err);
  })
})