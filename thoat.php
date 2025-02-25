<?php
session_start(); // Bắt đầu session
// Xóa tất cả giá trị trong session
session_unset(); 
session_destroy(); // Hủy session
// Xóa cookie (nếu có dùng trước đó)
if (isset($_COOKIE['user'])) {
    setcookie("user", "", time() - 3600, "/");
    setcookie("fullname", "", time() - 3600, "/");
    setcookie("id", "", time() - 3600, "/");
}
header('Location: login.php'); // Quay lại trang đăng nhập
?>