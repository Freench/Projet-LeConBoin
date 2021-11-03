<form action="index.php" method="GET" enctype="multipart/form-data">
        <input type="text"  name="titleAd" placeholder="Titre de l'annonce" required>
        <input type="number"  name="priceAd" placeholder="Prix de l'article" required>
        <input type="file" name="photoAd" accept=".png,.pdf,.jpg" placeholder="Photo de l'annonce" size=50 required>
        <input type="text" name="localisationAd" placeholder="Localisation" required>
        <input type="text" name="descriptionAd" placeholder="Description" required>
        <div id="categorie"></div>
        <div id="specificites-section"></div>
        <!-- <input type="number" name="categorieAnnonce" placeholder="Categorie" required> -->
        <input type="submit" name="action" value="addAd">
</form>

<script type="module" src="public/js/script.js"></script>
