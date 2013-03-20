<h2 style="font-size:17px;padding-top:15px;">Posts</h2>
		
<div class="clear"></div>
		
		<!-- PUBLISHED -->
		<div class="metric">
			<?php $this->show_ranking_plus( $count_posts->publish, $category_posts ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $count_posts->publish; ?></h2>
				<span class="label">
					<?php _e( 'published posts', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo number_format($category_posts); ?></span>
				<?php // $this->display_ranking( $count_posts->publish, $category_posts ); ?>
			</div>
		</div>

		<!-- CONVERSION -->
		<div class="metric">
			<?php $this->show_ranking_plus( $comments_to_posts, $category_conversion ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $comments_to_posts; ?>%</h2>
				<span class="label">
					<?php _e( 'comment conversion', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $category_conversion; ?>%</span>
				<?php // $this->display_ranking( $comments_to_posts, $category_conversion ); ?>
			</div>
		</div>

		<!-- CATEGORIES -->
		<div class="metric">
			<?php $this->show_ranking_plus( $category_sum, $category_categories ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $category_sum; ?></h2>
				<span class="label">
					<?php echo _n( 'total category', 'total categories', $category_sum, 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $category_categories; ?></span>
				<?php // $this->display_ranking( $category_sum, $category_categories ); ?>
			</div>
		</div>

		<!-- PINGBACKS -->
		<div class="metric">
			<?php $this->show_ranking_plus( $pingback_result, $category_pingbacks ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $pingback_result; ?></h2>
				<span class="label">
					<?php echo _n( 'total pingback', 'total pingbacks', $pingback_result, 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#post" target="_blank">what's this?</a>	
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $category_pingbacks; ?></span>
				<?php // $this->display_ranking( $pingback_result, $category_pingbacks ); ?>
			</div>
			
		</div>
		
	<?php if($current_goal != 'ads') { ?>
		
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
		
	<?php } ?>

<div class="clear"></div>