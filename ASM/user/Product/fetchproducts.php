<?php
require_once '../../public/model/connectdb.php';
function output($product)
{
    global $output;
    $id = $product['productid'];
    $images = $product['images'];
    $brandname = $product['brandname'];
    $name = $product['name'];
    $price = $product['price'];
    $output .= "<div>";
    $output .= "<a href='/ASM/user/Product/productDetail.php?id=$id'><img src='../../public/images/$images/main_image2.jpg' alt=''></a>";
    $output .= "<p class='brandname'>$brandname</p>";
    $output .= "<p class='name'>$name</p>";
    $output .= "<p class='price'>$price</p>";
    $output .= "</div>";
}
$output = "";
$id = $_POST['data-id'];
$total_products = intval($_POST['total_products']);
$group_size = intval($_POST['group_size']);
$current_group = intval($_POST['current_group']);
$from = ($current_group - 1) * $group_size;
$products_left = $total_products - ($current_group * $group_size);
switch ($_POST['data-category']) {
    case "all":
        if ($_POST['moreOrAll'] == "view-more") {
            $query = "select * from product order by productid desc limit $from,$group_size";
            $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) {
                output($product);
            }
        } else {
            $query = "select * from product order by productid desc";
            $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            for ($i = ($current_group - 1) * $group_size; $i < count($products); $i++) {
                output($products[$i]);
            }
        }
        echo json_encode(array("output" => $output, "products_left" => $products_left, "group_size" => $group_size, "total_products" => $total_products, "moreOrAll" => $_POST['moreOrAll']));
        break;
    case "parent":
        if ($_POST['moreOrAll'] == "view-more") {
            $query = "select * from product where parent_category = $id order by productid desc limit $from,$group_size";
            $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) {
                output($product);
            }
        } else {
            $query = "select * from product where parent_category = $id order by productid desc";
            $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            for ($i = ($current_group - 1) * $group_size; $i < count($products); $i++) {
                output($products[$i]);
            }
        }

        echo json_encode(array("output" => $output, "products_left" => $products_left, "group_size" => $group_size, "total_products" => $total_products, "moreOrAll" => $_POST['moreOrAll']));
        break;
    case "child":
        if ($_POST['moreOrAll'] == "view-more") {
            $query = "select * from product where category = $id order by productid desc limit $from,$group_size";
            $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) {
                output($product);
            }
        } else {
            $query = "select * from product where category = $id order by productid desc";
            $products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
            for ($i = ($current_group - 1) * $group_size; $i < count($products); $i++) {
                output($products[$i]);
            }
        }
        echo json_encode(array("output" => $output, "products_left" => $products_left, "group_size" => $group_size, "total_products" => $total_products, "moreOrAll" => $_POST['moreOrAll']));
        break;
    default:
        echo json_encode(array("output" => "failed"));
}
