<?php 
/**
* Call to Action Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
$wp_customize->add_section( 'cta_section_settings',
	array(
		'title'       => esc_html__( 'Call to Action', 'bizes' ),
		'description' => '',
		'panel'       => 'bizes_frontpage_settings',
		'priority' => 11,
		'divider' => 'before',
	)
);

	// Show/Hide Section
	$wp_customize->add_setting( 'cta_section_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'cta_section_enable',
		array(
			'label'         => esc_html__( 'Show/hide CTA Section', 'bizes' ),
			'description'   => esc_html__( 'Turn On/Off the switch to show/hide Call to Action section on front page.', 'bizes' ),
			'section'  => 'cta_section_settings',

		)
	) );

		// Headings
		$wp_customize->add_setting( 'headings_cta_section',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_cta_section',
				array(
					'label' => esc_html__( 'Content', 'bizes' ),
					'type' => 'heading',
					'section' => 'cta_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// CTA Title
		$wp_customize->add_setting( 'cta_title',
			array(
				'sanitize_callback' => 'bizes_sanitize_html',
				'default'           => __( 'Let’s create something together?', 'bizes' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'cta_title',
			array(
				'label'       => esc_html__( 'Title', 'bizes' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'cta_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);

		// CTA Title
		$wp_customize->add_setting( 'cta_subtitle',
			array(
				'sanitize_callback' => 'bizes_sanitize_html',
				'default'           => __( 'Need a successful project?', 'bizes' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'cta_subtitle',
			array(
				'label'       => esc_html__( 'Subtitle', 'bizes' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'cta_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);

		// CTA Description
		$wp_customize->add_setting( 'cta_description',
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'cta_description',
			array(
				'label'       => esc_html__( 'Description', 'bizes' ),
				'description' => '',
				'type'        => 'textarea',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'cta_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		
		// Style
		$wp_customize->add_setting( 'cta_style',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'style-1',
			)
		);
		$wp_customize->add_control( 'cta_style',
			array(
				'type'    => 'select',
				'label'   => esc_html__( 'Select Style', 'bizes' ),
				'section' => 'cta_section_settings',
				'choices' => array(
					'style-1' => esc_html__( 'Style One', 'bizes' ),
					'style-2'  => esc_html__( 'Style Two', 'bizes' ),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('cta_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Button Type
		$wp_customize->add_setting( 'cta_btn_type',
		   array(
			  'default' => 'btn-text',
			  'transport' => 'refresh',
			  'sanitize_callback' => 'bizes_radio_sanitization'
		   )
		);
		$wp_customize->add_control( new Bizes_Text_Radio_Button_Custom_Control( $wp_customize, 'cta_btn_type',
		   array(
				'label'       => __('Button Type', 'bizes'),
				'section'     => 'cta_section_settings',  
				'choices' => array(
					'btn-text'	   => __('Text Button','bizes'),
					'btn-video'    => __('Video Button','bizes'),
			    ),
			   'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') && get_theme_mod('cta_style') == 'style-1'){
						return true;
					} else {
						return false;
					}
			    },
		   )
		) );


		// Button Text
		$wp_customize->add_setting('cta_btn_text',
			 array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__( 'Contact Us', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control('cta_btn_text',
			 array(
				'label'     => esc_html__('Button Text', 'bizes'),
				'type'    => 'text',
				'section'   => 'cta_section_settings',
			    'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') && get_theme_mod('cta_btn_type') == 'btn-text'){
						return true;
					} else {
						return false;
					}
			    },
			)
		);

		// Button URL
		$wp_customize->add_setting('cta_btn_url', 
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('cta_btn_url',
			array(
				'label'       => esc_html__('Button Link', 'bizes'),
				'description' => esc_html__( 'Start with http:// or https://', 'bizes' ),
				'type'        => 'url',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') && get_theme_mod('cta_btn_type') == 'btn-text'){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		// Button Target
		$wp_customize->add_setting( 'cta_btn_target',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'cta_btn_target',
			array(
				'label'       => esc_html__( 'Button link open on new tab?', 'bizes' ),
				'section'  => 'cta_section_settings',
				'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') && get_theme_mod('cta_btn_type') == 'btn-text'){
						return true;
					} else {
						return false;
					}
				},
			)
		) );

		// Video URL
		$wp_customize->add_setting('cta_video_url', 
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				//'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('cta_video_url',
			array(
				'label'       => esc_html__('Video link', 'bizes'),
				'description' => esc_html__( 'Start with http:// or https://', 'bizes' ),
				'type'        => 'url',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') && get_theme_mod('cta_btn_type') == 'btn-video'){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		// Headings
		$wp_customize->add_setting( 'heading_cta_style',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'heading_cta_style',
				array(
					'label' => esc_html__( 'Style', 'bizes' ),
					'type' => 'heading',
					'section' => 'cta_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Text Alignment
		$wp_customize->add_setting( 'cta_content_align',
		   array(
			  'default' => 'text-center',
			  'transport' => 'refresh',
			  'sanitize_callback' => 'bizes_radio_sanitization'
		   )
		);
		$wp_customize->add_control( new Bizes_Text_Radio_Button_Custom_Control( $wp_customize, 'cta_content_align',
		   array(
				'label'       => __('Text Alignment', 'bizes'),
				'section'     => 'cta_section_settings',  
				'choices' => array(
					'text-left'	   => __('Left','bizes'),
					'text-center'  => __('Center','bizes'),
					'text-right'   => __('Right','bizes'),
			    ),
			   'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') && get_theme_mod('cta_style') == 'style-2'){
						return true;
					} else {
						return false;
					}
			    },
		   )
		) );

		
	// BG Image 
	$wp_customize->add_setting( 'cta_section_bg_image',
		array(
			'default'           => get_template_directory_uri() . '/assets/img/cta/1.jpg',
			'sanitize_callback' => 'bizes_sanitize_image',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'cta_section_bg_image',
			array(
				'label'         => esc_html__( 'Background Image', 'bizes' ),
				'section'       => 'cta_section_settings',
				'type'          => 'image',
				'active_callback' => function(){
					if( 1===get_theme_mod( 'cta_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		)
	);

	// Overlay color
	$wp_customize->add_setting( 'cta_section_overlay', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'cta_section_overlay',
			array(
				'label'   => esc_html__( 'Overlay Color', 'bizes' ),
				'section'     => 'cta_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('cta_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Enable Parallax
	$wp_customize->add_setting( 'cta_parallax_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'cta_parallax_enable',
		array(
			'label'         => esc_html__( 'Enable Parallax', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable image parallax effect', 'bizes' ),
			'section'  => 'cta_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('cta_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Top Curved
	$wp_customize->add_setting( 'cta_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'cta_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on cta section', 'bizes' ),
			'section'  => 'cta_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('cta_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );
	// Top Curve BG
	$wp_customize->add_setting( 'cta_top_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'cta_top_cruved_bg',
			array(
				'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
				'section'     => 'cta_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('cta_section_enable') && 1 === get_theme_mod('cta_top_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Bottom Curved
	$wp_customize->add_setting( 'cta_bottom_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'cta_bottom_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on cta section', 'bizes' ),
			'section'  => 'cta_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('cta_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Bottom Curve BG
	$wp_customize->add_setting( 'cta_bottom_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'cta_bottom_cruved_bg',
			array(
				'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
				'section'     => 'cta_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('cta_section_enable') && 1 === get_theme_mod('cta_bottom_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'cta_section_pt',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'cta_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
			'section'           => 'cta_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('cta_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'cta_section_pb',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'cta_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
			'section'           => 'cta_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('cta_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );