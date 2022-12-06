<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bizes
 */

$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':''; 
$date_display = get_theme_mod('single_post_date_display', 1); 
$thumb_display = get_theme_mod('single_post_thumb_display', 1); 
$meta_display = get_theme_mod('single_post_meta_display', 1); 
?>

	<!-- Start single news -->
	<div class="portfolio-details">
		<div class="container">
			<?php if(has_post_thumbnail()) : ?>
			<div class="row">
				<div class="col-md-12"> 
					<div class="post-thumbnail <?php echo esc_attr($animation);?>">
						<?php the_post_thumbnail(); ?>
					</div><!-- .post-thumbnail -->
				</div>
			</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-8"> 
					<div class="portfolio-content <?php echo esc_attr($animation);?>">
						<h4 class="portfolio-title"><?php the_title();?></h4>
						<?php
							the_content( );
						?>
					</div>
				</div>
				<div class="col-md-4"> 
					<div class="portfolio-detail <?php echo esc_attr($animation);?>">
						<h4><?php esc_html_e( 'Project Details', 'bizes' ); ?></h4>

						<?php 
							$project_client = get_post_meta($post->ID,'themereps_project_client', true);
							if(!empty($project_client)){
							?>
								<p><strong><?php esc_html_e( 'Client:', 'bizes' ); ?></strong>  <?php echo esc_html($project_client); ?></p>
							<?php
							}

							$project_location = get_post_meta($post->ID,'themereps_project_location', true);
							if(!empty($project_location)){
							?>
								<p><strong><?php esc_html_e( 'Location:', 'bizes' ); ?></strong> <?php echo esc_html($project_location); ?></p>
							<?php
							}

							$start_date = get_post_meta($post->ID,'themereps_project_start_date', true);
							if(!empty($start_date)){
							?>
								<p><strong><?php esc_html_e( 'Starting Date:', 'bizes' ); ?></strong> <?php echo esc_html($start_date); ?></p>
							<?php
							}

							$close_date = get_post_meta($post->ID,'themereps_project_close_date', true);
							if(!empty($close_date)){
							?>
								<p><strong><?php esc_html_e( 'Closing Date:', 'bizes' ); ?></strong> <?php echo esc_html($close_date); ?></p>
							<?php
							}

							$project_budget = get_post_meta($post->ID,'themereps_project_budget', true);
							if(!empty($project_budget)){
							?>
								<p><strong><?php esc_html_e( 'Project Budget:', 'bizes' ); ?></strong> <?php echo esc_html($project_budget); ?></p>
							<?php
							}

							$terms = get_the_terms( $post->ID, 'bcr_portfolio_category' );
							if(!empty($terms)){ ?>
								<p class="portfolio-cat"><strong><?php esc_html_e( 'Category:', 'bizes' ); ?></strong>
								<?php foreach($terms as $pterm) { ?>
									<span><?php echo esc_html($pterm->name); ?></span>
								<?php } ?>
								</p>
								<?php 
							}
						?>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- End single news -->
