<?php
/* Colors
----------------------------------------------------------------------*/
$wp_customize->add_section( 'site_color_settings',
	array(
		'priority'    => 2,
		'title'       => esc_html__( 'Color Settings', 'bizes' ),
		'description' => '',
		'panel'       => 'bizes_theme_options',
	)
);

	// Headings 
	$wp_customize->add_setting( 'theme_screen_color_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'theme_screen_color_heading',
			array(
				'label' => esc_html__( 'Theme Screen Colors', 'bizes' ),
				'type' => 'heading',
				'section' => 'site_color_settings',
			)
		) 
	);

	// Primary Color
	$wp_customize->add_setting( 'site_primary_color', array(
		  'default' => '#1da1f2',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_primary_color',
			array(
				'label'       => esc_html__( 'Primary Color', 'bizes' ),
				'section'     => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Secondary Color
	$wp_customize->add_setting( 'site_secondary_color', array(
		  'default' => '#3a3a3a',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_secondary_color',
			array(
				'label'       => esc_html__( 'Secondary Color', 'bizes' ),
				'section'     => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Body Text Color
	$wp_customize->add_setting( 'body_text_color', array(
		  'default' => '#666666',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'body_text_color',
			array(
				'label'   => esc_html__('Body Text Color', 'bizes'),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Heading Color
	$wp_customize->add_setting( 'site_heading_color', array(
		  'default' => '#19082D',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_heading_color',
			array(
				'label' => esc_html__('Headings Color', 'bizes'),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Heading- Navigation Colors
	$wp_customize->add_setting( 'site_nav_color_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'site_nav_color_heading',
			array(
				'label' => esc_html__( 'Navigation Colors', 'bizes' ),
				'type' => 'heading',
				'section' => 'site_color_settings',
			)
		) 
	);

	// Navigation Background Color
	$wp_customize->add_setting( 'navigation_bg', array(
			'default' => 'rgba(0, 0, 0, 0.15)',
			'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'navigation_bg',
			array(
				'label'   => esc_html__( 'Background', 'bizes' ),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Menu Color
	$wp_customize->add_setting( 'menu_link_color', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'menu_link_color',
			array(
				'label'       => esc_html__( 'Menu link color', 'bizes' ),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Menu Hover Color
	$wp_customize->add_setting( 'menu_hover_link_color', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'menu_hover_link_color',
			array(
				'label'       => esc_html__( 'Menu link hover color', 'bizes' ),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Submenu Background Color
	$wp_customize->add_setting( 'submenu_bg_color', array(
			'default' => '#ffffff',
			'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'submenu_bg_color',
			array(
				'label'   => esc_html__( 'Submenu Background', 'bizes' ),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Submenu Text Color
	$wp_customize->add_setting( 'submenu_text_color', array(
			'default' => '#666666',
			'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'submenu_text_color',
			array(
				'label'   => esc_html__( 'Submenu text color', 'bizes' ),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Submenu Hover Text Color
	$wp_customize->add_setting( 'submenu_hover_text_color', array(
			'default' => '#1da1f2',
			'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'submenu_hover_text_color',
			array(
				'label'   => esc_html__( 'Submenu hover text color', 'bizes' ),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);
}
// Heading
$wp_customize->add_setting( 'button_color_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Bizes_Simple_Notice_Custom_Control( 
		$wp_customize, 'button_color_heading',
		array(
			'label' => esc_html__( 'Button Colors', 'bizes' ),
			'type' => 'heading',
			'section' => 'site_color_settings',
		)
	) 
);

	// Button BG Color
	$wp_customize->add_setting( 'site_btn_bg_color', array(
		  'default' => '#1da1f2',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_btn_bg_color',
			array(
				'label'       => esc_html__( 'Button BG Color', 'bizes' ),
				'section'     => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Button Hover BG Color
	$wp_customize->add_setting( 'site_btn_bg_hcolor', array(
		  'default' => '#3a3a3a',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_btn_bg_hcolor',
			array(
				'label'       => esc_html__( 'Button Hover BG Color', 'bizes' ),
				'section'     => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){

	// Button Text Color
	$wp_customize->add_setting( 'site_btn_text_color', array(
		  'default' => '#ffffff',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_btn_text_color',
			array(
				'label'   => esc_html__('Button Text Color', 'bizes'),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Button Hover text color
	$wp_customize->add_setting( 'site_btn_hover_text_color', array(
		  'default' => '#ffffff',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_btn_hover_text_color',
			array(
				'label'   => esc_html__('Button Hover Text Color', 'bizes'),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Headings 
	$wp_customize->add_setting( 'achor_color_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'achor_color_heading',
			array(
				'label' => esc_html__( 'Anchor Colors', 'bizes' ),
				'type' => 'heading',
				'section' => 'site_color_settings',
			)
		) 
	);

	// Anchor Color
	$wp_customize->add_setting( 'site_anchor_color', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_anchor_color',
			array(
				'label'   => esc_html__('Anchor Color', 'bizes'),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

	// Anchor Color
	$wp_customize->add_setting( 'site_anchor_hcolor', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'site_anchor_hcolor',
			array(
				'label'   => esc_html__('Anchor Hover Color', 'bizes'),
				'section' => 'site_color_settings',
				'show_opacity' => true,
			)
		) 
	);

}