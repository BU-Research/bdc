<?php
/**
 * Filters for the Ajax Load More plugin.
 *
 * @package bdcmoth
 */

/**
 * CATEGORIES list ( TEAM Type Blocks - with ACF )
 * for [ajax_load_more]
 */
function bdcmoth_categories_links() {
	$categories = get_categories( array(
		'hide_empty' => true,
		'orderby' => 'name',
		'exclude' => '3', // no Uncategorized (4 for local)  (3 for 3rwd).
	) );

	$term = get_sub_field( 'team_type_name' );
	?>
	<div class="drop-wrap">
		<div class="trigger">Focus area:</div>
		<ul class="alm-filter-nav">
			<li>
				<a href="#all" data-target="filter-<?php echo esc_html( $term->slug ); ?>" repeater="template_2" data-post-type="team" data-category="" data-posts-per-page="6" data-taxonomy="team_type" data-taxonomy-terms="<?php echo esc_html( $term->slug ); ?>" data-taxonomy-operator="IN" data-post-not-in="5168,5174,5176" data-order="ASC" data-orderby="title" data-scroll="false" data-button-label="View more team members">All</a>
			</li>
			<?php foreach ( $categories as $category ) { ?>
				<li>
					<a href="#<?php echo esc_html( $category->slug ); ?>" data-target="filter-<?php echo esc_html( $term->slug ); ?>" data-repeater="template_2" data-post-type="team" data-category="<?php echo esc_html( $category->slug ); ?>" data-posts-per-page="6" data-taxonomy="team_type" data-taxonomy-terms="<?php echo esc_html( $term->slug ); ?>" data-taxonomy-operator="IN" data-taxonomy-relation="AND" data-post-not-in="5168,5174,5176" data-order="ASC" data-orderby="title" data-scroll="false" data-button-label="View more team members">
						<?php echo esc_html( $category->name ); ?>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php
}

/**
 * Tool_Type list ( TOOLS )
 * for [ajax_load_more]
 */
function bdcmoth_tool_type_list() {
	$tooltypes = get_terms( 'tool_type', array(
		'hide_empty' => true,
		'orderby' => 'name',
	) );
	?>
	<div class="radio-wrap"><form>
		<ul class="advanced-filter-menu" data-type="radio" data-parameter="taxonomy-terms">
			<li>
				<input id="layout-0" name="radio-group" value="" type="radio">
				<label for="layout-0"class="active">All</label>
			</li>
			<?php foreach ( $tooltypes as $tooltype ) { ?>
			<li>
				<input id="layout-<?php echo esc_html( $tooltype->slug ); ?>" name="radio-group" value="<?php echo esc_html( $tooltype->slug ); ?>" type="radio">
				<label for="layout-<?php echo esc_html( $tooltype->slug ); ?>"><?php echo esc_html( $tooltype->name ); ?></label>
			</li>
			<?php } ?>
		</ul>
	</form></div>
<?php
}

/**
 * CATEGORIES dropdown (TOOLS)
 * for [ajax_load_more]
 */
function bdcmoth_categories_dropdown() {
	$categories = get_categories( array(
		'hide_empty' => true,
		'orderby' => 'name',
		'exclude' => '3', // no Uncategorized (4 for local)  (3 for 3rwd).
	) );
	?>
	<div class="drop-wrap">
		<div class="trigger">Focus area:</div>
		<ul class="alm-filter-nav">
			<li>
				<a href="#all" repeater="template_1" data-post-type="tool" data-category="" data-posts-per-page="6" data-taxonomy="tool_type" data-order="ASC" data-orderby="title" data-scroll="false">All</a>
			</li>
			<?php foreach ( $categories as $category ) { ?>
				<li>
					<a href="#<?php echo esc_html( $category->slug ); ?>" data-repeater="template_1" data-post-type="tool" data-category="<?php echo esc_html( $category->slug ); ?>" data-posts-per-page="6" data-taxonomy="tool_type" data-order="ASC" data-orderby="title" data-scroll="false">
						<?php echo esc_html( $category->name ); ?>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
<?php
}

/**
 * Post_Layouts list ( NEWS )
 * for [ajax_load_more]
 */
function bdcmoth_post_layouts_list() {
	$postlayouts = get_terms( 'post_layout', array(
		'hide_empty' => true,
		'orderby' => 'name',
	) );
	?>
	<div class="radio-wrap"><form>
		<ul class="advanced-filter-menu" data-type="radio" data-parameter="taxonomy-terms">
			<li>
				<input id="layout-0" name="radio-group" value="" type="radio">
				<label for="layout-0"class="active">All</label>
			</li>
			<?php foreach ( $postlayouts as $postlayout ) { ?>
			<li>
				<input id="layout-<?php echo esc_html( $postlayout->slug ); ?>" name="radio-group" value="<?php echo esc_html( $postlayout->slug ); ?>" type="radio">
				<label for="layout-<?php echo esc_html( $postlayout->slug ); ?>"><?php echo esc_html( $postlayout->name ); ?></label>
			</li>
			<?php } ?>
		</ul>
	</form></div>
<?php
}









/*
 * Team_Type select dropdown ( TEAM - NOT USING )
 * for [ajax_load_more]
function bdcmoth_team_type_dropdown() {
	$types = get_terms( 'team_type', array(
		'hide_empty' => true,
		'orderby' => 'name',
		'exclude' => '27', // no directors (14 local)  (27 3rwd).
	) );
	?>
	<div class="select-wrap">
		Filter by:<br>
		<form>
		<select class="advanced-filter-menu" data-type="select" data-parameter="taxonomy-terms">
			<option value="">All</option>
			<?php foreach ( $types as $type ) { ?>
			<option value="<?php echo esc_html( $type->slug ); ?>:"><?php echo esc_html( $type->name ); ?></option>";
		<?php } ?>
		</select>
		</form>
	</div>
<?php
}
 */


/*
 * Tool_Type select dropdown - ( TOOLS - NOT USING )
 * for [ajax_load_more]
function bdcmoth_tool_type_dropdown() {
	$tooltypes = get_terms( 'tool_type', array(
		'hide_empty' => true,
		'orderby' => 'name',
	) );
	?>
	<div class="select-wrap">
		Filter by:<br>
		<form>
		<select class="advanced-filter-menu" data-type="select" data-parameter="taxonomy-terms">
			<option value="">All</option>
			<?php foreach ( $tooltypes as $tooltype ) { ?>
			<option value="<?php echo esc_html( $tooltype->slug ); ?>"><?php echo esc_html( $tooltype->name ); ?></option>";
			<?php } ?>
		</select>
		</form>
	</div>
<?php
}
 */


/*
 * Year select dropdown - ( NEWS - NOT USING )
 * for [ajax_load_more]
 *
 * @link https://stackoverflow.com/questions/7083123/populate-a-select-box-with-years-using-php/7083212
function bdcmoth_post_year_dropdown() {
	?>
	<div class="select-wrap">
		<h4>Archive</h4>
		<form><select class="advanced-filter-menu" data-type="select" data-parameter="year">
			<option value="" selected="selected">All</option>
			<?php for ( $i = date( 'Y' ); $i >= 2015 ; $i-- ) { ?>
				<option value="<?php echo esc_html( $i ); ?>"><?php echo esc_html( $i ); ?></option>
			<?php } ?>
		</select></form>
	</div>
<?php
}
 */
