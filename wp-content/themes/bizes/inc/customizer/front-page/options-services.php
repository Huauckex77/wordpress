<?php 
/**
 * Services Section
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */

	$wp_customize->add_section( 'services_section_settings',
		array(
			'title'       => esc_html__( 'Service Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 2,
		)
	);
		// Show/Hide Section
		$wp_customize->add_setting( 'services_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'services_section_enable',
			array(
			    'label'         => esc_html__( 'Show/hide service section', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide services section on front page template', 'bizes' ),
				'section'  => 'services_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'service_section_heading_text',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'service_section_heading_text',
				array(
					'label' => esc_html__( 'Section Headings', 'bizes' ),
					'type' => 'heading',
					'section' => 'services_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Section subheading
		$wp_customize->add_setting( 'services_section_subtitle', 
			array(
				'default'           => 'Our Services',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'services_section_subtitle', 
			array(
				'label'      => esc_html__('Subtitle', 'bizes'),
				'description'=> '',
				'section'    => 'services_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('services_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		//Section Heading
		$wp_customize->add_setting( 'services_section_title', 
			array(
				'default'           => 'We Provide World Class <b>Top Services</b>',
				'sanitize_callback' => 'bizes_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'services_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'bizes' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'bizes' ),
				'section' => 'services_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);

		// Section Description
		$wp_customize->add_setting( 'services_section_description', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'services_section_description', 
			array(
				'label'      => esc_html__('Description', 'bizes'),
				'description'=> '',
				'section'    => 'services_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('services_section_enable')){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		// Headings
		$wp_customize->add_setting( 'services_heading_text',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'services_heading_text',
				array(
					'label' => esc_html__( 'Services', 'bizes' ),
					'type' => 'heading',
					'section' => 'services_section_settings',
					'active_callback' => function(){
						if(get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Content Type
		$wp_customize->add_setting('services_content_type', 
			array(
			'default' 			=> 'services_page',
			'sanitize_callback' => 'bizes_sanitize_select'
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code()){

		$wp_customize->add_control('services_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'services_section_settings',   	
				'type'        => 'select',
				'choices' => array(
					'services_post'	   => __('Post','bizes'),
					'services_page'	   => __('Page','bizes'),
					'services_custom'  => __('Custom Content','bizes'),
				),
				'active_callback' => function(){
					 if( 1 === get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else { 
		$wp_customize->add_control('services_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'services_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'services_post'	   => __('Post','bizes'),
						'services_page'	   => __('Page','bizes'),
				),
				'active_callback' => function(){
					 if( 1 === get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}

		// Total Number
		$wp_customize->add_setting( 'services_total_items_show',
			array(
				'sanitize_callback' => 'bizes_sanitize_integer',
				'default'           => 3,
				'transport' => 'refresh',
			)
		);
		$wp_customize->add_control( new Bizes_Slider_Custom_Control( 
			$wp_customize, 'services_total_items_show', 
				array(
					'label'       => esc_html__( 'Total Items to Show','bizes' ),
					'description' => esc_html__( 'After changing default value please save and reload','bizes' ),
					'type'          => 'range',
					'section'       => 'services_section_settings',
					'input_attrs'    => array(
						'min' => 0,
						'max' => 20,
						'step' => 1,
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('services_section_enable') && get_theme_mod('services_content_type') != 'services_custom'){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);


	$service_items = get_theme_mod( 'services_total_items_show', 3);
	for( $i=1; $i<=$service_items; $i++ ) {

		//Icon
		$wp_customize->add_setting(
			'service_icon_'.$i,
			array(
				'default'			=> 'icofont-vector-path',
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);

		$wp_customize->add_control( 'service_icon_'.$i,
			array(
				/* translators: %1$s is replaced with number */
				'label'       => sprintf( __('Service #%1$s', 'bizes'), $i),
				/* translators: %1$s is replaced with number */
				'description'       => sprintf( __('Select a icon from <a target="_blank" href="https://icofont.com/icons">IcoFont icons</a> and enter its class name. Example- icofont-vector-path', 'bizes'), $i),
				'section'		=> 'services_section_settings',
				'type'			=> 'text',
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if(1 === $service_status  && $content_type !='services_custom'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Page
		$wp_customize->add_setting('featured_service_page_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'bizes_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_service_page_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => sprintf( __('Select a page for Service #%1$s title and description', 'bizes'), $i),
				'section'     => 'services_section_settings',   
				'settings'    => 'featured_service_page_'.$i.'',		
				'type'        => 'dropdown-pages',
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if(1 === $service_status  && $content_type =='services_page'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		// Posts
		$wp_customize->add_setting('featured_service_post_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'bizes_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_service_post_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => sprintf( __('Select a Post for Service #%1$s title and text', 'bizes'), $i),
				'section'     => 'services_section_settings',   
				'settings'    => 'featured_service_post_'.$i.'',		
				'type'        => 'select',
				'choices'	  => bizes_dropdown_posts(),
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if(1 === $service_status  && $content_type =='services_post'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	}

	// Featured Services
	$wp_customize->add_setting( 
		new Bizes_Control_Repeater_Setting( 
			$wp_customize, 
			'featured_services', 
			array(
				'default' => '',
				'sanitize_callback' => array( 'Bizes_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
			) 
		) 
	);
	$wp_customize->add_control(
		new Bizes_Control_Repeater(
			$wp_customize,
			'featured_services',
			array(
				'section'       => 'services_section_settings',
				'label'         => esc_html__( 'Services', 'bizes' ),
				'fields'  => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon', 'bizes' ),
						'description' =>  esc_html__('Select a icon from <a target="_blank" href="https://icofont.com/icons">IcoFont icons</a> and enter its class name. Example- icofont-vector-path', 'bizes'),
					),
					'title' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Title', 'bizes' ),
					),
					'description' => array(
						'type'        => 'textarea',
						'label'       => esc_html__( 'Descrition', 'bizes' ),
					),
					'btn_text' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Read More', 'bizes' ),
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
					'value' => esc_html__( 'service', 'bizes' ),
					'field' => 'title'
				),
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if($content_type == 'services_custom' && 1 === $service_status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		)
	);


	// Headings
	$wp_customize->add_setting( 'services_style_heading_text',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'services_style_heading_text',
			array(
				'label' => esc_html__( 'Style', 'bizes' ),
				'type' => 'heading',
				'section' => 'services_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);


	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code()){
		$wp_customize->add_setting( 'services_style',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'style-one',
			)
		);
		$wp_customize->add_control( 'services_style',
			array(
				'type'    => 'select',
				'label'   => esc_html__( 'Select Style', 'bizes' ),
				'section' => 'services_section_settings',
				'choices' => array(
					'style-one' => esc_html__('Style One', 'bizes' ),
					'style-2'  => esc_html__('Style Two', 'bizes' ),
					'style-3'  => esc_html__('Style Three', 'bizes' ),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} 
		// Text Alignment
		$wp_customize->add_setting( 'services_content_align',
		   array(
			  'default' => 'text-center',
			  'transport' => 'refresh',
			  'sanitize_callback' => 'bizes_radio_sanitization'
		   )
		);
		$wp_customize->add_control( new Bizes_Text_Radio_Button_Custom_Control( $wp_customize, 'services_content_align',
		   array(
				'label'       => __('Text Alignment', 'bizes'),
				'section'     => 'services_section_settings',  
				'choices' => array(
					'text-left'	   => __('Left','bizes'),
					'text-center'  => __('Center','bizes'),
					'text-right'   => __('Right','bizes'),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable') && get_theme_mod('services_style') !='style-3'){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Background color
		$wp_customize->add_setting( 'service_section_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_section_bg',
				array(
					'label'   => esc_html__( 'Background', 'bizes' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Top Curved
		$wp_customize->add_setting( 'service_top_cruved',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'service_top_cruved',
			array(
			    'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on service section', 'bizes' ),
				'section'  => 'services_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('services_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) );

		// Top Curve BG
		$wp_customize->add_setting( 'service_top_cruved_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_top_cruved_bg',
				array(
					'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') && 1 === get_theme_mod('service_top_cruved') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Bottom Curved
		$wp_customize->add_setting( 'service_bottom_cruved',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'service_bottom_cruved',
			array(
			    'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on service section', 'bizes' ),
				'section'  => 'services_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('services_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) );

		// Bottom Curve BG
		$wp_customize->add_setting( 'service_bottom_cruved_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_bottom_cruved_bg',
				array(
					'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') && 1 === get_theme_mod('service_bottom_cruved') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Top Padding
		$wp_customize->add_setting( 'service_section_pt',
		   array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'service_section_pt',
		   array(
				'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Top Padding
		$wp_customize->add_setting( 'service_section_pb',
		   array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'service_section_pb',
		   array(
				'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );