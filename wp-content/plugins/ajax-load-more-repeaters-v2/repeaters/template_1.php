<article id="post-<?php the_ID(); ?>" <?php post_class( 'tooltech cf' ); ?>>

	<div class="tooltech-focusareas">
		<?php bdcmoth_display_categories(); ?>
	</div>

	<div class="tooltech-content cf">

		<div class="tooltech-content-right col-2-3 nm pullright">
			<?php if ( get_field( 'publication_date' ) ) : ?>
				<div class="tt-date">
					<?php the_field( 'publication_date' ); ?>
				</div>
			<?php endif; ?>
			<h2 class="entry-title"><a href="<?php the_field( 'outbound_link' ); ?>" target="_blank" rel="noopener"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
		</div>

		<div class="tooltech-content-left col-1-3 nm">
			<?php bdcmoth_display_tags(); ?>
        	<div class="tt-content-left">
				<?php the_field( 'top_left_column' ); ?>
        	</div>
		</div>

	</div>


<?php if ( has_term( 'technology', 'tool_type' ) ) { ?>
	<div class="tooltech-dropblock cf">

		<div class="col-1-3 dropblock-left first">

			<h5><?php the_field( 'bottom_left_title' ); ?></h5>

			<ul class="ttdb">
				<?php
				while ( have_rows( 'bottom_left_content_blocks' ) ) :
					the_row();
					?>
					<li>
						<div class="ttdb-title">
							<?php the_sub_field( 'block_title' ); ?>
							<?php if ( get_sub_field( 'block_text' ) ) : ?>
								<div class="open-shut title-trigger"></div>
							<?php endif; ?>
						</div>
						<div class="ttdb-text">
						<?php
						if ( get_sub_field( 'block_text' ) ) :
							the_sub_field( 'block_text' );
						endif;
						?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>

		<div class="col-2-3 dropblock-right">
			<h5><?php the_field( 'bottom_right_title' ); ?></h5>
			<?php the_field( 'bottom_right_text' ); ?>
		</div>

	</div>

	<div class="open-shut block-trigger"></div>

<?php } ?>

</article>