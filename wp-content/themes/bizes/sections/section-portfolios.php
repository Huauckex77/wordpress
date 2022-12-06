<?php 
/**
 * Template part for displaying Portfolios Section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':'';
	$section_enable = get_theme_mod('portfolio_section_enable', 0);
	$subheading = get_theme_mod('portfolio_section_subtitle', __('Latest Works', 'bizes'));
	$heading = get_theme_mod('portfolio_section_title', __('Check some of our <b>latest works</b>', 'bizes') );
	$description = get_theme_mod('portfolio_section_description');

	$lightbox_enable = get_theme_mod('portfolio_lightbox_enable', 1);
	$total_items = get_theme_mod('portfolio_total_count', 6);

	$top_curve     = get_theme_mod('portfolio_top_cruved', 0);
	$botttom_curve = get_theme_mod('portfolio_bottom_cruved', 0);
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

	if(1===$section_enable && class_exists( 'Themereps_Helper' )  ) : 
?>

	<!-- Start Work Area -->
	<div class="section-area portfolio-section <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="portfolio-section">

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
			if( taxonomy_exists( 'trh_portfolio_category' ) ){
				$portfolio_tax = '';
				$i = 0;
				$portfolio_posts = get_posts( array( 'post_type' => 'trh_portfolio', 'post_status' => 'publish', 'posts_per_page' => $total_items ) );
				foreach( $portfolio_posts as $portfolio ){
					$terms = get_the_terms( $portfolio->ID, 'trh_portfolio_category' );
					if( $terms ){
						foreach( $terms as $pterm ){
							$i++;
							$portfolio_tax .= $pterm->term_id;
							$portfolio_tax .= ', ';    
						}
					}
				}
				$term_ids = explode( ', ', $portfolio_tax );
				$term_ids = array_diff( array_unique( $term_ids ), array('') );
				wp_reset_postdata(); 
			}
			
			$args = array(
				'taxonomy'      => 'trh_portfolio_category',
				'orderby'       => 'name', 
				'order'         => 'ASC',
			);                
			$terms = get_terms( $args );
			if( $terms )
			{ ?>
				<div class="row"> 
					 <div class="col-md-12"> 
						<div class="filter-menu text-center">
							<button class="active" data-filter="*"><?php esc_html_e( 'All', 'bizes' ); ?></button>
							<?php
								foreach( $terms as $pterm ){

									if( in_array( $pterm->term_id, $term_ids ) )
									echo '<button data-filter=".' . esc_attr( $pterm->term_id . '_portfolio_taxonomies' ) .  '">' . esc_html( $pterm->name ) . '</button>';
								} 
							?>
						</div>
				   </div>
				</div>
				<?php
			} ?>

			<?php
			global $post;
			$portfolio_qry = new WP_Query( array( 'post_type' => 'trh_portfolio', 'post_status' => 'publish', 'posts_per_page' => $total_items ) );
			if( taxonomy_exists( 'trh_portfolio_category' ) && $portfolio_qry->have_posts() ){ ?>
				<div class="row portfolio-wrap">
				<?php
				while( $portfolio_qry->have_posts() ){
					$portfolio_qry->the_post();
					$terms = get_the_terms( get_the_ID(), 'trh_portfolio_category' );
					$portfolio_tax = '';
					$i = 0;
					if( $terms ){
						foreach( $terms as $pterm ){
							$i++;
							$portfolio_tax .= $pterm->term_id . '_portfolio_taxonomies';
			
							if( count( $terms ) > $i ){
								$portfolio_tax .= ' ';
							}
						}
					} ?>  
					   <div class="col-md-4 col-sm-6 portfolio-item <?php echo esc_attr( $portfolio_tax ); ?>">
						   <!-- Start Single work -->
						   <div class="portfolio-img">
								<?php $full_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); 
									if(1===$lightbox_enable) :
										if( has_post_thumbnail() ) {
											?>
											<a href="<?php echo esc_url($full_img[0]); ?>" class="venobox" data-gall="gallery01"><i class="icofont-drag2"></i><?php the_post_thumbnail('medium_large'); ?></a>
											<?php
										} else { ?>
											<a href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/work/1.jpg'  ); ?>" class="venobox" data-gall="gallery01"><i class="icofont-drag2"></i><?php echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/work/1.jpg') . '" alt="' . esc_attr( get_the_title() ) . '">'; ?></a>
											<?php
										} ?>
								<?php else : 
										if( has_post_thumbnail() ) {
											?>
											<a href="<?php the_permalink(); ?>"><i class="icofont-link-alt"></i><?php the_post_thumbnail('medium_large'); ?></a>
											<?php
										} else { ?>
											<a href="<?php the_permalink(); ?>" ><i class="icofont-link-alt"></i><?php echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/work/1.jpg') . '" alt="' . esc_attr( get_the_title() ) . '">'; ?></a>
											<?php
										} ?>
								<?php endif; ?>

						   </div>
						   <!-- Start work Info --> 
							<div class="portfolio-info text-center">

								<?php if(1===$lightbox_enable) : ?>
									<h6><?php the_title(); ?></h6>
								<?php else : ?>
									<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
								<?php endif; ?>
								<?php
									$terms = get_the_terms($post->ID, 'trh_portfolio_category' );
									if ($terms && ! is_wp_error($terms)) :
										$term_arr = array();
										foreach ($terms as $pterm) {
											$term_arr[] = $pterm->name;
										}
										$all_terms = join( ", ", $term_arr);
									endif;
									echo '<div class="portfolio-categories">' . wp_kses_post($all_terms) . '</div>';
								?>
							</div>
							<!-- End work Info --> 
						   <!-- End Single work --> 
					   </div>
				<?php } ?>
				</div>

				<?php
				wp_reset_postdata(); 
			} 
			?>
		</div>
		<?php if( 1=== $botttom_curve ) : ?>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 115" preserveAspectRatio="none" class="curve-2">
			<path class="shape" d="M-6,38s308.25,77.247,688,12c0,0,266.25-47.753,433-47,0,0,252.25,4.247,498,61,0,0,227.25,50.247,317,50l1,9L-5,126Z"/>
		</svg>
		<?php endif; ?>
	</div>
	<!-- End Work Area -->
<?php endif;