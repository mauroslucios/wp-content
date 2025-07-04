<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Hospital Management
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses hospital_management_header_style()
 */
function hospital_management_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'hospital_management_custom_header_args', array(
		'header-text'            => false,
		'width'                  => 1600,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'hospital_management_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'hospital_management_custom_header_setup' );

if ( ! function_exists( 'hospital_management_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see hospital_management_custom_header_setup().
	 */
	function hospital_management_header_style() {
		$header_text_color = get_header_textcolor(); ?>

		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.main-header {
					background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
					background-position: center top !important;
				    background-size: cover !important;
				}
			<?php endif; ?>
		</style>
		
		<?php
	}
endif;