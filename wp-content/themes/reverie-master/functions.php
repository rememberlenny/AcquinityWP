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
			<img src="http://localhost:4421/wp-content/uploads/2013/03/acquinity-a-circle.png" class="fl acq-cir-sm" >
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
    <div class="large-12 clearboth mb2em radius">
    	<a href="/success-story/"><h4 class="subheader">More Success Stories</h4></a>
		    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		    	<div class="large-4 fl pr1em">
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
 

 
?>