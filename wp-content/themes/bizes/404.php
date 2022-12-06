<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bizes
 */

get_header();
?>

	<!-- Start Page Header -->
	<?php do_action('bizes_page_header'); ?>
	<!-- Start Page Header -->
	
	<!-- Stat Page ID -->
	<div id="page" class="site">
		<!-- Start Site Content -->
		<div class="site-content">	
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12"> 
						<div id="primary" class="content-area">
							<main id="main" class="site-main">
								<div class="content-404">
									<h2><?php esc_html_e( '404', 'bizes' ); ?></h2>
									
									<h4><?php esc_html_e( 'Page Not Found', 'bizes' ); ?></h4>
									
									<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bizes' ); ?></p>

									<?php get_search_form(); ?>

								</div><!-- .page-content -->
							</main>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Site Content -->
	</div>
	<!-- End Page ID -->
<?php
get_footer();
