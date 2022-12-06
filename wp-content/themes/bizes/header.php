<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bizes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<!-- Start Wrapper -->
		<div class="wrapper">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bizes' ); ?></a>
			<?php 
				$sticky_header = get_theme_mod('site_sticky_header', 0); 
				$header_style = get_theme_mod('header_style', 'style-1'); 
			?>
			<!-- Start Header Area -->
			<header class="header-area <?php if(1 === $sticky_header) {?>primary-header<?php } ?> <?php echo esc_attr($header_style); ?>">

				<?php if( 1 === get_theme_mod('header_top_display', 0) && $header_style == 'style-1' ) : ?>
				<div class="header-top">
					<div class="<?php echo esc_attr( get_theme_mod('header_container_width', 'container') ); ?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12 d-flex align-items-center">
								<?php
									$display_phone = get_theme_mod('header_display_phone', 1);
									$display_email = get_theme_mod('header_display_email', 1);
									$phone = get_theme_mod('header_phone', '+123)-456-7890');
									$email = get_theme_mod('header_email', 'help@bizes.com');
									
								if( $display_phone|| $display_email ) : ?>
							    <div class="top-contacts d-flex align-items-center">
									<?php if(1 === $display_phone && !empty($phone) ) : ?>
							    	<a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="phone"><i class="icofont icofont-headphone-alt-1"></i>  <?php echo esc_html($phone); ?></a>
									<?php endif; ?>
									
									<?php if( 1 === $display_email && !empty($email) ) : ?>
							    	<a href="mailto:<?php echo esc_url($email); ?>" class="email"><i class="icofont icofont-ui-message"></i> <?php echo esc_html($email); ?></a>
									<?php endif; ?>

							    </div>
								<?php endif; ?>
								<?php if(1=== get_theme_mod('header_social_enable', 1)) : ?>
								<div class="top-social ml-auto">
									<?php echo bizes_get_social_media(); ?>
								</div>
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<!-- End header top -->

				<div class="main-header fullwidth-menu">
					<div class="<?php echo esc_attr( get_theme_mod('header_container_width', 'container') ); ?>">
						<div class="row">
							<div class="col-md-12">
								<div class="header-inner d-flex align-items-center">

									<div class="site-branding">
										<?php bizes_site_logo(); ?>
									</div>
									<!-- Start Bizes Nav -->
									<div class="header-right ml-auto d-flex align-items-center">

										<?php bizes_site_nagivation(); ?>

										<?php if( class_exists( 'WooCommerce' ) && get_theme_mod('header_cart_icon_display', 1) ) : ?>
										<div class="header-cart">
										<?php
											bizes_woo_header_cart(); 
										?>
										</div>
										<?php endif; ?>
										<button class="nav-icon" id="open-button"> 
											<span></span>
										</button>
										<!-- Button -->
										<?php 
										$show_btn = get_theme_mod('header_btn_display', 0);
										$btn_text = get_theme_mod('header_btn_text', __('Get a Quote', 'bizes'));
										$btn_link = get_theme_mod('header_btn_link');
										$btn_link_new = get_theme_mod('header_btn_link_open', 0);
										$btn_target="target=_self";
										if($btn_link_new){
											$btn_target="target=_blank";
										}
										if ($show_btn == 1) : ?>
											<div class="header-btn">
												<a href="<?php echo esc_url($btn_link); ?>" class="btn btn-bizes" <?php echo esc_attr($btn_target); ?>>
													<?php echo esc_html($btn_text); ?>
												</a>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->
			<?php bizes_sidebar_navigation(); ?>