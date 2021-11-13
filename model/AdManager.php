<?php

class AdManager extends Db{

    function insertAd(){
        $title = strip_tags($_POST['titleAd']);
        $price = strip_tags($_POST['priceAd']);
        $localisation = strip_tags($_POST['localisationAd']);
        $description = strip_tags($_POST['descriptionAd']);
        $category = strip_tags($_POST['categorie']);

        $requete =  'INSERT INTO annonces (
            titre_annonce,
            prix_annonce,
            localisation_annonce,
            description_annonce,
            id_categorie,
            id_utilisateur) VALUE (?,?,?,?,?,?)';
        $pdo = $this->connect();
        $sql = $pdo ->prepare($requete);
        $sql -> execute([$title, $price, $localisation, $description, $category, $_SESSION['idUser']]);
        return $pdo->lastInsertId();
    }

    function getAdByIdAd($idAd){
        $query = 'SELECT * FROM annonces WHERE id_annonce = ?';
        $pdo = $this->connect();
        $sql = $pdo->prepare($query);
        $sql-> execute([$idAd]);
        $result = $sql -> fetch();
        return $result;
    }

    function getAdsByIdUser($idUser){
        $query = 'SELECT * FROM annonces WHERE id_utilisateur = ?';
        $pdo = $this->connect();
        $sql = $pdo->prepare($query);
        $sql-> execute([$idUser]);
        $result = $sql -> fetchAll();
        return $result;
    }

    function deleteAnnonces($idAd){
        $query =  'DELETE FROM annonces WHERE id_annonce = ? ';//VALEURDANSLEBOUTTON
        $pdo = $this->connect();
        $sql =$pdo ->prepare($query);
        $sql -> execute([$idAd]);
        return true;
}

    // fonction permettant de rechercher les annonces 
    function research($category, $title, $localisation){
        $condition = '';
        $value=[];
        if(!empty($category)){
            $condition.= ' && id_categorie = ?';
            array_push($value, $category);
        }
        if(!empty($title)){
            $condition.=' && titre_annonce LIKE ?';
            array_push($value, '%'.$title.'%');
        }
        if(!empty($localisation)){
            $condition.=' && localisation_annonce LIKE ?';
            array_push($value, '%'.$localisation.'%');
        }
        $query =  'SELECT * FROM annonces WHERE 1=1 '.$condition.' ';
        $pdo = $this->connect();
        $sql =$pdo ->prepare($query);
        $sql -> execute($value);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    //function qui permet la recherche avancée
    function moreResearch($category, $title, $localisation, $specificityVal, $specificityOrder){
        $condition = '';
        $conditionSpec = '';
        $value=[];

        if(!empty($category)){
            $condition.= ' && id_categorie = ?';
            array_push($value, $category);
        }
        if(!empty($title)){
            $condition.=' && titre_annonce LIKE ?';
            array_push($value, '%'.$title.'%');
        }
        if(!empty($localisation)){
            $condition.=' && localisation_annonce LIKE ?';
            array_push($value, '%'.$localisation.'%');
        }

        for($i = 0; $i<count($specificityVal) ; $i++){
            if(!empty($specificityVal[$i]) && !empty($specificityOrder[$i])){
                $conditionSpec.=' && (num_ordre = ?';
                array_push($value, $specificityOrder[$i]);
                $conditionSpec.=' && valeur_ordre LIKE ?)';
                array_push($value, '%'.$specificityVal[$i].'%');
                
            }
        }
        $query = 'SELECT DISTINCT id_annonce from (select * from annoncesdetails where id_annonce IN (select id_annonce from annonces where 1=1 '.$condition.')) AS detail WHERE 1=1 '.$conditionSpec;
        print_r($value);
        echo $query;
        $pdo = $this->connect();
        $sql =$pdo ->prepare($query);
        $sql -> execute($value);
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        $result = [];

        foreach($results as $idAd){
            array_push($result, $this ->getAdByIdAd($idAd['id_annonce']));
        }
        echo "<pre>";
        print_r($result) ;
        echo "</pre>";
        return $result;
    }


    
    function insertAdDetails($numOrder, $value, $idAd){
        $query =  'INSERT INTO annoncesdetails (
            num_ordre,
            valeur_ordre,
            id_annonce) VALUE (?,?,?)';
        $pdo = $this->connect();
        $sql =$pdo ->prepare($query);
        $sql -> execute([$numOrder, $value, $idAd]);
        return $pdo->lastInsertId();
    }

    function getAdDetails($idAd){
        $query = 'SELECT * FROM annoncesdetails WHERE id_annonce = ?';
        $pdo = $this->connect();
        $sql = $pdo->prepare($query);
        $sql-> execute([$idAd]);
        $result = $sql -> fetchAll();
        return $result;
    }

    function getSpecificity($idAnnonce){
        $query = 'SELECT nom_data FROM donnesspecifiques WHERE id_annonce = ?';
        $pdo = $this->connect();
        $sql = $pdo->prepare($query);
        $sql-> execute([$idAnnonce]);
        $result = $sql -> fetchAll();
        return $result;
    }
}
