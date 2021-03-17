<?php


// applé le fichier pour connecté la BDD
require './connx.php';


// Préparation de Requête mysql pour afficher des données
$res = $db->prepare('SELECT user, message FROM conversation');
//executer la requete préparé
$res->execute();
$results = $res->fetchAll(PDO::FETCH_ASSOC);
//récupération des résultats en json
$json = json_encode($results);

header('Content-Type: application/json');
echo json_encode($json);
//return $json;
?>