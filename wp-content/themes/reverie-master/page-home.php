<?php 
/*
Template Name: Home Page
*/
get_header(); ?>

<style type="text/css">
	.masthead-photo {
		background: url("<?php the_field('hero_image'); ?>") center center;
	}
</style>

<!-- Row for main content area -->
	
<div class="content hero-row row twelve">
  <div class="main large-8 fl">
    <div class="masthead-photo h300">
      <div class="s9999 masthead-photo-extension image-wrapper">
        <div class="masthead-photo-content">
          
					<div> <h1 class="text-left hero-text"><?php the_field('hero_title_line_1'); ?></h1></div>
          <div> <h1 class="text-left hero-text"><?php the_field('hero_title_line_2'); ?></h1></div>
          
        </div>
       </div>
    </div>
  </div>
  <div class="sidebar large-4 small-12 fl">
    <div class="company-facts hide-for-small" id="featrap"> 
      <div class="s9999 company-facts-extension h300 fl">
        <div class="company-facts-content content-sec">
          <div id="featrap" class="  lftcont case-studies-content content-sec fr">
          <h4 class="pre-head subheader">Acquinity's Site Network</h4>
            <ul>
              <li class="active case-row" data-orbit-slide>
                <div class="clearboth chart-container">
                  <div class="chart">
                    
                  </div>
                </div>
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
		    <div id="case-sliders" class="pr98 pl98 lftcont case-studies-content content-sec fr">
		      <h4 class="subheader">Success Stories</h4>
		      <ul data-orbit>
		        <li class="active case-row" data-orbit-slide>
		          <div class="case-study-item text-center large-12 fl">
		            <h2 class="subheader text-left">Energy</h2>
		            <p class="text-left"><a href="" class="secondary">Acquinity's lead conversion team powered Direct Energy's customer acquisition efforts. &rarr;</a></p>
		            
		            <div class="image-wrapper radius">
		            <img class="centered " src="images/case/telecom.jpg" alt=""></div>
		          </div>
		        </li>
		        <li class=" case-row" data-orbit-slide>
		          <div class="case-study-item text-center large-12 fl">
		            <h2 class="subheader text-left">Telecom</h2>
		            <p class="text-left"><a href="" class="secondary">Mobile provider Terracom/YourTel made the right call with Acquinity's targeting technology. &rarr;</a></p>
		            <div class="image-wrapper radius">
		            <img class="centered " src="images/case/phone.jpg" alt=""></div>
		          </div>
		        </li>
		        <li class="case-row" data-orbit-slide>
		          <div class="case-study-item text-center large-12 fl">
		            <h2 class="subheader text-left">Retail</h2>
		            <p class="text-left"><a href="" class="secondary">Natural food distributor NatureBox tasked Acquinity with boosting online orders. &rarr;</a></p>
		            <div class="image-wrapper radius">
		            <img class="centered " src="images/case/nuts.jpg" alt=""></div>

		          </div>
		        </li>
		      </ul>
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
								<h4 class="subheader"><?php the_title(); ?></h4>
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