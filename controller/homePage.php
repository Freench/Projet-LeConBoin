<?php
function homePage(){
    require('view/homePageView.php');
    if(isset($_GET['action'])){
        if( $_GET['action']== 'research'){
            // echo "On recherche";
            $adManager = new AdManager();
            $category = (isset( $_GET["categorie"])) ? $_GET["categorie"] : '';
            // $category = $_GET["categorie"];
            // $titleResearch = $_GET["title-research"];
            // $localisationResearch = $_GET["localisation-research"];
            // $specificityVal = $_GET["values"];
            // $specificityOrder = $_GET["orders"];
            $titleResearch = (isset( $_GET["title-research"])) ? $_GET["title-research"] : '';
            $localisationResearch = (isset( $_GET["localisation-research"])) ? $_GET["localisation-research"] : '';
            $specificityVal = (isset( $_GET["values"])) ? $_GET["values"] : [];
            $specificityOrder = (isset( $_GET["orders"])) ? $_GET["orders"] : [];
            $researchResults = $adManager->moreResearch($category, $titleResearch,  $localisationResearch, $specificityVal, $specificityOrder);
            foreach($researchResults as $result){
                $image = "";
                $title = $result["titre_annonce"];
                $price = $result["prix_annonce"];
                $localisation = $result["localisation_annonce"];
                $idOwnerAd = $result["id_utilisateur"];
                $idAd = $result["id_annonce"];

                $photoManager = new PhotoManager();
                $photos = $photoManager->getPhotoByIdAd($idAd);
                if(!empty($photos))
                $photo = $photos[0]['photo'];
                require('view/cardTemplate.php');
            }
        }
    }
}

function newAdPage(){
    include('view/newAdView.php');
}

function addAd(){
    $adManager = new AdManager();
    if (isset($_POST['titleAd']) && isset($_POST['priceAd'])  && isset($_POST['localisationAd']) &&
    isset($_POST['descriptionAd']) && isset($_POST['categorie'])){

        $newIdAd = $adManager->insertAd();

        if(isset($_FILES['fileToUpload'])){
            $photoManager = new PhotoManager();
            $photoManager->insertPhoto($photoManager->uploadPhoto(), $newIdAd);
        }
        $valuesSpecificities = $_POST["valuesSpecificities"];
        print_r($valuesSpecificities);
        foreach($valuesSpecificities as $key => $value){
            $adManager->insertAdDetails(intval($key+1), $value, $newIdAd);
        }
    }
}
<<<<<<< HEAD
=======

function imageUploadPage(){
    include('view/addImageView.php');
}
>>>>>>> al


function openAd(){
    $idAdOwner= $_GET["idOwnerAd"];
    $idAd = $_GET["idAd"];
    $adManager = new AdManager();
    $ad = $adManager->getAdByIdAd($idAd);
    $categoryManager = new CategoryManager();
    $specificitiesNames = $categoryManager->getSpecificitiesByCategory($ad['id_categorie']);
    $userManager = new UserManager();
    $adOwner = $userManager->getUserById($idAdOwner);
    $adDetails = $adManager->getAdDetails($idAd);

    $pseudo = $adOwner['pseudo_utilisateur'];
    $mail = $adOwner['mail_utilisateur'];
    $titre = $ad['titre_annonce'];
    $prix = $ad['prix_annonce'];
    $localisation = $ad['localisation_annonce'];
    $description = $ad['description_annonce'];
    
    $photoManager = new PhotoManager();
    $photos = $photoManager->getPhotoByIdAd($idAd);
    if(!empty($photos))
    $image = $photos[0]['photo'];

    include('view/adPageTemplate.php');
}
function openUserPage(){
 
    $idUser = $_GET['idOwner'];
    $userManager = new UserManager();
    $user = $userManager->getUserById($idUser);
    $email = $user['mail_utilisateur'];
    $userName = $user['pseudo_utilisateur'];

    require('view/userPageTemplate.php');
    $adManager = new AdManager();
    $adsOfUser = $adManager->getAdsByIdUser($idUser);
    foreach($adsOfUser as $result){
        $image = "";
        $title = $result["titre_annonce"];
        $price = $result["prix_annonce"];
        $localisation = $result["localisation_annonce"];
        $idOwnerAd = $result["id_utilisateur"];
        $idAd = $result["id_annonce"];

        $photoManager = new PhotoManager();
            $photos = $photoManager->getPhotoByIdAd($idAd);
            if(!empty($photos))
            $photo = $photos[0]['photo'];
        require('view/cardTemplate.php');
    }
}
function sendMessage(){
<<<<<<< HEAD
    if(isset($_GET['envoyer'])) {
        if(!empty($_GET['mail']) AND !empty($_GET['sujet']) AND !empty($_GET['message'])) {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:'.$_GET['mail']."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
        $message='
        <html>
            <body>
                <div align="center">

                    <u>Nom de l\'expéditeur :</u>'.$_GET['sujet'].'<br />
                    <u>Mail de l\'expéditeur :</u>'.$_GET['mail'].'<br />
                    <br />
                    '.nl2br($_GET['message']).'

                </div>
            </body>
        </html>
        ';
        mail($_GET['email'], $_GET['sujet'], $message, $header);
        $msg="Votre message a bien été envoyé !";
        echo $msg;
        header('Refresh: 5; URL=https://francisp.promo-93.codeur.online/le-bon-coin-v2/');
        } else {
        $msg="Tous les champs doivent être complétés !";
        }
=======
    if(isset($_GET['envoyer'])){
        $to = $_GET['email']; // this is your Email address
        $from = htmlspecialchars($_GET['mail']); // this is the sender's Email address
        $first_name = htmlspecialchars($_GET['first_name']);
        $subject =  htmlspecialchars($_GET['sujet']);
        $subject2 = "Copie de votre message " ;
        $message = $first_name . " " . " a ecrit le message suivant :" . "\n\n" . $_GET['message'];
        $message2 = "Voici une copie de votre message " . $first_name . "\n\n" . $_GET['message'];
        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
        echo "Votre mail est bien envoyé, merci " . $first_name . ", je vous recontacterais dans les plus bref délais.";
        header("Refresh:2.5; url=index.php");
        // You can also use header('Location: thank_you.php'); to redirect to another page.
>>>>>>> al
    }
}
function openNewCategoryPage(){
    include('view/newCategoryView.php');
}

function addNewCategory(){
    function verificationSpecificities(){
        $listSpecOrder = $_GET["order"];
        if(count($listSpecOrder) != count(array_unique($listSpecOrder))){
            throw new Exception('Les numéros d\'ordre doivent être différents');
        }

        $listSpecName = $_GET["values"];
        foreach($listSpecName as $key=>$value){
            $value = strip_tags($value);
        }
        var_dump($listSpecName);
        return [$listSpecName, $listSpecOrder];
    }

    $name_category = strip_tags($_GET["name-category"]);
    $categoryManager = new CategoryManager();
    // Vefication if category doesn't already exist   fsfgrgsergrgfserg
    echo $categoryManager->getCategoryByName($name_category);
    if(empty($categoryManager->getCategoryByName($name_category))){
        $lists = verificationSpecificities();
        $newIdCategorie = $categoryManager->insertCategory();
        $categoryManager->insertAllSpecificities($lists, $newIdCategorie);
    }else{
        throw new Exception('Cette catégorie existe déjà');
    }
}
