<?php

include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$select = $conn->query("SELECT * FROM taak WHERE id=$id");

if (isset($_POST['submit'])) {
    
    $naam = $_POST['naam'];
    $taakomschrijving = $_POST['taakomschrijving'];
    $deadline = $_POST['deadline'];

    $sql = "UPDATE taak SET naam = '".$naam."',
                            taakomschrijving = '".$taakomschrijving."',
                            deadline = '".$deadline."'
                        WHERE id=$id";

    // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();
}

?>

<?php while ($row = $select->fetch()) { ?>

<form method="post">
    <input type="text" name="naam" value="<?php echo $row['naam']; ?>"><br>
    <input type="text" name="taakomschrijving" value="<?php echo $row['taakomschrijving']; ?>"><br>
    <input type="date" name="deadline" value="<?php echo $row['deadline']; ?>"><br>
    <input type="submit" name="submit" value="Updaten"><br>
</form>

<?php } ?>