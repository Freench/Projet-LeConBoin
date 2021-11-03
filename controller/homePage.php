<?php
function homePage(){
    require('view/homePageView.php');
    if(isset($_GET['action'])){
        if( $_GET['action']== 'research'){
            echo "On recherche";
            $adManager = new AdManager();
            $category = $_GET["categorie"];
            $titleResearch = $_GET["title-research"];
            $localisationResearch = $_GET["localisation-research"];
            $researchResults = $adManager->research($category, $titleResearch, $localisationResearch);
            foreach($researchResults as $result){
                $image = "";
                $title = $result["titre_annonce"];
                $price = $result["prix_annonce"];
                $localisation = $result["localisation_annonce"];
                $idOwnerAd = $result["id_utilisateur"];
                $idAd = $result["id_annonce"];
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
    if (isset($_GET['titleAd']) && isset($_GET['priceAd']) && isset($_GET['photoAd']) && 
    isset($_GET['localisationAd']) && isset($_GET['descriptionAd']) && isset($_GET['categorie'])){

        $newIdAd = $adManager->insertAd();

        $valuesSpecificities = $_GET["valuesSpecificities"];
        print_r($valuesSpecificities);
        foreach($valuesSpecificities as $key => $value){
            $adManager->insertAdDetails(intval($key+1), $value, $newIdAd);
        }
    }
}
function imageUploadPage(){
    include('view/addImageView.php');
}


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


    include('view/adPageTemplate.php');
}
function openUserPage(){
    $idUser = $_GET['idOwner'];
    $adManager = new AdManager();
    $adsOfUser = $adManager->getAdsByIdUser("blablabla"); //ffffffffffffffffffffffffffffffff
    foreach($adsOfUser as $result){
        $image = "";
        $title = $result["titre_annonce"];
        $price = $result["prix_annonce"];
        $localisation = $result["localisation_annonce"];
        $idOwnerAd = $result["id_utilisateur"];
        $idAd = $result["id_annonce"];
        require('view/cardTemplate.php');
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