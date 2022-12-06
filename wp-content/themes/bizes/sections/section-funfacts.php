<?php
	/**
	 * Template part for displaying funfacts Section on front page template
	 *
	 * @package Bizes
	*/
	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':''; 
	$section_enable = get_theme_mod('funfacts_section_enable', 0); 
	$bg_image = get_theme_mod('funfacts_section_bg_image', get_template_directory_uri().'/assets/img/funfacts/1.jpg');
	$parallax = get_theme_mod( 'funfacts_parallax_enable', 0);
	$top_curve     = get_theme_mod('funfacts_top_cruved', 0);
	$botttom_curve = get_theme_mod('funfacts_bottom_cruved', 0);
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

	if(1===$section_enable) :

	?>

	<!-- Start Funfact Area -->
	<div class="section-area funfact-area overlay-bg <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="funfacts-section" style="background: url(<?php echo esc_url($bg_image); ?>) no-repeat scroll center center;" <?php if(1===$parallax) { ?>data-stellar-background-ratio=".3"<?php }?>>
		<?php if( 1=== $top_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" class="curve-1" preserveAspectRatio="none">
		  <path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,267.25-.753,498,61,0,0,227.25,52.247,317,52l1-127L-5-26Z"/>
		</svg>
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<?php for( $i=1; $i<=4; $i++) :
					$icon = get_theme_mod( 'funfact_icon_'.$i, 'icofont-coffee-mug');
					$fun_number = get_theme_mod( 'funfact_number_'.$i,  __('198', 'bizes'));
					$fun_title = get_theme_mod( 'funfact_title_'.$i,  __('Happy Clients', 'bizes'));
				?>
				<div class="col-sm-6 col-md-3">
					<!-- Start single fact -->
					<div class="single-fact text-center <?php echo esc_attr($animation); ?>">

						<?php if(!empty($icon)) : ?>
							<div class="icon">
								<i class="<?php echo esc_html($icon); ?>"></i>
							</div>
						<?php endif; ?>
						<div class="fact-info">

						<?php if(!empty($fun_number)) : ?>
						   <span class="counter"><?php echo esc_html($fun_number); ?></span>
						<?php endif; ?>

						<?php if(!empty($fun_title)) : ?>
						   <span><?php echo esc_html($fun_title); ?></span>
						<?php endif; ?>
						</div>
					</div>
					<!-- Start single fact -->
				</div>
				<?php endfor; ?>

			</div>
		</div>
		<?php if( 1=== $botttom_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" preserveAspectRatio="none" class="curve-2">
			<path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,252.25,4.247,498,61,0,0,227.25,50.247,317,50l1,9L-5,126Z"/>
		</svg>
		<?php endif; ?>
	</div>	
	<!-- End Funfact Area -->
<?php endif; ?>