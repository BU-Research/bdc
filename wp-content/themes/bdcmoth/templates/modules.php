<?php
/**
 * Template Name: Flexible Content Modules
 * no main content! used on Research and Engage.
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
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php
				get_template_part( 'template-parts/header', 'featured-bg' );
				?>

				<div class="entry-content">

					<?php get_template_part( 'template-parts/content', 'modules' ); ?>
					<?php if ( ! empty( get_the_content() ) ) : ?>
						<div class="inner-wrap"><?php the_content(); ?></div>
					<?php endif; ?>

				</div>

			</article>

		<?php endwhile; ?>

	</main>
</div>

<?php
get_footer();
