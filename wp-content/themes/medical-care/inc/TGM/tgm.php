<?php
	
load_template( get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php' );

/**
 * Recommended plugins.
 */
function medical_care_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Ovation Elements', 'medical-care' ),
			'slug'             => 'ovation-elements',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	medical_care_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'medical_care_register_recommended_plugins' );