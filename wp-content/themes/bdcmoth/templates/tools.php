<?php
/**
 * Template Name: Tools
 *
 * @package BDCMoth
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/header', 'featured-bg' );
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content">

				<div class="inner-wrap-wide">

					<?php the_content(); ?>

					<div class="query-filters cf">
						<?php bdcmoth_tool_type_list(); ?>
						<?php bdcmoth_categories_dropdown(); ?>
					</div>

				</div>

				<div class="inner-wrap">
					<?php the_field( 'alm_shortcode' ); ?>
				</div>

			</div>

		</article>
		<?php endwhile; ?>

	</main>
</div>

<?php
get_footer();
