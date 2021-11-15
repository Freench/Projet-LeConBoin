<?php

class PhotoManager extends Db{
    function getPhotoByIdAd($idAd){
        $sql = 'SELECT photo FROM photosannonces WHERE id_annonce = :id';
        $pdo = $this->connect();
        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $idAd, PDO::PARAM_STR);
        $photos = $query->execute();
        $photos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $photos;
    }
    function insertPhoto($photoName, $idAd){
        $query = 'INSERT INTO photosannonces (
            photo,
            id_annonce) VALUE (?,?)';
        $pdo = $this->connect();
        $sql = $pdo->prepare($query);
        $sql-> execute([$photoName, $idAd]);
        $result = $sql -> fetchAll();
        return $result;
    }

    function uploadPhoto($i){
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES['fileToUpload']["name"][$i]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $target_file = $target_dir . pathinfo($target_file,PATHINFO_FILENAME) . uniqid('', false) .'.'. $imageFileType;
      echo $imageFileType;
      echo $target_file;
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES['fileToUpload']["tmp_name"][$i]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"][$i] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " has been uploaded.";
          return $target_file;
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }
}