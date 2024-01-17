<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Overzicht</title>
    <link rel="stylesheet" href="./css/AUTO1.css">
</head>

<body>

    <nav>
        <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
        <a href="homepage.php">Home</a>
        <a href="register.php">Registreren</a>
        <a href="inloggen.php">Inloggen</a>
        <a href="AUTO.php">Autos</a>
    </nav>

    <h2>Auto's overzicht</h2>

    <div class="row">
        <?php
        include 'db.php';
        $conn = new Database();
        $cars = $conn->getAllCars();
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

</body>

</html>
