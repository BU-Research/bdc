<?php
/**
 * Info Insert Module
 *
 * @package BDCMoth
 */

?>

<div class="inner-wrap-wide np">

	<div class="module infoblock opm-target"
	<?php if ( get_sub_field( 'onpage_menu_target' ) ) : ?>
	 id="<?php the_sub_field( 'onpage_menu_target' ); ?>"
	<?php endif; ?>
>

		<div class="module-content">
			<div class="text">
				<h3><?php the_sub_field( 'info_block_title' ); ?></h3>
				<?php the_sub_field( 'info_block_text' ); ?>
			</div>
		</div>

		<div class="module-image">
			<img src="<?php the_sub_field( 'info_block_image' ); ?>" alt="info block image">
			<div class="lc-text">
				<?php the_sub_field( 'info_block_left_col' ); ?>
			</div>
		</div>

	<div class="shape"></div>
	</div>
</div>
