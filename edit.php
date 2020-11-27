<?php


    session_start();

    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        header('Location: view.php');
        exit();
    }

    class editClass
    {

    }

    function editForm(array $n)
    {
        $conn = new mysqli('localhost', 'root', 'root', 'receptie', 8889);
        if ($conn->connect_errno) {
            throw new Exception($conn->connect_error);
        }

        if (isset($_GET['edit'])) {
            $idBezoeker = $_GET['edit'];
            $update = true;
            $record = mysqli_query($conn, "SELECT * FROM bezoeker WHERE idBezoeker='$idBezoeker'");

            if (isset($n['submit'])) {
                $n = mysqli_fetch_array($record);
                $naam = $n['naam'];
                $bedrijf = $n['bedrijf'];
                $aankomst = $n['aankomst'];
                $vertrek = $n['vertrek'];
                $idReceptionist = $n['idReceptionist'];
                $idBezoekerspas = $n['idBezoekerspas'];
            }
        }

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Edit</title>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            <link rel="stylesheet" href="/css.file1.css">
        </head>
        <body>
        <div id="top"></div>
        <div class="login">
            <h1>Edit</h1>
            <form method="post">
                <input type="hidden" name="id" value="<?php
                echo $idBezoeker; ?>">

                <label for="naam">
                </label>
                <input type="text" name="naam" value="<?php
                echo $naam; ?>">
                <label for="bedrijf">
                </label>
                <input type="text" name="bedrijf" value="<?php
                echo $bedrijf; ?>">
                <label for="aankomst">
                </label>
                <input type="time" name="aankomst" value="<?php
                echo $aankomst; ?>">
                <label for="vertrek">
                </label>
                <input type="time" name="vertrek" value="<?php
                echo $vertrek; ?>">
                <label for="idReceptionist">
                </label>
                <input type="number" name="idReceptionist" value="<?php
                echo $idReceptionist; ?>">
                <label for="idReceptionist">
                </label>
                <input type="number" name="idBezoekerspas" value="<?php
                echo $idBezoekerspas; ?>">
                <label for="idBezoekerspas">
                </label>
                <?php
                if ($update == true): ?>
                    <button class="btn" type="submit" name="update">update</button>
                <?php
                endif ?>
            </form>
        </div>
        </body>
        </html>

        <?php

        if (isset($_POST['update'])) {
            $naam = $_POST['naam'];
            $bedrijf = $_POST['bedrijf'];
            $aankomst = $_POST['aankomst'];
            $vertrek = $_POST['vertrek'];
            $idReceptionist = $_POST['idReceptionist'];
            $idBezoekerspas = $_POST['idBezoekerspas'];

            mysqli_query(
                $conn,
                "UPDATE bezoeker SET naam='$naam', bedrijf='$bedrijf', aankomst='$aankomst', vertrek='$vertrek', idReceptionist='$idReceptionist', idBezoekerspas='$idBezoekerspas'  WHERE idBezoeker='$idBezoeker'"
            );
            header('location: view.php');
        }


        try {
            editForm($_POST);
            header('Location: view.php');
        } catch (Exception $e) {
            echo "Fout bij het toevoegen van de bezoekergegevens bewerken:<br><br>";
            echo "(" . $e->getMessage() . ")";
            exit;
        }
}