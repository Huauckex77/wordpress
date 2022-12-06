<?php 
	
/**
 * Section Order sortable
 * 
 * @package Bizes
 */

$wp_customize->add_section( 'bizes_section_orders',
	array(
		'priority'    => 90,
		'title'       => esc_html__( 'Section Order', 'bizes' ),
		'panel'       => 'bizes_frontpage_settings',
	)
);

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	$wp_customize->add_setting( 'bizes_sections_sort', 
		array(
			'sanitize_callback' => 'bizes_sanitize_sort',
			'default'           => array( 'slider', 'about', 'services', 'funfacts', 'portfolios', 'feedback', 'team', 'cta', 'pricing', 'brands','news'),
		)
	);

	$wp_customize->add_control( new Bizes_Control_Sortable( $wp_customize, 'bizes_sections_sort', 
		array(
			'label' => esc_html__( 'Sort Sections', 'bizes'  ),
			'section' => 'bizes_section_orders',
			'type'=> 'sortable',
			'choices'  => array(
				'slider' => esc_html__( 'Slider', 'bizes'  ),
				'about' => esc_html__( 'About', 'bizes'  ),
				'services' => esc_html__( 'Services', 'bizes'  ),
				'funfacts' => esc_html__( 'Funfacts', 'bizes'  ),
				'portfolios' => esc_html__( 'Portfolios', 'bizes'  ),
				'feedback' => esc_html__( 'Feedback', 'bizes'  ),
				'team' => esc_html__( 'Our Team', 'bizes'  ),
				'cta' => esc_html__( 'Call to Action', 'bizes'  ),
				'pricing' => esc_html__( 'Pricing Plan', 'bizes'  ),
				'brands' => esc_html__( 'Brand Logos', 'bizes'  ),
				'news' => esc_html__( 'Latest News', 'bizes'  ),
			),
			'description'	=> __( 'Drag and drop to rearange. Click on eye icon to hide a specific section', 'bizes' )
			) 
		) 
	);
}

if(!bizes_set_to_premium()) {
	// Plus message
	$wp_customize->add_setting( 'bizes_order_styling_message',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( new Bizes_Misc_Control( $wp_customize, 'bizes_order_styling_message',
		array(
			'type'        => 'custom_message',
			'section'     => 'bizes_section_orders',
			'description' => __('<h4 class="customizer-group-heading-message">Drag &amp; Drop Section Orders</h4><p class="customizer-group-heading-message">Install and upgrade the <a target="_blank" href="https://wordpress.org/plugins/themereps-helper/">Themereps Helper</a> plugin for full control over the frontpage SECTIONS ORDER! and for advanced styling</p>', 'bizes' )
		)
	));
}


