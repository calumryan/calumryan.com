const config = require("./_config.json");
const gulp = require("gulp");
const browserSync = require("browser-sync");
const server = browserSync.create();

const reload = (done) => {
  server.reload();
  done();
};

const watchers = {
  scripts: `${config.assetSrc}/scripts/**/*`,
  styles: `${config.assetSrc}/styles/**/*`,
  icons: `${config.assetSrc}/icons/*.svg`,
};

/*
  BrowserSync Dev Server
*/
gulp.task("serve", function (done) {
  server.init({
    proxy: "cr.test",
  });
  done();
});

/*
  Watch folders for changes
*/
gulp.task("watch", function () {
  gulp.watch(watchers.scripts, gulp.series("scripts", reload));
  gulp.watch(watchers.styles, gulp.series("styles", reload));
  gulp.watch(watchers.icons, gulp.series("icons", reload));
  // gulp.watch(watchers.site, gulp.series('generate', reload))
});
