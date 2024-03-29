<?php get_header(); ?>



<?php inlineCSScall(); ?> 
<!-- Row for main content area -->
  
<?php content_header_function(); ?> 
  
<div class="content content-main row twelve">
  <div class="main large-9 columns ">   
  <?php /* Start loop */ ?>
    <div class="case-studies fr">
      <div class="s9999 case-studies-extension fr">
        <div id="case-sliders" class="pr98 pl98 lftcont case-studies-content content-sec fr">
        <?php while (have_posts()) : the_post(); ?>
					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<header>
							<h2><?php the_title(); ?></h2>
							<?php // reverie_entry_meta(); ?>
						</header>
						<div class="entry-content">
							<?php the_content(); ?>         
						</div>
						<footer>
							<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
							<p><?php the_tags();  ?></p>
       
          </footer>
          </article>
          
        </div>
				<?php endwhile; // End the loop ?>
			</div>
		</div>
  </div>
  <?php get_template_part( 'content-sidebar'); ?>
  
</div>

<?php get_template_part( 'content-emailbar'); ?>

<?php get_template_part( 'content-successstories'); ?>


<?php get_footer(); ?>