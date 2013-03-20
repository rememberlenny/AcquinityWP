<?php
/*
Plugin Name: PressTrends
Plugin URI: http://www.presstrends.me
Description: PressTrends makes it incredibly easy to get real value from your data. By combining your data with benchmarks and offering real-time suggestions, you'll finally know exactly how your site is performing and how to improve.
Version: 1.2.9
Author: PressTrends
Author URI: http://www.presstrends.me
*/

/*  Copyright 2012  PressTrends  (email : hello@presstrends.io)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Don't expose any info if called directly
if ( !defined( 'ABSPATH' ) )
	exit;

// Define Google OAuth Settings
if ( ! defined('PRESSTRENDS_GA_SK'))
define('PRESSTRENDS_GA_SK', 'PRESSTRENDS_ACCESS_TOKEN_DATA'); 

if ( ! defined('PRESSTRENDS_GA_SECRET'))
define('PRESSTRENDS_GA_SECRET', 'PRESSTRENDS_SECRET_KEY'); 

if ( ! defined('PRESSTRENDS_PROVIDER_URL'))
define('PRESSTRENDS_PROVIDER_URL', 'http://www.presstrends.io/p/_inc/gapi/gapi.php'); 


// Add meta links after activation for support and settings
function set_presstrends_plugin_meta($links, $file) {
	$plugin = plugin_basename(__FILE__);
	// create link
	if ($file == $plugin) {
		return array_merge(
			$links,
			array( sprintf( '<a href="admin.php?page=presstrends_settings">Settings</a>', $plugin, __('Settings') ), sprintf( '<a href="http://www.presstrends.me/support">Support</a>', $plugin, __('Support') ) )
		);
	}
	return $links;
}

add_filter( 'plugin_row_meta', 'set_presstrends_plugin_meta', 10, 2 );


// add redirect after activation to settings
function presstrends_activate() {
    add_option('presstrends_activation_redirect', true);
}

function presstrends_redirect() {
    if (get_option('presstrends_activation_redirect', false)) {
        delete_option('presstrends_activation_redirect');
        wp_redirect('admin.php?page=presstrends_settings');
    }
}

register_activation_hook(__FILE__, 'presstrends_activate');
add_action('admin_init', 'presstrends_redirect');
	
	
// Main plugin class
class PressTrendsPlugin {
	
	public static $instance;
	const OPTIONS = 'presstrends_options';

	public function __construct() {
		self::$instance = $this;
		// We defer our hooks to plugins_loaded, so other plugins can interact
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );	
	}

	public function plugins_loaded() {
		load_plugin_textdomain( 'presstrends', false, basename( dirname( __FILE__ ) ) . '/languages' );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_init', array( $this, 'oauth_init' ) );
	}
	
	public function oauth_init()
	{
		 if (is_admin() AND in_array(@$_GET['page'], array('presstrends', 'presstrends_settings')))
		{
			if (@$_GET['page'] == 'presstrends_settings' AND !isset($_GET['run']))
			{
				return;
			}
			
			$this->oauth2 = self::grabOAuth2();
		}
	}

	private function get_option( $name ) {
		$options = $this->get_options();
		if ( isset( $options[$name] ) )
			return $options[$name];
		else
			return null;
	}

	private function get_options() {
		return get_option( self::OPTIONS );
	}

	public function enqueue_css() {
		wp_enqueue_style( 'presstrends', plugin_dir_url( __FILE__ ) . 'css/presstrends.css', NULL, '20120612' );
	}
	
	
	// ================================================================== 
	//
	//			        CREATE WORDPRESS MENU ITEMS
	//
	// ==================================================================
	
	public function admin_menu() {
		$menu_icon_url = plugin_dir_url( __FILE__ ) . '/images/menu-icon.png';
		$hooks = array();
		// Add PressTrends Top Level Menu
		$hooks[] = add_menu_page( __( 'Dashboard', 'presstrends' ), __( 'PressTrends', 'presstrends' ), 'manage_options', 'presstrends', array( $this, 'display_dashboard' ), $menu_icon_url );
		// Add PressTrends Submenu Pages
		$hooks[] = add_submenu_page( 'presstrends', __( 'Suggestions', 'presstrends' ), __( 'Suggestions', 'presstrends' ), 'manage_options', 'presstrends_suggestions', array( $this, 'display_suggestions' ) );
		$hooks[] = add_submenu_page( 'presstrends', __( 'Authors', 'presstrends' ), __( 'Authors', 'presstrends' ), 'manage_options', 'presstrends_authors', array( $this, 'display_authors' ) );
		// Add PressTrends Submenu Pages
		$hooks[] = add_submenu_page( 'presstrends', __( 'Settings', 'presstrends' ), __( 'Settings', 'presstrends' ), 'manage_options', 'presstrends_settings', array( $this, 'display_settings' ) );
		foreach ( $hooks as $hook )
			add_action( 'load-' . $hook, array( $this, 'enqueue_css' ) );
	}
	
	
	// ================================================================== 
	//
	//						DISPLAY SETTINGS PAGE
	//
	// ==================================================================
	
	public function display_settings() {
		if (isset($_GET['flush']))
		{
			delete_option(PRESSTRENDS_SECRET_KEY);
			delete_option(PRESSTRENDS_ACCESS_TOKEN_DATA);
			delete_option(presstrends_options);
		}
		?>
		<div class="presstrends wrap">
			
				<h2 class="dummy"></h2>
				<div class="logo">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
				</div>
				
				<div class="clear"></div>
				
				<div class="intro">
				<?php echo '<h2 style="font-size:20px;">' . __( 'To get started, integrate your Google Analytics account. Next, select a category for your site. Finally, set a goal for your site. Experiencing issues or have questions? <a href="http://www.presstrends.me/support" target="_blank" title="PressTrends Support">We offer free support</a>.', 'presstrends' ) . '</h2>'; ?>
				</div>
				
				<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>
				
				<?php
				if ( isset( $_GET['settings-updated'] ) ) {
					echo '<div class="updated" style="margin: 0 0 28px 0px;width:95%;"><p>' . __( 'Settings saved.', 'presstrends' ) . '</p></div><div class="clear"></div><div class="hr" style="margin-top:5px;"></div><div class="clear"></div>';
				}
			?>
				
			<form action="options.php" method="post">
				<?php settings_fields( 'presstrends_options' ); ?>
				<?php do_settings_sections( 'presstrends' ); ?>
				
				<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>
				
				<?php submit_button(); ?>
			</form>
			
			
			<?php 
			echo '<p style="float:left;padding:15px 0px 0px 0px;"><a class="button-secondary" href="'.admin_url('admin.php?page=presstrends_settings&flush=TRUE').'">Reset Settings</a></p>';
			?>
			
			
		</div>
	<?php
	}
	
	
	public function admin_init() 
	{
		register_setting( 'presstrends_options', 'presstrends_options' );
		
		add_settings_section( 'presstrends_main', '', array( $this, 'section_text' ), 'presstrends' );
		
		add_settings_field( 'presstrends_ga_profile', __( '<h4 class="skinny">Required <span>Authorize Google Analytics:</span></h4>', 'presstrends' ), array( $this, 'ga_profile' ), 'presstrends', 'presstrends_main' );
		
		add_settings_field( 'presstrends_category', __( '<h4 class="skinny" style="margin-top:15px;">Required <span>Select your site category:</span></h4>', 'presstrends' ), array( $this, 'category_string' ), 'presstrends', 'presstrends_main' );
		
		add_settings_field( 'presstrends_goal', __( '<h4 class="skinny" style="margin-top:29px;">Required <span>Select the goal of your site:</span></h4>', 'presstrends' ), array( $this, 'goal' ), 'presstrends', 'presstrends_main' );
		
		add_settings_field( 'presstrends_apikey', __( '<h4 class="skinny" style="margin-top:35px;color:#7f7f7f;">Optional <span>Upgrade Key:</span></h4>', 'presstrends' ), array( $this, 'api_key' ), 'presstrends', 'presstrends_main' );
		
	}

	public function section_text() 
	{
		$script = '/wp-content/plugins/presstrends/authorize.php';
		$script = ((!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$script: "http://".$_SERVER['SERVER_NAME'].$script);
		
 	}
	
	public function ga_profile() 
	{
 	$set_ga_profile = $this->get_option( 'ga_profile' );

		if ( ! isset($_GET['run']) && $set_ga_profile == '')
		{
			echo '<p>Make sure you are <strong>logged into the current Google account you wish to authenticate</strong> with PressTrends as Google does not allow you to change accounts once you authorize below. If you do not have Google Analytics setup, <a href="http://www.presstrends.me/2012/09/adding-google-analytics-to-wordpress/" target="_blank">learn how</a>.<br/><br/> <a class="button-secondary" href="'.admin_url('admin.php?page=presstrends_settings&run=TRUE').'">Authorize Google Analytics</a><br/><br/></p>';
		}
		else if(isset($_GET['run'])) {
			
			try{ 
						require '_inc/gapi.class.php';
					 
				        $ga = new gapi(null, null, $this->oauth2->token['access_token']) or die("Could not log in"); 
				        $ga->requestAccountData();
		 
						echo "<select id='presstrends_ga_profile' name='presstrends_options[ga_profile]'>";
							foreach( $ga->getResults() as $result )
							{
						 	  
							  ?>
							  <option value="<?php echo $result->getId(); ?>" 
							  <?php 
							  $ga_profile = esc_attr( $this->get_option( 'ga_profile' ) );
							  if($ga_profile == $result->getId()){ echo 'selected="selected"';} ?>
							  ><?php echo $result->getID(); ?> - <?php echo $result->getName(); ?></option>
							  <?php
							}
						echo "</select>";
						
				} catch(Exception $e) { 
				
				     echo "<p>Error: ".$e->getMessage()." <a href='http://www.presstrends.me/support' target='_blank' title='PressTrends Support'>Contact Support</a></p>";
				         
				}
				
		
		} else {
			
			echo '<input type="text" readonly="readonly" id="presstrends_ga_profile" name="presstrends_options[ga_profile]" value="'.$set_ga_profile.'" style="padding:10px 15px;float:left;width:300px;" />';
		
		}
	}

	public function category_string() 
	{
		$current_category = $this->get_option( 'category' );
		// To do: Make these translatable
		$categories = array(
			'Art',
			'Advertising',
			'Band',
			'Business',
			'Church',
			'Culture',
			'Design',
			'eCommerce',
			'eCommerce-Fashion',
			'eCommerce-Technology',
			'eCommerce-Art',
			'eCommerce-Home',
			'Fashion',
			'Finance',
			'Fitness',
			'Magazine',
			'Marketing',
			'Media',
			'News',
			'Personal',
			'Photography',
			'Real-Estate',
			'Religion',
			'Restaurant',
			'Technology',
			'Travel',
			'Wiki',
			'Other',
		);
		?>
			<select id='presstrends_category' name='presstrends_options[category]' style='margin-top:16px;'>
		<?php foreach ( $categories as $category ) { ?>
				<option <?php selected( $current_category, $category ); ?>><?php echo $category; ?></option>
		<?php } ?>
			</select>
		<?php
	}
	
	public function goal() 
	{
		$current_goal = $this->get_option( 'goal' ); ?>
		
		<p style="padding:0 0 10px 0;margin-top:29px;">
			<input type="radio" name="presstrends_options[goal]" <?php if($current_goal == 'readers'){ echo 'checked="checked"';}?> value="readers" style="margin:5px 10px 0 0;float:left;" />
			<label style="font-size:17px;">To have a solid community of engaged readers.</label>
		</p>
		<p style="padding:0 0 10px 0;">
			<input type="radio" name="presstrends_options[goal]" <?php if($current_goal == 'ads'){ echo 'checked="checked"';}?> value="ads" style="margin:5px 10px 0 0;float:left;" />
			<label style="font-size:17px;">To support advertising through impressions and clicks.</label>
		</p>
		<?php if($this->get_option( 'api_key' ) == '') { ?>
		<p style="padding:0 0 10px 0;">
			<input type="radio" name="presstrends_options[goal]" value="sales" disabled="disabled" style="margin:5px 10px 0 0;float:left;" />
			<label style="font-size:17px;color:#888;">To turn visitors into customers through the purchase of products.</label>
			<br/>
			<span style="padding:0 0 0 25px;color:#888;">Available for WooCommerce. <a href="http://www.presstrends.me/pricing" target="_blank">Upgrade to use this goal &raquo;</a></span>
		</p>
		<?php } elseif($this->get_option( 'api_key' ) != '' && !is_plugin_active('woocommerce/woocommerce.php')) { ?>
		<p style="padding:0 0 10px 0;">
			<input type="radio" name="presstrends_options[goal]" value="sales" disabled="disabled" style="margin:5px 10px 0 0;float:left;" />
			<label style="font-size:17px;">To turn visitors into customers through the purchase of products.</label>
			<br/>
			<span style="padding:0 0 0 25px;color:#888;">Activate <a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a> to use this goal.</span>
		</p>
		<?php } else { ?>
		<p style="padding:0 0 10px 0;">
			<input type="radio" name="presstrends_options[goal]" <?php if($current_goal == 'sales'){ echo 'checked="checked"';}?> value="sales" style="margin:5px 10px 0 0;float:left;" />
			<label style="font-size:17px;">To turn visitors into customers through the purchase of products.</label>
		</p>
		<?php } ?>
		<p style="padding:0 0 10px 0;">
			<input type="radio" name="presstrends_options[goal]" value="signups" disabled="disabled" style="margin:5px 10px 0 0;float:left;" />
			<label style="font-size:17px;color:#888;">To have an active community of registered users.</label>
			<br/>
			<span style="color:#999;padding:0 0 0 20px;">Coming soon for BuddyPress and others.</span>
		</p>
		<p>
			<input type="radio" name="presstrends_options[goal]" value="registrations" disabled="disabled" style="margin:5px 10px 0 0;float:left;" />
			<label style="font-size:17px;color:#888;">To turn visitors into registered attendees of events.</label>
			<br/>
			<span style="color:#999;padding:0 0 0 20px;">Coming soon for The Events Calendar and others.</span>
		</p>
		
		<?php
	}
	
	
	public function api_key() 
	{
		$presstrends_api_key = $this->get_option( 'api_key' ); ?>
		
		<input type="text" name="presstrends_options[api_key]" value="<?php if($presstrends_api_key != ''){echo $presstrends_api_key;} ?>" style="padding:10px 15px;float:left;width:300px;margin-top:24px;margin-right:10px;" />
		
		<?php if($presstrends_api_key == '') { ?>
		<p style="margin-top:33px;"><a href="http://www.presstrends.me/pricing">Upgrade &raquo;</a></p>
		<?php } ?>
		
		<?php
	}

	
	
	// ================================================================== 
	//
	//					SEND DATA TO PRESSTRENDS API
	//
	// ==================================================================
	
	private function get_data( $category_sum, $pingback_result, $site_category, $comments_to_posts, $approved_percentage, $spam_percentage, $reply_percentage, $post_timeline, $comment_timeline, $first_post, $uniques_timeline, $monthly_visits, $monthly_bounce_rate, $monthly_pages_visited, $monthly_load_time, $pressmoz_mozrank, $pressmoz_domain_auth, $pressmoz_external_links, $monthly_visitors, $avg_time_btw_comments, $avg_time_btw_posts, $monthly_comments, $visitor_to_comment_conversion, $social_facebook, $social_twitter, $social_google, $social_pinterest, $social_linkedin, $site_key, $site_goal, $revenue, $completed_orders, $cart_checkout_conversion, $avg_time_btw_checkout, $visitor_to_checkout_conversion) {
		$api_key = 'oqvdqoan02pb4ovzuw4ddrh61bm4ec1agskf';
		$presstrends_plugin_data = get_plugin_data( __FILE__ );
		$current_plugin_version = $presstrends_plugin_data['Version'];
		$data = get_transient( 'presstrends_me_data' );
		if ( !$data ) {
			$api_base = 'http://api.presstrends.io/index.php/api/blog/add/';
			$url = $api_base . 'api/' . $api_key . '/';
			$data = array();
			$count_posts = wp_count_posts();
			$count_pages = wp_count_posts( 'page' );
			$comments_count = wp_count_comments();
			// backwards compatibility
			if ( ! function_exists('wp_get_theme'))
			{
				$theme_data = array('Tags' => array());
			}else
			{
				$theme_data = wp_get_theme();
			}
			
			$plugin_count = count( get_option( 'active_plugins' ) );
			$all_plugins = get_plugins();
			$plugin_name = '';
			$tag_name = '';

			foreach ( $all_plugins as $plugin_file => $plugin_data ) {
				$plugin_name .= $plugin_data['Name'];
				$plugin_name .= '&';
			}

			$tags = $theme_data['Tags'];

			foreach( $tags as $keytag => $tag ) {
				$tag_name .= $tag;
				$tag_name .= '&';
			}

			$data['auth']                		= '61n5oidpnnlg1xpx4yzz9p9lw9yyznyoi';
			$data['url']                 		= stripslashes( str_replace( array( 'http://', '/', ':' ), '', site_url() ) );
			$data['posts']               		= $count_posts->publish;
			$data['pages']               		= $count_pages->publish;
			$data['comments']            		= $monthly_comments;
			$data['approved']            		= $comments_count->approved;
			$data['spam']                		= $comments_count->spam;
			$data['approved_percentage'] 		= $approved_percentage;
			$data['spam_percentage']     		= $spam_percentage;
			$data['reply_percentage']    		= $reply_percentage;
			$data['category_count']      		= $category_sum;
			$data['pingbacks']           		= $pingback_result;
			$data['site_category']       		= $site_category;
			$data['post_conversion']     		= $comments_to_posts;
			$data['theme_version']       		= $current_plugin_version;
			$data['theme_name']          		= urlencode($theme_data->Name);
			if ( $tag_name != '' )
				$data['theme_tags']      		= str_replace(' ','',$tag_name);
			$data['site_name']           		= urlencode( get_bloginfo( 'name' ) ); // Why?
			$data['plugins']            		= $plugin_count;
			$data['plugin']              		= urlencode( str_replace('/','',$plugin_name) );
			$data['wpversion']           		= get_bloginfo( 'version' );
			$data['site_email']          		= 'notevil';
			$data['post_timeline']       		= $post_timeline;
			$data['comment_timeline']    		= $comment_timeline;
			$data['first_post']    		 		= $first_post;
			$data['uniques_timeline']     		= $uniques_timeline;
			$data['monthly_visits']    			= str_replace(',','',$monthly_visits);
			$data['monthly_bounce_rate']    	= $monthly_bounce_rate;
			$data['monthly_pages_visited']  	= $monthly_pages_visited;
			$data['monthly_load_time']      	= $monthly_load_time;
			$data['mozrank']    				= $pressmoz_mozrank;
			$data['domain_auth']    			= $pressmoz_domain_auth;
			$data['external_links']     		= $pressmoz_external_links;
			$data['monthly_visitors']    		= str_replace(',','',$monthly_visitors);
			$data['between_posts']    			= $avg_time_btw_posts;
			$data['between_comments']  			= $avg_time_btw_comments;
			$data['visitor_comment_conversion'] = $visitor_to_comment_conversion;			
			$data['facebook'] 					= $social_facebook;
			$data['twitter'] 					= $social_twitter;
			$data['google'] 					= $social_google;
			$data['pinterest'] 					= $social_pinterest;
			$data['linkedin'] 					= $social_linkedin;
			$data['site_key'] 					= $site_key;
			$data['site_goal'] 					= $site_goal;
			$data['sale_revenue'] 				= $revenue;
			$data['monthly_sales'] 				= $completed_orders;
			$data['cart_checkout'] 				= $cart_checkout_conversion;
			$data['between_sales'] 				= $avg_time_btw_checkout;
			$data['visitor_checkout'] 			= $visitor_to_checkout_conversion;
			
			foreach ( $data as $k => $v ) {
				$url .= $k . '/' . $v . '/';
			}
			
			wp_remote_get( $url );
			set_transient( 'presstrends_me_data', $data, 60*60*24 );
			
		}
		return $data;
	}
	
	// ================================================================== 
	//
	//					 	GET GOOGLE METRICS
	//
	// ==================================================================
	
    public static function grabOAuth2()
	{
		require_once '_inc/client.php';
		$oauth = new PressTrendsClient;
		$oauth->getAccessToken();
		return $oauth;
	}
	
	private function ga_uniques( $ga, $output) 
	{
		$jan_newVisits = 0;
		$feb_newVisits = 0;
		$march_newVisits = 0;
		$april_newVisits = 0;
		$may_newVisits = 0;
		$june_newVisits = 0;
		$july_newVisits = 0;
		$aug_newVisits = 0;
		$sept_newVisits = 0;
		$oct_newVisits = 0;
		$nov_newVisits = 0;
		$dec_newVisits = 0;
		
		$ga->requestReportData(ga_profile_id,array('month'),array('visitors'),'month', null, $output, date('Y-m-d'));
		
		foreach($ga->getResults() as $result) {
			
			if($result == '01') {
				$jan_newVisits = $result->getvisitors();
			}
			if($result == '02') {
				$feb_newVisits = $result->getvisitors();
			}
			if($result == '03') {
				$march_newVisits = $result->getvisitors();
			}
			if($result == '04') {
				$april_newVisits = $result->getvisitors();
			}
			if($result == '05') {
				$may_newVisits = $result->getvisitors();
			}
			if($result == '06') {
				$june_newVisits = $result->getvisitors();
			}
			if($result == '07') {
				$july_newVisits = $result->getvisitors();
			}
			if($result == '08') {
				$aug_newVisits = $result->getvisitors();
			}
			if($result == '09') {
				$sept_newVisits = $result->getvisitors();
			}
			if($result == '10') {
				$oct_newVisits = $result->getvisitors();
			}
			if($result == '11') {
				$nov_newVisits = $result->getvisitors();
			}
			if($result == '12') {
				$dec_newVisits = $result->getvisitors();
			}
			
		}
		
		return $jan_newVisits . ',' . $feb_newVisits . ',' . $march_newVisits . ',' . $april_newVisits . ',' . $may_newVisits . ',' . $june_newVisits . ',' . $july_newVisits . ',' . $aug_newVisits . ',' . $sept_newVisits . ',' . $oct_newVisits . ',' . $nov_newVisits . ',' . $dec_newVisits;
		
	}

	private function ga_visits( $ga ) 
	{
			$monthago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$date = date('Y-m-d', $monthago);
			$ga->requestReportData(ga_profile_id,array('month'),array('visits'),'month', null, $date, date('Y-m-d'));
			return $ga->getVisits();
	}
	
	private function ga_weekly_visits( $ga ) {
	
			$weekago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 week");
			$date = date('Y-m-d', $weekago);
			$ga->requestReportData(ga_profile_id,array('week'),array('visits'),'week', null, $date, date('Y-m-d'));
			return $ga->getVisits();
	}
	
	private function ga_visitors( $ga ) 
	{
			$weekago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$date = date('Y-m-d', $weekago);
			$ga->requestReportData(ga_profile_id,array('month'),array('visitors'),'month', null, $date, date('Y-m-d'));
			return $ga->getVisitors();
	}
	
	private function ga_visitor_conversion( $ga, $monthly_comments ) 
	{
			$weekago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$date = date('Y-m-d', $weekago);
			$ga->requestReportData(ga_profile_id,array('month'),array('visitors'),'month', null, $date, date('Y-m-d'));
			return number_format($monthly_comments / $ga->getVisitors() * 100);
	}
	
	private function ga_checkout_conversion( $ga, $completed_orders ) 
	{
			$weekago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$date = date('Y-m-d', $weekago);
			$ga->requestReportData(ga_profile_id,array('month'),array('visitors'),'month', null, $date, date('Y-m-d'));
			return number_format($completed_orders / $ga->getVisitors() * 100, 1);
	}
	
	private function ga_weekly_visitors( $ga ) 
	{
			$weekago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 week");
			$date = date('Y-m-d', $weekago);
			$ga->requestReportData(ga_profile_id,array('week'),array('visitors'),'week', null, $date, date('Y-m-d'));
			return $ga->getVisitors();
	}
	
	private function ga_visitBounceRate( $ga ) 
	{
			$monthago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$date = date('Y-m-d', $monthago);
			$ga->requestReportData(ga_profile_id,array('month'),array('visitBounceRate'),'month', null, $date, date('Y-m-d'));
			return $ga->getvisitBounceRate();
	}
	
	private function ga_uniquePageviews( $ga ) 
	{
			$monthago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$date = date('Y-m-d', $monthago);
			$ga->requestReportData(ga_profile_id,array('month'),array('uniquePageviews','visitors'),'month', null, $date, date('Y-m-d'));
			return number_format($ga->getuniquePageviews() / $ga->getvisitors(), 1);
	}
	
	private function ga_avgPageLoadTime( $ga ) 
	{
			$monthago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$date = date('Y-m-d', $monthago);
			$ga->requestReportData(ga_profile_id,array('month'),array('avgPageLoadTime'),'month', null, $date, date('Y-m-d'));
			return $ga->getavgPageLoadTime();
	}
	
	
	// ================================================================== 
	//
	//					 SET BENCHMARK CALCULATIONS
	//
	// ==================================================================

	private function display_ranking( $numerator, $denominator ) 
	{
		$thing = ( $denominator === 0 ) ? -100 : @( $numerator / $denominator * 100 ) - 100;
		$color = ( $thing < 0 ) ? 'a96565' : '45958b';
		echo '<font style="color:#' . $color . ';">(' . number_format( $thing, 0, '', '' ) . '%)</font>';
	}
	
	private function show_ranking_plus( $site, $global ) 
	{
		if($site > $global || $site == $global) {
			echo '<div class="happy"></div>';
		} else {
			echo '<div class="sad"></div>';
		}
	}
	
	private function show_ranking_minus( $site, $global ) 
	{
		if($site < $global || $site == $global) {
			echo '<div class="happy"></div>';
		} else {
			echo '<div class="sad"></div>';
		}
	}
	
	private function display_spam_ranking( $numerator, $denominator ) 
	{
		$thing = ( $denominator === 0 ) ? -100 : @( $numerator / $denominator * 100 ) - 100;
		$color = ( $thing < 0 ) ? '45958b' : 'a96565';
		echo '<font style="color:#' . $color . ';">(' . number_format( $thing, 0, '', '' ) . '%)</font>';
	}
	
	
	
	// ================================================================== 
	//
	//						   SET DISPLAY HEADER
	//
	// ==================================================================
	
	private function display_header( $type = 'get-started' ) 
	{
		if ( !in_array( $type, array( 'stats', 'settings' ) ) )
			$type = 'get-started';
		?>
		<h2 class="dummy"></h2>
		<div class="logo">
			<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
		</div>

		<div class="intro">
			<?php if ( 'get-started' == $type || 'settings' == $type ) { ?>
				<p><?php _e( '<strong>PressTrends</strong> helps you understand how your site is performing and offers suggestions on how to improve. <a href="http://www.presstrends.me" target="_blank">Learn more &raquo;</a>', 'presstrends' ); ?></p>
			<?php } else { ?>
				<p><?php _e( '<strong>PressTrends</strong> helps you understand how your site is performing and offers suggestions on how to improve. <a href="http://www.presstrends.me" target="_blank">Learn more &raquo;</a>', 'presstrends' ); ?></p>

				<?php // Idea: _e( 'Benchmarking from 1,345 Marketing WordPress sites worldwide.' ); ?>
						
			<?php } ?>
		</div>

		<div class="clear"></div>

		<?php if ( 'get-started' == $type ) { ?>
			<p><?php printf( __( '<b>To get started</b>, please <a href="%s">update your PressTrends settings</a>.', 'presstrends' ), admin_url( 'admin.php?page=presstrends_settings' ) ); ?></p>
		<?php } ?>
		
		<?php
	}
	
	
	
	// ================================================================== 
	//
	//						 SET UPGRADE NOTICE
	//
	// ==================================================================
	
	private function upgrade( $current_presstrends_version, $upgrade_message ) 
	{
		$presstrends_plugin_data = get_plugin_data( __FILE__ );
		$current_plugin_version = $presstrends_plugin_data['Version'];
		if($current_plugin_version != $current_presstrends_version) {
			echo '<div class="upgrade_notice" style="margin: 0 0 20px -5px"><p>' . __( $upgrade_message, 'presstrends' ) . '</p></div>';
		}
	}
	
	
	
	// ================================================================== 
	//
	//						DISPLAY DASHBOARD PAGE
	//
	// ==================================================================
	
	public function display_dashboard() 
	{
		
		if ( !$this->get_option( 'category' ) || !$this->get_option( 'goal' ) || !$this->get_option( 'ga_profile' )) { ?>
			
			<div class="presstrends wrap">
				<h2 class="dummy"></h2>
				<div class="logo">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
				</div>
		
				<div class="intro">
						<p><?php _e( '<strong>PressTrends</strong> helps you understand how your site is performing by identifying your critical metrics with benchmarks and offering suggestions on how to improve. <a href="http://www.presstrends.me" target="_blank">Learn more &raquo;</a>', 'presstrends' ); ?></p>
				</div>
				
				<div class="clear"></div>
				<div class="hr" style="margin-top:5px;"></div>
			
			<div class="clear"></div>
				<p><?php printf( __( '<b>To get started</b>, please <a href="%s">update your PressTrends settings</a>. Experiencing issues or have questions? <a href="http://www.presstrends.me/support" target="_blank" title="PressTrends Support">We offer free support</a>', 'presstrends' ), admin_url( 'admin.php?page=presstrends_settings' ) ); ?></p>
			</div>
		
		<?php } else { ?>	
		
		<?php
		global $wpdb;
		include_once("_inc/core.php");
		
		// GET SITE CATEGORY
		$site_category = $this->get_option( 'category' );
		if($this->get_option( 'api_key' ) != '') {
		$site_key = $this->get_option( 'api_key' );
		} else {
		$site_key = '0';
		}
		
		
		// GET DATE OF FIRST PUBLISHED POST
		function ax_first_post_date($format = 'Y-m-d') {
		 // Setup get_posts arguments
		 $ax_args = array(
		 'numberposts' => -1,
		 'post_status' => 'publish',
		 'order' => 'ASC'
		 );
		 // Get all posts in order of first to last
		 $ax_get_all = get_posts($ax_args);
		 // Extract first post from array
		 $ax_first_post = $ax_get_all[0];
		 // Assign first post date to var
		 $ax_first_post_date = $ax_first_post->post_date;
		 // return date in required format
		 $output = date($format, strtotime($ax_first_post_date));
		 return $output;
		}
		
		$first_post = ax_first_post_date();
		
		// SET POST TIMELINE
		$post_timeline = $jan_posts.','.$feb_posts.','.$march_posts.','.$april_posts.','.$may_posts.','.$june_posts.','.$july_posts.','.$aug_posts.','.$sept_posts.','.$oct_posts.','.$nov_posts.','.$dec_posts;
	
		// SET COMMENT TIMELINE
		$comment_timeline = $jan_comments.','.$feb_comments.','.$march_comments.','.$april_comments.','.$may_comments.','.$june_comments.','.$july_comments.','.$aug_comments.','.$sept_comments.','.$oct_comments.','.$nov_comments.','.$dec_comments;

		// SET GOOGLE $GA
		$ga_profile = esc_attr( $this->get_option( 'ga_profile' ) );
		// Setup get_posts arguments
		$ax_args = array(
		 'numberposts' => -1,
		 'post_status' => 'publish',
		 'order' => 'ASC'
		);
		// Get all posts in order of first to last
		$ax_get_all = get_posts($ax_args);
		// Extract first post from array
		$ax_first_post = $ax_get_all[0];
		// Assign first post date to var
		$ax_first_post_date = $ax_first_post->post_date;
		// return date in required format
		$output = date('Y-m-d', strtotime($ax_first_post_date));
		
		if(strtotime($output) < strtotime('-2 years')) {
     		$output = date('Y-m-d', strtotime('-2 years'));
 		}
		
		if($ga_profile != '') {
			define( 'ga_profile_id', $ga_profile );
			require '_inc/gapi.class.php';
			
			try{ 
			        $ga = new gapi(null, null, $this->oauth2->token['access_token']) or die("Could not log 
			in"); 
			        $ga->requestAccountData(); 
			}catch(Exception $e){ 
			        print "Caught Exception:" . $e->getMessage(); 
			}
		}
		
		// Send site data to API
		if(isset($ga)) {
			$uniques_timeline = $this->ga_uniques( $ga, $output );
			$monthly_visits = $this->ga_visits( $ga );
			$monthly_visitors = $this->ga_visitors( $ga );
			$monthly_bounce_rate = $this->ga_visitBounceRate( $ga );
			$monthly_pages_visited = $this->ga_uniquePageviews( $ga );
			$monthly_load_time = $this->ga_avgPageLoadTime( $ga );
			
			$vconv_weekago = strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month");
			$vconv_date = date('Y-m-d', $vconv_weekago);
			$ga->requestReportData(ga_profile_id,array('month'),array('visitors'),'month', null, $vconv_date, date('Y-m-d'));
			$visitor_to_comment_conversion = number_format($monthly_comments / $ga->getVisitors() * 100);
			
			$visitor_to_checkout_conversion = $this->ga_checkout_conversion( $ga, $completed_orders );
			
		} else {
			$uniques_timeline = '0';
			$monthly_visits = '0';
			$monthly_bounce_rate = '0';
			$monthly_pages_visited = '0';
			$monthly_load_time = '0';
			$monthly_visitors = '0';
			$visitor_to_comment_conversion = '0';
			$visitor_to_checkout_conversion = '0';
		}
		
		// SEOmoz
		require_once '_inc/pressmoz.php';
		$pressmoz_response = wp_remote_get( $pressmoz_requestUrl, array('timeout'=>300));	
		$pressmoz_body = wp_remote_retrieve_body( $pressmoz_response );
		$pressmoz_array = json_decode($pressmoz_body, TRUE);
		$pressmoz_mozrank = 0;
		$pressmoz_domain_auth = 0;
		$pressmoz_external_links = 0;
		foreach ( $pressmoz_array as $pressmoz_item => $pressmoz_value ) {
			if($pressmoz_item == 'umrp') {
				$pressmoz_mozrank = $pressmoz_value;
			}
			if($pressmoz_item == 'pda') {
				$pressmoz_domain_auth = $pressmoz_value;
			}
			if($pressmoz_item == 'ueid') {
				$pressmoz_external_links = $pressmoz_value;
			}
			
		}
		
		$pressmoz_metrics = get_transient( 'presstrends_seo_metrics' );
		if(!$pressmoz_metrics) {
			$pressmoz_metrics = array($pressmoz_mozrank,$pressmoz_domain_auth,$pressmoz_external_links);
			set_transient( 'presstrends_seo_metrics', $pressmoz_metrics, 60*60*24 );
		}
		
		
		// Social
		require_once '_inc/pressocial.php';
		$social_response = wp_remote_get( $social_requestUrl, array('timeout'=>300));	
		$social_body = wp_remote_retrieve_body( $social_response );
		$social_array = json_decode($social_body, TRUE);
		
		$social_facebook = $social_array["Facebook"]["like_count"];
		$social_twitter = $social_array["Twitter"];
		$social_google = $social_array["GooglePlusOne"];
		$social_pinterest = $social_array["Pinterest"];
		$social_linkedin = $social_array["LinkedIn"];

		$site_goal = 0;
		
		if($this->get_option( 'goal' ) == 'readers') {
			$site_goal = 1;
		}
		if($this->get_option( 'goal' ) == 'ads') {
			$site_goal = 2;
		}
		if($this->get_option( 'goal' ) == 'sales') {
			$site_goal = 3;
		}
		
		
		
		// SEND DATA TO PRESSTRENDS
		$this->get_data( $category_sum, $pingback_result, $site_category, $comments_to_posts, $approved_percentage, $spam_percentage, $reply_percentage, $post_timeline, $comment_timeline, $first_post, $uniques_timeline, $monthly_visits, $monthly_bounce_rate, $monthly_pages_visited, $monthly_load_time, $pressmoz_mozrank, $pressmoz_domain_auth, $pressmoz_external_links, $monthly_visitors, $avg_time_btw_comments, $avg_time_btw_posts, $monthly_comments, $visitor_to_comment_conversion, $social_facebook, $social_twitter, $social_google, $social_pinterest, $social_linkedin, $site_key, $site_goal, $revenue, $completed_orders, $cart_checkout_conversion, $avg_time_btw_checkout, $visitor_to_checkout_conversion);



		// GET BENCHMARKS
		$globals = get_transient( 'presstrends_global_stats' );
		$globals_category = get_transient( 'presstrends_global_stats_category' );

		if ( !$globals || $globals_category != $this->get_option( 'category' ) ) {
			$globals = array();
			$globals_category = $this->get_option( 'category' );
			$global_response = wp_remote_get( 'http://api.presstrends.io/index.php/api/plugins/plugin/api/oqvdqoan02pb4ovzuw4ddrh61bm4ec1agskf/category/' . $this->get_option( 'category' ) . "/", array('timeout'=>400));
			if ( is_wp_error( $global_response ) ) {
				$error_string = $global_response->get_error_message();
				// To do: format this better
				_e( 'Oops. Looks like we&#8217;re out to lunch. Global stats are currently <strong>unavailable</strong>.', 'presstrends' );
			} else {
				$global_body = wp_remote_retrieve_body( $global_response );
				$global_data = new SimpleXMLElement( $global_body );

				// Get averages from xml response
				$globals['global_posts']        		= (string) $global_data->posts;
				$globals['category_posts']      		= (string) $global_data->category_posts;
				$globals['global_comments']     		= (string) $global_data->comments;
				$globals['category_comments']   		= (string) $global_data->category_comments;
				$globals['global_spam']         		= (string) $global_data->spam;
				$globals['category_spam']       		= (string) $global_data->category_spam;
				$globals['global_plugins']      		= (string) $global_data->plugins;
				$globals['global_categories']   		= (string) $global_data->categories;
				$globals['category_categories'] 		= (string) $global_data->category_categories;
				$globals['global_pingbacks']    		= (string) $global_data->pingbacks;
				$globals['category_pingbacks']  		= (string) $global_data->category_pingbacks;
				$globals['global_conversion']   		= (string) $global_data->post_conversion;
				$globals['category_conversion'] 		= (string) $global_data->category_post_conversion;
				$globals['global_approved']     		= (string) $global_data->approved;
				$globals['category_approved']   		= (string) $global_data->category_approved;
				$globals['global_replies']      		= (string) $global_data->reply;
				$globals['category_replies']    		= (string) $global_data->category_reply;
				$globals['global_top_theme']    		= (string) $global_data->top_theme;
				$globals['global_second_theme'] 		= (string) $global_data->second_theme;
				$globals['global_third_theme']  		= (string) $global_data->third_theme;
				$globals['cat_jan_posts']  				= (string) $global_data->avg_jan_post_timeline;
				$globals['cat_feb_posts']  				= (string) $global_data->avg_feb_post_timeline;
				$globals['cat_march_posts']  			= (string) $global_data->avg_march_post_timeline;
				$globals['cat_april_posts']  			= (string) $global_data->avg_april_post_timeline;
				$globals['cat_may_posts']  				= (string) $global_data->avg_may_post_timeline;
				$globals['cat_june_posts']  			= (string) $global_data->avg_june_post_timeline;
				$globals['cat_july_posts']  			= (string) $global_data->avg_july_post_timeline;
				$globals['cat_aug_posts']  				= (string) $global_data->avg_aug_post_timeline;
				$globals['cat_sept_posts']  			= (string) $global_data->avg_sept_post_timeline;
				$globals['cat_oct_posts']  				= (string) $global_data->avg_oct_post_timeline;
				$globals['cat_nov_posts']  				= (string) $global_data->avg_nov_post_timeline;
				$globals['cat_dec_posts']  				= (string) $global_data->avg_dec_post_timeline;
				$globals['cat_jan_comments']  			= (string) $global_data->avg_jan_comment_timeline;
				$globals['cat_feb_comments']  			= (string) $global_data->avg_feb_comment_timeline;
				$globals['cat_march_comments']  		= (string) $global_data->avg_march_comment_timeline;
				$globals['cat_april_comments']  		= (string) $global_data->avg_april_comment_timeline;
				$globals['cat_may_comments']  			= (string) $global_data->avg_may_comment_timeline;
				$globals['cat_june_comments']  			= (string) $global_data->avg_june_comment_timeline;
				$globals['cat_july_comments']  			= (string) $global_data->avg_july_comment_timeline;
				$globals['cat_aug_comments']  			= (string) $global_data->avg_aug_comment_timeline;
				$globals['cat_sept_comments']  			= (string) $global_data->avg_sept_comment_timeline;
				$globals['cat_oct_comments']  			= (string) $global_data->avg_oct_comment_timeline;
				$globals['cat_nov_comments']  			= (string) $global_data->avg_nov_comment_timeline;
				$globals['cat_dec_comments']  			= (string) $global_data->avg_dec_comment_timeline;
				$globals['cat_between_posts']  			= (string) $global_data->cat_between_posts;
				$globals['cat_between_comments']  		= (string) $global_data->cat_between_comments;
				$globals['cat_mozrank']  				= (string) $global_data->cat_mozrank;
				$globals['cat_domain_authority']  		= (string) $global_data->cat_domain_authority;
				$globals['cat_external_links']  		= (string) $global_data->cat_external_links;
				$globals['cat_facebook']  				= (string) $global_data->cat_facebook;
				$globals['cat_twitter']  				= (string) $global_data->cat_twitter;
				$globals['cat_google']  				= (string) $global_data->cat_google;
				$globals['cat_pinterest']  				= (string) $global_data->cat_pinterest;
				$globals['cat_linkedin']  				= (string) $global_data->cat_linkedin;
				$globals['spam_theme'] 					= (string) $global_data->spam_theme;
				$globals['cat_sale_revenue'] 			= (string) $global_data->sale_revenue;
				$globals['cat_monthly_sales'] 			= (string) $global_data->monthly_sales;
				$globals['cat_cart_checkout'] 			= (string) $global_data->cart_checkout;
				$globals['cat_between_sales'] 			= (string) $global_data->between_sales;
				
				if(isset($ga)){
				
				$globals['cat_jan_visitor']  			= (string) $global_data->avg_jan_visitor_timeline;
				$globals['cat_feb_visitor']  			= (string) $global_data->avg_feb_visitor_timeline;
				$globals['cat_march_visitor']   		= (string) $global_data->avg_march_visitor_timeline;
				$globals['cat_april_visitor']   		= (string) $global_data->avg_april_visitor_timeline;
				$globals['cat_may_visitor']  			= (string) $global_data->avg_may_visitor_timeline;
				$globals['cat_june_visitor']  			= (string) $global_data->avg_june_visitor_timeline;
				$globals['cat_july_visitor']  			= (string) $global_data->avg_july_visitor_timeline;
				$globals['cat_aug_visitor']  			= (string) $global_data->avg_aug_visitor_timeline;
				$globals['cat_sept_visitor']  			= (string) $global_data->avg_sept_visitor_timeline;
				$globals['cat_oct_visitor']  			= (string) $global_data->avg_oct_visitor_timeline;
				$globals['cat_nov_visitor']  			= (string) $global_data->avg_nov_visitor_timeline;
				$globals['cat_dec_visitor']  			= (string) $global_data->avg_dec_visitor_timeline;
				$globals['category_avg_visits'] 		= (string) $global_data->cat_avg_visits;
				$globals['global_avg_visits']   		= (string) $global_data->global_avg_visits;
				$globals['category_avg_bounce'] 		= (string) $global_data->cat_avg_bounce;
				$globals['global_avg_bounce']   		= (string) $global_data->global_avg_bounce;
				$globals['category_avg_pages_visited']  = (string) $global_data->cat_avg_pages_visited;
				$globals['global_avg_pages_visited']    = (string) $global_data->global_avg_pages_visited;
				$globals['category_avg_load'] 			= (string) $global_data->cat_avg_load;
				$globals['global_avg_load']   			= (string) $global_data->global_avg_load;
				$globals['cat_avg_visitors'] 			= (string) $global_data->cat_avg_visitors;
				$globals['visitor_comment_conversion'] 	= (string) $global_data->visitor_conversion;
				$globals['visitor_theme'] 				= (string) $global_data->visitor_theme;
				$globals['load_theme'] 					= (string) $global_data->load_theme;
				$globals['bounce_theme'] 				= (string) $global_data->bounce_theme;
				$globals['cat_visitor_checkout'] 		= (string) $global_data->visitor_checkout;
				
				}
				
				
				$globals['presstrends_version'] 		= (string) $global_data->current_version;
				$globals['upgrade_message']     		= (string) $global_data->upgrade_message;
			}
			set_transient( 'presstrends_global_stats', $globals, 60*60*24 );
			set_transient( 'presstrends_global_stats_category', $globals_category, 60*60*24 );
		}

		if ( $globals )
			extract( $globals, EXTR_SKIP );
			
		?>
		
		<div class="presstrends wrap" style="padding-bottom:15px;">
				
				<h2 class="dummy"></h2>
				<div class="logo">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
				</div>
		
				<div class="clear"></div>
				
				<?php
				// GET CURRENT GOAL
				$current_goal = $this->get_option( 'goal' );
				?>
				
				<?php
				// START OF "READERS" GOAL
				if($current_goal == 'readers') { 
				?>
				
				<div class="intro">
					<h2 style="font-size:20px;">Your current goal is <strong>to have a solid community of engaged readers</strong>. There are only three metrics that define your success and these are your critical metrics. These should be your primary focus for improvement.</h2>				
				</div>
				
				<?php } // END OF "READERS" GOAL ?>

				<?php
				// START OF "ADS" GOAL
				if($current_goal == 'ads') { 
				?>
				
				<div class="intro">
					<h2 style="font-size:20px;">Your current goal is <strong>to support advertising through impressions and clicks</strong>. There are only three metrics that define your success and these are your critical metrics. These should be your primary focus for improvement.</h2>				
				</div>
				
				<?php } // END OF "ADS" GOAL ?>
				
				<?php
				// START OF "ADS" GOAL
				if($current_goal == 'sales') { 
				?>
				
				<div class="intro">
					<h2 style="font-size:20px;">Your current goal is <strong>to turn visitors into customers through the purchase of products</strong>. There are only three metrics that define your success and these are your critical metrics. These should be your primary focus for improvement.</h2>				
				</div>
				
				<?php } // END OF "ADS" GOAL ?>
				
				<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>
		
				<?php $this->upgrade( $presstrends_version, $upgrade_message ); ?>
		
		
		<?php
		if($this->get_option( 'api_key' ) == '') {
		?>
			
			<p style="padding:0px 0px 20px 0px;">
				<a href="http://www.presstrends.me/pricing" class="green-button">Upgrade</a>
				<span style="color:#999;font-size:15px;padding-top:9px;float:left;">for Social &amp; WooCommerce metrics, benchmarks, suggestions + metric correlations</span>
			</p>
			
			<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>
			
		<?php } ?>
		
				
				
		<?php 
		// GET GOAL INFO
		include_once("_inc/goals.php"); 
		?>
		
		<div class="intro">
			<h2 style="font-size:20px;">Your secondary metrics influence your critical metrics, but do not necessarily measure your success. You can use these metrics to <strong>find correlations</strong> and areas in need of improvement. <a href="https://twitter.com/share?text=Loving%20the%20metrics%2C%20suggestions%2C%20and%20benchmarks%20from%20%40prstrends&url=http://www.presstrends.me" target="_blank">Share the love</a>.</h2>				
		</div>
		
		<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>
		
		<?php if ( $this->get_option( 'ga_profile' ) ) { ?>

			<h2>Secondary Metrics <span style="font-size:13px;"> with </span><span style="font-size:13px;color:#7B5FA1;"><?php printf( __( 'Benchmarks for <b>%s</b> WordPress Sites', 'presstrends' ), esc_html( $this->get_option( 'category' ) ) ); ?></span></h2>
			
			<?php 
			// GET GA SECTION
			include_once("_inc/ga.php"); 
			?>

		<?php } else { ?>
			
			<h2>Secondary Metrics <span style="font-size:13px;"> with </span><span style="font-size:13px;color:#7B5FA1;"><?php printf( __( 'Benchmarks for <b>%s</b> WordPress Sites', 'presstrends' ), esc_html( $this->get_option( 'category' ) ) ); ?></span></h2>
		
		<?php } ?>
		
		<?php 
		if(is_plugin_active('woocommerce/woocommerce.php') && $this->get_option( 'api_key' ) != '') {
			include_once("_inc/woo.php");
		}
		?>
		
		<?php 
		// GET POST, COMMENT, & SEO SECTIONS
		include_once("_inc/posts.php"); 
		include_once("_inc/comments.php");
		include_once("_inc/seo.php");
		?>
		
		<?php
		if($this->get_option( 'api_key' ) != '') { 
			include_once("_inc/social.php");
		}
		?>

		<div class="clear"></div>

	</div><!-- end narrow -->

	<?php
		}
	}
	
	
	public function display_suggestions() {
		
		if ( !$this->get_option( 'category' ) || !$this->get_option( 'goal' ) || !$this->get_option( 'ga_profile' )) { ?>
			
			<div class="presstrends wrap">
				<h2 class="dummy"></h2>
				<div class="logo">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
				</div>
		
				<div class="intro">
						<p><?php _e( '<strong>PressTrends</strong> helps you understand how your site is performing by identifying your critical metrics with benchmarks and offering suggestions on how to improve. <a href="http://www.presstrends.me" target="_blank">Learn more &raquo;</a>', 'presstrends' ); ?></p>
				</div>
				
				<div class="clear"></div>
				<div class="hr" style="margin-top:5px;"></div>
			
			<div class="clear"></div>
				<p><?php printf( __( '<b>To get started</b>, please <a href="%s">update your PressTrends settings</a>. Experiencing issues or have questions? <a href="http://www.presstrends.me/support" target="_blank" title="PressTrends Support">We offer free support</a>', 'presstrends' ), admin_url( 'admin.php?page=presstrends_settings' ) ); ?></p>
				
		<?php } else { ?>
		
			<div class="presstrends wrap" style="padding-bottom:15px;">
				<h2 class="dummy"></h2>
				<div class="logo">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
				</div>
		
				<div class="clear"></div>
				
				<div class="intro">
				<?php echo '<h2 style="font-size:20px;">' . __( 'Here are some steps you can take to <strong>improve your site</strong> based on your metrics. Knowing your metrics and where you stand is great, knowing what to do is even better. <a href="https://twitter.com/share?text=Loving%20the%20metrics%2C%20suggestions%2C%20and%20benchmarks%20from%20%40prstrends&url=http://www.presstrends.me" target="_blank">Share the love</a>.', 'presstrends' ) . '</h2>'; ?>
				</div>
				
				<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>

							
			<?php 
			global $wpdb;
			include_once("_inc/core.php");
			include('_inc/suggestions.php'); 
			?>
			
			<div class="clear"></div>
			</div><!-- end narrow -->
			
	<?php
		}
	}
	
	
	
	public function display_authors() {
		if ( !$this->get_option( 'category' ) || !$this->get_option( 'goal' ) || !$this->get_option( 'ga_profile' )) { ?>
			
			<div class="presstrends wrap">
				<h2 class="dummy"></h2>
				<div class="logo">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
				</div>
		
				<div class="intro">
						<p><?php _e( '<strong>PressTrends</strong> helps you understand how your site is performing by identifying your critical metrics with benchmarks and offering suggestions on how to improve. <a href="http://www.presstrends.me" target="_blank">Learn more &raquo;</a>', 'presstrends' ); ?></p>
				</div>
				
				<div class="clear"></div>
				<div class="hr" style="margin-top:5px;"></div>
			
			<div class="clear"></div>
				<p><?php printf( __( '<b>To get started</b>, please <a href="%s">update your PressTrends settings</a>. Experiencing issues or have questions? <a href="http://www.presstrends.me/support" target="_blank" title="PressTrends Support">We offer free support</a>', 'presstrends' ), admin_url( 'admin.php?page=presstrends_settings' ) ); ?></p>
				
		<?php } else { ?>
		
			<div class="presstrends wrap" style="padding-bottom:15px;">
				<h2 class="dummy"></h2>
				<div class="logo">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/logo.png" alt="<?php esc_attr_e( 'PressTrends', 'presstrends' ); ?>" border="0" />
				</div>
		
				<div class="clear"></div>
				
				<div class="intro">
				<?php echo '<h2 style="font-size:20px;">' . __( 'Know which authors and writing styles help bring <strong>engagement</strong> to your site and influence your critical metrics. <a href="http://www.presstrends.me/support" target="_blank" title="PressTrends Support">What other metrics would you like to see here?</a>', 'presstrends' ) . '</h2>'; ?>
				</div>
				
				<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>

				
				<?php
				// Get current authors and their stats
				global $wpdb;
				$count_posts = wp_count_posts();
				$authors = $wpdb->get_results( "SELECT * FROM $wpdb->users" );
				foreach ( $authors as $author ) {
					
					// Comment Conversion
					$author_post_count = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_author = %d AND post_status = 'publish'", $author->ID ) );
					$author_posts_with_comments = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND comment_count > 0 AND post_author = %d AND post_status = 'publish'", $author->ID ) );
					$author_conversion = @number_format( ( $author_posts_with_comments / $author_post_count ) * 100, 0, '.', '');
					
					$posts = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_author = %d", $author->ID ) );
					
					if ( $posts ) { ?>
						
						<div style="float:left;width:64px;margin:17px 20px 0px 0px;">
							<?php echo get_avatar( $author->user_email, 64 ); ?>
							<span style="font-size:10px;color:#777;"><?php echo esc_html( $author->display_name ); ?></span>
						</div>
						<!-- POSTS -->
						<div class="metric">
							<div class="site" style="padding:5px 10px 10px 10px;">
								<h2><?php echo absint( $author_post_count ); ?></h2>
								<span class="label"><?php echo _n( 'post', 'posts', absint( $author_post_count ), 'presstrends' ); ?></span>
							</div>
						</div>
						<div class="metric" style="margin-top:35px;">
							<div class="site" style="padding:10px;text-align:center;">
								<h2 style="font-size:12px;color:#777;"><?php _e( 'with a', 'presstrends' ); ?></h2>
							</div>
						</div>
						<!-- POST CONVERSION -->
						<div class="metric">
							<div class="site" style="padding:5px 10px 10px 10px;">
								<h2><?php echo absint( $author_conversion ); ?>%</h2>
								<span class="label"><?php _e( 'post-to-comment conversion', 'presstrends' ); ?></span>
							</div>
						</div>
						
					<?php } ?>

					<div class="clear"></div>
					
				<?php } ?>

				<div class="clear"></div>
			</div><!-- end narrow -->
	<?php
		}
	}
	
		
}

// Bootstrap everything
new PressTrendsPlugin;