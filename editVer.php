<?php
    include 'db.php';

    try {
        $db = new Database();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $db->updateVer($_POST['kosten'], $_POST['begindatum'], $_POST['einddatum'], $_GET['verhuurid']);
            echo "Form submitted!";
            header("Location: admin3.php");
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
        <title>Edit</title>
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


    <h2>Verhuring bewerken</h2>
        <input type="text" name="kosten" placeholder="Nieuwe prijs" required>
        <input type="text" name="begindatum" placeholder="Nieuwe begindatum" required>
        <input type="text" name="einddatum" placeholder="Nieuw einddatum" required>
        <input type="submit">
    </form>
    </body>

    </html>
