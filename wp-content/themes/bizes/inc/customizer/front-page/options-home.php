<?php 
	
$wp_customize->add_panel( 'bizes_frontpage_settings',
	array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Front Page Settings', 'bizes' ),
		'description'    => '',
	)
);












