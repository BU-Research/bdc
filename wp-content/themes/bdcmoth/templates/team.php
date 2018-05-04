<?php
/**
 * Template Name: Team
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
			get_template_part( 'template-parts/header', 'featured-bg' );
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content">

				<div class="inner-wrap">
					<div class="top-block">
						<?php if ( get_field( 'top_intro' ) ) : ?>
							<h2><?php the_field( 'top_intro' ); ?></h2>
						<?php endif; ?>
					</div>
				</div>

				<?php
				$team1 = new WP_Query(array(
					'post_type' => 'team',
					'posts_per_page' => 6,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => array( // WPCS: slow query ok.
						array(
							'taxonomy' => 'team_type',
							'field' => 'slug',
							'terms' => 'director',
						),
					),
				) );
				?>

				<div class="inner-wrap-wide">
					<div class="directors">
						<?php
						$i = 0;
						while ( $team1->have_posts() ) :
							$team1->the_post();
							$i++;
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-1-3 nm dir top' . $i ); ?>  data-director="<?php echo esc_html( $i ); ?>">
								<div class="feat-img">
									<?php
									if ( get_the_post_thumbnail() ) :
										the_post_thumbnail( 'thumbnail' );
									else :
										?>
										<img src="<?php bloginfo( 'template_directory' ); ?>/images/d-team<?php echo( esc_html( rand( 1, 7 ) ) ); ?>.jpg" alt="<?php the_title(); ?>" class="size-thumbnail wp-post-image" />
									<?php endif; ?>
								</div>
								<div class="entry-meta">
									<h3><?php the_field( 'name' ); ?></h3>
									<h4><?php the_field( 'title_abbreviated' ); ?></h4>
								</div>
								<div class="cf"></div>
							</article>

							<!-- mobile only director modals -->
							<div class="director mobile mod<?php echo esc_html( $i ); ?>">
								<div class="mod-image">
									<div class="mi-shape"></div>
									<img src="<?php the_field( 'main_image' ); ?>">
								</div>
								<div class="close">
									<div class="x">X</div>
								</div>
								<div class="mod-content">
									<h3><?php the_field( 'name' ); ?></h3>
									<h4><?php the_field( 'title_full' ); ?></h4>
									<?php the_content(); ?>
								</div>
								<div class="mod-info">
									<h4><?php the_field( 'department' ); ?></h4>
									<?php the_field( 'address' ); ?>
									<a href="mailto:<?php the_field( 'email' ); ?>" class="line"><?php the_field( 'email' ); ?></a>
								</div>
							</div>

						<?php
						endwhile;
						wp_reset_postdata();
						$i = 0;
						?>

						<div class="cf"></div>

					</div>
				</div>


				<!-- desktop only director modals -->
				<div class="director-modals inner-wrap-wide np cf">

					<?php
					while ( $team1->have_posts() ) :
						$team1->the_post();
						$i++;
						?>

						<div class="director desk mod<?php echo esc_html( $i ); ?>">
							<div class="mod-image">
								<div class="mi-shape"></div>
								<img src="<?php the_field( 'main_image' ); ?>">
							</div>
							<div class="mod-info col-2-5 first">
								<h4><?php the_field( 'department' ); ?></h4>
								<?php the_field( 'address' ); ?>
								<a href="mailto:<?php the_field( 'email' ); ?>" class="line"><?php the_field( 'email' ); ?></a>
							</div>
							<div class="mod-content col-3-5">
								<div class="close">
									<div class="x">X</div>
								</div>
								<h3><?php the_field( 'name' ); ?></h3>
								<h4><?php the_field( 'title_full' ); ?></h4>
								<?php the_content(); ?>
							</div>
						</div>

					<?php
					endwhile;
					wp_reset_postdata();
					$i = 0;
					?>

				</div>
				<div class="cf"></div>

				<div class="team-members inner-wrap-wide">

					<?php the_content(); ?>

					<?php
					if ( have_rows( 'team_types' ) ) :
						while ( have_rows( 'team_types' ) ) :
							the_row();

							$term = get_sub_field( 'team_type_name' );
							echo '<h2>' . esc_html( $term->name ) . '</h2>';
							bdcmoth_categories_links();
							the_sub_field( 'ajax_load_more_shortcode' );

						endwhile;
					endif;
					?>

				</div>

			</div>

		</article>
		<?php endwhile; ?>

	</main>
</div>

<?php
get_footer();
