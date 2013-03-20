<?php
// GET CURRENT GOAL
$current_goal = $this->get_option( 'goal' );
?>

<?php
// START OF "READERS" GOAL
if($current_goal == 'readers') { 
?>
									
	<h2>Critical Metrics <span style="font-size:13px;"> with </span><span style="font-size:13px;color:#7B5FA1;"><?php printf( __( 'Benchmarks for <b>%s</b> WordPress Sites', 'presstrends' ), esc_html( $this->get_option( 'category' ) ) ); ?></span></h2>
	
	<?php if ( $this->get_option( 'ga_profile' ) ) { ?>
	
	
		<!-- VISITORS -->
			<div class="metric">
				<?php $this->show_ranking_plus( $this->ga_visitors( $ga ), $cat_avg_visitors ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo number_format($this->ga_visitors( $ga )); ?></h2>
					<span class="label">
						<?php _e( 'visitors / 30 days', 'presstrends' ); ?>
						<br/>
						<a href="http://www.presstrends.me/metrics/#visitor" target="_blank">what's this?</a>	
					</span>
				</div>
				<div class="clear"></div>
				<div class="global">
					Benchmark:
					<span><?php echo number_format($cat_avg_visitors); ?></span>
					<?php // $this->display_ranking( $this->ga_visitors( $ga ), $cat_avg_visitors ); ?>
				</div>
			</div>
		
		
		
		<!-- CONVERSION -->
		<div class="metric">
			<?php $this->show_ranking_plus( $this->ga_visitor_conversion( $ga, $monthly_comments ), $visitor_comment_conversion ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $this->ga_visitor_conversion( $ga, $monthly_comments ); ?>%</h2>
				<span class="label">
					<?php _e( 'visitor to comment conversion', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#comment" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $visitor_comment_conversion; ?>%</span>
				<?php // $this->display_ranking( $approved_percentage, $category_approved ); ?>
			</div>
		</div>
		
		
		<!-- AVG. TIME BETWEEN COMMENTS -->
	<div class="metric">
		<?php $this->show_ranking_minus( $avg_time_btw_comments, $cat_between_comments ); ?>
		<div class="clear"></div>
		<div class="site">
			<h2><?php
			 	$avg_time_btw_comments_days = floor ($avg_time_btw_comments / 86400);
				if ($avg_time_btw_comments_days > 1) {
				echo $avg_time_btw_comments_days . ' Days';
				} else if ($avg_time_btw_comments_days > 0 && $avg_time_btw_comments_days < 2) {
				echo $avg_time_btw_comments_days . ' Day';
				} else {
				echo gmdate ('H:i:s', $avg_time_btw_comments);
				}
				?>
			</h2>
			<span class="label">
				<?php _e( 'avg. time between comments', 'presstrends' ); ?>
				<br/>
				<a href="http://www.presstrends.me/metrics/#comment" target="_blank">what's this?</a>
			</span>
		</div>
		<div class="global">
			Benchmark:
			<span><?php echo gmdate ('H:i:s', $cat_between_comments); ?></span>
			<?php // $this->display_ranking( $avg_time_btw_comments, $cat_between_comments ); ?>
		</div>	
	</div>

	
	<?php } else { ?>
	
	<!-- AVG. TIME BETWEEN COMMENTS -->
	<div class="metric">
		<?php $this->show_ranking_minus( $avg_time_btw_comments, $cat_between_comments ); ?>
		<div class="clear"></div>
		<div class="site">
			<h2><?php
			 	$avg_time_btw_comments_days = floor ($avg_time_btw_comments / 86400);
				if ($avg_time_btw_comments_days > 1) {
				echo $avg_time_btw_comments_days . ' Days';
				} else if ($avg_time_btw_comments_days > 0 && $avg_time_btw_comments_days < 2) {
				echo $avg_time_btw_comments_days . ' Day';
				} else {
				echo gmdate ('H:i:s', $avg_time_btw_comments);
				}
				?>
			</h2>
			<span class="label">
				<?php _e( 'avg. time between comments', 'presstrends' ); ?>
				<br/>
				<a href="http://www.presstrends.me/metrics/#comment" target="_blank">what's this?</a>
			</span>
		</div>
		<div class="global">
			Benchmark:
			<span><?php echo gmdate ('H:i:s', $cat_between_comments); ?></span>
			<?php // $this->display_ranking( $avg_time_btw_comments, $cat_between_comments ); ?>
		</div>	
	</div>
	
	<!-- APPROVED -->
		<div class="metric">
			<?php $this->show_ranking_plus( $approved_percentage, $category_approved ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $approved_percentage; ?>%</h2>
				<span class="label">
					<?php _e( 'approved', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#comment" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $category_approved; ?>%</span>
				<?php // $this->display_ranking( $approved_percentage, $category_approved ); ?>
			</div>
		</div>
		
		
	<!-- INTEGRATE GOOGLE ANALYTICS FOR BETTER METRICS -->
		<div class="metric" style="margin-top:68px;">
			<div class="site">
			<h2 style="font-size:14px;padding-top:15px;">
			<?php printf( __( '<a href="%s">Integrate Google Analytics for better metrics &raquo;</a>', 'presstrends' ), admin_url( 'admin.php?page=presstrends_settings' ) ); ?>
			</h2>
			</div>
		</div>
	
	<?php } ?>
					
	<div class="clear"></div>
	<div class="hr" style="margin-top:40px;"></div>
	<div class="clear"></div>

<?php } // END OF "READERS" GOAL ?>



<?php
// START OF "ADS" GOAL
if($current_goal == 'ads') { 
?>
									
	<h2>Critical Metrics <span style="font-size:13px;"> with </span><span style="font-size:13px;color:#7B5FA1;"><?php printf( __( 'Benchmarks for <b>%s</b> WordPress Sites', 'presstrends' ), esc_html( $this->get_option( 'category' ) ) ); ?></span></h2>
	
	<?php if ( $this->get_option( 'ga_profile' ) ) { ?>
	
	
		<!-- VISITS -->
			<div class="metric">
				<?php $this->show_ranking_plus( $this->ga_visits( $ga ), $category_avg_visits ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo $this->ga_visits( $ga ); ?></h2>
					<span class="label">
						<?php _e( 'visits / 30 days', 'presstrends' ); ?>
						<br/>
						<a href="http://www.presstrends.me/metrics/#visitor" target="_blank">what's this?</a>
					</span>
				</div>
				<div class="clear"></div>
				<div class="global">
					Benchmark:
					<span><?php echo number_format($category_avg_visits); ?></span>
					<?php // $this->display_ranking( $this->ga_visits( $ga ), $category_avg_visits ); ?>
				</div>
			</div>
		
		
		
		<!-- PAGES VISITED -->
			<div class="metric">
				<?php $this->show_ranking_plus( $this->ga_uniquePageviews( $ga ), $category_avg_pages_visited ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo $this->ga_uniquePageviews( $ga ); ?></h2>
					<span class="label">
						<?php echo _e( 'pages / visit', 'presstrends' ); ?>
						<br/>
						<a href="http://www.presstrends.me/metrics/#visitor" target="_blank">what's this?</a>
					</span>
				</div>
				<div class="global">
					Benchmark:
					<span><?php echo $category_avg_pages_visited; ?></span>
					<?php // $this->display_ranking( $this->ga_uniquePageviews( $ga ), $category_avg_pages_visited ); ?>
				</div>
			</div>
			
	
		<!-- AVG. TIME BETWEEN POSTS -->
		<div class="metric">
			<?php $this->show_ranking_minus( $avg_time_btw_posts, $cat_between_posts ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php
				 	$avg_time_btw_posts_days = floor ($avg_time_btw_posts / 86400);
					if ($avg_time_btw_posts_days > 1) {
					echo $avg_time_btw_posts_days . ' Days';
					} else if ($avg_time_btw_posts_days > 0 && $avg_time_btw_posts_days < 2) {
					echo $avg_time_btw_posts_days . ' Day';
					} else {
					echo gmdate ('H:i:s', $avg_time_btw_posts);
					}
					?>
				</h2>
				<span class="label">
					<?php _e( 'avg. time between publishing', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo gmdate ('H:i:s', $cat_between_posts); ?></span>
				<?php // $this->display_ranking( $avg_time_btw_posts, $cat_between_posts ); ?>
			</div>	
		</div>

	
	<?php } else { ?>
	
	<!-- EXTERNAL LINKS -->
		<div class="metric">
			<?php $this->show_ranking_plus( $pressmoz_external_links, $cat_external_links ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $pressmoz_external_links; ?></h2>
				<span class="label">
					<?php _e( 'external links', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_external_links; ?></span>
				<?php // $this->display_spam_ranking( $pressmoz_external_links, $cat_external_links ); ?>
			</div>
		</div>
	
	<!-- AVG. TIME BETWEEN POSTS -->
		<div class="metric">
			<?php $this->show_ranking_minus( $avg_time_btw_posts, $cat_between_posts ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php
				 	$avg_time_btw_posts_days = floor ($avg_time_btw_posts / 86400);
					if ($avg_time_btw_posts_days > 1) {
					echo $avg_time_btw_posts_days . ' Days';
					} else if ($avg_time_btw_posts_days > 0 && $avg_time_btw_posts_days < 2) {
					echo $avg_time_btw_posts_days . ' Day';
					} else {
					echo gmdate ('H:i:s', $avg_time_btw_posts);
					}
					?>
				</h2>
				<span class="label">
					<?php _e( 'avg. time between publishing', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo gmdate ('H:i:s', $cat_between_posts); ?></span>
				<?php // $this->display_ranking( $avg_time_btw_posts, $cat_between_posts ); ?>
			</div>	
		</div>
		
		<!-- INTEGRATE GOOGLE ANALYTICS FOR BETTER METRICS -->
		<div class="metric" style="margin-top:68px;">
			<div class="site">
			<h2 style="font-size:14px;padding-top:15px;">
			<?php printf( __( '<a href="%s">Integrate Google Analytics for better metrics &raquo;</a>', 'presstrends' ), admin_url( 'admin.php?page=presstrends_settings' ) ); ?>
			</h2>
			</div>
		</div>
		
	
	<?php } ?>
					
	<div class="clear"></div>
	<div class="hr" style="margin-top:40px;"></div>
	<div class="clear"></div>

<?php } // END OF "ADS" GOAL ?>

<?php
// START OF "SALES" GOAL
if($current_goal == 'sales') { 
?>
									
	<h2>Critical Metrics <span style="font-size:13px;"> with </span><span style="font-size:13px;color:#7B5FA1;"><?php printf( __( 'Benchmarks for <b>%s</b> WordPress Sites', 'presstrends' ), esc_html( $this->get_option( 'category' ) ) ); ?></span></h2>	
	
		<!-- VISITORS -->
			<div class="metric">
				<?php $this->show_ranking_plus( $this->ga_visitors( $ga ), $cat_avg_visitors ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo number_format($this->ga_visitors( $ga )); ?></h2>
					<span class="label">
						<?php _e( 'visitors / 30 days', 'presstrends' ); ?>
						<br/>
						<a href="http://www.presstrends.me/metrics/#visitor" target="_blank">what's this?</a>	
					</span>
				</div>
				<div class="clear"></div>
				<div class="global">
					Benchmark:
					<span><?php echo number_format($cat_avg_visitors); ?></span>
					<?php // $this->display_ranking( $this->ga_visitors( $ga ), $cat_avg_visitors ); ?>
				</div>
			</div>
		
		
		
		<!-- Visitor Conversion -->
		<div class="metric">
			<?php $this->show_ranking_plus( $this->ga_checkout_conversion( $ga, $completed_orders ), $cat_visitor_checkout ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $this->ga_checkout_conversion( $ga, $completed_orders ); ?>%</h2>
				<span class="label">
					<?php _e( 'visitor / checkout conversion', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_visitor_checkout; ?>%</span>
				<?php // $this->display_ranking( $comments_to_posts, $category_conversion ); ?>
			</div>
		</div>
		
		
		<!-- Total Sales -->
		<div class="metric">
			<?php $this->show_ranking_plus( $completed_orders, $cat_monthly_sales ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $completed_orders; ?></h2>
				<span class="label">
					<?php _e( 'sales / 30 days', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_monthly_sales; ?></span>
				<?php // $this->display_ranking( $comments_to_posts, $category_conversion ); ?>
			</div>
		</div>

					
	<div class="clear"></div>
	<div class="hr" style="margin-top:40px;"></div>
	<div class="clear"></div>

<?php } // END OF "SALES" GOAL ?>


