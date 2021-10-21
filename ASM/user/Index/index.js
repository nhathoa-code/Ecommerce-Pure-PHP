let toggle_nav = document.querySelector(".toggle_nav");
let ismenuShow = false;
let banners = document.querySelectorAll(".banner > section");
let current_banner = 0;
let l = document.querySelector(".fa-chevron-left");
let r = document.querySelector(".fa-chevron-right");
let isAnimationRunning = false;
let link_elements = document.querySelectorAll(".menu-category ul a");
let header_icons = document.querySelectorAll(".header-icon i");
let menu = document.querySelector(".menu");
let menu_top = menu.getBoundingClientRect().top;
let menu_mobile = document.querySelector(".menu-mobile");
let isMenufixed = false;
banners = Array.from(banners);
banners[current_banner].classList.add("active");

toggle_nav.addEventListener("click", () => {
  if (!ismenuShow) {
    menu_mobile.style.left = 0;
    ismenuShow = true;
  } else {
    menu_mobile.style.left = "-100%";
    ismenuShow = false;
  }
});

window.addEventListener("scroll", () => {
  if (window.scrollY >= menu_top) {
    if (!isMenufixed) {
      menu.style.position = "fixed";
      menu.style.backgroundColor = "white";
      menu.style.top = 0;
      Array.from(link_elements).forEach((ele) => {
        ele.style.color = "#041e3a";
      });
      Array.from(header_icons).forEach((ele) => {
        ele.style.color = "#041e3a";
      });
      document.querySelector("#items").style.color = "#041e3a";
      isMenufixed = true;
    }
  } else {
    if (isMenufixed) {
      menu.style.position = "";
      menu.style.backgroundColor = "";
      menu.style.color = "";
      menu.style.top = "";
      Array.from(link_elements).forEach((ele) => {
        ele.style.color = "white";
      });
      Array.from(header_icons).forEach((ele) => {
        ele.style.color = "";
      });
      document.querySelector("#items").style.color = "white";
      isMenufixed = false;
    }
  }
  // if (window.scrollY >= 80) {
  //   if (!isMenufixed) {
  //     menu.style.position = "fixed";
  //     menu.style.backgroundColor = "white";
  //     Array.from(link_elements).forEach((ele) => {
  //       ele.style.color = "#041e3a";
  //     });
  //     Array.from(header_icons).forEach((ele) => {
  //       ele.style.color = "#041e3a";
  //     });
  //     menu.style.top = 0;
  //     isMenufixed = true;
  //   }
  // } else {
  //   if (isMenufixed) {
  //     menu.style.position = "";
  //     menu.style.backgroundColor = "";
  //     menu.style.color = "";
  //     menu.style.top = "";
  //     Array.from(link_elements).forEach((ele) => {
  //       ele.style.color = "white";
  //     });
  //     Array.from(header_icons).forEach((ele) => {
  //       ele.style.color = "";
  //     });
  //     isMenufixed = false;
  //   }
  // }
});

function banner_slide(x) {
  if (isAnimationRunning) {
    return;
  }
  banners.forEach((ele) => {
    ele.classList.remove("zero");
  });
  banners[current_banner].classList.remove("active");
  banners[current_banner].classList.remove("ani");
  banners[current_banner].classList.add("zero");
  banners[current_banner].style.left = "auto";
  banners[current_banner].style.right = "auto";
  current_banner += x;
  if (current_banner >= banners.length) {
    current_banner = 0;
  } else if (current_banner < 0) {
    current_banner = banners.length - 1;
  }
  console.log(current_banner);
  if (x >= 0) {
    banners[current_banner].style.left = "40%";
    banners[current_banner].classList.add("active");
    banners[current_banner].classList.add("ani");

    setTimeout(() => {
      banners[current_banner].style.left = "0%";
    }, 1);
  } else {
    banners[current_banner].style.right = "40%";
    banners[current_banner].classList.add("active");
    banners[current_banner].classList.add("ani");
    setTimeout(() => {
      banners[current_banner].style.right = "0%";
    }, 1);
  }
  isAnimationRunning = true;
}
banners.forEach((element) => {
  element.addEventListener("transitionend", () => {
    isAnimationRunning = false;
  });
});
/*-----------------------------------------------------*/
/*-----------------------------------------------------*/
window.addEventListener("load", () => {
  let banner = document.querySelector(".banner");
  let img_height = document.querySelector("#IMG").clientHeight;
  banner.style.height = `${img_height}px`;
  banner.style.overflow = "hidden";
});

window.addEventListener("resize", () => {
  let banner = document.querySelector(".banner");
  let img_height = document.querySelector("#IMG").clientHeight;
  banner.style.height = `${img_height}px`;
});

/*-----------------------------------------------------*/
/* rlc-01  */
/*-----------------------------------------------------*/
let rlc_slide_01 = document.querySelector(".rlc-01-slider");
let slide_distance_01 = 167.9;
let isTransitionRunning_01 = false;
rlc_slide_01.style.left = `-${slide_distance_01}%`;

function rlc_01_slide(x) {
  if (isTransitionRunning_01) {
    return;
  }
  rlc_slide_01.style.transition = "right 0.5s,left 0.5s";
  if (x > 0) {
    slide_distance_01 += 33.66;
    rlc_slide_01.style.left = `-${slide_distance_01}%`;
  }
  if (x < 0) {
    slide_distance_01 -= 33.66;
    rlc_slide_01.style.left = `-${slide_distance_01}%`;
  }
  isTransitionRunning_01 = true;
}
rlc_slide_01.addEventListener("transitionend", () => {
  isTransitionRunning_01 = false;
  if (
    slide_distance_01 == 403.51999999999987 ||
    slide_distance_01 == 66.92000000000002
  ) {
    rlc_slide_01.style.transition = "right 0s,left 0s";
    slide_distance_01 = 235.22;
    rlc_slide_01.style.left = `-${slide_distance_01}%`;
  }
});
/*------------------------------------------------------*/
/* End rlc-01 */
/*------------------------------------------------------*/
/* ----------- rlc-01 mobile ------------------------*/
let rlc_slide_01_mobile = document.querySelector(".rlc-01-slider-mobile");
let slides_01_mobile = document.querySelectorAll(".rlc-01-slider-mobile > div");
let currentSlide_01_mobile = 1;
rlc_slide_01_mobile.style.left = `${-currentSlide_01_mobile * 100}%`;

function rlc_01_slide_mobile(x) {
  currentSlide_01_mobile += x;
  if (currentSlide_01_mobile >= slides_01_mobile.length) {
    return;
  } else if (currentSlide_01_mobile <= -1) {
    return;
  }
  rlc_slide_01_mobile.style.transition = "left 0.5s ease-in-out";
  rlc_slide_01_mobile.style.left = `${-currentSlide_01_mobile * 100}%`;
}
rlc_slide_01_mobile.addEventListener("transitionend", () => {
  if (currentSlide_01_mobile >= slides_01_mobile.length - 1) {
    currentSlide_01_mobile = 1;
    rlc_slide_01_mobile.style.transition = "left 0s";
    rlc_slide_01_mobile.style.left = `${-currentSlide_01_mobile * 100}%`;
  } else if (currentSlide_01_mobile <= 0) {
    currentSlide_01_mobile = slides_01_mobile.length - 2;
    rlc_slide_01_mobile.style.transition = "left 0s";
    rlc_slide_01_mobile.style.left = `${-currentSlide_01_mobile * 100}%`;
  }
});
/* ----------- rlc-01 mobile ------------------------*/
/*-----------------------------------------------------*/
/* rlc-02  */
/*-----------------------------------------------------*/
let rlc_slide_02 = document.querySelector(".rlc-02-slider");
let slide_distance_02 = 100.98;
let isTransitionRunning_02 = false;
rlc_slide_02.style.left = `-${slide_distance_02}%`;

function rlc_02_slide(x) {
  if (isTransitionRunning_02) {
    return;
  }
  rlc_slide_02.style.transition = "right 0.5s,left 0.5s";
  if (x > 0) {
    slide_distance_02 += 33.66;
    rlc_slide_02.style.left = `-${slide_distance_02}%`;
  }
  if (x < 0) {
    slide_distance_02 -= 33.66;
    rlc_slide_02.style.left = `-${slide_distance_02}%`;
  }
  isTransitionRunning_02 = true;
}
rlc_slide_02.addEventListener("transitionend", () => {
  isTransitionRunning_02 = false;
  if (
    slide_distance_02 == 201.95999999999998 ||
    slide_distance_02 == 1.4210854715202004e-14 ||
    slide_distance_02 == 0
  ) {
    rlc_slide_02.style.transition = "right 0s,left 0s";
    slide_distance_02 = 100.97999999999999;
    rlc_slide_02.style.left = `-${slide_distance_02}%`;
  }
});
/*-----------------------------------------------------*/
/* End rlc-02  */
/*-----------------------------------------------------*/
/* ----------- rlc-02 mobile ------------------------*/
let rlc_slide_02_mobile = document.querySelector(".rlc-02-slider-mobile");
let slides_02_mobile = document.querySelectorAll(".rlc-02-slider-mobile > div");
let currentSlide_02_mobile = 1;
rlc_slide_02_mobile.style.left = `${-currentSlide_02_mobile * 100}%`;

function rlc_02_slide_mobile(x) {
  currentSlide_02_mobile += x;
  if (currentSlide_02_mobile >= slides_02_mobile.length) {
    return;
  } else if (currentSlide_02_mobile <= -1) {
    return;
  }
  rlc_slide_02_mobile.style.transition = "left 0.5s ease-in-out";
  rlc_slide_02_mobile.style.left = `${-currentSlide_02_mobile * 100}%`;
}
rlc_slide_02_mobile.addEventListener("transitionend", () => {
  if (currentSlide_02_mobile >= slides_02_mobile.length - 1) {
    currentSlide_02_mobile = 1;
    rlc_slide_02_mobile.style.transition = "left 0s";
    rlc_slide_02_mobile.style.left = `${-currentSlide_02_mobile * 100}%`;
  } else if (currentSlide_02_mobile <= 0) {
    currentSlide_02_mobile = slides_02_mobile.length - 2;
    rlc_slide_02_mobile.style.transition = "left 0s";
    rlc_slide_02_mobile.style.left = `${-currentSlide_02_mobile * 100}%`;
  }
});

/* ----------- rlc-02 mobile ------------------------*/
/*-----------------------------------------------------*/
/* rlc-03  */
/*-----------------------------------------------------*/
let rlc_slide_03 = document.querySelector(".rlc-03-slider");
let slide_distance_03 = 134.64;
let isTransitionRunning_03 = false;
rlc_slide_03.style.left = `-${slide_distance_03}%`;

function rlc_03_slide(x) {
  if (isTransitionRunning_03) {
    return;
  }
  rlc_slide_03.style.transition = "right 0.5s,left 0.5s";
  if (x > 0) {
    slide_distance_03 += 33.66;
    rlc_slide_03.style.left = `-${slide_distance_03}%`;
  }
  if (x < 0) {
    slide_distance_03 -= 33.66;
    rlc_slide_03.style.left = `-${slide_distance_03}%`;
  }
  isTransitionRunning_03 = true;
}
rlc_slide_03.addEventListener("transitionend", () => {
  console.log(slide_distance_03);
  isTransitionRunning_03 = false;
  if (slide_distance_03 == 302.93999999999994) {
    rlc_slide_03.style.transition = "right 0s,left 0s";
    slide_distance_03 = 168.29999999999998;
    rlc_slide_03.style.left = `-${slide_distance_03}%`;
  } else {
    if (slide_distance_03 == 0) {
      rlc_slide_03.style.transition = "right 0s,left 0s";
      slide_distance_03 = 134.64;
      rlc_slide_03.style.left = `-${slide_distance_03}%`;
    }
  }
});
/*-----------------------------------------------------*/
/* End rlc-03  */
/*-----------------------------------------------------*/
/* ----------- rlc-02 mobile ------------------------*/
let rlc_slide_03_mobile = document.querySelector(".rlc-03-slider-mobile");
let slides_03_mobile = document.querySelectorAll(".rlc-03-slider-mobile > div");
let currentSlide_03_mobile = 1;
rlc_slide_03_mobile.style.left = `${-currentSlide_03_mobile * 100}%`;

function rlc_03_slide_mobile(x) {
  currentSlide_03_mobile += x;
  if (currentSlide_03_mobile >= slides_03_mobile.length) {
    return;
  } else if (currentSlide_03_mobile <= -1) {
    return;
  }
  rlc_slide_03_mobile.style.transition = "left 0.5s ease-in-out";
  rlc_slide_03_mobile.style.left = `${-currentSlide_03_mobile * 100}%`;
}
rlc_slide_03_mobile.addEventListener("transitionend", () => {
  if (currentSlide_03_mobile >= slides_03_mobile.length - 1) {
    currentSlide_03_mobile = 1;
    rlc_slide_03_mobile.style.transition = "left 0s";
    rlc_slide_03_mobile.style.left = `${-currentSlide_03_mobile * 100}%`;
  } else if (currentSlide_03_mobile <= 0) {
    currentSlide_03_mobile = slides_03_mobile.length - 2;
    rlc_slide_03_mobile.style.transition = "left 0s";
    rlc_slide_03_mobile.style.left = `${-currentSlide_03_mobile * 100}%`;
  }
});

/* ----------- rlc-02 mobile ------------------------*/
/*--------- responsive footer -----------*/
let mobile = true;
let tablet = true;
let btn_menu = document.querySelectorAll("footer .mobile");
btn_menu = Array.from(btn_menu);
window.addEventListener("resize", () => {
  if (window.innerWidth <= 600) {
    if (mobile) {
      btn_menu.forEach((e) => {
        e.parentElement.nextElementSibling.style.height = "0px";
      });
      mobile = false;
      tablet = true;
    }
  } else if (window.innerWidth >= 600) {
    if (tablet) {
      btn_menu.forEach((e) => {
        e.parentElement.nextElementSibling.style.height = "auto";
      });
      mobile = true;
      tablet = false;
    }
  }
});

btn_menu.forEach((ele) => {
  ele.addEventListener("click", () => {
    if (ele.parentElement.nextElementSibling.style.height == "0px") {
      let Eheight =
        ele.parentElement.nextElementSibling.firstElementChild.getBoundingClientRect()
          .height;
      let Liheight =
        ele.parentElement.nextElementSibling.firstElementChild.lastElementChild.getBoundingClientRect()
          .height;

      ele.parentElement.nextElementSibling.style.height = `${
        Eheight + Liheight * 2
      }px`;
    } else {
      ele.parentElement.nextElementSibling.style.height = "0px";
    }
  });
});
