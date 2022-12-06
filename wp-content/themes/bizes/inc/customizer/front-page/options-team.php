<?php 
/**
* Team Section Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
	$wp_customize->add_section( 'team_section_settings',
		array(
			'title'       => esc_html__( 'Team Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 6,
			'divider' => 'before',
		)
	);


// Show/Hide Section
$wp_customize->add_setting( 'team_section_enable',
	array(
		'default' => 0,
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_section_enable',
	array(
	    'label'         => esc_html__( 'Show/hide Team Section', 'bizes' ),
	    'description'   => esc_html__( 'Turn On/Off the switch to show/hide team section on front page.', 'bizes' ),
		'section'  => 'team_section_settings',

	)
) );


	// Headings
	$wp_customize->add_setting( 'headings_team_section',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_team_section',
			array(
				'label' => esc_html__( 'Section Headings', 'bizes' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
		// Sub Title
		$wp_customize->add_setting( 'team_section_subtitle', 
			array(
				'default'           => esc_html__('Our Team', 'bizes'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'team_section_subtitle', 
			array(
				'label'      => esc_html__('Sub Title', 'bizes'),
				'description'=> '',
				'section'    => 'team_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		//Title
		$wp_customize->add_setting( 'team_section_title', 
			array(
				'default'           => esc_html__('Our Expert Advisory', 'bizes'),
				'sanitize_callback' => 'bizes_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'team_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'bizes' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'bizes' ),
				'section' => 'team_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			) 
		);

		// Description
		$wp_customize->add_setting( 'team_section_description', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'team_section_description', 
			array(
				'label'      => esc_html__('Description', 'bizes'),
				'section'    => 'team_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);


	// Headings
	$wp_customize->add_setting( 'headings_team_members',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_team_members',
			array(
				'label' => esc_html__( 'Team Members', 'bizes' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Content Type
	$wp_customize->add_setting('team_content_type', 
		array(
		'default' 			=> 'team_page',
		'sanitize_callback' => 'bizes_sanitize_select',
		'transport'         => 'refresh',
		)
	);
	if(class_exists('Themereps_Helper')  ){
		$wp_customize->add_control('team_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'team_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'team_page'	   => __('Page','bizes'),
						'team_post'	   => __('Post','bizes'),
						'team_custom'    => __('Custom Content','bizes'),

				),
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else {
		$wp_customize->add_control('team_content_type', 
			array(
				'label'       => __('Content Type', 'bizes'),
				'section'     => 'team_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'team_page'	   => __('Page','bizes'),
						'team_post'	   => __('Post','bizes'),
				),
				'active_callback' => function(){
					 if(get_theme_mod('team_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}

		// Total Number
        $wp_customize->add_setting( 'team_total_count', 
		 	array(
				'default'           => 3,
				'sanitize_callback' => 'bizes_sanitize_number_range',
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'team_total_count', 
			array(
				'label'       => esc_html__( 'Total Items to Show','bizes' ),
				'description' => esc_html__( 'After changing default value please save and reload','bizes' ),
				'type'        => 'number',
				'section'     => 'team_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 20,
					'step'	=> 1,
				),
				'active_callback' => function(){
					$content_type = get_theme_mod('team_content_type');
					$sec_enable = get_theme_mod('team_section_enable');
					if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	$total_items = get_theme_mod( 'team_total_count', 3);
	for( $i=1; $i<=$total_items; $i++ ) {


			// Headings
			$wp_customize->add_setting( 'headings_member_'.$i.'',
				array(
					'transport' => 'refresh',
					'sanitize_callback' => 'sanitize_text_field'
				)
			);
			$wp_customize->add_control( 
				new Bizes_Simple_Notice_Custom_Control( 
					$wp_customize, 'headings_member_'.$i.'',
					array(
						/* translators: %1$s is replaced with number */
						'label'       => sprintf( __('Member %1$s Info', 'bizes'), $i),
						'type' => 'heading',
						'section' => 'team_section_settings',
						'active_callback' => function(){
							$content_type = get_theme_mod('team_content_type');
							$sec_enable = get_theme_mod('team_section_enable');
							if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
								return true;
							} else {
								 return false;
							}
						},
					)
				) 
			);

			// Page
			$wp_customize->add_setting('team_page_'.$i.'', 
				array(	
					'sanitize_callback' => 'bizes_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('team_page_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a page for member\'s #%1$s name, designation and picture', 'bizes'), $i),
					'section'     => 'team_section_settings',   		
					'type'        => 'dropdown-pages',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_page' && 1 === $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Posts
			$wp_customize->add_setting('team_post_'.$i.'', 
				array(
					'sanitize_callback' => 'bizes_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('team_post_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Member #%1$s', 'bizes'), $i),
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a post for member\'s #%1$s name, designation and picture', 'bizes'), $i),
					'section'     => 'team_section_settings',   		
					'type'        => 'select',
					'choices'	  => bizes_dropdown_posts(),
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Facebook Link
			$wp_customize->add_setting( 'facebook_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'facebook_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s facebook link', 'bizes'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

			// Twitter Link
			$wp_customize->add_setting( 'twitter_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'twitter_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s twitter link', 'bizes'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

			// Facebook Link
			$wp_customize->add_setting( 'linkedin_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'linkedin_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s linkedin link', 'bizes'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

			// Facebook Link
			$wp_customize->add_setting( 'instagram_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'instagram_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s instagram link', 'bizes'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

		}


		// Team
		$wp_customize->add_setting( 
			new Bizes_Control_Repeater_Setting( 
				$wp_customize, 
				'bizes_team', 
				array(
					'default' => '',
					'sanitize_callback' => array( 'Bizes_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
				) 
			) 
		);
		$wp_customize->add_control(
			new Bizes_Control_Repeater(
				$wp_customize,
				'bizes_team',
				array(
					'section'       => 'team_section_settings',
					'label'         => esc_html__( 'Members', 'bizes' ),
					'fields'  => array(

						'name' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Name', 'bizes' ),
						),
						'position' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Position', 'bizes' ),
						),
						'image' => array(
							'type'    => 'image',
							'label'   => __( 'Upload Image', 'bizes' ),
						),
						'facebook_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Facebook Link', 'bizes' ),
							'description' => esc_html__( 'Example: https://facebook.com/username', 'bizes' ),
						),
						'twitter_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Twitter Link', 'bizes' ),
							'description' => esc_html__( 'Example: https://twitter.com/username', 'bizes' ),
						),
						'linkedin_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Linkedin Link', 'bizes' ),
							'description' => esc_html__( 'Example: https://linkedin.com/username', 'bizes' ),
						),
						'instagram_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Instagram Link', 'bizes' ),
							'description' => esc_html__( 'Example: https://instagram.com/username', 'bizes' ),
						),
					),
					'row_label' => array(
						'type'  => 'field',
						'value' => esc_html__( 'member', 'bizes' ),
						'field' => 'name'
					),
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type =='team_custom' && 1 === $sec_enable){
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
		$wp_customize->add_setting( 'team_carousel_headings',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'team_carousel_headings',
				array(
					'label' => esc_html__( 'Carousel Settings', 'bizes' ),
					'type' => 'heading',
					'section' => 'team_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('team_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Enable Carousel
		$wp_customize->add_setting( 'team_carousel_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_enable',
			array(
				'label'       => esc_html__( 'Enable Carousel?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable team carousel', 'bizes' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Autoplay
		$wp_customize->add_setting( 'team_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'bizes' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'team_carousel_duration', 
			array(
				'sanitize_callback' => 'bizes_sanitize_number_range',
				'validate_callback' => 'bizes_validate_duration',
				'default'          	=> 6000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'team_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'bizes' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'bizes' ),
				'section'           => 'team_section_settings',
				'type'				=> 'number',
				'input_attrs'		=> array(
					'min'	=> 1000,
					'max'	=> 20000,
					'step'	=> 500,
				),
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);

		// Carousel Loop
		$wp_customize->add_setting( 'team_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'bizes' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'team_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_nav',
			array(
				'label'       => esc_html__( 'Show Carousel Arrow?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'bizes' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'team_carousel_dots',
			array(
				'default' => 1,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_dots',
			array(
				'label'       => esc_html__( 'Show Carousel Dots?', 'bizes' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'bizes' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

}



	// Headings
	$wp_customize->add_setting( 'heading_team_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Bizes_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_team_style',
			array(
				'label' => esc_html__( 'Style', 'bizes' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Overlay color
	$wp_customize->add_setting( 'team_member_overlay', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'team_member_overlay',
			array(
				'label'   => esc_html__( 'Overlay Color', 'bizes' ),
				'section'     => 'team_section_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Background color
	$wp_customize->add_setting( 'team_section_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'team_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'bizes' ),
				'section'     => 'team_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);



	// Top Curved
	$wp_customize->add_setting( 'team_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved top area on team section', 'bizes' ),
			'section'  => 'team_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('team_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );

	// Top Curve BG
	$wp_customize->add_setting( 'team_top_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		  'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'team_top_cruved_bg',
			array(
				'label'   => esc_html__( 'Top Curve Background', 'bizes' ),
				'section'     => 'team_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') && 1 === get_theme_mod('team_top_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Bottom Curved
	$wp_customize->add_setting( 'team_bottom_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'team_bottom_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Bottom', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to make/hide curved bottom area on team section', 'bizes' ),
			'section'  => 'team_section_settings',
			'active_callback' => function(){
				if(1 === get_theme_mod('team_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );

	// Bottom Curve BG
	$wp_customize->add_setting( 'team_bottom_cruved_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'team_bottom_cruved_bg',
			array(
				'label'   => esc_html__( 'Bottom Curve Background', 'bizes' ),
				'section'     => 'team_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') && 1 === get_theme_mod('team_bottom_cruved') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'team_section_pt',
	   array(
		  'default' => 110,
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'team_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'team_section_pb',
	   array(
		  'default' => 65,
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'team_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );