<?php
/**
 * Post Layout Custom Taxonomy
 *
 * @package plugin-bdcmoth
 */

/**
 * Plugin_Bdcmoth_Postlayouts.
 */
class Plugin_Bdcmoth_Postlayouts {
	/**
	 * Action and filters Hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'init', array( $this, 'register_taxonomy' ) );
	}

	/**
	 * Register the custom taxonomy.
	 *
	 * @return void
	 */
	public function register_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Post Layout', 'Taxonomy General Name', 'plugin-bdcmoth' ),
			'singular_name'              => _x( 'Post Layout', 'Taxonomy Singular Name', 'plugin-bdcmoth' ),
			'menu_name'                  => __( 'Post Layouts', 'plugin-bdcmoth' ),
			'all_items'                  => __( 'All Post Layouts', 'plugin-bdcmoth' ),
			'parent_item'                => __( 'Parent Post Layout', 'plugin-bdcmoth' ),
			'parent_item_colon'          => __( 'Parent Post Layout:', 'plugin-bdcmoth' ),
			'new_item_name'              => __( 'New Post Layout', 'plugin-bdcmoth' ),
			'add_new_item'               => __( 'Add New Post Layout', 'plugin-bdcmoth' ),
			'edit_item'                  => __( 'Edit Post Layout', 'plugin-bdcmoth' ),
			'update_item'                => __( 'Update Post Layout', 'plugin-bdcmoth' ),
			'view_item'                  => __( 'View Post Layout', 'plugin-bdcmoth' ),
			'separate_items_with_commas' => __( 'Separate post layouts with commas', 'plugin-bdcmoth' ),
			'add_or_remove_items'        => __( 'Add or remove post layouts', 'plugin-bdcmoth' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'plugin-bdcmoth' ),
			'popular_items'              => __( 'Popular post layouts', 'plugin-bdcmoth' ),
			'search_items'               => __( 'Search post layouts', 'plugin-bdcmoth' ),
			'not_found'                  => __( 'Not Found', 'plugin-bdcmoth' ),
			'no_terms'                   => __( 'No post layouts', 'plugin-bdcmoth' ),
			'items_list'                 => __( 'Post Layout list', 'plugin-bdcmoth' ),
			'items_list_navigation'      => __( 'Post Layout list navigation', 'plugin-bdcmoth' ),
		);
		$rewrite = array(
			'slug'                       => 'post-layout',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);

		register_taxonomy( 'post_layout', array( 'post' ), $args );

	}

}
