<?php
/**
 * Focus Area Module for Research template
 *
 * @package BDCMoth
 */

$fa = get_sub_field_object( 'focus_area' );
$focusarea = $fa['value'];

$fl = get_sub_field_object( 'orientation' );
$layout = $fl['value'];
?>

<div class="inner-wrap-wide np">

	<div data-aos="fade-up" class="research-focusarea opm-target <?php echo esc_html( $focusarea . ' ' . $layout ); ?>"
	<?php if ( get_sub_field( 'onpage_menu_target' ) ) : ?>
	 id="<?php the_sub_field( 'onpage_menu_target' ); ?>"
	<?php endif; ?>
>

		<div class="section-head">
			<h2 data-aos="fade-up" class="section-title"><a href="/<?php echo esc_html( $focusarea ); ?>/"><?php echo esc_html( $focusarea ); ?></a></h2>

			<div data-aos="fade-up" class="section-team cf">
				<?php
				$team = new WP_Query(array(
					'post_type' => 'team',
					'category_name' => $focusarea,
					'posts_per_page' => 4,
				) );

				while ( $team->have_posts() ) :
					$team->the_post();
					?>

					<div class="research-member-image">
						<?php
						if ( get_the_post_thumbnail() ) :
							the_post_thumbnail( 'thumbnail' );
						else :
							?>
							<img src="<?php bloginfo( 'template_directory' ); ?>/images/d-team<?php echo( esc_html( rand( 1, 7 ) ) ); ?>.jpg" alt="<?php the_title(); ?>" class="size-thumbnail wp-post-image" />
						<?php endif; ?>
					</div>

					<?php
				endwhile;
				wp_reset_postdata();

				$teamcount = $team->found_posts;
				$teamplus = ( $teamcount - 4 );
				echo '<span class="count">+' . esc_html( $teamplus ) . '</span>';
				?>

				<div class="cf"></div>
				<a href="/team/">Meet the team &rarr;</a>
			</div>
		</div>


		<?php if ( 'left' === $layout ) : ?>

			<div data-aos="fade-up" class="section-image">
				<img src="<?php the_sub_field( 'focus_area_image' ); ?>" alt="focus area image">
			</div>
			<div class="cf"></div>
			<div data-aos="fade-up" class="section-text col-3-5 silo">
				<?php the_sub_field( 'focus_area_text' ); ?>
			</div>

		<?php elseif ( 'right' === $layout ) : ?>

			<div data-aos="fade-up" class="col-1-2 nm">
				<div class="section-image">
					<img src="<?php the_sub_field( 'focus_area_image' ); ?>" alt="focus area image">
				</div>
			</div>
			<div class="cf"></div>
			<div data-aos="fade-up" class="section-text col-3-5 pullright">
				<?php the_sub_field( 'focus_area_text' ); ?>
			</div>

		<?php endif; ?>


		<div class="cf"></div>
		<div class="section-news cf">
			<?php
			$news = new WP_Query(array(
				'post_type' => 'post',
				'category_name' => $focusarea,
				'posts_per_page' => 1,
				'tax_query' => array( // WPCS: slow query ok.
					array(
						'taxonomy' => 'post_layout',
						'field' => 'slug',
						'terms' => 'news',
					),
				),
			) );

			while ( $news->have_posts() ) :
				$news->the_post();
				?>

				<div data-aos="fade-up" class="research-news-image">
					<?php
					if ( get_the_post_thumbnail() ) :
						the_post_thumbnail( 'medium' );
					else :
						?>
						<img src="<?php bloginfo( 'template_directory' ); ?>/images/default-fi-med.jpg" alt="<?php the_title(); ?>" class="size-medium wp-post-image" />
					<?php endif; ?>
				</div>

				<div data-aos="fade-up" class="research-news-text">
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

					<?php if ( get_field( 'description' ) ) : ?>
						<div class="description">
							<?php the_field( 'description' ); ?>
						</div>
					<?php endif; ?>
				</div>

			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>

</div>
