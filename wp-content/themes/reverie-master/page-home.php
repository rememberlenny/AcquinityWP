<?php 
/*
Template Name: Home Page
*/
get_header(); ?>

<!-- Row for main content area -->
	
 <style type="text/css">
    <?php
    if ( get_field('background_2000')){
      echo '.masthead-photo{ background-size: 2000px; }';
    }
    ?>
 </style>
   
<!-- Hero Image and Text -->  
<?php content_header_function(); ?>
<!-- End Hero Image and Text -->  

<?php get_template_part( 'content-heroblue' ); ?>

<?php get_template_part( 'content-bulletpoints'); ?>

<?php get_template_part( 'content-statbar'); ?>

<?php get_template_part( 'content-logobar'); ?>

<?php get_template_part( 'content-emailbar'); ?>

<?php get_template_part( 'content-successstories'); ?>

<?php get_footer(); ?>