<?php
/**
 * Two Column Insert Module
 *
 * @package BDCMoth
 */

?>

<div class="module two-col cf<?php if ( get_sub_field( 'css_class' ) ) : ?>
<?php echo ' '; ?>
<?php the_sub_field( 'css_class' ); ?><?php endif; ?>"
<?php if ( get_sub_field( 'onpage_menu_target' ) ) : ?>
 id="<?php the_sub_field( 'onpage_menu_target' ); ?>"
<?php endif; ?>
>

	<div class="inner-wrap-medium">

		<h3 class="columns-title"><?php the_sub_field( 'twocol_head' ); ?></h3>

		<div class="columns cf">

			<div class="col-1-2 first">
				<?php the_sub_field( 'twocol_left_col' ); ?>
			</div>

			<div class="col-1-2">
				<?php the_sub_field( 'twocol_right_col' ); ?>
			</div>

			<div class="cf"></div>
		</div>

	</div>

</div>
