<?php
/**
 * Site Options
 */

$wp_customize->add_panel( 'bizes_theme_options',
		array(
			'priority'       => 30,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__( 'Theme Options', 'bizes' ),
		)
	);


if ( ! function_exists( 'wp_get_custom_css' ) ) {  // Back-compat for WordPress < 4.7.

	/* Custom CSS Settings
	----------------------------------------------------------------------*/
	$wp_customize->add_section(
		'bizes_custom_code',
		array(
			'title' => __( 'Custom CSS', 'bizes' ),
			'panel' => 'bizes_theme_options',
		)
	);
	$wp_customize->add_setting(
		'bizes_custom_css',
		array(
			'default'           => '',
			'sanitize_callback' => 'bizes_sanitize_css',
			'type'              => 'option',
		)
	);


	$wp_customize->add_control(
		'bizes_custom_css',
		array(
			'label'   => __( 'Custom CSS', 'bizes' ),
			'section' => 'bizes_custom_code',
			'type'    => 'textarea'
		)
	);
} else {
	$wp_customize->get_section( 'custom_css' )->priority = 200;
}