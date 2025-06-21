<?php 
$beauty_salon_spa_custom_style= "";

/*-------------------------Slider-content-alignment-------------------*/

$barbershop_nail_salon_slider_content_alignment = get_theme_mod( 'barbershop_nail_salon_slider_content_alignment','CENTER-ALIGN');

if($barbershop_nail_salon_slider_content_alignment == 'LEFT-ALIGN'){

$beauty_salon_spa_custom_style .='#slider .carousel-caption{';

	$beauty_salon_spa_custom_style .='text-align:left; right: 55%; left: 15%;';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='@media screen and (max-width:1199px){';

$beauty_salon_spa_custom_style .='#slider .carousel-caption{';

    $beauty_salon_spa_custom_style .='right: 30%; left: 15%';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (max-width:991px){';

$beauty_salon_spa_custom_style .='#slider .carousel-caption{';

    $beauty_salon_spa_custom_style .='right: 15%; left: 15%';
    
$beauty_salon_spa_custom_style .='} }';


}else if($barbershop_nail_salon_slider_content_alignment == 'CENTER-ALIGN'){

$beauty_salon_spa_custom_style .='#slider .carousel-caption{';

	$beauty_salon_spa_custom_style .='text-align:center; right: 20%; left: 20%;';

$beauty_salon_spa_custom_style .='}';


}else if($barbershop_nail_salon_slider_content_alignment == 'RIGHT-ALIGN'){

$beauty_salon_spa_custom_style .='#slider .carousel-caption{';

	$beauty_salon_spa_custom_style .='text-align:right; right: 15%; left: 55%;';

$beauty_salon_spa_custom_style .='}';

$beauty_salon_spa_custom_style .='@media screen and (max-width:1199px){';

$beauty_salon_spa_custom_style .='#slider .carousel-caption{';

    $beauty_salon_spa_custom_style .='right: 15%; left: 30%';
    
$beauty_salon_spa_custom_style .='} }';

$beauty_salon_spa_custom_style .='@media screen and (max-width:991px){';

$beauty_salon_spa_custom_style .='#slider .carousel-caption{';

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
    $beauty_salon_spa_custom_style .= 'position: fixed; background: var(--theme-primary-fade);';
    $beauty_salon_spa_custom_style .= '}';

    $beauty_salon_spa_custom_style .= '.admin-bar .fixed {';
    $beauty_salon_spa_custom_style .= ' margin-top: 32px;';
    $beauty_salon_spa_custom_style .= '}';
}

//colors
$color = get_theme_mod('barbershop_nail_salon_primary_color', '#541f5c');
$color_text = get_theme_mod('barbershop_nail_salon_text_color', '#696969');
$color_secondary = get_theme_mod('barbershop_nail_salon_secondary', '#e782a0');
$color_fade = get_theme_mod('barbershop_nail_salon_primary_fade', '#ffeff4');
$color_footer_bg = get_theme_mod('barbershop_nail_salon_footer_bg', '#541f5c');



$beauty_salon_spa_custom_style .= ":root {";
    $beauty_salon_spa_custom_style .= "--theme-primary-color: {$color};";
    $beauty_salon_spa_custom_style .= "--theme-text-color: {$color_text};";
    $beauty_salon_spa_custom_style .= "---theme-secondary-color: {$color_secondary};";
    $beauty_salon_spa_custom_style .= "--theme-primary-fade: {$color_fade};";
    $beauty_salon_spa_custom_style .= "--theme-footer-color: {$color_footer_bg};";

$beauty_salon_spa_custom_style .= "}";


$beauty_salon_spa_slider_opacity = get_theme_mod( 'barbershop_nail_salon_slider_opacity','0.5');

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