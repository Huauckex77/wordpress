<?php 
	
require_once (get_template_directory() .'/inc/tgm/class-tgm-plugin-activation.php');
if( ! function_exists( 'bizes_register_required_plugins' ) ) :
	/**
	 * Recommended plugins.
	*/
	function bizes_register_required_plugins() {
		$plugins = array(
			array(
			  'name'               => 'Themereps Helper',
			  'slug'               => 'themereps-helper',
			  'source'             => '',
			  'required'           => false,          
			  'force_activation'   => false,
			),
			array(
			  'name'               => 'Advanced Import',
			  'slug'               => 'advanced-import',
			  'source'             => '',
			  'required'           => false,          
			  'force_activation'   => false,
			),
			array(
			  'name'               => 'WooCommerce',
			  'slug'               => 'woocommerce',
			  'source'             => '',
			  'required'           => false,          
			  'force_activation'   => false,
			),
			array(
			  'name'               => 'Contact Form 7',
			  'slug'               => 'contact-form-7',
			  'source'             => '',
			  'required'           => false,          
			  'force_activation'   => false,
			),

		);

		$config = array(
				'id'           => 'bizes',
				'default_path' => '',
				'menu'         => 'tgmpa-install-plugins',
				'has_notices'  => true,
				'dismissable'  => true,
				'dismiss_msg'  => '',
				'is_automatic' => false,
				'message'      => '',
				'strings'      => array()
		);

		tgmpa( $plugins, $config );
	}
	
endif;
add_action( 'tgmpa_register', 'bizes_register_required_plugins' );