<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/ADMINw.css">
</head>
<body> 
<?php
session_start();

if (isset($_SESSION['id'])) {
    echo "Ingelogd als: " . $_SESSION['id'];
    echo "<br><a href=uitloggenadmin.php>Uitloggen</a>";
}
?>

<nav>
    <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="AUTO.php">Autos</a>
</nav> 

<h1>Welkom Medewerker</h1>
<h3>U kunt hier alle informatie bekijken over auto's, klanten, medewerkers en verhuringen!!</h3>
<div class="links">
<a href="admin1.php">Klant bekijken</a>
<a href="admin2.php">Auto bekijken</a>
<a href="admin3.php">verhuringen bekijken</a>
<a href="adminadmin.php">Medewerkers bekijken</a>
</div>
<button><a class="uit" href="inloggen.php">Uitloggen</a></button>
</body>
</html>