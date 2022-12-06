<?php
/* Header
----------------------------------------------------------------------*/
$wp_customize->add_section( 'bizes_header_settings',
	array(
		'title'       => esc_html__( 'Header Settings', 'bizes' ),
		'description' => '',
		'panel'       => 'bizes_theme_options',
		'priority'    => 4,
	)
);

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Header Style
	$wp_customize->add_setting( 'header_style',
		array(
			'default' => 'style-1',
			'transport' => 'refresh',
			'sanitize_callback' => 'bizes_radio_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Image_Radio_Button_Custom_Control( $wp_customize, 'header_style',
		array(
			'label' => __( 'Header Style', 'bizes' ),
			'section' => 'bizes_header_settings',
			'choices' => array(
				'style-1' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/header-style-1.png',
					'name' => __( 'Style One', 'bizes' )
				),
				'style-3' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/header-style-2.png',
					'name' => __( 'Style Two', 'bizes' )
				),
				'style-2' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/header-style-3.png',
					'name' => __( 'Style Three', 'bizes' )
				)
			),
		)
	) );
}

// Show/Hide Header Top Area
$wp_customize->add_setting( 'header_top_display',
	array(
		'default' => 0,
		'transport'			=> 'refresh',
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'header_top_display',
	array(
		'label'         => esc_html__( 'Show Header Top', 'bizes' ),
		'section'     => 'bizes_header_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide header top area.', 'bizes' )
	)
) );

// Header container width.
$wp_customize->add_setting( 'header_container_width',
	array(
		'default' => 'container',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_text_sanitization'
	)
);
$wp_customize->add_control( 
	new Bizes_Text_Radio_Button_Custom_Control( 
		$wp_customize, 'header_container_width',
		array(
			'label'   => esc_html__( 'Header Container', 'bizes' ),
			'section' => 'bizes_header_settings',
			'choices' => array(
				'container'   => esc_html__('Contained','bizes'),
				'container-fluid' => esc_html__('Full Width','bizes'),
			),
		)
	) 
);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Sticky Header
	$wp_customize->add_setting( 'site_sticky_header',
		array(
			'default' => 0,
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'site_sticky_header',
		array(
			'label'       => esc_html__( 'Header Sticky', 'bizes' ),
			'section'     => 'bizes_header_settings',
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable header sticky.', 'bizes' ),
		)
	) );
}

// Display Phone Number
$wp_customize->add_setting( 'header_display_phone',
	array(
		'default' => 1,
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'header_display_phone',
	array(
		'label'       => esc_html__( 'Show Phone Number?', 'bizes' ),
		'section'     => 'bizes_header_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide phone number', 'bizes' ),
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') && get_theme_mod('header_style') == 'style-1'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );

// Phone Number
$wp_customize->add_setting( 'header_phone',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( '(+123)-456-7890', 'bizes' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'header_phone',
	array(
		'label'       => esc_html__( 'Your Phone', 'bizes' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'bizes_header_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') && get_theme_mod('header_style') == 'style-1'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'header_phone', array(
	'selector'        => '.header-top .phone',
	'render_callback' =>  function(){
			return get_theme_mod( 'header_phone');
		},
) );

// Display email address
$wp_customize->add_setting( 'header_display_email',
	array(
		'default' => 1,
		'transport' => 'postMessage',
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'header_display_email',
	array(
		'label'       => esc_html__( 'Show Email Address?', 'bizes' ),
		'section'     => 'bizes_header_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide email address', 'bizes' ),
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') && get_theme_mod('header_style') == 'style-1'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );


// Emial Address
$wp_customize->add_setting( 'header_email',
	array(
		'sanitize_callback' => 'sanitize_email',
		'default'           => esc_html__( 'help@bizes.com', 'bizes' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'header_email',
	array(
		'label'       => esc_html__( 'Your Email', 'bizes' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'bizes_header_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') && get_theme_mod('header_style') == 'style-1'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'header_email', array(
	'selector'        => '.header-top .email',
	'render_callback' =>  function(){
			return get_theme_mod( 'header_email');
		},
) );


// Display email address
$wp_customize->add_setting( 'header_social_enable',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'header_social_enable',
	array(
		'label'       => esc_html__( 'Show Social Icons?', 'bizes' ),
		'section'     => 'bizes_header_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide social icons', 'bizes' ),
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') && get_theme_mod('header_style') == 'style-1'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );

if(class_exists('WooCommerce')){
	// Display Cart Icons
	$wp_customize->add_setting( 'header_cart_icon_display',
		array(
			'default' => 1,
			'sanitize_callback' => 'bizes_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'header_cart_icon_display',
		array(
			'label'       => esc_html__( 'Display cart icon?', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to show/hide cart icon', 'bizes' ),
			'section'     => 'bizes_header_settings',
		)
	) );
}
// Button
$wp_customize->add_setting( 'header_btn_display',
	array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
 $wp_customize->add_control( 
	new Bizes_Toggle_Switch_Custom_control( 
		$wp_customize, 'header_btn_display',
		array(
			'label' => esc_html__( 'Display Button', 'bizes' ),
			'description' => esc_html__( 'Turn On/Off the switch to show/hide header button', 'bizes' ),
			'section' => 'bizes_header_settings'
		)
	) 
);     
$wp_customize->add_setting( 'header_btn_text', 
	array(
		'default' => __('Get a Quote','bizes'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control( 'header_btn_text', 
	array(
		'label' => esc_html__( 'Button Text', 'bizes' ),
		'section' => 'bizes_header_settings',
		'type' => 'text',
		'active_callback' => function(){
			 if(get_theme_mod('header_btn_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
); 
$wp_customize->selective_refresh->add_partial( 'header_btn_text', array(
	'selector'        => '.header-btn a.btn',
	'render_callback' =>  function(){
			return get_theme_mod( 'header_btn_text');
		},
) );

$wp_customize->add_setting( 'header_btn_link', 
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'header_btn_link', 
	array(
		'label' => esc_html__( 'Button link', 'bizes' ),
		'section' => 'bizes_header_settings',
		'type' => 'url',
		'active_callback' => function(){
			 if(get_theme_mod('header_btn_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->add_setting( 'header_btn_link_open',
array(
	'default' => 0,
	'sanitize_callback' => 'bizes_switch_sanitization'
)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control(
		$wp_customize, 'header_btn_link_open',
		array(
			'label' => esc_html__( 'Open button link in a new tab', 'bizes' ),
			'section' => 'bizes_header_settings',
			'active_callback' => function(){
				 if(get_theme_mod('header_btn_display')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	)
);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Topbar BG Color
	$wp_customize->add_setting( 'header_top_bg_color', array(
		  'default' => 'rgba(0,0,0,0.2)',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'bizes_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
		$wp_customize, 'header_top_bg_color',
			array(
				'label'   => esc_html__( 'Topbar Background', 'bizes' ),
				'section'     => 'bizes_header_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if( 1===get_theme_mod('header_top_display') && get_theme_mod('header_style') == 'style-1'){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
}
/* ===========================================================
	Banner Image
===============================================================*/
$wp_customize->add_setting( 'banner_height',
	array(
        'sanitize_callback' => 'bizes_sanitize_integer',
		'default'           => 380,
	)
);
$wp_customize->add_control( new Bizes_Slider_Custom_Control( 
	$wp_customize, 'banner_height', 
		array(
			'label'	    => esc_html__('Banner Height(px)','bizes'),
			'type'      => 'range',
			'section'   => 'header_image',
			'input_attrs'    => array(
				'min'   => 280,
				'max'   => 800,
				'step'  => 1,
				'suffix' => 'px',
			),
		)
	)
);

// Overlay
$wp_customize->add_setting( 'banner_overlay_color', array(
	  'default' => 'rgba(0, 0, 0, 0.1)',
      'sanitize_callback' => 'bizes_hex_rgba_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( 
	$wp_customize, 'banner_overlay_color',
		array(
			'label'   => esc_html__( 'Background Overlay', 'bizes' ),
			'section'     => 'header_image',
			'show_opacity' => true,
		)
	) 
);

// Breadcrumb
$wp_customize->add_setting( 'breadcrumbs_display',
array(
	'default' => 1,
	'sanitize_callback' => 'bizes_switch_sanitization',
	'transport' => 'postMessage'
)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control(
		$wp_customize, 'breadcrumbs_display',
		array(
			'label' => esc_html__( 'Display Breadcrumbs', 'bizes' ),
			'section' => 'header_image',
		)
	)
);

// Page Banner Image 
$wp_customize->add_setting( 'bizes_page_banner',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
		'sanitize_callback' => 'bizes_sanitize_image',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'bizes_page_banner',
		array(
			'label'         => esc_html__( 'Page Banner Image ', 'bizes' ),
			'description'   => esc_html__( 'Upload Banner Image for Pages. Recommended size is 1920px by 375px.', 'bizes' ),
			'section'       => 'header_image',
			'type'          => 'image',
		)
	)
);

// Archive Banner Image 
$wp_customize->add_setting( 'bizes_archive_banner',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
		'sanitize_callback' => 'bizes_sanitize_image',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'bizes_archive_banner',
		array(
			'label'         => esc_html__( 'Archive Page Banner Image ', 'bizes' ),
			'description'   => esc_html__( 'Upload Banner Image for Archive Pages. Recommended size is 1920px by 375px.', 'bizes' ),
			'section'       => 'header_image',
			'type'          => 'image',
		)
	)
);

// Search Banner Image 
$wp_customize->add_setting( 'bizes_search_banner',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
		'sanitize_callback' => 'bizes_sanitize_image',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'bizes_search_banner',
		array(
			'label'         => esc_html__( 'Search Page Banner Image', 'bizes' ),
			'description'   => esc_html__( 'Upload Banner Image for Search Page. Recommended size is 1920px by 375px', 'bizes' ),
			'section'       => 'header_image',
			'type'          => 'image',
		)
	)
);

// 404 Banner Image 
$wp_customize->add_setting( 'bizes_404_banner',
	array(
		'default'           => get_template_directory_uri() . '/assets/img/banner/banner.jpg',
		'sanitize_callback' => 'bizes_sanitize_image',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Image_Control( $wp_customize, 'bizes_404_banner',
		array(
			'label'         => esc_html__( '404 Page Banner Image', 'bizes' ),
			'description'   => esc_html__( 'Upload Banner Image for 404 Page. Recommended size is 1920px by 375px', 'bizes' ),
			'section'       => 'header_image',
			'type'          => 'image',
		)
	)
);
