<?php
/**
 * Custom header implementation
 */

function medical_care_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'medical_care_custom_header_args', array(
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header-img.png' ),
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'			 => true,
		'flex-height' 			 => true,
		'wp-head-callback'       => 'medical_care_header_style',
	) ) );
		register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header-img.png',
			'thumbnail_url' => '%s/assets/images/header-img.png',
			'description'   => __( 'Default Header Image', 'medical-care' ),
		),
	) );
}

add_action( 'after_setup_theme', 'medical_care_custom_header_setup' );

if ( ! function_exists( 'medical_care_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see medical_care_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'medical_care_header_style' );
function medical_care_header_style() {
	if ( get_header_image() ) :
	$medical_care_custom_css = "
        .header-image, .woocommerce-page .single-post-image {
			background-image:url('".esc_url(get_header_image())."');
			background-position: top;
			background-size:cover !important;
			background-repeat:no-repeat !important;
		}";
	   	wp_add_inline_style( 'medical-care-style', $medical_care_custom_css );
	endif;
}
endif; // medical_care_header_style

