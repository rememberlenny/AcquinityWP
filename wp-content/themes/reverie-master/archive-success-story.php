<?php 
/*
Template Name: Page News
*/
get_header(); ?>

<!-- Row for main content area -->
  
<style type="text/css">
<?php 
  $url = get_field('success_stories_archive_header', 'option');
  heroBackgroundImage($url); 
?>
</style>  
  
<?php content_header_function(); ?>
  
<div class="content content-main row twelve">
  <div class="main large-9 columns ">   
    <?php /* Start loop */ ?>
    <div class="case-studies fr">
      <div class="s9999 case-studies-extension fr">
        <div id="case-sliders" class="pr98 pl98 lftcont case-studies-content content-sec fr">
        	<h2>Success Stories</h2> 
            <?php $mypost = array( 'post_type' => 'success-story', );
        $loop = new WP_Query( $mypost ); ?>
        
        <?php if ( have_posts() ) : ?>
        
          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'archive' ); ?>
          <?php endwhile; ?>
          
          <?php else : ?>
              <?php get_template_part( 'content', 'none' ); ?>
            
          <?php endif; // end have_posts() check ?>
          
          <?php /* Display navigation to next/previous pages when applicable */ ?>
          <?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
            <nav id="post-nav">
              <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
              <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
            </nav>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
  <?php get_template_part( 'content-sidebar'); ?>
</div>

<?php get_template_part( 'content-emailbar'); ?>

<?php get_template_part( 'content-successstories'); ?>


<?php get_footer(); ?>