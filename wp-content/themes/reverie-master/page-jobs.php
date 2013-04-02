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
          <?php hero_text_block(); ?>
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
        <iframe name="resumator-job-frame" id="resumator-job-frame" class="resumator-advanced-widget" src="http://acquinityinteractive.theresumator.com/apply/jobs/" width="100%" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        <script>function resizeResumatorIframe(height,nojump){if(nojump== 0){window.scrollTo(0,0);}document.getElementById("resumator-job-frame").height = parseInt(height)+20;}</script>
        </div>
      </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>