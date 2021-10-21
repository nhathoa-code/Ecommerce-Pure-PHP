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
            margin: 1rem 1.5rem;
        }

        .pop_up {
            width: 15vw;
        }

        .pop_up p {
            color: white;
        }

        .effect {
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            animation-name: updating;
            animation-duration: 0.5s;
            animation-timing-function: ease-out;
            animation-fill-mode: forwards;
        }

        @keyframes updating {
            from {
                background-color: rgba(255, 255, 255, 0);
            }

            to {
                background-color: rgba(255, 255, 255, 0.3);
            }
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
    <div class="effect">

    </div>
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
                        <th>Orderid</th>
                        <th>Customer name</th>
                        <th>Order status</th>
                        <th>Subtotal</th>
                        <th>Detail</th>
                        <th>Detele</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../../public/model/connectdb.php';
                    $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
                    $from = (intval($current_page) - 1) * 5;
                    $total_orders = countRows("user_order");
                    $query = "select * from user_order limit $from,5";
                    $result = $conn->query($query);
                    $orders = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($orders as $order) :
                    ?>
                        <tr data-id="<?php echo $order['orderid'] ?>">
                            <td><?php echo $order['orderid'] ?></td>
                            <td><?php echo $order['username'] ?></td>
                            <td>
                                <div class="form-group">
                                    <select data-id="<?php echo $order['orderid'] ?>" class="form-control status_update">
                                        <option value="Unpaid" <?php echo $order['order_status'] == "Unpaid" ? "selected" : "" ?>>Unpaid</option>
                                        <option value="Shipping" <?php echo $order['order_status'] == "Shipping" ? "selected" : "" ?>>Shipping</option>
                                        <option value="Paid" <?php echo $order['order_status'] == "Paid" ? "selected" : "" ?>>Paid</option>
                                    </select>
                                </div>
                            </td>
                            <td><?php echo "$" . $order['subtotal'] ?></td>
                            <td><a href="./order_detail.php?orderid=<?php echo $order['orderid'] ?>" class="btn btn-info show-pop-up">detail</a></td>
                            <td><button data-id="<?php echo $order["orderid"] ?>" class="btn btn-danger show-pop-up">delete</button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php echo pageLinks($total_orders, $current_page) ?>
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
            $(".pop_up_container").css("display", "none");
            $.ajax({
                url: "order_control.php",
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
        $(".pop_up").on("animationend", function() {
            if ($(".pop_up").css("animation-name") == "slide_up") {
                $(".pop_up_container").css("display", "none");
            }
        })
        $(".status_update").change(function() {
            $(".effect").show();
            setTimeout(() => {
                $.ajax({
                    url: "order_control.php",
                    method: "POST",
                    data: {
                        "action": "update_status",
                        "id": $(this).attr("data-id"),
                        "status": $(this).val()
                    },
                    success: function(data) {
                        $(".effect").hide();
                    },
                    error: function(message) {
                        console.log(message);
                    }
                })
            }, 10)
        })
    </script>
</body>

</html>