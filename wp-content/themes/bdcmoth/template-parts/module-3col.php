<?php
/**
 * Three Column Insert Module
 *
 * @package BDCMoth
 */

?>

<div class="module three-col cf<?php if ( get_sub_field( 'css_class' ) ) : ?>
<?php echo ' '; ?>
<?php the_sub_field( 'css_class' ); ?><?php endif; ?>"
<?php if ( get_sub_field( 'onpage_menu_target' ) ) : ?>
 id="<?php the_sub_field( 'onpage_menu_target' ); ?>"
<?php endif; ?>
>

	<div class="inner-wrap-medium">

		<h3 class="columns-title"><?php the_sub_field( 'threecol_head' ); ?></h3>

		<div class="columns cf">

			<div class="col-1-3 first">
				<?php the_sub_field( 'threecol_left_col' ); ?>
			</div>

			<div class="col-1-3">
				<?php the_sub_field( 'threecol_mid_col' ); ?>
			</div>

			<div class="col-1-3">
				<?php the_sub_field( 'threecol_right_col' ); ?>
			</div>

			<div class="cf"></div>
		</div>

	</div>

</div>
