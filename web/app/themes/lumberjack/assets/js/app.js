import "typeface-barlow-condensed";
import "typeface-karla";

import feather from "feather-icons";
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
