<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

 /**
 * After Setup Theme Hooks, Styles and Scripts
 */
require get_stylesheet_directory() . '/includes/custom-functions.php';

 /**
 * Customizer settings
 */
require get_stylesheet_directory() . '/includes/customizer.php';

/**
 *  Extra Functions
 */
require get_stylesheet_directory() . '/includes/extra-functions.php';
