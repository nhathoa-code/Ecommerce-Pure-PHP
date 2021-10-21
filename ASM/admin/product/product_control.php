<?php
require_once '../../public/model/connectdb.php';
if ($_POST["action"] == "fetch") {
    $parent_id = $_POST['id'];
    $query = 'select * from category where parent_categoryid = ' . $parent_id;
    $result = $conn->query($query);
    $categories = $result->fetchAll(PDO::FETCH_ASSOC);
    $dataBack = '';
    foreach ($categories as $value) {
        $id = $value['categoryid'];
        $name = $value['category_name'];
        $dataBack .= "<option value=$id>$name</option>";
    }
    echo $dataBack;
}
if ($_POST["action"] == "delete") {
    $query = 'select images from product where productid = ' . $_POST['id'];
    $result = $conn->query($query);
    $dir = $result->fetch(PDO::FETCH_ASSOC)['images'];
    $query = ' delete from product where productid = ' . $_POST['id'];
    $conn->exec($query);
    $arr = scandir("../../public/images/" . $dir);
    array_shift($arr);
    array_shift($arr);
    foreach ($arr as $value) {
        unlink("../../public/images/$dir/" . $value);
    }
    rmdir("../../public/images/$dir");
}
if ($_POST["action"] == "fetch") {
    $query = "select * from product where productid = " . $_POST['id'];
    $result = $conn->query($query);
    $product = $result->fetch(PDO::FETCH_ASSOC);
    if ($_POST['sizetype'] == "one") {
        $query = "select quantity from quantity where productid = " . $_POST['id'];
        $result = $conn->query($query);
        $quantity = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        $query = "select * from product_quantity where productid = " . $_POST['id'];
        $result = $conn->query($query);
        $quantity = $result->fetch(PDO::FETCH_ASSOC);
    }
    $query = "select * from parent_category";
    $result = $conn->query($query);
    $parent_categories = $result->fetchAll(PDO::FETCH_ASSOC);
    $string_parent = '';
    foreach ($parent_categories as $value) {
        if ($value['id'] == $product['parent_category']) {
            $string_parent .= "<option selected value=" . $value['id'] . ">" . $value['name'] . "</option>";
        } else {
            $string_parent .= "<option value=" . $value['id'] . ">" . $value['name'] . "</option>";
        }
    }
    $query = "select * from category where parent_categoryid = " . $product['parent_category'];
    $result = $conn->query($query);
    $categories = $result->fetchAll(PDO::FETCH_ASSOC);
    $string_children = '';
    foreach ($categories as $value) {
        if ($value['categoryid'] == $product['category']) {
            $string_children .= "<option selected value=" . $value['categoryid'] . ">" . $value['category_name'] . "</option>";
        } else {
            $string_children .= "<option value=" . $value['categoryid'] . ">" . $value['category_name'] . "</option>";
        }
    }
    $arr = array_merge($product, $quantity, array("parent_category" => $string_parent), array("children_category" => $string_children), array("sizetype" => $_POST['sizetype']));
    echo json_encode($arr);
}
if ($_POST['action'] == "edit") {
    $name = $_POST['name'];
    $brandname = $_POST['brandname'];
    $category = $_POST['child_category'];
    $parent_category = $_POST['parent_category'];
    $description = trim($_POST['description']);
    $description = str_replace(array('"', "'"), array('\\"', "\\'"), $description);
    $details = $_POST['details'];
    $details = str_replace(array('"', "'"), array('\\"', "\\'"), $details);
    $price = $_POST['price'];
    $query = "update product set name = '$name', brandname = '$brandname', category = '$category', parent_category = '$parent_category', description = '$description',details = '$details',price = '$price' where productid = " . $_POST['id'];
    $conn->exec($query);
    if ($_POST['sizetype'] == "one") {
        $quantity_one = $_POST['quantity-one'];
        $query = "update quantity set quantity = '$quantity_one' where productid = " . $_POST['id'];
        $conn->exec($query);
    } else {
        $XS = $_POST['quantity']['XS'];
        $S = $_POST['quantity']['S'];
        $M = $_POST['quantity']['M'];
        $L = $_POST['quantity']['L'];
        $XL = $_POST['quantity']['XL'];
        $query = "update product_quantity set XS = '$XS',S='$S',M='$M',L='$L',XL='$XL' where productid = " . $_POST['id'];
        $conn->exec($query);
    }

    if ($_POST['isfile'] == "true") {
        $newdir = '' . time();
        $query = 'select images from product where productid = ' . $_POST['id'];
        $result = $conn->query($query);
        $dir = $result->fetch(PDO::FETCH_ASSOC)['images'];
        $arr = scandir("../../public/images/" . $dir);
        array_shift($arr);
        array_shift($arr);
        foreach ($arr as $value) {
            unlink("../../public/images/$dir/" . $value);
        }
        // rmdir("../../public/images/$dir");
        $images = $_FILES['images'];
        foreach ($images['tmp_name'] as $key => $value) {
            move_uploaded_file($value, "../../public/images/" . $dir . "/" . $images['name'][$key]);
        }
        $query = "update product set images = $newdir where productid = " . $_POST['id'];
        $conn->exec($query);
        rename("../../public/images/" . $dir, "../../public/images/" . $newdir);
        echo $newdir;
    } else {
        echo "";
    }
}
if ($_POST['action'] == "search-hint") {
    $keyword = $_POST['keyword'];
    $query = "select * from product where name like '%$keyword%'";
    $result = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $output = "";
        foreach ($result as $product) {
            $image = $product['images'];
            $id = $product['productid'];
            $name = $product['name'];
            $brandname = $product['brandname'];
            $price = number_format($product['price'], 1, '.', ',');
            $views = $product['views'];
            $sizetype = $product['sizetype'];
            $output .= "<tr data-id='$id' class='row-align'>";
            $output .= "<td name='img'><img src='/ASM/public/images/$image/cart_image.png' alt=''></td>";
            $output .= "<td>$id</td>";
            $output .= "<td name='name'>$name</td>";
            $output .= "<td name='price'>$price</td>";
            $output .= "<td>$views</td>";
            $output .= "<td><button data-sizetype='$sizetype' data-id='$id' class='btn btn-primary product-edit'>Edit</button></td>";
            $output .= "<td><button data-id='$id' class='btn btn-danger show-pop-up'>Delete</button></td>";
            $isInStock = isInStock($sizetype, $product['productid']) ? "In stock" : "Out stock";
            $output .= "<td name='brandname'>$isInStock</td>";
            $output .= "</tr>";
        }
        echo json_encode(array("output" => $output));
    } else {
        echo json_encode(array("output" => ""));
    }
}
if ($_POST['action'] == "search") {
}
