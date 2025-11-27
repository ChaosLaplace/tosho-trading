<?php
session_start();

if (empty($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?= $_SESSION['username']; ?> !</h2>
    <a href="logout.php">登出</a>
</body>
</html>
