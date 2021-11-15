<?php $title = 'La bonne Oca\'z'; ?>

<?php ob_start(); ?>
<div id="containerUser" class="container d-flex">
    <span id="titlePageUser">Bienvenu sur la page utilisateur de <?= $userName ?></span>
    <div id="boxMailUser">
        <form action="index.php" method="GET">
            <div id="boxContact">
                <div class="form-group">
                    <label class="formUser" for="name">Entrez votre nom
                    <input type="text" name="mail" class="form-control" required>
                    </label>
                </div>
                <div class="form-group">
                    <label class="formUser" for="name">Entrez votre mail
                    <input type="text" name="sujet" class="form-control" required>
                    </label>
                </div>
                <div class="form-group">
                    <label class="formUser" for="name">Entrez votre message
                        <textarea  id="textMail" name="message" class="form-control" required></textarea>
                    </label>
                </div>

                <input type="submit" name="envoyer" value="Envoyer" id="btSubmitUser"  class="btn btn-primary d-flex"/>
                <input type="hidden" name="action" value="sendMessage" />
                <input type="hidden" name="email" value=<?= $email ?> />
            </div>
        </form>
    </div>    
</div>


<script src="public/js/script.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>