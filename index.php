<!DOCTYPE html>
<html>
<head>
    <title>To-do list met PHP, PDO en een MySQL database</title>
</head>
<body>

<!-- Formulier om een taak te versturen naar de database en in de taak tabel -->
<form method="post" action="create.php">
    <input type="text" placeholder="Naam" name="naam"><br>
    <input type="text" placeholder="Taakomschrijving" name="taakomschrijving"><br>
    <input type="date" name="deadline"><br>
    <input type="submit" name="submit" value="Verzenden"><br>
</form><br>

</body>
</html>