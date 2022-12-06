<?php 
/**
 * Funfacts Section
 * @since 1.0.0
 * ----------------------------------------------------------------------
*/

	$wp_customize->add_section( 'funfacts_section_settings',
		array(
			'title'       => esc_html__( 'Funfacts Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 3,
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'funfacts_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'funfacts_section_enable',
			array(
			    'label'         => esc_html__( 'Show/hide funfacts section', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide funfacts section on front page template', 'bizes' ),
				'section'  => 'funfacts_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'funfacts_heading_text',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'funfacts_heading_text',
				array(
					'label' => esc_html__( 'Funfacts', 'bizes' ),
					'type' => 'heading',
					'section' => 'funfacts_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('funfacts_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

	for( $i=1; $i<=4; $i++ ) {

		//Icon
		$wp_customize->add_setting(
			'funfact_icon_'.$i,
			array(
				'default'			=> 'icofont-coffee-mug',
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);

		$wp_customize->add_control( 'funfact_icon_'.$i,
			array(
				/* translators: %1$s is replaced with number */
				'label'       => sprintf( __('Funfact #%1$s', 'bizes'), $i),
				/* translators: %1$s is replaced with number */
				'description'       => sprintf( __('Select a icon from <a target="_blank" href="https://icofont.com/icons">IcoFont icons</a> and enter its class name. Example- icofont-coffee-mug', 'bizes'), $i),
				'section'		=> 'funfacts_section_settings',
				'type'			=> 'text',
				'active_callback' => function(){
					if( 1 === get_theme_mod('funfacts_section_enable')){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		//Number
		$wp_customize->add_setting( 'funfact_number_'.$i,
			array(
				'dafult'=> esc_html__('198', 'bizes'),
				'sanitize_callback'=> 'sanitize_text_field', 
			) 
		);
		$wp_customize->add_control( 'funfact_number_'.$i, 
			array(
				/* translators: %1$s is replaced with number */
				'description'   => sprintf( __('Funfact #%1$s Number', 'bizes'), $i),
				'type'    => 'text',
				'section' => 'funfacts_section_settings',
				'active_callback' => function(){
					if( 1 === get_theme_mod('funfacts_section_enable') ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	
		//Title
		$wp_customize->add_setting( 'funfact_title_'.$i,
			array(
				'dafult'           => esc_html__('Happy Clients', 'bizes'),
				'sanitize_callback'=> 'sanitize_text_field', 
			) 
		);
		$wp_customize->add_control( 'funfact_title_'.$i, 
			array(
				/* translators: %1$s is replaced with number */
				'description'       => sprintf( __('Funfact #%1$s Title', 'bizes'), $i),
				'type'        => 'text',
				'section'     => 'funfacts_section_settings',
				'active_callback' => function(){
					if( 1 === get_theme_mod('funfacts_section_enable') ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	}

	// Headings
	$wp_customize->add_setting( 'heading_funfacts_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_funfacts_style',
			array(
				'label' => esc_html__( 'Style', 'bizes' ),
				'type' => 'heading',
				'section' => 'funfacts_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('funfacts_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// BG Image 
	$wp_customize->add_setting( 'funfacts_section_bg_image',
		array(
			'default'           => get_template_directory_uri() . '/assets/img/funfacts/1.jpg',
			'sanitize_callback' => 'bizes_sanitize_image',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'funfacts_section_bg_image',
			array(
				'label'         => esc_html__( 'Background Image', 'bizes' ),
				'section'       => 'funfacts_section_settings',
				'type'          => 'image',
				'active_callback' => function(){
					if( 1===get_theme_mod( 'funfacts_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		)
	);

	// Overlay color
	$wp_customize->add_setting( 'funfacts_section_overlay', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'funfacts_section_overlay',
			array(
				'label'   => esc_html__( 'Overlay Color', 'bizes' ),
				'section'     => 'funfacts_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('funfacts_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Enable Parallax
	$wp_customize->add_setting( 'funfacts_parallax_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'funfacts_parallax_enable',
		array(
			'label'         => esc_html__( 'Enable Parallax', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable parallax effect', 'bizes' ),
			'section'  => 'funfacts_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('funfacts_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Top Curved
	$wp_customize->add_setting( 'funfacts_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'funfacts_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on funfacts section', 'bizes' ),
			'section'  => 'funfacts_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('funfacts_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Top Curve BG
	$wp_customize->add_setting( 'funfacts_top_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'funfacts_top_cruved_bg',
			array(
				'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
				'section'     => 'funfacts_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('funfacts_section_enable') && 1 === get_theme_mod('funfacts_top_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Bottom Curved
	$wp_customize->add_setting( 'funfacts_bottom_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'funfacts_bottom_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on funfacts section', 'bizes' ),
			'section'  => 'funfacts_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('funfacts_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Bottom Curve BG
	$wp_customize->add_setting( 'funfacts_bottom_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'funfacts_bottom_cruved_bg',
			array(
				'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
				'section'     => 'funfacts_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('funfacts_section_enable') && 1 === get_theme_mod('funfacts_bottom_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'funfacts_section_pt',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'funfacts_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
			'section'           => 'funfacts_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('funfacts_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'funfacts_section_pb',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'funfacts_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
			'section'           => 'funfacts_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('funfacts_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );