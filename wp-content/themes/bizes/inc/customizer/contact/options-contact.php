<?php
/**
 * Contact Page Settings
 * ----------------------------------------------------------------------
*/
 
	$wp_customize->add_panel( 'bizes_contact_settings',
		array(
			'priority'       => 40,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Contact Page Settings', 'bizes' ),
			'description'    => '',
		)
	);
	
	$wp_customize->add_section( 'contact_details_settings',
		array(
			'title'       => esc_html__( 'Contact Details', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_contact_settings',
		)
	);

	// Title
	$wp_customize->add_setting(
		'contact_info_title',
		array(
			'default'           => __( 'Contact Info', 'bizes' ),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'contact_info_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Section Title', 'bizes' ),
			'type'              => 'text',
		)
	);
	
    // Phone title  
	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           => __( 'Call Us', 'bizes' ),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone Label', 'bizes' ),
			'type'              => 'text',
		)
	);
	// Phone 1
	$wp_customize->add_setting(
		'phone_1',
		array(
			'default'           => __('+7(123) 9876 543', 'bizes'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'phone_1',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone 1 Number', 'bizes' ),
			'type'              => 'text',
		)
	);

	// Phone 2
	$wp_customize->add_setting(
		'phone_2',
		array(
			'default'           => __('+7(123) 9876 543', 'bizes'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'phone_2',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone 2 number', 'bizes' ),
			'type'              => 'text',
		)
	);

	// Mail Title
	$wp_customize->add_setting(
		'mail_title',
		array(
			'default'           => __('Email Us', 'bizes'),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'mail_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Mail Address Label', 'bizes' ),
			'type'              => 'text',
		)
	);
	// Mail 1 Address
	$wp_customize->add_setting( 'email_1',
		array(
			'default'           => 'help@bizes.com',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'email_1',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Email 1 Address', 'bizes' ),
			'type'              => 'text',
		)
	);

	// Mail 2 Address
	$wp_customize->add_setting( 'email_2',
		array(
			'default'           => 'info@bizes.com',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'email_2',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Email 2 Address', 'bizes' ),
			'type'              => 'text',
		)
	);

	// Address Title
	$wp_customize->add_setting(
		'address_title',
		array(
			'default'           => __('Location', 'bizes'),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'address_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Location Label', 'bizes' ),
			'type'              => 'text',
		)
	);

	// Address
	$wp_customize->add_setting(
		'contact_address',
		array(
			'default'           => __( 'Warnwe Park Streetperrine, FL 33157 New York City', 'bizes' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_address',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Location', 'bizes' ),
			'type'              => 'text',
		)
	);
	
	// Form Settings
	$wp_customize->add_section( 'contact_form_settings',
		array(
			'title'       => esc_html__( 'Contact Form', 'bizes' ),
			'panel'       => 'bizes_contact_settings',
		)
	);

	$wp_customize->add_setting(
		'contact_form_title',
		array(
			'default'           => __('Get in Touch', 'bizes'),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'contact_form_title',
		array(
			'section'           => 'contact_form_settings',
			'label'             => __( 'Section Title', 'bizes' ),
			'type'              => 'text',
		)
	);

	// Form shortcode
	$wp_customize->add_setting(
		'contact_form_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_form_shortcode',
		array(
			'section'           => 'contact_form_settings',
			'label'             => __( 'Contact Form 7 Shortcode', 'bizes' ),
            'description'       => __( 'Please generate the shortcode from contact form 7 widget', 'bizes' ),
			'type'              => 'text',
		)
	);

	// Map Settings
	$wp_customize->add_section( 'contact_map_settings',
		array(
			'title'       => esc_html__( 'Contact Map', 'bizes' ),
			'description' => '',
			'panel'       => 'bizes_contact_settings',
		)
	);
    $wp_customize->add_setting(
        'contact_google_map_iframe',
        array(
            'default'           => '',
            'sanitize_callback' => 'bizes_sanitize_map_iframe',
        )
    );
    $wp_customize->add_control(
        'contact_google_map_iframe',
        array(
            'section'         => 'contact_map_settings',
            'label'           => __( 'Embeded Google Map', 'bizes' ),
            'type'            => 'text',
        )
    );
