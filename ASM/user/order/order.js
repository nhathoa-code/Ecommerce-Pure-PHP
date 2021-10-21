let input_elements = document.querySelectorAll(".input_element");
input_elements = Array.from(input_elements);
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
let timeout;
// gắn sự kiện submit cho form
$("form").on("submit", function () {
  // kiểm tra xem các trường dữ liệu đã được điền hay chưa
  if (
    $("input[name=name]").val() == "" ||
    $("input[name=email]").val() == "" ||
    $("input[name=phone]").val() == "" ||
    $("input[name=address]").val() == "" ||
    $("select[name=pay_method]").val() == ""
  ) {
    if (!$(".btn-submit").prev().hasClass("error")) {
      $(".btn-submit").before(
        "<p class='error style'>Please filling the form !</p>"
      );
      timeout = setTimeout(() => {
        $(".btn-submit").prev().remove();
      }, 3000);
    }
    // return false(không submit) nếu không thõa mãn điều kiện
    return false;
  } else {
    // ngược lại thì submit(dữ liệu form được gửi đến file order_process.php để xử lý)
    return true;
  }
});
$(document).ready(function () {
  if ($("input[name=name]").val() != "") {
    $("input[name=name]").next().css({
      transition: "",
      top: "20%",
      "font-size": "0.65rem",
    });
    $("input[name=email]").next().css({
      transition: "",
      top: "20%",
      "font-size": "0.65rem",
    });
  }
});
