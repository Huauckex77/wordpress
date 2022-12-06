<?php 
/**
 * Template part for displaying Team Section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':'';

	$section_enable = get_theme_mod('team_section_enable', 0);

	$subheading = get_theme_mod('team_section_subtitle', __('Feedback', 'bizes'));
	$heading = get_theme_mod('team_section_title', __('Our Expert Advisory', 'bizes') );
	$description = get_theme_mod('team_section_description');

	$total_items = get_theme_mod('team_total_count', 3);
	$content_type = get_theme_mod('team_content_type', 'team_page');
	$teams = get_theme_mod('bizes_team');

	$carousel_enable = get_theme_mod('team_carousel_enable', 0);
	$align = get_theme_mod('team_content_align', 'text-center');


	$top_curve     = get_theme_mod('team_top_cruved', 0);
	$botttom_curve = get_theme_mod('team_bottom_cruved', 0);
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
	if(1===$section_enable ) : 
?>
	<!-- Start Team Area -->
	<div class="section-area team-area <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="team-section">

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
	if( $content_type == 'team_page' || $content_type == 'team_post' ) {
		
		if( $content_type == 'team_page' ) :
			for( $i=1; $i<=$total_items; $i++ ) :
				$team_posts[] = get_theme_mod( 'team_page_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'page',
				'posts_per_page'=> absint( $total_items ),
				'post__in'      => $team_posts,
				'orderby'       =>'post__in',
			);
		elseif( $content_type == 'team_post' ) :
			for( $i=1; $i<=$total_items; $i++ ) :
				$team_posts[] = get_theme_mod( 'team_post_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'post',
				'posts_per_page'=> absint( $total_items ),
				'post__in'      => $team_posts,
				'orderby'       =>'post__in',
				'ignore_sticky_posts' => true,
			); 
		endif;

		$post_loop = new WP_Query($args);  
		
		if ( $post_loop->have_posts() ) :
			?>
			<div class="row">

			<?php
				if( 1=== $carousel_enable) echo '<div class="team-carousel owl-controls owl-carousel">';
				$i= 0;
				while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;

				$facebook_url  = get_theme_mod( 'facebook_url_'.$i); 
				$twitter_url  = get_theme_mod( 'twitter_url_'.$i); 
				$linkedin_url  = get_theme_mod( 'linkedin_url_'.$i); 
				$instagram_url  = get_theme_mod( 'instagram_url_'.$i); 

				?>

					<div class="col-md-4">
						<div class="team-wrap <?php echo esc_attr($animation); ?>">

							<!-- Start single team -->
							<div class="singel-team">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'bizes-team'); 
								}  else { 
								?>
									<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/team/member.jpg" alt="<?php the_title(); ?>">
								<?php
								} ?>
								<?php if(!empty($facebook_url) || !empty($twitter_url) || !empty($linkedin_url) || !empty($instagram_url)) : ?>
								<div class="social-links"> 
									<ul class="text-center">

										<?php if(!empty($facebook_url) ) : ?>
										<li><a href="<?php echo esc_url($facebook_url); ?>" target="_blank"><i class="icofont-facebook"></i></a></li>
										<?php endif; ?>

										<?php if(!empty($twitter_url) ) : ?>
										<li><a href="<?php echo esc_url($twitter_url); ?>" target="_blank"><i class="icofont-twitter"></i></a></li>
										<?php endif; ?>

										<?php if(!empty($linkedin_url) ) : ?>
										<li><a href="<?php echo esc_url($linkedin_url); ?>" target="_blank"><i class="icofont-linkedin"></i></a></li>
										<?php endif; ?>

										<?php if(!empty($instagram_url) ) : ?>
										<li><a href="<?php echo esc_url($instagram_url); ?>" target="_blank"><i class="icofont-instagram"></i></a></li>
										<?php endif; ?>

									</ul>
								</div>
								<?php endif; ?>

							</div>
							<!-- End single team -->

							<!-- Start team info -->
							<div class="team-info text-center">
								<h5><?php the_title(); ?></h5>
								<?php echo esc_html(  wp_trim_words( get_the_content(), 10 ) ); ?>
							</div>
							<!-- End team info -->
						</div>
					</div>

				<?php
				endwhile;
					if( 1 === $carousel_enable) echo '</div>';
				?>
			</div>

			<?php
		endif; 
		wp_reset_postdata(); 
	
	} else { 
			if(class_exists('Themereps_Helper') ){ ?>
				<div class="row">
					<?php
						if( 1 === $carousel_enable) echo '<div class="team-carousel owl-controls owl-carousel">';

						foreach( $teams as $team ){
							$image          = ( isset( $team['image'] ) && $team['image'] ) ? $team['image'] : '';
							$name           = ( isset( $team['name'] ) && $team['name'] ) ? $team['name'] : '';
							$position       = ( isset( $team['position'] ) && $team['position'] ) ? $team['position'] : '';
							$facebook_link  = ( isset( $team['facebook_link'] ) && $team['facebook_link'] ) ? $team['facebook_link'] : '';
							$twitter_link   = ( isset( $team['twitter_link'] ) && $team['twitter_link'] ) ? $team['twitter_link'] : '';
							$instagram_link = ( isset( $team['instagram_link'] ) && $team['instagram_link'] ) ? $team['instagram_link'] : '';
							$linkedin_link  = ( isset( $team['linkedin_link'] ) && $team['linkedin_link'] ) ? $team['linkedin_link'] : '';
						?>

						<div class="col-md-4">
							<div class="team-wrap <?php echo esc_attr($animation); ?>">

								<!-- Start single team -->
								<div class="singel-team">

									<?php
									$image = wp_get_attachment_image_src($image, 'bizes-team'); 
									if (!empty($image[0])) { 
										$img_src= $image[0];
									} else { 
										$img_src = '';
									}
									if(!empty($img_src)) : ?>
										<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_html($name); ?>">
									<?php endif; ?>

									<?php
									if(!empty($facebook_link) || !empty($twitter_link) || !empty($instagram_link) || !empty($linkedin_link) || !empty($dribble_link)) : ?>	
									<div class="social-links"> 
										<ul class="text-center">

											<?php if(!empty($facebook_link)) : ?>
											<li><a href="<?php echo esc_url($facebook_link); ?>" target="_blank"><i class="icofont-facebook"></i></a></li>
											<?php endif; ?>
											
											<?php if(!empty($twitter_link)) : ?>
											<li><a href="<?php echo esc_url($twitter_link); ?>" target="_blank"><i class="icofont-twitter"></i></a></li>
											<?php endif; ?>
											
											<?php if(!empty($instagram_link)) : ?>
											<li><a href="<?php echo esc_url($instagram_link); ?>" target="_blank"><i class="icofont-linkedin"></i></a></li>
											<?php endif; ?>
											
											<?php if(!empty($linkedin_link)) : ?>
											<li><a href="<?php echo esc_url($linkedin_link); ?>" target="_blank"><i class="icofont-instagram"></i></a></li>
											<?php endif; ?>

										</ul>
									</div>
									<?php endif; ?>

								</div>
								<!-- End single team -->

								<!-- Start team info -->
								<div class="team-info text-center">

									<?php if(!empty($name)) : ?>
									<h5><?php echo esc_html($name); ?></h5>
									<?php endif; ?>

									<?php if(!empty($position)) : ?>
									<p><?php echo esc_html($position); ?></p>
									<?php endif; ?>

								</div>
								<!-- End team info -->
							</div>
						</div>
					<?php }
					if( 1 === $carousel_enable) echo '</div>'; ?>
				</div>
			<?php
			}
		} ?>
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