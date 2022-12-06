<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bizes
 */

if ( ! function_exists( 'bizes_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bizes_posted_on() {

		$time_string = '<time datetime="%3$s" class="published">%1$s %2$s %3$s</time>';

		if(is_single()){
			$time_string = '<time datetime="%3$s" class="published">%1$s %2$s %3$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_html( get_the_time('d') ),
			esc_html( get_the_time('M') ),
			esc_html( get_the_time('Y') )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'%s',
			'<a class="post-date" href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


if ( ! function_exists( 'bizes_posted_in' ) ) :
	/**
	 * Prints HTML with meta information for the categories
	 */
	function bizes_posted_in() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bizes' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span><i class="icofont-ui-folder"></i> ' . '%1$s' . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if ( ! function_exists( 'bizes_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function bizes_posted_by() {

		$author_name = get_the_author();
		$author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
		$byline =  '<a class="url fn n" href="' . esc_url( $author_url) . '">' . esc_html( $author_name ) . '</a>';

		echo '<span class="byline"><i class="icofont-user-male"></i> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


if ( ! function_exists( 'bizes_post_comments' ) ) :
	/**
	 * Prints HTML with meta information for the Comments
	 */
	function bizes_post_comments() {
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span><i class="icofont-speech-comments"></i> <a href="<?php comments_link(); ?>"> <?php comments_number(); ?></a></span>
		<?php endif;
	}
endif;

/**
 * Post meta info
 */
if ( ! function_exists( 'bizes_post_meta' ) ) :
	function bizes_post_meta() {

		?>
		<div class="entry-meta"> 

			<span><i class="icofont-user-alt-5"></i> <?php the_author_posts_link(); ?> </span>

			<span><i class="icofont-ui-folder"></i> <?php the_category( __( ', ', 'bizes' ));?> </span>
		</div>
		<?php
	}
endif;

/**
 * Post Footer
 */
if ( ! function_exists( 'bizes_post_footer' ) ) :
	function bizes_post_footer() {
	global $post;
	$pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
		?>
		<div class="blog-social ml-auto">
			<strong><?php echo esc_html__('Share On: ','bizes') ?></strong>
			<ul class="social-links">
				<li><a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() ); ?>" target="_blank"><i class="icofont-facebook"></i></a></li>
				<li><a href="<?php echo esc_url( 'http://twitter.com/intent/tweet?text=Currently reading ' . get_the_title() .'&url=' .get_the_permalink() );?>" target="_blank"><i class="icofont-twitter"></i></a></li>
				<li><a href="<?php echo esc_url( 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . esc_url($pin_image) . '&description=' . get_the_title() ); ?>" target="_blank"><i class="icofont-pinterest"></i></a></li>
				<li><a href="<?php echo esc_url( 'http://www.linkedin.com/shareArticle?mini=true&url='. get_the_permalink() . '&title='.get_the_title() . '&source=' . get_bloginfo('name') ); ?>" target="_blank"><i class="icofont-linkedin"></i></a></li>
			</ul>
		</div>

		<?php
	}
endif;

if ( ! function_exists( 'bizes_related_posts' ) ) :
	/**
	* Display the related posts.
	 * Since 1.0.0
	*/
	function bizes_related_posts() {
		wp_reset_postdata();
		global $post;
		
		$blog_single_layout = get_theme_mod( 'blog_single_layout', 'right-sidebar' );
		if( $blog_single_layout == 'left-sidebar' || $blog_single_layout == 'right-sidebar' ) :
			$posts_count = 2;
		else :
			$posts_count = 3;
		endif;
		
		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => $posts_count,
		);
		
		// Related by categories.
		if ( get_theme_mod( 'related_post_choice', 'categories' ) == 'categories' ) {
			$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
			$args['category__in'] = $cats;
		}
		
		// Related by tags.
		if ( get_theme_mod( 'related_post_choice', 'categories' ) == 'tags' ) {
			$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
			$args['tag__in'] = $tags;

			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
endif;


if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
