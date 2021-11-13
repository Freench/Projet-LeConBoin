<form method="GET" action="index.php">
    <div id="blockResearch" class="col section-recherche">
        <legend id="legend" class="d-flex">Rechercher une annonce </legend>
        <div class="row justify-content-center">
            <div class="inputRecherche">
                <label for="categorie" class="form-label">Catégorie :</label>
                <div id="categorie"></div>
            </div>
            <div class="inputRecherche">
                <label for="text-recherche" class="form-label">Que recherchez-vous ?</label>
                <input type="text" class="form-control" id="text-recherche" placeholder="Que recherchez-vous ?" name="title-research">
            </div>
            <div class="inputRecherche">
                <label for="localisation-recherche" class="form-label">Où cherchez-vous ?</label>
                <input type="text" class="form-control" id="localisation-recherche" placeholder="Saisissez une ville" name="localisation-research">
            </div>
        </div>
        <div id="btRecherche" class="d-flex">
            <button type="submit" id="btSubmitRecherche" class="btn btn-primary" name="action" value="research">Rechercher</button>
            <div id="btMoreResearch">
                <img src="public/img/advancedResearch.png">
            </div>
        </div>
        
        <div id="blockMoreResearch"><p>coucou</p></div>
    </div>
</form>