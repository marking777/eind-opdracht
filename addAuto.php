<?php
include 'db.php';

$db = new Database();
$pdo = $db->pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $merk = $_POST["merk"];
    $model = $_POST["model"];
    $jaar = $_POST["jaar"];
    $prijs = $_POST["prijs"];
    $kenteken = $_POST["kenteken"];
    $beschikbaarheid = $_POST["beschikbaarheid"];
    $kleur = $_POST["kleur"];
    $brandstof = $_POST["brandstof"];

    if (isset($_FILES["file"])) {
        $uploadDirectory = "./fotos/"; 
        $uploadFile = $uploadDirectory . basename($_FILES["file"]["name"]);

        if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
                $db->addCar($merk, $model, $jaar, $prijs, $kenteken, $beschikbaarheid, $kleur, $brandstof, $uploadFile);

                header("Location: admin2.php");
                exit();
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Error uploading file. Error code: " . $_FILES["file"]["error"];
        }
    } else {
        echo "No file uploaded.";
    }
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
    <img class="logo" src="istockphoto-1254555114-612x612.jpg" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="#autos">Autos</a>
    <a href="admin1.php">admin</a>
</nav> 
<br>

<h2>Auto Toevoegen</h2>
<form method="post" enctype="multipart/form-data">
    Merk: <input type="text" name="merk" placeholder="Merk" required><br>
    Model: <input type="text" name="model" placeholder="Model" required><br>
    Jaar: <input type="text" name="jaar" placeholder="Jaar" required><br>
    Prijs: <input type="text" name="prijs" placeholder="Prijs" required><br>
    Kenteken: <input type="text" name="kenteken" placeholder="Kenteken" required><br>
    Beschikbaarheid: <input type="text" name="beschikbaarheid" placeholder="Beschikbaarheid" required><br>
    Kleur: <input type="text" name="kleur" placeholder="Kleur" required><br>
    Brandstof: <input type="text" name="brandstof" placeholder="Brandstof" required><br>
    <label for="foto">foto:</label>
    <input type="file" name="file" id="file" accept="image/*" required>
    <input type="submit" value="Toevoegen">
</form>

</body>
</html>
