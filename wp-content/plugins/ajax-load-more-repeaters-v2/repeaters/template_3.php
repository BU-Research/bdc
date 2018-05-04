<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrap cf' ); ?>>

	<div class="post-image">
		<?php
		if ( get_the_post_thumbnail() ) :
			the_post_thumbnail( 'medium' );
		else :
			?>
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/default-fi-med.jpg" alt="<?php the_title(); ?>" class="size-medium wp-post-image" />
		<?php endif; ?>
	</div>

	<div class="post-content">
		<div class="date">
			<?php
			if ( get_field( 'date' ) ) :
				the_field( 'date' );
			else :
				echo get_the_date();
			endif;
			?>
		</div>

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<?php if ( get_field( 'description' ) ) : ?>
			<div class="description">
				<?php the_field( 'description' ); ?>
			</div>
		<?php endif; ?>
	</div>

</article>