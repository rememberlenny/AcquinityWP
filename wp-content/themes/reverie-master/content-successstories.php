	
<div class="whitebg pt1em pb2em">
  <div class="row pt1em">
    <div class="case-study-item text-left large-12 fl">
     <div class="featsucc" id="pausetarget"  > 
          <?php 
          rewind_posts();
          $mypost = array( 'post_type' => 'success-story', 'posts_per_page' => '3', 'orderby' => 'rand' );
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