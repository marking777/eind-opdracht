<?php
include 'db.php';

try {
   $db = new Database();
    $db->deleteUser($_GET['id']);
    header("Location:admin1.php");
} catch (Exception $e) {
    echo "Error" . $e->getMessage();
  }

?>