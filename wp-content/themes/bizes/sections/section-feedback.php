<?php 
/**
 * Template part for displaying review Section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':'';
	$section_enable = get_theme_mod('feedback_section_enable', 0);
	$subheading = get_theme_mod('feedback_section_subtitle', __('Feedback', 'bizes'));
	$heading = get_theme_mod('feedback_section_title', __('What clients are <b>saying about</b> us', 'bizes') );
	$description = get_theme_mod('feedback_section_description');
	$total_items = get_theme_mod('feedback_total_count', 3);
	$content_type = get_theme_mod('feedback_content_type', 'feedback_page');
	$reviewers = get_theme_mod('featured_reviewers');
	$carousel_enable = get_theme_mod('feedback_carousel_enable', 0);
	$align = get_theme_mod('feedback_text_align', 'text-center');
	$bg_image = get_theme_mod('feedback_section_bg_image', get_template_directory_uri().'/assets/img/client/1.jpg');
	$parallax = get_theme_mod( 'feedback_parallax_enable', 0);
	$top_curve     = get_theme_mod('feedback_top_cruved', 0);
	$botttom_curve = get_theme_mod('feedback_bottom_cruved', 0);
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

			<!-- Start Client Area -->
			<div class="section-area feedback-area overlay-bg <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="feedback-section" style="background: url(<?php echo esc_url($bg_image); ?>) no-repeat scroll center center /cover;" <?php if(1===$parallax) { ?>data-stellar-background-ratio=".3"<?php }?>>
				<?php if( 1=== $top_curve) : ?>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" class="curve-1" preserveAspectRatio="none">
				  <path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,267.25-.753,498,61,0,0,227.25,52.247,317,52l1-127L-5-26Z"/>
				</svg>
				<?php endif; ?>
				<div class="container">

					<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
					<div class="row">
						<div class="col-md-12">
							<!-- Start Section Title -->
							<div class="section-title white-text text-center pb-70 <?php echo esc_attr($animation); ?>">
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
	if( $content_type == 'feedback_page' || $content_type == 'feedback_post' ) {
		
		if( $content_type == 'feedback_page' ) :
			for( $i=1; $i<=$total_items; $i++ ) :
				$reviews_posts[] = get_theme_mod( 'feedback_page_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'page',
				'posts_per_page'=> absint( $total_items ),
				'post__in'      => $reviews_posts,
				'orderby'       =>'post__in',
			);
		elseif( $content_type == 'feedback_post' ) :
			for( $i=1; $i<=$total_items; $i++ ) :
				$reviews_posts[] = get_theme_mod( 'feedback_post_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'post',
				'posts_per_page'=> absint( $total_items ),
				'post__in'      => $reviews_posts,
				'orderby'       =>'post__in',
				'ignore_sticky_posts' => true,
			); 
		endif;

		$post_loop = new WP_Query($args);  
		
		if ( $post_loop->have_posts() ) :
			?>
				<div class="row">

				<?php
					if( 1=== $carousel_enable) echo '<div class="review-carousel style-2 owl-controls owl-carousel">';
					$i= 0;
					while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;

					$designation  = get_theme_mod( 'reviewer_position_'.$i, __('Web Designer', 'bizes')); 

					?>

					<div class="col-md-4 <?php echo esc_attr($animation); ?>">
						<div class="single-testimonial <?php echo esc_attr($align); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'thumbnail'); ?>
							<?php endif; ?>
							<!-- Start client bio -->
							<div class="space-25"></div>
							<div class="client-bio">
								<h6><?php the_title(); ?></h6>
								<?php if(!empty($designation)) : ?>
								<p><?php echo esc_html($designation); ?></p>
								<?php endif; ?>
							</div>
							<!-- End client bio -->
							<!-- Start client details -->
							<div class="client-details">
								<?php the_content(); ?>
							</div>
							<!-- End client details -->
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
							if( 1 === $carousel_enable) echo '<div class="review-carousel owl-controls style-2 owl-carousel">';

							foreach( $reviewers as $reviewer ){

								$image      = ( isset( $reviewer['image'] ) && $reviewer['image'] ) ? $reviewer['image'] : '';
								$name       = ( isset( $reviewer['name'] ) && $reviewer['name'] ) ? $reviewer['name'] : '';
								$quotation  = ( isset( $reviewer['quote'] ) && $reviewer['quote'] ) ? $reviewer['quote'] : '';
								$position   = ( isset( $reviewer['position'] ) && $reviewer['position'] ) ? $reviewer['position'] : '';
							?>

							<div class="col-md-4 <?php echo esc_attr($animation); ?>">
								<div class="single-testimonial <?php echo esc_attr($align); ?>">
									<?php
									if( $image) echo  wp_get_attachment_image( $image );
									?>
									<div class="space-25"></div>
									<div class="client-bio">

										<h6><?php echo esc_html($name); ?></h6>

										<?php if(!empty($position)) : ?>
										<p><?php echo esc_html($position); ?></p>
										<?php endif; ?>

									</div>

									<?php if(!empty($quotation)): ?>
									<div class="client-details">
										<p><?php echo esc_html($quotation); ?></p>
									</div>
									<?php endif; ?>

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
			<!-- End Client Area -->

<?php endif; ?>