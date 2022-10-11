<?php

// Kopieer code van connect.php naar dit bestand
include 'connect.php';

// Als er in de url een id is meegegeven van de rij, dan de id aan variabele geven
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Statement voorbereiden met :id als placeholder
$select = $conn->prepare("SELECT * FROM taak WHERE id=:id");

// Placeholder :id koppelen aan variabele $id
$select->bindParam(':id', $id);

// Query uitvoeren
$select->execute();

// Alle data van rij ophalen
$row = $select->fetch();

// Als er op de button van het updateformulier is geklikt, dan de geüpdatete data van een rij verwerken in database
if (isset($_POST['submit'])) {
    
    // Waardes van formulier ophalen en aan variabele geven
    $naam = $_POST['naam'];
    $taakomschrijving = $_POST['taakomschrijving'];
    $deadline = $_POST['deadline'];

    // UPDATE query maken om geüpdatete data van een rij te kunnen verwerken in database met placeholders
    $query = "UPDATE taak SET naam = :naam,
                            taakomschrijving = :taakomschrijving,
                            deadline = :deadline
                            WHERE id=:id";

    // Statement voorbereiden
    $stmt = $conn->prepare($query);

    // Placeholders koppelen aan variabelen
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':taakomschrijving', $taakomschrijving);
    $stmt->bindParam(':deadline', $deadline);
    $stmt->bindParam(':id', $id);

    // Query uitvoeren
    $stmt->execute();

    // Weer teruggaan naar index.php
    header("location: index.php");
}

?>

<!-- Opgehaalde data van rij in value attribuut zetten -->
<form method="post">
    <input type="text" name="naam" value="<?php echo $row['naam']; ?>"><br>
    <input type="text" name="taakomschrijving" value="<?php echo $row['taakomschrijving']; ?>"><br>
    <input type="date" name="deadline" value="<?php echo $row['deadline']; ?>"><br>
    <input type="submit" name="submit" value="Updaten"><br>
</form>