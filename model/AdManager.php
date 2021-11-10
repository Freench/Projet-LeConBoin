<?php

class AdManager extends Db{

    function insertAd(){
        $title = strip_tags($_GET['titleAd']);
        $price = strip_tags($_GET['priceAd']);
        $localisation = strip_tags($_GET['localisationAd']);
        $description = strip_tags($_GET['descriptionAd']);
        $category = strip_tags($_GET['categorie']);

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
    function moreResearch($specificites, $idAnnonce, $idCategorie){
        $condition = '';
        $value = [];
        foreach( $specificites as $specificite){
            if(!empty($specificite)){
                $condition.=' && '.$specificite['nom_data'].' LIKE ?';
                array_push($value, '%'.$specificite['num_ordre'].'%');
            }
        }
        $query = 'SELECT * FROM annonces JOIN donnesspecifiques ON annonces.id_categorie = donnesspecifiques.id_categorie';
        $pdo = $this->connect();
        $sql =$pdo ->prepare($query);
        $sql->bindValue(':annonces.id_categorie', $idAnnonce, PDO::PARAM_INT);
        $sql->bindValue(':donnesspecifiques.id_categorie', $idCategorie, PDO::PARAM_INT);
        $sql -> execute($value);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);     
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
}