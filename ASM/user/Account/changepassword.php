<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #head {
            text-align: center;
            margin: 2rem 0;
        }

        #head a {
            font-weight: 400;
            font-size: 3rem;
            color: #041e3a;
            text-decoration: none;
        }

        .container {
            width: 100%;

        }

        .input_element {
            width: 100%;
        }

        .login-control {
            margin: 0.75rem 0;
        }

        #login-panel form {
            padding: 1em 2em;
        }

        #login-panel form input[type="text"],
        #login-panel form input[type="email"],
        #login-panel form input[type="password"] {
            width: 100%;
            padding: 0.4em 0.5em;
            font-size: 2rem;
            border: none;
            border: 1px solid grey;
        }

        #login-panel form input:focus {
            outline: none;
        }

        #login-panel .btn-sign-in {
            margin: 1.25em 0 2em 0;
            display: flex;
        }

        .btn-sign-in {
            width: 100%;
        }

        #login-panel .btn-sign-in button {
            background-color: #041e3a;
            flex: 1;
            border: none;
            color: white;
            cursor: pointer;
            padding: 1.5em 0;
            width: 100%;
        }

        #login-panel {
            width: 50%;
            margin: 4rem auto 0 auto;
        }

        p {
            color: red;
            margin-top: 1rem;
            font-size: 0.85rem;
        }

        h3 {
            color: #041e3a;
            font-size: 1.25rem;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <?php
    $email = $_SESSION['useremail'];
    if (isset($_POST['submit'])) {
        require_once '../../public/model/connectdb.php';
        $oldPass = $_POST['old_password'];
        $newPass = $_POST['new_password'];
        $reNewPass = $_POST['re_new_password'];
        $query = "select * from user where email = '$email' and password = '$oldPass'";
        if ($conn->query($query)->rowCount() > 0) {
            if ($newPass != $reNewPass || $newPass == "") {
                $keepValue = '';
                $error = "<p>New password is not valid !</p>";
            } else {
                $query = "update user set password = '$newPass' where email = '$email'";
                $conn->exec($query);
                $success = "<h3>Password has been changed successfully</h3>";
            }
        } else {
            $error = "<p>Password is not valid !</p>";
            $keepValue = '';
        }
    }
    ?>
    <div class="container">
        <header>
            <div id="head">
                <a href="/ASM/user/Index">FASHION SHOP</a>
            </div>
        </header>
        <div id="login-panel">
            <form action="" method="post">
                <div class="login-control">
                    <input class="input_element" type="text" value="<?= $email ?>" readonly>
                </div>
                <div class="login-control">
                    <input class="input_element" type="password" name="old_password" placeholder="Type your old password" value="<?php echo isset($keepValue) ? $oldPass : "" ?>">
                </div>
                <div class="login-control">
                    <input class="input_element" type="password" name="new_password" placeholder="Type your new password" value="<?php echo isset($keepValue) ? $newPass : "" ?>">
                </div>
                <div class="login-control">
                    <input class="input_element" type="password" name="re_new_password" placeholder="Retype your new password" value="<?php echo isset($keepValue) ? $reNewPass : "" ?>">
                </div>
                <div class="btn-sign-in">
                    <button type="submit" name="submit">CHANGE PASSWORD</button>
                </div>
                <?php echo isset($error) ? $error : "" ?>
                <?php echo isset($success) ? $success : "" ?>
            </form>
        </div>
    </div>

</body>

</html>