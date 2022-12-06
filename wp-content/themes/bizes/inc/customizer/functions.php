<?php
/**
 * Enqueue scripts and styles.
 * Our sample Social Icons are using Font Awesome icons so we need to include the FA CSS when viewing our site
 * The Single Accordion Control is also displaying some FA icons in the Customizer itself, so we need to enqueue FA CSS in the Customizer too
 *
 * @return void
 */
if ( ! function_exists( 'bizes_scripts_styles' ) ) {
	function bizes_scripts_styles() {
		// Register and enqueue our icon font
		// We're using the IcoFont icon font. https://icofont.com/icons
		wp_register_style( 'icofont-style', trailingslashit( get_template_directory_uri() ) . 'assets/css/icofont.min.css' , array(), '1.0.0', 'all' );
		wp_enqueue_style( 'icofont-style' );
	}
}
add_action( 'wp_enqueue_scripts', 'bizes_scripts_styles' );
add_action( 'customize_controls_print_styles', 'bizes_scripts_styles' );


if ( ! function_exists( 'bizes_dropdown_posts' ) ) :
	/**
	 * Post Dropdown.
	 *
	 * @since 1.0.0	 *
	 */
	function bizes_dropdown_posts() {

		$posts = get_posts( array( 'numberposts' => -1 ) );
		$choices = array();
		$choices[0] = esc_html__( '--Select--', 'bizes' );
		foreach ( $posts as $post ) {
			$choices[$post->ID] = $post->post_title;
		}
		return $choices;
	}

endif;


/**
 * Check if WooCommerce is active
 * Use in the active_callback when adding the WooCommerce Section to test if WooCommerce is activated
 *
 * @return boolean
 */
function bizes_is_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	}
	return false;
}


/**
 * Set our Social Icons URLs.
 * Only needed for our sample customizer preview refresh
 *
 * @return array Multidimensional array containing social media data
 */
if ( ! function_exists( 'bizes_generate_social_urls' ) ) {
	function bizes_generate_social_urls() {
		$social_icons = array(
			array( 'url' => 'behance.net', 'icon' => 'icofont-behance', 'title' => esc_html__( 'Follow me on Behance', 'bizes' ), 'class' => 'behance' ),
			array( 'url' => 'deviantart.com', 'icon' => 'icofont-deviantart', 'title' => esc_html__( 'Watch me on DeviantArt', 'bizes' ), 'class' => 'deviantart' ),
			array( 'url' => 'dribbble.com', 'icon' => 'icofont-dribbble', 'title' => esc_html__( 'Follow me on Dribbble', 'bizes' ), 'class' => 'dribbble' ),
			array( 'url' => 'etsy.com', 'icon' => 'icofont-brand-etsy', 'title' => esc_html__( 'favorite me on Etsy', 'bizes' ), 'class' => 'etsy' ),
			array( 'url' => 'facebook.com', 'icon' => 'icofont-facebook', 'title' => esc_html__( 'Like me on Facebook', 'bizes' ), 'class' => 'facebook' ),
			array( 'url' => 'flickr.com', 'icon' => 'icofont-flikr', 'title' => esc_html__( 'Connect with me on Flickr', 'bizes' ), 'class' => 'flickr' ),
			array( 'url' => 'foursquare.com', 'icon' => 'icofont-foursquare', 'title' => esc_html__( 'Follow me on Foursquare', 'bizes' ), 'class' => 'foursquare' ),
			array( 'url' => 'github.com', 'icon' => 'icofont-github', 'title' => esc_html__( 'Fork me on GitHub', 'bizes' ), 'class' => 'github' ),
			array( 'url' => 'instagram.com', 'icon' => 'icofont-instagram', 'title' => esc_html__( 'Follow me on Instagram', 'bizes' ), 'class' => 'instagram' ),
			array( 'url' => 'kickstarter.com', 'icon' => 'icofont-kickstarter-k', 'title' => esc_html__( 'Back me on Kickstarter', 'bizes' ), 'class' => 'kickstarter' ),
			array( 'url' => 'last.fm', 'icon' => 'icofont-brand-lastfm', 'title' => esc_html__( 'Follow me on Last.fm', 'bizes' ), 'class' => 'lastfm' ),
			array( 'url' => 'linkedin.com', 'icon' => 'icofont-linkedin', 'title' => esc_html__( 'Connect with me on LinkedIn', 'bizes' ), 'class' => 'linkedin' ),
			array( 'url' => 'patreon.com', 'icon' => 'icofont-patreon', 'title' => esc_html__( 'Support me on Patreon', 'bizes' ), 'class' => 'patreon' ),
			array( 'url' => 'pinterest.com', 'icon' => 'icofont-pinterest', 'title' => esc_html__( 'Follow me on Pinterest', 'bizes' ), 'class' => 'pinterest' ),
			array( 'url' => 'plus.google.com', 'icon' => 'icofont-google-plus', 'title' => esc_html__( 'Connect with me on Google+', 'bizes' ), 'class' => 'googleplus' ),
			array( 'url' => 'reddit.com', 'icon' => 'icofont-reddit', 'title' => esc_html__( 'Join me on Reddit', 'bizes' ), 'class' => 'reddit' ),
			array( 'url' => 'slack.com', 'icon' => 'icofont-slack', 'title' => esc_html__( 'Join me on Slack', 'bizes' ), 'class' => 'slack.' ),
			array( 'url' => 'slideshare.net', 'icon' => 'icofont-brand-slideshare', 'title' => esc_html__( 'Follow me on SlideShare', 'bizes' ), 'class' => 'slideshare' ),
			array( 'url' => 'snapchat.com', 'icon' => 'icofont-brand-snapchat', 'title' => esc_html__( 'Add me on Snapchat', 'bizes' ), 'class' => 'snapchat' ),
			array( 'url' => 'soundcloud.com', 'icon' => 'icofont-soundcloud', 'title' => esc_html__( 'Follow me on SoundCloud', 'bizes' ), 'class' => 'soundcloud' ),
			array( 'url' => 'spotify.com', 'icon' => 'icofont-spotify', 'title' => esc_html__( 'Follow me on Spotify', 'bizes' ), 'class' => 'spotify' ),
			array( 'url' => 'stackoverflow.com', 'icon' => 'icofont-stack-overflow', 'title' => esc_html__( 'Join me on Stack Overflow', 'bizes' ), 'class' => 'stackoverflow' ),
			array( 'url' => 'tumblr.com', 'icon' => 'icofont-tumblr', 'title' => esc_html__( 'Follow me on Tumblr', 'bizes' ), 'class' => 'tumblr' ),
			array( 'url' => 'twitch.tv', 'icon' => 'icofont-twitch', 'title' => esc_html__( 'Follow me on Twitch', 'bizes' ), 'class' => 'twitch' ),
			array( 'url' => 'twitter.com', 'icon' => 'icofont-twitter', 'title' => esc_html__( 'Follow me on Twitter', 'bizes' ), 'class' => 'twitter' ),
			array( 'url' => 'vimeo.com', 'icon' => 'icofont-vimeo', 'title' => esc_html__( 'Follow me on Vimeo', 'bizes' ), 'class' => 'vimeo' ),
			array( 'url' => 'weibo.com', 'icon' => 'icofont-weibo', 'title' => esc_html__( 'Follow me on weibo', 'bizes' ), 'class' => 'weibo' ),
			array( 'url' => 'youtube.com', 'icon' => 'icofont-youtube', 'title' => esc_html__( 'Subscribe to me on YouTube', 'bizes' ), 'class' => 'youtube' ),
		);

		return apply_filters( 'bizes_social_icons', $social_icons );
	}
}

/**
 * Return an unordered list of linked social media icons, based on the urls provided in the Customizer Sortable Repeater
 * This is a sample function to display some social icons on your site.
 * This sample function is also used to show how you can call a PHP function to refresh the customizer preview.
 * Add the following code to header.php if you want to see the sample social icons displayed in the customizer preview and your theme.
 * Before any social icons display, you'll also need to add the relevent URL's to the Header Navigation > Social Icons section in the Customizer.
 * <div class="social">
 *	 <?php echo bizes_get_social_media(); ?>
 * </div>
 *
 * @return string Unordered list of linked social media icons
 */
if ( ! function_exists( 'bizes_get_social_media' ) ) {
	function bizes_get_social_media() {
	
		$output = array();
		$social_icons = bizes_generate_social_urls();
		$social_urls = explode( ',', get_theme_mod( 'social_urls' ) );
		$social_newtab = get_theme_mod( 'social_newtab' );
		foreach( $social_urls as $key => $value ) {
			if ( !empty( $value ) ) {
				$domain = str_ireplace( 'www.', '', parse_url( $value, PHP_URL_HOST ) );
				$index = array_search( strtolower( $domain ), array_column( $social_icons, 'url' ) );
				if( false !== $index ) {
					$output[] = sprintf( '<a href="%1$s" title="%2$s"%3$s><i class="%4$s"></i></a>',
						esc_url( $value ),
						$social_icons[$index]['title'],
						( !$social_newtab ? '' : ' target="_blank"' ),
						$social_icons[$index]['icon']
					);
				}
				else {
					$output[] = sprintf( '<a href="%1$s"%2$s><i class="%3$s"></i></a>',
						esc_url( $value ),
						( !$social_newtab ? '' : ' target="_blank"' ),
						'icofont-globe-alt'
					);
				}
			}
		}

		if ( !empty( $output ) ) {
			$output = apply_filters( 'bizes_social_icons_list', $output );
			array_unshift( $output, '<div class="social-icons">' );
			$output[] = '</div>';
		}

		return implode( '', $output );
	}
}

/**
* Load all our Customizer options
*/
//include_once trailingslashit( dirname(__FILE__) ) . 'inc/customizer.php';
