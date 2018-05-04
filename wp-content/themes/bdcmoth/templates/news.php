<?php
/**
 * Template Name: News
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

				<header class="page-header header-bg-image"
					<?php
					if ( has_post_thumbnail() ) :
					?>
					style="background-image: url('<?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?>');"
					<?php endif; ?>
				>
					<div class="inner-wrap-medium">
						<?php
						$news = new WP_Query(array(
							'post_type' => 'post',
							'orderby'   => 'title',
							'order'     => 'ASC',
							'posts_per_page' => 1,
						) );

						while ( $news->have_posts() ) :
							$news->the_post();
							?>

							<div class="date">
								<?php
								if ( get_field( 'date' ) ) :
									the_field( 'date' );
								else :
									echo get_the_date();
								endif;
								?>
							</div>

							<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

							<?php if ( get_field( 'event_time' ) ) : ?>
								<div class="time"><?php the_field( 'event_time' ); ?></div>
							<?php endif; ?>

						<?php
						endwhile;
						wp_reset_postdata();
						?>

					</div>
				</header>

				<div class="entry-content">

					<div class="inner-wrap-medium">

						<?php the_content(); ?>

						<div class="query-filters cf">
							<?php bdcmoth_post_layouts_list(); ?>
						</div>

						<?php the_field( 'alm_shortcode' ); ?>

					</div>

				</div>

			</article>

		<?php endwhile; ?>

	</main>
</div>

<?php
get_footer();
