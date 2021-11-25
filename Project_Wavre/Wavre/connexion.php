<?php
    session_start();
    require_once 'config.php';
    if(!empty($_POST['email'])&& !empty($_POST['password']))
    {
        //declare
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $email = strtolower($email);

        //check DB
        $check = $bdd->prepare('SELECT nom, prenom, email, password FROM utilisateurs WHERE email = ?');
        $check->Execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        //si pas de résultat
        if($row > 0){
            //Email check of validity
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                //Password check of validity
                if(password_verify($password, $data['password'])){
                    //user ip data
                    $_SESSION['user'] = $data['ip'];
                    header('Location:landing.php');
                }else header('Location:login_signin.php?Login_err=password');
            }else header('Location:login_signin.php?Login_err=email');
        }else header('Location:login_signin.php?Login_err=already');
    }else header('Location:login_signin.php');
?>


  