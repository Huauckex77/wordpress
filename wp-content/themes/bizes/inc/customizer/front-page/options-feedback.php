<?php 
	$wp_customize->add_section( 'feedback_section_settings',
		array(
			'title'       => esc_html__( 'Feedback Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority'    => 5,
			'divider'     => 'before',
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'feedback_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_section_enable',
			array(
			    'label'         => esc_html__( 'Show/hide Feedback Section', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide Feedback section on front page template', 'bizes' ),
				'section'  => 'feedback_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'feedback_section_headings',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'feedback_section_headings',
				array(
					'label' => esc_html__( 'Section Headings', 'bizes' ),
					'type' => 'heading',
					'section' => 'feedback_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('feedback_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Section subheading
		$wp_customize->add_setting( 'feedback_section_subtitle', 
			array(
				'default'           => esc_html__( 'Feedback', 'bizes' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'feedback_section_subtitle', 
			array(
				'label'      => esc_html__('Subtitle', 'bizes'),
				'section'    => 'feedback_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		//Section Heading
		$wp_customize->add_setting( 'feedback_section_title', 
			array(
				'default'           => esc_html__( 'What clients are <strong>saying about</strong> us', 'bizes' ),
				'sanitize_callback' => 'bizes_sanitize_html',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'feedback_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'bizes' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'bizes' ),
				'section' => 'feedback_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);

		// Section Description
		$wp_customize->add_setting( 'feedback_section_description', 
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'feedback_section_description', 
			array(
				'label'      => esc_html__('Description', 'bizes'),
				'section'    => 'feedback_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Headings
		$wp_customize->add_setting( 'feedback_heading',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'feedback_heading',
				array(
					'label' => esc_html__( 'Feedbacks', 'bizes' ),
					'type' => 'heading',
					'section' => 'feedback_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('feedback_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Content Type
		$wp_customize->add_setting('feedback_content_type', 
			array(
			'default' 			=> 'feedback_page',
			'sanitize_callback' => 'bizes_sanitize_select',
			'transport'         => 'refresh',
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		$wp_customize->add_control('feedback_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'feedback_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'feedback_page'	   => __('Page','bizes'),
						'feedback_post'	   => __('Post','bizes'),
						'review_custom'    => __('Custom Content','bizes'),

				),
				'active_callback' => function(){
					 if(get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else {
		$wp_customize->add_control('feedback_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'feedback_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'feedback_page'	   => __('Page','bizes'),
						'feedback_post'	   => __('Post','bizes'),
				),
				'active_callback' => function(){
					 if(get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}

		// Total Number
        $wp_customize->add_setting( 'feedback_total_count', 
		 	array(
				'default'           => 3,
				'sanitize_callback' => 'bizes_sanitize_number_range',
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'feedback_total_count', 
			array(
				'label'       => esc_html__( 'Total Items to Show','bizes' ),
				'description' => esc_html__( 'After changing default value please save and reload','bizes' ),
				'type'        => 'number',
				'section'     => 'feedback_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 50,
					'step'	=> 1,
				),
				'active_callback' => function(){
					$content_type = get_theme_mod('feedback_content_type');
					$sec_enable = get_theme_mod('feedback_section_enable');
					if($content_type=='feedback_post' || $content_type=='feedback_page' && 1=== $sec_enable){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

	$total_items = get_theme_mod( 'feedback_total_count', 3);
	for( $i=1; $i<=$total_items; $i++ ) {

			// Page
			$wp_customize->add_setting('feedback_page_'.$i.'', 
				array(	
					'sanitize_callback' => 'bizes_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('feedback_page_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Review #%1$s', 'bizes'), $i),
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a page for reviewer\'s #%1$s name, quote and picture', 'bizes'), $i),
					'section'     => 'feedback_section_settings',   		
					'type'        => 'dropdown-pages',
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type=='feedback_page' && 1 === $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Posts
			$wp_customize->add_setting('feedback_post_'.$i.'', 
				array(
					'sanitize_callback' => 'bizes_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('feedback_post_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Client #%1$s', 'bizes'), $i),
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a post for reviewer\'s #%1$s name, quote and picture', 'bizes'), $i),
					'section'     => 'feedback_section_settings',   		
					'type'        => 'select',
					'choices'	  => bizes_dropdown_posts(),
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type=='feedback_post' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Position
			$wp_customize->add_setting('reviewer_position_'.$i.'', 
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('reviewer_position_'.$i.'', 
				array(
					'label'       => '',
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Client #%1$s designation', 'bizes'), $i),
					'type'        => 'text',
					'section'     => 'feedback_section_settings',   		
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type=='feedback_post' || $content_type=='feedback_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);
		}

		$wp_customize->add_setting( 
			new Bizes_Control_Repeater_Setting( 
				$wp_customize, 
				'featured_reviewers', 
				array(
					'default' => '',
					'sanitize_callback' => array( 'Bizes_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
				) 
			) 
		);
		$wp_customize->add_control(
			new Bizes_Control_Repeater(
				$wp_customize,
				'featured_reviewers',
				array(
					'section'       => 'feedback_section_settings',
					'label'         => esc_html__( 'Reviewers', 'bizes' ),
					'fields'  => array(
						'name' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Name', 'bizes' ),
						),
						'position' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Position', 'bizes' ),
						),
						'quote' => array(
							'type'        => 'textarea',
							'label'       => esc_html__( 'Quote', 'bizes' ),
						),
						'image' => array(
							'type'    => 'image',
							'label'   => __( 'Upload Reviewer Image', 'bizes' ),
							'description'   => __( 'Best image size is 300x300', 'bizes' ),
						),
					),
					'row_label' => array(
						'type'  => 'field',
						'value' => esc_html__( 'Reviewer', 'bizes' ),
						'field' => 'name'
					),
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type =='review_custom' && 1 === $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			)
		);


	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){

	// Headings
	$wp_customize->add_setting( 'feedback_carousel_headings',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'feedback_carousel_headings',
			array(
				'label' => esc_html__( 'Carousel Controls', 'bizes' ),
				'type' => 'heading',
				'section' => 'feedback_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
		// Enable Carousel
		$wp_customize->add_setting( 'feedback_carousel_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_enable',
			array(
				'label'       => esc_html__( 'Enable Carousel?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable review carousel', 'bizes' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Autoplay
		$wp_customize->add_setting( 'feedback_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'bizes' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'feedback_carousel_duration', 
			array(
				'sanitize_callback' => 'bizes_sanitize_number_range',
				'validate_callback' => 'bizes_validate_duration',
				'default'          	=> 5000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'feedback_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'bizes' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'bizes' ),
				'section'           => 'feedback_section_settings',
				'type'				=> 'number',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
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
		$wp_customize->add_setting( 'feedback_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'bizes' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'feedback_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_nav',
			array(
				'label'       => esc_html__( 'Show Carousel Arrow?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'bizes' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'feedback_carousel_dots',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_dots',
			array(
				'label'       => esc_html__( 'Show Carousel Dots?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'bizes' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );
	}
	
	// Headings
	$wp_customize->add_setting( 'heading_feedback_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_feedback_style',
			array(
				'label' => esc_html__( 'Style', 'bizes' ),
				'type' => 'heading',
				'section' => 'feedback_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Text Alignment
	$wp_customize->add_setting( 'feedback_text_align',
	   array(
		  'default' => 'text-left',
		  'transport' => 'refresh',
		  'sanitize_callback' => 'bizes_radio_sanitization'
	   )
	);
	$wp_customize->add_control( new Bizes_Text_Radio_Button_Custom_Control( $wp_customize, 'feedback_text_align',
	   array(
			'label'       => __('Text Alignment', 'bizes'),
			'section'     => 'feedback_section_settings',  
			'choices' => array(
				'text-left'	   => __('Left','bizes'),
				'text-center'  => __('Center','bizes'),
				'text-right'   => __('Right','bizes'),
			),
		   'active_callback' => function(){
				if(1===get_theme_mod('feedback_section_enable')){
					return true;
				} else {
					return false;
				}
			},
	   )
	) );

	// BG Image 
	$wp_customize->add_setting( 'feedback_section_bg_image',
		array(
			'default'           => get_template_directory_uri() . '/assets/img/client/1.jpg',
			'sanitize_callback' => 'bizes_sanitize_image',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'feedback_section_bg_image',
			array(
				'label'         => esc_html__( 'Background Image', 'bizes' ),
				'section'       => 'feedback_section_settings',
				'type'          => 'image',
				'active_callback' => function(){
					if( 1===get_theme_mod( 'feedback_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		)
	);

	// Overlay color
	$wp_customize->add_setting( 'feedback_section_overlay', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_section_overlay',
			array(
				'label'   => esc_html__( 'Overlay Color', 'bizes' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Enable Parallax
	$wp_customize->add_setting( 'feedback_parallax_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_parallax_enable',
		array(
			'label'         => esc_html__('Enable Parallax', 'bizes' ),
			'description' => esc_html__('Turn On/Off the switch to enable/disable parallax effect', 'bizes' ),
			'section'  => 'feedback_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('feedback_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Top Curved
	$wp_customize->add_setting( 'feedback_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on feedback section', 'bizes' ),
			'section'  => 'feedback_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('feedback_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Top Curve BG
	$wp_customize->add_setting( 'feedback_top_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_top_cruved_bg',
			array(
				'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') && 1 === get_theme_mod('feedback_top_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Bottom Curved
	$wp_customize->add_setting( 'feedback_bottom_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'feedback_bottom_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on feedback section', 'bizes' ),
			'section'  => 'feedback_section_settings',
			'active_callback' => function(){
				 if(1===get_theme_mod('feedback_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );

	// Bottom Curve BG
	$wp_customize->add_setting( 'feedback_bottom_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_bottom_cruved_bg',
			array(
				'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') && 1 === get_theme_mod('feedback_bottom_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'feedback_section_pt',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'feedback_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
			'section'           => 'feedback_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('feedback_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'feedback_section_pb',
	   array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'feedback_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
			'section'           => 'feedback_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('feedback_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );
		