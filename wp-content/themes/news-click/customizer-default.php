<?php
/**
 * Default theme options.
 *
 * @package Newsjack
 */

if (!function_exists('newsjack_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function newsjack_get_default_theme_options() {

    $defaults = array();

    $defaults['select_top_post_category'] = 0;

    return $defaults;

}
endif;