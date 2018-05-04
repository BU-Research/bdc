<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BDCMoth
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="page-header">

		<div class="inner-wrap-wide np cf">
			<?php
			if ( get_the_post_thumbnail() ) :
				the_post_thumbnail( 'full' );
			else :
				?>
				<img src="<?php bloginfo( 'template_directory' ); ?>/images/default-page-fi.jpg" alt="<?php the_title(); ?>" class="size-full wp-post-image" />
			<?php endif; ?>
			<div class="shape"></div>
		</div>


		<div class="inner-wrap rpm">

			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

			<?php
			$post_objects = get_field( 'related_pages_menu' );
			if ( $post_objects ) :
			?>
			<div class="related-pages-menu">
				<?php
				foreach ( $post_objects as $post ) :
					setup_postdata( $post );
					?>
					<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
				<?php endforeach; ?>
			</div>
			<?php
			wp_reset_postdata();
			endif;
			?>

		</div>


		<?php if ( have_rows( 'on_page_menu' ) ) : ?>
		<div class="inner-wrap opm">
			<div class="onpage-menu">
			<?php
			while ( have_rows( 'on_page_menu' ) ) :
				the_row();
				?>
				<a class="<?php the_sub_field( 'link_class' ); ?>" href="#<?php the_sub_field( 'link_target' ); ?>"><span><?php the_sub_field( 'link_text' ); ?></span></a>
			<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>

	</header>

	<div class="entry-content">

		<?php get_template_part( 'template-parts/content', 'modules' ); ?>
		<?php if ( ! empty( get_the_content() ) ) : ?>
			<div class="inner-wrap"><?php the_content(); ?></div>
		<?php endif; ?>

	</div>

</article>
