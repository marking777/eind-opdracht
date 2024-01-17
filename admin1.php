<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;
$users = $db->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin1.css">
</head>
<body>

<nav>
    <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="AUTO.php">Autos</a>
</nav> 

<h2>Geregistreerde Gebruikers</h2>
    <table>
        <thead>
            <tr>
            <th>id</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Email</th>
                <th>wachtwoord</th>
                <th>bewerken</th>
                <th>Verwijderen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['naam']; ?></td>
                    <td><?php echo $user['adres']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['wachtwoord']; ?></td>
                    <td class="edit"><a href="edit.php?id=<?php echo $user['id']; ?>">bewerken</a></td>
                    <td class="delete"><a href="delete.php?id=<?php echo $user['id']; ?>">Verwijderen</a></td>
                </tr>
                
            <?php endforeach; ?>
            <tr>
                <td class="toevoegen" colspan="7"><a href="addklant.php">Klant Toevoegen</a></td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>