<?php
/**
 * Template Name: Focus Area
 *
 * @package BDCMoth
 */

add_filter( 'body_class', function( $classes ) {
	global $post;
	$post_slug = $post->post_name;
	return array_merge( $classes, array( $post_slug ) );
} );

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile;
		?>

	</main>
</div>

<?php
get_footer();
