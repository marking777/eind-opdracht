<?php
include 'db.php';
$db = new Database();
$usersW = $db->getAllcars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin2.css">
</head>
<body>

<nav>
    <img class="logo" src="istockphoto-1254555114-612x612.png" alt="">
    <a href="homepage.php">Home</a>
    <a href="register.php">Registreren</a>
    <a href="inloggen.php">Inloggen</a>
    <a href="AUTO.php">Autos</a>
</nav> 

<div class="container">
    <h2>Autos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Jaar</th>
            <th>Prijs</th>
            <th>Kenteken</th>
            <th>Beschikbaarheid</th>
            <th>Kleur</th>
            <th>Brandstof</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php foreach ($usersW as $user) : ?>
            <tr>
                <td><?php echo $user['autoid']; ?></td>
                <td><?php echo $user['merk']; ?></td>
                <td><?php echo $user['model']; ?></td>
                <td><?php echo $user['jaar']; ?></td>
                <td><?php echo $user['prijs']; ?></td>
                <td><?php echo $user['kenteken']; ?></td>
                <td><?php echo $user['beschikbaarheid']; ?></td>
                <td><?php echo $user['kleur']; ?></td>
                <td><?php echo $user['brandstof']; ?></td>
                <td><a class="edit" href="editAuto.php?id=<?php echo $user['autoid']; ?>">Bewerken</a></td>
                <td><a class="delete" href="deleteAuto.php?id=<?php echo $user['autoid']; ?>">Verwijderen</a></td>
            </tr>
        <?php endforeach; ?> 
    </table>
    <a class="add" href="addAuto.php">Auto Toevoegen</a>
</div>

</body>
</html>
