<?php
include 'db.php';

try {
   $db = new Database();
    $db->deleteadmin($_GET['id']);
    header("Location:adminadmin.php");
} catch (Exception $e) {
    echo "Error" . $e->getMessage();
  }

?>