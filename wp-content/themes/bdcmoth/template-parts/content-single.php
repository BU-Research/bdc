<?php
/**
 * Template part for displaying SINGLE posts - single.php
 *
 * @package BDCMoth
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header cf">
		<div class="inner-wrap-wide cf">

			<div class="col-1-8 first">&nbsp;</div>

			<div class="col-5-8 head-left">
				<div class="returnto">
					<a href="/news-events/">&larr; News + Events</a>
				</div>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<?php if ( get_field( 'register_button_url' ) ) : ?>
					<a class="button white" href="<?php the_field( 'register_button_url' ); ?>" target="_blank" rel="noopener"><?php the_field( 'register_button_text' ); ?></a>
				<?php endif; ?>
			</div>

			<div class="col-1-4 head-right">
				<div class="entry-meta">

					<div class="date">
						<?php
						if ( get_field( 'date' ) ) :
							the_field( 'date' );
						else :
							the_date();
						endif;
						?>
					</div>

					<?php if ( get_field( 'event_time' ) ) : ?>
						<div class="time"><?php the_field( 'event_time' ); ?></div>
					<?php endif; ?>

					<?php if ( get_field( 'description' ) ) : ?>
						<?php the_field( 'description' ); ?>
					<?php endif; ?>

				</div>

				<?php get_sidebar(); ?>

			</div>
		</div>

		<div class="inner-wrap-wide np excerpt-wrap cf">
			<?php
			if ( get_the_post_thumbnail() ) :
				the_post_thumbnail( 'full' );
			else :
			?>
				<img src="<?php bloginfo( 'template_directory' ); ?>/images/default-fi.jpg" alt="<?php the_title(); ?>" class="attachment-full size-full wp-post-image" />
			<?php endif; ?>

			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>

	</header>


	<div class="entry-content cf">
		<div class="inner-wrap-wide content-columns">

			<div class="col-2-3 first content-left">
				<?php the_content(); ?>
			</div>
			<div class="col-1-3"></div>
			<div class="cf"></div>


			<?php
			if ( have_rows( 'con_block' ) ) :
				while ( have_rows( 'con_block' ) ) :
					the_row();
					?>

					<div class="col-2-3 first content-left">
						<?php the_sub_field( 'left_col' ); ?>
					</div>

					<div class="col-1-3 content-right">
						<?php if ( get_sub_field( 'right_col_img' ) ) : ?>
							<div class="content-right-image">
								<img src="<?php the_sub_field( 'right_col_img' ); ?>" height="160" width="250">
								<div class="caption"><?php the_sub_field( 'right_col_cap' ); ?></div>
							</div>
						<?php endif; ?>
					</div>

					<?php
				endwhile;
			endif;
			?>

			<div class="cf"></div>
			<div class="taglist">
				<?php if ( get_field( 'tag_block_title' ) ) : ?>
					<h5><?php the_field( 'tag_block_title' ); ?></h5>
				<?php endif; ?>
				<?php bdcmoth_display_tags(); ?>
			</div>

		</div>
	</div>



	<div class="bdc-recent-posts">
		<div class="inner-wrap">

			<?php
			// Check for current post's post_layout taxonomies and add tax_query to the query arguments.
			$cats = wp_get_post_terms( get_the_ID(), 'post_layout' );
			$cats_ids = array();
			foreach ( $cats as $bdcmoth_related_cat ) {
				$cats_ids[] = $bdcmoth_related_cat->term_id;
			}

			if ( ! empty( $cats_ids ) ) {
				$args['category__in'] = $cats_ids;
				$current = $bdcmoth_related_cat->slug;

				if ( 'event' === $current ) :
					$currenttitle = 'Upcoming events';
				else :
					$currenttitle = 'Recent news';
				endif;
			}

			$args = array(
				'posts_per_page' => 3,
				'post__not_in'   => array( get_the_ID() ), // Exclude current post
				'no_found_rows'  => true, // We don't ned pagination so this speeds up the query.
			);
			?>

			<h4><?php echo esc_html( $currenttitle ); ?></h4>

			<?php
			$bdcmoth_query = new wp_query( $args );
			foreach ( $bdcmoth_query->posts as $post ) :
				setup_postdata( $post );
				?>

				<div class="bdc-recent col-1-3">
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<div class="excerpt">
						<?php the_excerpt(); ?>
					</div>

					<div class="date">
						<?php
						if ( get_field( 'date' ) ) :
							the_field( 'date' );
						else :
							the_date();
						endif;
						?>
					</div>

					<a href="<?php the_permalink(); ?>" class="button white">Continue</a>
				</div>
			<?php
			endforeach;
			wp_reset_postdata();
			?>

		</div>
	</div>

</article>
