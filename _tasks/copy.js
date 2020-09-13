const config = require("./_config.json");
const gulp = require("gulp");

gulp.task("copy", function () {
  const imgDir = config.assetSrc + "/images";
  const MediaGlobs = [
    imgDir + "/**/*.{jpg,jpeg,png,gif,webp,mp3,mp4,webm,ogg}",
  ];

  return gulp
    .src(MediaGlobs, { base: imgDir })
    .pipe(gulp.dest(config.assetDest + "/images"));
});
