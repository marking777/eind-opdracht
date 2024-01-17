<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

    $db->addAdmin($naam, $achternaam, $email, $wachtwoord);

    header("Location: adminadmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klant toevoegen</title>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>

<nav>
    <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="#autos">Autos</a>
    <a href="admin1.php">admin</a>
</nav> 
<br>

<h2>Klant Toevoegen</h2>
<form method="post">
    Naam: <input type="text" name="naam" placeholder="Naam" required><br>
    achternaam: <input type="text" name="achternaam" placeholder="Achternaam" required><br>
    Email: <input type="email" name="email" placeholder="Email" required><br>
    Wachtwoord: <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>
    <input type="submit" value="Toevoegen">
</form>

</body>
</html>