<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bizes
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bizes_body_classes( $classes ) {
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Adds a class footer-curved when footer is curved.
	if(1 === get_theme_mod('footer_top_cruved')) {
		$classes[] = 'footer-curved';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	
	// Add a class if contact page.
	if ( is_page_template( 'page-templates/template-contact.php' ) ) {
		$classes[] = 'template-contact';
	}
	
	return $classes;
}
add_filter( 'body_class', 'bizes_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bizes_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bizes_pingback_header' );


if ( ! function_exists( 'bizes_excerpt_length' ) ) :
	/**
	* Excerpt length
	* Since 1.0.0
	*/
	function bizes_excerpt_length( $length ){
		if ( is_admin() ) {
			return $length;
		}
		$length = get_theme_mod( 'post_excerpt_count', 20 );
		return absint( $length );
	}
endif;
add_filter( 'excerpt_length', 'bizes_excerpt_length', 999);


if ( ! function_exists( 'bizes_auto_excerpt_more' ) ) :

	function bizes_auto_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		$excerpt_dots = get_theme_mod('post_excerpt_dots');
		return '<span class="exprt-dot">' . wp_kses_post( $excerpt_dots ). '</span>';
	}

endif; 
add_filter( 'excerpt_more', 'bizes_auto_excerpt_more' );


if ( ! function_exists( 'bizes_get_posts_pagination' ) ) :
	/**
	 * Pagination
	 * Since 1.0.0
	*/
    function bizes_get_posts_pagination( $query = null ) {

        $classes = [];

        if ( empty( $query ) ) {
            $query = $GLOBALS['wp_query'];
        }

        if ( empty( $query->max_num_pages ) 
                || ! is_numeric( $query->max_num_pages )
                || $query->max_num_pages < 2 ) {
            return;
        }

        $paged = get_query_var( 'paged' );

        if ( ! $paged && is_front_page() && ! is_home() ) {
            $paged = get_query_var( 'page' );
        }

        $paged = $paged ? intval( $paged ) : 1;

        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $html_prev = '<i class="icofont-rounded-double-left"></i>';
        $html_next = '<i class="icofont-rounded-double-right"></i>';
        $links = paginate_links( array(
            'base'      => $pagenum_link,
            'total'     => $query->max_num_pages,
            'current'   => $paged,
            'mid_size'  => 2,
            'add_args'  => array_map( 'urlencode', $query_args ),
            'prev_text' => $html_prev,
            'next_text' => $html_next,
            'type'      => 'array',
        ) );
		$bizes_animation = get_theme_mod( 'bizes_animation_disable', 0 ) ? 'animate-box':'';
        if ( is_array( $links ) ) {
            $r = '<nav class="navigation paging-navigation '.$bizes_animation.'">';
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= str_replace( 'page-numbers', 'page-link', join( "</li>\n\t<li>", $links ) );
            $r .= "</li>\n</ul>\n";
            $r .= "</nav>";

            printf( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
endif;


function bizes_render_posts_pagination() {
	/**
	 * Pagination for archive.
	 * Since 1.0.0
	*/
	$pagination_type = get_theme_mod( 'pagination_type', 'numeric' );
	if ( 'default' === $pagination_type ) :
		the_posts_navigation();
	else :
		bizes_get_posts_pagination();
	endif;

}
add_action( 'bizes_posts_pagination', 'bizes_render_posts_pagination', 10 );


if ( ! function_exists( 'bizes_site_logo' ) ) :
	/**
	 * Site Branding
	 * Since 1.0.0
	*/
	function bizes_site_logo() {

	$logo_option = get_theme_mod( 'site_logo_option' );
	$sticky_logo = get_theme_mod( 'bizes_sticky_logo' );

	if ( 'logo-only' == $logo_option )  { ?>
		<div class="site-logo">
			<?php 
			if( has_custom_logo() ) {  
				the_custom_logo(); 
			} 
			if($sticky_logo){ 
			?>
				<a class="sticky-home-link" href="<?php esc_url(home_url('/')); ?>">
				<img class="sticky-logo" src="<?php echo esc_url($sticky_logo); ?>" alt="<?php echo esc_attr(get_bloginfo("name")); ?>" />
				</a>
			<?php
			}
			?>
		</div>   
	<?php } elseif( 'title-only' == $logo_option  ) { ?>
		<div class="site-logo">
			<?php if( is_home() && is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
			<?php else : ?>
			<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
			<?php endif; ?>
		</div>	
	<?php } else {  ?>	
		<div class="site-logo">
			<?php if( is_home() && is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
			<?php else : ?>
			<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
			<?php endif; ?>
			<p class="site-description"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
		</div>
	<?php }

	}
endif;


if ( ! function_exists( 'bizes_default_menu' ) ) :
	/**
	 * Default fallback menu
	 * Since 1.0.0
	*/
	function bizes_default_menu() {
		?>
			<ul class="menu">
			   <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'bizes' ); ?></a></li>
			   <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ) ; ?>"><?php esc_html_e( 'Add Menu', 'bizes' ); ?></a></li>
			</ul>
		<?php
	}
endif;



if ( ! function_exists( 'bizes_site_nagivation' ) ) :
	/**
	 * Site Navigation
	 * Since 1.0.0
	*/
	function bizes_site_nagivation() {
	?>
		<nav class="bizes-nav">
			<?php
				if(class_exists('Themereps_Helper_Nav_Walker') && bizes_set_to_premium()){
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'container'      => 'ul',
							'menu_class'     => 'menu',
							'fallback_cb'    => 'Themereps_Helper_Nav_Walker::fallback',
							'walker'         => new Themereps_Helper_Nav_Walker()
						)
					);
				} else {
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'container'      => 'ul',
							'menu_class'     => 'menu',
							'fallback_cb'    => 'bizes_default_menu',
						)
					);
				}
			?>
		</nav>
	<?php 
	}
endif;



if ( ! function_exists( 'bizes_sidebar_navigation' ) ) :
	/**
	 * Sidebar Nav
	 * Since 1.0.0
	*/
	function bizes_sidebar_navigation() {
		?>
			<div class="sidenav-wrap">
				<div class="sidenav-content">

					<div class="nav-close">
						<button class="close-menu" id="close-button">
							<span class="icofont icofont-close-line" ></span>
						</button>
					</div>

					<nav class="sidenav">

					<?php if (function_exists('wp_nav_menu')) {
						wp_nav_menu( array(
								'theme_location' => 'sidebar-menu',
								'container'  => 'ul',
								'fallback_cb' => 'bizes_default_menu' 
							) );
						}
						else {
							bizes_default_menu();
						}
					?>
					</nav>
					<?php if(1=== get_theme_mod('header_social_enable', 1)) : ?>
					<div class="menu-social-media">
						<?php echo bizes_get_social_media(); ?>
					</div>
					<?php endif; ?>
					<?php
						$display_phone = get_theme_mod('header_display_phone', 0);
						$display_email = get_theme_mod('header_display_email', 0);
						$phone = get_theme_mod('header_phone', '+123)-456-7890');
						$email = get_theme_mod('header_email', 'help@bizes.com');
						
					if( $display_phone|| $display_email ) : ?>
					<div class="menu-information">
						<ul>
							<?php if(1 === $display_phone && !empty($phone) ) : ?>
							<li><span>T:</span><a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="phone"><?php echo esc_html($phone); ?></a></li>
							<?php endif; ?>

							<?php if( 1 === $display_email && !empty($email) ) : ?>
							<li><span>E:</span> <a href="mailto:<?php echo esc_url($email); ?>" class="email"> <?php echo esc_html($email); ?></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<?php endif; ?>

				</div>
			</div>

		<?php
	}
endif;



if ( ! function_exists( 'bizes_footer_nav' ) ) :
	/**
	 * Footer Navigaion
	  * Since 1.0.0
	*/
	function bizes_footer_nav() {
		if (function_exists('wp_nav_menu')) {
		?>
		<nav class="footer-manu"> 
			<?php
				wp_nav_menu( array( 
					'theme_location' => 'footer-menu',
					'container'  => 'ul',
					'depth'      => 1,
				) );
			?>
		</nav>
		<?php
		}
	}
endif;

if ( ! function_exists( 'bizes_readmore_button' ) ) :
	/**
	 * Read More Button
	  * Since 1.0.0
	*/
	function bizes_readmore_button() {
		?>
			<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
			<div class="btn-wrap">
				<span class="btn-circle"></span>
				<a href="<?php the_permalink(); ?>" class="btn btn-bizes effect-2"><span><?php esc_html_e( 'Read More', 'bizes' ); ?></span></a>
			</div>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>" class="btn btn-bizes effect-1"><?php esc_html_e( 'Read More', 'bizes' ); ?></a>
			<?php endif; ?>

		<?php
	}
endif;




