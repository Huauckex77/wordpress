<?php 
/**
 * Template part for displaying related posts
 *
 * @package Medica
 */
$related_posts = bizes_related_posts(); 
$animation = get_theme_mod( 'animation_disable' ) ? 'animate-box':''; 
if ( $related_posts->have_posts() ): ?>

	<div class="related-posts clearfix">

		<?php 
		$related_title = get_theme_mod( 'related_posts_label', __( 'You May Also Like...', 'bizes' ) ); 
		if($related_title) : ?>
		<div class="related-heading <?php echo esc_attr($animation);?>">
			<h4><?php echo esc_html( $related_title ); ?></h4>
		</div>
		<?php endif; ?>

		<div class="row">
			<?php 

			while ( $related_posts->have_posts() ) : $related_posts->the_post();

			$blog_single_layout = get_theme_mod( 'blog_single_layout', 'right-sidebar' );
			if( $blog_single_layout == 'left-sidebar' || $blog_single_layout == 'right-sidebar' ) :
				$content_class = 'col-md-6 col-lg-6';
			else :
				$content_class = 'col-md-4 col-lg-4';
			endif;

			?>

			<div class="col-sm-12 <?php echo esc_attr( $content_class ); ?> <?php echo esc_attr($animation);?>">

				<div class="single-news <?php echo esc_attr($animation);?>">
					<?php 
					if( has_post_thumbnail() && 1 === get_theme_mod('post_thumbnail_display', 1) ): ?>
					<div class="post-thumbnail"> 
						<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php
								the_post_thumbnail(
									'post-thumbnail',
									array(
										'alt' => the_title_attribute(
											array(
												'echo' => false,
											)
										),
									)
								);
							?>
						</a>
						<?php
							if( 1 === get_theme_mod('post_date_display', 1) ) {
								bizes_posted_on();
							}
						?>
					</div>
					<?php endif; ?>

					<?php 
					if( 1 === get_theme_mod('post_cat_display', 1) ) {
						?>
						<div class="entry-cat"> 
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
						<?php
						if( get_theme_mod('post_excerpt_display', 1) ) { ?>
							<div class="entry-content">
								<?php
									the_excerpt();
									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'bizes' ),
										'after'  => '</div>',
									) );
								?>
							</div>
							<?php
						} ?>
					</div>

					<div class="entry-meta">
						<div class="entry-meta-inner">
							<?php bizes_posted_by(); ?>
							<?php bizes_post_comments(); ?>
						</div>
					</div>
				</div>















			</div>

			<?php
			endwhile;
			wp_reset_postdata();
			?>

		</div>

	</div>
<?php endif; ?>