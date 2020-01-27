import $ from "jquery";
import WOW from "wowjs";


class Anim {
  constructor() {
    this.menuEl = $('#menu-controller');
    this.headerEl = $('#header');
    this.events();
  }

  events() {
    $(window).on("load", function() {
      new WOW.WOW().init();
      $(".preloader").addClass("preloader--done");
      $(".header__social").addClass("animated fadeInLeft");
      $(".header .header__content-photo").addClass("animated fadeInRight");
      $(".menu, .header .main-car__desc").addClass("animated fadeInDown");
      $(
        ".header__main-title, .header__main-text, .header__brand-btn, .header .default-btn"
      ).addClass("animated fadeInUp");
    });

    $(document).ready(() => {

    });
    this.menu();
  }

  // Functions
  menu () {
    this.menuEl.on('click', function () {

      var wrapperctrl = $(this);
      var wrapper = $('#menu-wrapper');

      if ($(wrapper).hasClass('open-menu') && $(wrapperctrl).hasClass('open-menu')) {
        $("#menu-wrapper,#menu-controller").removeClass('open-menu').addClass('close-menu');
      } else {
        $("#menu-wrapper,#menu-controller").removeClass('close-menu').addClass('open-menu');
      }

    });

  }
}

export default Anim;
