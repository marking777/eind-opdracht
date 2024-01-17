<?php
include 'db.php';
$db = new Database();
$pdo = $db->pdo;
$users1 = $db->getAlladmins();
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

<h2>Admins</h2>
    <table>
        <thead>
            <tr>
            <th>id</th>
                <th>Naam</th>
                <th>achternaam</th>
                <th>Email</th>
                <th>wachtwoord</th>
                <th>bewerken</th>
                <th>Verwijderen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users1 as $user2) : ?>
                <tr>
                    <td><?php echo $user2['id']; ?></td>
                    <td><?php echo $user2['naam']; ?></td>
                    <td><?php echo $user2['achternaam']; ?></td>
                    <td><?php echo $user2['email']; ?></td>
                    <td><?php echo $user2['wachtwoord']; ?></td>
                    <td class="edit"><a href="editAdmin.php?id=<?php echo $user2['id']; ?>">bewerken</a></td>
                    <td class="delete"><a href="deleteAdmin.php?id=<?php echo $user2['id']; ?>">Verwijderen</a></td>
                </tr>
                
            <?php endforeach; ?>
            <tr>
                <td class="toevoegen" colspan="7"><a href="addAdmin.php">Admin Toevoegen</a></td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>