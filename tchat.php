<?php
die('ok');
$user = "simplon";
$pass = "simplon";
$host = "localhost";

// connextion de la BB "simplon"
try {
    $db = new PDO("mysql:host=$host;dbname=mybase", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
// Préparation de Requête mysql pour insérer des données
$res = $dbh->prepare("INSERT INTO conversation VALUES (:user,:message)");

if(isset($_POST['Name'])){
// récupérer les valeurs 
    $insrt = $_POST['Name'];}
//on lie chaque marqueur a une valeur
    $res->bindValue(':user',$insrt,PDO::PARAM_STR);
    $res->bindValue(':message',$insrt,PDO::PARAM_STR);
//executer la requete préparé
    $res->execute();
?>