<?php
/**
 * The template for displaying all single posts.
 *
 * @package bdcmoth
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>
	</main>
</div>

<?php
get_footer();
