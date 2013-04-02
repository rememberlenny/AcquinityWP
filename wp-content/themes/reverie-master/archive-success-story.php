<?php 
/*
Template Name: Page News
*/
get_header(); ?>

<!-- Row for main content area -->
  
<div class="content hero-row row twelve">
  <div class="main large-12">
    <div class="masthead-photo h300">
      <div class="s9999 masthead-photo-extension image-wrapper">
        <div class="masthead-photo-content">
          <?php
          if(get_field('hero_title_line_1'))
          {
            echo '<div> <h1 class="text-left hero-text">' . the_field('hero_title_line_1') . '</h1></div>';
          }
          if(get_field('hero_title_line_2'))
          {
            echo '<div> <h1 class="text-left hero-text">' . the_field('hero_title_line_2') . '</h1></div>';
          }
          ?>
        </div>
       </div>
    </div>
  </div>
</div>  
   
  
<div class="content content-main row twelve">
  <div class="main large-8 columns ">   
    <?php /* Start loop */ ?>
    <div class="case-studies fr">
      <div class="s9999 case-studies-extension fr">
        <div id="case-sliders" class="pr98 pl98 lftcont case-studies-content content-sec fr">
        	<h4 class="subheader">Success Stories</h4> 
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
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>