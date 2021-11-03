<?php
require_once('../model/Db.php');
$query = 'SELECT * FROM categories WHERE 1=1';
$db = new Db();
$db = $db->connect();
$sth = $db->prepare($query);
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>