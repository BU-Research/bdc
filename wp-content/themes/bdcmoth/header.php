<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bdcmoth
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bdcmoth' ); ?></a>


	<?php if ( is_active_sidebar( 'above-header' ) ) { ?>
		<div class="widget-area above-header-widget-area">
			<div class="inner-wrap-wide">
				<?php dynamic_sidebar( 'above-header' ); ?>
			</div>
		</div>
	<?php } ?>


	<header id="masthead" class="site-header">

		<div class="inner-wrap-wide">

			<div class="site-branding">
				<div class="site-title">
					<?php if ( get_header_image() ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
					</a>
					<?php endif; // End header image check. ?>
				</div>
			</div>



			<div class="search-wrap">
				<div class="search-icon"></div>
			</div>

			<div class="header-right">

				<?php if ( has_nav_menu( 'primary' ) ) { ?>
				<nav id="primary-navigation" class="site-navigation" role="navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id' => 'primary-menu',
						'container' => '',
					) );
					?>
				</nav>
				<?php } ?>

				<?php if ( has_nav_menu( 'secondary' ) ) { ?>
				<button class="responsive-menu-icon" aria-controls="secondary-navigation" aria-expanded="false"></button>
				<nav id="secondary-navigation" class="site-navigation" role="navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'secondary',
						'menu_id' => 'secondary-menu',
						'container' => '',
					) );
					?>
					<div class="mobile-nav-form">
						<?php get_search_form(); ?>
					</div>
				</nav>
				<?php } ?>

			</div>

		</div>

		<div class="form-wrap"><div class="inner-wrap-wide"><?php get_search_form(); ?></div></div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
