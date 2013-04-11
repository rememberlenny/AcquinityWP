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
<div class="brand-color-back logo-strict-height ofhdn">
<?php brandBarHome(); ?>
</div>
	
<div class="content content-main row twelve">
	<div class="main large-8 columns "> 	
		<div class="case-studies fr">
		  <div class="s9999 page-main-extension whitebg fr">
        <div class="lftcont page-main-content content-sec fr">
          <div class="pr98 pl98 text-left column"> 
            <div class=" column">
              <a href="/success-story/">
                <h4 class="subheader">Success Stories</h4>
              </a>

              <div class="case-study-item text-left large-12 fl">
               <div class="featsucc" id="pausetarget"  > 
                  <ul id="featsucc" data-orbit data-options="timer_speed: 0;">
                    <?php 
                    rewind_posts();
                    $mypost = array( 'post_type' => 'success-story' );
                    $my_query = new WP_Query( $mypost ); ?>

                    <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ( $my_query->have_posts()) :  $my_query->the_post(); ?>
                    <?php get_template_part( 'content', 'homeslide' ); ?>
                    <?php endwhile; ?>

                    <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>

                    <?php endif; // end have_posts() check 
                    wp_reset_query();?>
                  </ul>
                </div>
              </div>
            <div class=" clear text"></div>
            </div>
          </div>
        </div>
      </div>
		</div>	
		<div class="page-main fr text-left" role="main">
	    <div class="s9999 page-main-extension newsynew fr">
	      <div class="lftcont page-main-content content-sec fr pb15em">
		      <div class="pr98 pl98 text-left column"> 
            <div class=" ">
              <div class="large-6 column featart-short borderrt">
                <a href="/news/">
                  <h4 class="subheader">Latest</h4>
                </a>
                  <?php 
                  rewind_posts();
                  $mypost = array( 'post_type' => 'post' );
                  $my_query = new WP_Query( $mypost ); ?>

                  <?php if ( have_posts() ) : ?>

                  <?php $i=1 /* Start the Loop */ ?>
                  <?php while ( $i<2 && $my_query->have_posts()) :  $my_query->the_post(); ?>
                  <?php get_template_part( 'content', 'newpost' ); ?> 
                  <?php $i++; endwhile; ?>
               </div>
               <div class="text-left large-6 column">
                <a href="/news/">
                  <h4 class="subheader">News</h4>
                </a>
                <ul class="" style="margin-bottom: 1.8em;">
                  <?php while ( $i<5 && $my_query->have_posts()) :  $my_query->the_post(); ?>
                  <?php get_template_part( 'content', 'notnewpost' ); ?>
                  <?php $i++; endwhile; ?>
                  <?php endif; // end have_posts() check 
                  wp_reset_query(); ?>               
                </ul>
                    <a class="svbt-line" href="/news/" class="secondary">
                      See more News ›
                    </a>
              </div>
              <div class=" clear text"></div>
            </div>
          </div>
		    </div>
		  </div>
		</div>
    <div class="page-main fr text-left" role="main">
      <div class="s9999 page-main-extension whitebg borderbtm fr ">
        <div class="lftcont page-main-content content-sec fr">
          <div class="pr98 pl98 text-left column"> 
            <div class="column">
              <header>
                <h4 class="subheader"><?php the_field('home_section2_title'); ?></h4>
              </header>
              <div class="entry-content">
                <?php the_field('product_section'); ?>
              </div>
            </div>
            <div class=" clear text">
            </div>
          </div>
        </div>
      </div>
    </div>  
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>