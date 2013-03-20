<h2 style="font-size:17px;padding-top:15px;">Comments</h2>

<div class="clear"></div>
		
		<!-- TOTAL -->
		<div class="metric">
			<?php $this->show_ranking_plus( $monthly_comments, $category_comments ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $monthly_comments; ?></h2>
				<span class="label">
					<?php _e( 'comments / 30 days', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#comment" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo number_format($category_comments); ?></span>
				<?php // $this->display_ranking( $comments_count->total_comments, $category_comments ); ?>
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

		<!-- SPAM -->
		<div class="metric">
			<?php $this->show_ranking_minus( $spam_percentage, $category_spam ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $spam_percentage; ?>%</h2>
				<span class="label">
					<?php _e( 'spam', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#comment" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $category_spam; ?>%</span>
				<?php // $this->display_spam_ranking( $spam_percentage, $category_spam ); ?>
			</div>
		</div>
		
		<?php if ( $this->get_option( 'ga_profile' ) ) { ?>
			
			<?php if($current_goal != 'readers') { ?>
		
				<!-- VISITOR TO COMMENT CONVERSION -->
				<div class="metric">
					<?php $this->show_ranking_plus( $this->ga_visitor_conversion( $ga, $monthly_comments ), $visitor_comment_conversion ); ?>
					<div class="clear"></div>
					<div class="site">
						<h2><?php echo $this->ga_visitor_conversion( $ga, $monthly_comments ); ?>%</h2>
						<span class="label">
							<?php _e( 'visitor conversion', 'presstrends' ); ?>
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
				
			<?php } ?>
		
		<?php } else { ?>
		
			<!-- REPLIES -->
			<div class="metric">
				<?php $this->show_ranking_plus( $reply_percentage, $category_replies ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo $reply_percentage; ?>%</h2>
					<span class="label">
						<?php _e( 'replies', 'presstrends' ); ?>
						<br/>
						<a href="http://www.presstrends.me/metrics/#comment" target="_blank">what's this?</a>	
					</span>
				</div>
				<div class="global">
					Benchmark:
					<span><?php echo $category_replies; ?>%</span>
					<?php // $this->display_ranking( $reply_percentage, $category_replies ); ?>
				</div>	
			</div>
		
		<?php } ?>
		
		<?php if($current_goal != 'readers') { ?>
		
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
		
		<?php } ?>

<div class="clear"></div>
