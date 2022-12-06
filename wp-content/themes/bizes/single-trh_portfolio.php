<?php
/**
 * The template for displaying all single Portolios 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bizes
 */
get_header();
?>

	<!-- Start Page Header -->
	<?php do_action('bizes_page_header'); ?>
	<!-- Start Page Header -->

	<!-- Start Latest News Area -->
	<div id="page" class="site">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php 
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'portfolio' );
				endwhile;
				?>

			</main>
		</div>
	</div>
	<!-- End Latest News Area -->
<?php
	get_footer();