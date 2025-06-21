<?php
/*
 * Template Name: Front Page Template
 */
get_header();
?>
<?php linnet_theme()->get( 'front-page-content' )->render(); ?>

<?php get_footer();
