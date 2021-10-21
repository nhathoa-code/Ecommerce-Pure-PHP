<?php session_start();
require_once '../../public/model/connectdb.php';
$group_size = 4;
if (isset($_GET['level']) && $_GET['level'] == "parent") {
    $data_category = "parent";
    $id = $_GET['id'];
    $query = "select * from product where parent_category = $id";
    $total_products = $conn->query($query)->rowCount();
    $query = "select name from parent_category where id = $id";
    $name = $conn->query($query)->fetch()[0];
    $query = "select * from product where parent_category = $id order by productid desc limit 0,$group_size";
    $result = $conn->query($query);
    $products = $result->fetchAll(PDO::FETCH_ASSOC);
} else if (isset($_GET['level']) && $_GET['level'] == "child") {
    $data_category = "child";
    $id = $_GET['id'];
    $query = "select * from product where category = $id";
    $total_products = $conn->query($query)->rowCount();
    $query = "select category_name from category where categoryid = $id";
    $name = $conn->query($query)->fetch()[0];
    $query = "select * from product where category = $id order by productid desc limit 0,$group_size";
    $result = $conn->query($query);
    $products = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    $id = 0;
    $data_category = "all";
    $query = "select * from product";
    $total_products = $conn->query($query)->rowCount();
    $query = "select * from product order by productid desc limit 0,$group_size";
    $result = $conn->query($query);
    $products = $result->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Productlist.css">
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
    <div id="container">
        <h1>PRODUCT LIST<?php echo isset($name) ? " - " . $name : "" ?></h1>
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
        <div class="view_more">
            <div>
                <div id="results-hits">
                    <?php if ($total_products > $group_size) : ?>
                        1 - <?= $group_size ?> of <?php echo $total_products ?> Items
                    <?php else : ?>
                        1 - <?= $total_products ?> of <?php echo $total_products ?> Items
                    <?php endif ?>

                </div>
                <div class="view-btn">
                    <?php
                    $products_left = $total_products - $group_size;
                    if ($products_left > 0) {
                        if ($products_left > $group_size) {
                            echo "<button data-category='$data_category' data-id='$id' id='view-more'>VIEW $group_size MORE</button>";
                        } else {
                            echo "<button data-category='$data_category' data-id='$id' id='view-more'>VIEW $products_left MORE</button>";
                        }
                        echo ' <div>
                             <a id="viewall">View All</a>
                            </div>';
                    }
                    ?>
                </div>

            </div>
        </div>
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
        let current_group = 1;
        $("#view-more,#viewall").on("click", function() {
            current_group++;
            $.ajax({
                url: "fetchproducts.php",
                method: "POST",
                dataType: "json",
                data: {
                    "current_group": current_group,
                    "total_products": <?= $total_products ?>,
                    "group_size": <?= $group_size ?>,
                    "data-category": "<?= $data_category ?>",
                    "data-id": <?= $id ?>,
                    "moreOrAll": $(this).attr("id")
                },
                success: function(data) {
                    $(".productlist-container").append(data.output);
                    if (data.moreOrAll == "view-more") {
                        if (data.products_left > 0) {
                            $("#results-hits").text("1 - " + current_group * data.group_size + " of " + data.total_products + " Items");
                            if (data.products_left > <?= $group_size ?>) {
                                $("#view-more").text("VIEW " + data.group_size + " MORE");
                            } else {
                                $("#view-more").text("VIEW " + data.products_left + " MORE");
                            }
                        } else {
                            $(".view-btn").html("");
                            $("#results-hits").text("1 - " + data.total_products + " of " + data.total_products + " Items");
                        }
                    } else {
                        $(".view-btn").html("");
                        $("#results-hits").text("1 - " + data.total_products + " of " + data.total_products + " Items");
                    }

                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
    </script>
</body>

</html>