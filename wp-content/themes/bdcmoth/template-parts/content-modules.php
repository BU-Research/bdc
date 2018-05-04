<?php
/**
 * Load the ACF flexible fields
 *
 * @package BDCMoth
 */

while ( have_rows( 'content_modules' ) ) :
	the_row();

	switch ( get_row_layout() ) {

		case 'research_focus_area':
			require 'module-research-focusarea.php';
			break;

		case 'engage_content_area':
			require 'module-engage-contentarea.php';
			break;

		case 'slider':
			require 'module-slider.php';
			break;

		case 'quote':
			require 'module-quote.php';
			break;

		case 'link_internal':
			require 'module-link-internal.php';
			break;

		case 'link_external':
			require 'module-link-external.php';
			break;

		case 'info_block':
			require 'module-info.php';
			break;

		case 'statnum':
			require 'module-statnum.php';
			break;

		case 'one_column':
			require 'module-1col.php';
			break;

		case 'two_column':
			require 'module-2col.php';
			break;

		case 'three_column':
			require 'module-3col.php';
			break;
	}

endwhile;
