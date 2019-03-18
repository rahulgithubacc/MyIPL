var gulp = require('gulp');
var sass = require('gulp-sass');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();

gulp.task('default', defaultTask);
// gulp.task('mytask',SasstoCss);
gulp.task('images',imgcompression);

// gulp.task('browsersync',browsersyncfun);
function defaultTask(done) {
  // place code for your default task here
  console.log("rahul");
  done();
}
// function SasstoCss(){
//   return gulp.src('custom/boot/Sass/*.scss') // Get source files with gulp.src
//     .pipe(sass()) // Sends it through a gulp plugin
//     .pipe(gulp.dest('custom/boot/css')) // Outputs the file in the destination folder
//     .pipe(browserSync.reload({
//       stream: true
//     }))
// }

function imgcompression(){
  return gulp.src('custom/boot/images/*.+(png|jpeg|gif|svg)')
  .pipe(imagemin())
  .pipe(gulp.dest('custom/boot/myimages'))
}


gulp.task('browserSync', function() {
  browserSync.init({
      proxy: "http://localhost:8888/drupal-8.6.7_composer/MyIPL/web/"
  });
});

gulp.task('sass', function(done) {
  return gulp.src('custom/boot/sass/*.scss') // Gets all files ending with .scss in app/scss
    .pipe(sass())
    .pipe(gulp.dest('custom/boot/css'))
    .pipe(browserSync.reload({
      stream: true
    }));
});

gulp.task('watch',gulp.parallel('browserSync',function(){
  gulp.watch('custom/boot/sass/*.scss', gulp.series('sass')); 
  // Other watchers
}));