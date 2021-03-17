<?php
$user= "root";
$pass= "";
$host = "localhost";

//ouverture d'une connexion a la bdd simplon
$dbh = new PDO('mysql:host=$host;dbname=mybase', $user, $pass);

// Préparation de Requête mysql pour afficher des données
$res = $dbh->prepare('SELECT * FROM conversation');

//executer la requete préparé
$res->execute();

//récupération des résultats
$lesMots = $res->fetchAll();

foreach ($lesMots as $mot);
?>