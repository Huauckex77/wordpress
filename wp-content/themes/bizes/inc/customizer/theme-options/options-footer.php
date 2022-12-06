<?php
/* Footer Widgets Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'footer_widgets_settings',
	array(
		'title'       => esc_html__( 'Footer Settings', 'bizes' ),
		'panel'       => 'bizes_theme_options',
		'priority'    => 9,
	)
);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Style
	$wp_customize->add_setting( 'footer_style',
		array(
			'default' => 'style-1',
			'transport' => 'refresh',
			'sanitize_callback' => 'bizes_radio_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Image_Radio_Button_Custom_Control( $wp_customize, 'footer_style',
		array(
			'label' => __( 'Footer Style', 'bizes' ),
			'section' => 'footer_widgets_settings',
			'choices' => array(
				'style-1' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/footer-1.png',
					'name' => __( 'Style One', 'bizes' )
				),
				'style-2' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/footer-2.png',
					'name' => __( 'Style Two', 'bizes' )
				)
			),
		)
	) );
}

// Widget Layout
$wp_customize->add_setting( 'footer_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		// 'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'footer_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Wigets Layout', 'bizes' ),
		'section'     => 'footer_widgets_settings',
		'description' => esc_html__( 'Number footer columns to display.', 'bizes' ),
		'choices'     => array(
			'4' => 4,
			'3' => 3,
			'2' => 2,
			'1' => 1,
			'0' => esc_html__( 'Disable footer widgets', 'bizes' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i ++ ) {
	$df = 12;
	if ( $i > 1 ) {
		$_n = 12 / $i;
		$df = array();
		for ( $j = 0; $j < $i; $j ++ ) {
			$df[ $j ] = $_n;
		}
		$df = join( '+', $df );
	}
	$wp_customize->add_setting( 'footer_custom_' . $i . '_columns',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => $df,
		)
	);
	$wp_customize->add_control( 'footer_custom_' . $i . '_columns',
		array(
		    /* translators: Custom footer columns width */
			'label'       => $i == 1 ? __( 'Custom footer 1 column width', 'bizes' ) : sprintf( __( 'Custom footer %s columns width', 'bizes' ), $i ),
			'section'     => 'footer_widgets_settings',
			'description' => esc_html__( 'Enter int numbers and sum of them must smaller or equal 12, separated by "+"', 'bizes' ),
		)
	);
}


if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Widget Title Color
	$wp_customize->add_setting( 'footer_widgets_title_color', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_title_color',
			array(
				'label'   => esc_html__( 'Title Color', 'bizes' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if( '0' !=$footer_layout && get_theme_mod('footer_style') == 'style-1' ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
	
	// Widget Text Color
	$wp_customize->add_setting( 'footer_widgets_text_color', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_text_color',
			array(
				'label'       => esc_html__( 'Text Color', 'bizes' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout && get_theme_mod('footer_style') == 'style-1' ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);

	//Social Icon Display
	$wp_customize->add_setting( 'footer_social_icon_enable',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control(
			$wp_customize, 'footer_social_icon_enable',
			array(
				'label' => esc_html__( 'Display Social Icons?', 'bizes' ),
				'section' => 'footer_widgets_settings',
				'active_callback' => function(){
					if(get_theme_mod('footer_style') == 'style-2' ){
						return true;
					} else {
						return false;
					}
				},
			)
		)
	);
	
	// Widgets Link Color
	$wp_customize->add_setting( 'footer_widgets_link_color', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_link_color',
			array(
				'label'       => esc_html__( 'Link Color', 'bizes' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
	
	// Widget Link Hover Color
	$wp_customize->add_setting( 'footer_widgets_link_hcolor', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_link_hcolor',
			array(
				'label'       => esc_html__( 'Link Hover Color', 'bizes' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
	
	
}


	// Background
	$wp_customize->add_setting( 'footer_widgets_bg_color', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_bg_color',
			array(
				'label'   => esc_html__( 'Background Color', 'bizes' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);

	// Top Curve
	$wp_customize->add_setting( 'footer_top_cruved',
		array(
			'default' => 0,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'footer_top_cruved',
		array(
			'label'         => esc_html__( 'Show Curved Top', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to show/hide curved top area on footer section', 'bizes' ),
			'section'  => 'footer_widgets_settings',
		)
	) );

/* Footer Copyright Settings
----------------------------------------------------------------------*/

$wp_customize->add_section( 'footer_copyright_settings',
	array(
		'title'       => esc_html__( 'Copyright Info', 'bizes' ),
		'description' => '',
		'panel'       => 'bizes_theme_options',
		'priority'    => 12,
	)
);

// Copyright Text
$wp_customize->add_setting( 'footer_copyright_text',
	 array(
	    'default'			  => '',
		'transport'			  => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control('footer_copyright_text',
	array(
		'label'    => esc_html__('Copyright Text', 'bizes'),
		'section'  => 'footer_copyright_settings',
		'type'     => 'text'
	)
);


	// Copyright Background Color
	$wp_customize->add_setting( 'footer_copyright_bg_color', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Alpha_Color_Control( 
		$wp_customize, 'footer_copyright_bg_color',
			array(
				'label'       => esc_html__( 'Background Color', 'bizes' ),
				'section'     => 'footer_copyright_settings',
				'input_attrs' => array(
					'palette' => array(
						'#1F1F1F',
						'#000000',
						'#999999',
						'#f85c70',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					)
				),
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Copyright Text Color
	$wp_customize->add_setting( 'footer_copyright_text_color', array(
		  'default' => '',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Alpha_Color_Control( 
		$wp_customize, 'footer_copyright_text_color',
			array(
				'label'       => esc_html__( 'Text Color', 'bizes' ),
				'section'     => 'footer_copyright_settings',
				'input_attrs' => array(
					'palette' => array(
						'#ffffff',
						'#707070',
						'#999999',
						'#f85c70',
						'#eeee22',
						'#81d742',
						'#1e73be',
						'#8224e3',
					)
				),
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);

}