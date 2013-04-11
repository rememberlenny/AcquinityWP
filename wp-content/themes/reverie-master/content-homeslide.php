<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>
	
 <li class="active text-left article-title" data-orbit-slide="headline-1">
   <div id="post-<?php the_ID(); ?>">
      <div class="large-3 small-3 mkup column mn93">
        <div class="hide-for-small image-wrapper circlewrapper radius" >
          <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <a href="<?php the_permalink(); ?>"><?php $image = wp_get_attachment_image_src( the_post_thumbnail( 'thumbnail' ), 'single-post-thumbnail' ); ?></a>
          <?php endif; ?>
        </div>
      </div>
      <div class="large-9 small-12 column pl98">
       <header>
        <h5>
          <a href="<?php the_permalink(); ?>" data-orbit-slide="headline-2" class="secondary">
            <?php the_title(); ?>
          </a>
        </h5> 
    	</header>
    		<p>
          <?php
            $excerpt = get_the_excerpt();
            echo string_limit_words($excerpt,25);
          ?>... 
          <a href="<?php the_permalink(); ?>">Read More ›</a>
        </p>  
    	<footer>
    		<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
    	</footer>
    </div>
  </div>
</li> 