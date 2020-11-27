<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registreren</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="css.file1.css">
</head>
<body>
<div id="top"></div>
<div class="login">
  <h1>Registreren</h1>
  <form action="submit.php" method="post">
    <label for="naam">
    </label>
    <input type="text" name="naam" placeholder="naam" id="naam" required>
    <label for="bedrijf">
    </label>
    <input type="text" name="bedrijf" placeholder="bedrijf" id="bedrijf" required>
    <label for="aankomst">
    </label>
    <input type="time" name="aankomst" placeholder="aankomst" id="aankomst" required>
    <label for="idReceptionist">
    </label>
    <input type="number" name="idReceptionist" placeholder="idReceptionist" id="idReceptionist" required>
    <label for="idBezoekerspas">
    </label>
    <input type="number" name="idBezoekerspas" placeholder="idBezoekerspas" id="idBezoekerspas" required>

    <input type="submit" name="submit" value="Submit">
  </form>
</div>
<div class="login">
  <a href="login.php">Login</a>
</div>
</body>
</html>