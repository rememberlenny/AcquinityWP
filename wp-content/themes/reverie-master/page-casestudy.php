<?php 
/*
Template Name: Case Study
*/
get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

<style type="text/css">
	.masthead-photo {
		background: url("<?php echo $image[0]; ?>") center center no-repeat #FAF8F6;
	}
</style>

<?php endif; ?>

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
  <div class="sidebar large-4 small-12 fl">
    <div class="company-facts hide-for-small"> 
      <div class="s9999 company-facts-extension h300 fl">
        <div class="company-facts-content content-sec">
          <div id="featrap" class="  lftcont case-studies-content content-sec fr">
          <h4 class="pre-head subheader">Acquinity Stats</h4>
            <ul class="pre-head">
              <li class="active case-row">
                <p><?php the_field('page_statistic_pretext'); ?></p>
                <h5 class="subheader"><?php the_field('page_statistic_number'); ?></h5>
                <p><?php the_field('page_statistic_text'); ?></p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>	
	 
	
<div class="content content-main row twelve">
	<div class="main large-8 columns "> 	
		
    <?php query_posts( 'post_type=case-studies'); ?>

    <?php /* Start loop */ ?>
		<div class="case-studies fr">
		  <div class="s9999 case-studies-extension fr">
		    <div id="case-sliders" class="pr98 pl98 lftcont case-studies-content content-sec fr">
	      <?php while (have_posts()) : the_post(); ?>
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<header>
							<h4 class="subheader"><?php the_title(); ?></h4>
							<?php // reverie_entry_meta(); ?>
						</header>
						<div class="entry-content">
							<?php the_content(); ?>

            </div>
          </article>
        <?php endwhile; // End the loop ?>
        </div>
      </div>
    </div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>