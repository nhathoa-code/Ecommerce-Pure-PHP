<?php
session_start();
$subtotal = 0;
$items = 0;
foreach ($_SESSION['cart'] as $value) {
    $subtotal += $value['total'];
    $items += $value['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./order.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <div id="head">
            <a href="/ASM/user/Index">FASHION SHOP</a>
        </div>
    </header>
    <main>
        <div class="container">
            <div id="filling-form-container">
                <form action="order_process.php" method="post" id="filling-form">
                    <div class="filling-control">
                        <input class="input_element" type="text" name="name" value="<?php echo $_SESSION['name'] ?>">
                        <span>* NAME</span>
                    </div>
                    <div class="filling-control">
                        <input class="input_element" type="email" name="email" value="<?php echo $_SESSION['useremail'] ?>">
                        <span>* EMAIL</span>
                    </div>
                    <div class="filling-control">
                        <input class="input_element" type="text" name="phone">
                        <span>* PHONE NUMBER</span>
                    </div>
                    <div class="filling-control">
                        <input class="input_element" type="text" name="address">
                        <span>* ADDRESS</span>
                    </div>
                    <div class="filling-control">
                        <select id="select_method" name="pay_method">
                            <option value="">SELECT PAY METHOD</option>
                            <option value="cash">CASH</option>
                            <option value="transfer">TRANSFER</option>
                        </select>
                    </div>
                    <input type="hidden" value="<?php echo $subtotal ?>" name="subtotal">
                    <div class="btn-submit">
                        <button>
                            ORDER
                        </button>
                    </div>
                </form>
            </div>
            <div class="shopping_bag">
                <div class="total_info">
                    <div class="cart_total">
                        <p>SUBTOTAL</p>
                        <p>$<span id="subtotal"><?php echo $subtotal ?></span></p>
                    </div>
                    <div class="cart_total">
                        <p>SHIPPING</p>
                        <p>FREE</p>
                    </div>
                </div>
                <h3 id="order_details">ORDER DETAILS (<span id="total_items"><?php echo $items ?></span>)</h3>
                <div class="items_container">
                    <?php foreach ($_SESSION['cart'] as $value) : ?>
                        <div class="item">
                            <div class="item_image">
                                <img src="<?php echo "/ASM/public/images/" . $value['dir'] . "/cart_image.png" ?>" alt="">
                            </div>
                            <div class="item_info">
                                <p class="product_name"><?php echo $value['name'] ?></p>
                                <p class="product_price">Price: $<span><?php echo $value['price'] ?></span></p>
                                <p class="product_color">quantity: <span><?php echo $value['quantity'] ?></span></p>
                                <p class="product_size">Size: <span><?php echo $value['size'] ?></span></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <script src="./order.js"></script>
</body>

</html>