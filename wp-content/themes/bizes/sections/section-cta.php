<?php
	/**
	 * Template part for displaying CTA Section on front page template
	 *
	 * @package Bizes
	*/

	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':''; 
	$section_enable = get_theme_mod('cta_section_enable', 0); 

	$heading = get_theme_mod('cta_title', __('Let’s create something together?', 'bizes')); 
	$sub_heading = get_theme_mod('cta_subtitle', __('Need a successful project?', 'bizes')); 
	$description = get_theme_mod('cta_description');
	$cta_style = get_theme_mod('cta_style', 'style-1');
	$text_align = get_theme_mod('cta_content_align', 'text-center');

	$bg_image = get_theme_mod('cta_section_bg_image', get_template_directory_uri().'/assets/img/cta/1.jpg');
	$parallax = get_theme_mod( 'cta_parallax_enable', 0);
	$btn_type = get_theme_mod('cta_btn_type', 'btn-text');
	$btn_text = get_theme_mod('cta_btn_text', __('Contact Us', 'bizes'));
	$btn_url = get_theme_mod('cta_btn_url');
	$btn_target = get_theme_mod('cta_btn_target')?'target="_blank"':'';
	$video_url = get_theme_mod('cta_video_url');
	
	$top_curve     = get_theme_mod('cta_top_cruved', 0);
	$botttom_curve = get_theme_mod('cta_bottom_cruved', 0);
	$classes = array();
	if ( 1=== $top_curve ) {
		$classes[] = 'top-curved';
	} else {
		$classes[] = 'top-no-curved';
	}
	if ( 1=== $botttom_curve ) {
		$classes[] = 'bottom-curved';
	} else {
		$classes[] = 'bottom-no-curved';
	}

 if(1===$section_enable) : ?>

	<div class="section-area cta-area <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="cta-section" style="background: url(<?php echo esc_url($bg_image); ?>) no-repeat scroll center center /cover;" <?php if(1===$parallax) { ?>data-stellar-background-ratio=".3"<?php }?>>

		<?php if( 1 === $top_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" class="curve-1" preserveAspectRatio="none">
		  <path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,267.25-.753,498,61,0,0,227.25,52.247,317,52l1-127L-5-26Z"/>
		</svg>
		<?php endif; ?>

		<div class="container">
			<div class="row">
				<?php if($cta_style == 'style-1') : ?>
					<div class="col-md-6"> 
						<div class="cta-inner <?php echo esc_attr($animation); ?>">

							<?php if(!empty($sub_heading)) : ?>
							<h6><?php echo esc_html($sub_heading); ?></h6>
							<?php endif; ?>

							<?php if(!empty($heading)) : ?>
							<h2><?php echo wp_kses_post($heading); ?></h2>
							<?php endif; ?>

							<?php if(!empty($description)) : ?>
							<p><?php echo esc_html($description); ?></p>
							<?php endif; ?>

						</div>
					</div>

					<div class="col-md-6 cta-btn-wrap d-flex align-items-center justify-content-center <?php echo esc_attr($animation); ?>">

						<?php if($btn_type== 'btn-text') : ?>

							<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
							<div class="btn-wrap">
								<span class="btn-circle"></span>
								<a href="<?php echo esc_url($btn_url); ?>" class="btn btn-bizes effect-2" <?php echo esc_attr($btn_target); ?>><span><?php echo esc_html($btn_text); ?></span></a>
							</div>
							<?php else : ?>
								<a href="<?php echo esc_url($btn_url); ?>" <?php echo esc_attr($btn_target); ?> class="btn btn-bizes effect-1"><?php echo esc_html($btn_text); ?></a>
							<?php endif; ?>
						
						<?php else : ?>
						<a href="<?php echo esc_url($video_url); ?>" class="play-btn venobox" data-vbtype="video"><i class="icofont icofont-play"></i></a>
						<?php endif; ?>
					</div>


				<?php else : ?>

					<div class="mx-auto col-md-8"> 
						<div class="cta-inner style-2 <?php echo esc_attr($text_align); ?> <?php echo esc_attr($animation); ?>">
							<?php if(!empty($sub_heading)) : ?>
							<h6><?php echo esc_html($sub_heading); ?></h6>
							<?php endif; ?>

							<?php if(!empty($heading)) : ?>
							<h2><?php echo wp_kses_post($heading); ?></h2>
							<?php endif; ?>

							<?php if(!empty($description)) : ?>
							<p><?php echo esc_html($description); ?></p>
							<?php endif; ?>

							<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
							<div class="btn-wrap">
								<span class="btn-circle"></span>
								<a href="<?php echo esc_url($btn_url); ?>" class="btn btn-bizes effect-2" <?php echo esc_attr($btn_target); ?>><span><?php echo esc_html($btn_text); ?></span></a>
							</div>
							<?php else : ?>
								<a href="<?php echo esc_url($btn_url); ?>" <?php echo esc_attr($btn_target); ?> class="btn btn-bizes effect-1"><?php echo esc_html($btn_text); ?></a>
							<?php endif; ?>

						</div>
					</div>

				<?php endif; ?>
			</div>
		</div>
		<?php if( 1=== $botttom_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" preserveAspectRatio="none" class="curve-2">
			<path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,252.25,4.247,498,61,0,0,227.25,50.247,317,50l1,9L-5,126Z"/>
		</svg>
		<?php endif; ?>
	</div>

<?php endif; ?>