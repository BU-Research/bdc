<?php
/**
 * Template part for displaying post archives - archive.php, index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bdcmoth
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-wrap">

		<header class="entry-header">
			<div class="inner-wrap">
				<?php

				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( 'post' === get_post_type() ) :
				?>

					<div class="entry-meta">
						<?php bdcmoth_posted_on(); ?>
					</div>

				<?php endif; ?>
			</div>
		</header>

		<div class="entry-content">
			<div class="inner-wrap">

				<?php
				if ( is_single() ) :

					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. */
							__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bdcmoth' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bdcmoth' ),
						'after'  => '</div>',
					) );

				else :

					the_excerpt();

				endif;
				?>

			</div>
		</div>
	</div>
</article>
