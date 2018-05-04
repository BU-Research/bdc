<?php
/**
 * Theme Functions
 *
 * @package plugin-bdcmoth
 */

/**
 * Include select CPTs in Archive pages
 *
 * @param WP_Query $query WPQuery object.
 */
function bdcmoth_cpt_category_archives( $query ) {
	if ( $query->is_category() && $query->is_main_query() ) {
		$query->set( 'post_type',
			array(
				'post',
				'tool',
			)
		);
	}
	return $query;
}
add_filter( 'pre_get_posts', 'bdcmoth_cpt_category_archives' );



/**
 * ReWrite TOOL CPT permalink to be a custom field --> an outbound link
 * http://wpdevelopers.com/acf-external-permalink-field/
 *
 * @param WP_Query $link   Post type being queried.
 * @param WP_Query $post   Post object.
 */
function bdcmoth_permalink_links( $link, $post ) {
	if ( post_type_exists( 'tool' ) && 'tool' === $post->post_type ) :
		$meta = get_post_meta( $post->ID, 'outbound_link', true );
		// $meta = $post->_links_url;
		$url = esc_url( filter_var( $meta, FILTER_VALIDATE_URL ) );
		return $url ? $url : $link;
	else :
		return $link;
	endif;
}
add_filter( 'post_type_link', 'bdcmoth_permalink_links', 10, 2 );
