<?php
	
	$ts_charity_theme_color = get_theme_mod('ts_charity_theme_color');

	$custom_css = '';

	if($ts_charity_theme_color != false){
		$custom_css .='a.button, .topbar, #footer input[type="submit"],  #slider .carousel-caption .more-btn a, #slider .carousel-caption .more-btn, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current,.woocommerce button.button, .woocommerce button.button.alt, .woocommerce a.button,.woocommerce a.button.alt, .footer-bor-two, #footer .tagcloud a:hover, .content-bttn .second-border a, .content-bttn .second-border, .content-bttn .second-border:hover,#menu-sidebar input[type="submit"],.tags p a:hover,.meta-nav:hover,#comments a.comment-reply-link{';
			$custom_css .='background-color: '.esc_html($ts_charity_theme_color).';';
		$custom_css .='}';
	}
	if($ts_charity_theme_color != false){
		$custom_css .='input[type="submit"], .social-media i:hover, .woocommerce-message::before, .woocommerce #respond input#submit .woocommerce input.button,.woocommerce #respond input#submit.alt,  .woocommerce input.button.alt, .causes-box:hover h4,.causes-box:hover i,.our-services .page-box:hover h4 a, #slider .inner_carousel h2 a, h1.entry-title, #footer li a:hover,#slider .inner_carousel h1 a,.primary-navigation a:focus,.metabox a:hover,.tags i,#sidebar ul li a:hover{';
			$custom_css .='color: '.esc_html($ts_charity_theme_color).';';
		$custom_css .='}';
	}
	if($ts_charity_theme_color != false){
		$custom_css .='.primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($ts_charity_theme_color).'!important;';
		$custom_css .='}';
	}
	if($ts_charity_theme_color != false){
		$custom_css .='.search-box span, #footer input[type="search"], .footer-bor-two,.primary-navigation ul ul,.tags p a:hover{';
			$custom_css .='border-color: '.esc_html($ts_charity_theme_color).';';
		$custom_css .='}';
	}
	if($ts_charity_theme_color != false){
		$custom_css .='nav.woocommerce-MyAccount-navigation ul li, .blogbutton-small:hover,  #comments input[type="submit"].submit{';
			$custom_css .='background-color: '.esc_html($ts_charity_theme_color).'!important;';
		$custom_css .='}';
	}
	if($ts_charity_theme_color != false){
		$custom_css .='td.product-name a, a.shipping-calculator-button, .woocommerce-info a:hover, .woocommerce-privacy-policy-text a{';
			$custom_css .='color: '.esc_html($ts_charity_theme_color).' !important;';
		$custom_css .='}';
	}

	// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($ts_charity_theme_color){
	$custom_css .='#contact-info, #menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($ts_charity_theme_color).' 120%);
		}';
	}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'ts_charity_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto';
		$custom_css .='}';
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.serach_outer{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; right:0';
		$custom_css .='}';
	}