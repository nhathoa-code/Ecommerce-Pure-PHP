<?php
session_start();
require_once '../../public/model/connectdb.php';
$id = $_GET['id'];
$query = "select sizetype from product where productid = " . $id;
$result = $conn->query($query);
$sizetype = $result->fetch(PDO::FETCH_ASSOC)['sizetype'];
$query = 'select * from product where productid = ' . $id;
$result = $conn->query($query);
$product = $result->fetch(PDO::FETCH_ASSOC);
$query = "update product set views = views + 1 where productid = $id";
$conn->exec($query);
$dir = $product['images'];
$Category = $product['category'];
$arr = scandir("../../public/images/$dir");
array_shift($arr);
array_shift($arr);
foreach ($arr as $key => $value) {
    if (pathinfo($arr[$key], PATHINFO_FILENAME) == "cart_image") {
        array_splice($arr, $key, 1);
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./ProductDetail.css">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #mini-cart {
            position: fixed;
            right: 0;
            z-index: 10;
            width: 25%;
            transition: height 0.5s ease-in-out;
            overflow: hidden;
            height: 0;
        }

        #mini-cart-wrap {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            background-color: white;
        }

        #mini-cart-image {
            padding: 0.25rem 0.85rem;
        }

        #mini-cart-image img {
            width: 100%;
            height: auto;
        }

        #mini-cart-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 0 0.5rem;
        }

        #mini-cart-info p {
            margin-bottom: 1rem;
        }

        #mini-cart-info a {
            text-decoration: none;
            color: #6d6f73;
        }
    </style>
</head>

<body>
    <div style="position: fixed;display:none" class="effect">
        <div class="loader-size">

        </div>
    </div>
    <div id="mini-cart">
        <div id="mini-cart-wrap">
            <div id="mini-cart-image">
                <img src="" alt="">
            </div>
            <div id="mini-cart-info">
                <p>One item added to your cart</p>
                <a href="../Cart/cart_view.php">Check out</a>
            </div>
        </div>
    </div>
    <?php include_once '../View/header.php'; ?>
    <main>
        <div class="container">
            <div class="imagery">
                <div class="imagery_row">
                    <div>
                        <a href="">
                            <img src="<?php echo '/ASM/public/images/' . $dir . '/main_image1.jpg' ?>" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="<?php echo '/ASM/public/images/' . $dir . '/main_image2.jpg' ?>" alt="">
                        </a>
                    </div>
                </div>
                <?php
                $arr = array_filter($arr, function ($element) {
                    if (pathinfo($element, PATHINFO_FILENAME) != "main_image1" && pathinfo($element, PATHINFO_FILENAME) != "main_image2") {
                        return $element;
                    }
                });
                ?>
                <div class="tabs">
                    <div>
                        <button name="description">MIÊU TẢ</button>
                    </div>
                    <div>
                        <button name="details">CHI TIẾT</button>
                    </div>
                    <div>
                        <button name="shipping_returns">GIAO HANG & ĐỔI TRẢ</button>
                    </div>
                </div>
                <div style="display: block;" id="description" class="Tabs">
                    <p>
                        <?php
                        echo $product['description'];
                        ?>
                    </p>
                </div>
                <div style="display: none;" id="details" class="Tabs">
                    <ul id="details_row">
                        <?php
                        $product_details = explode("|", $product['details']);
                        foreach ($product_details as $product_detail) :
                        ?>
                            <li><?php echo rtrim($product_detail); ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div style="display: none;" id="shipping_returns" class="Tabs">
                    <h3>
                        Miến phí giao hàng cho đơn hàng từ 150$.
                    </h3>
                    <h3>
                        Nhận hàng vào thứ tư,ngày 16 tháng 6, if bạn đặt hàng vào 3 giờ chiều và chọn phương thức giao hàng nhanh.
                    </h3>
                    <h3>
                        Miễn phí đổi trả.
                    </h3>
                    <p>
                        Miễn phí đổi trả trong vòng 30 ngày tính từ ngày nhận hàng.Những vật phẩm cá nhân và hộp quà tặng không thể đổi trả.
                    </p>
                    <p>
                        <a href="">
                            Thông tin giao hàng
                        </a>
                    </p>
                    <p>
                        <a href="">
                            Thông tin đổi trả
                        </a>
                    </p>
                    <p id="last">
                        Ralph Lauren cung cấp những kiện hàng với kích thước được thiết kế vừa đủ để tiết kiệm.Để nhận đơn hàng của bạn với kiện hàng có kích thước tiết kiệm,chọn ô check giao hàng tiết kiệm.
                    </p>
                </div>
                <div class="imagery_row">
                    <?php foreach ($arr as $value) : ?>
                        <div>
                            <a href="">
                                <img src="<?php echo '/ASM/public/images/' . $dir . '/' . $value ?>" alt="">
                            </a>
                        </div>
                    <?php
                        break;
                    endforeach;
                    array_shift($arr);
                    ?>
                    <?php foreach ($arr as $key => $value) : ?>
                        <?php if (pathinfo($arr[$key], PATHINFO_EXTENSION) == "mp4") : ?>
                            <div style="overflow: hidden;position: relative;">
                                <video id="video" style="width: 111.2%;" muted="muted" loop autoplay src="<?php echo '/ASM/public/images/' . $dir . '/' . $value ?>"></video>
                                <div id="video_control"></div>
                            </div>
                            <?php
                            array_splice($arr, $key, 1);
                            break;
                            ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php foreach ($arr as $key => $value) : ?>
                        <div>
                            <a href="">
                                <img src="<?php echo '/ASM/public/images/' . $dir . '/' . $value ?>" alt="">
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-----------------Comment------------------->
                <h1>comment</h1>
                <div id="comment_container">
                    <?php
                    $query = "select * from comment where productid = $id";
                    $comments = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($comments as $comment) :
                        $query = "select name from user where userid = " . $comment['userid'];
                        $name = $conn->query($query)->fetch(PDO::FETCH_ASSOC)['name'];
                    ?>
                        <div data-id="<?= $comment['id'] ?>" class="comment">
                            <div class="comment-info">
                                <div>
                                    <span><?= $name ?></span>
                                    <?php
                                    if (isset($_SESSION["userid"]) && ($_SESSION['userid'] == $comment['userid'])) :
                                    ?>
                                        <div class="btn-container">
                                            <button data-id="<?= $comment['id'] ?>" class="edit">Edit</button>
                                            <button data-id="<?= $comment['id'] ?>" class="delete">Delete</button>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <span><?php echo nl2br($comment['commentDate']) ?></span>
                            </div>
                            <textarea data-id="<?= $comment['id'] ?>" readonly class="message"><?= $comment['message'] ?></textarea>
                        </div>
                    <?php endforeach ?>


                </div>
                <?php if (isset($_SESSION['userid'])) : ?>
                    <form action="">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="userid" value="19">
                        <input type="hidden" name="productid" value="<?= $id ?>">
                        <div>
                            <textarea rows="3" id="message" name="message"></textarea>
                        </div>
                        <button class="btn">Comment</button>
                    </form>
                <?php else : ?>
                    <div id="login-to-comment">
                        <a href="/ASM/user/Account/Account.php">Login to comment</a>
                    </div>
                <?php endif ?>
                <!-----------------Comment------------------->
                <div class="option">
                    <p class="brand_name">Brandname: <?php echo $product['brandname'] ?></p>
                    <div style="margin:1rem 0" class="product_name">
                        <h1>Name: <?php echo $product['name'] ?></h1>
                        <a href=""></a>
                    </div>
                    <p style="margin-bottom:1rem" class="price">
                        Price: $<?php echo $product['price'] ?>
                    </p>
                    <div class="size">
                        <?php
                        if ($sizetype == "one") :
                        ?>
                            <p style="color: #041e3a;">onesize</p>
                        <?php else : ?>
                            <ul>
                                <?php
                                $query = 'select XS,S,M,L,XL from product_quantity where productid = ' . $id;
                                $result = $conn->query($query);
                                $quantity = $result->fetch(PDO::FETCH_ASSOC);
                                foreach ($quantity as $key => $value) :
                                ?>
                                    <li>
                                        <button class="<?php echo $value > 0 ? "" : "disabled" ?> product-size" data-size="<?php echo $key ?>"><?php echo $key ?></button>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </div>
                    <div class="size_chart">
                        <a>
                            <img src="https://cdn-vzn.yottaa.net/5e18d625d9314057054ee33e/www.ralphlauren.com/v~4b.1a/on/demandware.static/Sites-RalphLauren_US-Site/-/default/dw9811658d/images/df-size-shart.svg?yocs=1_v_" alt="">
                            <span>Bảng Kích Thước</span>
                        </a>
                    </div>

                    <?php
                    // kiểm tra sản phẩm này có còn số lượng tồn kho hay không ? 
                    if ($sizetype == "one") {
                        $query = "select quantity from quantity where productid = $id";
                        $quantity = intval($conn->query($query)->fetch()[0]);
                    } else {
                        $query = "select XS,S,M,L,XL from product_quantity where productid = $id";
                        $sizes = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC)[0];
                        $check = false;
                        foreach ($sizes as $size) {
                            if (intval($size) > 0) {
                                $check = true;
                                break;
                            }
                        }
                    }
                    // kiểm tra sản phẩm một kích thước
                    if ($sizetype == "one") {
                        if ($quantity > 0) {
                            echo " <div data-sizetype='$sizetype' data-id='$id' class='add_bag'>
                            <button id='add_to_cart'>ADD TO CART</button>
                            <div class='loader-cart' style='display: none;'>
                            </div>
                        </div>";
                        } else {
                            echo " <p style='margin-top:0.5rem' class='quantity-error'>This product is temporary out of stock</p>";
                        }
                    } else {
                        if ($check) {
                            echo " <div data-sizetype='$sizetype' data-id='$id' class='add_bag'>
                            <button id='add_to_cart'>ADD TO CART</button>
                            <div class='loader-cart' style='display: none;'>
                            </div>
                        </div>";
                        } else {
                            echo " <p style='margin-top:0.5rem' class='quantity-error'>This product is temporary out of stock</p>";
                        }
                    }

                    ?>
                    <div class="find_in_store">
                        <a href="">FIND IN STORE</a>
                    </div>
                    <div class="appointment">
                        <p>
                            Để biết thêm thông tin về sản phẩm này,hãy đặt hẹn trước hoặc gọi điện
                        </p>
                        <a href="">BOOK AN APPOITMENT</a>
                    </div>
                    <div class="callout-message">
                        <h2>
                            GIAO HÀNG NHANH ĐỐI VỚI HÓA ĐƠN TỪ 150$
                        </h2>
                    </div>
                </div>
            </div>
            <!-- san pham cung danh muc -->
            <?php
            $query = "select * from product where category = '$Category' and productid not in($id) order by productid desc limit 0,3";
            $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            if (count($products) > 0) :
            ?>
                <div id="more">
                    <h1>
                        Bạn Có Thể Quan Tâm
                    </h1>
                    <div class="more_row">
                        <?php
                        foreach ($products as $product) :
                        ?>
                            <div>
                                <a href="/ASM/user/Product/ProductDetail.php?id=<?= $product['productid'] ?>">
                                    <img src="../../public/images/<?php echo $product['images'] . "/main_image2.jpg" ?>" alt="">
                                </a>
                                <div class="more-product">
                                    <p class="brand_name"><?= $product['brandname'] ?></p>
                                    <h3 class="more-product-name"><?= $product['name'] ?></h3>
                                    <p class="more-product-price">
                                        $<?= $product['price'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
            <!-- san pham cung danh muc -->
        </div>
    </main>
    <footer>
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
    <script src="./ProductDetail.js"></script>
    <script>
        let size = '';
        $(".product-size").click(function() {
            if ($(".size-error").length) {
                $(".size-error").remove();
            }
            if (!$(this).hasClass("selected")) {
                if ($(".selected").length) {
                    $(".selected").removeClass("selected");
                }
                $(".effect").show();
                setTimeout(() => {
                    size = $(this).attr("data-size");
                    $(".effect").hide();
                    $(this).addClass("selected");
                }, 1000)
            }
        })

        $(".add_bag").on("click", addcart);
        let timeout;

        function addcart() {
            if ($(this).attr("data-sizetype") == "one") {
                size = "hello world";
            }
            if (size == '') {
                if (!$(".size-error").length) {
                    clearTimeout(timeout);
                    $(".size_chart").after("<p class='size-error'>Please select a Size !</p>");
                    timeout = setTimeout(() => {
                        $(".size-error").remove();
                    }, 2000)
                }
            } else {
                $(".add_bag").off("click");
                $("#add_to_cart").hide();
                $(".loader-cart").show();
                setTimeout(() => {
                    $.ajax({
                        url: "/ASM/user/Cart/cart_control.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "size": size,
                            "id": $(this).attr("data-id"),
                            "action": "add",
                            "sizetype": $(this).attr("data-sizetype")
                        },
                        success: function(data) {
                            if (data.quantity_error != "") {
                                if (!$(".quantity-error").length) {
                                    clearTimeout(timeout);
                                    if (data.quantity_error == "out of stock") {
                                        $(".add_bag").before("<p class='quantity-error'>Only " + data.remain_quantity + " of this product left in stock!</p>");
                                    } else {
                                        $(".add_bag").before("<p class='quantity-error'>Quantity exceeded,can not buy more than 10 of same item !</p>");
                                    }
                                    timeout = setTimeout(() => {
                                        $(".quantity-error").remove();
                                        $(".add_bag").on("click", addcart);
                                    }, 3000)
                                }
                            } else {
                                $("#mini-cart-image > img").attr("src", "../../public/images/" + data.dir + "/cart_image.png");
                                if ($(window).scrollTop() == 0) {
                                    $("#mini-cart").css("top", $("header").height());
                                    $("#mini-cart").css("height", "160px");
                                } else {
                                    $("#mini-cart").css("top", menuHeight * 1.7);
                                    $("#mini-cart").css("height", "160px");
                                }
                                setTimeout(() => {
                                    $("#mini-cart").css("height", "0px");
                                }, 3000)
                            }
                            $("#add_to_cart").show();
                            $(".loader-cart").hide();
                            if ($("#items").css("display") == "none") {
                                $("#items").css("display", "block");
                                $("#items").html(data.items);
                            } else {
                                $("#items").html(data.items);
                            }
                        },
                        error: function(message) {
                            console.log(message);
                        }
                    });
                }, 1000)
            }
        }
        let menuHeight = $(".menu").height();
        $("#mini-cart").on("transitionend", function() {
            if ($("#mini-cart").css("height") == "0px") {
                $(".add_bag").on("click", addcart);
            }
        })
        $("#category").off("mouseleave");
        $("#category").on("mouseleave", function() {
            $("#category").css("height", "0px");
        });
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
        $("form").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "comment_control.php",
                method: "post",
                data: $(this).serialize(),
                success: function(data) {
                    $("#comment_container").append(data);
                    $("#message").val("");
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
        $(document).on("click", ".edit", function() {
            let message = $("textarea[data-id=" + $(this).data("id") + "]").val();
            $("textarea[data-id=" + $(this).data("id") + "]").removeAttr("readonly");
            $("textarea[data-id=" + $(this).data("id") + "]").focus();
            $("textarea[data-id=" + $(this).data("id") + "]").val("");
            $("textarea[data-id=" + $(this).data("id") + "]").val(message);
        })
        $(document).on("blur", ".message", function() {
            $.ajax({
                url: "comment_control.php",
                method: "post",
                data: {
                    "action": "edit",
                    "id": $(this).data("id"),
                    "message": $(this).val()
                },
                success: function(data) {
                    $("textarea[data-id=" + data + "]").attr("readonly", true);
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
        $(document).on("click", ".delete", (function() {
            $.ajax({
                url: "comment_control.php",
                method: "post",
                data: {
                    "action": "delete",
                    "id": $(this).data("id")
                },
                success: function(data) {
                    $("div.comment[data-id=" + data + "]").remove();
                },
                error: function(message) {
                    console.log(message);
                }
            })
        }))
    </script>
</body>

</html>