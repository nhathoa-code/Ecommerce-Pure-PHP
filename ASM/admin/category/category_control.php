<?php
require_once '../../public/model/connectdb.php';

if ($_POST['action'] == 'delete') {
    if ($_POST['level'] == "parent") {
        $id = $_POST['id'];
        $query = 'delete from parent_category where id = ' . $id;
        $conn->exec($query);
        echo "delete_parent";
    } else {
        $id = $_POST['id'];
        $query = 'delete from category where categoryid = ' . $id;
        $conn->exec($query);
        echo "delete_child";
    }
}

if ($_POST['action'] == "fetch") {
    if ($_POST['level'] == "parent") {
        $query = 'select * from parent_category where id = ' . $_POST['id'];
        $result = $conn->query($query);
        $category = $result->fetch(PDO::FETCH_ASSOC);
        echo json_encode($category);
    } else {
        $query = 'select * from category where categoryid = ' . $_POST['id'];
        $result = $conn->query($query);
        $category = $result->fetch(PDO::FETCH_ASSOC);
        echo json_encode($category);
    }
}
if ($_POST['action'] == "edit") {
    if ($_POST['level'] == "parent") {
        $query = "update parent_category set name = '" . $_POST['name'] . "' where id = " . $_POST['id'];
        $conn->exec($query);
    } else {
        $query = "update category set category_name = '" . $_POST['name'] . "' where categoryid = " . $_POST['id'];
        $conn->exec($query);
    }
}
