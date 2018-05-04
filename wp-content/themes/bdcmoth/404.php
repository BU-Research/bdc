<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package bdcmoth
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">

			<header class="page-header header-bg-image">
				<div class="inner-wrap">
					<h1 class="page-title"><?php esc_html_e( 'Page not found.', 'bdcmoth' ); ?></h1>
				</div>
			</header>

			<div class="page-content">
				<div class="inner-wrap">
					<p class="error-message"><?php esc_html_e( 'It looks like nothing was found at this location. Try the menu or a search?', 'bdcmoth' ); ?></p>
					<?php
						get_search_form();
					?>
				</div>
			</div>

		</section>

	</main>
</div>

<?php
get_footer();
