<?php
require_once '../../public/mail.php';
require_once '../../public/model/connectdb.php';
if ($_POST['action'] == "delete") {
    $query = 'delete from user_order where orderid = ' . $_POST['id'];
    $conn->exec($query);
}
if ($_POST['action'] == "update_status") {
    $orderid = $_POST['id'];
    $query = "select email from user_order where orderid = $orderid";
    $result = $conn->query($query);
    $email = $result->fetch(PDO::FETCH_ASSOC)['email'];
    $status = $_POST["status"];
    $query = "update user_order set order_status = '$status' where orderid = " . $orderid;
    $conn->exec($query);
    if ($status == "Paid") {
        $query = "select * from order_detail where orderid = " . $orderid;
        $result = $conn->query($query);
        $order_details = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($order_details as $order_detail) {
            $quantity = $order_detail['quantity'];
            $productid = $order_detail['productid'];
            if ($order_detail['size'] != "One size") {
                $size = $order_detail['size'];
                $query = "update product_quantity set $size = $size - $quantity where productid = $productid";
                $conn->exec($query);
            } else {
                $query = "update quantity set quantity = quantity - $quantity where productid = $productid";
                $conn->exec($query);
            }
            $query = "insert into product_hot (productid,orderid,quantity) values ('$productid','$orderid','$quantity')";
            $conn->exec($query);
        }
        guimail($email, 'nhathoa524@gmail.com', 'Fashion shop', 'Thanks for shopping');
    } else if ($status == "Shipping") {
        guimail($email, 'nhathoa524@gmail.com', 'Fashion shop', 'Shipping');
    }
}
