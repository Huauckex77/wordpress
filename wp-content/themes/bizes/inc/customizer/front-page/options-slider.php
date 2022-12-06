<?php 
/**
 * Slider Section
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
	$wp_customize->add_section( 'slider_section_settings',
		array(
			'title'       => esc_html__( 'Slider Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 1,
			'divider' => 'before',
		)
	);

		// Hide/show
		$wp_customize->add_setting( 'slider_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'slider_section_enable',
			array(
			    'label'         => esc_html__( 'Show/hide Slider Section', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide slider section on front page template', 'bizes' ),
				'section' => 'slider_section_settings',
			)
		) );

		// Total Number
		$wp_customize->add_setting( 'slides_total_items',
		   array(
			  'default' => 2,
			  'sanitize_callback' => 'bizes_sanitize_number_range'
		   )
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){

		$wp_customize->add_control( 'slides_total_items', 
			array(
				'label'       => esc_html__( 'Total Slides to Show','bizes' ),
				'description' => esc_html__( 'After changing default value please publish and reload', 'bizes' ),
				'type'        => 'number',
				'section'     => 'slider_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 50,
					'step'	=> 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

	} else { 
		$wp_customize->add_control( 'slides_total_items', 
			array(
				'label'       => esc_html__( 'Total Slides to Show','bizes' ),
				'description' => esc_html__( 'After changing default value please publish and reload', 'bizes' ),
				'type'        => 'number',
				'section'     => 'slider_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 2,
					'step'	=> 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}

		// Content Type
		$wp_customize->add_setting('slides_content_type', 
			array(
			'default' 			=> 'slides_page',	
			'sanitize_callback' => 'bizes_sanitize_select'
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		$wp_customize->add_control('slides_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'slider_section_settings',   
				'type'        => 'select',
				'choices' => array(
					'slides_page'	   => __('Page','bizes'),
					'slides_post'	   => __('Post','bizes'),
					'slides_custom'	   => __('Custom Content','bizes'),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else {
		$wp_customize->add_control('slides_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'slider_section_settings',   
				'type'        => 'select',
				'choices' => array(
					'slides_page'	   => __('Page','bizes'),
					'slides_post'	   => __('Post','bizes'),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}


	$slide_items = get_theme_mod( 'slides_total_items', 2);
	for( $i=1; $i<=$slide_items; $i++ ) {

		// Headings Body Font Styles
		$wp_customize->add_setting( 'slides_heading_text_'.$i.'',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'slides_heading_text_'.$i.'',
				array(
					/* translators: %s: slide number */
					'label'       => sprintf( __('Slide #%1$s Options', 'bizes'), $i),
					'type' => 'heading',
					'section' => 'slider_section_settings',
					'active_callback' => function(){
						$slider_enable   = get_theme_mod('slider_section_enable');
						if(1 === $slider_enable ){
							return true;
						} else {
							 return false;
						}
					},
				)
			) 
		);

		// Page
		$wp_customize->add_setting('slide_page_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'bizes_dropdown_pages'
			)
		);
		$wp_customize->add_control('slide_page_'.$i.'', 
			array(
				'description' => __('Select a Page for title, description and background image', 'bizes'),
				'section'     => 'slider_section_settings',   
				'settings'    => 'slide_page_'.$i.'',		
				'type'        => 'dropdown-pages',
				'active_callback' => function(){
					$slider_enable          = get_theme_mod('slider_section_enable');
					$slides_content_type    = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_page' && 1 === $slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		// Posts
		$wp_customize->add_setting('slide_post_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'bizes_dropdown_pages'
			)
		);
		$wp_customize->add_control('slide_post_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => esc_html__( 'Select a Post for title, description and background image','bizes' ),
				'section'     => 'slider_section_settings',   
				'settings'    => 'slide_post_'.$i.'',		
				'type'        => 'select',
				'choices'	  => bizes_dropdown_posts(),
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_post' && 1===$slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		//Cutsom Content- Title
		$wp_customize->add_setting( 'slide_title_'.$i,
			array(
				'dafult'=> esc_html__('Digital<b> Marketing</b> for Startup', 'bizes'),
				'sanitize_callback'=> 'bizes_sanitize_html', 
			) 
		);
		$wp_customize->add_control( 'slide_title_'.$i, 
			array(
				/* translators: %1$s is replaced with number */
				'description' => esc_html__( 'Title','bizes' ),
			    'type'        => 'text',
				'section'     => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable       = get_theme_mod('slider_section_enable');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_custom' && 1 === $slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Description
		$wp_customize->add_setting( 'slide_description_'.$i,
			array(
				'dafult'           => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.', 'bizes'),
				'sanitize_callback'=> 'bizes_sanitize_html', 
			) 
		);
		$wp_customize->add_control( 'slide_description_'.$i, 
			array(
				/* translators: %1$s is replaced with number */
				'description' => esc_html__( 'Description','bizes' ),
			    'type'    => 'textarea',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_custom' && 1 === $slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Button Text
		$wp_customize->add_setting( 'slide_btn_text_'.$i,
			array(
				'dafult'=> esc_html__('Get Started', 'bizes'),
				'sanitize_callback'=> 'sanitize_text_field', 
			) 
		);
		$wp_customize->add_control( 'slide_btn_text_'.$i, 
			array(
				'description' => esc_html__( 'Button 1 Text','bizes' ),
			    'type'    => 'text',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_custom' && 1 === $slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Button URL
		$wp_customize->add_setting( 'slide_btn_url_'.$i,
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'esc_url_raw', 
			) 
		);
		$wp_customize->add_control( 'slide_btn_url_'.$i, 
			array(
				'description' => esc_html__( 'Button 1 URL','bizes' ),
			    'type'    => 'url',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_custom' && 1 === $slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Button target
		$wp_customize->add_setting( 'slide_btn_target_'.$i,
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'bizes_sanitize_checkbox', 
			) 
		);
		$wp_customize->add_control( 'slide_btn_target_'.$i, 
			array(
				'label' => esc_html__( 'Button 1 open on new tab?','bizes' ),
			    'type'    => 'checkbox',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					$slides_content_type = get_theme_mod('slides_content_type');
					if($slides_content_type == 'slides_custom' && 1 === $slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	}
		//Button Text
		$wp_customize->add_setting( 'slide_btn2_text_'.$i,
			array(
				'dafult'=> esc_html__('Get in Touch', 'bizes'),
				'sanitize_callback'=> 'sanitize_text_field', 
			) 
		);
		$wp_customize->add_control( 'slide_btn2_text_'.$i, 
			array(
				'description' => esc_html__( 'Button 2 Text','bizes' ),
			    'type'    => 'text',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					if(1 === $slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		
		//Button URL
		$wp_customize->add_setting( 'slide_btn2_url_'.$i,
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'esc_url_raw', 
			) 
		);
		$wp_customize->add_control( 'slide_btn2_url_'.$i, 
			array(
				'description' => esc_html__( 'Button 2 URL','bizes' ),
			    'type'    => 'url',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					if(1===$slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		
		//Button target
		$wp_customize->add_setting( 'slide_btn2_target_'.$i,
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'bizes_sanitize_checkbox', 
			) 
		);
		$wp_customize->add_control( 'slide_btn2_target_'.$i, 
			array(
				'label' => esc_html__( 'Button 2 open on new tab?','bizes' ),
			    'type'    => 'checkbox',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					$slider_enable = get_theme_mod('slider_section_enable');
					if(1===$slider_enable ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		/** Background Image */
		$wp_customize->add_setting( 'slider_bg_'.$i,
			array(
				'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
				'sanitize_callback' => 'bizes_sanitize_image',
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 'slider_bg_'.$i,
				array(
				    'description' => esc_html__( 'Background Image','bizes' ),
					'section'   => 'slider_section_settings',
					'type'      => 'image',
					'active_callback' => function(){
						$slider_enable = get_theme_mod('slider_section_enable');
						$slides_content_type = get_theme_mod('slides_content_type');
						if($slides_content_type == 'slides_custom' && 1 === $slider_enable ){
							return true;
						} else {
							 return false;
						}
					},
				)
			)
		);
	}
}

	// Headings
	$wp_customize->add_setting( 'slider_style_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'slider_style_heading',
			array(
				'label' => esc_html__( 'Styles', 'bizes' ),
				'type' => 'heading',
				'section' => 'slider_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);

	// Text Alignment
	$wp_customize->add_setting( 'slider_text_alignment',
	   array(
		  'default' => 'text-left',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'bizes_radio_sanitization'
	   )
	);
	 
	$wp_customize->add_control( new Bizes_Text_Radio_Button_Custom_Control( $wp_customize, 'slider_text_alignment',
	   array(
			'label'       => esc_html__('Text Alignment', 'bizes'),
			'section' => 'slider_section_settings',
			'choices' => array(
				'text-left' => __( 'Left', 'bizes' ), 
				'text-center' => __( 'Centered', 'bizes'  ),
				'text-right' => __( 'Right', 'bizes'  )
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('slider_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		//Container Width
		$wp_customize->add_setting( 'slider_max_content_width',
			array(
				'sanitize_callback' => 'bizes_sanitize_integer',
				'default'           => 530,
			)
		);
		$wp_customize->add_control( new Bizes_Slider_Custom_Control( 
			$wp_customize, 'slider_max_content_width', 
				array(
					'label'	    => esc_html__('Maximum Content Width(px)','bizes'),
					'type'      => 'range',
					'section'  => 'slider_section_settings',
					'input_attrs'    => array(
						'min' => 0,
						'max' => 1600,
						'step' => 1,
						'suffix' => 'px',
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('slider_section_enable')){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);

		// Overlay color
		$wp_customize->add_setting( 'slider_overlay_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
			$wp_customize, 'slider_overlay_bg',
				array(
					'label'   => esc_html__( 'Overlay Color', 'bizes' ),
					'section'     => 'slider_section_settings',
					'show_opacity' => true,
					'active_callback' => function(){
						if(1 === get_theme_mod('slider_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Headings
		$wp_customize->add_setting( 'slider_control_heading',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control(
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'slider_control_heading',
				array(
					'label' => esc_html__( 'Carousel Controls', 'bizes' ),
					'type' => 'heading',
					'section' => 'slider_section_settings',
					'active_callback' => function(){
						 if(1===get_theme_mod('slider_section_enable')){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			) 
		);

		// Carousel Autoplay
		$wp_customize->add_setting( 'slider_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'slider_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'bizes' ),
				'section'  => 'slider_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'slider_carousel_duration', 
			array(
				'sanitize_callback' => 'bizes_sanitize_number_range',
				'validate_callback' => 'bizes_validate_duration',
				'default'          	=> 8000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'slider_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'bizes' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'bizes' ),
				'section'           => 'slider_section_settings',
				'type'				=> 'number',
				'active_callback' => function(){
					 if(1 === get_theme_mod('slider_section_enable')){
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
		$wp_customize->add_setting( 'slider_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'slider_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'bizes' ),
				'section'  => 'slider_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'slider_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'slider_carousel_nav',
			array(
				'label'       => esc_html__( 'Show Carousel Arrow?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'bizes' ),
				'section'  => 'slider_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'slider_carousel_dots',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'slider_carousel_dots',
			array(
				'label'       => esc_html__( 'Show Carousel Dots?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'bizes' ),
				'section'  => 'slider_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('slider_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );
	}

		// Bottom Curved
		$wp_customize->add_setting( 'slider_bottom_cruved',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'slider_bottom_cruved',
			array(
			    'label'         => esc_html__('Show Curved Bottom', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on slider section', 'bizes' ),
				'section'  => 'slider_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('slider_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) );

		// Bottom Curve BG
		$wp_customize->add_setting( 'slider_bottom_cruved_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
			$wp_customize, 'slider_bottom_cruved_bg',
				array(
					'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
					'section'     => 'slider_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('slider_section_enable') && 1 === get_theme_mod('slider_bottom_cruved') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);
