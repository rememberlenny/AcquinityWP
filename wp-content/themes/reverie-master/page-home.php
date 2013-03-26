<?php 
/*
Template Name: Home Page
*/
get_header(); ?>

<!-- Row for main content area -->
	
<div class="content hero-row row">
  <div class="main large-12"> 
    <div class="masthead-photo h300">
      <div class="s9999 masthead-photo-extension image-wrapper">
        <div class="masthead-photo-content text-center">
          <?php
          if(get_field('hero_title_line_1'))
          {
            echo '<div> <h1 class="text-left hero-text">' . get_field('hero_title_line_1') . '</h1></div>';
          }
          if(get_field('hero_title_line_2'))
          {
            echo '<div> <h1 class="text-left hero-text">' . get_field('hero_title_line_2') . '</h1></div>';
          }
          if(get_field('hero_para_1'))
          {
            echo '<div>' . get_field('hero_para_1') . '</div>';
          }
          ?>
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
		  <div class="s9999 page-main-extension whitebg borderbtm fr">
        <div class="lftcont page-main-content content-sec fr">
          <div class="pr98 pl98 text-left column"> 
            <div class="column">
              <header>
                <h4 class="subheader"><?php the_field('home_section2_title'); ?></h4>
              </header>
              <div class="entry-content">
                <?php the_field('product_section'); ?>
              </div>
            </div>
            <div class=" clear text">

            </div>
          </div>
        </div>
      </div>
		</div>	
		<div class="page-main fr text-left" role="main">
	    <div class="s9999 page-main-extension fr">
	      <div class="lftcont page-main-content content-sec fr">
		    	<div class="pr98 pl98 text-left column"> 
			    	<div class=" column">
	          	<a href="/success-stories/">
	              <h4 class="subheader">Success Stories</h4>
	            </a>

	            <div class="case-study-item text-left large-12 fl">
               <div class="featsucc"> 
                  <ul id="featsucc" data-orbit>
                    <li class="active text-left article-title" data-orbit-slide="headline-1">
                      <div class="large-3 small-3 mkup column mn93">

                          <div class="hide-for-small image-wrapper radius th radius" >
                            <img class="centered " src="http://localhost:4421/wp-content/uploads/2013/03/Verde-Energy-USA-150x150.jpg" alt="">
                          </div>
                      </div>
                      <div class="large-9 small-12 column pl98">
                        <h5>
                          <a href="/case-study/verde-energy-customer-acquisition/" data-orbit-slide="headline-2" class="secondary">
                            Amping Up Acquisitions
                          </a>
                        </h5> 
                        <p>Acquinity's lead conversion team powered Verde Energy’s customer acquisition efforts. Tony Mechaca, CMO from Verde Energy USA, worked alongside Acquinity.
                        
                        <a href="/case-study/verde-energy-customer-acquisition/">Read More ›</a></p>
                        
                      </div>
                    </li>
                    <li class="active text-left article-title" data-orbit-slide="headline-2">
                      <div class="large-3 small-3 mkup column mn93">
                         <div class="hide-for-small image-wrapper radius th radius" >
                          <img class="centered " src="http://localhost:4421/wp-content/uploads/2013/03/telecom1-150x150.jpg" alt="">
                        </div>
                      </div>
                      <div class="large-9 small-12 column">
                        <h5>
                          <a href="/case-study/terracom-ad-targeting/" data-orbit-slide="headline-2" class="secondary">
                            Terracom: Ad Targeting
                          </a>
                        </h5> 
                        <p>Mobile provider Terracom/YourTel made the right call with Acquinity's targeting technology. Acquinity helped Terracom maximize it's Lifeline campaign. <a href="/case-study/terracom-ad-targeting/">Read More ›</a></p>
                        
                      </div>
                    </li>
                    <li class="active text-left article-title" data-orbit-slide="headline-3">
                      <div class="large-3 small-3 mkup column mn93">
                        <div class="hide-for-small image-wrapper radius th radius" >
                          <img class="centered " src="http://localhost:4421/wp-content/uploads/2013/03/nuts1-150x150.jpg" alt="">
                        </div>
                      </div>
                      <div class="large-9 small-12 column">
                        <h5>
                          <a href="/case-study/naturebox-boosting-online-orders/" data-orbit-slide="headline-3" class="secondary">Thinking inside the box</a>
                        </h5> 
                        <p>Natural food distributor NatureBox tasked Acquinity with boosting online orders. Partnering with Acquinity's bSavings has given NatureBox the sales advantage they needed. <a href="/case-study/naturebox-boosting-online-orders/">Read More ›</a>
                        </p>
                        
                      </div>
                    </li>
                  </ul>

                </div>
              </div>
            <div class=" clear text">
            </div>
          </div>
					</div>
		    </div>
		  </div>
		</div>
    <div class="page-main fr text-left" role="main">
      <div class="s9999 page-main-extension whitebg last fr">
        <div class="lftcont page-main-content content-sec fr">
          <div class="pr98 pl98 text-left column"> 
            <div class=" ">
 
            <div class="large-6 column featart-short borderrt" style=" border-right: 1px solid #E4E2E1;">
                           <a href="/success-stories/">
                <h4 class="subheader">Latest</h4>
              </a>
                <ul>
                  <li>
                    <div class="image-wrapper radius th" >
                      <img class="centered " src="http://localhost:4421/wp-content/uploads/2013/03/leadscon.jpg" alt="" style="max-width: 210px;">
                    </div>
                  </li>
                </ul>
                  <h5 class="article-title-line">
                <a href="/success-story-telecom/" class="secondary">
                    Live from LeadsCon
                </a>
                    </h5>
                <p class=" text-left">
                  An overview from Acquinity. 
                                  <a class="svbt-line" href="/case-study/naturebox-boosting-online-orders/">Read Article ›</a> 
                </p>

             </div>
             <div class="text-left large-6 column">
              <a href="/success-stories/">
                <h4 class="subheader">News</h4>
              </a>
              <ul class="">
                <li class="active text-left article-title">

                  <a href="/success-story-telecom/" class="secondary">
                    Acquinity.com to relaunch ›
                  </a>

                </li>
                <li class="active text-left article-title">

                  <a href="/success-story-telecom/" class="secondary">
                    Meet the Acquinity team at ad:tech ›
                  </a>

                </li>
                <li class="active text-left article-title">

                  <a href="/success-story-telecom/" class="secondary">
                    Acquinity's new COO: Bob Hayes ›
                  </a>

                </li>                 
                <li class="active text-left article-title">

                  <a href="/success-story-telecom/" class="secondary">
                    March State of the Industry ›
                  </a>

                </li>                
                
              </ul>
                               <a class="svbt-line" href="/success-story-telecom/" class="secondary">
                    See more News ›
                  </a>
            </div>
            <div class=" clear text">

            </div>
          </div>
          </div>
        </div>
      </div>
    </div>  
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>