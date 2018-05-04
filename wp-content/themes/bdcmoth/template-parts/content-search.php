<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package BDCMoth
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result cf' ); ?>>

	<div class="col-1-5 first posttype">
		<?php bdcmoth_doc_type(); ?>
	</div>

	<div class="col-4-5">

		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php relevanssi_the_permalink(); ?>" rel="bookmark"><?php relevanssi_the_title(); ?></a></h2>
		</header>

		<div class="date">
			<?php
			if ( get_field( 'date' ) ) :
				the_field( 'date' );
			else :
				echo get_the_date();
			endif;
			?>
		</div>
		<?php if ( get_field( 'event_time' ) ) : ?>
			<div class="time"><?php the_field( 'event_time' ); ?></div>
		<?php endif; ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>

	</div>

</article>
