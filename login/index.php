<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
    body {
        font-family: Arial;
        background: #f5f5f5;
    }
    .container {
        width: 300px;
        margin: 100px auto;
        padding: 30px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
    }
    .btn {
        background: #2196F3;
        color: white;
        border: none;
        padding: 10px;
        width: 100%;
        cursor: pointer;
    }
    .btn:hover {
        background: #0b7dda;
    }
    .error { color: red; }
</style>
</head>
<body>

<div class="container">
    <h3>Login</h3>
    
    <?php if (!empty($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form method="post" action="login_check.php" onsubmit="return validate()">
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="password" id="password" name="password" placeholder="Password">
        <button class="btn" type="submit">登入</button>
    </form>
</div>

<script>
function validate() {
    if (!username.value || !password.value) {
        alert("帳號與密碼不可為空");
        return false;
    }
}
</script>

</body>
</html>
