<?php

/* Single Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'single_post_settings',
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Single Post Settings', 'bizes' ),
		'description' => '',
		'panel'       => 'bizes_theme_options',
	)
);

// Single Post Page Layout
$wp_customize->add_setting( 'blog_single_layout',
	array(
		'default' => 'right-sidebar',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_radio_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_single_layout',
	array(
		'label'       => esc_html__( 'Single post page layout', 'bizes' ),
		'section' => 'single_post_settings',
		'choices' => array(
			'left-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-left.png',
				'name' => __( 'Left Sidebar', 'bizes' )
			),
			'no-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-none.png',
				'name' => __( 'Fullwidth', 'bizes' )
			),
			'right-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-right.png',
				'name' => __( 'Right Sidebar', 'bizes' )
			)
		),
	)
) );

// Show/Hide Thumbnail
$wp_customize->add_setting( 'single_post_thumb_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'single_post_thumb_display',
	array(
		'label'       => esc_html__( 'Display post thumbnail', 'bizes' ),
		'section'     => 'single_post_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post thumbnail', 'bizes' )
	)
) );

// Display Post Meta.
$wp_customize->add_setting( 'single_post_meta_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'single_post_meta_display',
	array(
		'label'			=> __( 'Display post meta.', 'bizes' ),
		'description'	=> __( 'Turn On/Off the switch to show/hide post meta', 'bizes' ),
		'section'     => 'single_post_settings',
	)
) );

// Display Post Date
$wp_customize->add_setting( 'single_post_date_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'single_post_date_display',
	array(
		'label'			=> esc_html__( 'Display post date.', 'bizes' ),
		'description'	=> esc_html__( 'Turn On/Off the switch to show/hide post date', 'bizes' ),
		'section'       => 'single_post_settings',
	)
) );

// Display Related Post
$wp_customize->add_setting( 'related_post_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'related_post_display',
	array(
		'label'       => esc_html__( 'Display related posts', 'bizes' ),
		'description'	=> esc_html__( 'Turn On/Off the switch to show/hide related posts', 'bizes' ),
		'section'       => 'single_post_settings',
	)
) );

/** Related Posts label */
$wp_customize->add_setting( 'related_posts_label',
	array(
		'default'           => esc_html__( 'You May Also Like...', 'bizes' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control( 'related_posts_label',
	array(
		'label'         => esc_html__( 'Related Posts Title', 'bizes' ),
		'section'       => 'single_post_settings',
		'type'          => 'text',
		'active_callback' =>function () {
			if ( get_theme_mod( 'related_post_display' ) ) {
				return true;
			} else {
				return false;
			}
		}
	)
);

// Related Post Choice
$wp_customize->add_setting( 'related_post_choice',
	 array(
		'default'   => 'category',
		'sanitize_callback' => 'bizes_sanitize_choices',
	)
);
$wp_customize->add_control( 'related_post_choice', 
	array(
		'label'    => esc_html__( 'Display Related Posts By:', 'bizes' ),
		'section'  => 'single_post_settings',
		'type'     => 'radio',
		'choices'  => array(
			'category' => esc_html__( 'Categories ', 'bizes' ),
			'choice2' => esc_html__( 'Tags', 'bizes' ),
		),
		'active_callback' =>function () {
			if ( get_theme_mod( 'related_post_display') ) {
				return true;
			} else {
				return false;
			}
		}
	)
);
