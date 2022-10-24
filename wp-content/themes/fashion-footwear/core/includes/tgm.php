<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function fashion_footwear_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'fashion-footwear' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	fashion_footwear_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'fashion_footwear_register_recommended_plugins' );