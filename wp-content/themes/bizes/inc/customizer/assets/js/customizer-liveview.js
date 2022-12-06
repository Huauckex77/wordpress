/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ , api ) {

	// Site title 
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	//Site Description.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	wp.customize( 'site_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-branding .site-title a' ).css( 'color', to );
		} );
	} );

	/**================================================
	 * Theme Options
	 ===================================================*/
	//Blog Title
	wp.customize( 'blog_page_title', function( value ) {
		value.bind( function( to ) {
			$( '.banner-content .page-title' ).text( to );
		} );
	} );

   /* Show/Hide Breadcrumbs */
    wp.customize( 'breadcrumbs_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.breadcrumbs').show();
            } else{
                $('.breadcrumbs').hide();
            }
        } );
    } );

	// Sticky Header
	wp.customize( 'site_sticky_header', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.header-area' ).removeClass( 'primary-header' );
			} else {
				$( '.header-area' ).addClass( 'primary-header' );
			}
		});
	});

   /* Show/Hide Phone */
    wp.customize( 'header_display_phone', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.top-contacts .phone').show();
            } else{
                $('.top-contacts .phone').hide();
            }
        } );
    } );

   /* Show/Hide Email */
    wp.customize( 'header_display_email', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.top-contacts .email').show();
            } else{
                $('.top-contacts .email').hide();
            }
        } );
    } );

  /* Blog Page Settings */
    wp.customize( 'post_thumbnail_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.single-news .post-thumbnail,.news-list .post-thumbnail').show();
            } else{
                $('.single-news .post-thumbnail,.news-list .post-thumbnail').hide();
            }
        } );
    } );
    wp.customize( 'post_excerpt_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.single-news .entry-content,.news-list .entry-content').show();
            } else{
                $('.single-news .entry-content,.news-list .entry-content').hide();
            }
        } );
    } );
    wp.customize( 'post_date_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.single-news .post-date, .news-list .post-date').show();
            } else{
                $('.single-news .post-date, .news-list .post-date').hide();
            }
        } );
    } );

    wp.customize( 'post_cat_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.single-news .entry-cat').show();
            } else{
                $('.single-news .entry-cat').hide();
            }
        } );
    } );
    wp.customize( 'post_cat_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.news-list .entry-cat').show();
            } else{
                $('.news-list .entry-cat').hide();
            }
        } );
    } );

   /* Single Post Page Settings */
    wp.customize( 'single_post_thumb_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-detail .post-thumbnail').show();
            } else{
                $('.post-detail .post-thumbnail').hide();
            }
        } );
    } );
    wp.customize( 'single_post_meta_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-detail .entry-meta').show();
            } else{
                $('.post-detail .entry-meta').hide();
            }
        } );
    } );
    wp.customize( 'single_post_date_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-detail .post-date').show();
            } else{
                $('.post-detail .post-date').hide();
            }
        } );
    } );


	/**==================================================
	 * Front Page Settings
	 ====================================================*/

	/*===About Section===*/
	wp.customize( 'about_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.about-section .about-content > h6' ).text( to );
		} );
	} );
	wp.customize( 'about_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.about-section .about-content > h2' ).text( to );
		} );
	} );
	wp.customize( 'about_section_description', function( value ) {
		value.bind( function( to ) {
			$( '.about-section .about-content > p' ).text( to );
		} );
	} );

	/*===Service Section===*/
	wp.customize( 'services_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#services-section .section-title h2' ).text( to );
		} );
	} );
	wp.customize( 'services_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#services-section .section-title .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'services_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#services-section .section-title p' ).text( to );
		} );
	} );

	/*===Portfolios Section===*/
	wp.customize( 'portfolio_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-section .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'portfolio_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-section .section-title  .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'portfolio_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-section .section-title  p' ).text( to );
		} );
	} );

	/*===Feedback Section===*/
	wp.customize( 'feedback_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.feedback-area .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'feedback_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.feedback-area .section-title  .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'feedback_section_description', function( value ) {
		value.bind( function( to ) {
			$( '.feedback-area .section-title  p' ).text( to );
		} );
	} );


	/*===Team Section===*/
	wp.customize( 'team_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.team-area .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'team_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.team-area .section-title  .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'team_section_description', function( value ) {
		value.bind( function( to ) {
			$( '.team-area .section-title  p' ).text( to );
		} );
	} );

	/*===Pricing Section===*/
	wp.customize( 'pricing_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#pricing-section .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'pricing_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#pricing-section .section-title .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'pricing_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#pricing-section .section-title  p' ).text( to );
		} );
	} );

	/*=== News Section ===*/
	wp.customize( 'news_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.latest-news-area .section-title h2' ).text( to );
		} );
	} );
	wp.customize( 'news_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.latest-news-area .section-title .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'news_section_description', function( value ) {
		value.bind( function( to ) {
			$( '.latest-news-area .section-title p' ).text( to );
		} );
	} );

	/**================================================
	 * Footer Settings
	 ===================================================*/
	// Copyright Area
	wp.customize( 'footer_copyright_text', function( value ) {
		value.bind( function( to ) {
			$( '#copyright-text' ).text( to );
		} );
	} );




    function update_css( ){
         var css_code = $( '#bizes-style-inline-css' ).html();
        // Fix Chrome Lost CSS When resize ??
        $( '#bizes-style-inline-css' ).replaceWith( '<style class="replaced-style" id="bizes-style-inline-css">'+css_code+'</style>' );

    }

    // When preview ready
    wp.customize.bind( 'preview-ready', function() {
        update_css();
    });

    $( window ).resize( function(){
        update_css();
    });

} )( jQuery , wp.customize );

