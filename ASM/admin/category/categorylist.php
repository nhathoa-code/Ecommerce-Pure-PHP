<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ASM/admin/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<?php
require_once '../../public/model/connectdb.php';
$query = 'select * from category';
$result = $conn->query($query);
$categories = $result->fetchAll(PDO::FETCH_ASSOC);
?>


<body>
    <header>
        <h1>WELCOME ADMIN</h1>
    </header>
    <div class="pop_up_container">
        <div class="pop_up">
            <div>
                <form id="edit-data" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="level" id="level">
                    <input type="hidden" name="action" value="edit">
                    <button id="edit" class="btn btn-success">YES</button>
                    <button id="cancel" class="btn btn-dark">CANCEL</button>
                </form>
            </div>
        </div>
    </div>
    <div class="pop_up_container_delete">
        <div class="pop_up_delete">
            <p>Are you sure ?</p>
            <div>
                <button id="delete" class="btn btn-success">YES</button>
                <button id="cancel_delete" class="btn btn-dark">CANCEL</button>
            </div>
        </div>
    </div>
    <div id="container">
        <?php require_once '../menu.php'; ?>
        <div class="main">
            <div style="margin-bottom: 1rem;">
                <a href="./addcategory.php?action=addparent" class="btn btn-success">Add parent category</a>
                <a href="./addcategory.php?action=addchild" class="btn btn-success">Add child category</a>
            </div>
            <div style="font-weight: bold;" class="row">
                <div class="col-sm-3">
                    <p>Id</p>
                </div>
                <div class="col-sm-3">
                    <p>Name</p>
                </div>
                <div class="col-sm-3">
                    <p>Edit</p>
                </div>
                <div class="col-sm-3">
                    <p>Delete</p>
                </div>
            </div>
            <?php
            $query = 'select * from parent_category';
            $result = $conn->query($query);
            $parent_categories = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($parent_categories as $value) :
            ?>
                <div data-identify="parent-category-<?php echo $value['id'] ?>" class="row parent-row">
                    <div class="col-sm-3">
                        <p><?php echo $value['id'] ?></p>
                    </div>
                    <div class="col-sm-3">
                        <p data-level-id="parent-<?php echo $value['id'] ?>"><?php echo $value['name'] ?></p>
                    </div>
                    <div class="col-sm-3">
                        <a data-level="parent" data-id="<?php echo $value['id'] ?>" class="edit-show btn btn-primary">Edit</a>
                    </div>
                    <div class="col-sm-3">
                        <a data-level="parent" data-id="<?php echo $value['id'] ?>" class="btn btn-danger delete">Delete</a>
                        <i data-id=<?php echo $value['id'] ?> class="show show-<?php echo $value['id'] ?> fas fa-chevron-right"></i>
                        <i style="display: none;" data-id=<?php echo $value['id'] ?> class="hide hide-<?php echo $value['id'] ?> fas fa-chevron-down"></i>
                    </div>
                </div>
                <div style="height: 0px;overflow:hidden;transition:height 0.5s ease-in-out">
                    <div class="row-<?php echo $value['id'] ?> row-subcategories">
                        <?php
                        $query = 'select * from category where parent_categoryid = ' . $value['id'];
                        $result = $conn->query($query);
                        $categories = $result->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($categories as $value) :
                        ?>
                            <div data-level="child" data-id="<?php echo $value['categoryid'] ?>" class="row">
                                <div class="col-sm-3">
                                    <p><?php echo $value['categoryid'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <p data-level-id="child-<?php echo $value['categoryid'] ?>"><?php echo $value['category_name'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <a data-level="child" data-id="<?php echo $value['categoryid'] ?>" class="edit-show btn btn-primary">Edit</a>
                                </div>
                                <div class="col-sm-3">
                                    <a data-level="child" data-id="<?php echo $value['categoryid'] ?>" class="btn btn-danger delete">Delete</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
    <footer>
        <p>
            &copy; copy right 2021
        </p>
    </footer>
    <script>
        let level = '';
        let id = '';
        $(".edit-show").click(function() {
            $(".pop_up_container").css("display", "block");
            $(".pop_up").css("animation-name", "slide_down");
            level = $(this).attr("data-level");
            $.ajax({
                url: "category_control.php",
                method: "POST",
                data: {
                    "id": $(this).attr("data-id"),
                    "action": "fetch",
                    "level": level
                },
                dataType: 'json',
                success: function(data) {
                    if (level == "parent") {
                        $("#name").val(data.name);
                        $("#id").val(data.id);
                        $('#level').val(level);
                    } else {
                        $("#name").val(data.category_name);
                        $("#id").val(data.categoryid);
                        $("#level").val(level);
                    }

                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
        $('#edit').click(function(event) {
            event.preventDefault();
            $(".pop_up_container").css("display", "none");
            $.ajax({
                url: "category_control.php",
                method: "POST",
                data: $("#edit-data").serialize(),
                success: function(data) {
                    $("p[data-level-id=" + level + "-" + $("#id").val() + "]").html($("#name").val());
                    $("#edit-data")[0].reset();
                },
                error: function(message) {
                    console.log(message);
                }
            })
        })
        $("#cancel").click(function(event) {
            event.preventDefault();
            $(".pop_up").css("animation-name", "slide_up");

        })
        $(".pop_up").on("animationend", function() {
            if ($(".pop_up").css("animation-name") == "slide_up") {
                $(".pop_up_container").css("display", "none");
            }
        })
        $(".show").click(function() {
            $(".show-" + $(this).attr("data-id")).hide();
            $(".hide-" + $(this).attr("data-id")).show();
            let height = $(".row-" + $(this).attr("data-id")).height();
            $(this).parent().parent().next().css("height", height + "px");
        })
        $(".hide").click(function() {
            $(".show-" + $(this).attr("data-id")).show();
            $(".hide-" + $(this).attr("data-id")).hide();
            $(this).parent().parent().next().css("height", "0px");
        })
        $(".delete").click(function() {
            $(".pop_up_container_delete").css("display", "block");
            $(".pop_up_delete").css("animation-name", "slide_down");
            level = $(this).attr("data-level");
            id = $(this).attr("data-id");
        })
        $("#cancel_delete").click(function(event) {
            $(".pop_up_delete").css("animation-name", "slide_up");

        })
        $(".pop_up_delete").on("animationend", function() {
            if ($(".pop_up_delete").css("animation-name") == "slide_up") {
                $(".pop_up_container_delete").css("display", "none");
            }
        })
        $("#delete").click(function() {
            $.ajax({
                url: "category_control.php",
                method: "POST",
                data: {
                    "action": "delete",
                    "level": level,
                    "id": id
                },
                success: function(data) {
                    if (data.trim() == "delete_child") {
                        $("div[data-id=" + id + "][data-level=" + level + "]").remove();
                        $(".pop_up_container_delete").css("display", "none");
                    } else if (data.trim() == "delete_parent") {
                        $("div[data-identify='parent-category-" + id + "']").remove();
                        $("div.row-" + id).remove();
                        $(".pop_up_container_delete").css("display", "none");
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