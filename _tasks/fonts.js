const config = require("./_config.json");
const gulp = require("gulp");

gulp.task("fonts", function () {
  const fontDir = config.assetSrc + "/fonts/**";

  return gulp.src(fontDir).pipe(gulp.dest(config.assetDest + "/fonts"));
});
