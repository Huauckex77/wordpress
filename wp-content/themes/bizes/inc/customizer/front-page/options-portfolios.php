<?php 
/**
* Portfolios Section Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/

	$wp_customize->add_section( 'portfolio_section_settings',
		array(
			'title'       => esc_html__( 'Portfolio Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 4,
			'divider' => 'before',
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'portfolio_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_section_enable',
			array(
				'label'         => esc_html__( 'Show/hide Portfolio Section', 'bizes' ),
				'description'   => esc_html__( 'Turn On/Off the switch to show/hide portfolio section on front page.', 'bizes' ),
				'section'  => 'portfolio_section_settings',

			)
		) );


		// Headings
		$wp_customize->add_setting( 'headings_portfolio_section',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_portfolio_section',
				array(
					'label' => esc_html__( 'Section Headings', 'bizes' ),
					'type' => 'heading',
					'section' => 'portfolio_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('portfolio_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Sub Title
		$wp_customize->add_setting( 'portfolio_section_subtitle', 
			array(
				'default'           => esc_html__('Latest Works', 'bizes'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'portfolio_section_subtitle', 
			array(
				'label'      => esc_html__('Sub Title', 'bizes'),
				'description'=> '',
				'section'    => 'portfolio_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		//Title
		$wp_customize->add_setting( 'portfolio_section_title', 
			array(
				'default'           => esc_html__('Check some of our <b>latest works</b>', 'bizes'),
				'sanitize_callback' => 'bizes_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'portfolio_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'bizes' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'bizes' ),
				'section' => 'portfolio_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			) 
		);

		// Description
		$wp_customize->add_setting( 'portfolio_section_description', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'portfolio_section_description', 
			array(
				'label'      => esc_html__('Description', 'bizes'),
				'section'    => 'portfolio_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);

	// Headings
	$wp_customize->add_setting( 'heading_portfolio_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_portfolio_style',
			array(
				'label' => esc_html__( 'Style', 'bizes' ),
				'type' => 'heading',
				'section' => 'portfolio_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	
	// Overlay color
	$wp_customize->add_setting( 'portfolio_overlay', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'portfolio_overlay',
			array(
				'label'   => esc_html__( 'Overlay Color', 'bizes' ),
				'section'     => 'portfolio_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
	// Open Lightbox?
	$wp_customize->add_setting( 'portfolio_lightbox_enable',
		array(
			'default' => 1,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_lightbox_enable',
		array(
			'label'         => esc_html__( 'Enable Lightbox?', 'bizes' ),
			'description'   => esc_html__( 'Turn On/Off the switch to show/hide large image on lightbox', 'bizes' ),
			'section'  => 'portfolio_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('portfolio_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );
}
	// Background color
	$wp_customize->add_setting( 'portfolio_section_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'portfolio_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'bizes' ),
				'section'     => 'portfolio_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Curved
	$wp_customize->add_setting( 'portfolio_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on portfolio section', 'bizes' ),
			'section'  => 'portfolio_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('portfolio_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );

	// Top Curve BG
	$wp_customize->add_setting( 'portfolio_top_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'portfolio_top_cruved_bg',
			array(
				'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
				'section'     => 'portfolio_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') && 1 === get_theme_mod('portfolio_top_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Bottom Curved
	$wp_customize->add_setting( 'portfolio_bottom_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_bottom_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on portfolio section', 'bizes' ),
			'section'  => 'portfolio_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('portfolio_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );

	// Bottom Curve BG
	$wp_customize->add_setting( 'portfolio_bottom_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'portfolio_bottom_cruved_bg',
			array(
				'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
				'section'     => 'portfolio_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') && 1 === get_theme_mod('portfolio_bottom_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'portfolio_section_pt',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'portfolio_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
			'section'           => 'portfolio_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('portfolio_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'portfolio_section_pb',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'portfolio_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
			'section'           => 'portfolio_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('portfolio_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );