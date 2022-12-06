<?php 
/**
 * Template part for displaying Brands Logo Section on front page template
 *
 * @package Bizindustries
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ===1 ? 'animate-box':'';
	$section_enable = get_theme_mod('brands_section_enable', 0);
	$heading = get_theme_mod('brands_section_title');
	$subheading = get_theme_mod('brands_section_subtitle');
	$description = get_theme_mod('brands_section_description');
	$brands = get_theme_mod('bizes_brands');

	$top_curve     = get_theme_mod('brands_top_cruved', 0);
	$botttom_curve = get_theme_mod('brands_bottom_cruved', 0);
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
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	if(1===$section_enable) : 

	?>
	<div class="section-area brands-area <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="brands-section">

		<?php if( 1=== $top_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" class="curve-1" preserveAspectRatio="none">
		  <path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,267.25-.753,498,61,0,0,227.25,52.247,317,52l1-127L-5-26Z"/>
		</svg>
		<?php endif; ?>

		<div class="container">
			
			<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
			<div class="row">
				<div class="col-md-12">
					<!-- Start Section Title -->
					<div class="section-title text-center pb-70  <?php echo esc_attr($animation);?>">
						<?php if(!empty($subheading)) : ?>
						<h6 class="sub-title"><?php echo esc_html($subheading); ?></h6>
						<?php endif; ?>
						
						<?php if(!empty($heading)) : ?>
						<h2><?php echo wp_kses_post($heading); ?></h2>
						<?php endif; ?>

						<?php if(!empty($description)) : ?>
						<p><?php echo esc_html($description); ?></p>
						<?php endif; ?>
					</div>
					<!-- Start Section Title -->
				</div>
			</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-12">
					<?php
					if($brands) :
					?>
					<div class="brands-wrap">
						<div class="brands-carousel owl-controls owl-carousel">
						<?php
							foreach( $brands as $brand ){
									$image        = ( isset( $brand['image'] ) && $brand['image'] ) ? $brand['image'] : '';
									$btitle        = ( isset( $brand['title'] ) && $brand['title'] ) ? $brand['title'] : '';
									$btn_url      = ( isset( $brand['link'] ) && $brand['link'] ) ? $brand['link'] : '';
									$btn_target   = ( isset( $brand['checkbox'] ) && $brand['checkbox']) ? '_blank' : '_self';
								?>

									<div class="single-brand">
										<?php
										$image = wp_get_attachment_image_src($image, 'bizes-brand'); 
										if (!empty($image[0])) { 
											$img_src= $image[0];
										} else { 
											$img_src = '';
										}
										
										if(!empty($btn_url)) : ?>
											<a href="<?php echo esc_url($btn_url); ?>"  target="<?php echo esc_attr( $btn_target ); ?>" title="<?php echo esc_attr( $btitle ); ?>">
												<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr( $btitle ); ?>" />
											</a>
										<?php else : ?>
											<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr( $btitle ); ?>" />
										<?php endif; ?>

									</div>

								<?php
							}
						?>
						</div>
					</div>
					<?php
					endif; ?>
				</div>
			</div>
		</div>
		<?php if( 1=== $botttom_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" preserveAspectRatio="none" class="curve-2">
			<path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,252.25,4.247,498,61,0,0,227.25,50.247,317,50l1,9L-5,126Z"/>
		</svg>
		<?php endif; ?>
	</div>
	<?php
	endif; 
} ?>
