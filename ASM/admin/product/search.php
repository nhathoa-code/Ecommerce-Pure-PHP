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
        img {
            width: 80px;
            height: auto;
        }

        td {
            vertical-align: middle !important;
        }

        .pop_up p {
            color: white;
        }

        .main {
            position: relative;
        }

        .pop_up {
            width: 15vw;
        }

        #one-size {
            margin-bottom: 1rem;
        }

        .edit_pop_up {
            position: fixed;
            z-index: 2;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .form-edit {
            width: 670px;
            height: 90%;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow-y: scroll;
            background-color: white;
            padding: 1rem;
            animation-name: show;
            animation-duration: 0.3s;
            animation-timing-function: ease-in-out;
        }

        @keyframes show {
            from {
                top: 40%;
                opacity: 0;
            }

            to {
                top: 50%;
                opacity: 1;
            }
        }

        @keyframes hide {
            from {
                top: 50%;
                opacity: 1
            }

            to {
                top: 40%;
                opacity: 0;
            }
        }

        input[type="number"] {
            width: 80px;
        }

        #close {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 20px;
            height: auto;
            cursor: pointer;
        }

        #image_container {
            position: absolute;
            top: 5%;
            left: 10%;
            width: 170px;
            height: 200px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #image_container img {
            width: 150px;
            height: auto;
        }

        div.links {
            margin: 1rem;
        }

        div.links a {
            padding: 0.5rem 1rem;
            color: #6d6f73;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .active-page {
            background-color: #041e3a;
            border-radius: 50%;
        }

        form {
            margin: 1rem 0;
        }
    </style>
</head>

<?php
require_once '../../public/model/connectdb.php';
$keyword = trim($_GET['keyword']);
$query = "select * from product where name like '%$keyword%'";
$total_products = $conn->query($query)->rowCount();
$current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
$from = (intval($current_page) - 1) * 5;
$query = "select * from product where name like '%$keyword%' limit $from,5";
$result = $conn->query($query);
$products = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <header>
        <h1>WELCOME ADMIN</h1>
    </header>
    <div id="container">
        <?php require_once '../menu.php'; ?>
        <div class="main">
            <div class="pop_up_container">
                <div class="pop_up">
                    <p>Are you sure ?</p>
                    <div>
                        <button id="delete" class="btn btn-success">YES</button>
                        <button id="cancel" class="btn btn-dark">CANCEL</button>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 1rem;">
                <a href="./addproduct.php" class="btn btn-success">Add product</a>
                <form action="./search.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" placeholder="Type name" class="form-control" name="keyword">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <?php
            if (count($products) > 0) :
            ?>
                <h1>Search results for: <?php echo $keyword ?></h1>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Id</th>
                            <th>Brandname</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Views</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr data-id="<?php echo $product['productid'] ?>" class="row-align">
                                <td name='img'><img src="/ASM/public/images/<?php echo $product['images'] . "/cart_image.png" ?>" alt=""></td>
                                <td><?php echo $product['productid'] ?></td>
                                <td name='brandname'><?php echo $product['brandname'] ?></td>
                                <td name='name'><?php echo $product['name'] ?></td>
                                <td name='price'><?php echo "$" . number_format($product['price'], 1, '.', ',') ?></td>
                                <td><?php echo $product['views'] ?></td>
                                <td><button data-sizetype="<?php echo $product['sizetype'] ?>" data-id="<?php echo $product['productid'] ?>" class="btn btn-primary product-edit">Edit</button></td>
                                <td><button data-id="<?php echo $product['productid'] ?>" class="btn btn-danger show-pop-up">Delete</button></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php echo pageLinksSearch($total_products, $current_page, $keyword) ?>
            <?php else : ?>
                <h1>No results for: <?php echo $keyword ?></h1>
            <?php endif ?>

        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
    <div style="display: none;" class="edit_pop_up">
        <div id="image_container">
            <img src="" alt="">
        </div>
        <div class="form-edit">
            <img id="close" src="https://cdn-vzn.yottaa.net/5e18d627d9314057054ee4b0/www.ralphlauren.com/v~4b.1b/on/demandware.static/Sites-RalphLauren_US-Site/-/en_US/v1625585552576/images/close.svg" alt="">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name:</label>
                    <input id="name" type="text" class="form-control" placeholder="Enter name" name="name">
                </div>
                <div class="form-group">
                    <label>Brand name:</label>
                    <input type="text" class="form-control" placeholder="Enter brand name" name="brandname">
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea rows="2" cols="50" class="form-control" placeholder="Enter description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label>Details:</label>
                    <textarea rows="2" cols="50" class="form-control" placeholder="Enter details" name="details"></textarea>
                </div>
                <div class="form-group">
                    <label>Price:</label>
                    <input type="text" class="form-control" placeholder="Enter price" name="price">
                </div>
                <div style="display: none;" id="one-size">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            Quantity: <input type="number" class="form-check-input" name="quantity-one">
                        </label>
                    </div>
                </div>
                <div style="display: none;" class="form-group" id="multiple-size">
                    <label>Quantity:</label>
                    <div class="quantity">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                XS: <input type="number" class="form-check-input" name="quantity[XS]">
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                S: <input type="number" class="form-check-input" name="quantity[S]">
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                M: <input type="number" class="form-check-input" name="quantity[M]">
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                L: <input type="number" class="form-check-input" name="quantity[L]">
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                XL: <input type="number" class="form-check-input" name="quantity[XL]">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Parent category:</label>
                    <select id="parent_category" class="form-control" name="parent_category">
                    </select>
                </div>
                <div class="form-group">
                    <label>Children category:</label>
                    <select id="children_categories" class="form-control" name="child_category">
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload files:</label>
                    <input type="file" class="form-control" placeholder="Upload files" name="images[]" multiple>
                </div>
                <input type="hidden" name="sizetype" value="">
                <input type="hidden" name="id" value="">
                <input type="hidden" name="action" value="edit">
                <button type="submit" class="btn btn-primary" id="product-edit">Edit</button>
            </form>
        </div>
    </div>

    <script>
        let id;
        $(document).on("click", ".show-pop-up", function() {
            id = $(this).attr("data-id");
            $(".pop_up_container").css("display", "block");
            $(".pop_up").css("animation-name", "slide_down");
        })
        $('#delete').on("click", function() {
            $(".pop_up_container").css("display", "none");
            $.ajax({
                url: "product_control.php",
                method: "POST",
                data: {
                    "action": "delete",
                    "id": id
                },
                success: function() {
                    $("tr[data-id=" + id + "]").remove();
                }
            })
        })
        $("#cancel").click(function() {
            $(".pop_up").css("animation-name", "slide_up");

        })
        $(".pop_up").on("animationend", function() {
            if ($(".pop_up").css("animation-name") == "slide_up") {
                $(".pop_up_container").css("display", "none");
            }
        })
        $("#parent_category").change(function() {
            $.ajax({
                url: "product_control.php",
                method: "POST",
                data: {
                    "id": $(this).val(),
                    "action": "fetch"
                },
                success: function(data) {
                    $("#children_categories").html(data);
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
        $(document).on('click', '.product-edit', function() {
            $(".edit_pop_up").css("display", "block");
            $(".form-edit").css("animation-name", "show");
            $.ajax({
                url: "product_control.php",
                method: "POST",
                data: {
                    "id": $(this).attr("data-id"),
                    "sizetype": $(this).attr("data-sizetype"),
                    "action": "fetch"
                },
                dataType: "json",
                success: function(data) {
                    $("input[name=name]").val(data.name);
                    $("input[name=brandname]").val(data.brandname);
                    $("textarea[name=description]").val(data.description);
                    $("textarea[name=details]").val(data.details);
                    $("input[name=price]").val(data.price);
                    $("input[name=id]").val(data.productid);
                    $("input[name=sizetype]").val(data.sizetype);
                    $("#parent_category").html(data.parent_category);
                    $("#children_categories").html(data.children_category);
                    $("#image_container img").attr("src", "../../public/images/" + data.images + "/cart_image.png");
                    if (data.sizetype == "one") {
                        $("#one-size").show();
                        $("#multiple-size").hide();
                        $("input[name='quantity-one']").val(data.quantity);
                    } else {
                        $("#multiple-size").show();
                        $("#one-size").hide();
                        $("input[name='quantity[XS]']").val(data.XS);
                        $("input[name='quantity[S]']").val(data.S);
                        $("input[name='quantity[M]']").val(data.M);
                        $("input[name='quantity[L]']").val(data.L);
                        $("input[name='quantity[XL]']").val(data.XL);
                    }
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
        $("#close").click(function() {
            $(".form-edit").css("animation-name", "hide");
        })
        $(".form-edit").on("animationend", function() {
            if ($(".form-edit").css("animation-name") == "hide") {
                $(".edit_pop_up").css("display", "none");
            }
        })
        $(".form-edit > form").submit(function(event) {
            event.preventDefault();
            let fd = new FormData(this);
            let files = $('input[type=file]')[0].files;

            if (files.length == 0) {
                fd.append("isfile", "false");
            } else {
                fd.append("isfile", "true");
            }
            $.ajax({
                url: "product_control.php",
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(".edit_pop_up").css("display", "none");
                    $("tr[data-id=" + $("input[name=id]").val() + "]" + " td[name=name]").html($("input[name=name]").val());
                    $("tr[data-id=" + $("input[name=id]").val() + "]" + " td[name=brandname]").html($("input[name=brandname]").val());
                    $("tr[data-id=" + $("input[name=id]").val() + "]" + " td[name=price]").html("$" + Number($("input[name=price]").val()).toFixed(1));
                    if (data.trim() != '') {
                        $("tr[data-id=" + $("input[name=id]").val() + "]" + " img").attr("src", "../../public/images/" + data.trim() + "/cart_image.png");
                    }
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
    </script>
</body>

</html>