<?php
/**
 * Custom template tags for this theme
 *
 * @subpackage Medical Care
 * @since 1.0
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

if ( ! function_exists( 'medical_care_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function medical_care_entry_footer() {

	$medical_care_separate_meta = __( ', ', 'medical-care' );
	$medical_care_categories_list = get_the_category_list( $medical_care_separate_meta );
	$medical_care_tags_list = get_the_tag_list( '', $medical_care_separate_meta );
	if ( ( ( medical_care_categorized_blog() && $medical_care_categories_list ) || $medical_care_tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';

			medical_care_edit_link();

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;

if ( ! function_exists( 'medical_care_edit_link' ) ) :
function medical_care_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'medical-care' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

function medical_care_categorized_blog() {
	$medical_care_category_count = get_transient( 'medical_care_categories' );

	if ( false === $medical_care_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$medical_care_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$medical_care_category_count = count( $medical_care_categories );

		set_transient( 'medical_care_categories', $medical_care_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $medical_care_category_count > 1;
}

if ( ! function_exists( 'medical_care_the_custom_logo' ) ) :

function medical_care_the_custom_logo() {
	the_custom_logo();
}
endif;

function medical_care_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'medical_care_categories' );
}
add_action( 'edit_category', 'medical_care_category_transient_flusher' );
add_action( 'save_post',     'medical_care_category_transient_flusher' );
