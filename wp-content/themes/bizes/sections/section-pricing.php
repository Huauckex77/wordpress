<?php 
/**
 * Template part for displaying Pricing Section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':'';
	$section_enable = get_theme_mod('pricing_section_enable', 0);
	$subheading = get_theme_mod('pricing_section_subtitle', __('Priccing Plan', 'bizes'));
	$heading = get_theme_mod('pricing_section_title', __('Choose the best Package ', 'bizes') );
	$description = get_theme_mod('pricing_section_description', __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'bizes'));

	$top_curve     = get_theme_mod('pricing_top_cruved', 0);
	$botttom_curve = get_theme_mod('pricing_bottom_cruved', 0);
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
	<!-- Start Pricing Table Area -->
	<div class="section-area pricing-section <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="pricing-section">

		<?php if( 1=== $top_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" class="curve-1" preserveAspectRatio="none">
		  <path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,267.25-.753,498,61,0,0,227.25,52.247,317,52l1-127L-5-26Z"/>
		</svg>
		<?php endif; ?>

		<div class="container">
			<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
			<div class="row">
				<div class="col-md-12 col-md-offset-2">
					<!-- Start Section Title -->
					<div class="section-title text-center pb-70 <?php echo esc_attr($animation); ?>">
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

		<?php 
		$plan_query = new WP_Query( array( 'post_type' => 'trh_pricing', 'post_status' => 'publish', 'order' =>'ASC', 'posts_per_page' => 3 )); 

		if($plan_query->have_posts()) : ?>
			<div class="row">
			<?php
			while ( $plan_query->have_posts() ) : $plan_query->the_post(); 

				$plan_currency = get_post_meta( get_the_ID(), 'plan_currency', true );
				$plan_price = get_post_meta( get_the_ID(), 'plan_price', true );
				$plan_duration = get_post_meta( get_the_ID(), 'plan_duration', true );
				$plan_active = get_post_meta( get_the_ID(), 'plan_active', true );
				$btn_text = get_post_meta( get_the_ID(), 'plan_btn_text', true );
				$btn_url = get_post_meta( get_the_ID(), 'plan_btn_url', true );
				$btn_target = get_post_meta( get_the_ID(), 'plan_btn_target', true );
				if($btn_target==true){
					$btn_target="target=_blank";
				} else { 
					$btn_target="target=_self";
				}
				?>
				<div class="col-sm-12 col-md-4">
					<div class="single-plan text-center <?php if(true==$plan_active) : ?>active<?php endif; ?>">
						<!-- Start Plan Head -->
						<div class="plan-head">
							<h5 class="uppercase"><?php the_title(); ?></h5>
						</div> 
						<!-- End Plan Head -->
						<!-- Start Plan Body -->
						<div class="plan-body">
							<!-- Start Plan Features -->
							<div class="plan-features">
								<?php the_content(); ?>
							</div>
							<!-- End Plan Features -->
							<!-- Start Plan Price -->
							<div class="plan-price">
								<h3><sup><?php echo esc_html($plan_currency); ?></sup><?php echo esc_html($plan_price); ?><span>/<?php echo esc_html($plan_duration); ?></span></h3>
							</div>
							<!-- End Plan Price -->
							<!-- Start Plane Footer -->
							<div class="plan-footer">
								<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
								<div class="btn-wrap">
									<span class="btn-circle"></span>
									<a href="<?php echo esc_url($btn_url); ?>" class="btn btn-bizes effect-2" <?php echo esc_attr($btn_target); ?>><span><?php echo esc_html($btn_text); ?></span></a>
								</div>
								<?php else : ?>
									<a href="<?php echo esc_url($btn_url); ?>" class="btn btn-bizes effect-1" <?php echo esc_attr($btn_target); ?>><?php echo esc_html($btn_text); ?></a>
								<?php endif; ?>
							</div>
							<!-- End Plane Footer -->
						</div>
						<!-- End Plan Body -->
					</div>
				</div>
				<?php
			endwhile; ?>
			</div>
			<?php
		endif; ?>

		</div>
		<?php if( 1=== $botttom_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" preserveAspectRatio="none" class="curve-2">
			<path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,252.25,4.247,498,61,0,0,227.25,50.247,317,50l1,9L-5,126Z"/>
		</svg>
	<?php endif; ?>
	</div>
	<!-- End Pricing Table Area -->
	<?php
	endif; 
} ?>
