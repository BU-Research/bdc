<?php
/**
 * Link Insert Module for EXTERNAL linking
 *
 * @package BDCMoth
 */

?>

<div class="inner-wrap-wide np">

	<div class="module link">
		<div class="module-content">

			<div class="module-image">
				<img src="<?php the_sub_field( 'external_link_image' ); ?>" alt="an external link">
			</div>

			<div class="date"><?php the_sub_field( 'external_link_date' ); ?></div>
			<div class="text">
				<?php the_sub_field( 'external_link_text' ); ?>
			</div>

			<div class="readmore"><a href="<?php the_sub_field( 'external_link_url' ); ?>" class="arrow">Read Article</a></div>

		</div>
	</div>
	<div class="cf"></div>

<div>
