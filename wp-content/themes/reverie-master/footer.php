</section><!--  End -->

</div><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

	
<footer class="row full-width " role="contentinfo">
	<div class="footer-full twelve column">
		<div class="row footer">
			<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => 'nav', 'container_class' => '', 'menu_class' => 'inline-list small-block-grid-2')); ?>
				
			<p>&copy; <?php echo date('Y'); ?> <a href="http://http://acquinityinteractive.com" rel="nofollow" title="Acquinity Interactive">Acquinity Interactive - All Rights Reserved</a>.</p>
			
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
	
<?php if (is_page('home') ) { ?>
<!--home page custom JS-->
    <script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/homeslide.js"></script>
<?php } ?>
	
<script type="text/javascript">
  $(document).ready(function() {
    $('.masthead-photo').animate({opacity:1.0}, 'linear');
    $('.masthead-photo-extension').animate({opacity:1.0, 'margin-left':'0em'}, 'linear');
  });
</script>
   
</body>
</html>
