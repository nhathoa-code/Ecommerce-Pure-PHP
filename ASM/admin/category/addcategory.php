<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ASM/admin/index.css">
    <style>
        form {
            padding: 3rem 5rem;
        }

        #message {
            margin-top: 2rem;
            width: fit-content;
        }

        .insert-error {
            text-align: center;
            margin-top: 5rem;
        }
    </style>
</head>

<?php
require_once '../../public/model/connectdb.php';
if (isset($_POST['submit']) && $_POST['action'] == "addparent") {
    $name = $_POST['name'];
    $query = 'insert into parent_category (name) values("' . $name . '")';
    $conn->exec($query);
    $message = '<p id="message" class="alert alert-success">Parent category added successfully</p>';
}
if (isset($_POST['submit']) && $_POST['action'] == "addchild") {
    $name = $_POST['name'];
    $parent_id = $_POST['parent-id'];
    $query = 'insert into category (category_name,parent_categoryid) values("' . $name . '","' . $parent_id . '")';
    $conn->exec($query);
    $message = '<p id="message" class="alert alert-success">Child category added successfully</p>';
}

?>


<body>
    <header>
        <h1>WELCOME ADMIN</h1>
    </header>
    <div id="container">
        <div class="menu_container">
            <?php require_once '../menu.php'; ?>
        </div>
        <div class="main">
            <a style="margin-top: 1rem;" href="./categorylist.php" class="btn btn-secondary">BACK</a>
            <?php if ($_GET['action'] == 'addchild') : ?>
                <?php
                $query = "select * from parent_category";
                $result = $conn->query($query);
                if ($result->fetch()) :
                ?>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="sel1">Select parent category:</label>
                            <select class="form-control" name="parent-id" id="sel1">
                                <?php
                                $query = 'select * from parent_category';
                                $result = $conn->query($query);
                                $parent_categories = $result->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($parent_categories as $value) :
                                ?>
                                    <option value=<?php echo $value['id'] ?>><?php echo $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <input type="hidden" name="action" value="addchild">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <?php
                        if (isset($message)) {
                            echo $message;
                            echo '  <script>
                setTimeout(() => {
                    document.querySelector("#message").style.display = "none";
                }, 2000)
                  </script>';
                        }
                        ?>
                    </form>
                <?php else : ?>
                    <div class="insert-error">
                        <h1>Please insert parent category first !</h1>
                    </div>
                <?php endif ?>
            <?php else : ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name">
                    </div>
                    <input type="hidden" name="action" value="addparent">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <?php
                    if (isset($message)) {
                        echo $message;
                        echo '  <script>
                setTimeout(() => {
                    document.querySelector("#message").style.display = "none";
                }, 2000)
                  </script>';
                    }
                    ?>
                </form>
            <?php
            endif
            ?>
        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
</body>

</html>