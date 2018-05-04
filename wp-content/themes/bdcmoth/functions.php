<?php
/**
 * BDCMoth functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bdcmoth
 */

if ( ! function_exists( 'bdcmoth_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bdcmoth_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on BDCMoth, use a find and replace
		 * to change 'bdcmoth' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bdcmoth', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Remove Post Formats.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/remove_theme_support
		 */
		remove_theme_support( 'post-formats' );

		// This theme uses wp_nav_menu() in 3 locations.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'bdcmoth' ),
			'secondary' => esc_html__( 'Secondary', 'bdcmoth' ),
		) );

		/*
		 * Switch default core markup to output valid HTML5.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bdcmoth_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'bdcmoth_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bdcmoth_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bdcmoth_content_width', 1024 );
}
add_action( 'after_setup_theme', 'bdcmoth_content_width', 0 );


/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bdcmoth_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Above Header Widget Area', 'bdcmoth' ),
		'id' => 'above-header',
		'description' => esc_html__( 'An optional widget area - full width, above the header at the tippy top.', 'bdcmoth' ),
		'before_widget' => '<div id="%1$s" class="above-header %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bdcmoth' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'The Sidebar Widget', 'bdcmoth' ),
		'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Footer Widget Area', 'bdcmoth' ),
		'id' => 'footer-widget-area',
		'description' => esc_html__( 'An optional widget area for your site footer.', 'bdcmoth' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Site Footer Widget Area', 'bdcmoth' ),
		'id' => 'site-footer',
		'description' => esc_html__( 'An optional widget area for your site footer.', 'bdcmoth' ),
		'before_widget' => '<div id="%1$s" class="colophon-widget col-1-2 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

}
add_action( 'widgets_init', 'bdcmoth_widgets_init' );


/**
 * Enable Advanced Custom Fields Options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(array(
		'page_title'    => 'Default Footer Layout',
		'menu_title'    => 'Default Footer Layout',
		'menu_slug'     => 'default-footer',
		'capability'    => 'edit_posts',
		'redirect'      => false,
	));
}

/**
 * Enqueue scripts and styles.
 */
function bdcmoth_scripts() {
	wp_enqueue_style( 'bdcmoth-style', get_stylesheet_uri(), array(), '170218' );

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'bdcmoth-javascript', get_template_directory_uri() . '/js/global-min.js', array( 'jquery' ), '170218', true );

	wp_enqueue_script( 'bdcmoth-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_front_page() ) {
		wp_enqueue_script( 'homepage-js', get_template_directory_uri() . '/js/homepage-min.js', array( 'jquery' ), '171122', true );
	}

	if ( is_page_template( 'templates/focusarea.php' ) || is_page_template( 'templates/modules.php' ) ) {
		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick/slick.min.js', array( 'jquery' ), '171228', true );
		wp_enqueue_script( 'myslick-js', get_template_directory_uri() . '/js/slick/slick-slide-min.js', array( 'slick-js' ), '171228', true );
		wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/js/aos.js', array(), '180205', true );
	}
	if ( is_page_template( 'templates/team.php' ) || is_page_template( 'templates/tools.php' ) ) {
		wp_enqueue_script( 'almlinks-js', get_template_directory_uri() . '/js/alm-link-min.js', array( 'jquery' ), '171228', true );
	}
	if ( is_page_template( 'templates/news.php' ) || is_search() ) {
		wp_enqueue_script( 'almselect-js', get_template_directory_uri() . '/js/alm-select-min.js', array( 'jquery' ), '171228', true );
	}
	if ( is_page_template( 'templates/contact.php' ) ) {
		wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD7OiahJTYAqNlw4Fznm2bNLgZ5e7V-vKg', array( 'jquery' ), '180107', true );
		wp_enqueue_script( 'mymap', get_template_directory_uri() . '/js/map-min.js', array( 'google-map' ), '171228', true );
	}

}
add_action( 'wp_enqueue_scripts', 'bdcmoth_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Filters tags for Ajax Load More Plugin.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
