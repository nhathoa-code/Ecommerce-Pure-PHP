<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #user_container {
            position: absolute;
            width: 20vw;
            height: 0px;
            overflow: hidden;
            top: calc(1.5rem + 100%);
            left: -266%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            box-shadow: -2px 2px 5px black;
            transition: height 0.5s ease-in-out;
        }

        #user_container h1 {
            font-weight: 500;
            color: #041e3a;
            margin-bottom: 1rem;
        }

        #user_container a {
            text-decoration: underline;
            color: #252525;
            cursor: pointer;
        }

        #user_icon:hover div {
            height: 100px;
        }
    </style>
</head>

<body>
    <?php include_once '../View/header.php'; ?>
    <style>
        #items {
            color: white;
        }
    </style>
    <section class="banner">
        <section class="rlc-slide">
            <div>
                <a href="">
                    <img id="IMG" src="./images/Hero/20210518_gift_lp_c01a_hero.jpg" alt="">
                </a>
                <div class="title">
                    <h1>
                        Những Món Quà Tặng Cha
                    </h1>
                    <h3>
                        Xem những món quà đặc biệt của chúng tôi
                    </h3>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </section>
        <section class="rlc-slide">
            <div>
                <a href="">
                    <img src="./images/Hero/20210518_gift_lp_c01b_hero.jpg" alt="">
                </a>
                <div class="title">
                    <h1>
                        Sáng Tạo Theo Cách Của Bạn
                    </h1>
                    <h3>
                        Dành tặng món quà đặc biệt cho họ
                    </h3>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </section>
        <section class="rlc-slide">
            <div>
                <a href="">
                    <img src="./images/Hero/20210518_gift_lp_c01c_hero.jpg" alt="">
                </a>
                <div class="title">
                    <h1>
                        Khao Khát Có Được
                    </h1>
                    <h3>
                        Những món quà chất lượng, hoàn hảo
                    </h3>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </section>
        <section class="rlc-slide">
            <div>
                <a href="">
                    <img src="./images/Hero/20210518_gift_lp_c01d_hero.jpg" alt="">
                </a>
                <div class="title">
                    <h1>
                        Quà Cho Sự Thành Công
                    </h1>
                    <h3>
                        Quà tặng không thể quên
                    </h3>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </section>
        <section class="rlc-slide">
            <div>
                <a href="">
                    <img src="./images/Hero/20210518_gift_lp_c01e_hero.jpg" alt="">
                </a>
                <div class="title">
                    <h1>
                        Quà Dành Cho Gia Chủ
                    </h1>
                    <h3>
                        Những vật dụng phong cách đặc biệt
                    </h3>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </section>
        <i onclick="banner_slide(-1)" class="fas fa-chevron-left"></i>
        <i onclick="banner_slide(1)" class="fas fa-chevron-right"></i>
    </section>

    <section class="rlc-01">
        <div class="rlc-01-row">
            <div class="left">
                <div class="rlc-title">
                    <h1>Những Món Quà Đặc Biệt Của Chúng Tôi Dành Tặng Cho Anh Ấy</h1>
                    <h3>Được làm từ những vật liệu tốt nhất của chúng tôi</h3>
                    <a href="">SHOP NOW</a>
                </div>
                <div class="rlc-01-slide-container">
                    <div class="rlc-01-slider">
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=57">
                                <img src="./images/Banner_a/20210518_gift_lp_c02a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>BaLô Du Lịch Da Dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=65">
                                <img src="./images/Banner_a/20210518_gift_lp_c02b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Len Cashmere</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=62">
                                <img src="./images/Banner_a/20210518_gift_lp_c02c_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Cổ Điển</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=58">
                                <img src="./images/Banner_a/20210518_gift_lp_c02d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Vải Bạt Cotton</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=63">
                                <img src="./images/Banner_a/20210518_gift_lp_c02e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Poplin</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=57">
                                <img src="./images/Banner_a/20210518_gift_lp_c02a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>BaLô Du Lịch Da Dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=65">
                                <img src="./images/Banner_a/20210518_gift_lp_c02b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Len Cashmere</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=62">
                                <img src="./images/Banner_a/20210518_gift_lp_c02c_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Cổ Điển</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=58"><img src="./images/Banner_a/20210518_gift_lp_c02d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Vải Bạt Cotton</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=63">
                                <img src="./images/Banner_a/20210518_gift_lp_c02e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Poplin</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=57">
                                <img src="./images/Banner_a/20210518_gift_lp_c02a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>BaLô Du Lịch Da Dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=65">
                                <img src="./images/Banner_a/20210518_gift_lp_c02b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Len Cashmere</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=62">
                                <img src="./images/Banner_a/20210518_gift_lp_c02c_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Cổ Điển</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=58">
                                <img src="./images/Banner_a/20210518_gift_lp_c02d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Vải Bạt Cotton</h1>
                            </div>
                        </div>
                        <div style="margin-right: 0;">
                            <a href="/ASM/user/Product/productDetail.php?id=63">
                                <img src="./images/Banner_a/20210518_gift_lp_c02e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Poplin</h1>
                            </div>
                        </div>
                    </div>
                    <i onclick="rlc_01_slide(-1)" class="fas fa-chevron-left"></i>
                    <i onclick="rlc_01_slide(1)" class="fas fa-chevron-right"></i>
                </div>
                <div class="rlc-01-slide-container-mobile">
                    <div class="rlc-01-slider-mobile">
                        <div style="margin-right: 0;">
                            <a href="">
                                <img src="./images/Banner_a/20210518_gift_lp_c02e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Poplin</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_a/20210518_gift_lp_c02a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>BaLô Du Lịch Da Dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_a/20210518_gift_lp_c02b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Len Cashmere</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_a/20210518_gift_lp_c02c_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Cổ Điển</h1>
                            </div>
                        </div>
                        <div>
                            <a href=""><img src="./images/Banner_a/20210518_gift_lp_c02d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Vải Bạt Cotton</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_a/20210518_gift_lp_c02e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Áo Sơ Mi Vải Poplin</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_a/20210518_gift_lp_c02a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>BaLô Du Lịch Da Dê</h1>
                            </div>
                        </div>
                    </div>
                    <i onclick="rlc_01_slide_mobile(-1)" class="fas fa-chevron-left"></i>
                    <i onclick="rlc_01_slide_mobile(1)" class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div class="right rela">
                <a href="">
                    <img src="./images/Banner_a/20210518_gift_lp_c03_banner.jpg" alt="">
                </a>
                <div class="rlc-aside-title">
                    <p>Áo Thun Mảnh Polo</p>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>
    <section class="banner-01">
        <a href="">
            <img src="./images/Banner_a/20210518_gift_lp_c04_banner.jpg" alt="">
        </a>
        <div class="title">
            <h1>
                Những Món Quà Tặng Cha
            </h1>
            <h3>
                Những món quà được yêu thích nhất của chúng tôi
            </h3>
            <a href="">SHOP NOW</a>
        </div>
    </section>
    <section class="banner-02">
        <a href="">
            <img src="./images/Banner_a/20210518_gift_lp_c05_banner.jpg" alt="">
        </a>
        <div class="title">
            <h1>
                Khao Khát Có Được
            </h1>
            <h3>
                Những món quà chất lượng, hoàn hảo
            </h3>
            <a href="">SHOP NOW</a>
        </div>
    </section>
    <section class="rlc-02">
        <div class="rlc-02-row">
            <div class="right rela">
                <a href="">
                    <img src="./images/Banner_b/20210518_gift_lp_c06_banner.jpg" alt="">
                </a>
                <div class="rlc-aside-title align-left">
                    <p>Đĩa Salad Vườn Nho</p>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
            <div class="left">
                <div class="rlc-title">
                    <h1>Những Món Dành Tặng Gia Chủ</h1>
                    <h3>Những vật dụng gia đình thanh lịch,tao nhã
                        <br>mang phong cách riêng
                    </h3>
                    <a href="">SHOP NOW</a>
                </div>
                <div class="rlc-02-slide-container">
                    <div class="rlc-02-slider">
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=59">
                                <img src="./images/Banner_b/20210518_gift_lp_c07a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Chăn ấm vùng cao</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=69">
                                <img src="./images/Banner_b/20210518_gift_lp_c20d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Dĩa ăn tối Wilshire</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=68">
                                <img src="./images/Banner_b/20210518_gift_lp_c20a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Cốc cà phê vườn nho</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=59">
                                <img src="./images/Banner_b/20210518_gift_lp_c07a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Chăn ấm vùng cao</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=69">
                                <img src="./images/Banner_b/20210518_gift_lp_c20d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Dĩa ăn tối Wilshire</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=68">
                                <img src="./images/Banner_b/20210518_gift_lp_c20a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Cốc cà phê vườn nho</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=59">
                                <img src="./images/Banner_b/20210518_gift_lp_c07a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Chăn ấm vùng cao</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=69">
                                <img src="./images/Banner_b/20210518_gift_lp_c20d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Dĩa ăn tối Wilshire</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=68">
                                <img src="./images/Banner_b/20210518_gift_lp_c20a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Cốc cà phê vườn nho</h1>
                            </div>
                        </div>
                    </div>
                    <i onclick="rlc_02_slide(-1)" class="fas fa-chevron-left"></i>
                    <i onclick="rlc_02_slide(1)" class="fas fa-chevron-right"></i>
                </div>
                <div class="rlc-02-slide-container-mobile">
                    <div class="rlc-02-slider-mobile">
                        <div>
                            <a href="">
                                <img src="./images/Banner_b/20210518_gift_lp_c20a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Cốc cà phê vườn nho</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_b/20210518_gift_lp_c07a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Chăn ấm vùng cao</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_b/20210518_gift_lp_c20d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Dĩa ăn tối Wilshire</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_b/20210518_gift_lp_c07c_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Lọ chứa đèn cày</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_b/20210518_gift_lp_c07a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Chăn ấm vùng cao</h1>
                            </div>
                        </div>

                    </div>
                    <i onclick="rlc_02_slide_mobile(-1)" class="fas fa-chevron-left"></i>
                    <i onclick="rlc_02_slide_mobile(1)" class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="banner-03">
        <a href="">
            <img src="./images/Banner_b/20210518_gift_lp_c08_banner.jpg" alt="">
        </a>
        <div class="title">
            <h1>
                Quà Cho Sự Thành Công
            </h1>
            <h3>
                Những món quà tặng không thể quên
            </h3>
            <a href="">SHOP NOW</a>
        </div>
    </section>
    <section class="rlc-03">
        <div class="rlc-03-row">
            <div class="left">
                <div class="rlc-title">
                    <h1>Những Món Dành Tặng Cho Cô Ấy</h1>
                    <h3>Sự thể hiện tao nhã phong cách cổ điển dành cho cô ấy</h3>
                    <a href="">SHOP NOW</a>
                </div>
                <div class="rlc-03-slide-container">
                    <div class="rlc-03-slider">
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=67">
                                <img src="./images/Banner_c/20210518_gift_lp_c09a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Giày Halle da dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=56">
                                <img src="./images/Banner_c/20210518_gift_lp_c09b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Quần ngắn gabardine</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=64">
                                <img src="./images/Banner_c/20210518_gift_lp_c09d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Mắt kính Ricky</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=66">
                                <img src="./images/Banner_c/20210518_gift_lp_c09e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Nước hoa Romance</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=67">
                                <img src="./images/Banner_c/20210518_gift_lp_c09a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Giày Halle da dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=56">
                                <img src="./images/Banner_c/20210518_gift_lp_c09b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Quần ngắn gabardine</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=64">
                                <img src="./images/Banner_c/20210518_gift_lp_c09d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Mắt kính Ricky</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=66">
                                <img src="./images/Banner_c/20210518_gift_lp_c09e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Nước hoa Romance</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=67">
                                <img src="./images/Banner_c/20210518_gift_lp_c09a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Giày Halle da dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=56">
                                <img src="./images/Banner_c/20210518_gift_lp_c09b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Quần ngắn gabardine</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=64">
                                <img src="./images/Banner_c/20210518_gift_lp_c09d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Mắt kính Ricky</h1>
                            </div>
                        </div>
                        <div>
                            <a href="/ASM/user/Product/productDetail.php?id=66">
                                <img src="./images/Banner_c/20210518_gift_lp_c09e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Nước hoa Romance</h1>
                            </div>
                        </div>
                    </div>
                    <i onclick="rlc_03_slide(-1)" class="fas fa-chevron-left"></i>
                    <i onclick="rlc_03_slide(1)" class="fas fa-chevron-right"></i>
                </div>
                <div class="rlc-03-slide-container-mobile">
                    <div class="rlc-03-slider-mobile">
                        <div>
                            <a href="">
                                <img src="./images/Banner_c/20210518_gift_lp_c09e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Nước hoa Romance</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_c/20210518_gift_lp_c09a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Giày Halle da dê</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_c/20210518_gift_lp_c09b_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Quần ngắn gabardine</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_c/20210518_gift_lp_c09d_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Mắt kính Ricky</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_c/20210518_gift_lp_c09e_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Nước hoa Romance</h1>
                            </div>
                        </div>
                        <div>
                            <a href="">
                                <img src="./images/Banner_c/20210518_gift_lp_c09a_banner.jpg" alt="">
                            </a>
                            <div class="rlc-slide-title">
                                <h1>Giày Halle da dê</h1>
                            </div>
                        </div>

                    </div>
                    <i onclick="rlc_03_slide_mobile(-1)" class="fas fa-chevron-left"></i>
                    <i onclick="rlc_03_slide_mobile(1)" class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div class="right rela">
                <a href="">
                    <img src="./images/Banner_c/20210518_gift_lp_c10_banner.jpg" alt="">
                </a>
                <div class="rlc-aside-title">
                    <p>Áo Sơ Mi Lụa Nữ Tính</p>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>
    <section class="category">
        <h1>Sản phẩm xem nhiều</h1>
        <div class="category-container">
            <?php
            $query = "select * from product order by views desc limit 0,8";
            $result = $conn->query($query);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) :
            ?>
                <div>
                    <a href="/ASM/user/Product/ProductDetail.php?id=<?= $product['productid'] ?>">
                        <img src="../../public/images/<?php echo $product['images'] . "/main_image2.jpg" ?>" alt="">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <h1>Sản phẩm mua nhiều</h1>
        <div class="category-container">
            <?php
            $query = "select A.*,sum(quantity) as quantity from product as A join product_hot as B on A.productid = B.productid group by A.productid order by quantity desc limit 0,8";
            $result = $conn->query($query);
            $products = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) :
            ?>
                <div>
                    <a href="/ASM/user/Product/ProductDetail.php?id=<?= $product['productid'] ?>">
                        <img src="../../public/images/<?php echo $product['images'] . "/main_image2.jpg" ?>" alt="">
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </section>

    <section class="banner4">
        <a href="">
            <img src="./images/category/20210518_gift_lp_c19_banner.jpg" alt="">
        </a>
        <div class="banner4-title">
            <h1>Hộp Quà Tặng</h1>
            <p>Lựa chọn một hộp quà của chúng tôi khi thanh toán</p>
        </div>
    </section>
    <section class="banner5">
        <img src="./images/category/20210119_gifting_hub_lp_c14_background.jpg" alt="">
        <div>
            <div style="background-color: white;">
                <div class="banner5-title">
                    <div></div>
                    <p>sáng tạo theo cách của bạn</p>
                    <h1>Những món quà cá nhân</h1>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
            <div class="banner5-right">
                <a href="">
                    <img src="./images/category/20210518_gift_lp_c25_banner.jpg" alt="">
                </a>
            </div>
        </div>
    </section>
    <section class="banner6">
        <a href="">
            <img src="./images/category/20210119_gifting_hub_lp_c15_banner.jpg" alt="">
        </a>
        <div class="banner6-title">
            <h1>Thẻ Quà Tặng</h1>
            <p>Món quà sang trọng và tao nhã</p>
            <a href="">SHOP NOW</a>
        </div>
    </section>
    <section class="more">
        <h1>More to Explore</h1>
        <div class="more-row">
            <div>
                <a href="">
                    <img src="./images/more/20210119_gifting_hub_lp_c16_banner.jpg" alt="">
                </a>
            </div>
            <div>
                <a href="">
                    <img src="./images/more/20210119_gifting_hub_lp_c17_banner.jpg" alt="">
                </a>
            </div>
            <div>
                <a href="">
                    <img src="./images/more/20210119_gifting_hub_lp_c18_banner.jpg" alt="">
                </a>
            </div>
            <div>
                <a href="">
                    <img src="./images/more/20210119_gifting_hub_lp_c19_banner.jpg" alt="">
                </a>
            </div>
        </div>
    </section>
    <div style="position: fixed;display:none" class="effect">
        <div class="loader">

        </div>
    </div>
    <?php include_once "../View/footer.php" ?>
    <script src="./index.js"></script>
    <script>
        $(function() {
            $("#sign_out").click(() => {
                $(".effect").show();
                setTimeout(() => {
                    $.ajax({
                        url: "/ASM/user/Account/signout.php",
                        method: "POST",
                        data: {
                            id: "signout",
                        },
                        dataType: "json",
                        success: function() {
                            $(".effect").hide();
                            location.reload();
                        },
                    });
                }, 2000);
            });
        });
    </script>
</body>

</html>