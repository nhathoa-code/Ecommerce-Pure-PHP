<?php
require_once '../../public/model/connectdb.php';
$keyword = $_POST['keyword'];
$query = "select * from product where name like '%$keyword%'";
$products = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);

if (count($products) > 0) {
    $output = "";
    if (count($products) > 3) {
        $limit = 0;
        foreach ($products as $product) {
            $id = $product['productid'];
            $brandname = $product['brandname'];
            $name = $product['name'];
            $price = $product['price'];
            $images = $product['images'];
            $output .= " <div>
                     <div>
                        <a href='/ASM/user/Product/productDetail.php?id=$id'>
                         <img src='../../public/images/$images/main_image2.jpg' alt=''>
                         </a>
                     </div>
                     <div>
                         <p class='brandname'>$brandname</p>
                         <p class='name'>$name</p>
                         <p class='price'>$$price</p>
                     </div>
                 </div>";
            $limit++;
            if ($limit == 3) break;
        }
        echo json_encode(array("output" => $output, "numbers" => count($products)));
    } else {
        foreach ($products as $product) {
            $id = $product['productid'];
            $brandname = $product['brandname'];
            $name = $product['name'];
            $price = $product['price'];
            $images = $product['images'];
            $output .= " <div>
                     <div>
                      <a href='/ASM/user/Product/productDetail.php?id=$id'>
                         <img src='../../public/images/$images/main_image2.jpg' alt=''>
                      </a>
                     </div>
                     <div>
                         <p class='brandname'>$brandname</p>
                         <p class='name'>$name</p>
                         <p class='price'>$$price</p>
                     </div>
                 </div>";
        }
        echo json_encode(array("output" => $output, "numbers" => count($products)));
    }
} else {
    echo json_encode(array("output" => "<h1 id='empty-search'>No results</h1>", "numbers" => 0));
}
