<?php
/**
 * Link Insert Module for INTERNAL linking
 *
 * @package BDCMoth
 */

$post_object = get_sub_field( 'article' );
if ( $post_object ) :
	$post = $post_object;
	setup_postdata( $post );
?>

<div class="inner-wrap-wide np">

	<div class="module link">
		<div class="module-content">

			<div class="module-image">
				<?php
				if ( get_the_post_thumbnail() ) :
					the_post_thumbnail( 'fullsize' );
				else :
					?>
					<img src="<?php bloginfo( 'template_directory' ); ?>/images/default-fi-med.jpg" alt="<?php the_title(); ?>" class="size-medium wp-post-image" />
				<?php endif; ?>
			</div>

			<div class="date">
				<?php
				if ( get_field( 'date' ) ) :
					the_field( 'date' );
				else :
					the_date();
				endif;
				?>
			</div>

			<div class="text"><?php the_title(); ?></div>

			<div class="readmore"><a href="<?php the_permalink(); ?>" class="arrow">Read Article</a></div>

		</div>
	</div>

</div>

<?php
wp_reset_postdata();
endif;
