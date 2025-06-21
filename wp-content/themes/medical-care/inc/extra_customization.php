<?php

$medical_care_custom_style= "";

// sticky header
if (false === get_option('medical_care_sticky_header')) {
    add_option('medical_care_sticky_header', 'off');
}

// Define the custom CSS based on the 'medical_care_sticky_header' option

if (get_option('medical_care_sticky_header', 'off') !== 'on') {
    $medical_care_custom_style .= '.fixed_header.fixed {';
    $medical_care_custom_style .= 'position: static;';
    $medical_care_custom_style .= '}';
}

if (get_option('medical_care_sticky_header', 'off') !== 'off') {
    $medical_care_custom_style .= '.fixed_header.fixed {';
    $medical_care_custom_style .= 'position: fixed; background: var(--theme-secondary-color);';
    $medical_care_custom_style .= '}';

    $medical_care_custom_style .= '.admin-bar .fixed {';
    $medical_care_custom_style .= ' margin-top: 32px;';
    $medical_care_custom_style .= '}';
}


 // logo-max-height

$medical_care_logo_max_height = get_theme_mod('medical_care_logo_max_height','100');

if($medical_care_logo_max_height != false){

$medical_care_custom_style .='.custom-logo-link img{';

	$medical_care_custom_style .='max-height: '.esc_html($medical_care_logo_max_height).'px;';
	
$medical_care_custom_style .='}';
}

// Width 
	
$medical_care_theme_width = get_theme_mod( 'medical_care_width_options','full_width');

if($medical_care_theme_width == 'full_width'){

$medical_care_custom_style .='body{';

	$medical_care_custom_style .='max-width: 100%;';

$medical_care_custom_style .='}';

}else if($medical_care_theme_width == 'container'){

$medical_care_custom_style .='body{';

	$medical_care_custom_style .='width: 100%; padding-right: 15px; padding-left: 15px;  margin-right: auto !important; margin-left: auto !important;';

$medical_care_custom_style .='}';

$medical_care_custom_style .='@media screen and (min-width: 601px){';

$medical_care_custom_style .='body{';

    $medical_care_custom_style .='max-width: 720px;';
    
$medical_care_custom_style .='} }';

$medical_care_custom_style .='@media screen and (min-width: 992px){';

$medical_care_custom_style .='body{';

    $medical_care_custom_style .='max-width: 960px;';
    
$medical_care_custom_style .='} }';

$medical_care_custom_style .='@media screen and (min-width: 1200px){';

$medical_care_custom_style .='body{';

    $medical_care_custom_style .='max-width: 1140px;';
    
$medical_care_custom_style .='} }';

$medical_care_custom_style .='@media screen and (min-width: 1400px){';

$medical_care_custom_style .='body{';

    $medical_care_custom_style .='max-width: 1320px;';
    
$medical_care_custom_style .='} }';

$medical_care_custom_style .='@media screen and (max-width:600px){';

$medical_care_custom_style .='body{';

    $medical_care_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$medical_care_custom_style .='} }';

}else if($medical_care_theme_width == 'container_fluid'){

$medical_care_custom_style .='body{';

	$medical_care_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$medical_care_custom_style .='}';

$medical_care_custom_style .='@media screen and (max-width:600px){';

$medical_care_custom_style .='body{';

    $medical_care_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$medical_care_custom_style .='} }';
}

//Scroll-top-position 

$medical_care_scroll_options = get_theme_mod( 'medical_care_scroll_options','right_align');

if($medical_care_scroll_options == 'right_align'){

$medical_care_custom_style .='.scroll-top button{';

	$medical_care_custom_style .='';

$medical_care_custom_style .='}';

}else if($medical_care_scroll_options == 'center_align'){

$medical_care_custom_style .='.scroll-top button{';

	$medical_care_custom_style .='right: 0; left:0; margin: 0 auto; top:89% !important';

$medical_care_custom_style .='}';

}else if($medical_care_scroll_options == 'left_align'){

$medical_care_custom_style .='.scroll-top button{';

	$medical_care_custom_style .='right: auto; left:5%; margin: 0 auto';

$medical_care_custom_style .='}';
}

//menu-text-transform

$medical_care_text_transform = get_theme_mod( 'medical_care_menu_text_transform','UPPERCASE');
if($medical_care_text_transform == 'CAPITALISE'){

$medical_care_custom_style .='nav#top_gb_menu ul li a,#mySidenav li a{';

	$medical_care_custom_style .='text-transform: capitalize ; font-size: 14px;';

$medical_care_custom_style .='}';

}else if($medical_care_text_transform == 'UPPERCASE'){

$medical_care_custom_style .='nav#top_gb_menu ul li a,#mySidenav li a{';

	$medical_care_custom_style .='text-transform: uppercase ; font-size: 14px;';

$medical_care_custom_style .='}';

}else if($medical_care_text_transform == 'LOWERCASE'){

$medical_care_custom_style .='nav#top_gb_menu ul li a,#mySidenav li a{';

	$medical_care_custom_style .='text-transform: lowercase ; font-size: 14px;';

$medical_care_custom_style .='}';
}

//Slider-content-alignment

$medical_care_slider_content_alignment = get_theme_mod( 'medical_care_slider_content_alignment','LEFT-ALIGN');

if($medical_care_slider_content_alignment == 'LEFT-ALIGN'){

$medical_care_custom_style .='#slider .carousel-caption{';

	$medical_care_custom_style .='text-align:left; right: 40%; left: 20%;';

$medical_care_custom_style .='}';

$medical_care_custom_style .='@media screen and (max-width:1199px){';

$medical_care_custom_style .='#slider .carousel-caption{';

    $medical_care_custom_style .='right: 30%; left: 20%';
    
$medical_care_custom_style .='} }';

$medical_care_custom_style .='@media screen and (max-width:991px){';

$medical_care_custom_style .='#slider .carousel-caption{';

    $medical_care_custom_style .='right: 20%; left: 20%';
    
$medical_care_custom_style .='} }';


}else if($medical_care_slider_content_alignment == 'CENTER-ALIGN'){

$medical_care_custom_style .='#slider .carousel-caption{';

	$medical_care_custom_style .='text-align:center; right: 15%; left: 15%;';

$medical_care_custom_style .='}';


}else if($medical_care_slider_content_alignment == 'RIGHT-ALIGN'){

$medical_care_custom_style .='#slider .carousel-caption{';

	$medical_care_custom_style .='text-align:right; right: 20%; left: 40%;';

$medical_care_custom_style .='}';

$medical_care_custom_style .='@media screen and (max-width:1199px){';

$medical_care_custom_style .='#slider .carousel-caption{';

    $medical_care_custom_style .='right: 20%; left: 30%';
    
$medical_care_custom_style .='} }';

$medical_care_custom_style .='@media screen and (max-width:991px){';

$medical_care_custom_style .='#slider .carousel-caption{';

    $medical_care_custom_style .='right: 20%; left: 20%';
    
$medical_care_custom_style .='} }';

}

//related products
if( get_option( 'medical_care_related_product',true) != 'on') {

$medical_care_custom_style .='.related.products{';

	$medical_care_custom_style .='display: none;';
	
$medical_care_custom_style .='}';
}

if( get_option( 'medical_care_related_product',true) != 'off') {

$medical_care_custom_style .='.related.products{';

	$medical_care_custom_style .='display: block;';
	
$medical_care_custom_style .='}';
}

// footer text alignment
$medical_care_footer_content_alignment = get_theme_mod( 'medical_care_footer_content_alignment','CENTER-ALIGN');

if($medical_care_footer_content_alignment == 'LEFT-ALIGN'){

$medical_care_custom_style .='.site-info{';

	$medical_care_custom_style .='text-align:left; padding-left: 30px;';

$medical_care_custom_style .='}';

$medical_care_custom_style .='.site-info a{';

	$medical_care_custom_style .='padding-left: 30px;';

$medical_care_custom_style .='}';


}else if($medical_care_footer_content_alignment == 'CENTER-ALIGN'){

$medical_care_custom_style .='.site-info{';

	$medical_care_custom_style .='text-align:center;';

$medical_care_custom_style .='}';


}else if($medical_care_footer_content_alignment == 'RIGHT-ALIGN'){

$medical_care_custom_style .='.site-info{';

	$medical_care_custom_style .='text-align:right; padding-right: 30px;';

$medical_care_custom_style .='}';

$medical_care_custom_style .='.site-info a{';

	$medical_care_custom_style .='padding-right: 30px;';

$medical_care_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('medical_care_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('medical_care_slider_button_show_hide', '1');

$medical_care_custom_style .= '#slider .getstarted-btn {';

if ($main_button_setting == 'off') {
    $medical_care_custom_style .= 'display: none;';
}

$medical_care_custom_style .= '}';

// Add media query for mobile devices
$medical_care_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $medical_care_custom_style .= '#slider .getstarted-btn { display: none; }';
}
$medical_care_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('medical_care_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('medical_care_scroll_enable', '1');

$medical_care_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $medical_care_custom_style .= 'display: none;';
}

$medical_care_custom_style .= '}';

// Add media query for mobile devices
$medical_care_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $medical_care_custom_style .= '.scrollup { display: none; }';
}
$medical_care_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('medical_care_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('medical_care_enable_breadcrumb', '1');

$medical_care_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $medical_care_custom_style .= 'display: none;';
}

$medical_care_custom_style .= '}';

// Add media query for mobile devices
$medical_care_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $medical_care_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$medical_care_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('medical_care_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('medical_care_single_enable_breadcrumb', '1');

$medical_care_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $medical_care_custom_style .= 'display: none;';
}

$medical_care_custom_style .= '}';

// Add media query for mobile devices
$medical_care_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $medical_care_custom_style .= '.single_breadcrumb { display: none; }';
}
$medical_care_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('medical_care_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('medical_care_woocommerce_enable_breadcrumb', '1');

$medical_care_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $medical_care_custom_style .= 'display: none;';
}

$medical_care_custom_style .= '}';

// Add media query for mobile devices
$medical_care_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $medical_care_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$medical_care_custom_style .= '}';


//colors
$color = get_theme_mod('medical_care_primary_color', '#29b6f6');
$color_secondary = get_theme_mod('medical_care_secondary_color', '#003153');
$color_service_bg = get_theme_mod('medical_care_service_bg', '#f3fbff');
$color_heading = get_theme_mod('medical_care_heading_color', '#000');
$color_text = get_theme_mod('medical_care_text_color', '#656566');
$color_fade = get_theme_mod('medical_care_primary_fade', '#ebf9ff');
$color_post_bg = get_theme_mod('medical_care_post_bg', '#ffffff');


$medical_care_custom_style .= ":root {";
    $medical_care_custom_style .= "--theme-primary-color: {$color};";
    $medical_care_custom_style .= "--theme-secondary-color: {$color_secondary};";
    $medical_care_custom_style .= "--theme-service-bg-color: {$color_service_bg};";
    $medical_care_custom_style .= "--theme-heading-color: {$color_heading};";
    $medical_care_custom_style .= "--theme-text-color: {$color_text};";
    $medical_care_custom_style .= "--theme-primary-fade: {$color_fade};";
    $medical_care_custom_style .= "--post-bg-color: {$color_post_bg};";
$medical_care_custom_style .= "}";

$medical_care_slider_opacity = get_theme_mod( 'medical_care_slider_opacity','0.7');

if($medical_care_slider_opacity == '0'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.1'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.1';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.2'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.2';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.3'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.3';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.4'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.4';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.5'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.5';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.6'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.6';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.7'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.7';
$medical_care_custom_style .='}';

}else if($medical_care_slider_opacity == '0.8'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.8';
$medical_care_custom_style .='}';

}
else if($medical_care_slider_opacity == '0.9'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 0.9';
$medical_care_custom_style .='}';

}
else if($medical_care_slider_opacity == '1'){
$medical_care_custom_style .='#slider img {';
    $medical_care_custom_style .='opacity: 1';
$medical_care_custom_style .='}';

}