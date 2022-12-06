<?php
/**
 * Site Identity.
 */

	/* Sticky Logo */
	$wp_customize->add_setting( 
		'bizes_sticky_logo', 
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Upload_Control( 
			$wp_customize, 
			'bizes_sticky_logo', 
			array(
				'label'      => __( 'Sticky Logo', 'bizes' ),
				'priority'   => 9,
				'section'    => 'title_tagline'                   
			)
		) 
	);

	// Logo, title and description chooser
	$wp_customize->add_setting( 'site_logo_option',
		array (
			'default'           => 'title-only',
			'sanitize_callback' => 'bizes_sanitize_logo',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control( 'site_logo_option',
		array(
			'label'     	=> esc_html__( 'Site Logo Options', 'bizes' ),
			'section'   	=> 'title_tagline',
			'type'      	=> 'radio',
			'description'	=> esc_html__( 'Choose your preferred option.', 'bizes' ),
			'choices'   => array (
				'title-only' 	=> esc_html__( 'Display Site title only.', 'bizes' ),
				'title-desc' 	=> esc_html__( 'Display site title & tagline.', 'bizes' ),
				'logo-only'     => esc_html__( 'Display logo image only.', 'bizes' ),
			)
		)
	);

// Heading
$wp_customize->add_setting( 'bizes_site_title_heaidng',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Bizes_Simple_Notice_Custom_Control( 
		$wp_customize, 'bizes_site_title_heaidng',
		array(
			'label' => esc_html__( 'Site Title Style', 'bizes' ),
			'type' => 'heading',
			'section' => 'title_tagline',
			'active_callback' 		=> 'callback_bizes_site_title'
		)
	) 
);
// Title Font family
$wp_customize->add_setting( 'site_title_font_family',
		array(
		 'default' => json_encode(
			 array(
				'font' => 'Raleway',
				'boldweight' => '600',
				'category' => 'sans-serif'
			 )
		  ),
		'sanitize_callback' => 'bizes_google_font_sanitization',
		'transport' => 'refresh',
	)
);
$wp_customize->add_control( new Bizes_Google_Font_Select_Custom_Control( $wp_customize, 'site_title_font_family',
		array(
			'label'    => esc_html__( 'Site Title Font Family','bizes'),
			'section'  => 'title_tagline',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
			'active_callback' 		=> 'callback_bizes_site_title'
		)
	) 
);

// Site Title Font Size
$wp_customize->add_setting( 'site_title_font_size',
	array(
        'sanitize_callback' => 'bizes_sanitize_integer',
		'default'           => 28,
		'transport' 		=> 'refresh',
	)
);
$wp_customize->add_control( new Bizes_Slider_Custom_Control( 
	$wp_customize, 'site_title_font_size', 
		array(
			'label'	    => esc_html__('Site Title Font Size(px)','bizes'),
			'section'       => 'title_tagline',
			'type'          => 'range',
			'input_attrs'   => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'suffix' => 'px', //optional suffix
			),
			'active_callback' 		=> 'callback_bizes_site_title'
		)
	)
);

// Site Title Color
$wp_customize->add_setting( 'site_title_color',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_hex_rgba_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( $wp_customize, 'site_title_color',
	array(
		'label'       => esc_html__( 'Site Title Color', 'bizes' ),
		'section'     => 'title_tagline',
		'input_attrs' => array(
			'palette' => array(
				'#000000',
				'#ffffff',
				'#444444',
				'#777777',
				'#999999',
				'#aaaaaa',
				'#dddddd',
				'#222222',
			)
		),
		'active_callback' 		=> 'callback_bizes_site_title'
	)
) );

// Site Title Heading
$wp_customize->add_setting( 'bizes_site_tagline_heaidng',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Bizes_Simple_Notice_Custom_Control( 
		$wp_customize, 'bizes_site_tagline_heaidng',
		array(
			'label' => esc_html__( 'Tagline Style', 'bizes' ),
			'type' => 'heading',
			'section' => 'title_tagline',
			'active_callback' 		=> 'callback_bizes_logo_tagline'
		)
	) 
);
// Tagline Font family
$wp_customize->add_setting( 'tagline_font_family',
		array(
		 'default' => json_encode(
			 array(
				'font' => 'Poppins',
				'boldweight' => '400',
				'category' => 'sans-serif'
			 )
		  ),
		'sanitize_callback' => 'bizes_google_font_sanitization',
		'transport' => 'refresh',
	)
);
$wp_customize->add_control( new Bizes_Google_Font_Select_Custom_Control( $wp_customize, 'tagline_font_family',
		array(
			'label'    => esc_html__( 'Tagline Font Family','bizes'),
			'section'  => 'title_tagline',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
			'active_callback' 		=> 'callback_bizes_logo_tagline'
		)
	) 
);

// Tagline Font Size
$wp_customize->add_setting( 'tagline_font_size',
	array(
        'sanitize_callback' => 'bizes_sanitize_integer',
		'default'           => 14,
		'transport' 		=> 'refresh',
	)
);
$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'tagline_font_size', 
		array(
			'label'         => esc_html__( 'Tagline Font Size', 'bizes' ),
			'section'       => 'title_tagline',
			'type'          => 'range',
			'input_attrs'   => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'suffix' => 'px', //optional suffix
			),
			'active_callback' 		=> 'callback_bizes_logo_tagline'
		)
	)
);

//Tagline Color
$wp_customize->add_setting( 'tagline_text_color',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_hex_rgba_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( $wp_customize, 'tagline_text_color',
	array(
		'label'       => esc_html__( 'Tagline Color', 'bizes' ),
		'section'     => 'title_tagline',
		'input_attrs' => array(
			'palette' => array(
				'#000000',
				'#ffffff',
				'#444444',
				'#777777',
				'#999999',
				'#aaaaaa',
				'#dddddd',
				'#222222',
			)
		),
		'active_callback' 		=> 'callback_bizes_logo_tagline'
	)
) );


// Site Title Callback
function callback_bizes_site_title() {
	
	if ( 'title-only' == get_theme_mod( 'site_logo_option') || 'title-desc' == get_theme_mod( 'site_logo_option' ) || 'title-img' == get_theme_mod( 'site_logo_option' ) ) {
		return true;
	} else {
		return false;
	}
	
}
// Site Tagline Callback
function callback_bizes_logo_tagline() {
	
	if ( 'title-desc' == get_theme_mod( 'site_logo_option' ) ) {
		return true;
	} else {
		return false;
	}
	
}

