<?php
require_once '../../public/model/connectdb.php';
$id = $_POST['id'];
$query = "delete from comment where id = $id";
$conn->exec($query);
