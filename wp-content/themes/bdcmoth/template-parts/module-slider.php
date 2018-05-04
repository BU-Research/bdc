<?php
/**
 * Slider Module
 *
 * @package BDCMoth
 */

?>
<div class="slider-wrap<?php if ( get_sub_field( 'css_class' ) ) : ?>
<?php echo ' '; ?>
<?php the_sub_field( 'css_class' ); ?><?php endif; ?>">
	<div class="inner-wrap-xwide np">
		<div class="bdc-slider <?php the_sub_field( 'border_color' ); ?>">
			<?php
			if ( have_rows( 'slider_images' ) ) :
				while ( have_rows( 'slider_images' ) ) :
					the_row();
					?>
					<img src="<?php the_sub_field( 'slider_image' ); ?>" height="525" width="1270" alt="slider image">
				<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</div>
