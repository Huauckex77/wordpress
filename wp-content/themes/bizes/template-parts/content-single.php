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
<div id="post-<?php the_ID(); ?>" <?php post_class('post-detail'); ?>> 

	<!-- Start single news -->
	<div class="single-news-wrap <?php if(1 != $date_display){ echo 'no-date';} ?> <?php echo esc_attr($animation);?>">
		<?php 
		if(  has_post_thumbnail() && 1 === $thumb_display ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>

		<?php
			if( 1 === $date_display ) {
				bizes_posted_on();
			}
		?>

		<div class="entry-header">
			<?php 
				the_title( '<h3 class="entry-title">', '</h3>' );
			?>
		</div>
		<?php 
			if( 1 === $meta_display ) {
				bizes_post_meta();
			}
		?>
		<div class="entry-content">
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Read More<span class="screen-reader-text"> "%s"</span>', 'bizes' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'bizes' ),
					'after'  => '</div>',
				) );
			?>
		</div>

	</div>
	<!-- End single news -->

	<div class="post-footer"> 
		<?php bizes_post_footer(); ?>
	</div>

</div>