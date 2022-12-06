<?php
/* Global Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'bizes_global_settings',
	array(
		'priority'    => 1,
		'title'       => esc_html__( 'Global Settings', 'bizes' ),
		'panel'       => 'bizes_theme_options',
	)
);

// Add our Checkbox switch setting and control for opening URLs in a new tab
$wp_customize->add_setting( 'bizes_animation_disable',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'bizes_animation_disable',
	array(
		'label' => __( 'Scroll Animation', 'bizes' ),
		'section' => 'bizes_global_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide scrolling animation.', 'bizes' )
	)
) );

// Preloader Disable
$wp_customize->add_setting( 'preloader_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'preloader_display',
	array(
		'label' => __( 'Show Preloader', 'bizes' ),
		'section' => 'bizes_global_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide preloader.', 'bizes' )
	)
) );

// Preloading Text
$wp_customize->add_setting( 'preloader_text',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => __('Loading', 'bizes'),
	)
);
$wp_customize->add_control( 'preloader_text',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Preloading Text', 'bizes' ),
		'section'     => 'bizes_global_settings',
		'active_callback' => function(){
			 if(get_theme_mod('preloader_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);

// BG Color
$wp_customize->add_setting( 'preloader_bg_color',
	array(
		'default' => 'rgba(29, 161, 242, 1)',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_hex_rgba_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Customize_Alpha_Color_Control( $wp_customize, 'preloader_bg_color',
	array(
		'label'       => esc_html__( 'Preloader background', 'bizes' ),
		'section' => 'bizes_global_settings',
		'input_attrs' => array(
			'palette' => array(
				'#000000',
				'#222222',
				'#444444',
				'#777777',
				'#999999',
				'#aaaaaa',
				'#dddddd',
				'#ffffff',
			)
		),
		'active_callback' => function(){
			 if(get_theme_mod('preloader_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );



// Scrollup Button
$wp_customize->add_setting( 'scrollup_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'scrollup_display',
	array(
		'label'       => esc_html__( 'Display ScrollUp Button', 'bizes' ),
		'section'     => 'bizes_global_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide scrollup button.', 'bizes' )
	)
) );



// Social URLs
$wp_customize->add_setting( 'social_urls',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'bizes_url_sanitization'
   )
);
 
$wp_customize->add_control( new Bizes_Sortable_Repeater_Custom_Control( $wp_customize, 'social_urls',
   array(
		'label'       => esc_html__( 'Social Profiles', 'bizes' ),
		'description' => esc_html__( 'Add your social media links.', 'bizes' ),
		'section'     => 'bizes_global_settings',
		'button_labels' => array(
			'add' => __( 'Add Social URL', 'bizes' ),
		),
   )
) );

// Add our Single Accordion setting and Custom Control to list the available Social Media icons
$socialIconsList = array(
	'Behance' => __( '<i class="icofont-behance"></i>', 'bizes' ),
	'DeviantArt' => __( '<i class="icofont-deviantart"></i>', 'bizes' ),
	'Dribbble' => __( '<i class="icofont-dribbble"></i>', 'bizes' ),
	'Etsy' => __( '<i class="icofont-brand-etsy"></i>', 'bizes' ),
	'Facebook' => __( '<i class="icofont-facebook"></i>', 'bizes' ),
	'Flickr' => __( '<i class="icofont-flikr"></i>', 'bizes' ),
	'Foursquare' => __( '<i class="icofont-foursquare"></i>', 'bizes' ),
	'GitHub' => __( '<i class="icofont-github"></i>', 'bizes' ),
	'Google+' => __( '<i class="icofont-google-plus"></i>', 'bizes' ),
	'Instagram' => __( '<i class="icofont-instagram"></i>', 'bizes' ),
	'Kickstarter' => __( '<i class="icofont-kickstarter"></i>', 'bizes' ),
	'Last.fm' => __( '<i class="icofont-brand-lastfm"></i>', 'bizes' ),
	'LinkedIn' => __( '<i class="icofont-linkedin"></i>', 'bizes' ),
	'Pinterest' => __( '<i class="icofont-pinterest"></i>', 'bizes' ),
	'Reddit' => __( '<i class="icofont-reddit"></i>', 'bizes' ),
	'Slack' => __( '<i class="icofont-slack"></i>', 'bizes' ),
	'SlideShare' => __( '<i class="icofont-brand-slideshare"></i>', 'bizes' ),
	'Snapchat' => __( '<i class="icofont-brand-snapchat"></i>', 'bizes' ),
	'SoundCloud' => __( '<i class="icofont-soundcloud"></i>', 'bizes' ),
	'Spotify' => __( '<i class="icofont-spotify"></i>', 'bizes' ),
	'Stack Overflow' => __( '<i class="icofont-stack-overflow"></i>', 'bizes' ),
	'Tumblr' => __( '<i class="icofont-tumblr"></i>', 'bizes' ),
	'Twitch' => __( '<i class="icofont-twitch"></i>', 'bizes' ),
	'Twitter' => __( '<i class="icofont-twitter"></i>', 'bizes' ),
	'Vimeo' => __( '<i class="icofont-vimeo"></i>', 'bizes' ),
	'Weibo' => __( '<i class="icofont-weibo"></i>', 'bizes' ),
	'YouTube' => __( '<i class="icofont-youtube"></i>', 'bizes' ),
);
$wp_customize->add_setting( 'social_url_icons',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_text_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Single_Accordion_Custom_Control( $wp_customize, 'social_url_icons',
	array(
		'label' => __( 'View available social icons', 'bizes' ),
		'description' => $socialIconsList,
		'section' => 'bizes_global_settings',
	)
) );

// Social links open newtab
$wp_customize->add_setting( 'social_newtab',
	array(
		'default' => 1,
		//'transport' => 'postMessage',
		'sanitize_callback' => 'bizes_switch_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'social_newtab',
	array(
		'label' => __( 'Open Social URLs in new tab', 'bizes' ),
		'section' => 'bizes_global_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') && get_theme_mod('header_style') == 'style-1'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );
