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
<div class="primary-color-back brand-color-back">
  <div class="row pt1em">
    <div class="large-9 column">
      <h2 class="white">
        <?php the_field('blue_bar:_first_text_line'); ?>
      </h2>
      <p class="white fs1p5em">
        <?php the_field('blue_bar:_second_text_line'); ?>
      </p>
    </div>
    <div class="large-3 mt1em column">
      <a class="button small small success radius" href="/advertisers">
        <?php the_field('blue_bar:_button_text'); ?></a>
    </div>
  </div>
</div>
<div class="whitebg pt1em">
  <div class="row text-center">
    <h2><?php the_field('bullet_point_1t:_first_line'); ?></h2>
    <p class="fs1p5em"><?php the_field('bullet_point_1t:_second_line'); ?></p>
  </div>
  <div class="row text-center">
    <h2><?php the_field('bullet_point_2:_first_line'); ?></h2>
    <p class="fs1p5em"><?php the_field('bullet_point_2:_second_line'); ?></p>
  </div>
  <div class="row text-center">
    <h2><?php the_field('bullet_point_3:_first_line'); ?></h2>
    <p class="fs1p5em"><?php the_field('bullet_point_3:_second_line'); ?></p>
  </div>
</div>
<div class="ltgreybg pt1em text-center">
  <div class="row">
    <div class="large-4 column">
      <h2 class="primary-color-font"><?php the_field('statistic_1:_number'); ?></h2>
      <p class="fs1p5em">
        <?php the_field('statistic_1:_text'); ?>
      </p>
    </div>
    <div class="large-4 column">
      <h2 class="primary-color-font"><?php the_field('statistic_2:_number'); ?></h2>
      <p class="fs1p5em">
        <?php the_field('statistic_2:_text'); ?>
      </p>
    </div>
    <div class="large-4 column">
      <h2 class="primary-color-font"><?php the_field('statistic_3:_number'); ?></h2>
      <p class="fs1p5em">
        <?php the_field('statistic_3:_text'); ?>
      </p>
    </div>
  </div>
</div>

<div class="primary-color-back brand-color-back pbp2em pt1em blue-bar2">
  <div class="row">
    <div class="large-6 column">
      <strong class="white">
        <?php the_field('blue_bar_2:_work_link'); ?>
      </strong>
      <a href="/contact" class="button small success radius">Contact us</a>
    </div>
    <div class="large-6 column">
      <div class="large-4 column">
        <strong class="white  email-pref">
          Email newsletter
        </strong>
      </div>
      <div class="large-8 fl">
        <form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post">
        <input type="hidden" name="llr" value="cr5omucab">
        <input type="hidden" name="m" value="1102343272994">
        <input type="hidden" name="p" value="oi">
        <div class="collapse" style="display: block!important;">
          <div class="large-7 column">
            <input type="text" name="ea" size="20" class="radius" value="" placeholder="email Address" data-cip-id="cIPJQ342845639">
          </div>
          <div class="large-5 column">
            <input type="submit" name="go" value="Sign up" class="radius button small success">
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
	
<div class="whitebg pt1em pb2em">
  <div class="row">
    <div class="case-study-item text-left large-12 fl">
     <div class="featsucc" id="pausetarget"  > 
          <?php 
          rewind_posts();
          $mypost = array( 'post_type' => 'success-story', 'posts_per_page' => '3' );
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
      </div>
    </div>
  <div class=" clear text"></div>
  </div>
</div>

<?php get_footer(); ?>