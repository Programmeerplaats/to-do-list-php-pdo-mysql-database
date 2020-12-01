<?php

// Kopieer code van connect.php naar dit bestand
include 'connect.php';

// Als er op de button van het formulier is geklikt, dan code uitvoeren in het if statement
if (isset($_POST['submit'])) {

    // Waardes van formulier ophalen en aan variabele geven
    $naam = $_POST['naam'];
    $taakomschrijving = $_POST['taakomschrijving'];
    $deadline = $_POST['deadline'];

    // Query maken om data op de juiste manier toe te voegen aan tabel
    $query = "INSERT INTO taak (naam, taakomschrijving, deadline) VALUES ('$naam', '$taakomschrijving', '$deadline')";

    // Voer de query uit
    $conn->exec($query);

    // Weer teruggaan naar index.php
    // Ook te voorkomen dat een rij nog een keer wordt toegevoegd bij een refresh
    header("location: index.php");
}

?>