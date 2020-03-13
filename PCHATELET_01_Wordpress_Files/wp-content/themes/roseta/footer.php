<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of #main and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package Roseta
 */

?>
		<?php cryout_absolute_bottom_hook(); ?>

		<aside id="colophon" role="complementary" <?php cryout_schema_microdata( 'sidebar' );?>>
			<div id="colophon-inside" <?php roseta_footer_colophon_class();?>>
				<?php get_sidebar( 'footer' );?>
			</div>
		</aside><!-- #colophon -->

	</div><!-- #main -->

	<footer id="footer" class="cryout" role="contentinfo" <?php cryout_schema_microdata( 'footer' );?>>
		<div id="footer-top">
			<div class="footer-inside">
				<?php cryout_master_footer_hook(); ?>
			</div><!-- #footer-inside -->
		</div><!--#footer-top-->
		<div id="footer-bottom">
			<div class="footer-inside">
				<?php cryout_master_footerbottom_hook(); ?>
			</div> <!-- #footer-inside -->
		</div><!--#footer-bottom-->
	</footer>
</div><!-- site-wrapper -->
	<?php wp_footer(); ?>
</body>
</html>
