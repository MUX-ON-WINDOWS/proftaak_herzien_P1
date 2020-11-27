<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="/css.file.css">
</head>
<body>
<div id="top"></div>
<div class="login">
    <h1>Login</h1>
    <form action="authenticatie.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="user_name" placeholder="Username" id="user_name" required>
        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="user_password" placeholder="Password" id="user_password" required>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
