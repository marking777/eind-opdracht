<?php
include 'db.php';

try {
    $db = new Database();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

        $db->updateUser($_POST['naam'], $_POST['adres'], $_POST['rijbewijsnummer'], $_POST['telefoonnummer'], $_POST['email'], $hash, $_GET['id']);

        header("Location: admin1.php");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="./css/edit.css">
</head>

<body>

<nav>
    <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="AUTO.php">Autos</a>
</nav> 


    <form method="POST">
        <h2>Klant bewerken</h2>
        <input type="text" name="naam" placeholder="Nieuwe naam">
        <input type="text" name="adres" placeholder="Nieuwe address">
        <input type="text" name="rijbewijsnummer" placeholder="Nieuwe rijbewijsnummer">
        <input type="text" name="telefoonnummer" placeholder="Nieuwe telefoonnummer">
        <input type="text" name="email" placeholder="Nieuwe email">
        <input type="password" name="wachtwoord" placeholder="Nieuwe password">
        <input type="submit">
    </form>
</body>

</html>
