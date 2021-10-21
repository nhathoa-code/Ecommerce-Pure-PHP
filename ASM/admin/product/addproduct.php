<?php
require_once '../../public/model/connectdb.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $brandname = $_POST['brandname'];
    $category = $_POST['child_category'];
    $parent_category = $_POST['parent_category'];
    $description = trim($_POST['description']);
    $description = str_replace(array('"', "'"), array('\\"', "\\'"), $description);
    $details = $_POST['details'];
    $details = str_replace(array('"', "'"), array('\\"', "\\'"), $details);
    $price = $_POST['price'];
    $images = $_FILES['images'];
    $sizetype = $_POST['sizetype'];
    $dir = '' . time();
    mkdir('../../public/images/' . $dir);
    foreach ($images['tmp_name'] as $key => $value) {
        move_uploaded_file($value, '../../public/images/' . $dir . '/' . $images['name'][$key]);
    };
    $query = "insert into product (name,brandname,category,parent_category,description,details,price,sizetype,images) values('$name','$brandname',' $category','$parent_category','$description','$details','$price','$sizetype','$dir')";
    $conn->exec($query);
    $last_id = $conn->lastInsertId();
    if ($_POST['sizetype'] == "one") {
        $query = "insert into quantity (productid,quantity) values('$last_id','" . intval($_POST['quantity-one']) . "')";
        $conn->exec($query);
    } else {
        $query = 'insert into product_quantity (productid,XS,S,M,L,XL) values("' . $last_id . '", "' . intval($_POST['quantity']['XS'])  . '", "' . intval($_POST['quantity']['S']) . '", "' . intval($_POST['quantity']['M']) .  '", "' . intval($_POST['quantity']['L']) . '", "' . intval($_POST['quantity']['XL']) . '")';
        $conn->exec($query);
    }
    $message = '<p id="message" class="alert alert-success">Product added successfully</p>';
}
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
        form {
            width: 70%;
            margin: 1rem auto;
        }

        .main {
            position: relative;
        }

        .quantity {
            display: flex;
            justify-content: space-between;
        }

        input[type="number"] {
            width: 100px;
        }

        #message {
            position: absolute;
            top: 1%;
            left: 50%;
            transform: translateX(-50%);
        }

        .insert-error {
            display: flex;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .form-check-inline {
            margin: 0.5rem 1rem 0.75rem 0;
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
            <?php
            if (isset($message)) {
                echo $message;
                echo '  <script>
                setTimeout(() => {
                    document.querySelector("#message").style.display = "none";
                }, 2000)
                  </script>';
            }
            $query = "select * from parent_category";
            $result = $conn->query($query);
            if ($result->fetch()) :
            ?>
                <?php
                $query = "select * from category";
                $result = $conn->query($query);
                if ($result->fetch()) :
                ?>
                    <a style="margin-top: 1rem;" href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-secondary">BACK</a>
                    <form method="POST" action="addproduct.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name">
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
                            <input style="width: 100%;" type="number" class="form-control" placeholder="Enter price" min="0" step=".01" name="price">
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input value="one" type="radio" class="form-check-input" name="sizetype">One size
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input value="multiple" type="radio" class="form-check-input" name="sizetype">Multiple size
                            </label>
                        </div>
                        <div style="display: none;" id="one-size">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    Quantity: <input type="number" class="form-check-input" min="0" name="quantity-one">
                                </label>
                            </div>
                        </div>
                        <div style="display: none;" id="multiple-size" class="form-group">
                            <label>Quantity:</label>
                            <div class="quantity">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        XS: <input type="number" class="form-check-input" min="0" name="quantity[XS]">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        S: <input type="number" class="form-check-input" min="0" name="quantity[S]">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        M: <input type="number" class="form-check-input" min="0" name="quantity[M]">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        L: <input type="number" class="form-check-input" min="0" name="quantity[L]">
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        XL: <input type="number" class="form-check-input" min="0" name="quantity[XL]">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Parent category:</label>
                            <?php
                            $query = 'select * from parent_category';
                            $result = $conn->query($query);
                            $parent_categories = $result->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <select id="parent_category" class="form-control" name="parent_category">
                                <?php foreach ($parent_categories as $value) : ?>
                                    <option value=<?php echo $value['id'] ?>><?php echo $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Children category:</label>
                            <?php
                            $query = 'select id from parent_category limit 1';
                            $result = $conn->query($query);
                            $id = $result->fetch(PDO::FETCH_ASSOC);
                            $query = 'select * from category where parent_categoryid = ' . $id['id'];
                            $result = $conn->query($query);
                            $categories = $result->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <select id="children_categories" class="form-control" name="child_category">
                                <?php foreach ($categories as $value) : ?>
                                    <option value=<?php echo $value['categoryid'] ?>><?php echo $value['category_name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Upload files:</label>
                            <input type="file" class="form-control" placeholder="Upload files" name="images[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                <?php else : ?>
                    <div class="insert-error">
                        <h1>Please insert child category first !</h1>
                    </div>
                <?php endif ?>

            <?php else : ?>
                <div class="insert-error">
                    <h1>Please insert parent category first !</h1>
                </div>
            <?php endif ?>

        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
    <script>
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
        $("input[name=sizetype]").click(function() {
            if ($(this).val() == "one") {
                $("#one-size").show();
                $("#multiple-size").hide();
            } else if ($(this).val() == "multiple") {
                $("#one-size").hide();
                $("#multiple-size").show();
            }
        })
    </script>
</body>

</html>