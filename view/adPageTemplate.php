<?php $title = 'Annonce détail'; ?>

<?php ob_start(); ?>

<div id="boxAnnonce" class="container">
    <div class="col-md-8 infoAnnonce">
        <div id="photoAnnonce" class="row">
            <div class="col-md-8"><img src="../upload" alt="une Image" height="20vh" width="75%"></div>
            <div id="blockAnnonceur" class="col-md-4">
                <button id="btUtilisateur" class="btn btn-secondary" href="index.php?action=openUserPage"><?= $pseudo ?></button>
                <button class="btn btn-secondary"><?= $mail ?></button>
            </div>
        </div>
        <h5><?= $titre ?></h5>
        <p><?= $prix ?> €</p>
        <p><?= $localisation ?></p>
        <p><?= $description ?></p>
        </div>
    </div>
</div>

<div class="container blockDetails">
    <div id="specificiteAnnonce" class="row">
        <?php
        for($i=0;$i<count($specificitiesNames);$i++){
            // echo $specificitiesNames[$i]['nom_data'].' : '.$adDetails[$i]['valeur_ordre'].'<br>';
            echo '<div class="col-md-2 descriptionAnnonce"><span class="specificitees">'. $specificitiesNames[$i]['nom_data'].' : '.'</span><br>'.'<span class="details">'.$adDetails[$i]['valeur_ordre'].'</span><br></div>';
        }
        ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>