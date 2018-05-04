<?php
/**
 * Template Name: Homepage
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

			<div class="inner-wrap-wide">
				<div class="top-shapes">
					<div class="home-shape-1" style="background-image: url(<?php the_field( 'logo_back' ); ?>)"></div>
					<div class="home-shape-2"></div>
				</div>
				<div class="home-shape-3"></div>
				<div class="home-shape-4"></div>
				<div class="home-shape-5"><div class="simg" style="background-image: url(<?php the_field( 'mid_page_image' ); ?>)"></div></div>
				<div class="home-shape-6" style="background-image: url(<?php the_field( 'bottom_image' ); ?>)"></div>
				<div class="home-shape-7"></div>
				<div class="home-shape-8"></div>
				<div class="home-shape-9"></div>
				<div class="home-shape-10"></div>
				<div class="home-shape-11"></div>
			</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<div class="inner-wrap">

						<div class="home-content">
							<?php the_content(); ?>
						</div>

						<div class="focus-menu">

							<div class="intro">
								<?php the_field( 'menu_intro' ); ?>
							</div>

							<ul>
							<?php
							if ( have_rows( 'focus_areas' ) ) :
								$i = 0;
								while ( have_rows( 'focus_areas' ) ) :
									the_row();
									$i++;
									?>
									<li class="fm fm<?php echo esc_html( $i ); ?>"><a href="#<?php the_sub_field( 'menu_label' ); ?>"><?php the_sub_field( 'menu_label' ); ?></a></li>
								<?php
								endwhile;
							endif;
							?>
							</ul>
							<?php
							if ( have_rows( 'focus_areas' ) ) :
								$i = 0;
								while ( have_rows( 'focus_areas' ) ) :
									the_row();
									$i++;
									?>
									<div class="focus-menu-panel fp<?php echo esc_html( $i ); ?>">
										<div class="panel-image col-3-4 pullright">
											<img src="<?php the_sub_field( 'panel_image' ); ?>">
										</div>
										<div class="panel-text col-1-4 nm">
											<?php the_sub_field( 'panel_text' ); ?>
										</div>
									</div>
								<?php
								endwhile;
							endif;
							?>
						</div><?php // end focus-menu. ?>

					</div>
				</div><?php // end entry-content. ?>

			</article>

		<?php endwhile; ?>
	</main>
</div>

<?php
get_footer();
