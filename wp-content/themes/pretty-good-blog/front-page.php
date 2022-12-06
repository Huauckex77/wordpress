<?php

/**
 * Front Page
 *
 * @package Pretty_Good_Blog
 */

$home_sections =  array('banner', 'blog', 'ad-home', 'editor-pick', 'instagram', 'newsletter');

if ('posts' == get_option('show_on_front')) {
    get_header();
    foreach ($home_sections as $section) {
        get_template_part('section/section-' . esc_attr($section));
    }
    get_footer();
} elseif ('page' == get_option('show_on_front')) {
    include(get_page_template());
}
