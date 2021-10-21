<?php session_start();
require_once '../../public/mail.php';
if (isset($_POST['submit'])) {
    $name = $_POST['hoten'];
    $email = $_POST['email'];
    $message = $_POST['noidung'];
    guimail("nhathoa524@gmail.com", $email, $name, $message);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./lienhe.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<body>
    <?php require_once '../View/header.php'; ?>
    <div id="container">
        <h1>LIÊN HỆ</h1>
        <div id="createlogin-panel">
            <form action="" method="post" id="create_account">
                <div class="create-login-control">
                    <input class="input_element" type="text" name="hoten">
                    <span>* HỌ TÊN</span>
                </div>
                <div class=" create-login-control">
                    <input class="input_element" type="email" name="email">
                    <span>* EMAIL</span>
                </div>
                <div class="create-login-control">
                    <textarea placeholder="* NỘI DUNG" name="noidung" class="input_element" rows="4"></textarea>
                    <span></span>
                </div>
                <div class="btn-create-account">
                    <button type="submit" name="submit">
                        LIÊN HỆ
                    </button>
                </div>
            </form>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125425.45083481718!2d106.52170096014828!3d10.769480837144025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752c5cf23fea9b%3A0xf90336df39f53731!2sB%C3%ACnh%20T%C3%A2n%2C%20Ho%20Chi%20Minh%20City%2C%20Vietnam!5e0!3m2!1sen!2s!4v1627227770168!5m2!1sen!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>
    <?php require_once '../View/footer.php'; ?>
    <script>
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

        $("#category").off("mouseleave");
        $("#category").on("mouseleave", function() {
            $("#category").css("height", "0px");
        })
        $("#category-toggle").off("mouseleave");
        $("#category-toggle").on("mouseleave", function() {
            timeout_category = setTimeout(() => {
                $("#category").css("height", "0px");
            }, 1000)
        })
        $("#search-toggle").off("click");
        $("#search-toggle").on("click", function() {
            if ($("#search-container").css("height") == "0px") {
                $("#search-container").css("height", "65vh");
            } else {
                $("#search-container").css("height", "0px");
            }
        })
        $("#search-form").off("submit");
        $("#search-form").on("submit", function(event) {
            event.preventDefault();
            if ($("#search").val() == "") {
                $("#search-container").css("height", "0px");
            } else {
                window.location.href = "/ASM/user/View/searchlist.php?keyword=" + $("#search").val();
            }

        })
    </script>
</body>

</html>