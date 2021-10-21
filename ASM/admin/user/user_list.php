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
            margin: 1.5rem 2.5rem;
        }

        .pop_up {
            width: 15vw;
        }

        .pop_up p {
            color: white;
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
    </style>
</head>


<body>
    <header>
        <h1>WELCOME ADMIN</h1>
    </header>
    <div class="pop_up_container">
        <div class="pop_up">
            <p>Are you sure ?</p>
            <div>
                <button id="delete" class="btn btn-success">YES</button>
                <button id="cancel" class="btn btn-dark">CANCEL</button>
            </div>
        </div>
    </div>
    <div id="container">
        <?php require_once '../menu.php'; ?>
        <div class="main">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Userid</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../../public/model/connectdb.php';
                    $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
                    $from = (intval($current_page) - 1) * 5;
                    $total_users = countRows("user");
                    $query = "select * from user limit $from,5";
                    $result = $conn->query($query);
                    $users = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($users as $user) :
                    ?>
                        <tr data-id="<?php echo $user['userid'] ?>">
                            <td><?php echo $user['userid'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><button data-id="<?php echo $user['userid'] ?>" class="btn btn-danger show-pop-up">Delete</button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php echo pageLinks($total_users, $current_page) ?>
        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
    <script>
        let id;
        $(".show-pop-up").click(function() {
            id = $(this).attr("data-id");
            $(".pop_up_container").css("display", "block");
            $(".pop_up").css("animation-name", "slide_down");
        })
        $("#cancel").click(function() {
            $(".pop_up").css("animation-name", "slide_up");

        })
        $('#delete').click(function() {
            $.ajax({
                url: "user_control.php",
                method: "POST",
                data: {
                    "action": "delete",
                    "id": id
                },
                success: function() {
                    $("tr[data-id=" + id + "]").remove();
                    $(".pop_up_container").css("display", "none");
                }
            })
        })
        $(".pop_up").on("animationend", function() {
            if ($(".pop_up").css("animation-name") == "slide_up") {
                $(".pop_up_container").css("display", "none");
            }
        })
    </script>
</body>

</html>