<?php
/*
Template Name: Play
*/
get_header();

if(isset($_GET['id']) && $_GET['id']){
    start_track($_GET['id']);
}
?>



<?php
get_footer();
