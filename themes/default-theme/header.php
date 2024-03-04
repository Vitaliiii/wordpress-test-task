<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Default Theme
 */


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="theme-color" content="#085151">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<?php wp_head(); ?>
</head>
	
	
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- NOSCRIPT -->
	<noscript>
		Your Browser Does Not Support JavaScript. Please Update Your Browser and reload page. Have a nice day!
	</noscript>
	<div id="page" class="site">
	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- NOSCRIPT -->
	<noscript>
		Your Browser Does Not Support JavaScript. Please Update Your Browser and reload page. Have a nice day!
	</noscript>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<div class="container">
				<div class="site-header__inner">
					<?php the_custom_logo();?>

					<div class="menu-wrapper">
						<?php 
						$theme_location = 'main-menu';
						if ( has_nav_menu( $theme_location ) ) { 
							wp_nav_menu(
								array(
									'theme_location' => $theme_location,
									'menu_id'        => 'primary-menu',
									'container'        => 'nav',
									'container_class'  => 'menu',
									'menu_class'       => 'menu-list', 
								)
							);
						} ?>
					</div>
					
					<button class="menu-toggle" type="button" aria-label="toggle menu">
						<span aria-hidden="true"></span>
					</button>
				</div>
			</div>
		</header>
		