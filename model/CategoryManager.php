<?php

class CategoryManager extends Db{
    function insertCategory(){
        $nameCategory = $_GET['name-category'];
        $query = 'INSERT INTO categories (nom_categorie) VALUE (?)';
        $pdo = $this->connect();
        $sql = $pdo->prepare($query);
        $sql->execute([$nameCategory]);
        return  $pdo->lastInsertId();
    }
    function getCategoryByName($name_category){
        $query = 'SELECT * FROM categories WHERE nom_categorie = ?';
        $sql = $this->connect()->prepare($query);
        $sql->execute([$name_category]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertAllSpecificities($lists, $idCategory){
        $listSpecName = $lists[0];
        $listSpecOrder = $lists[1];
        for($i = 0; $i<count($listSpecName); $i++){
            $query = 'INSERT INTO donnesspecifiques (num_ordre, nom_data, id_categorie) VALUE (?,?,?)';
            $pdo = $this->connect();
            $sql = $pdo->prepare($query);
            $sql->execute([$listSpecOrder[$i], $listSpecName[$i], $idCategory]);
        }
    }


//     function selectSpecificiteesByCategorie($id){
//         $requete = 'SELECT * FROM donnesspecifiques WHERE id_categorie = ?';
//         $pdo = $this->connect();
//         $sql = $pdo->prepare($requete);
//         $sql-> execute([$id]);
//         $result = $sql -> fetchAll();
//         return $result;
//     }
}