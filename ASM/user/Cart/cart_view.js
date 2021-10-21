$(this).scrollTop(0);
let toggle_nav = document.querySelector(".toggle_nav");
let ismenuShow = false;
let menu_mobile = document.querySelector(".menu-mobile");
let menu = document.querySelector(".menu");
let menu_height = menu.getBoundingClientRect().height;
// let header_info = document.querySelector(".header-intro");
// let header_info_height = header_info.getBoundingClientRect().height;
let menu_top = menu.getBoundingClientRect().top;
let total_info = document.querySelector(".total_info");
let total_info_top = total_info.getBoundingClientRect().top;
let Container = document.querySelector(".container");
let tabletMode = false;
let isMenufixed = false;
let istotal_infofixed = false;

toggle_nav.addEventListener("click", () => {
  if (!ismenuShow) {
    menu_mobile.style.left = 0;
    ismenuShow = true;
  } else {
    menu_mobile.style.left = "-100%";
    ismenuShow = false;
  }
});

window.addEventListener("resize", () => {
  if (!tabletMode) {
    if (window.innerWidth <= 1000) {
      tabletMode = true;
      total_info.style.position = "static";
      total_info.style.top = "";
    }
  } else if (tabletMode) {
    if (window.innerWidth >= 1000) {
      tabletMode = false;
      total_info.style.position = "absolute";
      total_info.style.top = "";
    }
  }
});

window.addEventListener("scroll", () => {
  // if (!tabletMode) {
  //   if (
  //     window.scrollY <=
  //     window.pageYOffset + bag_items.getBoundingClientRect().top
  //   ) {
  //     total_info.style.position = "absolute";
  //     total_info.style.top = "7%";
  //   }
  // }

  if (!tabletMode) {
    if (window.scrollY >= menu_top) {
      if (!isMenufixed) {
        menu.style.position = "fixed";
        menu.style.backgroundColor = "white";
        menu.style.top = 0;
        Container.style.marginTop = `${
          menu_height +
          parseFloat(getComputedStyle(Container).marginTop.slice(0, 4))
        }px`;
        isMenufixed = true;
      }
    } else {
      if (isMenufixed) {
        menu.style.position = "";
        menu.style.backgroundColor = "";
        Container.style.marginTop = `${
          parseFloat(getComputedStyle(Container).marginTop.slice(0, 4)) -
          menu_height
        }px`;
        isMenufixed = false;
      }
    }
  }
  if (!tabletMode) {
    if (window.scrollY >= total_info_top - menu_height) {
      if (!istotal_infofixed) {
        total_info.style.position = "fixed";
        total_info.style.top = menu_height + "px";
        istotal_infofixed = true;
      }
    } else {
      if (istotal_infofixed) {
        total_info.style.position = "absolute";
        total_info.style.top = "90px";
        total_info.style.paddingTop = "";
        istotal_infofixed = false;
      }
    }
  }
});
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
document.querySelector("#close").addEventListener("click", function () {
  document.querySelector("#update-container").style.display = "none";
  $("body").css({
    "overflow-y": "",
    height: "",
  });
});
