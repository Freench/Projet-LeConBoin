<?php
require_once('../model/Db.php');
$id_categorie = $_POST['params'];
$requete = 'SELECT * FROM donnesspecifiques WHERE id_categorie = '.$id_categorie;

$db = new Db();
$db = $db->connect();
$sth = $db->prepare($requete);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>