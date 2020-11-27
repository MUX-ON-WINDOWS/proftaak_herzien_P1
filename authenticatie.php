<?php

session_start();

$conn = new mysqli('localhost','root','root','login', 8889);
if ($conn->connect_errno) {
    echo $conn->connect_error;
}
if ($stmt = $conn->prepare('SELECT * FROM login_page WHERE user_name = ? AND user_password = ?')) {
    $stmt->bind_param('ss', $_POST['user_name'], $_POST['user_password']);
    $stmt->execute();

// $stmt->store_result();
    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

// echo $row['user_name'] . ":" . $row['user_password'];

    if ($_POST['user_name'] === $row['user_name'] && $_POST['user_password'] === $row['user_password']) {
// session_regenerate_id();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $_POST['user_name'];
        header('Location: view.php');
    }

    $stmt->close();
}

