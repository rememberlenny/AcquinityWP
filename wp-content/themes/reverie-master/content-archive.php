<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="large-4 column">
  	<div class="thumb-wrapper circlewrapper">
  	<?php if (has_post_thumbnail( $post->ID ) ): ?>
      <?php $image = wp_get_attachment_image_src( the_post_thumbnail( 'thumbnail' ), 'single-post-thumbnail' ); ?>
    <?php endif; ?>
    </div>
  </div>
  <div class="content-block large-8 column"> 
    <header>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>
  		<?php the_excerpt(''); ?>
  		<a class="svbt-line d-inline" href="<?php the_permalink(); ?>"> Read More</a>
    <footer>
      <?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
    </footer>
  </div>  
	<hr />
</article>