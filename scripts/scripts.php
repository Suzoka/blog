<?php
include("scripts/connect-database.php");

function getAllBillets() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM billets");
    $stmt->execute();
    return $stmt;
}

?>