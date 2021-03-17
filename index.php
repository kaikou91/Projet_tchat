<?php
// applé le fichier pour connecté la BDD
require './connx.php';

// Préparation de Requête mysql pour insérer des données
$res = $db->prepare("INSERT INTO conversation VALUES (NULL,:user,:message)");
// die ('ok');
if(isset($_POST['Name'])){
    
    //Récupérer les valeurs 
    $insrt = $_POST['Name'];
    $insrtMsg = $_POST['Message'];
    //On lie chaque marqueur a une valeur
    $res->bindValue(':user',$insrt,PDO::PARAM_STR);
    $res->bindValue(':message',$insrtMsg,PDO::PARAM_STR);
    //executer la requete préparé
    $res->execute();
    //Vider le tableau POST pour éviter de recharger les anciens messages
    $_POST = array();
}

// Préparation de Requête mysql pour afficher des données
$res = $db->prepare('SELECT user, message FROM conversation');
//executer la requete préparé
$res->execute();
//récupération des résultats
$lesMots = $res->fetchAll();

// function getMessages() {
//     // Préparation de Requête mysql pour afficher des données
//     $res = $db->prepare('SELECT user, message FROM conversation');
//     //executer la requete préparé
//     $res->execute();
//     //récupération des résultats
//     $lesMots = $res->fetchAll();
//     return $lesMots
// }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>DTchat</title>
</head>
<body>
    <main class='flex'>
        <div class="message flex" id="messageArea">
            <?php             
                //var_dump($lesMots[0]["user"]);
                foreach($lesMots as $i=>$value) {
                    echo $lesMots[$i]["user"] . ' : ' . $lesMots[$i]["message"] . '<br >';
                }
            ?>
        </div>
        <form action='#' method='POST' class="form-inline">
            <label class="sr-only" for="inlineFormInputName2">Name</label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="Name" id="inlineFormInputName2" placeholder="Votre nom">

            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="Message" placeholder="ecrivez votre message">
            </div>

            <button type="submit" id="btnEnvoyer" class="btn btn-primary mb-2">envoyer</button>
        </form>

    </main>
</body>
<script src="function.js"></script>
</html>