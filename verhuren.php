<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;


session_start();

if (!isset($_SESSION['klantid'])) {
    header("Location: inloggen.php");
    exit();
}

$klantid = $_SESSION['klantid'];


if (isset($_GET['autoid'])) {
    $autoid = $_GET['autoid'];
} else {
    header("Location: klantpanel.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveren</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<nav>
</nav>

<h2>Reserveren</h2>


<form method="post" action="reserveren.php">
    Begindatum: <input type="date" name="begindatum" required><br>
    Einddatum: <input type="date" name="einddatum" required><br>
    <input type="hidden" name="klantid" value="<?php echo $klantid; ?>">
    <input type="hidden" name="autoid" value="<?php echo $autoid; ?>">
    <input type="submit" value="Reserveer">
</form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $begindatum = $_POST["begindatum"];
    $einddatum = $_POST["einddatum"];
    $klantid = $_POST["klantid"];
    $autoid = $_POST["autoid"];

    $kosten = 0;
    $db->addVer($kosten, $autoid, $klantid, $begindatum, $einddatum);

    header("Location: klantpanel.php");
    exit();
}
?>
