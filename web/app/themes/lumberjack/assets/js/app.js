require("typeface-barlow-condensed");
require("typeface-karla");

const feather = require("feather-icons");
feather.replace();

import Swiper from "swiper";

var mySwiper = new Swiper(".swiper-container", {
  slidesPerView: 3,
  loop: true,
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
