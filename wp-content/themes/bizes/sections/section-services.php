<?php 
/**
 * Template part for displaying review Section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':'';

	$section_enable = get_theme_mod('services_section_enable', 0);

	$heading = get_theme_mod('services_section_title', __('We Provide World Class <b>Top Services</b>', 'bizes') );
	$subheading = get_theme_mod('services_section_subtitle', __('Our Services', 'bizes'));
	$description = get_theme_mod('services_section_description');

	$item_count = get_theme_mod('services_total_items_show', 3);
	$content_type = get_theme_mod('services_content_type', 'services_page');
	$services = get_theme_mod('featured_services');
	$services_style = get_theme_mod('services_style', 'style-one');
	$service_align = get_theme_mod('services_content_align', 'text-center');

	$top_curve = get_theme_mod('service_top_cruved', 0);
	$bottom_curve = get_theme_mod('service_bottom_cruved', 0);
	$classes = array();
	if ( 1=== $top_curve ) {
		$classes[] = 'top-curved';
	} else {
		$classes[] = 'top-no-curved';
	}
	if ( 1=== $bottom_curve ) {
		$classes[] = 'bottom-curved';
	} else {
		$classes[] = 'bottom-no-curved';
	}

	if(1===$section_enable) :
?>
<!-- Start Experiences Area -->
<div class="section-area service-area <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="services-section">
	<?php if(1===$top_curve) : ?>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" class="curve-1" preserveAspectRatio="none">
	  <path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,267.25-.753,498,61,0,0,227.25,52.247,317,52l1-127L-5-26Z"/>
	</svg>
	<?php endif; ?>
	<div class="container">
		<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
		<div class="row"> 
			<div class="col-md-12">
				<!-- Start Section Heading -->
				<div class="section-title text-center <?php echo esc_attr($animation); ?> pb-70">

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
				<!-- End Section Heading -->
			</div>
		</div>
		<?php endif; ?>
		<?php
		if($content_type == 'services_page' || $content_type == 'services_post') {
			if( $content_type == 'services_page' ) :
				for( $i=1; $i<=$item_count; $i++ ) :
					$service_posts[] = get_theme_mod( 'featured_service_page_'.$i );
				endfor;  
				$args = array (
					'post_type'     => 'page',
					'posts_per_page' => absint( $item_count ),
					'post__in'      => $service_posts,
					'orderby'       =>'post__in',
				);
			elseif( $content_type == 'services_post' ) :
				for( $i=1; $i<=$item_count; $i++ ) :
					$service_posts[] = get_theme_mod( 'featured_service_post_'.$i );
				endfor;
				$args = array (
					'post_type'     => 'post',
					'posts_per_page' => absint( $item_count ),
					'post__in'      => $service_posts,
					'orderby'       =>'post__in',
					'ignore_sticky_posts' => true,
				);
			else :
			    $args = array ();
			endif;

			$post_loop = new WP_Query($args);                        
		if ( $post_loop->have_posts() ) :
			?>
		<div class="row">
			<?php
			$i= 0;
			while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;
				$icon = get_theme_mod( 'service_icon_'.$i, 'icofont-vector-path' ); 
			?>
			<div class="col-sm-6 col-md-6 col-lg-4">
				<?php if($services_style == 'style-one' || $services_style == 'style-2') : ?>
				<div class="service-item <?php echo esc_attr($service_align); ?> <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">

					<?php if(!empty($icon)) : ?>
						<i class="<?php echo esc_html($icon); ?>"></i>
					<?php endif; ?>
					
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<p><?php
					if ( ! has_excerpt() ) {
						echo esc_html( wp_trim_words( get_the_content(), 15 ) );
					} else { 
						the_excerpt();
					} 
					?></p>

					<a class="btn-more" href="<?php the_permalink(); ?>"><i class="icofont-swoosh-right"></i></a>
				</div>
				<?php else : ?>
					<div class="single-todo <?php echo esc_attr($animation); ?>">
						<h5><?php if(!empty($icon)) : ?>
						<i class="<?php echo esc_html($icon); ?>"></i>
					<?php endif; ?> <?php the_title(); ?></h5>
						<p><?php
						if ( ! has_excerpt() ) {
							echo esc_html( wp_trim_words( get_the_content(), 15 ) );
						} else { 
							the_excerpt();
						} 
						?></p>
					</div>
				<?php endif; ?>

			</div>
			<?php
			endwhile; ?>
		</div>
		<?php
		endif; 
		wp_reset_postdata(); ?>
		<?php
		} else { ?>
			<div class="row"> 
				<?php
				foreach( $services as $service ){

					$icon         = ( isset( $service['icon'] ) && $service['icon'] ) ? $service['icon'] : '';
					$service_title        = ( isset( $service['title'] ) && $service['title'] ) ? $service['title'] : '';
					$service_desc  = ( isset( $service['description'] ) && $service['description'] ) ? $service['description'] : '';
					$btn_text     = ( isset( $service['btn_text'] ) && $service['btn_text'] ) ? $service['btn_text'] : '';
					$btn_url      = ( isset( $service['link'] ) && $service['link'] ) ? $service['link'] : '';
					$btn_trgt   = ( isset( $service['checkbox'] ) && $service['checkbox']) ? '_blank' : '_self';
					?>


				<div class="col-sm-12 col-md-6 col-lg-4"> 
				<?php if($services_style == 'style-one' || $services_style == 'style-2') : ?>
					<div class="service-item <?php echo esc_attr($service_align); ?> <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">
						<?php if(!empty($icon)) : ?>
							<i class="<?php echo esc_html($icon); ?>"></i>
						<?php endif; ?>

						<?php if(!empty($service_title) ) : ?>
							<?php if(!empty($btn_url)) { ?>
								<h5><a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>"><?php echo esc_html($service_title); ?></a></h5>
							<?php } else { ?>
								<h5><?php echo esc_html($service_title); ?></h5>
							<?php } ?>
						<?php endif; ?>

						<?php if(!empty($service_desc) ) : ?>
							<p><?php echo esc_html($service_desc); ?></p>
						<?php endif; ?>

						<?php if(!empty($btn_url)) : ?>
						<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>" class="btn-more"><?php echo esc_html($btn_text); ?></a>
						<?php endif; ?>

					</div>
					<?php else : ?>

					<div class="single-todo <?php echo esc_attr($animation); ?>">

						<?php if(!empty($service_title) ) : ?>
							<?php if(!empty($btn_url)) { ?>
								<h5><?php if(!empty($icon)) : ?>
							<i class="<?php echo esc_html($icon); ?>"></i>
						<?php endif; ?> <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>"><?php echo esc_html($service_title); ?></a></h5>
							<?php } else { ?>
								<h5><?php if(!empty($icon)) : ?>
							<i class="<?php echo esc_html($icon); ?>"></i>
						<?php endif; ?><?php echo esc_html($service_title); ?></h5>
							<?php } ?>
						<?php endif; ?>

						<?php if(!empty($service_desc) ) : ?>
							<p><?php echo esc_html($service_desc); ?></p>
						<?php endif; ?>

						<?php if(!empty($btn_url)) : ?>
						<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>" class="btn-more"><?php echo esc_html($btn_text); ?></a>
						<?php endif; ?>
					</div>

					<?php endif; ?>
				</div>
				<?php } ?>
			</div>
			<?php
		} ?>
	</div>
	<?php if(1===$bottom_curve) : ?>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" preserveAspectRatio="none" class="curve-2">
		<path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,252.25,4.247,498,61,0,0,227.25,50.247,317,50l1,9L-5,126Z"/>
	</svg>
	<?php endif; ?>
</div>
<?php endif; ?>











