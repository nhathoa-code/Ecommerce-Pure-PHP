<?php
// bắt đầu phiên session
session_start();
require_once '../../public/model/connectdb.php';
// lấy dữ liệu từ form đăng nhập
$email = $_POST['email'];
$password = $_POST['password'];
// viết truy vấn lấy dữ liệu từ csdl
$query = 'select * from user where BINARY email = "' . $email . '" and BINARY password = "' . $password . '"';
// thực thi câu truy vấn
$user = $conn->query($query);
// dùng phương thức fetch để nhận dữ liệu về dạng mãng
$result = $user->fetch(PDO::FETCH_ASSOC);
// kiểm tra mãng có tồn tại hay không
if ($result) {
    // nếu có(nghĩa là đăng nhập thành công) tiến hành lưu thông tin khách hàng vào session và cookie
    $_SESSION["username"] = $result['username'];
    $_SESSION["userid"] = $result['userid'];
    $_SESSION['useremail'] = $result['email'];
    $_SESSION['name'] = $result['name'];
    setcookie("username", $result['username'], time() + 24 * 3600 * 7, "", "localhost");
    setcookie("password", $result['password'], time() + 24 * 3600 * 7, "", "localhost");
    echo json_encode("");
} else {
    // nếu mãng không tồn tại echo về một thông báo lỗi cho frontend
    echo json_encode(array("message" => "Email hoặc mật khẩu không đúng", "error" => 1));
}
