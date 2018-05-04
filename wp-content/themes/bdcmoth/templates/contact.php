<?php
/**
 * Template Name: Contact
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

					<div class="inner-wrap">
					<?php
					if ( have_rows( 'contact_blocks' ) ) :
						while ( have_rows( 'contact_blocks' ) ) :
							the_row();
							?>
						<div class="contact-block cf">
							<h3><?php the_sub_field( 'title' ); ?></h3>
							<div class="col-1-2 first">
								<?php the_sub_field( 'left_col' ); ?>
							</div>
							<div class="col-1-2">
								<?php the_sub_field( 'right_col' ); ?>
							</div>
						</div>
						<?php
						endwhile;
					endif;
					?>
					</div>


					<div class="inner-wrap np">
						<div class="contact-signup-block cf">
							<div class="col-2-3 first">
								<?php the_field( 'signup_text' ); ?>
							</div>
						</div>
						<div class="signup-image">
							<img src="<?php the_field( 'signup_image' ); ?>">
						</div>
					</div>


					<div class="inner-wrap-wide np">
						<div class="contact-map">

							<?php
							$location = get_field( 'contact_map' );
							if ( ! empty( $location ) ) :
							?>
								<div class="acf-map">
									<div class="marker" data-lat="<?php echo esc_html( $location['lat'] ); ?>" data-lng="<?php echo esc_html( $location['lng'] ); ?>"></div>
								</div>
							<?php endif; ?>

							<div class="contact-map-info">
								<img src="<?php the_field( 'map_info_image' ); ?>" alt="info block image">
								<div class="info-text">
									<?php the_field( 'map_info_text' ); ?>
								</div>
							</div>

						</div>
					</div>

				</div><!-- .entry-content -->

			</article>

		<?php endwhile; ?>

	</main>
</div>

<?php
get_footer();
