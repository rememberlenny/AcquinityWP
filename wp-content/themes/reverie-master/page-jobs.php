<?php 
/*
Template Name: Job Boards
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
</div>  
   
  
<div class="content content-main row twelve">
  <div class="main large-8 columns ">   
    


    <div class="case-studies fr">
      <div class="s9999 case-studies-extension fr">
        <div id="case-sliders" class="pr98 pl98 lftcont case-studies-content content-sec fr">
        <script type="text/javascript" src="http://app.theresumator.com/widgets/basic/create/acquinityinteractive" charset="utf-8"></script>
        </div>
      </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>