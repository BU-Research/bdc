<?php
/**
 * Team Custom Post Type, Taxonomies
 *
 * @package plugin-bdcmoth
 */

/**
 * Plugin_Bdcmoth_Team.
 */
class Plugin_Bdcmoth_Team {
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
			'name'                  => _x( 'Team', 'Post Type General Name', 'plugin-bdcmoth' ),
			'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'plugin-bdcmoth' ),
			'menu_name'             => __( 'Team', 'plugin-bdcmoth' ),
			'name_admin_bar'        => __( 'Team', 'plugin-bdcmoth' ),
			'archives'              => __( 'Team Members', 'plugin-bdcmoth' ),
			'attributes'            => __( 'Team Attributes', 'plugin-bdcmoth' ),
			'parent_item_colon'     => __( 'Parent Team:', 'plugin-bdcmoth' ),
			'all_items'             => __( 'All Team Members', 'plugin-bdcmoth' ),
			'add_new_item'          => __( 'Add New Team Member', 'plugin-bdcmoth' ),
			'add_new'               => __( 'Add New Team Member', 'plugin-bdcmoth' ),
			'new_item'              => __( 'New Team Member', 'plugin-bdcmoth' ),
			'edit_item'             => __( 'Edit Team Member', 'plugin-bdcmoth' ),
			'update_item'           => __( 'Update Team Member', 'plugin-bdcmoth' ),
			'view_item'             => __( 'View Team Member', 'plugin-bdcmoth' ),
			'view_items'            => __( 'View Teams', 'plugin-bdcmoth' ),
			'search_items'          => __( 'Search Teams', 'plugin-bdcmoth' ),
			'not_found'             => __( 'Not found', 'plugin-bdcmoth' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'plugin-bdcmoth' ),
			'featured_image'        => __( 'Featured Image', 'plugin-bdcmoth' ),
			'set_featured_image'    => __( 'Set featured image', 'plugin-bdcmoth' ),
			'remove_featured_image' => __( 'Remove featured image', 'plugin-bdcmoth' ),
			'use_featured_image'    => __( 'Use as featured image', 'plugin-bdcmoth' ),
			'insert_into_item'      => __( 'Insert into team', 'plugin-bdcmoth' ),
			'uploaded_to_this_item' => __( 'Uploaded to this team', 'plugin-bdcmoth' ),
			'items_list'            => __( 'Team list', 'plugin-bdcmoth' ),
			'items_list_navigation' => __( 'Team list navigation', 'plugin-bdcmoth' ),
			'filter_items_list'     => __( 'Filter team list', 'plugin-bdcmoth' ),
		);
		$args = array(
			'label'                 => __( 'Team', 'plugin-bdcmoth' ),
			'description'           => __( 'Team members for the BDC Moth site.', 'plugin-bdcmoth' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'revisions' ),
			'taxonomies'            => array( 'team_type', 'category', 'focus_areas' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'post',
		);

		register_post_type( 'team', $args );
	}

	/**
	 * Register the custom taxonomy.
	 *
	 * @return void
	 */
	public function register_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Team Type', 'Taxonomy General Name', 'plugin-bdcmoth' ),
			'singular_name'              => _x( 'Team Type', 'Taxonomy Singular Name', 'plugin-bdcmoth' ),
			'menu_name'                  => __( 'Team Types', 'plugin-bdcmoth' ),
			'all_items'                  => __( 'All Team Types', 'plugin-bdcmoth' ),
			'parent_item'                => __( 'Parent Team Type', 'plugin-bdcmoth' ),
			'parent_item_colon'          => __( 'Parent Team Type:', 'plugin-bdcmoth' ),
			'new_item_name'              => __( 'New Team Type', 'plugin-bdcmoth' ),
			'add_new_item'               => __( 'Add New Team Type', 'plugin-bdcmoth' ),
			'edit_item'                  => __( 'Edit Team Type', 'plugin-bdcmoth' ),
			'update_item'                => __( 'Update Team Type', 'plugin-bdcmoth' ),
			'view_item'                  => __( 'View Team Type', 'plugin-bdcmoth' ),
			'separate_items_with_commas' => __( 'Separate team types with commas', 'plugin-bdcmoth' ),
			'add_or_remove_items'        => __( 'Add or remove team types', 'plugin-bdcmoth' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'plugin-bdcmoth' ),
			'popular_items'              => __( 'Popular team types', 'plugin-bdcmoth' ),
			'search_items'               => __( 'Search team types', 'plugin-bdcmoth' ),
			'not_found'                  => __( 'Not Found', 'plugin-bdcmoth' ),
			'no_terms'                   => __( 'No team type', 'plugin-bdcmoth' ),
			'items_list'                 => __( 'Team Type list', 'plugin-bdcmoth' ),
			'items_list_navigation'      => __( 'Team Type list navigation', 'plugin-bdcmoth' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

		register_taxonomy( 'team_type', array( 'team' ), $args );

	}
}
