<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bdcmoth
 */

if ( ! function_exists( 'bdcmoth_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function bdcmoth_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'bdcmoth' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'bdcmoth' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;


/**
 * Displays ALL custom taxonomies for footer meta.
 */
if ( ! function_exists( 'bdcmoth_entry_taxonomies' ) ) :
	/**
	 * Blorps out HTML with meta information for custom taxonomies.
	 */
	function bdcmoth_entry_taxonomies() {

		global $post;

		$postlayout_list = get_the_term_list( $post->ID, 'postl_ayout' );
		if ( $postlayout_list ) :
			printf( '<div class="cat-links postlayout"><span class="screen-reader-text">%1$s</span><strong>%1$s:</strong> %2$s</div>',
				esc_html_x( 'Post Layout:', 'Used before post layout list.', 'bdcmoth' ),
				get_the_term_list( $post->ID, 'post_layout', '', _x( ', ', '$sep between list items.', 'bdcmoth' ) )
			);
		endif;

		$teamtype_list = get_the_term_list( $post->ID, 'team_type' );
		if ( $teamtype_list ) :
			printf( '<div class="cat-links teamlink"><span class="screen-reader-text">%1$s</span><strong>%1$s:</strong> %2$s</div>',
				esc_html_x( 'Team Type:', 'Used before team type list.', 'bdcmoth' ),
				get_the_term_list( $post->ID, 'team_type', '', _x( ', ', '$sep between list items.', 'bdcmoth' ) )
			);
		endif;

		$tooltype_list = get_the_term_list( $post->ID, 'tool_type' );
		if ( $tooltype_list ) :
			printf( '<div class="cat-links toollink"><span class="screen-reader-text">%1$s</span><strong>%1$s:</strong> %2$s</div>',
				esc_html_x( 'Tool Type:', 'Used before tool type list.', 'bdcmoth' ),
				get_the_term_list( $post->ID, 'tool_type', '', _x( ', ', '$sep between list items.', 'bdcmoth' ) )
			);
		endif;
	}
endif;


if ( ! function_exists( 'bdcmoth_display_categories' ) ) :
	/**
	 * Blorps out an HTML list of the categories.
	 */
	function bdcmoth_display_categories() {
		?>
		<div class="focusarea-links">
			<?php
			$categories = get_the_terms( $post->ID, 'category' );
			foreach ( $categories as $category ) :
			?>
				<a href="<?php echo esc_html( $category->slug ); ?>" rel="category tag" class="<?php echo esc_html( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
			<?php
			endforeach;
			?>
		</div>
	<?php
	}
endif;


if ( ! function_exists( 'bdcmoth_display_tags' ) ) :
	/**
	 * Blorps out an HTML list of tags.
	 */
	function bdcmoth_display_tags() {
		$get_tags = get_the_tags();
		if ( $get_tags ) {
		?>
		<div class="tag-links">
			<?php
			foreach ( $get_tags as $tag ) {
				echo '<span>#' . esc_html( $tag->name ) . '</span>';
			}
			?>
		</div>
		<?php
		}
	}
endif;


if ( ! function_exists( 'bdcmoth_display_team_types' ) ) :
	/**
	 * Blorps out an HTML list of the team_type custom taxonomies.
	 */
	function bdcmoth_display_team_types() {
		global $post;
		$teamtype_list = get_the_terms( $post->ID, 'team_type' );
		foreach ( $teamtype_list as $teamtype ) :
		?>
			<div class="<?php echo esc_html( $teamtype->slug ); ?>"><?php echo esc_html( $teamtype->description ); ?></div>
		<?php
		endforeach;
	}
endif;


if ( ! function_exists( 'bdcmoth_display_tool_types' ) ) :
	/**
	 * Blorps out an HTML list of the tool_type custom taxonomies.
	 */
	function bdcmoth_display_tool_types() {
		global $post;
		$tooltype_list = get_the_term_list( $post->ID, 'tool_type' );
		if ( $tooltype_list ) :
			printf( '<div class="cat-links toollink"><span class="screen-reader-text">%1$s</span><strong>%1$s:</strong> %2$s</div>',
				esc_html_x( 'Tool Type:', 'Used before tool type list.', 'bdcmoth' ),
				get_the_term_list( $post->ID, 'tool_type', '', _x( ', ', '$sep between list items.', 'bdcmoth' ) )
			);
		endif;
	}
endif;



/*
 * Display categories and tags, comments and edit link on post, team & tool listings.
 * For general use on default archive pages.
 */
if ( ! function_exists( 'bdcmoth_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bdcmoth_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() || 'team' === get_post_type() || 'tool' === get_post_type() ) {
			$categories_list = get_the_category_list( esc_html__( ', ', 'bdcmoth' ) );
			if ( $categories_list && bdcmoth_categorized_blog() ) {
				/* translators: used before list items, there is a space after the comma */
				printf( '<span class="cat-links">' . esc_html__( 'Focus Area: %1$s', 'bdcmoth' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'bdcmoth' ) );
			if ( $tags_list ) {
				/* translators: used before list items, there is a space after the comma */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged: %1$s', 'bdcmoth' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bdcmoth' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'bdcmoth' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


/*
 * Display page/post "Type"
 * For the left column of the Search template.
 */
if ( ! function_exists( 'bdcmoth_doc_type' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bdcmoth_doc_type() {
		if ( 'page' === get_post_type() ) {
			echo 'site page';
		} elseif ( 'post' === get_post_type() && has_term( 'news', 'post_layout' ) ) {
			echo 'news';
		} elseif ( 'post' === get_post_type() && has_term( 'event', 'post_layout' ) ) {
			echo 'events';
		} elseif ( 'tool' === get_post_type() && has_term( 'publication', 'tool_type' ) ) {
			echo 'publication';
		} elseif ( 'tool' === get_post_type() && has_term( 'technology', 'tool_type' ) ) {
			echo 'technology';
		} else {
			echo 'general information';
		}
	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bdcmoth_categorized_blog() {
	if ( false === (
	$all_the_cool_cats = get_transient( 'bdcmoth_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bdcmoth_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bdcmoth_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bdcmoth_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bdcmoth_categorized_blog.
 */
function bdcmoth_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bdcmoth_categories' );
}
add_action( 'edit_category', 'bdcmoth_category_transient_flusher' );
add_action( 'save_post',     'bdcmoth_category_transient_flusher' );
