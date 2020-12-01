<?php

include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$query = "DELETE FROM taak WHERE id=$id";

// Prepare statement
$stmt = $conn->prepare($query);

// execute the query
$stmt->execute();

?>