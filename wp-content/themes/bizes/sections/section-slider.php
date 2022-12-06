<?php
/**
 * Template part for displaying Slider Section on home page template
 *
 * @package Bizes
 */

$slider_enable         = get_theme_mod('slider_section_enable', 0); 
$slide_item_count      = get_theme_mod('slides_total_items', 2);
$slides_content_type   = get_theme_mod('slides_content_type', 'slides_page');
$text_alignment = get_theme_mod('slider_text_alignment', 'text-left');
$bottom_curve = get_theme_mod('slider_bottom_cruved', 0);

if(1===$slider_enable) : 
?>
<div class="slider-area" id="hero-slider">
<?php
if( $slides_content_type == 'slides_page' || $slides_content_type == 'slides_post' ) {
		
	if( $slides_content_type == 'slides_page' ) :
		for( $i=1; $i<=$slide_item_count; $i++ ) :
			$slide_posts[] = get_theme_mod( 'slide_page_'.$i );
		endfor;
		$args = array (
			'post_type'     => 'page',
			'posts_per_page'=> absint( $slide_item_count ),
			'post__in'      => $slide_posts,
			'orderby'       =>'post__in',
		);
	elseif( $slides_content_type == 'slides_post' ) :
		for( $i=1; $i<=$slide_item_count; $i++ ) :
			$slide_posts[] = get_theme_mod( 'slide_post_'.$i );
		endfor;
		$args = array (
			'post_type'     => 'post',
			'posts_per_page'=> absint( $slide_item_count ),
			'post__in'      => $slide_posts,
			'orderby'       =>'post__in',
			'ignore_sticky_posts' => true,
		); 
	endif;

	$post_loop = new WP_Query($args);                        
	if ( $post_loop->have_posts() ) :
	$i=-1; $j=0; 
	?>
	<div class="welcome-slides slide-controls owl-carousel">
		<?php
		while ($post_loop->have_posts()) : $post_loop->the_post(); $i++; $j++;
		
			$slide_thumb = get_the_post_thumbnail_url(get_the_ID(),'full');
			$slide_btn2_text[$j] = get_theme_mod( 'slide_btn2_text_'.$j ); 
			$slide_btn2_url[$j] = get_theme_mod( 'slide_btn2_url_'.$j); 
			$slide_btn2_target[$j] = get_theme_mod( 'slide_btn2_target_'.$j ); 
			$slide_btn2_target[$j] = $slide_btn2_target[$j]?'target="_blank"' : '';
		?>
		<div class="single-slide" style="background-image: url(<?php echo esc_url( $slide_thumb ); ?>);">
			<!-- Slider Gradient -->
			<div class="slider-overlay" style="background: rgba(0, 0, 0, 0.4) url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slides/slide-dot.png);"></div>
			<div class="slide-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<!-- Start slide content	-->
							<div class="slide-content <?php echo esc_attr($text_alignment); ?>">
								<h2><?php the_title(); ?></h2>
								<p><?php
								if ( ! has_excerpt() ) {
									echo esc_html( wp_trim_words( get_the_content(), 13 ) );
								} else { 
									the_excerpt();
								} 
								?></p>
								
								<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
								<div class="btn-wrap">
									<span class="btn-circle"></span>
									<a href="<?php the_permalink(); ?>" class="btn btn-bizes effect-2"><span><?php esc_html_e('See More', 'bizes'); ?></span></a>
								</div>
								<?php else : ?>
									<a href="<?php the_permalink(); ?>" class="btn btn-bizes effect-1"><?php esc_html_e('See More', 'bizes'); ?></a>
								<?php endif; ?>
								
								
							<?php if($slide_btn2_text[$j] && $slide_btn2_url[$j]) : ?>	
								
								<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
								<div class="btn-wrap">
									<span class="btn-circle"></span>
									<a href="<?php echo esc_url($slide_btn2_url[$j]); ?>" <?php echo esc_attr($slide_btn2_target[$j]); ?> class="btn btn-bizes effect-2"><span><?php echo esc_html($slide_btn2_text[$j]); ?></span></a>
								</div>
								<?php else : ?>
									<a href="<?php echo esc_url($slide_btn2_url[$j]); ?>" <?php echo esc_attr($slide_btn2_target[$j]); ?> class="btn btn-bizes effect-1"><?php echo esc_html($slide_btn2_text[$j]); ?></a>
								<?php endif; ?>
								
							<?php endif; ?>

							</div>
							<!-- End slide content	-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		endwhile; ?>
	</div>
	<?php
	endif; 
	wp_reset_postdata(); 

} else { if( class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){ ?>

	<div id="hero-slider" class="welcome-slides slide-controls owl-carousel">
		<?php
		for( $i=1; $i<=$slide_item_count; $i++ ) :
			$slide_title = get_theme_mod( 'slide_title_'.$i,  __('Digital Marketing for Startup','bizes'));
			$slide_desc = get_theme_mod( 'slide_description_'.$i,  __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.','bizes')); 
			
			$btn1_text = get_theme_mod( 'slide_btn_text_'.$i, __('Get Started','bizes')); 
			$btn1_url = get_theme_mod( 'slide_btn_url_'.$i); 
			$btn1_target = get_theme_mod( 'slide_btn_target_'.$i ); 
			$btn1_target = $btn1_target ? 'target="_blank"' : '';
			
			$btn2_text = get_theme_mod( 'slide_btn2_text_'.$i, __('Contact Us','bizes')); 
			$btn2_url = get_theme_mod( 'slide_btn2_url_'.$i); 
			$btn2_target = get_theme_mod( 'slide_btn2_target_'.$i ); 
			$btn2_target = $btn2_target ? 'target="_blank"' : '';
			
			$slide_bg_image = get_theme_mod( 'slider_bg_'.$i, get_template_directory_uri() . '/assets/img/slides/1.jpg' );
			
		?>
		<div class="single-slide" style="background-image: url(<?php echo esc_url($slide_bg_image); ?>);">
			<!-- Slider Gradient -->
			<div class="slider-overlay" style="background: rgba(0, 0, 0, 0.4) url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slides/slide-dot.png);"></div>
			<div class="slide-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<!-- Start slide content	-->
							<div class="slide-content <?php echo esc_attr($text_alignment); ?>">

								<?php if($slide_title) : ?>
								<h2><?php echo wp_kses_post($slide_title); ?></h2>
								<?php endif; ?>
								
								<?php if($slide_desc) : ?>
								<p><?php echo esc_html($slide_desc); ?></p>
								<?php endif; ?>

								<?php if($btn1_text && $btn1_url) : ?>

									<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
									<div class="btn-wrap">
										<span class="btn-circle"></span>
										<a href="<?php echo esc_url($btn1_url); ?>" <?php echo esc_attr($btn1_target); ?> class="btn btn-bizes effect-2"><span><?php echo esc_html($btn1_text); ?></span></a>
									</div>
									<?php else : ?>
										<a href="<?php echo esc_url($btn1_url); ?>" <?php echo esc_attr($btn1_target); ?> class="btn btn-bizes effect-2"><span><?php echo esc_html($btn1_text); ?></span></a>
									<?php endif; ?>
								
								<?php endif; ?>
								
								<?php if($btn2_text && $btn2_url) : ?>
							
									<?php if( get_theme_mod('site_btn_effect') == 'effect-2') : ?>
									<div class="btn-wrap">
										<span class="btn-circle"></span>
										<a href="<?php echo esc_url($btn2_url); ?>" <?php echo esc_attr($btn2_target); ?> class="btn btn-bizes effect-2"><span><?php echo esc_html($btn2_text); ?></span></a>
									</div>
									<?php else : ?>
										<a href="<?php echo esc_url($btn2_url); ?>" <?php echo esc_attr($btn2_target); ?> class="btn btn-bizes effect-2"><span><?php echo esc_html($btn2_text); ?></span></a>
									<?php endif; ?>
								
								<?php endif; ?>
							</div>
							<!-- End slide content	-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endfor; ?>
	</div>

	<?php } 
 } ?>
	<?php if(1===$bottom_curve) : ?>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 35" preserveAspectRatio="none" class="curve-2">
		<path class="shape" d="M668.5,20s-85.917-4.376-250-14.5C38.888-17.922-70.537,46.862-94,42c-25.429-5.269,79-6,79-6l1631-1-1-6.5s143.44,9.072-5.5,1.5C1470.9,22.954,1412.99-.574,1137,20,936.22,34.967,668.5,20,668.5,20Z"/>
	</svg>
	<?php endif; ?>
</div>
</div>
<?php endif; ?>
		