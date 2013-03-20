<?php
$count_posts 	= wp_count_posts( 'post' );
$count_pages 	= wp_count_posts( 'pages' );
$comments_count = wp_count_comments();
$plugin_count 	= count( get_option( 'active_plugins' ) );

if(is_plugin_active('woocommerce/woocommerce.php')) {
	// WOO-TASTIC METRICS
	$orders = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'shop_order' AND post_status = 'publish'" );
	$completed_term = $wpdb->get_var( "SELECT term_id FROM $wpdb->terms WHERE name = 'completed'" );
	$order_totals = $wpdb->get_row("
		SELECT AVG(meta.meta_value) AS total_sales, COUNT(posts.ID) AS total_orders FROM {$wpdb->posts} AS posts

		LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
		LEFT JOIN {$wpdb->term_relationships} AS rel ON posts.ID=rel.object_ID
		LEFT JOIN {$wpdb->term_taxonomy} AS tax USING( term_taxonomy_id )
		LEFT JOIN {$wpdb->terms} AS term USING( term_id )

		WHERE 	meta.meta_key 		= '_order_total'
		AND 	posts.post_date		>= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)
		AND 	posts.post_type 	= 'shop_order'
		AND 	posts.post_status 	= 'publish'
		AND 	tax.taxonomy		= 'shop_order_status'
		AND		term.slug			IN ('" . implode( "','", apply_filters( 'woocommerce_reports_order_statuses', array( 'completed' ) ) ) . "')
	");

	$revenue 					= $order_totals->total_sales;
	if($revenue == '') {
	$revenue 					= '0';
	}
	$completed_orders 			= $order_totals->total_orders;
	if($completed_orders == '') {
	$completed_orders 			= '0';
	}
	$cart_checkout_conversion 	= @number_format( ( $completed_orders / $orders ) * 100, 0, '.', '' );
	$avg_time_btw_checkout 		= $wpdb->get_var("SELECT TIMESTAMPDIFF(SECOND, MIN(post_date), MAX(post_date)) / (COUNT(*)-1) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'shop_order'");
	if($avg_time_btw_checkout == '') {
	$avg_time_btw_checkout 		= '0';
	}

} else {
	$revenue 					= '0';
	$completed_orders 			= '0';
	$cart_checkout_conversion 	= '0';
	$avg_time_btw_checkout 		= '0';
}

// POST TO COMMENT CONVERSION
$posts_with_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND comment_count > 0" );
$comments_to_posts = @number_format( ( $posts_with_comments / $count_posts->publish ) * 100, 0, '.', '' );

// SPAM PERCENTAGE
$spam_percentage = @number_format( ( $comments_count->spam / $comments_count->total_comments ) * 100, 0, '.', '' );

// APPROVED PERCENTAGE
$approved_percentage = @number_format( ( $comments_count->approved / $comments_count->total_comments ) * 100, 0, '.', '');

// MONTHLY APPROVED COMMENTS
$monthly_comments = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_parent = '0' AND comment_date >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)");

// TOTAL REPLY COMMENTS
$replies = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_parent > 0 AND comment_approved = '1'" );
$reply_percentage = @number_format( ( $replies / $comments_count->total_comments ) * 100, 0, '.', '' );

// TOTAL CATEGORIES
$thecats = wp_list_categories( 'title_li=&style=none&echo=0' );
$splitcats = explode( '<br />', $thecats );
$category_sum = count( $splitcats ) - 1;

// TOTAL PINGBACKS
$pingback_result = $wpdb->get_var( "SELECT COUNT(comment_ID) FROM $wpdb->comments WHERE comment_type = 'pingback'" );
$pingback_percentage = @number_format( ( $pingback_result / $count_posts->publish ) * 100, 0, '.', '' );

// TOP COMMENT DAY
$day_result = $wpdb->get_results( "SELECT count(DAYNAME(comment_date)) AS c, DAYNAME(comment_date) AS h FROM $wpdb->comments WHERE comment_approved = '1' GROUP BY h ORDER BY c DESC Limit 1" );

// TOP COMMENT HOUR
$hour_result = $wpdb->get_results( "SELECT count(hour(comment_date)) AS c, hour(comment_date) AS h FROM $wpdb->comments WHERE comment_approved = '1' GROUP BY h ORDER BY c DESC Limit 1" );

// WEEKLY PUBLISHED POSTS
$weekly_posts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND post_date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)");

// AVERAGE TIME BETWEEN PUBLISHED POSTS
$avg_time_btw_posts = $wpdb->get_var("SELECT TIMESTAMPDIFF(SECOND, MIN(post_date), MAX(post_date)) / (COUNT(*)-1) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'");

// AVERAGE TIME BETWEEN APPROVED COMMENT
$avg_time_btw_comments = $wpdb->get_var("SELECT TIMESTAMPDIFF(SECOND, MIN(comment_date), MAX(comment_date)) / (COUNT(*)-1) FROM $wpdb->comments WHERE comment_approved = '1'");
if($avg_time_btw_comments == '') {
$avg_time_btw_comments = '0';
}

// TOTAL WEEKLY INTERACTIONS
$weekly_replies = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_parent > 0 AND comment_approved = '1' AND comment_date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)");
$weekly_comments = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_parent = '0' AND comment_approved = '1' AND comment_date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)");
$weekly_pingbacks = $wpdb->get_var("SELECT COUNT(comment_ID) FROM $wpdb->comments WHERE comment_type = 'pingback' AND comment_date >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)");
$weekly_interactions = $weekly_replies + $weekly_comments + $weekly_pingbacks;
if($weekly_interactions == 1) {
$weekly_interactions_copy = $weekly_interactions.' interaction';
} else {
$weekly_interactions_copy = $weekly_interactions.' interactions';
}

// PUBLISHED POSTS BY MONTH
$jan_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '1' AND post_status = 'publish' AND post_type = 'post'" );
$feb_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '2' AND post_status = 'publish' AND post_type = 'post'" );
$march_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '3' AND post_status = 'publish' AND post_type = 'post'" );
$april_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '4' AND post_status = 'publish' AND post_type = 'post'" );
$may_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '5' AND post_status = 'publish' AND post_type = 'post'" );
$june_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '6' AND post_status = 'publish' AND post_type = 'post'" );
$july_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '7' AND post_status = 'publish' AND post_type = 'post'" );
$aug_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '8' AND post_status = 'publish' AND post_type = 'post'" );;
$sept_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '9' AND post_status = 'publish' AND post_type = 'post'" );
$oct_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '10' AND post_status = 'publish' AND post_type = 'post'" );
$nov_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '11' AND post_status = 'publish' AND post_type = 'post'" );
$dec_posts = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE MONTH(post_date) = '12' AND post_status = 'publish' AND post_type = 'post'" );

// APPROVED COMMENTS BY MONTH
$jan_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '1' AND comment_approved = '1'" );
$feb_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '2' AND comment_approved = '1'" );
$march_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '3' AND comment_approved = '1'" );
$april_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '4' AND comment_approved = '1'" );
$may_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '5' AND comment_approved = '1'" );
$june_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '6' AND comment_approved = '1'" );
$july_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '7' AND comment_approved = '1'" );
$aug_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '8' AND comment_approved = '1'" );;
$sept_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '9' AND comment_approved = '1'" );
$oct_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '10' AND comment_approved = '1'" );
$nov_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '11' AND comment_approved = '1'" );
$dec_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->comments WHERE MONTH(comment_date) = '12' AND comment_approved = '1'" );
