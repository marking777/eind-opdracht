<?php
include 'db.php';

try {
   $db = new Database();
    $db->deleteAuto($_GET['id']);
    header("Location:admin3.php");
} catch (Exception $e) {
    echo "Error" . $e->getMessage();
  }

?>