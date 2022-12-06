<?php 
/**
 * Template part for displaying About Section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ===1 ? 'animate-box':'';

	$section_enable = get_theme_mod('about_section_enable', 0);

	$subheading = get_theme_mod('about_section_subtitle', __('About Us', 'bizes'));
	$heading = get_theme_mod('about_section_title', __('<b>25+ years</b> of Experiences for Give You Better Result', 'bizes') );
	$description = get_theme_mod('about_section_description', __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient.', 'bizes'));
	$phone = get_theme_mod('about_section_phone', __('+123 45678 90', 'bizes'));

	$image = get_theme_mod('about_section_image', get_template_directory_uri().'/assets/img/about/about.png');
	$exp_year = get_theme_mod('about_exp_year', __('30', 'bizes'));
	$exp_text = get_theme_mod('about_exp_text', __('Years of Experiences', 'bizes'));

	$counter_1_num = get_theme_mod('about_counter_1_num', __('76', 'bizes'));
	$counter_1_suff = get_theme_mod('about_counter_1_suff', __('K', 'bizes'));
	$counter_1_title = get_theme_mod('about_counter_1_title', __('Expert Consultants', 'bizes'));

	$counter_2_num = get_theme_mod('about_counter_2_num', __('12', 'bizes'));
	$counter_2_suff = get_theme_mod('about_counter_2_suff', __('K', 'bizes'));
	$counter_2_title = get_theme_mod('about_counter_2_title', __('We have clients in', 'bizes'));


	if(1===$section_enable) : 
?>

	<!-- Start About Area -->
	<div class="section-area about-section" id="about-section">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<!-- Start video -->
					<div class="expc-box"> 

						<img src="<?php echo esc_url($image); ?>" alt="About Image">

						<?php if(!empty($exp_year) || !empty($exp_text)) : ?>
						<div class="expc-text <?php echo esc_attr($animation); ?>">
							<?php if(!empty($exp_year) ) : ?>
								<h3><?php echo esc_html($exp_year); ?></h3>
							<?php endif; ?>
							<?php if(!empty($exp_text)) : ?>
								<p><?php echo esc_html($exp_text); ?></p>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
					<!-- End video -->
				</div>

				<div class="col-md-6">
					<div class="about-content <?php echo esc_attr($animation); ?>">

						<?php if(!empty($subheading)) : ?>
						<h6><?php echo esc_html($subheading); ?></h6>
						<?php endif; ?>

						<?php if(!empty($heading)) : ?>
						<h2><?php echo wp_kses_post($heading); ?></h2>
						<?php endif; ?>

						<?php if(!empty($description)) : ?>
						<p><?php echo esc_html($description); ?></p>
						<?php endif; ?>

						<div class="row">

							<div class="col-md-6"> 
								<div class="fact">
									<?php if(!empty($counter_1_num)) : ?>
										<div class="numb"><span class="counter"><?php echo esc_html($counter_1_num); ?></span><?php echo esc_html($counter_1_suff); ?></div>
									<?php endif; ?>
									<?php if(!empty($counter_1_title)) : ?>
									<p><?php echo esc_html($counter_1_title); ?></p>
									<?php endif; ?>
								</div>
							</div>

							<div class="col-md-6"> 
								<div class="fact">

									<?php if(!empty($counter_2_num)) : ?>
										<div class="numb"><span class="counter"><?php echo esc_html($counter_2_num); ?></span><?php echo esc_html($counter_2_suff); ?></div>
									<?php endif; ?>

									<?php if(!empty($counter_2_title)) : ?>
									<p><?php echo esc_html($counter_2_title); ?></p>
									<?php endif; ?>

								</div>
							</div>
						</div>

						<?php if(!empty($phone)) : ?>
						<a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="btn-call"><span><?php echo esc_html_e('Call Us:', 'bizes'); ?></span><?php echo esc_html($phone); ?></a>
						<?php endif; ?>

					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End About Area -->

<?php endif; ?>