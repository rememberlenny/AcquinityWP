<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>
	
 <li class="active text-left article-title" data-orbit-slide="headline-1">
  <ul style="margin-bottom: 0.4em;">
    <li>
      <div class="special-news image-wrapper circlewrapper radius" >
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
          <?php $image = wp_get_attachment_image_src( the_post_thumbnail( 'thumbnail' ), 'single-post-thumbnail' ); ?>
        <?php endif; ?>
      </div>
    </li>
  </ul>
  <h5 class="article-title-line" style="line-height:1.2;">
    <a href="<?php the_permalink(); ?>" class="secondary">
      <?php the_title(); ?>
    </a>
  </h5>
  <p class=" text-left clearboth pt1em">
    <?php
      $excerpt = get_the_excerpt();
      echo string_limit_words($excerpt,10);
    ?>...
    <a class="svbt-line" href="<?php the_permalink(); ?>">Read Article ›</a>
  </p>  
</li> 