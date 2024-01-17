<?php
session_start();

require_once 'db.php';

$db = new Database();
$pdo = $db->pdo;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Home</title>
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
<nav>
    <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="AUTO.php">Autos</a>
</nav>  
<div class="body">
    <h2>Welkom bij Car Rentale</h2>
</div>


<p class="p">
Welkom op onze autoverhuurwebsite! <br>Ontdek een uitgebreide selectie prachtige auto's die klaarstaan om jouw reis onvergetelijk te maken. <br> Wacht niet langer en reserveer nu voor de ultieme rijervaring. Maak jouw keuze en beleef de luxe van de weg!
</p>


<div class="about-us">
    <p>Ontdek Amsterdam met onze betrouwbare autoverhuurdiensten. Geniet van een diverse vloot van voertuigen voor een zorgeloze reis door de stad.</p>
</div>

<footer>
    <div class="contact-info">
        <p>Telefoon: 0612345678</p>
        <p>Locatie: Amsterdam</p>
        <p>Email: elja@gmail.com</p>
    </div>
</footer>

</body>
</html>
