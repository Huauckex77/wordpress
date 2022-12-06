<?php 

/**
 * Add customizer selective refresh
 */
function bizes_customizer_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

	// Site Title
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' =>  function(){
				return bloginfo( 'name' );
		    },
	) );

	// Tagline
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' =>  function(){
				return bloginfo( 'description' );
		    },
	) );

	// Blog Page Title
	$wp_customize->selective_refresh->add_partial( 'blog_page_title', array(
		'selector' => '.banner-content .page-title',
		'settings' => array( 'blog_page_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'blog_page_title');
		    },
	) );

	// Read more text
	$wp_customize->selective_refresh->add_partial( 'post_read_more_text', array(
		'selector' => '.single-news .entry-content .read-more',
		'settings' => array( 'post_read_more_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'post_read_more_text');
		    },
	) );
	
	/*============================================
	Front Page Settings
	=============================================*/
	// About
	$wp_customize->selective_refresh->add_partial( 'about_section_subtitle', array(
		'selector' => '.about-section .about-content > h6',
		'settings' => array( 'about_section_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'about_section_subtitle');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'about_section_title', array(
		'selector' => '.about-section .about-content > h2',
		'settings' => array( 'about_section_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'about_section_title');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'about_section_description', array(
		'selector' => '.about-section .about-content > p',
		'settings' => array( 'about_section_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'about_section_description');
		    },
	) );

	// Services
	$wp_customize->selective_refresh->add_partial( 'services_section_title', array(
		'selector' => '#services-section .section-title h2',
		'settings' => array( 'services_section_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'services_section_title');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'services_section_subtitle', array(
		'selector' => '#services-section .section-title .sub-title',
		'settings' => array( 'services_section_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'services_section_subtitle');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'services_section_description', array(
		'selector' => '#services-section .section-title p',
		'settings' => array( 'services_section_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'services_section_description');
		    },
	) );

	//Review Section
	$wp_customize->selective_refresh->add_partial( 'feedback_section_title', array(
		'selector' => '.feedback-area .section-title  h2',
		'settings' => array( 'feedback_section_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'feedback_section_title');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'feedback_section_subtitle', array(
		'selector' => '.feedback-area .section-title .sub-title',
		'settings' => array( 'feedback_section_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'feedback_section_subtitle');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'feedback_section_description', array(
		'selector' => '.feedback-area .section-title  p',
		'settings' => array( 'feedback_section_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'feedback_section_description');
		    },
	) );

	//Team Section
	$wp_customize->selective_refresh->add_partial( 'team_section_title', array(
		'selector' => '.team-area .section-title  h2',
		'settings' => array( 'team_section_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'team_section_title');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'team_section_subtitle', array(
		'selector' => '.team-area .section-title  .sub-title',
		'settings' => array( 'team_section_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'team_section_subtitle');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'team_section_description', array(
		'selector' => '.team-area .section-title  p',
		'settings' => array( 'team_section_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'team_section_description');
			},
	) );

	//Pricing Section
	$wp_customize->selective_refresh->add_partial( 'pricing_section_title', array(
		'selector' => '#pricing-section .section-title  h2',
		'settings' => array( 'pricing_section_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'pricing_section_title');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'pricing_section_subtitle', array(
		'selector' => '#pricing-section .section-title  .sub-title',
		'settings' => array( 'pricing_section_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'pricing_section_subtitle');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'pricing_section_description', array(
		'selector' => '#pricing-section .section-title  p',
		'settings' => array( 'pricing_section_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'pricing_section_description');
			},
	) );

	//Portfolios Section
	$wp_customize->selective_refresh->add_partial( 'portfolio_section_title', array(
		'selector' => '#portfolio-section .section-title  h2',
		'settings' => array( 'portfolio_section_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'portfolio_section_title');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'portfolio_section_subtitle', array(
		'selector' => '#portfolio-section .section-title  .sub-title',
		'settings' => array( 'portfolio_section_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'portfolio_section_subtitle');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'portfolio_section_description', array(
		'selector' => '#portfolio-section .section-title  p',
		'settings' => array( 'portfolio_section_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'portfolio_section_description');
			},
	) );

	//CTA Section
	$wp_customize->selective_refresh->add_partial( 'cta_title', array(
		'selector' => '#cta-section .cta-inner h2',
		'settings' => array( 'cta_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'cta_title');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'cta_subtitle', array(
		'selector' => '#cta-section .cta-inner h6',
		'settings' => array( 'cta_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'cta_subtitle');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'cta_description', array(
		'selector' => '#cta-section .cta-inner p',
		'settings' => array( 'cta_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'cta_description');
				},
	) );

	// Latest Posts
	$wp_customize->selective_refresh->add_partial( 'news_section_title', array(
		'selector' => '.latest-news-area .section-title h2',
		'settings' => array( 'news_section_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'news_section_title');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'news_section_subtitle', array(
		'selector' => '.latest-news-area .section-title .sub-title',
		'settings' => array( 'news_section_subtitle' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'news_section_subtitle');
		    },
	) );
	$wp_customize->selective_refresh->add_partial( 'news_section_description', array(
		'selector' => '.latest-news-area .section-title p',
		'settings' => array( 'news_section_description' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'news_section_description');
		    },
	) );


	// Brands
	$wp_customize->selective_refresh->add_partial( 'brands_section_heading', array(
		'selector' => '#brands-section .section-heading  h2',
		'settings' => array( 'brands_section_heading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'brands_section_heading');
				},
	) );
	$wp_customize->selective_refresh->add_partial( 'brands_section_subheading', array(
		'selector' => '#brands-section .section-heading  .sub-title',
		'settings' => array( 'brands_section_subheading' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'brands_section_subheading');
				},
	) );

	// Related Post Title
	$wp_customize->selective_refresh->add_partial( 'related_posts_label', array(
		'selector' => '.related-heading h4',
		'settings' => array( 'related_posts_label' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'related_posts_label');
		    },
	) );


	// Footer Copyright Text
	$wp_customize->selective_refresh->add_partial( 'footer_copyright_text', array(
		'selector' => ' #copyright-text',
		'settings' => array( 'footer_copyright_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'footer_copyright_text');
			},
	) );

    /**
     * Selective Refresh style
     */
    $css_settings = array(

		//Color Settings
		'site_primary_color',
		'site_secondary_color',
		'body_text_color',
		'site_heading_color',

		'navigation_bg',
		'menu_link_color',
		'menu_hover_link_color',
		'submenu_bg_color',
		'submenu_text_color',
		'submenu_hover_text_color',

		'site_btn_bg_color',
		'site_btn_bg_hcolor',
		'site_btn_text_color',
		'site_btn_hover_text_color',

		'site_anchor_color',
		'site_anchor_hcolor',

		// Typography
		'nav_font_size',
		'subnav_font_size',
		'body_font_size',
		'body_line_height',

		'headings_line_height',
		'h1_font_size',
		'h2_font_size',
		'h3_font_size',
		'h4_font_size',
		'h5_font_size',
		'h6_font_size',

		//Header Settings
		'header_top_bg_color',
		'banner_overlay_color',

		// Slider Section
		'slider_max_content_width',
		'slider_bottom_cruved_bg',
		'slider_overlay_bg',
		
		// About Section
		'about_section_bg',
		
		// Service Section
		'service_section_bg',
		'service_top_cruved_bg',
		'service_bottom_cruved_bg',
		'service_section_pt',
		'service_section_pb',
		
		// Funfacts Section
		'funfacts_section_overlay',
		'funfacts_top_cruved_bg',
		'funfacts_bottom_cruved_bg',
		'funfacts_section_pt',
		'funfacts_section_pb',
		
		// Portfolios
		'portfolio_section_bg',
		'portfolio_overlay',
		'portfolio_top_cruved_bg',
		'portfolio_bottom_cruved_bg',
		'portfolio_section_pt',
		'portfolio_section_pb',
		
		// Feedback Section
		'feedback_section_overlay',
		'feedback_top_cruved_bg',
		'feedback_bottom_cruved_bg',
		'feedback_section_pt',
		'feedback_section_pb',
		
		// Team Section
		'team_section_bg',
		'team_member_overlay',
		'team_top_cruved_bg',
		'team_bottom_cruved_bg',
		'team_section_pt',
		'team_section_pb',

		// Pricing Section
		'pricing_section_bg',
		'pricing_top_cruved_bg',
		'pricing_bottom_cruved_bg',
		'pricing_section_pt',
		'pricing_section_pb',

		// CTA Section
		'cta_section_overlay',
		'cta_top_cruved_bg',
		'cta_bottom_cruved_bg',
		'cta_section_pb',
		'cta_section_pt',

		// News Section
		'news_section_bg',
		'news_top_cruved_bg',
		'news_bottom_cruved_bg',
		'news_section_pt',
		'news_section_pb',

		// Brands Section
		'brands_section_bg',
		'brands_top_cruved_bg',
		'brands_bottom_cruved_bg',
		'brands_section_pt',
		'brands_section_pb',

		// Footer
		'footer_widgets_title_color',
		'footer_widgets_text_color',
		'footer_widgets_link_color',
		'footer_widgets_link_hcolor',
		'footer_widgets_bg_color',


		'footer_copyright_text_color',
		'footer_copyright_bg_color',

    );
	
	$css_settings = apply_filters( 'bizes_selective_refresh_css_settings', $css_settings );

    foreach( $css_settings as $index => $key ) {
        if ( $wp_customize->get_setting( $key ) ) {
            $wp_customize->get_setting( $key )->transport = 'postMessage';
        } else {
            unset( $css_settings[ $index ] );
        }
    }
	
    $wp_customize->selective_refresh->add_partial( 'bizes-style-live-css', array(
        'selector' => '#bizes-style-inline-css',
        'settings' => $css_settings,
        'container_inclusive' => false,
        'render_callback' => 'bizes_custom_inline_style',
    ) );
	
}
add_action( 'customize_register', 'bizes_customizer_partials', 199 );