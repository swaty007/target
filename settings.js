const themeLocation = "./wp-content/themes/target/";
const urlToPreview = "http://target.local";
const paths = {
  php: {
    watch: "./**/*.php",
  },
  styles: {
    src: themeLocation + "sass/style.scss",
    dist: themeLocation,
    watch: themeLocation + "sass/**/*.scss",
  },
  scripts: {
    // src: [themeLocation + "js/modules/*.js", themeLocation + "js/scripts.js"],
    // dist: themeLocation + "js/",
    watch: [
      themeLocation + "js/modules/**/*.js",
      themeLocation + "js/modules/**/*.vue",
      themeLocation + "js/scripts.js",
    ],
  },
  images: {
    src: [
      themeLocation + "img/**/*.{jpg,jpeg,png,gif,svg}",
      // themeLocation + "!img/svg/*.svg",
      // themeLocation + "!img/favicon.{jpg,jpeg,png,gif}",
    ],
    dist: themeLocation + "img/",
    watch: themeLocation + "img/**/*.{jpg,jpeg,png,gif,svg}",
  },
  sprites: {
    src: themeLocation + "img/svg/*.svg",
    dist: themeLocation + "img/sprites/",
    watch: themeLocation + "img/svg/*.svg",
  },
  favicons: {
    src: themeLocation + "img/favicon.{jpg,jpeg,png,gif}",
    dist: themeLocation + "img/favicons/",
  },
};

export default { paths, themeLocation, urlToPreview };
