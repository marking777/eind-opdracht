    <?php
    include 'db.php';

    try {
        $db = new Database();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $db->updateAuto($_POST['merk'], $_POST['model'], $_POST['jaar'], $_POST['prijs'], $_POST['kenteken'], $_POST['beschikbaarheid'], $_POST['kleur'], $_POST['brandstof'], $_FILES['file'], $_GET['id']);
            echo "Form submitted!";
            header("Location: admin2.php");
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

    <form method="post">
    <h2>Auto bewerken</h2>
        <input type="text" name="merk" placeholder="Nieuw merk" required>
        <input type="text" name="model" placeholder="Nieuw model" required>
        <input type="text" name="jaar" placeholder="Nieuw jaar" required>
        <input type="text" name="prijs" placeholder="Nieuw prijs" required>
        <input type="text" name="kenteken" placeholder="Nieuw kenteken" required>
        <input type="text" name="beschikbaarheid" placeholder="Nieuwe beschikbaarheid" required>
        <input type="text" name="kleur" placeholder="Nieuwe kleur" required>
        <input type="text" name="brandstof" placeholder="Nieuwe brandstof" required> 
        <input type="submit">
    </form>
    </body>

    </html>
