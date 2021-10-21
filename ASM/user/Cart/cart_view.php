<?php session_start();
if (isset($_SESSION['username'])) {
    echo '<span id="identify"></span>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./cart_view.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div style="position: fixed;display:none" class="effect">
        <div class="loader">

        </div>
    </div>
    <?php include_once '../View/header.php'; ?>
    <main>
        <div class="container">
            <div class="items_container">
                <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
                    <h1 id="cart_empty">Your cart is currently empty!</h1>
                <?php else : ?>
                    <div class="shopping_bag">
                        <div class="proceed bag">
                            <a>PROCEED</a>
                        </div>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total += $value['quantity'];
                        }
                        ?>
                        <div class="bag_items">
                            <p>SHOPPING BAG (<span id="total"><?php echo $total ?></span>)</p>
                        </div>
                        <?php foreach ($_SESSION['cart'] as $key => $value) :
                            if ($value['size'] != "One size") {
                                $pos = strpos($key, '-');
                                $productid = substr($key, 0, $pos);
                            } else {
                                $productid = $key;
                            }

                        ?>
                            <div class="item">
                                <div class="item_image">
                                    <img src="<?php echo "/ASM/public/images/" . $value['dir'] . "/cart_image.png" ?>" alt="">
                                </div>
                                <div data-key="<?= $key ?>" class="item_info">
                                    <p class="brand_name"><?php echo $value['brandname'] ?></p>
                                    <p class="product_name"><?php echo $value['name'] ?></p>
                                    <p class="product_price">Price: <span><?php echo $value['price'] ?></span>$</p>
                                    <p class="product_detail"><a href="/ASM/user/Product/productDetail.php?id=<?php echo $productid ?>">Detail</a></p>
                                    <p class="product_size">Size: <span class="<?php echo $key ?>"><?php echo $value['size'] ?></span></p>
                                    <p class="product_total">$<span id="<?php echo $key ?>"><?php echo $value['total'] ?></span> </p>
                                    <div class="item_control">
                                        <select class="quantity-control" data-key="<?php echo $key ?>">
                                            <?php
                                            for ($i = 1; $i <= 10; $i++) {
                                                if ($i == $value['quantity']) {
                                                    echo "<option value=" . $i . " selected>" . $value['quantity'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $i . ">" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div data-sizetype="<?php echo $value['sizetype'] ?>" class="item_edit" data-key="<?php echo $key ?>">
                                            <img id="edit_item" src="https://cdn-vzn.yottaa.net/5e18d627d9314057054ee4b0/www.ralphlauren.com/v~4b.1b/on/demandware.static/Sites-RalphLauren_US-Site/-/en_US/v1625585552576/images/cart-edit.svg" alt="">
                                        </div>
                                        <div class="item_delete" data-key="<?php echo $key ?>">
                                            <img src="https://cdn-vzn.yottaa.net/5e18d627d9314057054ee4b0/www.ralphlauren.com/v~4b.1b/on/demandware.static/Sites-RalphLauren_US-Site/-/en_US/v1625585552576/images/close.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!--           Total_info               -->
                        <div class="total_info">
                            <?php
                            $subtotal = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $subtotal += $value['price'] * $value['quantity'];
                            }
                            ?>
                            <div class="cart_total">
                                <p>SUBTOTAL</p>
                                <p>$<span id="subtotal"><?php echo number_format($subtotal, 2, '.', ',') ?></span></p>
                            </div>
                            <div class="cart_total shipping">
                                <p>SHIPPING</p>
                                <p>FREE</p>
                            </div>
                            <div class="proceed">
                                <a>PROCEED</a>
                            </div>
                        </div>
                        <!--           Total_info               -->
                    </div>
                <?php endif ?>
            </div>
        </div>
    </main>
    <div id="update-container">
        <div id="update-panel">
            <div id="close">
                <img src="https://cdn-vzn.yottaa.net/5e18d627d9314057054ee4b0/www.ralphlauren.com/v~4b.1c/on/demandware.static/Sites-RalphLauren_US-Site/-/en_US/v1625738850131/images/interface/Close.svg" alt="">
            </div>
            <div id="image-container">
                <img id="image" src="" alt="">
            </div>
            <div id="product-info">
                <p id="brandname">Polo Ralph Lauren</p>
                <h3 id="name">CLASSIC FIT CHAMBRAY WESTERN SHIRT</h3>
                <p>$<span id="price">100</span></p>
                <div class="size">
                    <div id="one-size">
                        <p>
                            One size
                        </p>
                    </div>
                    <ul>
                        <li>
                            <button class="product-size" data-size="XS">XS</button>
                        </li>
                        <li>
                            <button class="product-size" data-size="S">S</button>
                        </li>
                        <li>
                            <button class="product-size" data-size="M">M</button>
                        </li>
                        <li>
                            <button class="product-size" data-size="L">L</button>
                        </li>
                        <li>
                            <button class="product-size" data-size="XL">XL</button>
                        </li>
                    </ul>
                </div>
                <div class="size_chart">
                    <a href="">
                        <img src="https://cdn-vzn.yottaa.net/5e18d625d9314057054ee33e/www.ralphlauren.com/v~4b.1a/on/demandware.static/Sites-RalphLauren_US-Site/-/default/dw9811658d/images/df-size-shart.svg?yocs=1_v_" alt="">
                        <span>Size Chart</span>
                    </a>
                </div>
                <p id="update-error">This size has already been in your cart !</p>
                <div id="update-size">
                    <button id="add_to_cart">UPDATE</button>
                </div>
            </div>
        </div>
    </div>
    <footer style="margin-top: 10rem;">
        <section class="footer-container">
            <section class="footer">
                <h1><span> CỦA HÀNG </span> <span class="mobile">+</span></h1>
                <ul>
                    <div>
                        <li><a href="">Về Chúng Tôi</a></li>
                        <li><a href="">Cơ Hội Nghề Nghiệp</a></li>
                        <li><a href="">Bản Quyền Thương Hiệu</a></li>
                        <li><a href="">Tìm Cửa Hàng</a></li>
                    </div>
                </ul>
            </section>
            <section class="footer">
                <h1><span>TÀI KHOẢN</span><span class="mobile">+</span></h1>
                <ul>
                    <div>
                        <li><a href="">Tài Khoản Của Tôi</a></li>
                        <li><a href="">Tạo Tài Khoản</a></li>
                        <li><a href="">Trạng Thái Đặt Hàng</a></li>
                        <li><a href="">Lịch Sử Đặt Hàng</a></li>
                    </div>
                </ul>
            </section>
            <section class="footer">
                <h1><span>DỊCH VỤ KHÁCH HÀNG</span> <span class="mobile">+</span> </h1>
                <ul>
                    <div>
                        <li><a href="">Tin Nhắn Online</a></li>
                        <li><a href="">Giải Đáp Thắc Mắc</a></li>
                        <li><a href="">Chính Sách Đổi Trả</a></li>
                        <li><a href="">Phiếu Quà Tặng</a></li>
                    </div>
                </ul>
            </section>
            <section style="border-right: none;" class="footer">
                <h1>ĐĂNG NHẬP BẰNG EMAIL</h1>
                <div id="email_input">
                    <div class="input-email">
                        <input type="text" placeholder="NHẬP ĐỊA CHỈ EMAIL">
                    </div>
                    <div class="submit">
                        <button>SUBMIT</button>
                    </div>
                </div>
                <p>
                    <a href="">Nhấn vào đây</a> để đọc chính sách bảo mật của chúng tôi hoặc <a href="">liên hệ chúng
                        tôi</a>
                </p>
                <p class="language">
                    <i class="fas fa-globe"></i> <span>English</span><a href="">Thay đổi ngôn ngữ</a>
                </p>
            </section>
        </section>
        <section class="mobile">
            <h1>ĐĂNG NHẬP BẰNG EMAIL</h1>
            <div id="email_input">
                <div class="input-email">
                    <input type="text" placeholder="NHẬP ĐỊA CHỈ EMAIL">
                </div>
                <div class="submit">
                    <button>SUBMIT</button>
                </div>
            </div>
            <p>
                <a href="">Nhấn vào đây</a> để đọc chính sách bảo mật của chúng tôi hoặc <a href="">liên hệ chúng
                    tôi</a>
            </p>
            <p class="language">
                <i class="fas fa-globe"></i> <span>English</span><a href="">Thay đổi ngôn ngữ</a>
            </p>
        </section>
        <section class="icons">
            <a href=""><i class="fab fa-facebook-square"></i></a>
            <a href=""><i class="fab fa-youtube-square"></i></a>
            <a href=""><i class="fab fa-twitter-square"></i></a>
            <a href=""><i class="fab fa-instagram-square"></i></a>
        </section>
        <div class="copyright">
            &copy; 2021 BẢN QUYỀN THUỘC VỀ VÒNG NHẬT HÒA
        </div>
    </footer>
    <script src="./cart_view.js"></script>
    <script>

    </script>
    <script>
        let oldsize = "";
        let newsize = "";
        let oldkey = "";
        let newkey = "";
        $(".item_delete").click(function() {
            $(".effect").show();
            setTimeout(() => {
                $.ajax({
                    url: "/ASM/user/Cart/cart_control.php",
                    method: "POST",
                    data: {
                        "key": $(this).attr("data-key"),
                        "action": "delete"
                    },
                    success: function() {
                        $(".effect").hide();
                        location.reload();
                    },
                    error: function(message) {
                        console.log(message);
                    },
                });
            }, 1000);
        });
        $(".quantity-control").on("change", function() {
            $(".effect").show();
            let key = this.getAttribute("data-key");
            setTimeout(() => {
                $.ajax({
                    url: "/ASM/user/Cart/cart_control.php",
                    method: "POST",
                    data: {
                        "key": key,
                        "quantity": this.value,
                        "action": "update-quantity"
                    },
                    dataType: "json",
                    success: function(data) {
                        $(".effect").hide();
                        if (data.quantity_error != "") {
                            if (!$(".item_info[data-key=" + key + "]").next().hasClass("error")) {
                                $(".item_info[data-key=" + key + "]").after("<p class='error'>Only " + data.remain_quantity + " of this product left in stock</p>");
                            }
                            $("select[data-key=" + key + "]").val(data.old_quantity);
                        } else {
                            if ($(".item_info[data-key=" + key + "]").next().hasClass("error")) {
                                $(".item_info[data-key=" + key + "]").next().remove();
                            }
                            $("#" + key).html(data.new_item_total);
                            $("#total").html(data.new_bag_total);
                            $("#items").html(data.new_bag_total);
                            $("#subtotal").html(data.subtotal);
                        }
                    },
                    error: function(message) {
                        console.log(message);
                    },
                });
            }, 1000);
        });
        $(".item_edit").click(function() {
            $.ajax({
                url: "/ASM/user/Cart/cart_control.php",
                method: "POST",
                data: {
                    "key": $(this).attr("data-key"),
                    "action": "fetch-data",
                    "sizetype": $(this).attr("data-sizetype")
                },
                dataType: "json",
                success: function(data) {
                    oldkey = data.key;
                    oldsize = data.size;
                    newsize = data.size;
                    $("button[data-size]").css("border", "");
                    $("body").css({
                        "overflow-y": "hidden",
                        height: "100%",
                    });
                    $("#update-container").css("display", "flex");
                    $("#brandname").html(data.brandname);
                    $("#name").html(data.name);
                    $("#price").html(data.price);
                    $("#image").attr(
                        "src",
                        "/ASM/public/images/" + data.dir + "/main_image1.jpg"
                    );
                    if (data.sizetype != "one") {
                        $(".size > ul").show();
                        $("#one-size").hide();
                        $("button[data-size=" + data.size + "]").css(
                            "border-bottom",
                            "2px solid #041e3a"
                        );
                        data.array.forEach((ele) => {
                            $(".size > ul > li > button[data-size=" + ele + "]").addClass("disabled");
                        })
                    } else {
                        $(".size > ul").hide();
                        $("#one-size").show();
                    }
                },
                error: function(message) {
                    console.log(message);
                }
            });
        });
        $(".product-size").click(function() {
            $(".product-size").css("border-bottom", "");
            $(this).css("border-bottom", "2px solid #041e3a");
            newsize = $(this).attr("data-size");
        });
        $("#update-size").click(function() {
            if ($("#update-error").css("display") == "block") {
                $("#update-error").css("display", "none");
            }
            if (newsize != oldsize) {
                newkey = oldkey.substr(0, 2) + '-' + newsize;
                $(".effect").show();
                setTimeout(() => {
                    $.ajax({
                        url: "/ASM/user/Cart/cart_control.php",
                        method: "POST",
                        data: {
                            "oldkey": oldkey,
                            "newkey": newkey,
                            "oldsize": oldsize,
                            "newsize": newsize,
                            "action": "update-size"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (!data.check) {
                                $("#update-error").css("display", "block");
                                $(".effect").hide();
                            } else {
                                $("." + oldkey).html(newsize);
                                $(".item_delete[data-key=" + oldkey + "]").attr(
                                    "data-key",
                                    newkey
                                );
                                $(".item_edit[data-key=" + oldkey + "]").attr("data-key", newkey);
                                $("." + oldkey).attr("class", newkey);
                                $("#" + oldkey).attr("id", newkey);
                                $(".quantity-control[data-key=" + oldkey + "]").attr(
                                    "data-key",
                                    newkey
                                );
                                $("body").css({
                                    "overflow-y": "",
                                    height: "",
                                });
                                $(".effect").hide();
                                $("#update-container").hide();
                            }
                        },
                        error: function(message) {
                            console.log(message);
                        },
                    });
                }, 1000);
            } else {
                $("#update-container").hide();
                $("body").css({
                    "overflow-y": "",
                    height: "",
                });
            }
        });
        let timeout;
        $(".proceed > a").click(function() {
            if (!$("#identify").length) {
                if (!$(this).parent().prev().hasClass("error")) {
                    $(this).parent().before("<p class='error'>Please login to continue</p>");
                    timeout = setTimeout(() => {
                        $(this).parent().prev().remove();
                    }, 3000)
                }
            } else {
                window.location.href = "/ASM/user/order/order.php";
            }
        })
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