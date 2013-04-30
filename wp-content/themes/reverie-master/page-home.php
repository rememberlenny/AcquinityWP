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
    
    body #sidebar{ padding-bottom: 0em !important;}
    .footer-full{background: none !important;} 

    #masthead-photo-content h1.hero-text span.kick{
      font-size: 2em!important;
      
    }
    #masthead-photo-content h1.hero-text{
      font-weight: 600;
      font-size: 2.3em!important;
      color: #eee;
    }

    #masthead-photo{
      background: rgb(50,52,92)!important;
    }
 
    .home .masthead-photo-content {
      margin-top: 90px !important;
    }

 </style>
   
<!-- Hero Image and Text -->  
<?php content_header_function(); ?>
<!-- End Hero Image and Text -->  
<div id="brandbar-heightfix" class="brand-color-back">
<?php brandBarHome(); ?>

</div>
	<script>
  (document)
  </script>
<?php statBarHome(); ?>

<div class="content content-main row twelve">
	<div class="main large-8 columns "> 	
		<div class="page-main fr text-left" role="main">
	    <div class="s9999 page-main-extension newsynew fr">
	      <div class="lftcont page-main-content content-sec fr pb15em">
		      <div class="pr98 pl98 text-left column"> 
            <div class=" ">
               <div class="text-left large-6 column">
                <a href="/news/">
                  <h4 class="subheader">Acquinity News</h4>
                </a>
                <ul class="" style="margin-bottom: 1.8em;">
                  <?php 
                  rewind_posts();
                  $mypost = array( 'post_type' => 'post' );
                  $my_query = new WP_Query( $mypost ); ?>

                  <?php if ( have_posts() ) : ?>
                  <?php $i=1 /* Start the Loop */ ?>
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
              <div class="large-6 column featart-short">
                <a href="/success-story/">
                  <h4 class="subheader">Recent Success Stories</h4>
                </a>
                <ul id="featsucc" data-orbit data-options="timer_speed: 0;">
                    <?php 
                    rewind_posts();
                    $mypost = array( 'post_type' => 'success-story' );
                    $my_query = new WP_Query( $mypost ); ?>

                    <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */
                          $i= 0; ?>
                    <?php while ( $my_query->have_posts()) :  $my_query->the_post(); ?>
                      <?php if ($i < 3): 
                        $i++ ?>
                        <?php get_template_part( 'content', 'homeslide' ); ?>
                
                      <?php endif; ?>
                    <?php endwhile; ?>

                    <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>

                    <?php endif; // end have_posts() check 
                    wp_reset_query();?>
                  </ul>  
               </div>
              <div class=" clear text"></div>
            </div>
          </div>
		    </div>
		  </div>
		</div>
    
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>