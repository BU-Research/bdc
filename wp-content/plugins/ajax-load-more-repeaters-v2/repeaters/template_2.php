<article id="post-<?php the_ID(); ?>" <?php post_class( 'cards team-member' ); ?>>

	<div class="member-image" style="background-image: url(
<?php
if ( get_field( 'main_image' ) ) :
	the_field( 'main_image' );
else :
	bloginfo( 'template_directory' ); ?>/images/d-team<?php echo( rand( 1, 7 ) ); ?>.jpg
<?php endif; ?>
)"><a href="<?php the_field( 'image_url' ); ?>" target="_blank" rel="noopener"></a></div>

	<div class="white-back"></div>
	<div class="shapes"><div></div></div>

	<div class="member-content">
  
		<div class="entry-meta">
			<?php bdcmoth_display_team_types(); ?>
		</div>
	
		<h3 class="entry-title"><?php the_field( 'display_name' ); ?></h3>

    	<?php echo esc_html( excerpt( 30 ) ); ?>

	</div>

	<footer class="entry-footer">
		<?php bdcmoth_display_categories(); ?>
	</footer>

</article>