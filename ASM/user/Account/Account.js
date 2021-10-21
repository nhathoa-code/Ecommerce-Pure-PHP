let menu = document.querySelector(".menu");
let menu_height = menu.getBoundingClientRect().height;
let header_info = document.querySelector(".header-intro");
let header_info_height = header_info.getBoundingClientRect().height;
let menu_top = menu.getBoundingClientRect().top;
let container = document.querySelector("#container-wrap");
let toggle_nav = document.querySelector(".toggle_nav");
let ismenuShow = false;
let menu_mobile = document.querySelector(".menu-mobile");
let isMenufixed = false;
let login = document.querySelector("#login-tab");
let create_login = document.querySelector("#createlogin-tab");
let login_panel = document.querySelector("#login-panel");
let create_login_panel = document.querySelector("#createlogin-panel");
let order_track = document.querySelector(".order-track");
let benefits = document.querySelector(".benefits");
let tabletMode = false;
login.style.backgroundColor = "transparent";
login_panel.style.display = "block";
order_track.style.display = "block";
create_login.style.backgroundColor = "rgb(239, 239, 239)";
create_login_panel.style.display = "none";
benefits.style.display = "none";
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
    }
  } else if (tabletMode) {
    if (window.innerWidth >= 1000) {
      tabletMode = false;
    }
  }
});

window.addEventListener("scroll", () => {
  if (!tabletMode) {
    if (window.scrollY >= menu_top) {
      if (!isMenufixed) {
        menu.style.position = "fixed";
        menu.style.backgroundColor = "white";
        menu.style.top = 0;
        container.style.marginTop = 48 + menu_height + "px";
        isMenufixed = true;
      }
    } else {
      if (isMenufixed) {
        menu.style.position = "";
        menu.style.backgroundColor = "";

        container.style.marginTop = "";
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
  //       isMenufixed = true;
  //       container.style.marginTop = 48 + menu_height + "px";
  //     }
  //   } else {
  //     if (isMenufixed) {
  //       menu.style.position = "";
  //       menu.style.backgroundColor = "";
  //       menu.style.top = "";
  //       isMenufixed = false;
  //       container.style.marginTop = "";
  //     }
  //   }
  // }
});

function toggle_Tab(x) {
  if (x.getAttribute("id") == "login-tab") {
    x.style.backgroundColor = "transparent";
    login_panel.style.display = "block";
    order_track.style.display = "block";
    create_login.style.backgroundColor = "rgb(239, 239, 239)";
    create_login_panel.style.display = "none";
    benefits.style.display = "none";
  } else if (x.getAttribute("id") == "createlogin-tab") {
    x.style.backgroundColor = "transparent";
    login_panel.style.display = "none";
    order_track.style.display = "none";
    login.style.backgroundColor = "rgb(239, 239, 239)";
    create_login_panel.style.display = "block";
    benefits.style.display = "block";
  }
}

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
/* -------------------------------------------*/
let input_elements = document.querySelectorAll(".input_element");
input_elements = Array.from(input_elements);
let pass_confirm = document.querySelector("#password_confirm");
input_elements.forEach((e) => {
  e.addEventListener("blur", () => {
    if (e.value !== "") {
      e.nextElementSibling.style.transition = "all 0.3s";
      e.nextElementSibling.style.top = "20%";
      e.nextElementSibling.style.fontSize = "0.65em";
      e.style.border = "";
      if (e.parentElement.nextElementSibling.classList.contains("error")) {
        e.parentElement.nextElementSibling.remove();
      }
    } else {
      e.style.border = "1px solid red";
      if (document.querySelector(".error_confirm")) {
        document.querySelector(".error_confirm").remove();
      }
      if (!e.parentElement.nextElementSibling.classList.contains("error")) {
        e.parentElement.insertAdjacentHTML(
          "afterend",
          "<p class='error'>Không được để trống !</p>"
        );
      }
      e.nextElementSibling.style.transition = "all 0.3s";
      e.nextElementSibling.style.top = "";
      e.nextElementSibling.style.fontSize = "";
    }
  });
});
$("document").ready(function () {
  $(".effect-account").hide();
  $("#create_account").submit(function (event) {
    event.preventDefault();
    let email = $("#email").val();
    let password = $("#password").val();
    let password_confirm = $("#password_confirm").val();
    let username = $("#username").val();
    let name = $("#name").val();
    if (email == "") {
      if ($("#email").parent().next().attr("class") !== "error") {
        $("#email")
          .parent()
          .after("<p class='error'>Không được để trống !</p>");
        $("#email").css("border", "1px solid red");
      }
    } else {
      $("#email").css("border", "");
      if ($("#email").parent().next().attr("class") == "error") {
        $("#email").parent().next().remove();
      }
    }
    if (password == "") {
      if ($("#password").parent().next().attr("class") !== "error") {
        $("#password")
          .parent()
          .after("<p class='error'>Không được để trống !</p>");
        $("#password").css("border", "1px solid red");
      }
    } else {
      $("#password").css("border", "");
      if ($("#password").parent().next().attr("class") == "error") {
        $("#password").parent().next().remove();
      }
    }
    if (password_confirm == "") {
      if ($(".error_confirm").length) {
        $(".error_confirm").remove();
      }
      if ($(".confirm_empty").length) {
      } else {
        $("#password_confirm")
          .parent()
          .after("<p class='error confirm_empty'>Không được để trống !</p>");
        $("#password_confirm").css("border", "1px solid red");
      }
    } else {
      if ($(".error_confirm").length) {
        $(".error_confirm").remove();
      }
      if ($(".confirm_empty").length) {
        $(".confirm_empty").remove();
      }
      $("#password_confirm").css("border", "");
    }
    if (username == "") {
      if ($("#username").parent().next().attr("class") !== "error") {
        $("#username")
          .parent()
          .after("<p class='error'>Không được để trống !</p>");
        $("#username").css("border", "1px solid red");
      }
    } else {
      $("#username").css("border", "");
      if ($("#username").parent().next().attr("class") == "error") {
        $("#username").parent().next().remove();
      }
    }
    if (name == "") {
      if ($("#name").parent().next().attr("class") !== "error") {
        $("#name").parent().after("<p class='error'>Không được để trống !</p>");
        $("#name").css("border", "1px solid red");
      }
    } else {
      $("#name").css("border", "");
      if ($("#name").parent().next().attr("class") == "error") {
        $("#name").parent().next().remove();
      }
    }
    if (password !== "" && password_confirm !== "") {
      if (password !== password_confirm) {
        if ($(".error_confirm").length) {
        } else {
          $("#password_confirm").css("border", "1px solid red");
          $("#password_confirm")
            .parent()
            .after(
              "<p class='error_confirm'>Mật khẩu nhập lại không đúng !</p>"
            );
        }
      } else {
        $("#password_confirm").css("border", "");
        if ($(".error_confirm").length) {
          $(".error_confirm").remove();
        }
      }
    } else {
      if (
        $("#password_confirm").parent().next().attr("class") == "error_confirm"
      ) {
        $("#password_confirm").parent().next().remove();
      }
    }
    if (
      email !== "" &&
      password !== "" &&
      password_confirm !== "" &&
      username !== "" &&
      name !== "" &&
      password == password_confirm
    ) {
      $(".effect-account").show();
      input_elements.forEach((e) => {
        e.blur();
      });
      setTimeout(() => {
        $.ajax({
          url: "insert_user.php",
          method: "POST",
          data: $(this).serialize(),
          success: function () {
            $("#create_account")[0].reset();
            input_elements.forEach((e) => {
              e.nextElementSibling.style.top = "";
              e.nextElementSibling.style.fontSize = "";
            });
            $(".effect-account").hide();
          },
        });
      }, 2000);
    }
  });
  $("#login_account").submit(function (event) {
    event.preventDefault();
    input_elements.forEach((e) => {
      e.blur();
    });
    let email = $("#login_email").val();
    let password = $("#login_password").val();
    if (email == "") {
      if ($(".error_match").length) {
        $(".error_match").remove();
      }
      if ($("#login_email").parent().next().attr("class") !== "error") {
        $("#login_email")
          .parent()
          .after("<p class='error'>Không được để trống !</p>");
        $("#login_email").css("border", "1px solid red");
      }
    } else {
      $("#login_email").css("border", "");
      if ($("#login_email").parent().next().attr("class") == "error")
        $("#login_email").parent().next().remove();
    }
    if (password == "") {
      if ($(".error_match").length) {
        $(".error_match").remove();
      }
      if ($("#login_password").parent().next().attr("class") !== "error") {
        $("#login_password")
          .parent()
          .after("<p class='error'>Không được để trống !</p>");
        $("#login_password").css("border", "1px solid red");
      }
    } else {
      $("#login_password").css("border", "");
      if ($("#login_password").parent().next().attr("class") == "error")
        $("#login_password").parent().next().remove();
    }
    if (email !== "" && password !== "") {
      $(".effect-account").show();
      if ($(".error_match").length) {
        $(".error_match").remove();
      }
      setTimeout(() => {
        $.ajax({
          url: "login.php",
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function (data) {
            $(".effect-account").hide();
            if (data.error) {
              if (
                $("#login_password").parent().next().attr("class") !== "error"
              ) {
                $("#login_password")
                  .parent()
                  .after(
                    "<p class='error error_match'>" + data.message + " !</p>"
                  );
              }
            } else {
              window.location = "/ASM/user/Index/index.php";
            }
          },
          error: function (message) {
            console.log(message.responseText);
          },
        });
      }, 2000);
    }
  });
});
