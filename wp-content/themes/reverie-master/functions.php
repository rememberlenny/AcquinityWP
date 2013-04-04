<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
    - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here
/*
2. lib/enqueue-sass.php or enqueue-css.php
    - enqueueing scripts & styles for Sass OR CSS
    - please use either Sass OR CSS, having two enabled will ruin your weekend
*/
require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
//require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
/*
3. lib/foundation.php
	- add pagination
	- custom walker for top-bar and related
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
// require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked



/**********************
Add theme supports
**********************/
function reverie_theme_support() {
	// Add language supports. Please note that Reverie does not include language files, not yet
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie'),
		'utility' => __('Utility Navigation', 'reverie')
	));
	
	// Add custom background support
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<hr class="show-for-small"><div class="products-link-block large-12  small-12 column"><div id="%1$s" class="s9999 products-link-extension fl %2$s"><div class="rgtcont pl98g pr98g products-link-content content-sec fl">',
		'after_widget' => '</div></div></div>',
		'before_title' => '<h4 class="subheader">',
		'after_title' => '</h4>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

function about_us_panel(){
    ?>
    <div class="large-12 panel row clearboth mb1em radius about">
      <img src="<?php echo site_url(); ?>/wp-content/uploads/2013/03/acquinity-a-circle.png" class="fl acq-cir-sm" >
      <a href="/about/"><h4 class="subheader">About Acquinity Interactive</h4></a>
      <p>Acquinity Interactive turns consumers into brand investors. A performance, product marketing and lead generation company, Acquinity’s many platforms of expertise include niche online communities, their accompanying email titles, telemarketing, and consumer services in the fields of sweepstakes, health, couponing and political polling. 
      <br>
      <a href="/about/" class="secondary svbt-line">Read more about Acquinity Interactive ›</a> 
      </p>
      
    </div>
    <?php
}

function page_bottom_box(){
  if( get_field('page_bottom_statistic_toggle') || is_home() || is_category('event-appearances') || is_category('event-appearances') || is_category('industry-news') || is_category('press-release') || get_field('page_bottom_statistic_toggle') ):
    
    if( is_home() ):
      $statNumber = get_field('archive-blog-all-number', 'option'); 
      $statDesc = get_field('archive-blog-all-text', 'option');
    elseif( is_category('event-appearances') ):
      $statNumber = get_field('archive-blog-events-number', 'option'); 
      $statDesc = get_field('archive-blog-events-text', 'option'); 
    elseif( is_category('industry-news') ):
      $statNumber = get_field('archive-blog-industry-number', 'option'); 
      $statDesc = get_field('archive-blog-industry-text', 'option'); 
    elseif( is_category('press-release') ):
      $statNumber = get_field('archive-blog-press-number', 'option'); 
      $statDesc = get_field('archive-blog-press-text', 'option'); 
    elseif( get_field('page_bottom_statistic_toggle') ): 
      $statNumber = get_field('page_bottom_statistic_number'); 
      $statDesc = get_field('page_bottom_statistic_short_desc');
    endif;  ?>
    
    <div class="pageBottomBox large-12 panel row clearboth mb1em radius about">
        <div class="large-6 column left">  
          <h4 class="subheader stat-number">            
            <?php echo $statNumber; ?> 
          </h4>
        </div>
        <div class="large-6 column">              
          <p>
            <?php echo $statDesc; ?> 
          </p>
  			</div>
		</div>
	<?php 
  
  endif;
}

function page_stat_panel(){
		?>
		<div class="large-12 panel row clearboth mb1em radius about">
			<img src="<?php echo site_url(); ?>/wp-content/uploads/2013/03/acquinity-a-circle.png" class="fl acq-cir-sm" >
			<a href="/about/"><h4 class="subheader">About Acquinity Interactive</h4></a>
			<p>Acquinity Interactive turns consumers into brand investors. A performance, product marketing and lead generation company, Acquinity’s many platforms of expertise include niche online communities, their accompanying email titles, telemarketing, and consumer services in the fields of sweepstakes, health, couponing and political polling. 
			<br>
			<a href="/about/" class="secondary svbt-line">Read more about Acquinity Interactive ›</a> 
			</p>
			
		</div>
		<?php
}

function get_related_cpt(){
		$currentID = get_the_ID();
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $loop = new WP_Query( array(
    'post_type' => 'success-story',
    'posts_per_page' => 9,
    'orderby'=> 'menu_order',
    'paged'=>$paged,
    'post__not_in' => array($currentID)
    ) ); ?>    
    <div class="large-12 clearboth mb2em radius row ml0 accessory-block">
      <div class="column">
      	<a href="/success-story/"><h4 class="subheader">More Success Stories</h4></a>
      </div> 
		    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		    	<div class="large-4 column pr1em">
				    <div class="accessory_image radius">
				    	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?></a>
				            <?php the_title( '<h5 class="accessory-title"><a class="secondary" href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h5>' ); ?>
				    </div>
			    </div>
		    <?php endwhile;?>
    </div>
<?php }

//
// Styles GForm Button
//

add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<input type='submit' id='gform_submit_button_{$form["id"]}' class='button gform_button radius small success' value='Submit' tabindex='7'>";
}

//
// Excerpt length
//
 
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

//
// Seperating style modification on pages
//
 
function heroBackgroundImage($url){
    echo '#masthead-photo { background: url("' . $url . '") center center no-repeat #111 !important; }';
}
// End heroBackgroundImage()


function lkbg_head_style(){
  $linkedinIcon = get_field('linkedin_icon', 'option');
  $facebookIcon = get_field('facebook_icon', 'option');
  
  function social_icon_style($selector, $url){
    echo ' .' . $selector . '{ background: url("' . $url . '") center center; }';
  } ?>
  
  <style type="text/css">


    <?php
      social_icon_style('linkedin', $linkedinIcon);  
      social_icon_style('facebook', $facebookIcon);  
    ?>

    <?php if (is_page('home') ):
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( 36 ), 'single-post-thumbnail' );
        
      echo heroBackgroundImage($image[0]);

    elseif (is_home() ): 

      $url = get_field('blog_top_header', 'option');
      heroBackgroundImage($url);
       
    elseif (is_post_type_archive('success-story') ): 
      
      $url = get_field('success_stories_archive_header', 'option');
      heroBackgroundImage($url);
      
    elseif (is_home() ): 
   
      $url = get_field('blog_all_post_feed_image', 'option');
      heroBackgroundImage($url);

    elseif (is_category('press-release') ): 
    
      $url = get_field('blog-category__press_release_image', 'option');
      heroBackgroundImage($url);
    
    elseif (is_category('event-appearances') ): 
    
      $url = get_field('blog-category_event_appearance_image', 'option');
       groundImage($url);
    
    elseif (is_category('industry-news') ): 
    
      $url = get_field('blog-category_industry_news_image', 'option');
      heroBackgroundImage($url);
      
    endif;?>

  </style>

    <!-- <img src="<?php //echo $url ?>" alt="" id="headerImage" style="display: none;"> -->

  <?php
}
// End lkbg_head_style()

function hero_text_block(){
    function header_text_block_template($content) {
      echo '<div> <h1 class="text-left hero-text">' . $content . '</h1></div>';
    }
    if (get_field('hero_title_line_1') && !is_post_type_archive('success-story')):

      $hero_text_content = get_field('hero_title_line_1');
      header_text_block_template ($hero_text_content);
    
    elseif (is_post_type_archive('success-story')):

      $hero_text_content = get_field('archive_success_story_head', 'option');
      header_text_block_template ($hero_text_content);

    endif;
}
// End hero_text_block()

function loading_balls(){
    echo '<div class="windows8" id="windows8">';
    for ( $i = 0; $i < 5; $i++ ){
      echo '<div class="wBall" id="wBall_' . $i . '">';
      echo '<div class="wInnerBall"></div>';
      echo '</div>';
    }
  ?> 
  </div>
<?php }
// End loading_balls()

function content_header_function(){ ?>
  <div class="content hero-row row">
    <div class="main large-12 masthead-background"> 
      <?php loading_balls(); ?>
      <div class="masthead-photo h300" id="masthead-photo">
        <div class="s9999 masthead-photo-extension image-wrapper" id="masthead-photo-extension">
          <div class="masthead-photo-content">
            <?php
            if(is_page('home')){
              if(get_field('home_section_title')){
                echo '<div> <h1 class="text-left hero-text">' . get_field('home_section_title') . '</h1><br>';
              }
              if(get_field('hero_para_1')){
                echo '<span><p class="hero-text">' . get_field('hero_para_1') . '</p></span></div>';
              }
            }
            else {
              hero_text_block(); 
            }
            ?>
          </div>  
        </div>
      </div>
    </div>
  </div>  
  <?php
}
//End content_header_function()

function backgroundACFdeclaration(){
  ?>
  .masthead-photo {
    background: url("<?php echo $image[0]; ?>") center center no-repeat #FAF8F6;
  }
  <?php
}

function stretchBackgroundImage(){
    if ( get_field('background_2000')){
      echo '.masthead-photo{ background-size: 2000px; }';
    }
}

function postHeaderStyleCall(){
?>
  <style type="text/css">

    <?php backgroundACFdeclaration(); ?>

    <?php stretchBackgroundImage(); ?>

  </style>
<?php
}


?>