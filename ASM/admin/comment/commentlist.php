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

        .logic-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<?php
require_once '../../public/model/connectdb.php';
$current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
$from = (intval($current_page) - 1) * 5;
if (isset($_GET['productid'])) {
    $productid = $_GET['productid'];
    $total_comments = countComments($productid);
    $query = "select * from comment where productid = $productid limit $from,5";
} else {
    $total_comments = countRows('comment');
    $query = "select * from comment";
}
$result = $conn->query($query);
$comments = $result->fetchAll(PDO::FETCH_ASSOC);
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
            <a style="margin-top: 1rem;" href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-secondary">BACK</a>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Comment id</th>
                        <th>User id</th>
                        <th>User name</th>
                        <th>Comment date</th>
                        <th>Message</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment) : ?>
                        <tr data-id="<?php echo $comment['id'] ?>">
                            <td><?php echo $comment['id'] ?></td>
                            <td><?php echo $comment['userid'] ?></td>
                            <?php
                            $query = "select name from user where userid = '" . $comment['userid'] . "'";
                            $name = $conn->query($query)->fetch(PDO::FETCH_ASSOC)['name'];
                            ?>
                            <td><?php echo $name ?></td>
                            <td><?php echo $comment['commentDate'] ?></td>
                            <td><?php echo $comment['message'] ?></td>
                            <td><button data-id="<?php echo $comment['id'] ?>" class="btn btn-danger show-pop-up">Delete</button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php echo pageLinks($total_comments, $current_page) ?>
        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
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
                url: "comment_control.php",
                method: "POST",
                data: {
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
    </script>
</body>

</html>