<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$page_layout = get_theme_mod( 'product_single_layout', 'right-sidebar');
if( $page_layout == 'left-sidebar' || $page_layout == 'right-sidebar' ) :
	$content_class = 'col-sm-12 col-md-12 col-lg-9';
	$aside_class = 'col-sm-12 col-md-12 col-lg-3';
else :
	$content_class = 'col-sm-12 col-md-12 col-lg-12';
endif;

get_header( 'shop' ); ?>

<!-- Start Page Header -->
<?php do_action('bizes_woocommerce_header'); ?>
<!-- Start Page Header -->
<div class="site-content ptb-100">	
	<div class="container">
		<div class="row">
			
			<?php if($page_layout == 'left-sidebar') : ?>
			<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
				<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar('woocommerce-single-sidebar'); ?>
				</aside>
			</div>	
			<?php endif; ?>
			
			<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>
			</div>
			
			<?php if($page_layout == 'right-sidebar') : ?>
			<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
				<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar('woocommerce-single-sidebar'); ?>
				</aside>
			</div>	
			<?php endif; ?>
			
		</div>
	</div>
</div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
