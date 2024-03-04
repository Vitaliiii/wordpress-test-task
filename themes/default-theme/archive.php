<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Default Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="hero">
			<div class="container">
				<div class="hero__content">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>
					<?php the_archive_description( '<div class="archive-description">', '</div>' );?>
				</div>
			</div>
		</section>

		<section class="posts">
			<div class="container">
				<div class="posts__content">
					<div class="posts__list">
					<?php if ( have_posts() ) : ?>

						<?php
						
						while ( have_posts() ) :
							the_post();

							get_template_part( '/template-parts/components/post-item', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/components/no-post', 'none' );

					endif;
					?>
				</div>
				<div class="posts__sidebar">
					<?php get_sidebar();?>
				</div>
			</div>
		</section>\
	</main><!-- #main -->

<?php
get_footer();
