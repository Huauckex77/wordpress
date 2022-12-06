<?php
if( ! function_exists( 'bizes_banner_image' ) ) :
	/**
	* Banner Image
	 * Since 1.0.0
	*/
function bizes_banner_image(){
	
    $blog_banner    = get_header_image();
    $page_banner    = get_theme_mod( 'page_banner', get_header_image() );
    $archive_banner = get_theme_mod( 'archive_banner', get_header_image() );
    $search_banner  = get_theme_mod( 'search_banner', get_header_image() );
    $banner_404     = get_theme_mod( '404_banner', get_header_image() );

    if ( is_home() ){ 
        $banner_image_url = ( ! empty( $blog_banner ) ) ? $blog_banner : get_header_image();
    }
    elseif( is_page() ){
        $banner_image_url = ( ! empty( $page_banner) ) ? $page_banner : get_header_image();
    }
    elseif( is_singular() ){
        $banner_image_url = get_the_post_thumbnail_url('full' );
        $banner_image_url = ( ! empty( $banner_image_url) ) ? $banner_image_url : get_header_image();
    }
    elseif( is_archive() ){
        $banner_image_url = ( ! empty( $archive_banner) ) ? $archive_banner : get_header_image();
    }
    elseif( is_search() ){ 
        $banner_image_url = ( ! empty( $search_banner) ) ? $search_banner : get_header_image();
    }
    elseif( is_404() ) {
        $banner_image_url = ( ! empty( $banner_404) ) ? $banner_404 : get_header_image();
    }
    return $banner_image_url;
}
endif;


if ( ! function_exists( 'bizes_page_header' ) ) :
/**
 * Page Header
 */
	function bizes_page_header(){
	$banner_url = bizes_banner_image();
	?>

	<!-- Start Page Header -->
	<div class="banner-area" style="background-image: url(<?php echo esc_url( $banner_url ); ?>);">
		<div class="banner-overlay"></div>
		<div class="container"> 
			<div class="row">
				<div class="col-md-12"> 
					<div class="banner-content d-flex align-items-center"> 
						<!-- Start Banner Content -->					
						<?php 
							$blog_title = get_theme_mod( 'blog_page_title', __('Blog', 'bizes') ); 
 
							if ( ( is_front_page() && is_home() ) || is_home() ){ 
							?>
								<h1 class="page-title"><?php echo esc_html( $blog_title ); ?></h1>
							<?php
							}

							if( is_page() ) {
							?>
								<h1 class="page-title"><?php echo wp_kses_post( get_the_title() ); ?></h1>
							<?php
							}    
							if( is_single() ) {
							?>
								<h1 class="page-title"><?php echo esc_html( $blog_title ); ?></h1>
							<?php
							}       

							if( is_archive() ){

								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
							}

							if( is_search() ){ /* translators: Search Results for */ ?>
								<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'bizes' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							<?php }

							if( is_404() ) {
								echo '<h1 class="page-title">' . esc_html__( 'Error 404', 'bizes' ) . '</h1>';
							}
						?>
						<!-- End Banner Content -->							


						<?php
							$breadcrumbs = get_theme_mod( 'breadcrumbs_display', 1); 
							if( 1 === $breadcrumbs ) :
								bizes_breadcrumbs();
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
endif;
add_action('bizes_page_header', 'bizes_page_header');


if ( ! function_exists( 'bizes_woocommerce_header' ) ) :
/**
 * WooCommerce Page Header
 */
	function bizes_woocommerce_header(){
	$banner_url = bizes_banner_image();
	?>

	<!-- Start Page Header -->
	<header class="banner-area" style="background-image: url(<?php echo esc_url( $banner_url ); ?>);">
		<div class="banner-overlay"></div>
		<div class="container"> 
			<div class="row">
				<div class="col-md-12"> 
					<div class="banner-content d-flex align-items-center">
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
						<?php endif; ?>

						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
						?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php 
	}
endif;
add_action('bizes_woocommerce_header', 'bizes_woocommerce_header');


if ( ! function_exists( 'bizes_footer_widgets' ) ) :
	/**
	 * Footer Widgets
	 *
	 * @since 1.0.0
	*/

	function bizes_footer_widgets() {
		$footer_columns = absint( get_theme_mod( 'footer_layout', 4 ) );
		$max_cols = 12;
		$layouts = 12;
		if ( $footer_columns > 1 ) {
			$default = '12';
			switch ( $footer_columns ) {
				case 4:
					$default = '3+3+3+3';
					break;
				case 3:
					$default = '4+4+4';
					break;
					case 2:
					$default = '6+6';
					break;
			}
			$layouts = sanitize_text_field( get_theme_mod( 'footer_custom_' . $footer_columns . '_columns', $default ) );
		}

		$layouts = explode( '+', $layouts );
		foreach ( $layouts as $k => $v ) {
			$v = absint( trim( $v ) );
			$v = $v >= $max_cols ? $max_cols : $v;
			$layouts[ $k ] = $v;
		}

		$have_widgets = false;

		for ( $count = 0; $count < $footer_columns; $count++ ) {
			$id = 'footer-' . ( $count + 1 );
			if ( is_active_sidebar( $id ) ) {
				$have_widgets = true;
			}
		}

		if ( $footer_columns > 0 && $have_widgets ) { ?>
			<div class="footer-widgets">
				<div class="footer-space"></div>
				<div class="container">
					<div class="row">
						<?php
						for ( $count = 0; $count < $footer_columns; $count++ ) {
							$col = isset( $layouts[ $count ] ) ? $layouts[ $count ] : '';
							$id = 'footer-' . ( $count + 1 );
							if ( $col ) {
								?>
								<div id="footer-<?php echo esc_attr( $count + 1 ); ?>" class="col-md-<?php echo esc_attr( $col ); ?> col-sm-12" role="complementary">
									<?php dynamic_sidebar( $id ); ?>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php
	}
endif;
add_action( 'bizes_footer_widgets', 'bizes_footer_widgets', 10 );


if ( ! function_exists( 'bizes_footer_minimalist' ) ) :
	/**
	 * Footer Social Icons
	 *
	 * @since 1.0.0
	*/
	function bizes_footer_minimalist() {
	?>
	<div class="footer-minimal"> 
		<div class="footer-space"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center"> 
					<?php 
					if( 1 === get_theme_mod('footer_social_icon_enable', 1)) {
						echo bizes_get_social_media(); 
					}
					echo bizes_footer_nav(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	
endif;
add_action( 'bizes_footer_minimalist', 'bizes_footer_minimalist', 10 );


if ( ! function_exists( 'bizes_footer_copyright' ) ) :
	/**
	 * Footer Copyright
	 *
	 * @since 1.0.0
	*/
	function bizes_footer_copyright() {
	?>
	<!-- Start Footer Bottom -->
	<div class="copy-right-area"> 
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
					$copyright_text = get_theme_mod( 'footer_copyright_text');
					if ( $copyright_text ): ?>
						<p id="copyright-text"><?php echo esc_html( $copyright_text ); ?></p>
					<?php else: ?>
						<p id="copyright-text"><?php bloginfo(); ?> &copy; <?php echo esc_html( date_i18n( esc_html__( 'Y', 'bizes' ) ) ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'bizes' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Footer Bottom -->
	<?php
	}
	
endif;
add_action( 'bizes_footer_copyright', 'bizes_footer_copyright', 10 );