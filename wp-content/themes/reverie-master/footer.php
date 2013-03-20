</section><!--  End -->

</div><!-- Container End -->

<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

	
<footer class="row full-width" role="contentinfo">
	<div class="footer-full twelve">
		<div class="row footer">
			<div class="column">
				<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => 'nav', 'container_class' => '', 'menu_class' => 'inline-list small-block-grid-2')); ?>
			<p>&copy; <?php echo date('Y'); ?> <a href="http://http://acquinityinteractive.com" rel="nofollow" title="Acquinity Interactive">Acquinity Interactive - All Rights Reserved</a>.</p>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

<script>
	$(document).foundation();
</script>
	
</body>
</html>