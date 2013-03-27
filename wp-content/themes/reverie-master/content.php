<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( the_post_thumbnail( 'thumbnail' ), 'single-post-thumbnail' ); ?>
    <img src="<?php echo $image[0]; ?>">
  <?php endif; ?>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
	</header>
	<!-- <div class="entry-content"> -->
		<?php // the_content('Continue reading...'); ?>
	<!-- </div> -->
	<footer>
		<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	<hr />
</article>