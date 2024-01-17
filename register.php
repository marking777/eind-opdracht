<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $rijbewijsnummer = $_POST["rijbewijsnummer"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

    $db->registreren($naam, $adres, $rijbewijsnummer, $telefoonnummer, $email, $wachtwoord);

    header("Location: inloggen.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registratie</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>

<nav>
    <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="AUTO.php">Autos</a>
</nav> 
<br>

<h2>Registratie</h2>
<form method="post">
    Naam: <input type="text" name="naam"placeholder="Naam" required><br>
    Adres: <input type="text" name="adres"placeholder="Adres" required><br>
    Rijbewijsnummer: <input type="text" name="rijbewijsnummer"placeholder="Rijbewijsnummer" required><br>
    Telefoonnummer: <input type="text" name="telefoonnummer"placeholder="Telefoonnummer" required><br>
    Email: <input type="email" name="email"placeholder="Email" required><br>
    Wachtwoord: <input type="password" name="wachtwoord"placeholder="Wachtwoord" required><br>
    <input type="submit" value="Registreer">
</form>

</body>
</html>
