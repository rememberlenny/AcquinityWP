<?php 
/*
Template Name: Home Page
*/
get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

<style type="text/css">
	.masthead-photo {
		background: url("<?php echo $image[0]; ?>") center right no-repeat #FAF8F6;
	}
</style>

<?php endif; ?>

<!-- Row for main content area -->
	
<div class="content hero-row row twelve">
  <div class="main large-8 fl">
    <div class="masthead-photo h300">
      <div class="s9999 masthead-photo-extension image-wrapper">
        <div class="masthead-photo-content">
          <?php
          if(get_field('hero_title_line_1'))
          {
            echo '<div> <h1 class="text-left hero-text">' . the_field('hero_title_line_1') . '</h1></div>';
          }
          if(get_field('hero_title_line_2'))
          {
            echo '<div> <h1 class="text-left hero-text">' . the_field('hero_title_line_2') . '</h1></div>';
          }
          ?>
        </div>
       </div>
    </div>
  </div>
  <div class="sidebar large-4 small-12 fl">
    <div class="company-facts hide-for-small"> 
      <div class="s9999 company-facts-extension h300 fl">
        <div class="company-facts-content content-sec">
          <div id="featrap" class="  lftcont case-studies-content content-sec fl">
          <h4 class="pre-head subheader">Acquinity Stats</h4>
            <ul class="pre-head">
              <li class="active case-row" data-orbit-slide>
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
	
<div class="content brandwrap row twelve">
	<div class="main large-12 columns ">
	  <div class="brand-bar clearboth">
	    <div class="brand-bar-extension">
	      <div id="brandslider" class="brand-bar-content">
	        <ul data-orbit>
	          <li class="active brand-row" data-orbit-slide>
	            <div>
	              <ul class="large-block-grid-6 small-block-grid-4">
	                <li><img src="images/logos/netflix-logo.png" alt=""></li>
	                <li><img src="images/logos/sc-johnson-logo.png" alt=""></li>
	                <li><img src="images/logos/vonage-logo.png" alt=""></li>
	                <li><img src="images/logos/tigerdirect-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/terracom-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/travellers-logo.png" alt=""></li>
	              </ul>
	            </div> 
	          </li>
	          <li class="brand-row" data-orbit-slide>
	            <div>
	              <ul class="large-block-grid-6 small-block-grid-4">
	                <li><img src="images/logos/disney-logo.png" alt=""></li>
	                <li><img src="images/logos/kelloggs-logo.png" alt=""></li>
	                <li><img src="images/logos/ebay-logo.png" alt=""></li>
	                <li><img src="images/logos/aarp-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/eharmony-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/travelocity-logo.png" alt=""></li>
	              </ul>
	            </div> 
	          </li>
	          <li class="brand-row" data-orbit-slide>
	            <div>
	              <ul class="large-block-grid-6 small-block-grid-4">
	                <li><img src="images/logos/groupon-logo.png" alt=""></li>
	                <li><img src="images/logos/overstock-logo.png" alt=""></li>
	                <li><img src="images/logos/jsp-logo.png" alt=""></li>
	                <li><img src="images/logos/shoedazzle.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/achievecard-logo.png" alt=""></li>
	                <li class="hide-for-small"><img src="images/logos/educationdynamics-logo.png" alt=""></li>
	              </ul>
	            </div> 
	          </li>
	        </ul>
	      </div>
	    </div>
	  </div>    
	</div>
</div>  
	
<div class="content content-main row twelve">
	<div class="main large-8 columns "> 	
		<div class="case-studies fr">
		  <div class="s9999 case-studies-extension fr">
		    <div id="case-sliders" class="column lftcont case-studies-content content-sec fr">
		    	<div class="large-6 column">
		    		<a href="/success-stories/">
		    			<h4 class="subheader">Featured Success</h4>
			      </a>
	          <div class="case-study-item text-left large-12 fl">
	          	<a href="/success-story-energy/" class="secondary">
	          	<div class="image-wrapper radius">
		            <img class="centered " src="images/case/telecom.jpg" alt="">
	            </div>
	            <h2 class="subheader">Direct Energy</h2>
	            <label for="">Customer Acquisition,</label>
	            <label for="">Energy</label>
	            <p class="">Acquinity's lead conversion team powered Direct Energy's customer acquisition efforts. &rarr;</p></a>
	          </div>
						<hr>
	          <div class=" clear text">
							<h4 class="subheader">Success Stories</h4>
		          <ul class="circle column">
		          	
				        <li class="active case-row">
				          	<a href="/success-story-telecom/" class="secondary">
				            <p class="subheader text-left">Success Story: Telecom</p>
				            </a>
				        </li>
				        <li class="active case-row">
				          	<a href="/success-story-telecom/" class="secondary">
				            <p class="subheader text-left">Success Story: Retail</p>
				            </a>
				        </li>
				      </ul>
				      <hr>
				      	<a href="/success-stories/">
			        		<p class="subheader text-center">View Success Archive</p>
		        		</a>
	        		<hr>
	          </div>
		    	</div>
		    	<div class="large-6 column">
		    		<a href="/news/">
		    			<h4 class="subheader">News</h4>
			      </a>
	          <div class="case-study-item text-center large-12 fl">
	          	<a href="/news/" class="secondary">
	          	<div class="image-wrapper radius">
		            <img class="centered " src="images/case/news.jpg" alt="">
	            </div>
	            <div class="text-left">
	            	<a href="http://localhost:4421/live-from-leadscon-las-vegas-2013/">
			            <h2 class="subheader text-left">Live from LEADSCON</h2>
			            <label for="">20 MAR '13</label>
			            <p class="text-left">
			            	An overview from Acquinity's EVP of Media, Don Silvestri &rarr; 
		            	</p>
	            	</a>
	            </div>
	            <hr>
								<a href="/news/">
									<p>View News Archive</p>
								</a> 
							<hr>
	            </a>
	          </div>
		    	</div>
		    </div>
		  </div>
		</div>
		
		<?php /* Start loop */ ?>

		<div class="page-main fr" role="main">
	    <div class="s9999 page-main-extension fr">
	      <div class="lftcont page-main-content content-sec fr">
					<div class="pr98 pl98"> 
						<?php while (have_posts()) : the_post(); ?>
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<header>
								<h4 class="subheader"><?php the_field('home_section_title'); ?></h4>
								<?php // reverie_entry_meta(); ?>
							</header>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						</article>
						<?php endwhile; // End the loop ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>