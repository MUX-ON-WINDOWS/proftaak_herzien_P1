<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="css.file.css">
</head>
<body>

<div id="top"></div>
<div class="login">
    <h1>Wrong password or username </h1>
    <form action="authenticatie.php" method="post">
        <input type="submit" value="Login">
    </form>
</div>
</body>