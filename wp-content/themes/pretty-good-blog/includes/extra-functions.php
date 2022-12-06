<?php

/**
 * Extra functions to enhance the theme functionality
 */

/**
 * Entry Header
 */
function good_looking_blog_entry_header() {
    if (is_single()) { ?>
        <header class="entry-header">
            <div class="category--wrapper">
                <?php good_looking_blog_category(); ?>
            </div>
            <div class="entry-title-wrapper">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </div>
            <?php good_looking_blog_single_author_meta(); ?>
        </header>
    <?php } elseif( is_home() ) { ?>
        <header class="entry-header">
            <div class="entry-meta">
                <?php good_looking_blog_category(); ?>
            </div><!-- .entry-meta -->
            <div class="entry-details">
                <?php
                the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                if (has_excerpt()) {
                    the_excerpt('<p>', '</p>');
                } else {
                ?><p> <?php echo wp_trim_words(get_the_content(), 25, ''); ?></p>
                <?php } ?>
            </div>
        </header><!-- .entry-header -->
    <?php } else { ?>
        <header class="entry-header">
			<div class="entry-meta">
				<?php good_looking_blog_category(); ?>
			</div><!-- .entry-meta -->
			<div class="entry-details">
				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );	?>
			</div>
		</header><!-- .entry-header -->
    <?php
    }
}

/**
 * Get font face styles.
 *
 * @since 1.0.0
 *
 * @return string
 */
function pretty_good_blog_get_font_face_styles() {

	return "
		@font-face{
			font-family: 'DM Sans';
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'fonts/DMSans-Regular.ttf' ) . "');
		}

		@font-face{
			font-family: 'DM Sans';
			font-weight: 500;
			font-style: medium;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'fonts/DMSans-Medium.ttf' ) . "');
		}

		@font-face{
			font-family: 'DM Sans';
			font-weight: 700;
			font-style: bold;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'fonts/DMSans-Bold.ttf' ) . "');
		}
		";

}

/**
 * Information links.
*/

function good_looking_blog_customizer_theme_info( $wp_customize ) {

    $wp_customize->add_section( 'theme_info',
        array(
            'title'    => esc_html__( 'Information Links' , 'pretty-good-blog' ),
            'priority' => 6,
		)
    );

	/** Important Links */
	$wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $theme_info = '<ul>';
    $theme_info .= sprintf( __( '<li>View documentation: %1$sClick here.%2$s</li>', 'pretty-good-blog' ),  '<a href="' . esc_url( 'https://glthemes.com/documentation/pretty-good-blog/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Theme info: %1$sClick here.%2$s</li>', 'pretty-good-blog' ),  '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/pretty-good-blog/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Support ticket: %1$sClick here.%2$s</li>', 'pretty-good-blog' ),  '<a href="' . esc_url( 'https://glthemes.com/support/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>More WordPress Themes: %1$sClick here.%2$s</li>', 'pretty-good-blog' ),  '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</ul>';

	$wp_customize->add_control( new Good_Looking_Blog_Note_Control( $wp_customize,
        'theme_info_theme',
            array(
                'label'       => esc_html__( 'Important Links' , 'pretty-good-blog' ),
                'section'     => 'theme_info',
                'description' => $theme_info
    		)
        )
    );

}