<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>
	
  <div class="large-4 column">
   <div id="post-<?php the_ID(); ?>" class=" post-block">
      <div class="large-12 small-12">
        <div class="hide-for-small " >
          <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <a href="<?php the_permalink(); ?>"><?php $image = wp_get_attachment_image_src( the_post_thumbnail( 'thumbnail' ), 'single-post-thumbnail' ); ?></a>
          <?php endif; ?>
        </div>
       <header>
        <h3 class="subheader">
          <a href="<?php the_permalink(); ?>" data-orbit-slide="headline-2" class="secondary">
            <?php the_title(); ?>
          </a>
        </h3> 
        <strong class="primary-color-font">
          <?php the_field('post_company_name'); ?>
        </strong>
      </header>
        <p class="excerpt">
          <?php
            $excerpt = get_the_excerpt();
            echo string_limit_words($excerpt,25);
          ?>... 
        </p>  
        <p>
        <a href="<?php the_permalink(); ?>">Read More ›</a>
        </p>
      <footer>
        <?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
      </footer>
    </div>
  </div>
  </div>
