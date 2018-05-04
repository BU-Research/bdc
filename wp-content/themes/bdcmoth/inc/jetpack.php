<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package BDCMoth
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function bdcmoth_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'bdcmoth_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'bdcmoth_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bdcmoth_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}


/*
 * Add Theme support for JetPack Site Logo
 *
 * http://fikrirasy.id/2015/01/how-to-implement-jetpacks-site-logo-on-your-theme/
 *
 */
add_action( 'after_setup_theme', 'bdcmoth_jetpack_support' );
function bdcmoth_jetpack_support(){
    // Declaring site logo support
    add_image_size( 'site-logo', 0, 60 );
    add_theme_support( 'site-logo', array(
        'header-text' => array(
            'site-title',
            'site-description'
        ),
        'size' => 'site-logo',
    ));
}

/*
 * Add Theme support for JetPack Social Menu
 *
 * http://fikrirasy.id/2015/01/how-to-implement-jetpacks-site-logo-on-your-theme/
 * USAGE <?php themename_social_menu(); ?>
 *
 */
add_theme_support( 'jetpack-social-menu' );
function bdcmoth_social_menu() {
  if ( ! function_exists( 'jetpack_social_menu' ) ) {
    return;
  } else {
    jetpack_social_menu();
  }
}
