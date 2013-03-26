</section><!--  End -->

</div><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

	
<footer class="row full-width " role="contentinfo">
	<div class="footer-full twelve column">
		<div class="row footer">
			<div class="column fl">
				<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => 'nav', 'container_class' => '', 'menu_class' => 'inline-list small-block-grid-2')); ?>
			<p>&copy; <?php echo date('Y'); ?> <a href="http://http://acquinityinteractive.com" rel="nofollow" title="Acquinity Interactive">Acquinity Interactive - All Rights Reserved</a>.</p>
			</div>
			<div class="column fr">
			<?php
			if(get_field("facebook_url"))
        {
        ?>
        <a href="<?php get_field("facebook_url", "option") ?>"><img src="http://localhost:4421/wp-content/uploads/2013/03/fb-icon-mini.png" alt="facebook link"></a>
        <?php
				}
				if(get_field('twitter_url'))
        {
				the_field('twitter_url');
				}
				if(get_field("linkedin_url"))
				{
        ?>
        <a href="<?php get_field("linkedin_url", "option") ?>"><img src="http://localhost:4421/wp-content/uploads/2013/03/li-icon-mini.png" alt="linkedin link"></a>
        <?php
				}
				if(get_field('youtube_url'))
        {
				the_field('youtube_url');
				}
				?>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

<script>
	$(document).foundation();
</script>
	
<?php if (is_page('home') ) { ?>
<!--home page custom JS-->
    <script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/homeslide.js"></script>
<?php } ?>
	
</body>
</html>
