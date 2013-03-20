<?php
// GET CURRENT GOAL
$current_goal = $this->get_option( 'goal' );
?>

<h2 style="font-size:17px;padding-top:15px;">Shop</h2>
		
<div class="clear"></div>
		
		<?php
		// START OF "SALES" GOAL
		if($current_goal != 'sales') { 
		?>
		
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
		
		<?php
		} 
		?>
		
		<!-- Cart / Checkout Conversion -->
		<div class="metric">
			<?php $this->show_ranking_plus( $cart_checkout_conversion, $cat_cart_checkout ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $cart_checkout_conversion; ?>%</h2>
				<span class="label">
					<?php _e( 'cart / checkout conversion', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_cart_checkout; ?>%</span>
				<?php // $this->display_ranking( $comments_to_posts, $category_conversion ); ?>
			</div>
		</div>
		
		
		<?php
		// START OF "SALES" GOAL
		if($current_goal != 'sales') { 
		?>
		
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
		
		<?php
		} 
		?>
		
		<!-- Revenue -->
		<div class="metric">
			<?php $this->show_ranking_plus( $revenue, $cat_sale_revenue ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo number_format($revenue, 2); ?></h2>
				<span class="label">
					<?php _e( 'avg. sale / 30 days', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_sale_revenue; ?></span>
				<?php // $this->display_ranking( $comments_to_posts, $category_conversion ); ?>
			</div>
		</div>
		
		<!-- Time Between Sales -->
		<div class="metric">
			<?php $this->show_ranking_plus( $avg_time_btw_checkout, $cat_between_sales ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php
				 	$avg_time_btw_checkout_days = floor ($avg_time_btw_checkout / 86400);
					if ($avg_time_btw_checkout_days > 1) {
					echo $avg_time_btw_checkout_days . ' Days';
					} else if ($avg_time_btw_checkout_days > 0 && $avg_time_btw_checkout_days < 2) {
					echo $avg_time_btw_checkout_days . ' Day';
					} else {
					echo gmdate ('H:i:s', $avg_time_btw_checkout);
					}
					?></h2>
				<span class="label">
					<?php _e( 'avg. time between checkout', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo gmdate ('H:i:s', $cat_between_sales); ?></span>
				<?php // $this->display_ranking( $comments_to_posts, $category_conversion ); ?>
			</div>
		</div>

<div class="clear"></div>