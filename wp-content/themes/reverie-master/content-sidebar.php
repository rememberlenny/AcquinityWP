<div class="large-3 column small-12 text-center whitebg mt1p5em mb1em ppr5em ppl5em
">
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
      <div class="large-12 column large-centered">
        <h3 class="subheader fs1p2em">
          <?php the_field('logos_sidebar_header', 'option'); ?>
        </h3> 
        <ul class="large-block-grid-2 small-block-grid-2">
          <?php get_template_part('content-loop-load'); ?>
        </ul>
      </div>
    </div>
  </div>