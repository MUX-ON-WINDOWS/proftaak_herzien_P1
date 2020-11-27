<?php


    session_start();

    if ($_SERVER['REQUEST_METHOD'] !== "POST") {
        header('Location: index.php');
        exit();
    }

//class GegevensToevoegen{
// Insert into functie MET exception
    function voegRecordToe(array $data): void
    {
        // Dit is een object (oop-stijl)
        $conn = mysqli_init();
        $conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
        $conn = new mysqli('localhost', 'root', 'root', 'receptie', 8889);
//    $conn->real_connect('localhost', 'root', 'root', 'receptie', 8889);
        if ($conn->connect_errno) {
            throw new Exception($conn->connect_error);
        }

        if (isset($data['submit'])) {
            $na = $data['naam'];
            $be = $data['bedrijf'];
            $aan = $data['aankomst'];
//        $ver = $data['vertrek'];
            $idR = $data['idReceptionist'];
            $idB = $data['idBezoekerspas'];

            $query = "INSERT INTO bezoeker (naam, bedrijf, aankomst, idReceptionist, idBezoekerspas) VALUES ('$na', '$be', '$aan', '$idR', '$idB')";

            // dit is NIET oop-stijl
            $run = mysqli_query($conn, $query); // or die (mysqli_error()); // Moet throw new Exception worden
            // wat je wilt doen is: $conn->query(...);
            // of beter nog: $conn->prepare(...); // !! anders SQL-injection.
            if ($conn->errno) {
                throw new Exception($conn->error);
            }
        }
    }

// probeer:
    try {
        // Voer de functie uit:
        voegRecordToe($_POST);
        // Als  het gaat is gegaan, redirect naar inloggen
        header('Location: login.php');
    } catch (Exception $e) {
        echo "Fout bij het toevoegen van de bezoekergegevens:<br><br>";
        echo "(" . $e->getMessage() . ")";
        exit;
}
