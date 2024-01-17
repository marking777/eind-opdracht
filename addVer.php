<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   require_once("db.php");

    $kosten = $_POST["kosten"];
    $klantid = $_POST["klantid"];
    $autoid = $_POST["autoid"];
    $begindatum = $_POST["begindatum"];
    $einddatum = $_POST["einddatum"];

    $db = new Database();

    $result = $db->addVer($kosten, $autoid, $klantid, $begindatum, $einddatum);

    if ($result === true) {
        echo "Reservation successfully added!";
    } else {
        echo "Error adding reservation: " . $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
</head>
<body>
    <h2>Reservation Form</h2>

    <?php
    require_once("db.php");

    $klantid = isset($_POST['klantid']) ? $_POST['klantid'] : null;
    $autoid = isset($_POST['autoid']) ? $_POST['autoid'] : null;

    $db = new Database();
    $carDetails = $db->getAllcars($autoid);
    ?>

    <form action="process_reservation.php" method="post">
        <label for="kosten">Kosten:</label>
        <input type="text" name="kosten" required>

        <input type="hidden" name="klantid" value="<?php echo $klantid; ?>">
        <input type="hidden" name="autoid" value="<?php echo $autoid; ?>">

        <label for="begindatum">Begindatum:</label>
        <input type="date" name="begindatum" required>

        <label for="einddatum">Einddatum:</label>
        <input type="date" name="einddatum" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
