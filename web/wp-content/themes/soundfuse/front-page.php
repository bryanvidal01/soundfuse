<?php get_header(); ?>

<?php if(!isset($_SESSION["tokenUser"])): ?>
    <?php lsdGetTemplatePart('general','bloc', 'connexion'); ?>
<?php else: ?>
    <?php lsdGetTemplatePart('general','bloc', 'homepage'); ?>
<?php endif; ?>

<?php
get_footer();
