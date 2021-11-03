<?php
    class UserManager extends Db {

        public function getUserByPseudo(){
            $pseudo = strip_tags($_GET['pseudo']);
            $sql = 'SELECT * FROM utilisateurs WHERE pseudo_utilisateur = :pseudo';
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $user = $query->execute();
	        $user = $query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
        public function getUserByMail(){
            $mail = strip_tags($_GET['mail']);
            $sql = 'SELECT * FROM utilisateurs WHERE mail_utilisateur = :mail';
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            $query->bindValue(':mail', $mail, PDO::PARAM_STR);
            $user = $query->execute();
	        $user = $query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }

        public function insertUser($pwd){
            $mail = strip_tags($_GET['mail']);
            $pseudo = strip_tags($_GET['pseudo']);
            $sql =  "INSERT INTO utilisateurs (
                mail_utilisateur,
                pseudo_utilisateur,
                mdp_utilisateur) VALUE (?, ?, ?)";
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            $query -> execute([$mail,$pseudo,$pwd]);
        }

        public function getUserById($idUser){
            $sql = 'SELECT * FROM utilisateurs WHERE id_utilisateur = :user';
            $pdo = $this->connect();
            $query = $pdo->prepare($sql);
            $query->bindValue(':user', $idUser, PDO::PARAM_STR);
            $user = $query->execute();
	        $user = $query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
    }