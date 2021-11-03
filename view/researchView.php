<form method="GET" action=index.php>
    <div class="col section-recherche">
        <legend>Rechercher une annonce </legend>
        <div class = "row justify-content-center">
            <div class="col-3">
                <label for="categorie" class="form-label">Catégorie :</label>
                <div id="categorie"></div>
            </div>
            <div class="col-3">
                <label for="text-recherche" class="form-label">Que recherchez-vous ?</label>
                <input type="text" class="form-control" id="text-recherche" placeholder="Que recherchez-vous ?" name="title-research">
            </div>
            <div class="col-3">
                <label for="localisation-recherche" class="form-label">Où cherchez-vous ?</label>
                <input type="text" class="form-control" id="localisation-recherche" placeholder="Saisissez une ville" name="localisation-research">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="action" value="research">Rechercher</button>
    </div>
</form>