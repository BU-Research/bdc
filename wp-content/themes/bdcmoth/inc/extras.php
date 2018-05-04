<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package bdcmoth
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bdcmoth_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'bdcmoth_pingback_header' );


/**
 * Dont Update the Theme
 *
 * If there is a theme in the repo with the same name, this prevents WP from prompting an update.
 *
 * @since  1.0.0
 * @author Bill Erickson
 * @link   http://www.billerickson.net/excluding-theme-from-updates
 * @param  array  $r Existing request arguments.
 * @param  string $url Request URL.
 * @return array  Amended request arguments
 */
function ea_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
		return $r; // Not a theme update request. Bail immediately.
	}
	$themes = json_decode( $r['body']['themes'] );
	$child = get_option( 'stylesheet' );
	unset( $themes->themes->$child );
	$r['body']['themes'] = wp_json_encode( $themes );
	return $r;
}

/*
// Remove XML RCP - only if NOT using JetPack, pingbacks or Flickr services
remove_action('wp_head', 'rsd_link');
*/

// Not using Windows Live Writer.
remove_action( 'wp_head', 'wlwmanifest_link' );
// No need to display what version of WordPress.
remove_action( 'wp_head', 'wp_generator' );
// Remove relational links in header.
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );

/**
 * Remove emoji.
 */
function disable_emoji_dequeue_script() {
	wp_dequeue_script( 'emoji' );
}
add_action( 'wp_print_scripts', 'disable_emoji_dequeue_script', 100 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Customize Menu Item Classes
 *
 * @link http://www.billerickson.net/customize-which-menu-item-is-marked-active/
 *
 * @param array  $classes current menu classes.
 * @param object $item current menu item.
 * @param object $args menu arguments.
 * @return array $classes
 */
function bdcmoth_menu_item_classes( $classes, $item, $args ) {
	if ( 'secondary' !== $args->theme_location ) :
		return $classes;
	endif;

	if ( ( is_singular( 'post' ) || is_category() || is_tag() ) && 'News + Events' === $item->title ) :
		$classes[] = 'current-menu-item';
	endif;

	return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'bdcmoth_menu_item_classes', 10, 3 );


/*
 * Enable shortcodes in widgets.
 */
add_filter( 'widget_text', 'do_shortcode' );
/**
 * Shortcode for adding the current year.
 */
function bdcmoth_year_shortcode() {
	$year = date( 'Y' );
	return $year;
}
add_shortcode( 'year', 'bdcmoth_year_shortcode' );




/**
 * EXCERPT LENGTH FILTER - to 16 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function bdcmoth_custom_excerpt_length( $length ) {
	if ( ! is_search() ) {
		return 16;
	}
}
add_filter( 'excerpt_length', 'bdcmoth_custom_excerpt_length', 999 );

/**
 * EXCERPT LENGTH FUNCTION - to a specified amount.
 * Used on the "Team" template in the AJAX Load More plugin
 * Usage - <?php echo esc_html( excerpt( 30 ) ); ?>
 *
 * @param int $limit Excerpt length.
 */
function excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ',$excerpt ) . ' ...';
	} else {
		$excerpt = implode( ' ',$excerpt );
	}
	$excerpt = preg_replace( '`[[^]]*]`','',$excerpt );
	return $excerpt;
}

/**
 * EXCERPT ELLIPSES.
 *
 * @param string $more Text after excerpt.
 */
function bdcmoth_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'bdcmoth_excerpt_more' );

/**
 * EXCERPT ELLIPSES - Relevanssi.
 */
function bdcmoth_relevanssi_ellipsis() {
	return '';
}
add_filter( 'relevanssi_ellipsis', 'bdcmoth_relevanssi_ellipsis' );



/**
 * TITLE LENGTH FILTER - set to a specified amount of words.
 * Used on the "News + Events" template in the AJAX Load More plugin
 * Usage - add_filter( 'the_title', 'max_title_length');  instead of the_title()
 *
 * @param var $title The Title.
 */
function bdcmoth_max_title_length( $title ) {
	$max = 60;
	if ( strlen( $title ) > $max ) {
		return substr( $title, 0, $max ) . ' &hellip;';
	} else {
		return $title;
	}
}



/**
 * Define default terms for custom taxonomies
 *
 * @props     https://www.billerickson.net/code/default-term-for-taxonomy/
 * @link      https://silentcomics.com/wordpress/Automatic-default-taxonomy-for-a-custom-post-type/
 *
 * @param var $post_id The Posts ID.
 * @param var $post The Post.
 */
function bdcmoth_set_default_object_terms( $post_id, $post ) {
	if ( 'publish' === $post->post_status && 'tool' === $post->post_type ) {
		$defaults = array(
			'tool_type' => array( 'publication' ),
			'category' => array( 'cellular' ),
		);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[ $taxonomy ], $taxonomy );
			}
		}
	}

	if ( 'publish' === $post->post_status && 'team' === $post->post_type ) {
		$defaults = array(
			'team_type' => array( 'faculty' ),
			'category' => array( 'cellular' ),
		);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[ $taxonomy ], $taxonomy );
			}
		}
	}

	if ( 'publish' === $post->post_status && 'post' === $post->post_type ) {
		$defaults = array(
			'post_layout' => array( 'news' ),
			'category' => array( 'cellular' ),
		);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[ $taxonomy ], $taxonomy );
			}
		}
	}
}
add_action( 'save_post', 'bdcmoth_set_default_object_terms', 100, 2 );



/**
 * Add a span around "Category:, Tag:, etc...
 *
 * Filter get_the_archive_title
 *
 * @param string $title the Archive title.
 */
function wrap_archive_title_part( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '<div>Category:</div> ', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '<div>Taggded:</div> ', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$ptype = get_post_type( get_the_ID() );
		$title = single_tag_title( '<div>' . $ptype . ' type:</div> ', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_home() ) {
		$title = 'Blog';
	} else {
		$title = 'Archive';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'wrap_archive_title_part' );




/**
 * SEARCH - Change Text in Search Submit Button
 *
 * @param string $text a string of text.
 * @link https://wordpress.org/support/topic/how-do-i-change-some-details-of-the-search-widget
 */
function bdcmoth_search_button( $text ) {
	$text = str_replace( 'value="Search"', 'value=""', $text );
	return $text;
}
add_filter( 'get_search_form', 'bdcmoth_search_button' );


/**
 * SEARCH - Hook Ajax Load More into Relavansii search results
 * Use alm_query_args filter to pass data to relevanssi_do_query() then back to ALM.
 *
 * @param Var $args Relavansii Query Arguments.
 * @link https://connekthq.com/plugins/ajax-load-more/docs/filter-hooks/#alm_query_args
 */
function bdcmoth_alm_query_args_relevanssi( $args ) {
	$args = apply_filters( 'alm_relevanssi', $args );
	return $args;
}
add_filter( 'alm_query_args_relevanssi', 'bdcmoth_alm_query_args_relevanssi' );


/**
 * SEARCH - Post Type Filters
 */
function bdcmoth_search_filters() {

	$theterm = get_search_query();
	?>

	<div class="search-filter-wrap">
	<?php
	$url = get_bloginfo( 'url' );

	$all = esc_attr( add_query_arg( array(
		's' => get_search_query(),
	), $url ) );
	echo '<a href="' . esc_url( $all ) . '" rel="nofollow">All</a>';

	$ne = esc_attr( add_query_arg( array(
		's' => get_search_query(),
		'post_type' => 'post',
	), $url ) );
	echo '<a href="' . esc_url( $ne ) . '" rel="nofollow">News + Events</a>';

	$tt = esc_attr( add_query_arg( array(
		's' => get_search_query(),
		'post_type' => 'tool',
	), $url ) );
	echo '<a href="' . esc_url( $tt ) . '" rel="nofollow">Tools + Tech</a>';

	$sp = esc_attr( add_query_arg( array(
		's' => get_search_query(),
		'post_types' => 'page',
	), $url ) );
	echo '<a href="' . esc_url( $sp ) . '" rel="nofollow">Site Pages</a>';
	?>
	</div>

<?php
}

/**
 * ACF GOOGLE API REG.
 * for google map on Contact.
 */
function bdcmoth_acf_init() {
	acf_update_setting( 'google_api_key', 'AIzaSyD7OiahJTYAqNlw4Fznm2bNLgZ5e7V-vKg' );
}
add_action( 'acf/init', 'bdcmoth_acf_init' );
