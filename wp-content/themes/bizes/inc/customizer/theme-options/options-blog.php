<?php
/**
 * Blog Post Settings
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'blog_settings',
	array(
		'priority'    => 5,
		'title'       => esc_html__( 'Blog/Archive Settings', 'bizes' ),
		'description' => '',
		'panel'       => 'bizes_theme_options',
		)
);

// Blog Page Title
$wp_customize->add_setting( 'blog_page_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Blog', 'bizes' ),
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'blog_page_title',
	array(
		'label'       => esc_html__( 'Blog Page Title', 'bizes' ),
		'section'     => 'blog_settings',
	)
);

// Blog Layout settings
$wp_customize->add_setting( 'blog_layout',
	array(
		'default' => 'right-sidebar',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_radio_sanitization'
	)
);
$wp_customize->add_control( new Bizes_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_layout',
	array(
		'label'       => esc_html__( 'Page Layout', 'bizes' ),
		'section' => 'blog_settings',
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

// Blog Style
$wp_customize->add_setting( 'blog_post_style',
	array(
		'default' => 'list',
		'transport' => 'refresh',
		'sanitize_callback' => 'bizes_text_sanitization'
	)
);
$wp_customize->add_control( 
	new Bizes_Text_Radio_Button_Custom_Control( 
		$wp_customize, 'blog_post_style',
		array(
			'label'   => esc_html__( 'Post Style', 'bizes' ),
			'section' => 'blog_settings',
			'choices' => array(
				'list'   => esc_html__('List Style', 'bizes'),
				'grid' => esc_html__('Grid Style', 'bizes'),
			),
		)
	) 
); 

// Blog Style settings
$wp_customize->add_setting( 'blog_post_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'masonry',
	)
);
$wp_customize->add_control( 'blog_post_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Grid Layout', 'bizes' ),
		'section'     => 'blog_settings',
		'choices'     => array(
			'masonry' => esc_html__( 'Masonry', 'bizes' ),
			'equal-height'  => esc_html__( 'Equal Height', 'bizes' ),
		),
		'active_callback' => function(){
			 if(get_theme_mod('blog_post_style') == 'grid'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);

// Post Column settings
$wp_customize->add_setting( 'blog_columns',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'two-columns',
	)
);
$wp_customize->add_control( 'blog_columns',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Grid Column', 'bizes' ),
		'description' => esc_html__( 'Select number of columns that you want to show on blog page. ', 'bizes' ),
		'section'     => 'blog_settings',
		'choices'     => array(
			'three-columns' => esc_html__( 'Three Columns', 'bizes' ),
			'two-columns'  => esc_html__( 'Two Columns', 'bizes' ),
			'single-column'    => esc_html__( 'Single Column', 'bizes' ),
		),
		'active_callback' => function(){
			 if(get_theme_mod('blog_post_style') == 'grid'){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);

// Display Post Thumbnail.
$wp_customize->add_setting( 'post_thumbnail_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'post_thumbnail_display',
	array(
		'label'		  => __( 'Display Post Thumbnails.', 'bizes' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post thumbnails on main blog page', 'bizes' )
	)
) );

// Display Post Content.
$wp_customize->add_setting( 'post_excerpt_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'post_excerpt_display',
	array(
		'label'			=> __( 'Display Post Excerpts', 'bizes' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post excerpts', 'bizes' )
	)
) );

// Excerpt count control and setting
$wp_customize->add_setting( 'post_excerpt_count',
   array(
      'default' => 20,
      'sanitize_callback' => 'bizes_sanitize_integer'
   )
);
$wp_customize->add_control( new Bizes_Slider_Custom_Control( $wp_customize, 'post_excerpt_count',
   array(
		'label'             => esc_html__( 'Excerpt Length', 'bizes' ),
		'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'bizes' ),
		'section'           => 'blog_settings',
		'input_attrs' => array(
			'min' => 10,
			'max' => 60,
			'step' => 1,
		),
		'active_callback' => function(){
			 if(get_theme_mod('post_excerpt_display')){
				return true;
			 } else {
				 return false;
			 }
		},
   )
) );

// Post dots
$wp_customize->add_setting( 'post_excerpt_dots',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '[...]',
	)
);
$wp_customize->add_control( 'post_excerpt_dots',
	array(
		'label'       => esc_html__( 'Excerpt Suffix', 'bizes' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Defines the three dots \'[...]\' that are appended automatically to excerpts.', 'bizes' ),
		'active_callback' => function(){
			 if(get_theme_mod('post_excerpt_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);

// Display Date Meta.
$wp_customize->add_setting( 'post_date_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'post_date_display',
	array(
		'label'			=> esc_html__( 'Display Date', 'bizes' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post date', 'bizes' )
	)
) );

// Display Date Meta.
$wp_customize->add_setting( 'post_cat_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'post_cat_display',
	array(
		'label'			=> esc_html__( 'Display Category', 'bizes' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post category', 'bizes' )
	)
) );



// Display Post Author
$wp_customize->add_setting( 'post_author_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'post_author_display',
	array(
		'label'			=> esc_html__( 'Display Post Author', 'bizes' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post author', 'bizes' )
	)
) );

// Display Post Comment
$wp_customize->add_setting( 'post_comment_number_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'bizes_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Bizes_Toggle_Switch_Custom_control( $wp_customize, 'post_comment_number_display',
	array(
		'label'			=> esc_html__( 'Display Comment Number', 'bizes' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post comment number', 'bizes' )
	)
) );

// Pagination - Pagination Type
$wp_customize->add_setting( 'pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'bizes' ),
		'section'         => 'blog_settings',
		'type'            => 'select',
		'choices'         => array(
			'numeric' => __( 'Default(Numeric)', 'bizes' ),
			'default' => __( 'Older/Newer', 'bizes' ),

		),
	)
);
