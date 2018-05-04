<?php
/**
 * Engage Area Module for Engage template
 *
 * @package BDCMoth
 */

$fl = get_sub_field_object( 'orientation' );
$layout = $fl['value'];

$clr = get_sub_field_object( 'color' );
$color = $clr['value'];
?>

<div class="inner-wrap-wide np">
<div class="engage-content opm-target <?php echo esc_html( $layout . ' ' . $color ); ?>"
<?php if ( get_sub_field( 'onpage_menu_target' ) ) : ?>
 id="<?php the_sub_field( 'onpage_menu_target' ); ?>"
<?php endif; ?>
>


<?php if ( 'left' === $layout ) : ?>

	<div class="col-1-2 first">
		<h2 data-aos="fade-up" data-aos-duration="200" class="section-title"><a href="<?php the_sub_field( 'engage_title_link' ); ?>"><?php the_sub_field( 'engage_title' ); ?></a></h2>
	</div>
	<div class="col-1-2">
		<div data-aos="fade-up" class="shape"></div>
		<div data-aos="fade-up" class="section-image">
			<img src="<?php the_sub_field( 'engage_image' ); ?>" alt="engage image">
		</div>
	</div>

<?php elseif ( 'right' === $layout ) : ?>

	<div class="col-1-2 pullright">
		<h2 data-aos="fade-up" data-aos-duration="200" class="section-title"><a href="<?php the_sub_field( 'engage_title_link' ); ?>"><?php the_sub_field( 'engage_title' ); ?></a></h2>
	</div>
	<div class="col-1-2 nm">
		<div data-aos="fade-up" class="shape"></div>
		<div data-aos="fade-up" class="section-image">
			<img src="<?php the_sub_field( 'engage_image' ); ?>" alt="engage image">
		</div>
	</div>

<?php endif; ?>

	<div class="cf"></div>
	<div class="col-3-5 silo">
		<div data-aos="fade-up" class="section-text">
			<?php the_sub_field( 'engage_text' ); ?>
		</div>
	</div>
	<div class="cf"></div>

</div>
</div>
