<?php $title = 'La bonne Oca\'z'; ?>

<?php ob_start(); ?>
<div class="container">
    <span id="titlePageUser">Bienvenu sur la page utilisateur de <?= $userName ?></span>
    <div id="boxMailUser">
        <form action="index.php" method="GET">


            <div class="form-group">
                <label for="name">Entrez votre nom
                  <input type="text" name="mail" class="form-control" required>
                </label>
            </div>
            <div class="form-group">
                <label for="name">Entrez votre nom
                  <input type="text" name="sujet" class="form-control" required>
                </label>
            </div>
            <div class="form-group">
                <label for="name">Entrez votre nom
                    <textarea  id="textNul" name="message" class="form-control" required></textarea>
                </label>
            </div>

            <input type="submit" name="envoyer" value="Envoyer" />
            <input type="hidden" name="action" value="sendMessage" />
            <input type="hidden" name="email" value=<?= $email ?> />
        </form>
    </div>    
</div>


<script src="public/js/script.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>