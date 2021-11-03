<?php

require_once('model/UserManager.php');


/* Function login : Permit to users to login, verify if pseudo and password are true and so add session variables idUser and nameUser*/
function login(){
    $userManager = new UserManager;
    $user = $userManager->getUserByPseudo();
    if(!empty($user)){
        $pwUser = $user['mdp_utilisateur'];
        $idUser = $user['id_utilisateur'];
        if (password_verify($_GET['passwd'], $pwUser)) {
            //Connexion réussie : nous créons notre variable de session et faisons la redirection.
            echo "userController : connected";
            $_SESSION['connected'] = true;
            $_SESSION['nameUser'] = $user['pseudo_utilisateur'];
            $_SESSION['idUser'] = $idUser;
        } else {
            throw new Exception('Le mot de passe est invalide.');
        }
    }else{
        throw new Exception('Désolé cet utilisateur n\'existe pas !');
}}

function logout(){
    session_destroy();
    header('location: index.php');
}
/* Function login : Permit to users to creat account, verify if mail and pseudo doesn't already exist in db and if password is correct.
And so add the user in db.*/
function signIn(){
    function verifyPassWord($passwd){
        $listeSpecialChar = ['!','#','$','%','&','(',')','*','+','-','.',':','=','?','@','[',']','^','{','|','}','~'];
        $listeMinuscule = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $listeMajuscule = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $listeChiffre = ['0','1','2','3','4','5','6','7','8','9'];

        $asSpecial = false; 
        for($i=0; $i< count($listeSpecialChar)  ;$i++){
            if(strpos($passwd, $listeSpecialChar[$i], 0)){
                $asSpecial = true;
            }
        }
        if(!$asSpecial){
            throw new Exception('Le mot de passe doit contenir au moins un caractère spécial.');
            return false;
        }

        $minuscule = false;
        $majuscule = false;
        for($i=0; $i < count($listeMinuscule);$i++){
            if(!strpos($passwd, $listeMinuscule[$i], 0)){
                $minuscule = true;
            }
            if(!strpos($passwd, $listeMajuscule[$i], 0)){
                $majuscule = true;
            }
        }
        if(!$minuscule){
            throw new Exception('Le mot de passe doit contenir au moins un caractère minuscule.');
            return false;
        }
        if(!$majuscule){
            throw new Exception('Le mot de passe doit contenir au moins un caractère majuscule.');
            return false;
        }

        $asChiffre = false; 
        for($i=0; $i< count($listeChiffre);$i++){
            if(strpos($passwd, $listeChiffre[$i], 0)){
                $asChiffre = true;
            }
        }
        if(!$asChiffre){
            throw new Exception('Le mot de passe doit contenir au moins un chiffre.');
            return false;
        }

        $longeur = strlen($passwd);
        if(!($longeur >= 8 && $longeur <= 50)){
            throw new Exception('Le mot de passe doit comprendre : entre 8 et 50 caractères');
            return false;
        }

        return true;
    }
    $userManager = new UserManager;
    if(empty($userManager->getUserByMail())){
        if(empty($userManager->getUserByPseudo())){
            if(verifyPassWord($_GET['passwd'])){
                $userManager->insertUser(password_hash($_GET['passwd'], PASSWORD_DEFAULT));
            }
        }else{
            throw new Exception('Ce pseudo est déjà utilisée');
        }
    }else{
        throw new Exception('Cette adresse mail est déjà utilisée');
    }

    
}

function pageLogin(){
    require('view/loginView.php');
}

function pageSignIn(){
    require('view/signInView.php');
}

