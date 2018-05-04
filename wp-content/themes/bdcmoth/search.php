<?php
/**
 * The template for displaying search results pages.
 *
 * @package bdcmoth
 */

get_header();
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

			<header class="page-header header-bg-image">
				<div class="inner-wrap">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( '%s Results for', 'bdcmoth' ), '<span>' . esc_html( $wp_query->found_posts ) . '</span>' );
						?>
					</h1>
					<?php get_search_form(); ?>
				</div>
			</header>


			<div class="inner-wrap-medium">
				<div class="query-filters cf">
					<?php bdcmoth_search_filters(); ?>
					<?php //@codingStandardsIgnoreStart bdcmoth_post_year_dropdown(); ?>
				</div>
			</div>

			<div class="inner-wrap">
				<div class="col-3-4 silo">

					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => ( '' ),
							'next_text' => ( '' ),
						) );
					endif;
					?>

				</div>
			</div>

	</main>
</section>

<?php
get_footer();
