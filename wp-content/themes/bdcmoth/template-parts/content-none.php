<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BDCMoth
 */

?>

<section class="no-results not-found">

	<header class="page-header header-bg-image">
		<div class="inner-wrap">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'bdcmoth' ); ?></h1>
		</div>
	</header>

	<div class="page-content">
		<div class="inner-wrap">

			<?php if ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bdcmoth' ); ?></p>
				<?php
					get_search_form();

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bdcmoth' ); ?></p>
				<?php
				get_search_form();

			endif;
			?>

		</div>
	</div>

</section>
