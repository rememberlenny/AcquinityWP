<h2 style="font-size:17px;padding-top:15px;">Visitors</h2>

<div class="clear"></div>
		
		<?php if($current_goal != 'readers') { ?>
		
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
		
		<?php } ?>
		
		<?php if($current_goal != 'ads') { ?>
		
			<!-- VISITS -->
			<div class="metric">
				<?php $this->show_ranking_plus( $this->ga_visits( $ga ), $category_avg_visits ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo number_format($this->ga_visits( $ga )); ?></h2>
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
			
		<?php } ?>
			
			<!-- BOUNCE RATE-->
			<div class="metric">
				<?php $this->show_ranking_minus( $this->ga_visitBounceRate( $ga ), $category_avg_bounce ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo number_format($this->ga_visitBounceRate( $ga )); ?>%</h2>
					<span class="label">
						<?php _e( 'bounce rate', 'presstrends' ); ?>
						<br/>
						<a href="http://www.presstrends.me/metrics/#visitor" target="_blank">what's this?</a>
					</span>
				</div>
				<div class="global">
					Benchmark:
					<span><?php echo $category_avg_bounce; ?>%</span>
					<?php // $this->display_spam_ranking( $this->ga_visitBounceRate( $ga ), $category_avg_bounce ); ?>
				</div>		
			</div>
			
		<?php if($current_goal != 'ads') { ?>
			
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
			
		<?php } ?>
			
			<!-- LOAD TIME -->
			<div class="metric">
				<?php $this->show_ranking_minus( $this->ga_avgPageLoadTime( $ga ), $category_avg_load ); ?>
				<div class="clear"></div>
				<div class="site">
					<h2><?php echo date( 'i:s' , $this->ga_avgPageLoadTime( $ga ) ); ?></h2>
					<span class="label">
						<?php echo _e( 'avg. load time (sec)', 'presstrends' ); ?>
						<br/>
						<a href="http://www.presstrends.me/metrics/#visitor" target="_blank">what's this?</a>
					</span>
				</div>
				<div class="global">
					Benchmark:
					<span><?php echo date( 'i:s' , $category_avg_load); ?></span>
					<?php // $this->display_spam_ranking( $this->ga_avgPageLoadTime( $ga ), $category_avg_load ); ?>
				</div>
			</div>

<div class="clear"></div>