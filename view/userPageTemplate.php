<?php $title = 'La bonne Oca\'z'; ?>

<?php ob_start(); ?>
<h4>Bienvenu sur la page utilisateur de <?= $userName ?></h2>

<form action="index.php" method="GET">
    <div>
        <p>Mail : </p>
        <input type="text" name="mail" value="" />
    </div>
    <div>
        <p>Sujet : </p>
        <input type="text" name="sujet" value="" />
    </div>
    <div>
        <p>Message : </p>
        <textarea  name="message"></textarea>
    </div>
    <input type="submit" name="envoyer" value="Envoyer" />
    <input type="hidden" name="action" value="sendMessage" />
    <input type="hidden" name="email" value=<?= $email ?> />
</form>
<script src="public/js/script.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>