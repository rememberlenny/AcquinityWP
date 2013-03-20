<?php
// GET CURRENT GOAL & TRANSIENT DATA
$current_goal 				= $this->get_option( 'goal' );
$data 						= get_transient( 'presstrends_data' );
$globals 					= get_transient( 'presstrends_global_stats' );
$google 					= $data['google'];
$comments_to_posts 			= $data['post_conversion'];
$visitor_conversion 		= $data['visitor_comment_conversion'];
$current_theme_name 		= $data['theme_name'];
$spam	 					= $data['spam_percentage'];
$load_time 					= $data['monthly_load_time'];
$bounce_rate 				= $data['monthly_bounce_rate'];
$sale_revenue 				= $data['sale_revenue'];
$monthly_sales 				= $data['monthly_sales'];
$cart_checkout 				= $data['cart_checkout'];
$between_sales 				= $data['between_sales'];
$visitor_checkout 			= $data['visitor_checkout'];
$cat_visitor_conversion 	= $globals['visitor_comment_conversion'];
$visitor_theme 				= $globals['visitor_theme'];
$load_theme 				= $globals['load_theme'];
$bounce_theme 				= $globals['bounce_theme'];
$spam_theme 				= $globals['spam_theme'];
$cat_bounce_rate 			= $globals['category_avg_bounce'];
$cat_avg_load 				= $globals['category_avg_load'];
$cat_spam 					= $globals['category_spam'];
$category_conversion 		= $globals['category_conversion'];
$cat_google 				= $globals['cat_google'];
$cat_sale_revenue 			= $globals['cat_sale_revenue'];
$cat_monthly_sales 			= $globals['cat_monthly_sales'];
$cat_cart_checkout 			= $globals['cat_cart_checkout'];
$cat_between_sales 			= $globals['cat_between_sales'];
$cat_visitor_checkout 		= $globals['cat_visitor_checkout'];
?>

<?php
if($this->get_option( 'api_key' ) == '') {
?>
	
	<p style="padding:0px 0px 20px 0px;">
		<a href="http://www.presstrends.me/pricing" class="green-button">Upgrade</a>
		<span style="color:#999;font-size:15px;padding-top:9px;float:left;">for additional Suggestions and Social &amp; WooCommerce metrics</span>
	</p>
	
	<div class="clear"></div><div class="hr" style="margin-top:25px;"></div><div class="clear"></div>
	
<?php } ?>


<?php
// START OF "READERS" GOAL
if($current_goal == 'readers' || $current_goal == 'ads') { 
?>
	
<ul class="suggestions">	

	<?php
	// publish more frequently suggestion
	$avg_time_btw_posts_days = floor ($avg_time_btw_posts / 86400);
	if($avg_time_btw_posts_days > 1) { 
	?>
						
		<li><span>Publishing:</span> <strong>Publish content at least once per day.</strong>
			<p>You're currently publishing content, on average, every <?php echo $avg_time_btw_posts_days . ' days'; ?>. People want fresh content to consume and as you publish more frequently, you will see an increase in your metrics.</p>
		</li>
	
	<?php } // end publish more frequently suggestion ?>

		<!-- WHEN TO PUBLISH SUGGESTION -->
		<?php if($comments_count->approved > 0) { ?>
		
		<li><span>Publishing:</span> <strong>Publish content around <?php
				foreach ( $hour_result as $hours ) 
				{
					$true_hour = $hours->h.':00';
					echo '<strong>' . date('ga',strtotime($true_hour)) . '</strong>';
				}
			?> on <?php
				foreach ( $day_result as $days ) 
				{
					echo '<strong>' . $days->h . '</strong>';
				}
			?>.</strong>
			<p>Currently, your most popular hour for comments is 
			<?php
				foreach ( $hour_result as $hours ) 
				{
					$true_hour = $hours->h.':00';
					echo '' . date('ga',strtotime($true_hour)) . '';
				}
			?>	
			and your most popular day for comments is 
			<?php
				foreach ( $day_result as $days ) 
				{
					echo '' . $days->h . '.';
				}
			?>
			Publishing content during these times may increase your post conversions &amp; overall comment metrics.</p>
			</li>
		
		<?php } ?>
	
	
	<?php
	if (!is_plugin_active('subscribe-to-comments/subscribe-to-comments.php') && $comments_to_posts < $category_conversion) {
	?>					      
		<li><span>Comments:</span> <strong>Allow for Comment Notifications.</strong>
			<p>Your post conversion is <?php echo $comments_to_posts; ?>%. You need to build a better comment experience. Try allowing people to receive notifications about follow-up comments via email. Try using <a href="http://wordpress.org/extend/plugins/subscribe-to-comments/" target="_blank" title="Subscribe to Comments" style="color:#777;text-decoration:none;"><span style="background:#fffee8;">Subscribe to Comments</span></a>.
			</p>
		</li>
						      
	<?php } ?>
	<?php
	if ($visitor_conversion < $cat_visitor_conversion && $current_theme_name != $visitor_theme && $visitor_theme != 'none' && $visitor_theme != '') {
	?>
		<li><span>Comments:</span> <strong>Try the <?php echo $visitor_theme; ?> theme for higher visitor-to-comment conversions.</strong>
			<p>Your visitor conversion is <?php echo $visitor_conversion; ?>%, which is below the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $visitor_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $visitor_theme; ?></span></a> theme as sites using this theme traditionally have the highest visitor conversions in your category.
			</p>
		</li>
	<?php } ?>
	
	<?php
	if ($spam > $cat_spam && $current_theme_name != $spam_theme && $spam_theme != 'none' && $spam_theme != '') {
	?>
		<li><span>Spam:</span> <strong>Try the <?php echo $spam_theme; ?> theme to lower your spam percentage.</strong>
			<p>Your spam percentage is <?php echo $spam; ?>%, which is higher than the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $spam_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $spam_theme; ?></span></a> theme as sites using this theme traditionally have the lowest spam percentages in your category.
			</p>
		</li>
	<?php } ?>

	<?php
	$pressmoz_metrics = get_transient( 'presstrends_seo_metrics' );
	if($pressmoz_metrics != '') {
		$pressmoz_domain_auth = $pressmoz_metrics[1];
		$pressmoz_external_links = $pressmoz_metrics[2];
	?>
	
	<li><span>SEO:</span> <strong>Write more guest posts.</strong>
		<p>Your current Domain Authority is <?php echo number_format($pressmoz_domain_auth); ?> with <?php echo $pressmoz_external_links; ?> external links. Writing a guest post on <a href="http://www.google.com/search?q=top+<?php echo $this->get_option( 'category' ); ?>+blogs" target="_blank"><span>these sites</span></a> or similar sites will help your SEO metrics as well as your overall metrics.
		</p>
	</li>
	
	<?php } else { ?>
	
	<li><span>SEO:</span> <strong>Write more guest posts.</strong>
		<p>Writing a guest post on <a href="http://www.google.com/search?q=top+<?php echo $this->get_option( 'category' ); ?>+blogs"><span>these sites</span></a> or similar sites will help your SEO metrics as well as your overall metrics.
		</p>
	</li>
	
	<?php } ?>
	
	<?php
	// social plugin suggestion
	if (!is_plugin_active('digg-digg/digg-digg.php') || !is_plugin_active('getsocial/getsocial.php') || !is_plugin_active('addthis/addthis_social_widget.php')) {
	?>
						      
		<li><span>Social:</span> <strong>Make it easy for people to share your content.</strong> 
			<p>Try using <a href="http://wordpress.org/extend/plugins/digg-digg/" target="_blank" title="Digg Digg" style="color:#777;text-decoration:none;"><span>Digg Digg</span></a> by Buffer, <a href="http://wordpress.org/extend/plugins/getsocial/" target="_blank" title="GetSocial" style="color:#777;text-decoration:none;"><span>GetSocial</span></a>, or <a href="http://wordpress.org/extend/plugins/addthis/" target="_blank" title="AddThis" style="color:#777;text-decoration:none;"><span>AddThis</span></a> to help people share your content. This will help drive an increase in your visitor and social metrics.</p>
		</li>
						      
	<?php } // end social plugin suggestion ?>

<?php
if($this->get_option( 'api_key' ) != '') { 
	

	if ($load_time > $cat_avg_load && $current_theme_name != $load_theme && $load_theme != 'none' && $load_theme != '') {
	?>
		<li><span>Performance:</span> <strong>Try the <?php echo $load_theme; ?> theme to lower your average load time.</strong>
			<p>Your average load time is <?php echo $load_time; ?> seconds, which is higher than the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $load_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $load_theme; ?></span></a> theme as sites using this theme traditionally have the lowest average load time in your category.
			</p>
		</li>
	<?php } ?>
	
	<?php
	if ($load_time > $cat_avg_load && !is_plugin_active('w3-total-cache/w3-total-cache.php')) {
	?>
		<li><span>Performance:</span> <strong>Utilize improved page caching.</strong>
			<p>Your average load time is <?php echo number_format($load_time); ?> seconds, which is higher than the benchmark for your category. Try using <a href="http://wordpress.org/extend/plugins/w3-total-cache/" target="_blank" title="W3 Total Cache" style="color:#777;text-decoration:none;"><span>W3 Total Cache</span></a> to help lower your average page load with improved page caching.</p>
		</li>
	<?php } ?>
	
	<?php
	if ($bounce_rate > $cat_bounce_rate && $current_theme_name != $bounce_theme && $bounce_theme != 'none' && $bounce_theme != '') {
	?>
		<li><span>Performance:</span> <strong>Try the <?php echo $bounce_theme; ?> theme to lower your average load time.</strong>
			<p>Your bounce rate is <?php echo number_format($bounce_rate); ?>%, which is higher than the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $bounce_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $bounce_theme; ?></span></a> theme as sites using this theme traditionally have the lowest bounce rate in your category.
			</p>
		</li>
	<?php } ?>
	
	<?php
	if ($bounce_rate > $cat_bounce_rate) {
	?>
		<li><span>Content:</span> <strong>Utilize your sidebar with links to your most valuable content.</strong>
			<p>Your bounce rate is <?php echo number_format($bounce_rate); ?>%, which is higher than the benchmark for your category. Try utilizing a sidebar with links to valuable and popular content to guide users through your site. Also, try improving your content suggestions with a related posts plugin, such as <a href="http://wordpress.org/extend/plugins/yet-another-related-posts-plugin/" target="_blank" title="W3 Total Cache" style="color:#777;text-decoration:none;"><span>Yet Another Related Posts Plugin</span></a>.</p>
		</li>
	<?php } ?>
	
	<?php
	if ($google < $cat_google) {
	?>
		<li><span>Social:</span> <strong>Focus more attention to Google+ as Google+ dominates search results.</strong>
			<p>Your Google+ shares are <?php echo $google; ?>, which is lower than the benchmark for your category. Try embedding post links into Google+ as well as connecting with influencers to share your content.</p>
		</li>
	<?php } ?>
	
	</ul>
	
<?php
}}
?>




<?php
// START OF "READERS" GOAL
if($current_goal == 'sales') { 
?>

<ul class="suggestions">	

	<?php // Let's dive a bit deeper into how this store is setup and offer suggestions for improvement
	$total_products 			= $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'product'");
	$total_coupons 				= $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'shop_coupon'");
	$g 							= 0; 
	global $woocommerce;
	$currency = get_woocommerce_currency_symbol( $currency = '' );
	foreach ( $woocommerce->payment_gateways->payment_gateways() as $gateway ) {
		if ( $gateway->enabled == 'yes' ) {
			$g++;
		}
	}	        	
	?>
	
	<?php if ($total_products < 2) { ?>
	<?php if($sale_revenue == '') { $sale_revenue = '0';} ?>
	<li><span>Products:</span> <strong>Offer customers additional core or complementary products.</strong>
		<p>Your average sale is <?php echo ''.$currency.''.$sale_revenue; ?>. The option to choose complementary products alongside your core products gives customers more comfort in an established shop. It can also help drive additional sales and help support your overall product fit. If you don't have additional products, try using affiliate products with these extensions and services: <a href="http://www.woothemes.com/product-category/woocommerce-extensions/?s=affiliate&post_type=product&min_price=0&max_price=99&prod_country=0" target="_blank"><span>WooCommerce Affiliate Extensions</span></a>, <a href="https://affiliate-program.amazon.com/" target="_blank"><span>Amazon Associates</span></a></p>
	</li>
	<?php } ?>
	
	<?php if ($g < 4) { ?>
	<li><span>Checkout:</span> <strong>Offer customers additional payment options.</strong>
		<p>Your cart to checkout conversion is <?php echo $cart_checkout; ?>%. Customers like the flexibility that is offered by multiple payment options. Additionally, you may see an increase in sales as you offer more payment options and extend your customer base. Try these payment options: <a href="http://www.woothemes.com/product-category/woocommerce-extensions/?prod_cat%5B%5D=1023&s=&post_type=product&min_price=0&max_price=99&post_type=product&prod_country=0" target="_blank"><span>WooCommerce Payment Gateway Extensions</span></a></p>
	</li>
	<?php } ?>
	
	<?php if ($total_coupons < 1) { ?>
	<li><span>Coupons:</span> <strong>Use coupons to influence customers and drive sales.</strong>
		<p>Everyone loves a little savings. Use coupons to help convert visitors into customers and drive further sales. <a href="<?php echo admin_url( 'edit.php?post_type=shop_coupon' ); ?>"><span>Create your first coupon.</span></a></p>
	</li>
	<?php } ?>
	
	<?php if ($visitor_checkout < $cat_visitor_checkout) { ?>
	<li><span>Checkout:</span> <strong>Minimize the number of clicks to checkout.</strong>
		<p>Your visitor to checkout conversion is <?php echo $visitor_checkout; ?>%, which is less than the benchmark for for category. Focus on driving visitors into product pages and minimizing the clicks to checkout.</p>
	</li>
	<?php } ?>

	<?php if ($visitor_checkout < $cat_visitor_checkout) { ?>
	<li><span>Visitors:</span> <strong>Drive more targeted visitors to your site.</strong>
		<p>Your visitor to checkout conversion is <?php echo $visitor_checkout; ?>%, which is less than the benchmark for for category. You many not be getting the right visitors to your site. Focus your SEO strategy to align more closely with your products and create more content centered around your products.</p>
	</li>
	<?php } ?>

	<?php
	// publish more frequently suggestion
	$avg_time_btw_posts_days = floor ($avg_time_btw_posts / 86400);
	if($avg_time_btw_posts_days > 1) { 
	?>
						
		<li><span>Publishing:</span> <strong>Publish content at least once per day.</strong>
			<p>You're currently publishing content, on average, every <?php echo $avg_time_btw_posts_days . ' days'; ?>. People want fresh content to consume and as you publish more frequently, you will see an increase in your metrics.</p>
		</li>
	
	<?php } // end publish more frequently suggestion ?>
	
	
	
		
		
		<!-- WHEN TO PUBLISH SUGGESTION -->
		<?php if($comments_count->approved > 0) { ?>
		
		<li><span>Publishing:</span> <strong>Publish content around <?php
				foreach ( $hour_result as $hours ) 
				{
					$true_hour = $hours->h.':00';
					echo '<strong>' . date('ga',strtotime($true_hour)) . '</strong>';
				}
			?> on <?php
				foreach ( $day_result as $days ) 
				{
					echo '<strong>' . $days->h . '</strong>';
				}
			?>.</strong>
			<p>Currently, your most popular hour for comments is 
			<?php
				foreach ( $hour_result as $hours ) 
				{
					$true_hour = $hours->h.':00';
					echo '' . date('ga',strtotime($true_hour)) . '';
				}
			?>	
			and your most popular day for comments is 
			<?php
				foreach ( $day_result as $days ) 
				{
					echo '' . $days->h . '.';
				}
			?>
			Publishing content during these times may increase your post conversions &amp; overall comment metrics.</p>
			</li>
		
		<?php } ?>
	
	
	<?php
	if (!is_plugin_active('subscribe-to-comments/subscribe-to-comments.php') && $comments_to_posts < $category_conversion) {
	?>					      
		<li><span>Comments:</span> <strong>Allow for Comment Notifications.</strong>
			<p>Your post conversion is <?php echo $comments_to_posts; ?>%. You need to build a better comment experience. Try allowing people to receive notifications about follow-up comments via email. Try using <a href="http://wordpress.org/extend/plugins/subscribe-to-comments/" target="_blank" title="Subscribe to Comments" style="color:#777;text-decoration:none;"><span style="background:#fffee8;">Subscribe to Comments</span></a>.
			</p>
		</li>
						      
	<?php } ?>
	<?php
	if ($visitor_conversion < $cat_visitor_conversion && $current_theme_name != $visitor_theme && $visitor_theme != 'none' && $visitor_theme != '') {
	?>
		<li><span>Comments:</span> <strong>Try the <?php echo $visitor_theme; ?> theme for higher visitor-to-comment conversions.</strong>
			<p>Your visitor conversion is <?php echo $visitor_conversion; ?>%, which is below the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $visitor_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $visitor_theme; ?></span></a> theme as sites using this theme traditionally have the highest visitor conversions in your category.
			</p>
		</li>
	<?php } ?>
	
	<?php
	if ($spam > $cat_spam && $current_theme_name != $spam_theme && $spam_theme != 'none' && $spam_theme != '') {
	?>
		<li><span>Spam:</span> <strong>Try the <?php echo $spam_theme; ?> theme to lower your spam percentage.</strong>
			<p>Your spam percentage is <?php echo $spam; ?>%, which is higher than the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $spam_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $spam_theme; ?></span></a> theme as sites using this theme traditionally have the lowest spam percentages in your category.
			</p>
		</li>
	<?php } ?>

	<?php
	$pressmoz_metrics = get_transient( 'presstrends_seo_metrics' );
	if($pressmoz_metrics != '') {
		$pressmoz_domain_auth = $pressmoz_metrics[1];
		$pressmoz_external_links = $pressmoz_metrics[2];
	?>
	
	<li><span>SEO:</span> <strong>Write more guest posts.</strong>
		<p>Your current Domain Authority is <?php echo number_format($pressmoz_domain_auth); ?> with <?php echo $pressmoz_external_links; ?> external links. Writing a guest post on <a href="http://www.google.com/search?q=top+<?php echo $this->get_option( 'category' ); ?>+blogs" target="_blank"><span>these sites</span></a> or similar sites will help your SEO metrics as well as your overall metrics.
		</p>
	</li>
	
	<?php } else { ?>
	
	<li><span>SEO:</span> <strong>Write more guest posts.</strong>
		<p>Writing a guest post on <a href="http://www.google.com/search?q=top+<?php echo $this->get_option( 'category' ); ?>+blogs"><span>these sites</span></a> or similar sites will help your SEO metrics as well as your overall metrics.
		</p>
	</li>
	
	<?php } ?>
	
	<?php
	// social plugin suggestion
	if (!is_plugin_active('digg-digg/digg-digg.php') || !is_plugin_active('getsocial/getsocial.php') || !is_plugin_active('addthis/addthis_social_widget.php')) {
	?>
						      
		<li><span>Social:</span> <strong>Make it easy for people to share your content.</strong> 
			<p>Try using <a href="http://wordpress.org/extend/plugins/digg-digg/" target="_blank" title="Digg Digg" style="color:#777;text-decoration:none;"><span>Digg Digg</span></a> by Buffer, <a href="http://wordpress.org/extend/plugins/getsocial/" target="_blank" title="GetSocial" style="color:#777;text-decoration:none;"><span>GetSocial</span></a>, or <a href="http://wordpress.org/extend/plugins/addthis/" target="_blank" title="AddThis" style="color:#777;text-decoration:none;"><span>AddThis</span></a> to help people share your content. This will help drive an increase in your visitor and social metrics.</p>
		</li>
						      
	<?php } // end social plugin suggestion ?>


<?php
if($this->get_option( 'api_key' ) != '') { 
	

	if ($load_time > $cat_avg_load && $current_theme_name != $load_theme && $load_theme != 'none' && $load_theme != '') {
	?>
		<li><span>Performance:</span> <strong>Try the <?php echo $load_theme; ?> theme to lower your average load time.</strong>
			<p>Your average load time is <?php echo $load_time; ?> seconds, which is higher than the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $load_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $load_theme; ?></span></a> theme as sites using this theme traditionally have the lowest average load time in your category.
			</p>
		</li>
	<?php } ?>
	
	<?php
	if ($load_time > $cat_avg_load && !is_plugin_active('w3-total-cache/w3-total-cache.php')) {
	?>
		<li><span>Performance:</span> <strong>Utilize improved page caching.</strong>
			<p>Your average load time is <?php echo number_format($load_time); ?> seconds, which is higher than the benchmark for your category. Try using <a href="http://wordpress.org/extend/plugins/w3-total-cache/" target="_blank" title="W3 Total Cache" style="color:#777;text-decoration:none;"><span>W3 Total Cache</span></a> to help lower your average page load with improved page caching.</p>
		</li>
	<?php } ?>
	
	<?php
	if ($bounce_rate > $cat_bounce_rate && $current_theme_name != $bounce_theme && $bounce_theme != 'none' && $bounce_theme != '') {
	?>
		<li><span>Performance:</span> <strong>Try the <?php echo $bounce_theme; ?> theme to lower your average load time.</strong>
			<p>Your bounce rate is <?php echo number_format($bounce_rate); ?>%, which is higher than the benchmark for your category. Try switching to the <a href="http://www.google.com/search?q=<?php echo $bounce_theme; ?>+WordPress+Theme" target="_blank"><span><?php echo $bounce_theme; ?></span></a> theme as sites using this theme traditionally have the lowest bounce rate in your category.
			</p>
		</li>
	<?php } ?>
	
	<?php
	if ($bounce_rate > $cat_bounce_rate) {
	?>
		<li><span>Content:</span> <strong>Utilize your sidebar with links to your most valuable content.</strong>
			<p>Your bounce rate is <?php echo number_format($bounce_rate); ?>%, which is higher than the benchmark for your category. Try utilizing a sidebar with links to valuable and popular content to guide users through your site. Also, try improving your content suggestions with a related posts plugin, such as <a href="http://wordpress.org/extend/plugins/yet-another-related-posts-plugin/" target="_blank" title="W3 Total Cache" style="color:#777;text-decoration:none;"><span>Yet Another Related Posts Plugin</span></a>.</p>
		</li>
	<?php } ?>
	
	<?php
	if ($google < $cat_google) {
	?>
		<li><span>Social:</span> <strong>Focus more attention to Google+ as Google+ dominates search results.</strong>
			<p>Your Google+ shares are <?php echo $google; ?>, which is lower than the benchmark for your category. Try embedding post links into Google+ as well as connecting with influencers to share your content.</p>
		</li>
	<?php } ?>
	
	</ul>
	
<?php
}}
?>