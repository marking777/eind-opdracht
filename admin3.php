<?php
include 'db.php';
$db = new Database();
$usersW = $db->getAllver();
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
            <th>kosten</th>
            <th>Klant ID</th>
            <th>Auto ID</th>
            <th>begindatum</th>
            <th>einddatum</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php foreach ($usersW as $user) : ?>
            <tr>
                <td><?php echo $user['verhuurid']; ?></td>
                <td><?php echo $user['kosten']; ?></td>
                <td><?php echo $user['klantid']; ?></td>
                <td><?php echo $user['autoid']; ?></td>
                <td><?php echo $user['begindatum']; ?></td>
                <td><?php echo $user['einddatum']; ?></td>
                <td><a class="edit" href="editVer.php?id=<?php echo $user['verhuurid']; ?>">Bewerken</a></td>
                <td><a class="delete" href="deleteVer.php?id=<?php echo $user['verhuurid']; ?>">Verwijderen</a></td>
            </tr>
        <?php endforeach; ?> 
    </table>
    <a class="add" href="addVer.php">Reservering Toevoegen</a>
</div>

</body>
</html>
