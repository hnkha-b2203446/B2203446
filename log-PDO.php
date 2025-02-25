<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :pass");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Đăng nhập thành công!";
        } else {
            echo "Sai tài khoản hoặc mật khẩu!";
        }
    }
} catch(PDOException $e) {
    echo "Lỗi kết nối: " . $e->getMessage();
}
?>
