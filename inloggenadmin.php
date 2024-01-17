<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;

$loginError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

    if ($db->inloggen($email, $wachtwoord)) {
        header("Location:ADMIN.php");
        exit();
    } else {
        $loginError = "Inlog gegevens kloppen niet"; 
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="./css/inloggen1.css"> 
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
<?php echo $loginError; ?> <br>
        Email: <input type="email" name="email" placeholder="Email" required><br>
        Wachtwoord: <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>
        <a class="admin" href="inloggen.php">Inloggen als klant?</a>
        <input type="submit" value="Login">
      
    </form>
</body>
</html>