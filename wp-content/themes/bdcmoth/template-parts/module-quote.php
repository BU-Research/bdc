<?php
/**
 * Quote Insert Module
 *
 * @package BDCMoth
 */

?>

<div class="inner-wrap-wide np">

	<div class="module quote">
		<div class="module-content cf">

			<div class="module-image">
				<img src="<?php the_sub_field( 'quote_image' ); ?>" height="530" width="890" alt="quote image">
			</div>

			<div class="quote">&ldquo;</div>
			<div class="text">
				<?php the_sub_field( 'quote_text' ); ?>
			</div>

			<div class="name">
				<?php
				the_sub_field( 'quote_name' );
				if ( get_sub_field( 'quote_title' ) ) :
					?>
					<span>/</span>
					<div class="q-title"><?php the_sub_field( 'quote_title' ); ?></div>
				<?php endif; ?>
			</div>

		</div>
	</div>
	<div class="cf"></div>

</div>
