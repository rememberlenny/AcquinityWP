<?php 
/*
Template Name: Page
*/
get_header(); ?>

<?php postHeaderStyleCall(); ?>

<!-- Row for main content area -->
	
<!-- Hero Image and Text -->  
<?php content_header_function(); ?>
<!-- End Hero Image and Text -->	
  
<div class="content content-main row">
	<div class="main large-8 columns "> 	
		<?php /* Start loop */ ?>
		<div class="case-studies fr">
		  <div class="s9999 case-studies-extension fr">
		    <div id="case-sliders" class="pr98 pl98 lftcont case-studies-content content-sec fr">
	      <?php while (have_posts()) : the_post(); ?>
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<header>
							<h2 class=""><?php the_title(); ?></h2>
							<?php // reverie_entry_meta(); ?>
						</header>
						<div class="entry-content">
  						<?php the_content(); ?>
              <?php //about_us_panel(); ?>    
              <?php page_bottom_box(); ?>   
						</div>
					</article>
          
				<?php endwhile; // End the loop ?>
			  </div>
			</div>
		</div>
	</div>

	<div class="large-4 column small-12 text-center whitebg mt1p5em mb1em">
		<div class="widget brand-color-back row pt1em d-inline p10em20em mt1p5em">
			<h3 class="white fw400">
				<?php the_field('cta_sidebar_header', 'option'); ?>
			</h3>
			<p class="white lh1em mb08em">
				<?php the_field('cta_sidebar_text', 'option'); ?>
			</p>
			<a href="<?php the_field('cta_sidebar_media_kit', 'option'); ?>" class="button small success radius">Download</a>
		</div>

		<div class="widget row mt2em">
			<div class="large-10 column large-centered">
				<h3 class="subheader fs1p2em">
					<?php the_field('logos_sidebar_header', 'option'); ?>
				</h3>	
				<ul class="large-block-grid-2">
					<?php get_template_part('content-loop-load'); ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'content-emailbar'); ?>

<?php get_template_part( 'content-successstories'); ?>

<?php get_footer(); ?>