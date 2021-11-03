
<!-- Formulaire pour ajouter une categorie -->
<?php $title = 'Ajouter une catégorie'; ?>

<?php ob_start(); ?>
<form method = "get" action="" id="add-categorie">
    <span>Nouvelle catégorie :</span> <input type="text" placeholder="Nouvelle Catégorie" value="" name="name-category"> </br>
    <span>Données Spécifiques à la catégorie :</span> </br>
    <!-- Les lignes du formulaire est généré par newCategorie.js avec le btn-new-line. -->
</form>
<button id=btn-new-line>Nouveau critère</button>
<input type="submit" value="addNewCategory" name="action" form="add-categorie">Valider</input>
<?php $content = ob_get_clean(); ?>


<?php include('template.php'); ?>
<script src="public/js/script.js"></script>

