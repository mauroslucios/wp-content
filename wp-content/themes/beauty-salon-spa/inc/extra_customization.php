<?php

$beauty_salon_spa_custom_style= "";

/*---------------------------Width -------------------*/

$beauty_salon_spa_theme_width = get_theme_mod( 'beauty_salon_spa_width_options','full_width');

if($beauty_salon_spa_theme_width == 'full_width'){

$beauty_salon_spa_custom_style .='body{';

	$beauty_salon_spa_custom_style .='max-width: 100%;';

$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_theme_width == 'Container'){

$beauty_salon_spa_custom_style .='body{';

	$beauty_salon_spa_custom_style .='width: 100%; padding-right: 15px; padding-left: 15px;  margin-right: auto !important; margin-left: auto !important;';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='@media screen and (min-width: 601px){';

$beauty_salon_spa_custom_style .='body{';

    $beauty_salon_spa_custom_style .='max-width: 720px;';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (min-width: 992px){';

$beauty_salon_spa_custom_style .='body{';

    $beauty_salon_spa_custom_style .='max-width: 960px;';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (min-width: 1200px){';

$beauty_salon_spa_custom_style .='body{';

    $beauty_salon_spa_custom_style .='max-width: 1140px;';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (min-width: 1400px){';

$beauty_salon_spa_custom_style .='body{';

    $beauty_salon_spa_custom_style .='max-width: 1320px;';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (max-width:600px){';

$beauty_salon_spa_custom_style .='body{';

    $beauty_salon_spa_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='body{';

	$beauty_salon_spa_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto !important; margin-left: auto !important;';

$beauty_salon_spa_custom_style .='}';


}else if($beauty_salon_spa_theme_width == 'container_fluid'){

$beauty_salon_spa_custom_style .='body{';

	$beauty_salon_spa_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='@media screen and (max-width:600px){';

$beauty_salon_spa_custom_style .='body{';

    $beauty_salon_spa_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='.page-template-custom-home-page .menu_header{';

	$beauty_salon_spa_custom_style .='position:static;';

$beauty_salon_spa_custom_style .='}';
}

// logo- max-height

$beauty_salon_spa_logo_max_height = get_theme_mod('beauty_salon_spa_logo_max_height','100');

if($beauty_salon_spa_logo_max_height != false){

$beauty_salon_spa_custom_style .='.custom-logo-link img{';

	$beauty_salon_spa_custom_style .='max-height: '.esc_html($beauty_salon_spa_logo_max_height).'px;';

$beauty_salon_spa_custom_style .='}';
}

/*---------------------------Scroll-top-position -------------------*/

$beauty_salon_spa_scroll_options = get_theme_mod( 'beauty_salon_spa_scroll_options','right_align');

if($beauty_salon_spa_scroll_options == 'right_align'){

$beauty_salon_spa_custom_style .='.scroll-top button{';

	$beauty_salon_spa_custom_style .='';

$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_scroll_options == 'center_align'){

$beauty_salon_spa_custom_style .='.scroll-top button{';

	$beauty_salon_spa_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_scroll_options == 'left_align'){

$beauty_salon_spa_custom_style .='.scroll-top button{';

	$beauty_salon_spa_custom_style .='right: auto; left:5%; margin: 0 auto';

$beauty_salon_spa_custom_style .='}';
}

/*---------------------------text-transform-------------------*/

$beauty_salon_spa_text_transform = get_theme_mod( 'beauty_salon_spa_menu_text_transform','UPPERCASE');
if($beauty_salon_spa_text_transform == 'CAPITALISE'){

$beauty_salon_spa_custom_style .='nav#top_gb_menu ul li a{';

	$beauty_salon_spa_custom_style .='text-transform: capitalize ; font-size: 14px;';

$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_text_transform == 'UPPERCASE'){

$beauty_salon_spa_custom_style .='nav#top_gb_menu ul li a{';

	$beauty_salon_spa_custom_style .='text-transform: uppercase ; font-size: 14px;';

$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_text_transform == 'LOWERCASE'){

$beauty_salon_spa_custom_style .='nav#top_gb_menu ul li a{';

	$beauty_salon_spa_custom_style .='text-transform: lowercase ; font-size: 14px;';

$beauty_salon_spa_custom_style .='}';
}

/*-------------------------Slider-content-alignment-------------------*/

$beauty_salon_spa_slider_content_alignment = get_theme_mod( 'beauty_salon_spa_slider_content_alignment','LEFT-ALIGN');

if($beauty_salon_spa_slider_content_alignment == 'LEFT-ALIGN'){

$beauty_salon_spa_custom_style .='.slider-inner{';

	$beauty_salon_spa_custom_style .='text-align:left; right: 55%; left: 15%;';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='@media screen and (max-width:1199px){';

$beauty_salon_spa_custom_style .='.slider-inner{';

    $beauty_salon_spa_custom_style .='right: 30%; left: 15%';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (max-width:991px){';

$beauty_salon_spa_custom_style .='.slider-inner{';

    $beauty_salon_spa_custom_style .='right: 15%; left: 15%';
    
$beauty_salon_spa_custom_style .='} }';


}else if($beauty_salon_spa_slider_content_alignment == 'CENTER-ALIGN'){

$beauty_salon_spa_custom_style .='.slider-inner{';

	$beauty_salon_spa_custom_style .='text-align:center; right: 15%; left: 15%';

$beauty_salon_spa_custom_style .='}';


}else if($beauty_salon_spa_slider_content_alignment == 'RIGHT-ALIGN'){

$beauty_salon_spa_custom_style .='.slider-inner{';

	$beauty_salon_spa_custom_style .='text-align:right; right: 15%; left: 55%';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='@media screen and (max-width:1199px){';

$beauty_salon_spa_custom_style .='.slider-inner{';

    $beauty_salon_spa_custom_style .='right: 15%; left: 30%';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (max-width:991px){';

$beauty_salon_spa_custom_style .='.slider-inner{';

    $beauty_salon_spa_custom_style .='right: 15%; left: 15%';
    
$beauty_salon_spa_custom_style .='} }';

}
// sticky header
if (false === get_option('beauty_salon_spa_sticky_header')) {
    add_option('beauty_salon_spa_sticky_header', 'off');
}

// Define the custom CSS based on the 'beauty_salon_spa_sticky_header' option

if (get_option('beauty_salon_spa_sticky_header', 'off') !== 'on') {
    $beauty_salon_spa_custom_style .= '.fixed_header.fixed {';
    $beauty_salon_spa_custom_style .= 'position: static; ';
    $beauty_salon_spa_custom_style .= '}';
}

if (get_option('beauty_salon_spa_sticky_header', 'off') !== 'off') {
    $beauty_salon_spa_custom_style .= '.fixed_header.fixed {';
    $beauty_salon_spa_custom_style .= 'position: fixed; background: var(--theme-primary-color); padding: 10px 0;';
    $beauty_salon_spa_custom_style .= '}';

    $beauty_salon_spa_custom_style .= '.admin-bar .fixed {';
    $beauty_salon_spa_custom_style .= ' margin-top: 32px;';
    $beauty_salon_spa_custom_style .= '}';
}

//related products
if( get_option( 'beauty_salon_spa_related_product',true) != 'on') {

$beauty_salon_spa_custom_style .='.related.products{';

	$beauty_salon_spa_custom_style .='display: none;';
	
$beauty_salon_spa_custom_style .='}';
}

if( get_option( 'beauty_salon_spa_related_product',true) != 'off') {

$beauty_salon_spa_custom_style .='.related.products{';

	$beauty_salon_spa_custom_style .='display: block;';
	
$beauty_salon_spa_custom_style .='}';
}

// footer text alignment
$beauty_salon_spa_footer_content_alignment = get_theme_mod( 'beauty_salon_spa_footer_content_alignment','CENTER-ALIGN');

if($beauty_salon_spa_footer_content_alignment == 'LEFT-ALIGN'){

$beauty_salon_spa_custom_style .='.site-info{';

	$beauty_salon_spa_custom_style .='text-align:left; padding-left: 30px;';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='.site-info a{';

	$beauty_salon_spa_custom_style .='padding-left: 30px;';

$beauty_salon_spa_custom_style .='}';


}else if($beauty_salon_spa_footer_content_alignment == 'CENTER-ALIGN'){

$beauty_salon_spa_custom_style .='.site-info{';

	$beauty_salon_spa_custom_style .='text-align:center;';

$beauty_salon_spa_custom_style .='}';


}else if($beauty_salon_spa_footer_content_alignment == 'RIGHT-ALIGN'){

$beauty_salon_spa_custom_style .='.site-info{';

	$beauty_salon_spa_custom_style .='text-align:right; padding-right: 30px;';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='.site-info a{';

	$beauty_salon_spa_custom_style .='padding-right: 30px;';

$beauty_salon_spa_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('beauty_salon_spa_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('beauty_salon_spa_slider_button_show_hide', '1');

$beauty_salon_spa_custom_style .= '#slider .home-btn {';

if ($main_button_setting == 'off') {
    $beauty_salon_spa_custom_style .= 'display: none;';
}

$beauty_salon_spa_custom_style .= '}';

// Add media query for mobile devices
$beauty_salon_spa_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $beauty_salon_spa_custom_style .= '#slider .home-btn { display: none; }';
}
$beauty_salon_spa_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('beauty_salon_spa_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('beauty_salon_spa_scroll_enable', '1');

$beauty_salon_spa_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $beauty_salon_spa_custom_style .= 'display: none;';
}

$beauty_salon_spa_custom_style .= '}';

// Add media query for mobile devices
$beauty_salon_spa_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $beauty_salon_spa_custom_style .= '.scrollup { display: none; }';
}
$beauty_salon_spa_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('beauty_salon_spa_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('beauty_salon_spa_enable_breadcrumb', '1');

$beauty_salon_spa_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $beauty_salon_spa_custom_style .= 'display: none;';
}

$beauty_salon_spa_custom_style .= '}';

// Add media query for mobile devices
$beauty_salon_spa_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $beauty_salon_spa_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$beauty_salon_spa_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('beauty_salon_spa_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('beauty_salon_spa_single_enable_breadcrumb', '1');

$beauty_salon_spa_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $beauty_salon_spa_custom_style .= 'display: none;';
}

$beauty_salon_spa_custom_style .= '}';

// Add media query for mobile devices
$beauty_salon_spa_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $beauty_salon_spa_custom_style .= '.single_breadcrumb { display: none; }';
}
$beauty_salon_spa_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('beauty_salon_spa_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('beauty_salon_spa_woocommerce_enable_breadcrumb', '1');

$beauty_salon_spa_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $beauty_salon_spa_custom_style .= 'display: none;';
}

$beauty_salon_spa_custom_style .= '}';

// Add media query for mobile devices
$beauty_salon_spa_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $beauty_salon_spa_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$beauty_salon_spa_custom_style .= '}';

//colors
$color = get_theme_mod('beauty_salon_spa_primary_color', '#639edb');
$color_heading = get_theme_mod('beauty_salon_spa_heading_color', '#232323');
$color_text = get_theme_mod('beauty_salon_spa_text_color', '#63646d');
$color_fade = get_theme_mod('beauty_salon_spa_primary_fade', '#dcedff');
$color_footer_bg = get_theme_mod('beauty_salon_spa_footer_bg', '#232323');
$color_post_bg = get_theme_mod('beauty_salon_spa_post_bg', '#ffffff');


$beauty_salon_spa_custom_style .= ":root {";
    $beauty_salon_spa_custom_style .= "--theme-primary-color: {$color};";
    $beauty_salon_spa_custom_style .= "--theme-heading-color: {$color_heading};";
    $beauty_salon_spa_custom_style .= "--theme-text-color: {$color_text};";
    $beauty_salon_spa_custom_style .= "--theme-primary-fade: {$color_fade};";
    $beauty_salon_spa_custom_style .= "--theme-footer-color: {$color_footer_bg};";
    $beauty_salon_spa_custom_style .= "--post-bg-color: {$color_post_bg};";
$beauty_salon_spa_custom_style .= "}";

$beauty_salon_spa_slider_opacity = get_theme_mod( 'beauty_salon_spa_slider_opacity','1');

if($beauty_salon_spa_slider_opacity == '0'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.1'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.1';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.2'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.2';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.3'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.3';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.4'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.4';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.5'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.5';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.6'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.6';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.7'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.7';
$beauty_salon_spa_custom_style .='}';

}else if($beauty_salon_spa_slider_opacity == '0.8'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.8';
$beauty_salon_spa_custom_style .='}';

}
else if($beauty_salon_spa_slider_opacity == '0.9'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 0.9';
$beauty_salon_spa_custom_style .='}';

}
else if($beauty_salon_spa_slider_opacity == '1'){
$beauty_salon_spa_custom_style .='#slider img {';
    $beauty_salon_spa_custom_style .='opacity: 1';
$beauty_salon_spa_custom_style .='}';

}