<?php 
/**
* Pricing Section Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
	$wp_customize->add_section( 'pricing_section_settings',
		array(
			'title'       => esc_html__( 'Pricing Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 8,
			'divider' => 'before',
		)
	);

	// Show/Hide Section
	$wp_customize->add_setting( 'pricing_section_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'pricing_section_enable',
		array(
			'label'         => esc_html__( 'Show/hide Pricing Section', 'bizes' ),
			'description'   => esc_html__( 'Turn On/Off the switch to show/hide pricing section on front page.', 'bizes' ),
			'section'  => 'pricing_section_settings',

		)
	) );

	// Headings
	$wp_customize->add_setting( 'headings_pricing_section',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_pricing_section',
			array(
				'label' => esc_html__( 'Section Headings', 'bizes' ),
				'type' => 'heading',
				'section' => 'pricing_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
		// Sub Title
		$wp_customize->add_setting( 'pricing_section_subtitle', 
			array(
				'default'           => esc_html__('Pricng Plan', 'bizes'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'pricing_section_subtitle', 
			array(
				'label'      => esc_html__('Sub Title', 'bizes'),
				'description'=> '',
				'section'    => 'pricing_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		//Title
		$wp_customize->add_setting( 'pricing_section_title', 
			array(
				'default'           => esc_html__('Choose the best Package ', 'bizes'),
				'sanitize_callback' => 'bizes_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'pricing_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'bizes' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'bizes' ),
				'section' => 'pricing_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			) 
		);

		// Description
		$wp_customize->add_setting( 'pricing_section_description', 
			array(
				'default'           => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'bizes'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'pricing_section_description', 
			array(
				'label'      => esc_html__('Description', 'bizes'),
				'section'    => 'pricing_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);


	// message
	$wp_customize->add_setting( 'pricing__message',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( new Bizes_Misc_Control( $wp_customize, 'pricing__message',
		array(
			'type'        => 'custom_message',
			'section'     => 'pricing_section_settings',
			'description' => __('<h4 class="customizer-group-heading-message">Add Pricing Plans</h4><p class="customizer-group-heading-message">To add pricing plans on front page Go to WordPrsss Admin>Themereps Helper>Pricing Plans. Add your plans under it.</p>', 'bizes' )
		)
	));

	// Headings
	$wp_customize->add_setting( 'heading_pricing_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_pricing_style',
			array(
				'label' => esc_html__( 'Style', 'bizes' ),
				'type' => 'heading',
				'section' => 'pricing_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Background color
	$wp_customize->add_setting( 'pricing_section_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'pricing_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'bizes' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Curved
	$wp_customize->add_setting( 'pricing_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'pricing_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on pricing section', 'bizes' ),
			'section'  => 'pricing_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('pricing_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );
	// Top Curve BG
	$wp_customize->add_setting( 'pricing_top_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'pricing_top_cruved_bg',
			array(
				'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') && 1 === get_theme_mod('pricing_top_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Bottom Curved
	$wp_customize->add_setting( 'pricing_bottom_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'pricing_bottom_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on pricing section', 'bizes' ),
			'section'  => 'pricing_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('pricing_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );
	// Bottom Curve BG
	$wp_customize->add_setting( 'pricing_bottom_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'pricing_bottom_cruved_bg',
			array(
				'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') && 1 === get_theme_mod('pricing_bottom_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'pricing_section_pt',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'pricing_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
			'section'           => 'pricing_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('pricing_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'pricing_section_pb',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'pricing_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
			'section'           => 'pricing_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('pricing_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );



