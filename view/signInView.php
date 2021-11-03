<?php $title = 'SignIn'; ?>

<?php ob_start(); ?>
<div class="container">
    <div id="formIn" class="col-md-6">
        <div id="bonjour">Bonjour !</div>
        <div id="textIntro">Inscrivez-vous pour découvrir toutes nos annonces.</div>
        <form method="GET" action="index.php">
            <input type="text" name="mail" placeholder="Entrez votre mail" value="" required>
            <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="" required>
            <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="" required>
            <button type="submit" name="action" id="bouttonIn" class="btn btn-primary" value="signIn">S'enregistrer</button>
        </form>
    </div>
    <div id="textSign">Déjà un compte ? 
            <a href="index.php" id="linkSign">Se connecter</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>