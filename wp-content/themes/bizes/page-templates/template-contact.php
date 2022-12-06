<?php
/**
 * Template Name: Contact Page
 *
 * @package Bizes
*/
	get_header();
	$animation       = get_theme_mod( 'animation_disable', 0 ) ? 'animate-box':'';
	$info_title   = get_theme_mod( 'contact_info_title', __('Contact Info', 'bizes'));
	$phone_title = get_theme_mod( 'phone_title', __('Call Us', 'bizes'));
	$phone_1     = get_theme_mod( 'phone_1', __('+7(123) 9876 543', 'bizes'));
	$phone_2     = get_theme_mod( 'phone_2', __('+7(123) 9876 543', 'bizes'));
	$mail_title  = get_theme_mod( 'mail_title', __('Email Us', 'bizes'));
	$email_1  = get_theme_mod( 'email_1', 'help@bizes.com');
	$email_2  = get_theme_mod( 'email_2', 'info@bizes.com');
	$address_title = get_theme_mod( 'address_title', __('Location', 'bizes'));
	$address       = get_theme_mod( 'contact_address', __('Warnwe Park Streetperrine, FL 33157 New York City', 'bizes'));
	$form_title = get_theme_mod( 'contact_form_title', __('Get in Touch', 'bizes'));
	$google_map = get_theme_mod( 'contact_google_map_iframe' );
?>
	<!-- Start Page Header -->
	<?php do_action('bizes_page_header'); ?>
	<!-- Start Page Header -->
		
	<!-- Start Contact Area -->
	<div class="contact-area ptb-110">
		<div class="container">

			<div class="row">

				<div class="col-md-4 col-sm-5">
					<h3 class="contact-title <?php echo esc_attr($animation);?>"><?php echo esc_html($info_title); ?></h3>

					<div class="contact-item <?php echo esc_attr($animation);?>">
						<i class="icofont-headphone-alt-2"></i>
						<h6><strong><?php echo esc_html($phone_title); ?> :</strong></h6>
						<p><a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone_1 ) ); ?>"><?php echo esc_html($phone_1); ?></a></p>
						<p><a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone_2 ) ); ?>"><?php echo esc_html($phone_2); ?></a></p>
					</div>

					<div class="contact-item <?php echo esc_attr($animation);?>">
						<i class="icofont-envelope"></i>
						<h6><strong><?php echo esc_html($mail_title); ?> :</strong></h6>
						<p><a href="mailto:<?php echo esc_html($email_1); ?>"><?php echo esc_html($email_1); ?></a></p>
						<p><a href="mailto:<?php echo esc_html($email_2); ?>"><?php echo esc_html($email_2); ?></a></p>
					</div>

					<div class="contact-item <?php echo esc_attr($animation);?>">
						<i class="icofont-map-pins"></i>
						<h6><strong><?php echo esc_html($address_title); ?> :</strong></h6>
						<p><?php 
							echo wp_kses_post(str_replace('|', '<br />', $address));
						?></p>
					</div>
				</div>

				<div class="col-md-8 col-sm-7">

					<?php if ($form_title) : ?>
					<h3 class="contact-title <?php echo esc_attr($animation);?>"><?php echo esc_html($form_title); ?></h3>
					<?php endif; ?>

					<?php 
					$form_shortcode = get_theme_mod( 'contact_form_shortcode' );  
					if($form_shortcode) : ?>
					<div class="contact-us-form <?php echo esc_attr($animation);?>">
						<?php echo do_shortcode( $form_shortcode ); ?>
					</div>
					<?php endif; ?>

				</div>

			</div>
		</div>
	</div>
	<!-- Start Contact Area -->

	<?php if( $google_map ): ?> 
	<div class="google-map-area">
		<div class="fullwide-map"> 
			 <?php echo htmlspecialchars_decode( $google_map ); ?>
		</div>
	</div>
	<?php endif; ?>

	<?php get_footer(); ?>