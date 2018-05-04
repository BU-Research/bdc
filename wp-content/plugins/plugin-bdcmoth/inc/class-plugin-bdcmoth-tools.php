<?php
/**
 * Tool Custom Post Type, Taxonomies
 *
 * @package plugin-bdcmoth
 */

/**
 * Plugin_Bdcmoth_Tool.
 */
class Plugin_Bdcmoth_Tools {
	/**
	 * Action and filters Hooks.
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'init', array( $this, 'register_taxonomy' ) );
	}

	/**
	 * Register the custom post type.
	 *
	 * @return void
	 */
	public function register_post_type() {
		$labels = array(
			'name'                  => _x( 'Tool', 'Post Type General Name', 'plugin-bdcmoth' ),
			'singular_name'         => _x( 'Tool', 'Post Type Singular Name', 'plugin-bdcmoth' ),
			'menu_name'             => __( 'Tools/Tech', 'plugin-bdcmoth' ),
			'name_admin_bar'        => __( 'Tool', 'plugin-bdcmoth' ),
			'archives'              => __( 'Tools', 'plugin-bdcmoth' ),
			'attributes'            => __( 'Tool Attributes', 'plugin-bdcmoth' ),
			'parent_item_colon'     => __( 'Parent Tool:', 'plugin-bdcmoth' ),
			'all_items'             => __( 'All Tools', 'plugin-bdcmoth' ),
			'add_new_item'          => __( 'Add New Tool', 'plugin-bdcmoth' ),
			'add_new'               => __( 'Add New Tool', 'plugin-bdcmoth' ),
			'new_item'              => __( 'New Tool', 'plugin-bdcmoth' ),
			'edit_item'             => __( 'Edit Tool', 'plugin-bdcmoth' ),
			'update_item'           => __( 'Update Tool', 'plugin-bdcmoth' ),
			'view_item'             => __( 'View Tool', 'plugin-bdcmoth' ),
			'view_items'            => __( 'View Tools', 'plugin-bdcmoth' ),
			'search_items'          => __( 'Search Tools', 'plugin-bdcmoth' ),
			'not_found'             => __( 'Not found', 'plugin-bdcmoth' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'plugin-bdcmoth' ),
			'featured_image'        => __( 'Featured Image', 'plugin-bdcmoth' ),
			'set_featured_image'    => __( 'Set featured image', 'plugin-bdcmoth' ),
			'remove_featured_image' => __( 'Remove featured image', 'plugin-bdcmoth' ),
			'use_featured_image'    => __( 'Use as featured image', 'plugin-bdcmoth' ),
			'insert_into_item'      => __( 'Insert into tool', 'plugin-bdcmoth' ),
			'uploaded_to_this_item' => __( 'Uploaded to this tool', 'plugin-bdcmoth' ),
			'items_list'            => __( 'Tool list', 'plugin-bdcmoth' ),
			'items_list_navigation' => __( 'Tool list navigation', 'plugin-bdcmoth' ),
			'filter_items_list'     => __( 'Filter tool list', 'plugin-bdcmoth' ),
		);
		$args = array(
			'label'                 => __( 'Tool', 'plugin-bdcmoth' ),
			'description'           => __( 'Tools and Tech info.', 'plugin-bdcmoth' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'revisions' ),
			'taxonomies'            => array( 'tool_type', 'category', 'post_tag', 'focus_areas' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-admin-tools',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);

		register_post_type( 'tool', $args );
	}

	/**
	 * Register the custom taxonomy.
	 *
	 * @return void
	 */
	public function register_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Tool Type', 'Taxonomy General Name', 'plugin-bdcmoth' ),
			'singular_name'              => _x( 'Tool Type', 'Taxonomy Singular Name', 'plugin-bdcmoth' ),
			'menu_name'                  => __( 'Tool Types', 'plugin-bdcmoth' ),
			'all_items'                  => __( 'All Tool Types', 'plugin-bdcmoth' ),
			'parent_item'                => __( 'Parent Tool Type', 'plugin-bdcmoth' ),
			'parent_item_colon'          => __( 'Parent Tool Type:', 'plugin-bdcmoth' ),
			'new_item_name'              => __( 'New Tool Type', 'plugin-bdcmoth' ),
			'add_new_item'               => __( 'Add New Tool Type', 'plugin-bdcmoth' ),
			'edit_item'                  => __( 'Edit Tool Type', 'plugin-bdcmoth' ),
			'update_item'                => __( 'Update Tool Type', 'plugin-bdcmoth' ),
			'view_item'                  => __( 'View Tool Type', 'plugin-bdcmoth' ),
			'separate_items_with_commas' => __( 'Separate tool types with commas', 'plugin-bdcmoth' ),
			'add_or_remove_items'        => __( 'Add or remove tool types', 'plugin-bdcmoth' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'plugin-bdcmoth' ),
			'popular_items'              => __( 'Popular tool types', 'plugin-bdcmoth' ),
			'search_items'               => __( 'Search tool types', 'plugin-bdcmoth' ),
			'not_found'                  => __( 'Not Found', 'plugin-bdcmoth' ),
			'no_terms'                   => __( 'No tool types', 'plugin-bdcmoth' ),
			'items_list'                 => __( 'Tool Type list', 'plugin-bdcmoth' ),
			'items_list_navigation'      => __( 'Tool Type list navigation', 'plugin-bdcmoth' ),
		);
		$rewrite = array(
			'slug'                       => 'tool-type',
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

		register_taxonomy( 'tool_type', array( 'tool' ), $args );

	}
}
