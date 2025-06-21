<?php
	
load_template( get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php' );

/**
 * Recommended plugins.
 */
function beauty_salon_spa_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'WooCommerce', 'beauty-salon-spa' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Ovation Elements', 'beauty-salon-spa' ),
			'slug'             => 'ovation-elements',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	beauty_salon_spa_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'beauty_salon_spa_register_recommended_plugins' );