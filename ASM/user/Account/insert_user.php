<?php
// copy file kết nối csdl
require_once '../../public/model/connectdb.php';
// lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
// viết câu truy vấn thêm khách hàng vào csdl
$query = 'insert into user(username,password,name,email) values("' . $username . '", "' . $password . '", "' . $name . '", "' . $email . '")';
// thực thi câu truy vấn
$conn->exec($query);
// echo dữ liệu về cho frontend(cái này không nhất thiết nếu không cần)
echo json_encode("");
