<?php

// Query maken om alle rijen uit de tabel taak op te halen
$query = $conn->query("SELECT * FROM taak");

?>

<!-- Tabel aanmaken in HTML -->
<table>
    <tr>
        <th>Naam</th>
        <th>Taakomschrijving</th>
        <th>Deadline</th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>

    <!-- While loop die door alle opgehaalde rijen van de tabel taak gaat -->
    <?php while ($row = $query->fetch()) { ?>

    <!-- Alle data van de opgehaalde rij in table row stoppen -->
    <tr>
        <td><?php echo $row['naam']; ?></td>
        <td><?php echo $row['taakomschrijving']; ?></td>
        <td><?php echo $row['deadline']; ?></td>
        <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Verwijderen</a></td>
    </tr>

    <?php } ?>
</table>