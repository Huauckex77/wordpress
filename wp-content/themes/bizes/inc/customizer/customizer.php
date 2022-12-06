<?php
/**
 * Bizes Theme Customizer
 *
 * @package Bizes
 */
 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bizes_customize_register( $wp_customize ) {
	
	// Load custom controls.
	require_once get_template_directory() . '/inc/customizer/controls/custom-controls.php';
    require_once get_template_directory() . '/inc/customizer/controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/customizer/controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/customizer/controls/sortable/control-sortable-fields.php';
	$wp_customize->register_control_type('Bizes_Control_Sortable');
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Default Section Management
	$wp_customize->get_section( 'header_image' )->panel 	= 'bizes_theme_options';
	$wp_customize->get_section( 'header_image' )->title     = __( 'Banner Settings', 'bizes' );
	$wp_customize->get_section( 'header_image' )->priority 	= 7;

	// Remove Controls
	$wp_customize->remove_control('display_header_text');

	//Theme Options
	require_once get_template_directory() . '/inc/customizer/theme-options/theme-options.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/site-identity.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/options-global.php';
	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	require_once get_template_directory() . '/inc/customizer/theme-options/options-typography.php';
	}
	require_once get_template_directory() . '/inc/customizer/theme-options/options-colors.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/options-header.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/options-misc.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/options-blog.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/options-page.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/options-single.php';
	require_once get_template_directory() . '/inc/customizer/theme-options/options-footer.php';

	// Frontpage Settings
	require_once get_template_directory() . '/inc/customizer/front-page/options-home.php';
	require_once get_template_directory() . '/inc/customizer/front-page/options-slider.php';
	require_once get_template_directory() . '/inc/customizer/front-page/options-services.php';
	require_once get_template_directory() . '/inc/customizer/front-page/options-funfacts.php';
	require_once get_template_directory() . '/inc/customizer/front-page/options-portfolios.php';
	require_once get_template_directory() . '/inc/customizer/front-page/options-feedback.php';
	require_once get_template_directory() . '/inc/customizer/front-page/options-latest-news.php';
	require_once get_template_directory() . '/inc/customizer/front-page/options-cta.php';

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		require_once get_template_directory() . '/inc/customizer/front-page/options-about.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-team.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-pricing.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-brands.php';
	}

	// Contact Page Settings
	require_once get_template_directory() . '/inc/customizer/contact/options-contact.php';

	// WooCommerce Settings
	if(class_exists( 'WooCommerce' ) && bizes_set_to_premium() ) {
	require_once get_template_directory() . '/inc/customizer/woocommerce/options-shop.php';
	require_once get_template_directory() . '/inc/customizer/woocommerce/options-product-single.php';
	}

	// Section Order
	require_once get_template_directory() . '/inc/customizer/sections-order/section-order.php';

	/**
	 * Upgrade
	 */
	require get_template_directory() . '/inc/customizer/upsell/options-upsell.php';

}
add_action( 'customize_register', 'bizes_customize_register' );


/**
 * Selective refresh
 */
require get_template_directory() . '/inc/customizer/customizer-selective-refresh.php';




/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bizes_customize_preview_js() {
	wp_enqueue_script( 'bizes-customizer-liveview', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-liveview.js', array( 'jquery', 'customize-preview'  ), false, true );
}
add_action( 'customize_preview_init', 'bizes_customize_preview_js', 65 );