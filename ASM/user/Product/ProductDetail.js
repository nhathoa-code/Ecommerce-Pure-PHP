let Description = document.querySelector("#description");
let Details = document.querySelector("#details");
let Shipping_Returns = document.querySelector("#shipping_returns");
let toggle_nav = document.querySelector(".toggle_nav");
let ismenuShow = false;
let menu_mobile = document.querySelector(".menu-mobile");
let Tabs_control = document.querySelectorAll(".tabs button");
let Tabs = document.querySelectorAll(".Tabs");
Tabs_control = Array.from(Tabs_control);
let container = document.querySelector(".container");
let container_height = container.getBoundingClientRect().height;
console.log(container_height);
let menu = document.querySelector(".menu");
let menu_height = menu.getBoundingClientRect().height;
let menu_top = menu.getBoundingClientRect().top;
let option = document.querySelector(".option");
let option_top = option.getBoundingClientRect().top;
let Container = document.querySelector(".container");
let Video = document.querySelector("#video");
let Video_control = document.querySelector("#video_control");
let tabletMode = false;
let isMenufixed = false;
let isOptionfixed = false;
let isOptionMiddlefixed = false;

window.addEventListener("scroll", () => {
  if (!tabletMode) {
    if (window.scrollY <= 20) {
      option.style.position = "absolute";
      option.style.top = 0;
    }
  }
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
  // if (!tabletMode) {
  //   if (window.scrollY >= 80) {
  //     if (!isMenufixed) {
  //       menu.style.position = "fixed";
  //       menu.style.backgroundColor = "white";
  //       menu.style.top = 0;
  //       Container.style.marginTop = `${
  //         menu_height +
  //         parseFloat(getComputedStyle(Container).marginTop.slice(0, 4))
  //       }px`;
  //       isMenufixed = true;
  //     }
  //   } else {
  //     if (isMenufixed) {
  //       menu.style.position = "";
  //       menu.style.backgroundColor = "";
  //       Container.style.marginTop = `${
  //         parseFloat(getComputedStyle(Container).marginTop.slice(0, 4)) -
  //         menu_height
  //       }px`;
  //       isMenufixed = false;
  //     }
  //   }
  // }
  console.log(option.getBoundingClientRect().top);
  if (!tabletMode) {
    if (window.scrollY >= option_top - 100 - menu_top) {
      if (!isOptionfixed) {
        option.style.position = "fixed";
        option.style.top = `${menu_height + 50}px`;
        isOptionfixed = true;
      }
    } else {
      if (isOptionfixed) {
        option.style.position = "absolute";
        option.style.top = 0;
        isOptionfixed = false;
      }
    }
    if (window.scrollY >= container_height / 2.3) {
      if (!isOptionMiddlefixed) {
        option.style.position = "absolute";
        option.style.top = `${window.scrollY - 20}px`;
        isOptionMiddlefixed = true;
      }
    } else {
      if (isOptionMiddlefixed) {
        option.style.position = "fixed";
        option.style.top = `${menu_height + 70}px`;
        isOptionMiddlefixed = false;
      }
    }
  }
});

document.querySelector(".tabs button[name='description']").style.color =
  "#041e3a";
document.querySelector(".tabs button[name='description']").style.borderBottom =
  "2px solid #041e3a";
Tabs_control.forEach((ele) => {
  ele.addEventListener("click", () => {
    Tabs_control.forEach((ele) => {
      ele.style.color = "";
      ele.style.borderBottom = "";
    });
    ele.style.color = "#041e3a";
    ele.style.borderBottom = "2px solid #041e3a";
    Tabs.forEach((ele) => {
      ele.style.display = "none";
    });
    document.querySelector(`#${ele.getAttribute("name")}`).style.display =
      "block";
  });
});

Video_control.style.backgroundImage =
  "url(https://cdn-vzn.yottaa.net/5e18d625d9314057054ee33e/www.ralphlauren.com/v~4b.1a/on/demandware.static/Sites-RalphLauren_US-Site/-/en_US/v1623406310746/images/df-stop.svg?yocs=1_)";
Video_control.addEventListener("click", () => {
  if (Video.paused) {
    Video.play();
    Video_control.style.backgroundImage =
      "url(https://cdn-vzn.yottaa.net/5e18d625d9314057054ee33e/www.ralphlauren.com/v~4b.1a/on/demandware.static/Sites-RalphLauren_US-Site/-/en_US/v1623406310746/images/df-stop.svg?yocs=1_)";
  } else {
    Video.pause();
    Video_control.style.backgroundImage =
      "url(https://cdn-vzn.yottaa.net/5e18d625d9314057054ee33e/www.ralphlauren.com/v~4b.1a/on/demandware.static/Sites-RalphLauren_US-Site/-/en_US/v1623406310746/images/df-play.svg?yocs=1_)";
  }
});

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
