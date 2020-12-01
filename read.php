<?php

$stmt = $conn->query("SELECT * FROM taak");

?>

<table>
    <tr>
        <th>Naam</th>
        <th>Taakomschrijving</th>
        <th>Deadline</th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>

    <?php while ($row = $stmt->fetch()) { ?>

    <tr>
        <td><?php echo $row['naam']; ?></td>
        <td><?php echo $row['taakomschrijving']; ?></td>
        <td><?php echo $row['deadline']; ?></td>
        <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Verwijderen</a></td>
    </tr>

    <?php } ?>
</table>