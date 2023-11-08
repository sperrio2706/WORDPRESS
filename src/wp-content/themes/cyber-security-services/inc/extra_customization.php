<?php

$cyber_security_services_custom_style= "";	

//Scroll-top-position 

$cyber_security_services_scroll_options = get_theme_mod( 'cyber_security_services_scroll_options','right_align');

if($cyber_security_services_scroll_options == 'right_align'){

$cyber_security_services_custom_style .='.scrollup{';

	$cyber_security_services_custom_style .='';

$cyber_security_services_custom_style .='}';

}else if($cyber_security_services_scroll_options == 'center_align'){

$cyber_security_services_custom_style .='.scrollup{';

	$cyber_security_services_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$cyber_security_services_custom_style .='}';

}else if($cyber_security_services_scroll_options == 'left_align'){

$cyber_security_services_custom_style .='.scrollup{';

	$cyber_security_services_custom_style .='right: auto; left:5%; margin: 0 auto';

$cyber_security_services_custom_style .='}';
}

	if (false === get_option('cyber_security_services_sticky_header')) {
	    add_option('cyber_security_services_sticky_header', 'off');
	}

	// Define the custom CSS based on the 'cyber_security_services_sticky_header' option

	if (get_option('cyber_security_services_sticky_header', 'off') !== 'on') {
	    $cyber_security_services_custom_style .= '.menubarr.fixed {';
	    $cyber_security_services_custom_style .= 'position: static;';
	    $cyber_security_services_custom_style .= '}';
	}

	if (get_option('cyber_security_services_sticky_header', 'off') !== 'off') {
	    $cyber_security_services_custom_style .= '.menubarr.fixed {';
	    $cyber_security_services_custom_style .= 'position: fixed; background: #0fa6c0;';
	    $cyber_security_services_custom_style .= '}';

	    $cyber_security_services_custom_style .= '.admin-bar .fixed {';
	    $cyber_security_services_custom_style .= ' margin-top: 32px;';
	    $cyber_security_services_custom_style .= '}';
	}

// max-height

$cyber_security_services_logo_max_height = get_theme_mod('cyber_security_services_logo_max_height','100');

if($cyber_security_services_logo_max_height != false){

$cyber_security_services_custom_style .='.custom-logo-link img{';

	$cyber_security_services_custom_style .='max-height: '.esc_html($cyber_security_services_logo_max_height).'px;';

$cyber_security_services_custom_style .='}';
}

//text-transform

$cyber_security_services_text_transform = get_theme_mod( 'cyber_security_services_menu_text_transform','CAPITALISE');
if($cyber_security_services_text_transform == 'CAPITALISE'){

$cyber_security_services_custom_style .='nav#top_gb_menu ul li a{';

	$cyber_security_services_custom_style .='text-transform: capitalize ; font-size: 14px;';

$cyber_security_services_custom_style .='}';

}else if($cyber_security_services_text_transform == 'UPPERCASE'){

$cyber_security_services_custom_style .='nav#top_gb_menu ul li a{';

	$cyber_security_services_custom_style .='text-transform: uppercase ; font-size: 14px;';

$cyber_security_services_custom_style .='}';

}else if($cyber_security_services_text_transform == 'LOWERCASE'){

$cyber_security_services_custom_style .='nav#top_gb_menu ul li a{';

	$cyber_security_services_custom_style .='text-transform: lowercase ; font-size: 14px;';

$cyber_security_services_custom_style .='}';
}

//Slider-content-alignment

$cyber_security_services_slider_content_alignment = get_theme_mod( 'cyber_security_services_slider_content_alignment','LEFT-ALIGN');

if($cyber_security_services_slider_content_alignment == 'LEFT-ALIGN'){

$cyber_security_services_custom_style .='.slider-box{';

	$cyber_security_services_custom_style .='text-align:left;';

$cyber_security_services_custom_style .='}';


}else if($cyber_security_services_slider_content_alignment == 'CENTER-ALIGN'){

$cyber_security_services_custom_style .='.slider-box{';

	$cyber_security_services_custom_style .='text-align:center;';

$cyber_security_services_custom_style .='}';


}else if($cyber_security_services_slider_content_alignment == 'RIGHT-ALIGN'){

$cyber_security_services_custom_style .='.slider-box{';

	$cyber_security_services_custom_style .='text-align:right;';

$cyber_security_services_custom_style .='}';

}

// theme-Width
	
$cyber_security_services_theme_width = get_theme_mod( 'cyber_security_services_width_options','full_width');

if($cyber_security_services_theme_width == 'full_width'){

$cyber_security_services_custom_style .='body{';

	$cyber_security_services_custom_style .='max-width: 100%;';

$cyber_security_services_custom_style .='}';

}else if($cyber_security_services_theme_width == 'Container'){

$cyber_security_services_custom_style .='body{';

	$cyber_security_services_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

$cyber_security_services_custom_style .='}';

}else if($cyber_security_services_theme_width == 'container_fluid'){

$cyber_security_services_custom_style .='body{';

	$cyber_security_services_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$cyber_security_services_custom_style .='}';
}

// theme-button-color//

$cyber_security_services_theme_button_color = get_theme_mod('cyber_security_services_theme_button_color');

if($cyber_security_services_theme_button_color != false){

$cyber_security_services_custom_style .='button,input[type="button"],input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit,a.more-link,a.added_to_cart.wc-forward,.site-footer .search-form .search-submit,.prev.page-numbers, .next.page-numbers, .page-numbers.current,.home-btn a, .box-button a,.toggle-menu button{';

	$cyber_security_services_custom_style .='background: '.esc_attr($cyber_security_services_theme_button_color).';';

$cyber_security_services_custom_style .='}';
}
$cyber_security_services_button_border = get_theme_mod('cyber_security_services_button_border_radius','5');

if($cyber_security_services_button_border != false){

$cyber_security_services_custom_style .='button,input[type="button"],input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit,a.more-link,a.added_to_cart.wc-forward,.site-footer .search-form .search-submit,#sidebar input[type="search"], input[type="search"], .prev.page-numbers, .next.page-numbers,.home-btn a, .box-button a{';

	$cyber_security_services_custom_style .='border-radius: '.esc_attr(

$cyber_security_services_button_border).'px;';
	
$cyber_security_services_custom_style .='}';
}

//related products
if( get_option( 'cyber_security_services_related_product',true) != 'on') {

$cyber_security_services_custom_style .='.related.products{';

	$cyber_security_services_custom_style .='display: none;';
	
$cyber_security_services_custom_style .='}';
}

if( get_option( 'cyber_security_services_related_product',true) != 'off') {

$cyber_security_services_custom_style .='.related.products{';

	$cyber_security_services_custom_style .='display: block;';
	
$cyber_security_services_custom_style .='}';
}