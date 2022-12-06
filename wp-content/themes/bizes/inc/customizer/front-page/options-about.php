<?php 
/**
* Call to Action Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
if( bizes_set_to_premium() ) {

	$wp_customize->add_section( 'about_section_settings',
		array(
			'title'       => esc_html__( 'About Section', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_frontpage_settings',
			'priority' => 2,
			'divider' => 'before',
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'about_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'bizes_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'about_section_enable',
			array(
				'label'         => esc_html__( 'Show/hide About Section', 'bizes' ),
				'description'   => esc_html__( 'Turn On/Off the switch to show/hide About section on front page.', 'bizes' ),
				'section'  => 'about_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'headings_about_section',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_about_section',
				array(
					'label' => esc_html__( 'Content', 'bizes' ),
					'type' => 'heading',
					'section' => 'about_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('about_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Sub Title
		$wp_customize->add_setting( 'about_section_subtitle',
			array(
				'sanitize_callback' => 'bizes_sanitize_html',
				'default'           => __( 'About Us', 'bizes' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_section_subtitle',
			array(
				'label'       => esc_html__( 'Subtitle', 'bizes' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);

		// Title
		$wp_customize->add_setting( 'about_section_title',
			array(
				'sanitize_callback' => 'bizes_sanitize_html',
				'default'           => __( '<b>25+ years</b> of Experiences for Give You Better Result', 'bizes' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_section_title',
			array(
				'label'       => esc_html__( 'Title', 'bizes' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);

		// Description
		$wp_customize->add_setting( 'about_section_description',
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
				'default'           => __( 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.', 'bizes' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_section_description',
			array(
				'label'       => esc_html__( 'Description', 'bizes' ),
				'description' => '',
				'type'        => 'textarea',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		

		// Counter 1 Number
		$wp_customize->add_setting( 'about_counter_1_num',
			array(
				'sanitize_callback' => 'absint',
				'default'           => __( '76', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_1_num',
			array(
				'label'       => esc_html__( 'Counter 1 Number', 'bizes' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->add_setting( 'about_counter_1_suff',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( 'K', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_1_suff',
			array(
				'label'       => esc_html__( 'Counter 1 Suffix', 'bizes' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->add_setting( 'about_counter_1_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( 'Expert Consultants', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_1_title',
			array(
				'label'       => esc_html__( 'Counter 1 Title', 'bizes' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);

		$wp_customize->add_setting( 'about_counter_2_num',
			array(
				'sanitize_callback' => 'absint',
				'default'           => __( '12', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_2_num',
			array(
				'label'       => esc_html__( 'Counter 2 Number', 'bizes' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->add_setting( 'about_counter_2_suff',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( 'K', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_2_suff',
			array(
				'label'       => esc_html__( 'Counter 2 Suffix', 'bizes' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->add_setting( 'about_counter_2_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( 'We have clients in', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_2_title',
			array(
				'label'       => esc_html__( 'Counter 2 Title', 'bizes' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);

		// Phone
		$wp_customize->add_setting('about_section_phone',
			 array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__( '+123 45678 90', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control('about_section_phone',
			 array(
				'label'     => esc_html__('Phone Number', 'bizes'),
				'type'    => 'text',
				'section'   => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);

		// Image 
		$wp_customize->add_setting( 'about_section_image',
			array(
				'default'           => get_template_directory_uri() . '/assets/img/about/about.png',
				'sanitize_callback' => 'bizes_sanitize_image',
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 'about_section_image',
				array(
					'label'         => esc_html__( 'Upload Image', 'bizes' ),
					'section'       => 'about_section_settings',
					'type'          => 'image',
					'active_callback' => function(){
						if( get_theme_mod( 'about_section_enable' ) ) {
						return true;
						} else {
						return false;
						}
					},
				)
			)
		);

		// Year
		$wp_customize->add_setting( 'about_exp_year',
			array(
				'sanitize_callback' => 'bizes_sanitize_html',
				'default'           => __( '30', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_exp_year',
			array(
				'label'       => esc_html__( 'Experiences Year', 'bizes' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);

		// Experiences Text
		$wp_customize->add_setting( 'about_exp_text',
			array(
				'sanitize_callback' => 'bizes_sanitize_html',
				'default'           => __( 'Years of Experiences', 'bizes' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_exp_text',
			array(
				'label'       => esc_html__( 'Experiences Text', 'bizes' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);

		// Headings
		$wp_customize->add_setting( 'headings_about_style',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Bizes_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_about_style',
				array(
					'label' => esc_html__( 'Style', 'bizes' ),
					'type' => 'heading',
					'section' => 'about_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('about_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Background
		$wp_customize->add_setting( 'about_section_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
			$wp_customize, 'about_section_bg',
				array(
					'label'   => esc_html__( 'Background', 'bizes' ),
					'section'     => 'about_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('about_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Top Padding
		$wp_customize->add_setting( 'about_section_pt',
		   array(
			  'default' => '',
			  //'transport' => 'postMessage',
			  'sanitize_callback' => 'bizes_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'about_section_pt',
		   array(
				'label'             => esc_html__( 'Padding Top (px)', 'bizes' ),
				'section'           => 'about_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('about_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Bottom Padding
		$wp_customize->add_setting( 'about_section_pb',
		   array(
			  'default' => '',
			  //'transport' => 'postMessage',
			  'sanitize_callback' => 'bizes_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'about_section_pb',
		   array(
				'label'             => esc_html__( 'Padding Bottom (px)', 'bizes' ),
				'section'           => 'about_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('about_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );


}