<?php

session_start();

//if (!isset($_SERVER['loggedin'])) {
//    header('Location: login.php');
//    exit;
//}
?>

<?php
$conn = new mysqli('localhost', 'root', 'root', 'receptie', 8889);
$results = mysqli_query($conn, "SELECT * FROM bezoeker");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>view page</title>
    <link href="/css.file3.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body >

<div class="content">
<!--    <p>Welcome back, --><?//= $_SESSION['name'] ?><!--</p>-->
<a href="logout.php">logout</a>

</div>
<table>
    <tr>
        <th>idBezoeker</th>
        <th>naam</th>
        <th>bedrijf</th>
        <th>aankomst</th>
        <th>vertrek</th>
        <th>idReceptionist</th>
        <th>idBezoekerspas</th>
        <th></th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php
                echo $row['idBezoeker'] ?></td>
            <td><?php
                echo $row['naam'] ?></td>
            <td><?php
                echo $row['bedrijf'] ?></td>
            <td><?php
                echo $row['aankomst'] ?></td>
            <td><?php
                echo $row['vertrek'] ?></td>
            <td><?php
                echo $row['idReceptionist'] ?></td>
            <td><?php
                echo $row['idBezoekerspas'] ?></td>
            <td>
                <a href="edit.php?edit=<?php
                echo $row['idBezoeker']; ?>" class="edit_btn">Edit</a>
            </td>
        </tr>
        <?php
    } ?>
</table>

</body>
</html>
