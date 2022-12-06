<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bizes
 */
	$footer_style = get_theme_mod('footer_style', 'style-1');
	$top_curve = get_theme_mod('footer_top_cruved', 0);
?>

			<footer class="footer-area <?php if(1=== $top_curve) : ?>curved-top<?php endif; ?>" id="footer-area">
				<?php if(1=== $top_curve) : ?>
				<svg class="footer-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 116"  preserveAspectRatio="none">
					<path class="cls-1" d="M-6,73S283.694,184.237,805,39c0,0,256.49-85.5,574,4,0,0,302.69,86.9,553-15l8,103L-9,136Z"/>
				</svg>
				<?php endif; ?>
				<?php
					if( 'style-1' == $footer_style ){ 
					/**
					 * hooked bizes_footer_widgets - 10
					 * @see bizes_footer_widgets
					*/
					do_action('bizes_footer_widgets');

					} else {
					/**
					 * hooked bizes_footer_minimalist - 10
					 * @see bizes_footer_minimalist
					*/
					do_action('bizes_footer_minimalist');
					
					}
					/**
					 * hooked bizes_footer_copyright - 10
					 * @see bizes_footer_copyright
					*/
					do_action('bizes_footer_copyright');
				?>
			</footer>
			<!-- Ene Footer -->

			<!-- Back to Top -->
			<?php
			if( 1 === get_theme_mod( 'scrollup_display', 1 ) ) : ?>
			<a href="#page" class="scrollup" id="scrollup"><i class="icofont icofont-thin-up"></i></a>
			<?php endif; ?>

		</div>
        <!-- End Wrapper -->

		<?php
		if( 1 === get_theme_mod( 'preloader_display', 1 ) ) : ?>
			<div class="preloader-wrap">
				<div class="cube-wrapper">
					<div class="cube-folding">
						<span class="leaf1"></span>
						<span class="leaf2"></span>
						<span class="leaf3"></span>
						<span class="leaf4"></span>
					</div>
					<span class="loading" data-name="Loading"><?php echo esc_html(get_theme_mod('preloader_text', __('Loading', 'bizes'))); ?></span>
				</div>
			</div>
			<?php
		endif; ?>

	<?php wp_footer(); ?>
    </body>
</html>