<?php
/**
 * Template part for displaying the page header with the big background image.
 * Used by: Default, Research, Team, Engage, Tools, Contact.
 *
 * @package BDCMoth
 */

?>

<header class="page-header header-bg-image clear"
	<?php
	if ( has_post_thumbnail() ) :
	?>
	style="background-image: url('<?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?>');"
	<?php endif; ?>
>
	<div class="inner-wrap">
		<?php the_field( 'text_area' ); ?>
	</div>

	<?php if ( have_rows( 'images_area' ) ) : ?>
	<div class="inner-wrap-wide desktop-tablet-only">
		<div class="himages cf">
			<?php
			while ( have_rows( 'images_area' ) ) :
				the_row();
				?>
				<img src="<?php esc_url( the_sub_field( 'image' ) ); ?>" class="alignleft">
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( have_rows( 'on_page_menu' ) ) : ?>
	<div class="inner-wrap opm">
		<div class="onpage-menu">
		<?php
		while ( have_rows( 'on_page_menu' ) ) :
			the_row();
			?>
			<a class="<?php the_sub_field( 'link_class' ); ?>" href="#<?php the_sub_field( 'link_target' ); ?>"><?php the_sub_field( 'link_text' ); ?></a>
		<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>

</header>
