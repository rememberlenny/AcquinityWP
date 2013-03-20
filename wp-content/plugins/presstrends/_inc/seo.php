<h2 style="font-size:17px;padding-top:15px;">SEO</h2>

<div class="clear"></div>
		
		<!-- MOZRANK -->
		<div class="metric">
			<?php $this->show_ranking_plus( $pressmoz_mozrank, $cat_mozrank ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo round($pressmoz_mozrank); ?></h2>
				<span class="label">
					<?php _e( 'MozRank', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank" title="MozRank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo number_format($cat_mozrank); ?></span>
				<?php // $this->display_ranking( $pressmoz_mozrank, $cat_mozrank ); ?>
			</div>
		</div>

		<!-- DOMAIN AUTHORITY -->
		<div class="metric">
			<?php $this->show_ranking_plus( $pressmoz_domain_auth, $cat_domain_authority ); ?>
			<div class="clear"></div>
			<div class="site">
				<h2><?php echo round($pressmoz_domain_auth); ?></h2>
				<span class="label">
					<?php _e( 'domain authority', 'presstrends' ); ?>
					<br/>
					<a href="http://www.presstrends.me/metrics/#seo" target="_blank">what's this?</a>
				</span>
			</div>
			<div class="global">
				Benchmark:
				<span><?php echo $cat_domain_authority; ?></span>
				<?php // $this->display_ranking( $pressmoz_domain_auth, $cat_domain_authority ); ?>
			</div>
		</div>

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
		
<div class="clear"></div>