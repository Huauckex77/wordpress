<?php 
/**
 * Template part for displaying latest news section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':'';

	$section_enable = get_theme_mod('news_section_enable', 0);

	$subheading = get_theme_mod('news_section_subtitle', __('From Blog', 'bizes'));
	$heading = get_theme_mod('news_section_title', __('Read Some of Our Latest <b>Insights</b>', 'bizes') );
	$description = get_theme_mod('news_section_description');

	$top_curve     = get_theme_mod('news_top_cruved', 0);
	$botttom_curve = get_theme_mod('news_bottom_cruved', 0);
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

	if(1 === $section_enable) : 
?>

	<!-- Start Latest News Area -->
	<div class="section-area latest-news-area <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="news-section">

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
			<?php
				$recent_post_type  = esc_attr(get_theme_mod('latest_post_content_type', 'latest-post'));
				$recent_post_cat   = esc_attr(get_theme_mod('latest_post_category_choice'));
				$recent_post_count = get_theme_mod('latest_posts_total_count', 4);
				$sticky = get_option( 'sticky_posts' );
				
				if( $recent_post_type=='latest-post' ){
					$args = array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => $recent_post_count, 'ignore_sticky_posts' => 1,'post__not_in' => $sticky); 
				} else {
					$args =  array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => $recent_post_count, 'category_name' => $recent_post_cat, 'ignore_sticky_posts' => 1,'post__not_in' => $sticky);
				}
				
				$recent_post_query = new WP_Query($args); 

				if ( $recent_post_query->have_posts() ) : 
			?>
			<div class="row">
				<?php
				$carousel_enable = get_theme_mod('news_carousel_enable', 1);
				if( 1 === $carousel_enable) echo '<div class="news-carousel owl-controls owl-carousel">';

				while ( $recent_post_query->have_posts() ) : $recent_post_query->the_post();?>
					<div class="col-md-4">
						<!-- Start single news -->
						<div class="single-news <?php echo esc_attr($animation);?>">

							<?php 
								$thubmnail_dispay = get_theme_mod('latest_post_thumb_display', 1 );
								$date_display = get_theme_mod('latest_post_date_display', 1);
								$content_display = get_theme_mod('latest_post_content_display', 1);
								$cat_display = get_theme_mod('latest_post_cat_display', 1 );
								$author_display = get_theme_mod('latest_post_author_display', 1 );
								$comment_display = get_theme_mod('latest_post_comment_number_display', 1 );

							if( $thubmnail_dispay == true && has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('bizes-post-thumb'); ?></a>
								<?php
								if(1=== $date_display) : 
									bizes_posted_on();
								 endif; ?>
							</div>
							<?php endif; ?>

							<?php 
							if( 1 === $cat_display ) {
								?>
								<div class="entry-cat mb-2"> 
								<?php 
								bizes_posted_in();
								?>
								</div>
								<?php
							}
							?>
							<div class="entry-content-wrap"> 
								<div class="entry-header">
									<?php
										the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
									?>
								</div>
								<div class="entry-content">
									<p><?php
									if( 1 === $content_display ) {
										if ( ! has_excerpt() ) {
											echo esc_html( wp_trim_words( get_the_content(), 18 ) );
										} else { 
											the_excerpt();
										} 
									} 
									?></p>
								</div>
							</div>

							<?php if(1 === $author_display || 1=== $comment_display) : ?>
							<div class="entry-meta">
								<div class="entry-meta-inner">
									<?php if(1=== $author_display) { bizes_posted_by();}  ?>
									<?php if(1=== $comment_display) { bizes_post_comments();}  ?>
								</div>
							</div>
							<?php endif; ?>

						</div>
						<!-- End single news -->
					</div>
					<?php
				endwhile;
				wp_reset_query(); 
				if( 1 === $carousel_enable) echo '</div>';
				?>
			</div>
		<?php 
		endif;
		wp_reset_postdata(); ?>
		</div>
		<?php if( 1=== $botttom_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" preserveAspectRatio="none" class="curve-2">
			<path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,252.25,4.247,498,61,0,0,227.25,50.247,317,50l1,9L-5,126Z"/>
		</svg>
		<?php endif; ?>
	</div>
	<!-- End Latest News Area -->
<?php endif; ?>