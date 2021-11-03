<?php $title = 'La bonne Oca\'z'; ?>

<?php ob_start(); ?>
<?php include('researchView.php')?>
<script src="public/js/script.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>