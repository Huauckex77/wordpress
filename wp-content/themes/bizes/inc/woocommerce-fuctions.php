<?php
function bizes_woocommerce_setup() {
	// WooCommerce Support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	// Remove woocommerce breadcrumb
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

	$single_related = get_theme_mod( 'product_single_related_enable', 1 );
	if ( !$single_related ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}

}
add_action( 'after_setup_theme', 'bizes_woocommerce_setup' );


function bizes_woocommerce_scripts() {

	wp_enqueue_style( 'bizes-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );

}
add_action( 'wp_enqueue_scripts', 'bizes_woocommerce_scripts', 10);


/**
* Cart Fragments
*/
if ( ! function_exists( 'bizes_woocommerce_cart_link_fragment' ) ) :

	function bizes_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		bizes_woo_header_cart();
		$fragments['a.woo-cart'] = ob_get_clean();

		return $fragments;
	}
endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'bizes_woocommerce_cart_link_fragment' );



if ( ! function_exists( 'bizes_woo_header_cart' ) ) :

	function bizes_woo_header_cart(){
		$cart_page      = get_option( 'woocommerce_cart_page_id' );
		$bizin_cart_icon_title = apply_filters( 'bizin_cart_icon_title', esc_html__( 'View your shopping cart', 'bizes' ) );
		$count          = WC()->cart->cart_contents_count;
		$cart_icon_dis = get_theme_mod( 'header_cart_icon_display', true );
		if( $cart_icon_dis && $cart_page ){ 
		?>
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="woo-cart" title="<?php echo esc_attr( $bizin_cart_icon_title ); ?>">
			<i class="icofont-cart"></i>
			<span class="count">
				<?php echo absint( $count ); ?>
			</span>
		</a>
		<?php 
		}
	}
endif;


/**
 * Change number or products per row to 3
 */
if (!function_exists('bizes_loop_columns')) :
	
	function bizes_loop_columns() {
		return 3; // 3 products per row
	}
	
endif;
add_filter('loop_shop_columns', 'bizes_loop_columns', 999);


if (!function_exists('bizes_related_products_args')) :
	function bizes_related_products_args( $args ) {
	
		$args['posts_per_page'] = get_theme_mod('related_products_per_row', 3); 
		$args['columns'] = get_theme_mod('related_products_per_row', 3);
		return $args;
	}
endif;
add_filter( 'woocommerce_output_related_products_args', 'bizes_related_products_args', 20 );

