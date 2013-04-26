<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>
<style>
  .orbit-next, .orbit-prev, .orbit-slide-number, .orbit-timer{ display:none; }

</style>	
 <li class="active text-left article-title" data-orbit-slide="headline-1">
   <div id="post-<?php the_ID(); ?>">
      <div class="large-12 small-12 column pl98">
       <header>
        <div class="row">
        <h5 style="margin-top:0em;">
          <a href="<?php the_permalink(); ?>" data-orbit-slide="headline-2" class="secondary">
            <?php the_title(); ?>
          </a>
        </h5> 
        </div>
    	</header>
    		<div class="row">
        <p>
          <?php
            $excerpt = get_the_excerpt();
            echo string_limit_words($excerpt,25);
          ?>... 
          <a href="<?php the_permalink(); ?>">Read More ›</a>
        </p>  
        </div>
    	<footer>
    		<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
    	</footer>
    </div>
  </div>
</li> 