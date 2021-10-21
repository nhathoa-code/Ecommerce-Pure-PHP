<?php
session_start();
require_once '../../public/model/connectdb.php';
switch ($_POST['action']) {
    case "add":
        $commentDate = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $userid = $_POST['userid'];
        $productid = $_POST['productid'];
        $message = $_POST['message'];
        $name = $_SESSION['name'];
        $query = "insert into comment(userid,productid,commentDate,message) values('$userid','$productid','$commentDate','$message')";
        $conn->exec($query);
        $id = $conn->lastInsertId();
        $message = nl2br($message);
        echo "<div data-id='$id' class='comment'>
        <div class='comment-info'>
         <div>
         <span>$name</span>
          <div class='btn-container'>
            <button data-id='$id' class='edit'>Edit</button>
            <button data-id='$id' class='delete'>Delete</button>
        </div>
        </div>
          <span>$commentDate</span>
           </div> <textarea readonly data-id='$id' class='message'>$message</textarea></div>";
        break;
    case "edit":
        $id = $_POST['id'];
        $message = $_POST['message'];
        $query = "update comment set message = '$message' where id = '$id'";
        $conn->exec($query);
        echo $id;
        break;
    case "delete":
        $id = $_POST['id'];
        $query = "delete from comment where id = $id";
        $conn->exec($query);
        echo $id;
        break;
}
