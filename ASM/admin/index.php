<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ASM/admin/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <style>
        i {
            font-size: 25rem;
            cursor: default;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>


<body>
    <header>
        <h1>WELCOME ADMIN</h1>
    </header>
    <div id="container">
        <div class="menu_container">
            <nav class="navbar bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/ASM/admin/product/productlist.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ASM/admin/category/categorylist.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ASM/admin/customer/customerlist.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ASM/admin/order/orderlist.php">Order</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="main">
            <i class="fas fa-user-cog"></i>
        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
</body>

</html>