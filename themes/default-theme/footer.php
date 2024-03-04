<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Default Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-footer__content">
				<p class="copyright"><?php the_field('copyright', 'option'); ?></p>
				<?php 
				$theme_location = 'footer-menu';
				if ( has_nav_menu( $theme_location ) ) { 
					wp_nav_menu(
						array(
							'theme_location' => $theme_location,
							'menu_id'        => 'footer-menu',
							'container'        => 'nav',
							'container_class'  => 'menu',
							'menu_class'       => 'menu-list', 
						)
					);
				} ?>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
