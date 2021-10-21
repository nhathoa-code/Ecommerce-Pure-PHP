<?php
require_once '../../public/model/connectdb.php';
if ($_POST['action'] == "delete") {
    $query = 'delete from user where userid = ' . $_POST['id'];
    $conn->exec($query);
}
