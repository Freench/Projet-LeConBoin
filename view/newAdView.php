<?php $title = 'Ajouter une annonce'; ?>
<?php ob_start(); ?>

<div class="container">
    <div class="boxRecherche">
        <form action="" method="POST" enctype="multipart/form-data" class="d-flex boxForm">
                <input type="text"  name="titleAd" placeholder="Titre de l'annonce" required>
                <input type="number"  name="priceAd" placeholder="Prix de l'article" required>
                <input type="file" multiple name="fileToUpload[]" id="fileToUpload" accept=".png,.pdf,.jpg" placeholder="Photo de l'annonce" size=50>
                <input type="text" name="localisationAd" placeholder="Localisation" required>
                <input type="text" name="descriptionAd" placeholder="Description" required>
                <div id="categorieBox">
                    <div id="categorie"></div>  
                </div>
                <div id="specificites-section"></div>
                <!-- <input type="number" name="categorieAnnonce" placeholder="Categorie" required> -->
                <!-- <input type="submit" name="submit" value="OK"> -->
                <div id="btEnvoie">
                    <button class="btn btn-primary" type="submit" name="actionPost" value="addAd">OK</button>
                </div>
        </form>
    </div>
</div>
<script type="module" src="public/js/script.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

