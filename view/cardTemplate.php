
<!-- Need : $image, $title, $price, $localisation, $idOwnerAd, $idAnounce -->
<div class="container"> 
    <div class="card"> 
        <div class="card-body row"> 
            <div class="col-4"> 
                <img class="card-img-top" src=" <?= $image ?> " alt="Card image cap"> 
            </div> 
            <div class="carteContenu col-4" > 
                <h5 class="card-title col"> <?= $title ?> </h5> 
                <p class="card-text prixAnnonce"> <?= $price ?> </p> 
                <p class="card-text localisationAnnonce"> <?= $localisation ?> </p> 
            </div> 
            <div class="col-4 d-flex bouttonAnnonce"> 
            <form method="GET" action="index.php">
                <button name="action" type="submit" class="btn btn-primary" value="openAd">Voir l'annonce</button>
                <input type="hidden" name="idOwnerAd" value= <?= $idOwnerAd ?> >
                <input type="hidden" name="idAd" value= <?= $idAd ?> >
            </form> 
        <?//php $this->afficherBtSuppr($idPageUtilisateur, $idAnnonce); ?>
        </div> 
    </div>
</div> 