<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
// Kết nối CSDL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    // Sử dụng Prepared Statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Đăng nhập thành công!";
    } else {
        echo "Sai tài khoản hoặc mật khẩu!";
    }
    $stmt->close();
}
$conn->close();
?>
