<?php 
/*
Template Name: Home Page
*/
get_header(); ?>

<!-- Row for main content area -->
	
<div class="content hero-row row">
  <div class="main large-12"> 
    <div class="masthead-photo h300">
      <div class="s9999 masthead-photo-extension image-wrapper">
        <div class="masthead-photo-content">
          <?php
          if(get_field('home_section_title'))
          {
            echo '<div> <h1 class="text-left hero-text">' . get_field('home_section_title') . '</h1><br>';
          }
          if(get_field('hero_para_1'))
          {
            echo '<span><p class="hero-text">' . get_field('hero_para_1') . '</p></span></div>';
          }
          ?>
        </div>	
      </div>
    </div>
  </div>
</div>	
   
<div class="content brandwrap row twelve">
	<div class="main large-12 columns ">
	  <div class="brand-bar clearboth">
	    <div class="brand-bar-extension">
	      <div id="brandslider" class="brand-bar-content">
	        <ul data-orbit>
	          <li class="active brand-row" data-orbit-slide>
	            <div>
	              <ul class="large-block-grid-6 small-block-grid-4">
	                <li><img src="images/logos/netflix-logo.png" alt=""></li>
	                <li><img src="images/logos/sc-johnson-logo.png" alt=""></li>
	                <li><img src="images/logos/vonage-logo.png" alt=""></li>
	                <li><img src="images/logos/tigerdirect-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/terracom-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/travellers-logo.png" alt=""></li>
	              </ul>
	            </div> 
	          </li>
	          <li class="brand-row" data-orbit-slide>
	            <div>
	              <ul class="large-block-grid-6 small-block-grid-4">
	                <li><img src="images/logos/disney-logo.png" alt=""></li>
	                <li><img src="images/logos/kelloggs-logo.png" alt=""></li>
	                <li><img src="images/logos/ebay-logo.png" alt=""></li>
	                <li><img src="images/logos/aarp-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/eharmony-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/travelocity-logo.png" alt=""></li>
	              </ul>
	            </div> 
	          </li>
	          <li class="brand-row" data-orbit-slide>
	            <div>
	              <ul class="large-block-grid-6 small-block-grid-4">
	                <li><img src="images/logos/groupon-logo.png" alt=""></li>
	                <li><img src="images/logos/overstock-logo.png" alt=""></li>
	                <li><img src="images/logos/jsp-logo.png" alt=""></li>
	                <li><img src="images/logos/shoedazzle.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/achievecard-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/educationdynamics-logo.png" alt=""></li>
	              </ul>
	            </div> 
	          </li>
	        </ul>
	      </div>
	    </div>
	  </div>    
	</div>
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
               <div class="featsucc"> 
                  <ul id="featsucc" data-orbit>
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
	    <div class="s9999 page-main-extension fr">
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
                    <a class="svbt-line" href="/success-story-telecom/" class="secondary">
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