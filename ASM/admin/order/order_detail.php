<?php
require_once '../../public/model/connectdb.php';
$query = 'select * from user_order where orderid = ' . $_GET['orderid'];
$result = $conn->query($query);
$order = $result->fetch(PDO::FETCH_ASSOC);
$query = 'select * from order_detail where orderid = ' . $_GET['orderid'];
$result = $conn->query($query);
$order_details = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/ASM/admin/index.css">
    <style>
        table {
            border-top: 1px solid #757575;
            margin-top: 1rem;
        }

        .main {
            padding: 1rem 3rem;
        }

        .main>div {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .main .order_info {
            flex: 1;
        }

        .main .order_info>div {
            display: flex;
        }

        .main>div p {
            color: #041e3a;
            font-weight: bold;
        }

        span {
            color: #757575;
            font-weight: normal;
        }

        img {
            width: 80px;
            height: auto;
        }

        td {
            vertical-align: middle !important;
        }
    </style>
</head>

<body>
    <header>
        <h1>WELCOME ADMIN</h1>
    </header>
    <div id="container">
        <?php require_once '../menu.php'; ?>
        <div class="main">
            <div>
                <div class="order_info">
                    <p>Order number: <span><?php echo $order['orderid'] ?></span> </p>
                    <p>Customer name: <span><?php echo $order['username'] ?></span></p>
                    <p>Address: <span><?php echo $order['address'] ?></span></p>
                    <p>Phone number: <span><?php echo $order['phone_number'] ?></span></p>
                    <p>Email: <span><?php echo $order['email'] ?></span></p>
                    <div>
                        <p style="margin-right: 2rem;">Subtotal: <span>$<?php echo $order['subtotal'] ?></span></p>
                        <p>Payment method: <span><?php echo $order['payment_method'] ?></span> </p>
                    </div>
                </div>
                <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-secondary">Back</a>
            </div>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Product id</th>
                        <th>Product image</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_details as $order_detail) : ?>
                        <?php
                        $query = "select images from product where productid = " . $order_detail['productid'];
                        $result = $conn->query($query);
                        $dir = $result->fetch(PDO::FETCH_ASSOC)['images'];
                        ?>
                        <tr>
                            <td><?php echo $order_detail['productid'] ?></td>
                            <td><img src="<?php echo "/ASM/public/images/" . $dir . "/cart_image.png" ?>" alt=""></td>
                            <td><?php echo $order_detail['productname'] ?></td>
                            <td>$<?php echo $order_detail['price'] ?></td>
                            <td><?php echo $order_detail['quantity'] ?></td>
                            <td><?php echo $order_detail['size'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
</body>

</html>