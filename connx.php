<?php
$user = "root";
$pass = "";
$host = "localhost";

// connextion de la BB "simplon"
try {
    $db = new PDO("mysql:host=$host;dbname=mybase", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>