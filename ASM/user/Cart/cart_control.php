<?php
session_start();
require_once '../../public/model/connectdb.php';
if ($_POST['action'] == "add") {
    $product_id = $_POST['id'];
    $query = 'select * from product where productid ="' . $product_id . '"';
    $result = $conn->query($query);
    $product = $result->fetch(PDO::FETCH_ASSOC);
    $name = $product['name'];
    $brandname = $product['brandname'];
    $dir = $product['images'];
    $sizetype = $_POST['sizetype'];
    $price = floatval($product['price']);
    $size = $_POST['size'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if ($sizetype == "one") {
        $remainQuantity = getQuantityOfOneSize($product_id);
        if (key_exists($product_id, $_SESSION['cart'])) {
            if ($_SESSION['cart'][$product_id]['quantity'] == 10) {
                $quantity_error = "quantity exceeded";
            } else {
                $new_quantity = intval($_SESSION['cart'][$product_id]['quantity']) + 1;
                if ($new_quantity > $remainQuantity) {
                    $quantity_error = "out of stock";
                } else {
                    $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
                    $new_total = $new_quantity * $price;
                    $_SESSION['cart'][$product_id]['total'] = $new_total;
                    $quantity_error = "";
                }
            }
        } else {
            $_SESSION['cart'][$product_id] = array("brandname" => $brandname, "name" => $name, "price" => $price, "quantity" => 1, "size" => "One size", "total" => $price, "dir" => $dir, "sizetype" => $sizetype);
            $quantity_error = "";
        }
    } else {
        $remainQuantity = getQuantityOfMultiSize($product_id, $size);
        if (key_exists($product_id . '-' . $size, $_SESSION['cart'])) {
            if ($_SESSION['cart'][$product_id . '-' . $size]['quantity'] == 10) {
                $quantity_error = "quantity exceeded";
            } else {
                $new_quantity = intval($_SESSION['cart'][$product_id . '-' . $size]['quantity']) + 1;
                if ($new_quantity > $remainQuantity) {
                    $quantity_error = "out of stock";
                } else {
                    $_SESSION['cart'][$product_id . '-' . $size]['quantity'] = $new_quantity;
                    $new_total = $new_quantity * $price;
                    $_SESSION['cart'][$product_id . '-' . $size]['total'] = $new_total;
                    $quantity_error = "";
                }
            }
        } else {
            $_SESSION['cart'][$product_id . '-' . $size] = array("brandname" => $brandname, "name" => $name, "price" => $price, "quantity" => 1, "size" => $size, "total" => $price, "dir" => $dir, "sizetype" => $sizetype);
            $quantity_error = "";
        };
    }

    $items = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $items += $value['quantity'];
    }

    echo json_encode(array("items" => $items, "quantity_error" => $quantity_error, "dir" => $dir, "remain_quantity" => $remainQuantity));
}


if ($_POST['action'] == 'delete') {
    unset($_SESSION['cart'][$_POST['key']]);
}


if ($_POST['action'] == 'update-quantity') {
    $key = $_POST['key'];
    $sizetype = $_SESSION['cart'][$key]['sizetype'];
    $new_quantity = intval($_POST['quantity']);
    $old_quantity = $_SESSION['cart'][$key]['quantity'];
    if ($sizetype == "one") {
        $remainQuantity = getQuantityOfOneSize($key);
        if ($new_quantity > $remainQuantity) {
            $quantity_error = "out of stock";
        } else {
            $quantity_error = "";
            $_SESSION['cart'][$key]['quantity'] = $new_quantity;
            $new_total = floatval($_SESSION['cart'][$key]['price']) * $new_quantity;
            $_SESSION['cart'][$key]['total'] = $new_total;
        }
    } else {
        $size = $_SESSION['cart'][$key]['size'];
        $chars = strpos($key, "-");
        $productid = substr($key, 0, $chars);
        $remainQuantity = getQuantityOfMultiSize($productid, $size);
        if ($new_quantity > $remainQuantity) {
            $quantity_error = "out of stock";
        } else {
            $quantity_error = "";
            $_SESSION['cart'][$key]['quantity'] = $new_quantity;
            $new_total = floatval($_SESSION['cart'][$key]['price']) * $new_quantity;
            $_SESSION['cart'][$key]['total'] = $new_total;
        }
    }
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $total += $value['quantity'];
    }
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $subtotal += $value['price'] * $value['quantity'];
    }
    echo json_encode(array("new_item_total" => isset($new_total) ? $new_total : "", "new_bag_total" => $total, "subtotal" => number_format($subtotal, 2, ".", ","), "old_quantity" => $old_quantity, "quantity_error" => $quantity_error, "remain_quantity" => $remainQuantity));
}

if ($_POST['action'] == 'fetch-data') {
    $arr = array();
    $key = $_POST['key'];
    if ($_POST['sizetype'] != "one") {
        $chars = strpos($key, "-");
        $productid = substr($key, 0, $chars);
        $query = 'select XS,S,M,L,XL from product_quantity where productid = ' . $productid;
        $result = $conn->query($query);
        $quantity = $result->fetch(PDO::FETCH_ASSOC);
        foreach ($quantity as $key_size => $value) {
            if ($value == 0) {
                $arr[] = $key_size;
            }
        }
    }
    $brandname = $_SESSION['cart'][$key]['brandname'];
    $name = $_SESSION['cart'][$key]['name'];
    $price = $_SESSION['cart'][$key]['price'];
    $dir = $_SESSION['cart'][$key]['dir'];
    $size = $_SESSION['cart'][$key]['size'];
    $sizetype = $_SESSION['cart'][$key]['sizetype'];
    echo json_encode(array("key" => $key, "brandname" => $brandname, "name" => $name, "price" => $price, "dir" => $dir, "size" => $size, "array" => $arr, "sizetype" => $sizetype));
}

if ($_POST['action'] == 'update-size') {
    $oldkey = $_POST['oldkey'];
    $newkey = $_POST['newkey'];
    if (array_key_exists($newkey, $_SESSION['cart'])) {
        echo json_encode(array("check" => false));
    } else {
        $oldsize = $_POST['oldsize'];
        $newsize = $_POST['newsize'];
        $keyarray = array_keys($_SESSION['cart']);
        $keyarray[array_search($oldkey, $keyarray)] = $newkey;
        $_SESSION['cart'][$oldkey]['size'] = $newsize;
        $valuearray = array_values($_SESSION['cart']);
        $_SESSION['cart'] = array_combine($keyarray, $valuearray);
        echo json_encode(array("check" => true));
    }
}
