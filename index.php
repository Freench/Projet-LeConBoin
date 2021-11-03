<!-- Ceci est un rooter -->

<?php
session_start();

// Requirement :
require_once('model/Db.php');
require_once('model/AdManager.php');
require_once('model/UserManager.php');
require_once('model/CategoryManager.php');
require('controller/userController.php');
require('controller/homePage.php');
try{
    if(isset($_GET['action'])){
        // echo "On fait une action";

        if($_GET['action'] == 'login'){
            // echo "On se log";
            if (isset($_GET['mail']) && isset($_GET['pseudo']) && isset($_GET['passwd'])){
                login();
                // echo "On est loggué";
                header('location: index.php');
            }else{
                throw new Exception('Veuillez remplir les identifiants');
            }

        }elseif($_GET['action'] == 'openSignIn'){
            pageSignIn();
            // header 'location: index.php';

        }elseif($_GET['action'] == 'signIn'){
            // echo "On se signIn";

            if (isset($_GET['mail']) && isset($_GET['pseudo']) && isset($_GET['passwd'])){
                signIn();
                // echo "On est sign in";
                header('location: index.php');
            }else{
                throw new Exception('Veuillez remplir les identifiants');
            }

        }elseif($_GET['action'] == 'logout'){
            // echo "on se logout";
            logout();

        }elseif($_GET['action'] == 'research'){
            homePage();

        }elseif($_GET['action'] == 'openNewAd'){
            newAdPage();

        }elseif($_GET['action'] == 'addAd'){
            // echo "on ajoute une ad";
            addAd();
            header('location: index.php?action=openUploadImage');

        }elseif($_GET['action'] == 'openUploadImage'){
            // echo "on va sur la page ajouter une image";
            imageUploadPage();
            header('location: index.php');

        }elseif($_GET['action'] == 'openAd'){
            // echo "on visite une ad";
            openAd();

        }elseif($_GET['action'] == 'openNewCatergory'){
            // echo "on ouvre la page new category";
            openNewCategoryPage();

        }elseif($_GET['action'] == 'addNewCategory'){
            // echo "on ajoute une category";
            addNewCategory();
            header('location: index.php');

        }elseif($_GET['action'] == 'openUserPage'){
            // echo "on va sur la page utilisateur de l'annonce";
            openUserPage();

        }

    }elseif (!isset($_SESSION['connected'])){
        pageLogin();
        // echo "On charge la page login";

    }else{
        homePage();
        // echo "On affiche home page ";
    }

}
catch(Exception $e){
    echo 'Erreur : ' . $e->getMessage();
}

