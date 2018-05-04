<?php
/**
 * One Column Insert Module
 *
 * @package BDCMoth
 */

?>

<div class="outer-wrap<?php if ( get_sub_field( 'css_class' ) ) : ?>
<?php echo ' '; ?>
<?php the_sub_field( 'css_class' ); ?><?php endif; ?>">

<div class="inner-wrap-wide">

<div class="module one-col opm-target cf"
<?php if ( get_sub_field( 'onpage_menu_target' ) ) : ?>
 id="<?php the_sub_field( 'onpage_menu_target' ); ?>"
<?php endif; ?>
>

	<?php the_sub_field( 'onecol_col' ); ?>

</div>
</div>
</div>
