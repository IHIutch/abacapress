require("typeface-barlow-condensed");
require("typeface-karla");

const feather = require("feather-icons");
feather.replace();

import Swiper from "swiper";

var mySwiper = new Swiper(".swiper-container", {
  slidesPerView: 3,
  loop: true,
});
