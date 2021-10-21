<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./gioithieu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<body>
    <?php require_once '../View/header.php'; ?>
    <div id="container">
        <h1>GIỚI THIỆU</h1>
        <div>
            <h3>Họ tên: <span>Vòng Nhật Hòa</span> </h3>
            <h3>Email: <span>hoavnps18404@fpt.edu.vn</span> </h3>
            <h3>Địa chỉ: <span>Bình Trị Đông,Bình Tân,TPHCM</span> </h3>
            <h3>Điện thoại: <span>0943166208</span> </h3>
        </div>
    </div>
    <?php require_once '../View/footer.php'; ?>
    <script>
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
        });
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