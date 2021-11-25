<?php
    session_start();
    require_once 'config.php';

    //redirection if session doesnt exist or not connected yet
    if(!isset($_SESSION['User'])){
        Header('location:LandS.php')
        die();
    }

    //User's data 
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE ip = ?');
    $req ->execute(array($_SESSION['user']));
    $data = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue <?php GET($prenom + $nom) ?></h1>
    <button>Se connecter</button>
</body>
</html>