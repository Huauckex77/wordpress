<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bizes
 */

$animation = get_theme_mod( 'bizes_animation_disable') ? 'animate-box':''; 
$post_cols = get_theme_mod( 'blog_columns', 'two-columns' );
$post_style = get_theme_mod( 'blog_post_style', 'list' );
$thumb_display = get_theme_mod('post_thumbnail_display', 1);
$date_display = get_theme_mod('post_date_display', 1);
$cat_display = get_theme_mod('post_cat_display', 1);
$author_display = get_theme_mod('post_author_display', 1);
$comment_number_display = get_theme_mod('post_comment_number_display', 1);

if( $post_cols == 'two-columns' ) :
	$col_class = 'col-sm-12 col-md-6 col-lg-6';
elseif( $post_cols == 'three-columns' ) :
	$col_class = 'col-sm-6 col-md-4 col-lg-4';
else :
	$col_class = 'col-sm-12 col-md-12';
endif;
?>
<?php if($post_style == 'grid') : ?>
<div id="post-<?php the_ID(); ?>" class="masonry-item <?php echo esc_attr( $col_class ); ?>"> 
	<!-- Start single news -->
	<div class="single-news <?php echo esc_attr($animation);?>">
		<?php 
		if( has_post_thumbnail() && 1 === $thumb_display ): ?>
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
				if( 1 === $date_display ) {
					bizes_posted_on();
				}
			?>
		</div>
		<?php endif; ?>

		<?php 
		if( 1 === $cat_display ) {
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
		<?php if(1 === $author_display || 1=== $comment_number_display) : ?>
		<div class="entry-meta">
			<div class="entry-meta-inner">
				<?php if(1=== $author_display) { bizes_posted_by();}  ?>
				<?php if(1=== $comment_number_display) { bizes_post_comments();}  ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<!-- End single news -->
</div>

<?php else : ?>
<div id="post-<?php the_ID(); ?>" class="col-sm-12"> 
	<!-- Start single news -->
	<div class="single-news-wrap news-list <?php if(1 != $date_display){ echo 'no-date';} ?> <?php echo esc_attr($animation);?>">
		<?php 
		if( has_post_thumbnail() && 1 === $thumb_display ): ?>
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
		</div>
		<?php endif; ?>

		<?php
			if( 1 === $date_display ) {
				bizes_posted_on();
			}
		?>

		<div class="entry-header">
			<?php 
				the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
			?>
		</div>
		<div class="entry-meta"> 
			<?php if(1=== $author_display) { bizes_posted_by();}  ?>
			<?php if(1=== $cat_display) { bizes_posted_in();}  ?>
			<?php if(1=== $comment_number_display) { bizes_post_comments();}  ?>
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

					bizes_readmore_button();
				?>

			</div>
			<?php
		} ?>

	</div>
	<!-- End single news -->
</div>
<?php endif; ?>