<?php

/**
 * Page Settings
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'page_settings',
	array(
		'priority'    => 7,
		'title'       => esc_html__( 'Page Settings', 'bizes' ),
		'panel'       => 'bizes_theme_options',
	)
);

// Page Layout
$wp_customize->add_setting( 'page_layout',
	array(
		'default' => 'no-sidebar',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_radio_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Image_Radio_Button_Custom_Control( $wp_customize, 'page_layout',
	array(
		'label'       => esc_html__( 'Page Layout', 'bizes' ),
		'description' => esc_html__( 'Page Layout, apply for all pages, exclude blog related pages and custom page templates.', 'bizes' ),
		'section'     => 'page_settings',
		'choices' => array(
			'left-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-left.png',
				'name' => __( 'Left Sidebar', 'bizes' )
			),
			'no-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-none.png',
				'name' => __( 'Fullwidth', 'bizes' )
			),
			'right-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-right.png',
				'name' => __( 'Right Sidebar', 'bizes' )
			)
		),
	)
) );

// Display comments on page.
$wp_customize->add_setting( 'page_comments_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'page_comments_display',
	array(
		'label'			=> esc_html__( 'Display page comments.', 'bizes' ),
		'description'	=> esc_html__( 'Check/Uncheck this switch to show/hide comments on page', 'bizes' ),
		'section'		=> 'page_settings',
	)
) );
