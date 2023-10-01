<?php
/*
Template Name: Play
*/
get_header();

if(isset($_GET['title']) && $_GET['title'] && isset($_GET['artiste']) && $_GET['artiste']){
    sync_tracks();
}
?>



<?php
get_footer();
