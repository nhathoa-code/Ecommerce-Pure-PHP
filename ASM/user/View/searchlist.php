<?php session_start();
require_once '../../public/model/connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Product/Productlist.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .productlist-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 1rem;
            row-gap: 4rem;
        }

        .productlist-container div img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <?php require_once '../View/header.php'; ?>
    <?php
    $keyword = $_GET['keyword'];
    $query = "select * from product where name like '%$keyword%'";
    $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div id="container">

        <?php if (count($products) > 0) : ?>
            <h1><?php echo "(" . count($products) . ")" ?> SEARCH RESULTS FOR: <?php echo $keyword ?></h1>
            <div class="productlist-container">
                <?php foreach ($products as $product) : ?>
                    <div>
                        <a href="/ASM/user/Product/productDetail.php?id=<?php echo $product['productid'] ?>"><img src="../../public/images/<?php echo $product['images'] . '/main_image2.jpg' ?>" alt=""></a>
                        <p class="brandname"><?php echo $product['brandname'] ?></p>
                        <p class="name"><?php echo $product['name'] ?></p>
                        <p class="price">$<?php echo $product['price'] ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else : ?>
            <h1>NO RESULTS FOR: <?php echo $keyword ?> </h1>
        <?php endif ?>
    </div>

    <?php require_once '../View/footer.php'; ?>
    <script>
        $("#category").off("mouseleave");
        $("#category-toggle").off("mouseleave");
        $("#category-toggle").on("mouseleave", function() {
            timeout_category = setTimeout(() => {
                $("#category").css("height", "0px");
            }, 1000)
        })
        $("#category").on("mouseleave", function() {
            $("#category").css("height", "0px");
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