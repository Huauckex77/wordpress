<?php

/**
 * Add custom css to header
 */
if ( ! function_exists( 'bizes_custom_inline_style' ) ) {
	function bizes_custom_inline_style( ) {

        ob_start();

		/**================================================================
		 * Color Settings
		=================================================================== */
		 //Primary Colors
		$primary_color = get_theme_mod( 'site_primary_color' );
		if ( $primary_color != '' ) {
			?>
			a:focus, a:active, a:hover,.top-contacts a i,.top-contacts a:hover, .top-contacts a:focus,.social-icons a,.social-icons a:hover, .social-icons a:focus,.header-area.style-2 .site-logo .site-title, .header-area.style-3 .site-logo .site-title,.scroll-header .site-logo .site-title,.scroll-header .bizes-nav ul.menu > li > a:hover,.close-menu:hover, .close-menu:focus,.sidenav-wrap a:hover, .sidenav-wrap a:focus,.section-title h6,.service-item > i,.service-item:hover >i,.service-item.style-one >i,.service-item:hover i,.portfolio-info h6:hover,.entry-cat i,.single-news h4.entry-title:hover,.single-news .entry-meta a:hover, .single-news .entry-meta a:focus,.single-news-wrap .entry-meta span i,.entry-title > a:hover, .widget.widget-category a:hover, .post-content a:hover, .widget.widget-archives a:hover, .entry-meta a:hover,.widget-area .widget ul li:hover::before,.post-navigation a:hover, .posts-navigation a:hover,.contact-item > i,.single-todo h5 i,.footer-area a,.social-links.border a,.widget.contact-widget ul li i,.widget.widget-link ul > li a:hover, .widget.widget-link ul > li a:hover i,.footer-manu ul li a:hover, .footer-manu ul li a:focus,.breadcrumbs li a:hover,.about-content > h6,.progress .progress-bar::after,.single-fact .icon,.client-bio > p,.single-testimonial:hover .client-details::after,.single-news .entry-meta span i,.fact .numb,.social-links ul li a,.breadcrumbs a::after,.breadcrumbs a:hover,.single-news-wrap blockquote:not(.wp-block-quote):not(.has-text-color)::before,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce-info::before,.woocommerce-Reviews .stars a:before
			{
				color:<?php echo esc_attr( $primary_color ); ?> !important;
			}
			.bg-theme,.social-icons.has-bg a:hover, .social-icons.has-bg a:focus,.header-area.style-2 ul.menu > li:hover,.nav-icon:hover span, .nav-icon:focus span, .nav-icon:hover span::before, .nav-icon:focus span::before, .nav-icon:hover span::after, .nav-icon:focus span::after, .scroll-header .nav-icon:hover span, .scroll-header .nav-icon:hover span::before, .scroll-header .nav-icon:hover span::after,.count,.slide-controls  .owl-dot.active span,.slidenav:hover i,.service-item h5::before,.service-item.style-one:hover> i,.single-plan:hover .plan-head,.single-plan.active .plan-head,.single-news-wrap .post-date,.search-form > button,.tagcloud a:hover,.page-numbers a:hover,.page-numbers .current,.single-todo:hover,ul.social-links li:hover a,.owl-controls .owl-dot.active,.expc-text,#scrollup,.owl-controls .owl-nav > div:hover,.footer-widget .tagcloud a:hover,.header-cart .count,nav.woocommerce-MyAccount-navigation ul li a,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.added_to_cart,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current
			{
				background-color: <?php echo esc_attr( $primary_color ); ?> !important;
			}
			
			blockquote,.play-btn::before,.social-links.border a,.social-links.border li:hover a
			{
				border-color :<?php echo esc_attr( $primary_color ); ?> !important;
			}
			<?php
		}

		//Secondary Colors
		$secondary_color = get_theme_mod( 'site_secondary_color' );
		if ( $secondary_color != '' ) {
			?>
			.post-navigation a,.widget-post .post-content a.title,.contact-widget a:hover
			{
				color: <?php echo esc_attr( $secondary_color ); ?>;
			}

			.page-numbers a,.comment-form .form-submit .submit:hover,.widget-area .tagcloud a,.back-to-top:hover,button[type="submit"]:hover,button[type="submit"]:focus,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce a.added_to_cart:hover,button:hover, button:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="reset"]:hover, input[type="reset"]:focus, input[type="submit"]:hover, input[type="submit"]:focus
			{
				background-color: <?php echo esc_attr( $secondary_color ); ?>;
			}
			
			.site-main .post-navigation
			{
				border-color : <?php echo esc_attr( $secondary_color ); ?>;
			}
			<?php
		} // End $secondary_color

		// Body Text Color
		$body_text_color = get_theme_mod('body_text_color');
		if ( $body_text_color ) {
			?>
			body,.widget-area ul li a,.widget-area .widget > ul li::before,.entry-meta a,pre,.comment-meta, .comment-meta a {
				color: <?php echo esc_attr( $body_text_color ); ?>;
			}
			<?php
		} // END $body_text_color

		// Heading Color
		$heading_color = get_theme_mod('site_heading_color');
		if ($heading_color) {
			?>
				h1, h2, h3, h4, h5, h6, .entry-header h4 a,.entry-header h4 a:focus,.filter-menu button{
					color:<?php echo esc_attr( $heading_color ); ?>;
				}
			<?php
		} // END $site_heading_color

		 // Navigation Backgrond
		$nav_bg = get_theme_mod( 'navigation_bg'  );
		if ( $nav_bg != '' ) {
			?>
			.main-header{
				background-color: <?php echo esc_attr( $nav_bg ); ?>;
			}
			<?php
		} // END $nav_bg

		// Menu color
		$menu_color =  get_theme_mod( 'menu_link_color' );
		if ( $menu_color ) {
			?>
			nav.bizin-nav ul.menu > li > a{
				color: <?php echo esc_attr( $menu_color ); ?>;
			}
			<?php
		} // END $menu_color
		
		//Menu hover color
		$menu_hover_color =  get_theme_mod( 'menu_hover_link_color' );
		if ( $menu_hover_color ) {
			?>
			.bizes-nav ul.menu > li > a:hover, .bizes-nav ul.menu > li a.current_page_item{
				color: <?php echo esc_attr( $menu_hover_color ); ?> !important;
			}
			<?php
		} // END $menu_hover_color

		/**
		 * Submenu Background
		 */
		$dropdown_bg =  get_theme_mod( 'submenu_bg_color' );
		if ( $dropdown_bg ) {
			?>
			.bizes-nav .menu > li ul{
				background-color: <?php echo esc_attr( $dropdown_bg ); ?>;
			}
			<?php
		} // END $dropdown_bg

		// Submenu text color
		$submenu_text_color = get_theme_mod( 'submenu_text_color' );
		if ( $submenu_text_color ) {
			?>
			.bizes-nav .menu > li > ul li a{
				color: <?php echo esc_attr( $submenu_text_color ); ?> !important;
			}
			<?php
		} // END $submenu_text_color
		
		//Submenu hover color
		$submenu_htext_color =  get_theme_mod( 'submenu_hover_text_color' );
		if ( $submenu_htext_color ) {
			?>
			.bizes-nav .menu > li > ul li a:hover{
				color: <?php echo esc_attr( $submenu_htext_color ); ?> !important;
			}
			<?php
		} // END $submenu_htext_color


		// Button BG Color
		$btn_bg_color =  get_theme_mod( 'site_btn_bg_color' );
		if ( $btn_bg_color != '' ) { ?>
			a.btn.btn-bizes, a.btn-bizes.effect-1, button, input[type="button"], input[type="reset"], input[type="submit"],.filter-menu button.active,.play-btn,.header-btn .btn,.post-thumbnail a.post-date {
				background-color: <?php echo esc_attr( $btn_bg_color ); ?>;
			}
			<?php
		} // End $btn_bg_color

		// Button Hover BG Color
		$btn_bg_hcolor = get_theme_mod( 'site_btn_bg_hcolor');
		if ( $btn_bg_hcolor != '' ) {
			?>
			.entry-content button:hover,button:focus,button[type="submit"]:focus, input[type="button"]:hover, input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus, input[type="submit"]:hover,input[type="submit"]:focus,a.btn.btn-bizes:hover,a.btn-bizes.effect-1:hover, a.btn-bizes:focus,.filter-menu button:hover,.play-btn:hover,.header-btn .btn:hover,.post-thumbnail a.post-date:hover
			{
				background-color: <?php echo esc_attr( $btn_bg_hcolor ); ?>;
			}
			<?php
		} // End $btn_bg_hcolor

		// Button Text Color
		$btn_text_color = get_theme_mod('site_btn_text_color');
		if ( $btn_text_color ) {
			?>
			a.btn.btn-bizes,a.btn-bizes.effect-1, button, input[type="button"], input[type="reset"], input[type="submit"] {
				color: <?php echo esc_attr( $btn_text_color ); ?>;
			}
			<?php
		} // END $btn_text_color
		
		// Button Text Color
		$btn_text_hcolor = get_theme_mod('site_btn_hover_text_color');
		if ( $btn_text_hcolor ) {
			?>
			.entry-content button:hover,button:focus,button[type="submit"]:focus, input[type="button"]:hover, input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus, input[type="submit"]:hover,input[type="submit"]:focus,a.btn.btn-bizes:hover,a.btn-bizes.effect-1:hover,a.btn-bizes:focus,a.btn-bizes.effect-2:hover{
				color: <?php echo esc_attr( $btn_text_hcolor ); ?>;
			}
			<?php
		} // END $btn_text_hcolor


		// Anchor Color
		$anchor_color = get_theme_mod('site_anchor_color');
		if ( $anchor_color ) {
			?>
			.entry-content a {
				color: <?php echo esc_attr( $anchor_color ); ?>;
			}
			<?php
		} // END $anchor_color

		// Anchor Hover Color
		$anchor_hcolor = get_theme_mod('site_anchor_hcolor');
		if ( $anchor_hcolor ) {
			?>
			.entry-content a:hover {
				color: <?php echo esc_attr( $anchor_hcolor ); ?>;
			}
			<?php
		} // END $anchor_hcolor

		/**===============================================
		 * Typography
		==================================================*/
		// Navigation Typography
		$menu_font = json_decode(get_theme_mod('nav_font_family', '{"font":"Raleway","boldweight":"600","category":"serif"}'), true);
		if ($menu_font['boldweight'] == 'regular') {
			unset($menu_font['boldweight']);
			$menu_font['boldweight'] = 'normal';
		}
		$nav_fsize =  get_theme_mod('nav_font_size');
		if ( $menu_font ) {
			?>
			.bizes-nav ul.menu > li > a, .mega-menu .title,.sidenav > ul > li > a{
				font-family: "<?php echo esc_attr( $menu_font['font'] ); ?>";
				font-weight: <?php echo esc_attr($menu_font['boldweight']); ?>;
				<?php if($nav_fsize) : ?>
					font-size: <?php echo esc_attr($nav_fsize); ?>px;
				<?php endif; ?>
			}
			<?php
		} //END $menu_font

		$submenu_font = json_decode(get_theme_mod('subnav_font_family', '{"font":"Poppins","boldweight":"500","category":"serif"}'), true);
		if ($submenu_font['boldweight'] == 'regular') {
			unset($submenu_font['boldweight']);
			$submenu_font['boldweight'] = 'normal';
		}
		$subnav_fsize =  get_theme_mod('subnav_font_size');
		if ( $submenu_font ) {
			?>
			.bizes-nav .menu > li > ul li a,.sidenav ul ul li a{
				font-family: "<?php echo esc_attr( $submenu_font['font'] ); ?>";
				font-weight: <?php echo esc_attr($submenu_font['boldweight']); ?>;
				<?php if($subnav_fsize) : ?>
					font-size: <?php echo esc_attr($subnav_fsize); ?>px;
				<?php endif; ?>
			}
			<?php
		} //END $submenu_font

		// Body Typography
    	$body_font = json_decode(get_theme_mod('body_font_family'), true);
		if ($body_font['boldweight'] == 'regular') {
			unset($body_font['boldweight']);
			$body_font['boldweight'] = 'normal';
		}
		$body_fsize = get_theme_mod('body_font_size');
		$b_lheight = get_theme_mod('body_line_height');

		if ( $body_font ) {
			?>
			body{
				font-family: "<?php echo esc_attr($body_font['font']); ?>";
				font-weight: <?php echo esc_attr($body_font['boldweight']); ?>;
				<?php if($body_fsize) : ?>
					font-size: <?php echo esc_attr($body_fsize); ?>px;
				<?php endif; ?>
				<?php if($b_lheight) : ?>
					line-height: <?php echo esc_attr($b_lheight); ?>;
				<?php endif; ?>
			}
			<?php
		} 

		// Heading Typography
		$heading_font = json_decode(get_theme_mod('heading_font_family', '{"font":"Raleway","boldweight":"600","category":"serif"}'), true);
		$headings_lheight = get_theme_mod('headings_line_height');
		if ($heading_font['boldweight'] == 'regular') {
			unset($heading_font['boldweight']);
			$heading_font['boldweight'] = 'normal';
		}
		if ($heading_font) {
		?>
			h1,h2,h3,h4,h5,h6{
				font-family: "<?php echo esc_attr($heading_font['font']); ?>";
				font-weight: <?php echo esc_attr($heading_font['boldweight']); ?>;
				<?php if($headings_lheight) : ?>
					line-height: <?php echo esc_attr($headings_lheight); ?>;
				<?php endif; ?>
			}
		<?php
		}// END $heading_font_family
		$h1_size = get_theme_mod('h1_font_size');
		$h2_size = get_theme_mod('h2_font_size');
		$h3_size = get_theme_mod('h3_font_size');
		$h4_size = get_theme_mod('h4_font_size');
		$h5_size = get_theme_mod('h5_font_size');
		$h6_size = get_theme_mod('h6_font_size');

		if (!empty($h1_size)) {
		?>
			h1{ font-size: <?php echo absint($h1_size); ?>px;}
		<?php
		}
		if (!empty($h2_size)) {
		?>
			h2{ font-size: <?php echo absint($h2_size); ?>px;}
		<?php
		}
		if (!empty($h3_size)) {
		?>
			h3{ font-size: <?php echo absint($h3_size); ?>px;}
		<?php
		}
		if (!empty($h4_size)) {
		?>
			h4{ font-size: <?php echo absint($h4_size); ?>px;}
		<?php
		}
		if (!empty($h5_size)) {
		?>
			h5{ font-size: <?php echo absint($h5_size); ?>px;}
		<?php
		}
		if (!empty($h6_size)) {
		?>
			h6{ font-size: <?php echo absint($h6_size); ?>px;}
		<?php
		}

		/**=================================
		 * Header Settings
		===============================*/
		$header_top_bg =  get_theme_mod( 'header_top_bg_color' );
		if ( $header_top_bg != '' ) {
			?>
			.header-top
			{
				background-color: <?php echo esc_attr( $header_top_bg ); ?>;
			}
			<?php
		} // End $header_top_bg




		/**==================================================
		 * Frontpage Settings
		 =====================================================*/
		// Slider Section
		$slider_max_width =  get_theme_mod( 'slider_max_content_width'  );
		if ( !empty($slider_max_width) ) {
			?>
			#hero-slider .slide-content {
				<?php if($slider_max_width != '') : ?>
				max-width: <?php echo esc_attr($slider_max_width); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$slider_bottom_cruved_bg =  get_theme_mod( 'slider_bottom_cruved_bg' );
		if ( !empty($slider_bottom_cruved_bg) ) {
			?>
			#hero-slider .curve-2 .shape {
				fill: <?php echo esc_attr($slider_bottom_cruved_bg); ?>;
			}
			<?php
		} 
		
		$slider_overlay =  get_theme_mod( 'slider_overlay_bg' );
		if ( !empty($slider_overlay) ) {
			?>
			.single-slide .slider-overlay {
				background-color: <?php echo esc_attr($slider_overlay); ?> !important;
			}
			<?php
		} 
		
		// About Section
		$about_bg =  get_theme_mod( 'about_section_bg'  );
		$about_pt =  get_theme_mod( 'about_section_pt' );
		$about_pb =  get_theme_mod( 'about_section_pb' );
		if ( !empty($about_bg)|| !empty($about_pt) || !empty($about_pb) ) {
			?>
			#about-section {
				<?php if(!empty($about_bg)) : ?>
				background-color: <?php echo esc_attr($about_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($about_pt)) : ?>
				padding-top: <?php echo esc_attr($about_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($about_pb)) : ?>
				padding-bottom: <?php echo esc_attr($about_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 

		/* ===Service Section ===*/
		$service_bg =  get_theme_mod( 'service_section_bg' );
		$service_pt =  get_theme_mod( 'service_section_pt' );
		$service_pb =  get_theme_mod( 'service_section_pb' );
		if ( !empty($service_bg ) || !empty($service_pt) || !empty($service_pb) ) {
			?>
			#services-section {
				<?php if(!empty($service_bg )) : ?>
				background-color: <?php echo esc_attr($service_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($service_pt)) : ?>
				padding-top: <?php echo esc_attr($service_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($service_pb)) : ?>
				padding-bottom: <?php echo esc_attr($service_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$service_top_cruved_bg =  get_theme_mod( 'service_top_cruved_bg' );
		if ( !empty($service_top_cruved_bg) ) {
			?>
			#services-section .curve-1 .shape {
				fill: <?php echo esc_attr($service_top_cruved_bg); ?>;
			}
			<?php
		} 
		$service_bottom_cruved_bg =  get_theme_mod( 'service_bottom_cruved_bg' );
		if ( !empty($service_bottom_cruved_bg) ) {
			?>
			#services-section .curve-2 .shape {
				fill: <?php echo esc_attr($service_bottom_cruved_bg); ?>;
			}
			<?php
		} 

		/* ===Funfacts Section ===*/
		$funfacts_pt =  get_theme_mod( 'funfacts_section_pt' );
		$funfacts_pb =  get_theme_mod( 'funfacts_section_pb' );
		if ( !empty($funfacts_pt) || !empty($funfacts_pb) ) {
			?>
			#funfacts-section {
				<?php if(!empty($funfacts_pt)) : ?>
				padding-top: <?php echo esc_attr($funfacts_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($funfacts_pb)) : ?>
				padding-bottom: <?php echo esc_attr($funfacts_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$funfacts_overlay =  get_theme_mod( 'funfacts_section_overlay' );
		if ( !empty($funfacts_overlay) ) {
			?>
			.funfact-area:before {
				background-color: <?php echo esc_attr($funfacts_overlay); ?>;
			}
			<?php
		}
		$funfacts_tp_bg =  get_theme_mod( 'funfacts_top_cruved_bg' );
		if ( $funfacts_tp_bg != '' ) {
			?>
			#funfacts-section .curve-1 .shape {
				fill: <?php echo esc_attr($funfacts_tp_bg); ?>;
			}
			<?php
		}
		$funfacts_bt_bg =  get_theme_mod( 'funfacts_bottom_cruved_bg' );
		if ( $funfacts_bt_bg != '' ) {
			?>
			#funfacts-section .curve-2 .shape {
				fill: <?php echo esc_attr($funfacts_bt_bg); ?>;
			}
			<?php
		} 

		/* ===Portfolios Section ===*/
		$portfolio_bg =  get_theme_mod( 'portfolio_section_bg' );
		$portfolio_pt =  get_theme_mod( 'portfolio_section_pt' );
		$portfolio_pb =  get_theme_mod( 'portfolio_section_pb' );
		if ( !empty($portfolio_bg) || !empty($portfolio_pt) || !empty($portfolio_pb) ) {
			?>
			#portfolio-section {
				<?php if(!empty($portfolio_bg)) : ?>
				background-color: <?php echo esc_attr($portfolio_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($portfolio_pt)) : ?>
				padding-top: <?php echo esc_attr($portfolio_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($portfolio_pb)) : ?>
				padding-bottom: <?php echo esc_attr($portfolio_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		
		$portfolio_overlay =  get_theme_mod( 'portfolio_overlay' );
		if ( !empty($portfolio_overlay) ) {
			?>
			.portfolio-img:before {
				background-color: <?php echo esc_attr($portfolio_overlay); ?>;
			}
			<?php
		}
		
		$portfolio_tp_bg =  get_theme_mod( 'portfolio_top_cruved_bg' );
		if ( !empty($portfolio_tp_bg) ) {
			?>
			#portfolio-section .curve-1 .shape {
				fill: <?php echo esc_attr($portfolio_tp_bg); ?>;
			}
			<?php
		}
		$portfolio_bt_bg =  get_theme_mod( 'portfolio_bottom_cruved_bg' );
		if ( $portfolio_bt_bg != '' ) {
			?>
			#portfolio-section .curve-2 .shape {
				fill: <?php echo esc_attr($portfolio_bt_bg); ?>;
			}
			<?php
		} 

		/* ===Feedback Section ===*/
		$feedback_pt =  get_theme_mod( 'feedback_section_pt' );
		$feedback_pb =  get_theme_mod( 'feedback_section_pb' );
		if ( !empty($feedback_pt) || !empty($feedback_pb) ) {
			?>
			#feedback-section {
				<?php if($feedback_pt != '') : ?>
				padding-top: <?php echo esc_attr($feedback_pt); ?>px;
				<?php endif; ?>
				<?php if($feedback_pb != '') : ?>
				padding-bottom: <?php echo esc_attr($feedback_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$feedback_overlay =  get_theme_mod( 'feedback_section_overlay' );
		if ( $feedback_overlay != '' ) {
			?>
			.feedback-area:before {
				background-color: <?php echo esc_attr($feedback_overlay); ?>;
			}
			<?php
		}
		$feedback_tp_bg =  get_theme_mod( 'feedback_top_cruved_bg' );
		if ( $feedback_tp_bg != '' ) {
			?>
			#feedback-section .curve-1 .shape {
				fill: <?php echo esc_attr($feedback_tp_bg); ?>;
			}
			<?php
		}
		$feedback_bt_bg =  get_theme_mod( 'feedback_bottom_cruved_bg' );
		if ( $feedback_bt_bg != '' ) {
			?>
			#feedback-section .curve-2 .shape {
				fill: <?php echo esc_attr($feedback_bt_bg); ?>;
			}
			<?php
		} 

		/* ===Team Section ===*/
		$team_bg =  get_theme_mod( 'team_section_bg' );
		$team_pt =  get_theme_mod( 'team_section_pt' );
		$team_pb =  get_theme_mod( 'team_section_pb' );
		if ( !empty($team_bg) || !empty($team_pt) || !empty($team_pb) ) {
			?>
			#team-section {
				<?php if(!empty($team_bg )) : ?>
				background-color: <?php echo esc_attr($team_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($team_pt)) : ?>
				padding-top: <?php echo esc_attr($team_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($team_pb)) : ?>
				padding-bottom: <?php echo esc_attr($team_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		
		$team_overlay =  get_theme_mod( 'team_member_overlay' );
		if ( $team_overlay != '' ) {
			?>
			.singel-team::after {
				background: <?php echo esc_attr($team_overlay); ?> !important;
			}
			<?php
		}
		
		$team_tp_bg =  get_theme_mod( 'team_top_cruved_bg' );
		if ( $team_tp_bg != '' ) {
			?>
			#team-section .curve-1 .shape {
				fill: <?php echo esc_attr($team_tp_bg); ?>;
			}
			<?php
		}

		$team_bt_bg =  get_theme_mod( 'team_bottom_cruved_bg' );
		if ( $team_bt_bg != '' ) {
			?>
			#team-section .curve-2 .shape {
				fill: <?php echo esc_attr($team_bt_bg); ?>;
			}
			<?php
		} 

		/* ===Pricing Section ===*/
		$pricing_bg =  get_theme_mod( 'pricing_section_bg' );
		$pricing_pt =  get_theme_mod( 'pricing_section_pt' );
		$pricing_pb =  get_theme_mod( 'pricing_section_pb' );
		if ( !empty($pricing_bg) || !empty($pricing_pt) || !empty($pricing_pb) ) {
			?>
			#pricing-section {
				<?php if(!empty($pricing_bg)) : ?>
				background-color: <?php echo esc_attr($pricing_bg); ?>;
				<?php endif; ?>
				<?php if( !empty($pricing_pt) ) : ?>
				padding-top: <?php echo esc_attr($pricing_pt); ?>px;
				<?php endif; ?>
				<?php if( !empty($pricing_pb) ) : ?>
				padding-bottom: <?php echo esc_attr($pricing_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$pricing_tp_bg =  get_theme_mod( 'pricing_top_cruved_bg' );
		if ( !empty($pricing_tp_bg ) ) {
			?>
			#pricing-section .curve-1 .shape {
				fill: <?php echo esc_attr($pricing_tp_bg); ?>;
			}
			<?php
		}

		$pricing_bt_bg =  get_theme_mod( 'pricing_bottom_cruved_bg' );
		if ( !empty($pricing_bt_bg) ) {
			?>
			#pricing-section .curve-2 .shape {
				fill: <?php echo esc_attr($pricing_bt_bg); ?>;
			}
			<?php
		} 

		/* ===CTA Section ===*/
		$cta_pt =  get_theme_mod( 'cta_section_pt' );
		$cta_pb =  get_theme_mod( 'cta_section_pb' );
		if ( !empty($cta_pt) || !empty($cta_pb) ) {
			?>
			#cta-section {
				<?php if(!empty($cta_pt)) : ?>
				padding-top: <?php echo esc_attr($cta_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($cta_pb)) : ?>
				padding-bottom: <?php echo esc_attr($cta_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$cta_overlay =  get_theme_mod( 'cta_section_overlay' );
		if ( !empty($cta_overlay )) {
			?>
			.cta-area:before {
				background-color: <?php echo esc_attr($cta_overlay); ?>;
			}
			<?php
		}
		$cta_tp_bg =  get_theme_mod( 'cta_top_cruved_bg' );
		if ( !empty($cta_tp_bg) ) {
			?>
			#cta-section .curve-1 .shape {
				fill: <?php echo esc_attr($cta_tp_bg); ?>;
			}
			<?php
		}
		$cta_bt_bg =  get_theme_mod( 'cta_bottom_cruved_bg' );
		if ( !empty($cta_bt_bg) ) {
			?>
			#cta-section .curve-2 .shape {
				fill: <?php echo esc_attr($cta_bt_bg); ?>;
			}
			<?php
		} 

		/* ===News Section ===*/
		$news_bg =  get_theme_mod( 'news_section_bg' );
		$news_pt =  get_theme_mod( 'news_section_pt' );
		$news_pb =  get_theme_mod( 'news_section_pb' );
		if ( !empty($news_bg) || !empty($news_pt) || !empty($news_pb) ) {
			?>
			#news-section {
				<?php if(!empty($news_bg )) : ?>
				background-color: <?php echo esc_attr($news_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($news_pt)) : ?>
				padding-top: <?php echo esc_attr($news_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($news_pb)) : ?>
				padding-bottom: <?php echo esc_attr($news_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$news_tp_bg =  get_theme_mod( 'news_top_cruved_bg' );
		if ( !empty($news_tp_bg) ) {
			?>
			#news-section .curve-1 .shape {
				fill: <?php echo esc_attr($news_tp_bg); ?>;
			}
			<?php
		}
		$news_bt_bg =  get_theme_mod( 'news_bottom_cruved_bg' );
		if ( !empty($news_bt_bg) ) {
			?>
			#news-section .curve-2 .shape {
				fill: <?php echo esc_attr($news_bt_bg); ?>;
			}
			<?php
		} 

		/* ===Brands Section ===*/
		$brands_bg =  get_theme_mod( 'brands_section_bg' );
		$brands_pt =  get_theme_mod( 'brands_section_pt' );
		$brands_pb =  get_theme_mod( 'brands_section_pb' );
		if ( !empty($brands_bg) || !empty($brands_pt) || !empty($brands_pb) ) {
			?>
			#brands-section {
				<?php if(!empty($brands_bg) ) : ?>
				background-color: <?php echo esc_attr($brands_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($brands_pt)) : ?>
				padding-top: <?php echo esc_attr($brands_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($brands_pb)) : ?>
				padding-bottom: <?php echo esc_attr($brands_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$brands_tp_bg =  get_theme_mod( 'brands_top_cruved_bg' );
		if ( !empty($brands_tp_bg) ) {
			?>
			#brands-section .curve-1 .shape {
				fill: <?php echo esc_attr($brands_tp_bg); ?>;
			}
			<?php
		}

		$brands_bt_bg =  get_theme_mod( 'brands_bottom_cruved_bg' );
		if ( !empty($brands_bt_bg) ) {
			?>
			#brands-section .curve-2 .shape {
				fill: <?php echo esc_attr($brands_bt_bg); ?>;
			}
			<?php
		}

		// Preloader Background color
		$preloader_bg_color =  get_theme_mod( 'preloader_bg_color' );
		if ( !empty($preloader_bg_color) ) {
			?>
			.preloader-wrap {
				background: <?php echo esc_attr($preloader_bg_color); ?>;
			}
			<?php
		} // End $preloader_bg_color

		/**===============================================
		 * Misc Settings
		==================================================*/
		$container_width = get_theme_mod( 'container_width' );
		if ( !empty($container_width) ) {
			?>
			@media (min-width:1400px) {
				.container {
					max-width:<?php echo esc_attr($container_width); ?>px;
				}
			}
			<?php
		} // End $container_width

		// Button Border Radius
		$btn_bradius = get_theme_mod('site_btn_bradius');
		if ( $btn_bradius != '') {
			?>
			.btn.btn-bizes,.btn-wrap {
				border-radius: <?php echo esc_attr( $btn_bradius ); ?>px;
			}
			<?php
		} // END $btn_bradius

		/**===============================================
		 * Banner Settings
		==================================================*/
		$banner_overlay_color =  get_theme_mod( 'banner_overlay_color' );
		if ( $banner_overlay_color != '' ) {
			?>
			.banner-overlay{
				background-color: <?php echo esc_attr($banner_overlay_color); ?>;
			}
			<?php
		} // End $banner_overlay_color

		$banner_height = get_theme_mod( 'banner_height' );
		if ( $banner_height != '' ) {
			?>
			.banner-content {
				min-height:<?php echo esc_attr($banner_height); ?>px;
			}
			<?php
		} // End $banner_height



		/**================================================
		 * Footer Settings
		 ===================================================*/
		// Footer Background color
		$widgets_bg_color = get_theme_mod( 'footer_widgets_bg_color' );
		if ( $widgets_bg_color != '' ) {
			?>
			.footer-area {
				background-color: <?php echo esc_attr($widgets_bg_color); ?>;
			}
			.footer-svg .cls-1{
				fill:<?php echo esc_attr($widgets_bg_color); ?>;
			}
			<?php
		} // End $widgets_bg_color


		//Footer Title Color
		$widgets_title_color =  get_theme_mod( 'footer_widgets_title_color' );
		if ( $widgets_title_color != '' ) {
			?>
			.footer-widget .widget-title  {
				color: <?php echo esc_attr($widgets_title_color); ?>;
			}
			<?php
		} // End $widgets_title_color


		//Footer Text Color
		$widgets_text_color =  get_theme_mod( 'footer_widgets_text_color' );
		if ( $widgets_text_color != '' ) {
			?>
			.footer-widgets, .footer-widgets p {
				color: <?php echo esc_attr($widgets_text_color); ?>;
			}
			<?php
		} // End $widgets_text_color

		//Footer Link Color
		$widgets_link_color =  get_theme_mod( 'footer_widgets_link_color' );
		if ( $widgets_link_color != '' ) {
			?>
			.footer-widgets a,.footer-widget.widget .tagcloud a,.footer-manu ul li a,.widget ul li::before{
				color: <?php echo esc_attr($widgets_link_color); ?> !important;
			}
			<?php
		} // End $widgets_link_color
		
		//Footer Link Hover Color
		$widgets_link_hcolor = get_theme_mod( 'footer_widgets_link_hcolor' );
		if ( $widgets_link_hcolor != '' ) {
			?>
			.footer-widgets a:hover,.footer-widget ul li a:hover,.footer-widget.widget > ul li::before,.footer-widget.widget .tagcloud a:hover,.footer-manu ul li a:hover,.widget ul li:hover::before {
				color: <?php echo esc_attr($widgets_link_hcolor); ?> !important;
			}
			<?php
		} // End $widgets_link_hcolor

		 // Copytight Background color
		$copyright_bg_color =  get_theme_mod( 'footer_copyright_bg_color');
		if ( $copyright_bg_color != '' ) {
			?>
			.copy-right-area {
				background-color: <?php echo esc_attr($copyright_bg_color); ?>;
			}
			<?php
		} // End $copyright_bg_color


		// Copyright Text Color
		$copyright_text_color =  get_theme_mod( 'footer_copyright_text_color'  );
		if ( $copyright_text_color != '' ) {
			?>
			#copyright-text {
				color: <?php echo esc_attr($copyright_text_color); ?>;
			}
			<?php
		} // End $copyright_text_color



		/**======================================================
		 * Site Branding
		=========================================================*/
		// Site title font
    	$site_title_font = json_decode(get_theme_mod('site_title_font_family'), true);
		if ($site_title_font['boldweight'] == 'regular') {
			unset($site_title_font['boldweight']);
			$site_title_font['boldweight'] = 'normal';
		}
		$site_title_fsize = get_theme_mod('site_title_font_size');
		$site_title_color =  get_theme_mod( 'site_title_color');
		if ( $site_title_font ) {
			?>
			.site-logo .site-title,.site-logo .site-title a{
				font-family: "<?php echo esc_attr($site_title_font['font']); ?>";
				font-weight: <?php echo esc_attr($site_title_font['boldweight']); ?>;

				<?php if($site_title_fsize) : ?>
					font-size: <?php echo esc_attr($site_title_fsize); ?>px;
				<?php endif; ?>

				<?php if($site_title_color) : ?>
				color: <?php echo esc_attr( $site_title_color ); ?>;
				<?php endif; ?>

			}
			<?php
		} //END $site_title_font
	

		// Tagline
    	$tagline_font = json_decode(get_theme_mod('tagline_font_family'), true);
		if ($tagline_font['boldweight'] == 'regular') {
			unset($tagline_font['boldweight']);
			$tagline_font['boldweight'] = 'normal';
		}
		$tagline_font_size = get_theme_mod('tagline_font_size');
		$tagline_color =  get_theme_mod( 'tagline_text_color');
		if ( $tagline_font ) {
			?>
			.site-branding p.site-description{
				font-family: "<?php echo esc_attr($tagline_font['font']); ?>";
				font-weight: <?php echo esc_attr($tagline_font['boldweight']); ?>;

				<?php if($tagline_font_size) : ?>
					font-size: <?php echo esc_attr($tagline_font_size); ?>px;
				<?php endif; ?>

				<?php if($tagline_color) : ?>
				color: <?php echo esc_attr( $tagline_color ); ?>;
				<?php endif; ?>

			}
			<?php
		} //END





        $css = ob_get_clean();

        if ( trim( $css ) == "" ) {
            return ;
        }
		$css = apply_filters( 'bizes_custom_css', $css ) ;
        if ( ! is_customize_preview() ) {
	        $css = preg_replace(
		        array(
			        // Remove comment(s)
			        '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
			        // Remove unused white-space(s)
			        '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
		        ),
		        array(
			        '$1',
			        '$1$2$3$4$5$6$7',
		        ),
		        $css
	        );
        }
        if ( ! function_exists( 'wp_get_custom_css' ) ) {  // Back-compat for WordPress < 4.7.
            $custom = get_option('bizes_custom_css');
            if ($custom) {
                $css .= "\n/* --- Begin custom CSS --- */\n" . $custom . "\n/* --- End custom CSS --- */\n";
            }
        }
       return $css ;
	}

}