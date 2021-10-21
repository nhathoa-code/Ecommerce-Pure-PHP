 <?php require_once 'header_css.php' ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <div style="position: fixed;display:none" class="effect">
     <div class="loader-size">

     </div>
 </div>
 <header style="position: relative;z-index: 2">
     <div class="header-intro">
         <div class="utility-nav">
             <?php
                function LucNayLa()
                {
                    $anh = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "am", "pm", ":");
                    $viet = array("Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy", "Chủ nhật", " phút, sáng", " phút, chiều", " giờ ");
                    $timenow = gmdate("D, d/m/Y - g:i a.", time() + 7 * 3600);
                    $t = str_replace($anh, $viet, $timenow);
                    return $t;
                }

                ?>
             <div><span><?php echo LucNayLa() ?></span></div>
         </div>
     </div>
     <div class="toggle_nav">
         <i class="fas fa-bars"></i>
     </div>
     <nav class="menu">
         <div class="menu-category">
             <ul>
                 <span><a href="/ASM/user/Index"> Shop Thời Trang</a></span>
                 <li id="category-toggle"><a href="/ASM/user/Product/Productlist.php">Sản phẩm</a>
                 </li>
                 <li><a href="/ASM/user/Gioithieu/gioithieu.php">Giới thiệu</a></li>
                 <li><a href="/ASM/user/Lienhe/lienhe.php">Liên hệ</a></li>
             </ul>
         </div>
         <div class="header-icon">
             <div>
                 <i id="search-toggle" class="fas fa-search"></i>
             </div>
             <div id="user_icon" style="position: relative">
                 <a href="/ASM/user/Account/Account.php">
                     <i class="far fa-user"></i>
                 </a>
                 <?php
                    if (isset($_SESSION['username'])) {
                        echo ' <div id="user_container">
                     <h1>Welcome, ' . $_SESSION['username'] . '!</h1>
                     <a id="signout">Sign Out</a>
                    <a href="/ASM/user/Account/changepassword.php">Change password</a>
                        </div>';
                    }
                    ?>
             </div>
             <div style="position: relative;">
                 <a href="/ASM/user/Cart/cart_view.php">
                     <i class="fas fa-shopping-bag"></i>
                 </a>
                 <?php
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        $items = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $items += $value['quantity'];
                        }
                        echo ' <span id="items">' . $items . '</span>';
                    } else {
                        echo ' <span style="display:none" id="items"></span>';
                    }
                    ?>
             </div>
         </div>
         <div id="category">
             <div>
                 <?php
                    require_once '../../public/model/connectdb.php';
                    $query = "select * from parent_category";
                    $result = $conn->query($query);
                    $parent_categories = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($parent_categories as $parent_category) :
                    ?>
                     <div>
                         <a href="/ASM/user/Product/Productlist.php?level=parent&id=<?php echo $parent_category['id'] ?>"><?php echo $parent_category['name'] ?></a>
                         <ul>
                             <?php
                                $query = "select * from category where parent_categoryid = " . $parent_category['id'];
                                $result = $conn->query($query);
                                $categories = $result->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($categories as $category) :
                                ?>
                                 <li><a href="/ASM/user/Product/Productlist.php?level=child&id=<?php echo $category['categoryid'] ?>"><?php echo $category['category_name'] ?></a></li>
                             <?php endforeach ?>
                         </ul>
                     </div>
                 <?php endforeach ?>
             </div>
         </div>
         <div id="search-container">
             <form id="search-form">
                 <div id="search-box">
                     <i class="fas fa-search"></i>
                     <input type="text" placeholder="Search" id="search">
                 </div>
             </form>
             <div id="type-something">
                 <h1 id='empty-search'>Type something!</h1>
             </div>
             <div id="search-result">

             </div>
             <div id="view-all" style="width:60%;margin:40px auto">
                 <a href="">VIEW ALL PRODUCTS</a>
             </div>

         </div>
     </nav>
     <nav class="menu-mobile">
         <div class="menu-category-mobile">
             <ul>
                 <span><a href="">Shop Thời Trang</a></span>
                 <li><a href="">Trang chủ</a></li>
                 <li><a href="">Sản phẩm</a></li>
                 <li><a href="">Giảm giá</a></li>
                 <li><a href="">Quà tặng</a></li>
             </ul>
         </div>
         <div style="color: white;" class="header-icon-mobile">
             <!-- <div>
                 <i class="fas fa-search"></i>
             </div>
             <div>
                 <i class="far fa-heart"></i>
             </div> -->
             <div>
                 <a href="">
                     <i class="far fa-user"></i>
                 </a>
             </div>
             <div>
                 <a href="/ASM/user/Cart/cart_view.php">
                     <i class="fas fa-shopping-bag"></i>
                 </a>
             </div>
         </div>
     </nav>
 </header>
 <script>
     $("#signout").click(() => {
         $(".effect").show();
         setTimeout(() => {
             $.ajax({
                 url: "/ASM/user/Account/signout.php",
                 success: function(data) {
                     $(".effect").hide();
                     location.reload();
                 },
                 error: function(message) {
                     console.log(message);
                 },
             });
         }, 1500);
     });
     /* -------------- category -----------------------*/
     $("#category-toggle").on("mouseover", function() {
         $("#category").css("height", $("#category > div").height());
         if ($(window).scrollTop() === 0) {
             $(".menu").css("background-color", "white");
             $(".menu-category > ul > li > a").css("color", "#041e3a")
             $(".menu-category > ul > span > a").css("color", "#041e3a")
             $(".header-icon > div > a > i").css("color", "#041e3a");
             $("#search-toggle").css("color", "#041e3a");
         }
     })
     let timeout_category;
     $("#category-toggle").on("mouseleave", function() {
         timeout_category = setTimeout(() => {
             $("#category").css("height", "0px");
             if ($(window).scrollTop() === 0) {
                 $(".menu").css("background-color", "");
                 $(".menu-category > ul > li > a").css("color", "white")
                 $(".menu-category > ul > span > a").css("color", "white")
                 $(".header-icon > div > a > i").css("color", "white");
                 $("#search-toggle").css("color", "white");
             }
         }, 1000)
     })
     $("#category").on("mouseleave", function() {
         $("#category").css("height", "0px");
         if ($(window).scrollTop() === 0) {
             $(".menu").css("background-color", "");
             $(".menu-category > ul > li > a").css("color", "white")
             $(".header-icon > div > a > i").css("color", "white");
             $(".menu-category > ul > span > a").css("color", "white")
             $("#search-toggle").css("color", "white");
         }
     })
     $("#category").on("mouseover", function() {
         clearTimeout(timeout_category);
         $("#category").css("height", $("#category > div").height());
     })
     /* -------------- category -----------------------*/
     /* -------------- search -----------------------*/
     $("#search-toggle").on("click", function() {
         if ($("#search-container").css("height") == "0px") {
             $("#search").val("");
             $("#search-result").html("");
             $("#view-all").hide();
             $("#type-something").show();
             $("#search-container").css("height", "65vh");
             if ($(window).scrollTop() === 0) {
                 $(".menu").css("background-color", "white");
                 $(this).css("color", "#041e3a");
                 $(".menu-category > ul > li > a").css("color", "#041e3a")
                 $(".menu-category > ul > span > a").css("color", "#041e3a")
                 $(".header-icon > div > a > i").css("color", "#041e3a");
             }
         } else {
             $("#search-container").css("height", "0px");
             if ($(window).scrollTop() === 0) {
                 $(".menu").css("background-color", "");
                 $(this).css("color", "white");
                 $(".menu-category > ul > li > a").css("color", "white")
                 $(".menu-category > ul > span > a").css("color", "white")
                 $(".header-icon > div > a > i").css("color", "white");
             }
         }

     })
     $("#search").on("keyup", function() {
         if ($(this).val() == "") {
             $("#type-something").show();
             $("#search-result").html("");
             $("#view-all").hide();
         } else {
             $("#type-something").hide();
             $.ajax({
                 url: "/ASM/user/View/search.php",
                 method: "POST",
                 dataType: "json",
                 data: {
                     "keyword": $(this).val()
                 },
                 success: function(data) {
                     $("#search-result").html(data.output);
                     if (data.numbers > 3) {
                         $("#view-all").show();
                         $("#view-all > a").attr("href", "/ASM/user/View/searchlist.php?keyword=" + $("#search").val());
                     } else {
                         $("#view-all").hide();
                     }
                 },
                 error: function(message) {
                     console.log(message);
                 }
             })
         }

     })
     $("#search-form").on("submit", function(event) {
         event.preventDefault();
         if ($("#search").val() == "") {
             $("#search-container").css("height", "0px");
             if ($(window).scrollTop() === 0) {
                 $(".menu").css("background-color", "");
                 $("#search-toggle").css("color", "white");
                 $(".menu-category > ul > li > a").css("color", "white")
                 $(".menu-category > ul > span > a").css("color", "white")
                 $(".header-icon > div > a > i").css("color", "white");
             }
         } else {
             window.location.href = "/ASM/user/View/searchlist.php?keyword=" + $("#search").val();
         }

     })
     /* -------------- search -----------------------*/
 </script>