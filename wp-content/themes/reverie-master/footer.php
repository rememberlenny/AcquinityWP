</section><!--  End -->

</div><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

	
<footer class="row full-width mb1em ppr5em ppl5em" role="contentinfo">
	<div class="footer-full twelve column">
		<div class="row footer">
			<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => 'nav', 'container_class' => '', 'menu_class' => 'large-block-grid-6 small-block-grid-1 small-centered mob-text-center  ')); ?>
				<div class="mt1em text-center large-12 column large-centered  ">
            <ul class="large-block-grid-2 small-block-grid-1">
              <li>
              <ul class="large-block-grid-2 small-block-grid-2">
                <li>
                  
            <a href="<?php the_field('facebook_url', 'option'); ?>"><p class="d-inline-f mr2em"><img class="nmp5em" src="<?php the_field('facebook_icon', 'option'); ?>" alt="<?php the_field('facebook_text', 'option'); ?>"> <span><?php the_field('facebook_text', 'option'); ?></span></p></a>
                </li>
                
                <li>
           <a href="<?php the_field('twitter_url', 'option'); ?>"> <p class="d-inline-f mr2em"><img class="nmp5em" src="<?php the_field('twitter_icon', 'option'); ?>" alt="<?php the_field('twitter_text', 'option'); ?>"> <span><?php the_field('twitter_text', 'option'); ?></span></p></a>
                  
                </li>
              </ul>
                
              </li>
              <li>
                
            <p class="d-inline-f">&copy; <?php echo date('Y'); ?> <a href="<?php echo site_url(); ?>" rel="nofollow" title="Acquinity Interactive"><span>Acquinity Interactive - All Rights Reserved</span></a>.</p>
              </li>
            </ul>
        </div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39678397-1', 'acquinity.it');
  ga('send', 'pageview');

</script>

<script>
	$(document).foundation();
</script>

</body>
</html>
