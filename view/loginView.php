<?php $title = 'Login'; ?>

<?php ob_start(); ?>
<div class="conainer-fluid">
    <div id="bandeau">
        <span class="row">
            <div id="titre">La Bonne Oca'z</div>
        </span>
    </div>
</div>
<div class="container">
    <div id="formIn" class="col-md-6">
        <div id="bonjour">Bonjour !</div>
        <div id="textIntro">Connectez-vous pour découvrir toutes nos fonctionnalités.</div>
        <form method="GET" action="index.php">
            <input type="text" name="mail" placeholder="Entrez votre mail" value="" required>
            <input type="text" name="pseudo" placeholder="Entrez votre pseudo" value="" required>
            <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="" required>
            <button type="submit" name="action" id="bouttonIn" class="btn btn-primary" value="login" >Se connecter</button>
        </form>
        <div id="textSign">Envie de nous rejoindre ? 
            <a href="index.php?action=openSignIn" id="linkSign">Créer un compte</a>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>