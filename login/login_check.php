<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db   = 'tosho-trading';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB error: " . $conn->connect_error);
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

// var_dump(password_hash("123456", PASSWORD_BCRYPT));

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user['username'];
    header("Location: dashboard.php");
} else {
    $_SESSION['error'] = "帳號或密碼錯誤！";
    header("Location: index.php");
}
exit;
