!(function (e) {
  "use strict";
  e(window).on("load", function () {
    e(".preloader").length && e(".preloader").fadeOut("slow");
  }),
    e(".a-nav-toggle, .menu-main a").on("click", function () {
      e("html").hasClass("body-menu-opened")
        ? e("html").removeClass("body-menu-opened").addClass("body-menu-close")
        : e("html").addClass("body-menu-opened").removeClass("body-menu-close");
    }),
    e(".a-pagepiling").length &&
      e(".a-pagepiling").pagepiling({
        scrollingSpeed: 280,
        menu: "#menu, #menuMain",
        anchors: [
          "Intro",
          "Services",
          "Achievements",
          "Experience",
          "Testimonials",
          "Contact",
        ],
        loopTop: !1,
        loopBottom: !0,
        navigation: { position: "right" },
        onLeave: function () {
          e(".slide-dark-footer").hasClass("active")
            ? e("body").addClass("body-copyright-light")
            : e("body").removeClass("body-copyright-light"),
            e(".slide-dark-bg").hasClass("active")
              ? e("body").addClass("body-bg-dark")
              : e("body").removeClass("body-bg-dark"),
            e(".a-carousel-projects").trigger("refresh.owl.carousel");
        },
      }),
    e(".a-carousel-experience").length &&
      e(".a-carousel-experience").owlCarousel({
        items: 1,
        navText: [
          '<i class="lni lni-chevron-left"></i>',
          '<i class="lni lni-chevron-right"></i>',
        ],
        smartSpeed: 750,
        margin: 30,
        dots: !1,
        nav: !0,
        navContainer: ".a-carousel-nav",
        loop: !0,
      }),
    e(".a-carousel-testimonial").length &&
      e(".a-carousel-testimonial").owlCarousel({
        items: 1,
        navText: [
          '<i class="lni lni-chevron-left"></i>',
          '<i class="lni lni-chevron-right"></i>',
        ],
        smartSpeed: 750,
        margin: 30,
        dots: !1,
        nav: !0,
      });
})($);
