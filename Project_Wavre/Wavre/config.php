<?php
//DB CONNEXION
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=wavre;charset=utf8', 'root', '');

    }catch(PDOexception $e)
    {
        die('Erreur'.$e->getMessage());
    }
?>