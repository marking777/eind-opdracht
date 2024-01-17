<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;

session_start();



$klantid = $_SESSION['klantid'];

$klantData = $db->getuser($klantid);

$klantNaam = isset($klantData['naam']) ? $klantData['naam'] : "Gebruiker";

$autoLijst = $db->getAllcars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Panel</title>
    <link rel="stylesheet" href="./css/AUTO1.css">
</head>
<body>

<nav>
</nav>

<h2>Welkom <?php echo $klantNaam; ?>!</h2>

<h3>Beschikbare Auto's</h3>

<div class="row">
    <?php
    $cars = $autoLijst;
    $carCount = 0;
    foreach ($cars as $autos) {
        ?>
        <div class="autos">
            <h2>Merk: <?php echo $autos['merk']; ?></h2>
            <p>Model: <?php echo $autos['model']; ?></p>
            <p>Jaar: <?php echo $autos['jaar']; ?></p>
            <p>Prijs: <?php echo $autos['prijs']; ?></p>
            <p>Kleur: <?php echo $autos['kleur']; ?></p>
            <p>Brandstof: € <?php echo $autos['brandstof']; ?></p>
            <p>Kenteken: <?php echo $autos['kenteken']; ?></p>
            <img src="<?= $autos['file'] ?>" /><br>
            <a href="verhuren.php?autoid=<?php echo $autos['id']; ?>" class="button">Auto verhuren</a>
            <br>
        </div>
    <?php
        $carCount++;
        if ($carCount % 3 === 0) {
            echo '</div><div class="row">';
        }
    }
    ?>
</div>

<a href="uitloggen.php">Uitloggen</a>
</body>
</html>
