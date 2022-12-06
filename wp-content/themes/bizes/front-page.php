<?php
/**
 * Front Page
 *
 * @package Bizes
 */

$home_sections_sort = get_theme_mod( 'bizes_sections_sort', array('slider', 'about', 'services', 'funfacts', 'portfolios', 'feedback', 'team', 'cta', 'pricing', 'brands','news')); 
if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
	
    include( get_home_template() );
	
}elseif( ! empty( $home_sections_sort ) && is_array( $home_sections_sort )){


get_header();

 if( bizes_set_to_premium() ){
	  
	foreach ( $home_sections_sort as $sections_key => $sections_sort_val ) :

		if ( 'slider' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'slider' );  
		endif;

		if ( 'about' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'about' );
		endif;

		if ( 'services' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'services' );  
		endif;

		if ( 'funfacts' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'funfacts' );
		endif;
		
		if ( 'portfolios' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'portfolios' );
		endif;
		
		if ( 'feedback' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'feedback' );
		endif;

		if ( 'team' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'team' );  
		endif;

		if ( 'cta' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'cta' );  
		endif;
		if ( 'pricing' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'pricing' );
		endif;

		if ( 'brands' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'brands' );  
		endif;

		if ( 'news' === $sections_sort_val ) : 
			get_template_part( 'sections/section', 'latest-news' );
		endif;

	endforeach;
	
	} else {
		get_template_part( 'sections/section', 'slider' );  
		get_template_part( 'sections/section', 'services' );
		get_template_part( 'sections/section', 'funfacts' ); 
		get_template_part( 'sections/section', 'portfolios' );
		get_template_part( 'sections/section', 'feedback' );
		get_template_part( 'sections/section', 'latest-news' ); 
		get_template_part( 'sections/section', 'cta' ); 
	}
    get_footer();  	
}else{
    //If all section are disabled then show respective page template. 
    include( get_page_template() );
}
