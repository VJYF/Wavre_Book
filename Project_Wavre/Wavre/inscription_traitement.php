<?php
    require_once 'confing.php';

    if(!empty($_POST['Prenom'])&& !empty($_POST['Nom'])&& !empty($_POST['email'])&& !empty($_POST['password'])&& !empty($_POST['cpassword']))
    //Declare
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = htmlspecialchars($_POST['Prenom']);
    $email = htmlspecialchars($_POST['Email']);
    $password = htmlspecialchars($_POST['password']);
    $cpassword = htmlspecialchars($_POST['cpassword']);
    //check DB
    $check = $bdd->prepare('SELECT nom, prenom, email, password FROM utilisateurs WHERE email = ?');
    $check->execute(array($email))
    $data = $check->fetch();
    $row = $check->rowcount();

    if($row == 0)
    {
        //MAX 100char
        if(strlen($pseudo) <= 100){
            //MAX 100char
            if(strlen($email) <= 100){
                //Email check of validity
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    //Verify password
                    if($password == $cpassword){
                        //HASH
                        $cost = ['cost' => 12];
                        $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                        //determine IP
                        $ip = $_SERVER['REMOTE_ADDR'];

                        //Insert the new user
                        $insert = $bdd ->prepare('INSERT INTO utilisateurs(nom, prenom, email, password, ip) VALUES(:nom, :prenom, :email, :password, :ip')
                        $insert->execute(array(
                            'nom'=>$nom,
                            'prenom'=>$prenom,
                            'email'=>$email,
                            'password'=>$password,
                            'ip'=>$ip,
                        ));
                        header('Location:login_signin.php?reg_err=success');
                        die();
                    }else{ header('Location: login_signin.php?reg_err=password2'); die();}
                }else{ header('Location: login_signin.php?reg_err=email2'); die();}
            }else{ header('Location: login_signin.php?reg_err=email_length'); die();}
        }else{ header('Location: login_signin.php?reg_err=pseudo_length'); die();}
    }else{ header('Location: login_signin.php?reg_err=already2'); die();}
}
                

    