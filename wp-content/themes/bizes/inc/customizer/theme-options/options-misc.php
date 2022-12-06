<?php
/* Miscellaneous Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'bizes_misc_settings',
	array(
		'title'       => esc_html__( 'Misc Settings', 'bizes' ),
		'description' => '',
		'panel'       => 'bizes_theme_options',
		'priority'    => 8,
	)
);

//Container Width
$wp_customize->add_setting( 'container_width',
	array(
        'sanitize_callback' => 'bizes_sanitize_integer',
		'default'           => 1170,
		'transport' 		=> 'refresh',
	)
);
$wp_customize->add_control( new Bizes_Slider_Custom_Control( 
	$wp_customize, 'container_width', 
		array(
			'label'	    => esc_html__('Container Width(px)','bizes'),
			'type'      => 'range',
			'section'  => 'bizes_misc_settings',
			'input_attrs'    => array(
				'min' => 980,
				'max' => 1600,
				'step' => 1,
				'suffix' => 'px',
			),
		)
	)
);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Button Effects
	$wp_customize->add_setting( 'site_btn_effect',
		array(
			'default' => 'effect-1',
			'transport' => 'refresh',
			'sanitize_callback' => 'bizes_text_sanitization'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Text_Radio_Button_Custom_Control( 
			$wp_customize, 'site_btn_effect',
			array(
				'label'   => esc_html__( 'Button Effect', 'bizes' ),
				'section' => 'bizes_misc_settings',
				'choices' => array(
					'effect-1'   => esc_html__('Simple', 'bizes'),
					'effect-2' => esc_html__('Radial', 'bizes'),
				),
			)
		) 
	);
	// Button Border Radius 
	$wp_customize->add_setting( 'site_btn_bradius',
		array(
			'sanitize_callback' => 'bizes_sanitize_integer',
			'default'           => 3,
			'transport' 		=> 'refresh',
		)
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( 
		$wp_customize, 'site_btn_bradius', 
			array(
				'label'	    => esc_html__('Border Radius','bizes'),
				'type'      => 'range',
				'section'  => 'bizes_misc_settings',
				'input_attrs'    => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		)
	);
}