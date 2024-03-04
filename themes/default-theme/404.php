<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Default Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container">
				<div class="error-404-content">
					<h1 class="error-404-title"><?php esc_html_e( '404', 'default-theme' ); ?></h1>
					<h2 class="error-404-title"><?php esc_html_e( 'Page not found', 'default-theme' ); ?></h2>
				</div>
			</div>
		</section>
	</main>

<?php
get_footer();
