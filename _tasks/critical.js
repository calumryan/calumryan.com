const config = require("./_config.json");
const gulp = require("gulp");
const critical = require("critical").stream;

const criticalConfig = {
  inline: true,
  base: "/",
  minify: true,
  width: 1280,
  height: 800,
};

gulp.task("critical", function () {
  return gulp
    .src("site/snippets/critical.html")
    .pipe(critical(criticalConfig))
    .on("error", function (err) {
      console.error(err.message);
    })
    .pipe(gulp.dest(config.buildDest));
});
