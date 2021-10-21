<?php
session_start();
require_once '../../public/mail.php';
require_once '../../public/model/connectdb.php';
$order_date = date('Y-m-d');
$user_id = $_SESSION['userid'];
$order_status = "unpaid";
$address = $_POST['address'];
$phone_number = $_POST['phone'];
$email = $_POST['email'];
$name = $_POST['name'];
$paymend_method = $_POST['pay_method'];
$subtotal = $_POST['subtotal'];;
$query = "insert into user_order(order_date,userid,username,order_status,address,phone_number,email,payment_method,subtotal) values('$order_date','$user_id','$name','$order_status','$address','$phone_number','$email','$paymend_method','$subtotal')";;
$conn->exec($query);;
$lastid = $conn->lastInsertId();;
foreach ($_SESSION['cart'] as $key => $value) {
    if ($value['sizetype'] != "one") {;
        $chars = strpos($key, "-");
        $productid = substr($key, 0, $chars);
    } else {;
        $productid = $key;
    };
    $productname = $value['name'];
    $productprice = $value['price'];
    $quantity = $value['quantity'];
    $size = $value['size'];
    $orderid = $lastid;
    $query = "insert into order_detail(productid,productname,price,quantity,size,orderid) values('$productid','$productname','$productprice','$quantity','$size','$orderid')";
    $conn->exec($query);
}
unset($_SESSION['cart']);
// gửi email thông báo cho khách hàng đã đặt hàng thành công
guimail($email, "nhathoa524@gmail.com", "Fashion shop", "Order has placed successfully");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            color: #041e3a;
        }

        #head {
            text-align: center;
            margin: 2rem 0;
        }

        #head a {
            font-weight: 400;
            font-size: 3rem;
            color: #041e3a;
            text-decoration: none;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 500;
            margin: 8rem 0 3rem 0;
        }

        h2 {
            font-weight: 500;
        }
    </style>

</head>

<body>
    <header>
        <div id="head">
            <a href="/ASM/user/Index">FASHION SHOP</a>
        </div>
    </header>
    <main>
        <h1>Your order has placed successfully</h1>
        <h2>Thank you for shopping</h2>
    </main>
</body>

</html>