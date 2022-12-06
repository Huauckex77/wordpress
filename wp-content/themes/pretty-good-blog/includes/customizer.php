<?php
/**
 * Theme Customizer
 *
 * @package Best Recipe
 */

function good_looking_blog_editor_posts_frontpage_settings( $wp_customize ){

	$wp_customize->add_section( 'good_looking_blog_editor_posts',
	    array(
	        'title'         => esc_html__( 'Editors Pick Section', 'pretty-good-blog' ),
	        'priority'      => 50,
	        'panel'         => 'frontpage_settings'
	    )
	);

	/** Hide Editor Picks Section */
    $wp_customize->add_setting(
        'ed_editor_section',
        array(
            'default'           => true,
            'sanitize_callback' => 'good_looking_blog_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Good_Looking_Blog_Toggle_Control(
            $wp_customize,
            'ed_editor_section',
            array(
                'section'     => 'good_looking_blog_editor_posts',
                'label'	      => esc_html__( 'Hide Editor Picks Section', 'pretty-good-blog' ),
                'description' => esc_html__( 'Enable to hide editor picks section.', 'pretty-good-blog' ),
            )
        )
    );

    $wp_customize->add_setting(
        'editor_post_section_title',
        array(
            'default'           => esc_html__( 'Editors Pick', 'pretty-good-blog' ),
            'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage'
        )
    );

    $wp_customize->add_control(
        'editor_post_section_title',
        array(
            'section'           => 'good_looking_blog_editor_posts',
            'label'             => esc_html__( 'Section Title', 'pretty-good-blog' ),
            'type'              => 'text',
        )
    );

 	$wp_customize->selective_refresh->add_partial( 'editor_post_section_title', array(
        'selector'        => '.editors-picks-section .section-header h2.section-title',
        'render_callback' => 'good_looking_blog_editor_posts_title',
    ) );

    $wp_customize->add_setting(
		'editor_post_one',
		array(
			'default'			=> '',
			'sanitize_callback' => 'good_looking_blog_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'editor_post_one',
		array(
			'label'   => esc_html__( 'Select Editors post', 'pretty-good-blog' ),
			'section' => 'good_looking_blog_editor_posts',
			'choices' => good_looking_blog_get_posts( 'post', false ),
			'type'    => 'select'
		)
	);

	$wp_customize->add_setting(
		'editor_post_two',
		array(
			'default'			=> '',
			'sanitize_callback' => 'good_looking_blog_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'editor_post_two',
		array(
			'label'   => esc_html__( 'Select Editors post', 'pretty-good-blog' ),
			'section' => 'good_looking_blog_editor_posts',
			'choices' => good_looking_blog_get_posts( 'post', false ),
			'type'    => 'select'
		)
	);

	$wp_customize->add_setting(
		'editor_post_three',
		array(
			'default'			=> '',
			'sanitize_callback' => 'good_looking_blog_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'editor_post_three',
		array(
			'label'   => esc_html__( 'Select Editors post', 'pretty-good-blog' ),
			'section' => 'good_looking_blog_editor_posts',
			'choices' => good_looking_blog_get_posts( 'post', false ),
			'type'    => 'select'
		)
	);

	$wp_customize->add_setting(
		'editor_post_four',
		array(
			'default'			=> '',
			'sanitize_callback' => 'good_looking_blog_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'editor_post_four',
		array(
			'label'   => esc_html__( 'Select Editors post', 'pretty-good-blog' ),
			'section' => 'good_looking_blog_editor_posts',
			'choices' => good_looking_blog_get_posts( 'post', false ),
			'type'    => 'select'
		)
	);
}