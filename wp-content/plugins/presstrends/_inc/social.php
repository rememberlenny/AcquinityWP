<h2 style="font-size:17px;padding-top:15px;">Social</h2>

<div class="clear"></div>
		
		<!-- Facebook -->
		<div class="metric">
			<?php $this->show_ranking_plus( $social_facebook, $cat_facebook ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $social_facebook; ?></h2>
				<span class="label">
					<?php _e( 'Facebook Shares', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank" title="MozRank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span> <?php echo $cat_facebook; ?></span>
				<?php // $this->display_ranking( $pressmoz_mozrank, $cat_mozrank ); ?>
			</div>
		</div>

		<!-- Twitter -->
		<div class="metric">
			<?php $this->show_ranking_plus( $social_twitter, $cat_twitter ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $social_twitter; ?></h2>
				<span class="label">
					<?php _e( 'Tweets', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_twitter; ?></span>
				<?php // $this->display_ranking( $pressmoz_domain_auth, $cat_domain_authority ); ?>
			</div>
		</div>

		<!-- Google+ -->
		<div class="metric">
			<?php $this->show_ranking_plus( $social_google, $cat_google ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $social_google; ?></h2>
				<span class="label">
					<?php _e( 'Google+ Shares', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_google; ?></span>
				<?php // $this->display_spam_ranking( $pressmoz_external_links, $cat_external_links ); ?>
			</div>
		</div>
		
		<!-- Pinterest -->
		<div class="metric">
			<?php $this->show_ranking_plus( $social_pinterest, $cat_pinterest ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $social_pinterest; ?></h2>
				<span class="label">
					<?php _e( 'Pinterest Pins', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_pinterest; ?></span>
				<?php // $this->display_spam_ranking( $pressmoz_external_links, $cat_external_links ); ?>
			</div>
		</div>
		
		<!-- LinkedIn -->
		<div class="metric">
			<?php $this->show_ranking_plus( $social_linkedin, $cat_linkedin ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo $social_linkedin; ?></h2>
				<span class="label">
					<?php _e( 'LinkedIn Shares', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_linkedin; ?></span>
				<?php // $this->display_spam_ranking( $pressmoz_external_links, $cat_external_links ); ?>
			</div>
		</div>
		