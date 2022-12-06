<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bizes
 */

get_header();

	$post_detail_layout = get_theme_mod( 'blog_single_layout', 'right-sidebar' );
	if( $post_detail_layout == 'left-sidebar' || $post_detail_layout == 'right-sidebar' ) :
		$content_class = 'col-sm-12 col-md-12 col-lg-9';
		$aside_class = 'col-sm-12 col-md-12 col-lg-3';
	else :
		$content_class = 'col-sm-12 col-md-12 col-lg-12';
	endif;
?>

	<!-- Start Page Header -->
	<?php do_action('bizes_page_header'); ?>
	<!-- Start Page Header -->

	<!-- Start Latest News Area -->
	<div id="page" class="site">
		<div class="container">
			<div class="row">

				<!--Start Sidebar -->
				<?php if($post_detail_layout == 'left-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

							<?php 
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'single' );


								
								// Display Related posts
								if ( 1 === get_theme_mod( 'related_post_display', 1) ) {
									get_template_part( 'template-parts/related-posts' );
								}

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif; 

							endwhile;
							?>

						</main>
					</div>
				</div>

				<?php if($post_detail_layout == 'right-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>

			</div>

		</div>
	</div>
	<!-- End Latest News Area -->
<?php
	get_footer();