<?php 
/**
 * Brands Section
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
	$wp_customize->add_section( 'brands_section_settings',
		array(
			'title'       => esc_html__( 'Brands Logo Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 9,
		)
	);

	// Show/Hide Section
	$wp_customize->add_setting( 'brands_section_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'brands_section_enable',
		array(
			'label'         => esc_html__( 'Show/hide Brands Section', 'bizes' ),
			'description'   => esc_html__( 'Turn On/Off the switch to show/hide brands logo section on front page.', 'bizes' ),
			'section'  => 'brands_section_settings',

		)
	) );

	// Headings
	$wp_customize->add_setting( 'headings_brands_section',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_brands_section',
			array(
				'label' => esc_html__( 'Section Headings', 'bizes' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

		//Sub Title
		$wp_customize->add_setting( 'brands_section_subtitle', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				//'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'brands_section_subtitle', 
			array(
				'label'      => esc_html__('Subtitle', 'bizes'),
				'description'=> '',
				'section'    => 'brands_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1===get_theme_mod('brands_section_enable')){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		//Title
		$wp_customize->add_setting( 'brands_section_title', 
			array(
				'default'           => '',
				'sanitize_callback' => 'bizes_sanitize_html',
				//'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'brands_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'bizes' ),
				'section' => 'brands_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);
		//Description
		$wp_customize->add_setting( 'brands_section_description', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				//'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'brands_section_description', 
			array(
				'label'      => esc_html__('Description', 'bizes'),
				'description'=> '',
				'section'    => 'brands_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1===get_theme_mod('brands_section_enable')){
						return true;
					} else {
						return false;
					}
				},
			)
		);
	// Headings
	$wp_customize->add_setting( 'headings_brands_logos',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_brands_logos',
			array(
				'label' => esc_html__( 'Brand Logos', 'bizes' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
 
		// Brand Logos
		$wp_customize->add_setting( 
			new Bizes_Control_Repeater_Setting( 
				$wp_customize, 
				'bizes_brands', 
				array(
					'default' => '',
					'sanitize_callback' => array( 'Bizes_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
				) 
			) 
		);
		$wp_customize->add_control(
			new Bizes_Control_Repeater(
				$wp_customize,
				'bizes_brands',
				array(
					'section'       => 'brands_section_settings',
					'label'         => esc_html__( 'Logos', 'bizes' ),
					'fields'  => array(
						'title' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Title', 'bizes' ),
						),
						'image' => array(
							'type'    => 'image',
							'label'   => __( 'Upload Logo', 'bizes' ),
						),
						'link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Link', 'bizes' ),
							'description' => esc_html__( 'Example: https://yoursite.com', 'bizes' ),
						),
						'checkbox' => array(
							'type'        => 'checkbox',
							'label'       => esc_html__( 'Open link in new tab', 'bizes' ),
						),
					),
					'row_label' => array(
						'type'  => 'field',
						'value' => esc_html__( 'logo', 'bizes' ),
						'field' => 'title'
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('brands_section_enable')){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);


	
	// Headings
	$wp_customize->add_setting( 'brands_carousel_headings',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'brands_carousel_headings',
			array(
				'label' => esc_html__( 'Carousel Controls', 'bizes' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);


		// Carousel Autoplay
		$wp_customize->add_setting( 'brands_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'bizes' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'brands_carousel_duration', 
			array(
				'sanitize_callback' => 'bizes_sanitize_number_range',
				'validate_callback' => 'bizes_validate_duration',
				'default'          	=> 3000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'brands_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'bizes' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'bizes' ),
				'section'           => 'brands_section_settings',
				'type'				=> 'number',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
				'input_attrs'		=> array(
					'min'	=> 1000,
					'max'	=> 20000,
					'step'	=> 500,
					),
			) 
		);

		// Carousel Loop
		$wp_customize->add_setting( 'brands_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'bizes' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'brands_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_nav',
			array(
				'label'       => esc_html__( 'Show Carousel Arrow?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'bizes' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'brands_carousel_dots',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_dots',
			array(
				'label'       => esc_html__( 'Show Carousel Dots?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'bizes' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

// Headings
	$wp_customize->add_setting( 'heading_brands_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_brands_style',
			array(
				'label' => esc_html__( 'Style', 'bizes' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Background color
	$wp_customize->add_setting( 'brands_section_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'brands_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'bizes' ),
				'section'     => 'brands_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Curved
	$wp_customize->add_setting( 'brands_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'brands_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on brands section', 'bizes' ),
			'section'  => 'brands_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('brands_section_enable') ){
					return true;
				} else {
					return false;
				}
			},

		)
	) );

	// Top Curve BG
	$wp_customize->add_setting( 'brands_top_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'brands_top_cruved_bg',
			array(
				'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
				'section'     => 'brands_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') && 1 === get_theme_mod('brands_top_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Bottom Curved
	$wp_customize->add_setting( 'brands_bottom_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'brands_bottom_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on brands section', 'bizes' ),
			'section'  => 'brands_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('brands_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );

	// Bottom Curve BG
	$wp_customize->add_setting( 'brands_bottom_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'brands_bottom_cruved_bg',
			array(
				'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
				'section'     => 'brands_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') && 1 === get_theme_mod('brands_bottom_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'brands_section_pt',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'brands_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
			'section'           => 'brands_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('brands_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'brands_section_pb',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'brands_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
			'section'           => 'brands_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('brands_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );