<?php

    $hospital_management_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $hospital_management_scroll_position = get_theme_mod( 'hospital_management_scroll_top_position','Right');
    if($hospital_management_scroll_position == 'Right'){
        $hospital_management_theme_css .='#button{';
            $hospital_management_theme_css .='right: 20px;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_scroll_position == 'Left'){
        $hospital_management_theme_css .='#button{';
            $hospital_management_theme_css .='left: 20px;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_scroll_position == 'Center'){
        $hospital_management_theme_css .='#button{';
            $hospital_management_theme_css .='right: 50%;left: 50%;';
        $hospital_management_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $hospital_management_single_post_page_image_box_shadow = get_theme_mod('hospital_management_single_post_page_image_box_shadow',0);
    if($hospital_management_single_post_page_image_box_shadow != false){
        $hospital_management_theme_css .='.single-post .entry-header img{';
            $hospital_management_theme_css .='box-shadow: '.esc_attr($hospital_management_single_post_page_image_box_shadow).'px '.esc_attr($hospital_management_single_post_page_image_box_shadow).'px '.esc_attr($hospital_management_single_post_page_image_box_shadow).'px #cccccc;';
        $hospital_management_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $hospital_management_single_post_page_image_border_radius = get_theme_mod('hospital_management_single_post_page_image_border_radius', 0);
    if($hospital_management_single_post_page_image_border_radius != false){
        $hospital_management_theme_css .='.single-post .entry-header img{';
            $hospital_management_theme_css .='border-radius: '.esc_attr($hospital_management_single_post_page_image_border_radius).'px;';
        $hospital_management_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $hospital_management_footer_bg_image = get_theme_mod('hospital_management_footer_bg_image');
    if($hospital_management_footer_bg_image != false){
        $hospital_management_theme_css .='#colophon{';
            $hospital_management_theme_css .='background: url('.esc_attr($hospital_management_footer_bg_image).')!important;';
        $hospital_management_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $hospital_management_footer_bg_image_position = get_theme_mod( 'hospital_management_footer_bg_image_position','scroll');
    if($hospital_management_footer_bg_image_position == 'fixed'){
        $hospital_management_theme_css .='#colophon{';
            $hospital_management_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $hospital_management_theme_css .='}';
    }elseif ($hospital_management_footer_bg_image_position == 'scroll'){
        $hospital_management_theme_css .='#colophon{';
            $hospital_management_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $hospital_management_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $hospital_management_footer_widget_heading_alignment = get_theme_mod( 'hospital_management_footer_widget_heading_alignment','Left');
    if($hospital_management_footer_widget_heading_alignment == 'Left'){
        $hospital_management_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $hospital_management_theme_css .='text-align: left;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_footer_widget_heading_alignment == 'Center'){
        $hospital_management_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $hospital_management_theme_css .='text-align: center;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_footer_widget_heading_alignment == 'Right'){
        $hospital_management_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $hospital_management_theme_css .='text-align: right;';
        $hospital_management_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $hospital_management_footer_widget_content_alignment = get_theme_mod( 'hospital_management_footer_widget_content_alignment','Left');
    if($hospital_management_footer_widget_content_alignment == 'Left'){
        $hospital_management_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $hospital_management_theme_css .='text-align: left;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_footer_widget_content_alignment == 'Center'){
        $hospital_management_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $hospital_management_theme_css .='text-align: center;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_footer_widget_content_alignment == 'Right'){
        $hospital_management_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $hospital_management_theme_css .='text-align: right;';
        $hospital_management_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $hospital_management_copyright_content_alignment = get_theme_mod( 'hospital_management_copyright_content_alignment','Right');
    if($hospital_management_copyright_content_alignment == 'Left'){
        $hospital_management_theme_css .='.footer-menu-left{';
        $hospital_management_theme_css .='text-align: left;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_copyright_content_alignment == 'Center'){
        $hospital_management_theme_css .='.footer-menu-left{';
            $hospital_management_theme_css .='text-align: center;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_copyright_content_alignment == 'Right'){
        $hospital_management_theme_css .='.footer-menu-left{';
            $hospital_management_theme_css .='text-align: right;';
        $hospital_management_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $hospital_management_width_option = get_theme_mod( 'hospital_management_width_option','Full Width');
    if($hospital_management_width_option == 'Boxed Width'){
        $hospital_management_theme_css .='body{';
            $hospital_management_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $hospital_management_theme_css .='}';
        $hospital_management_theme_css .='.scrollup i{';
            $hospital_management_theme_css .='right: 100px;';
        $hospital_management_theme_css .='}';
        $hospital_management_theme_css .='.page-template-custom-home-page .home-page-header{';
            $hospital_management_theme_css .='padding: 0px 40px 0 10px;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_width_option == 'Wide Width'){
        $hospital_management_theme_css .='body{';
            $hospital_management_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $hospital_management_theme_css .='}';
        $hospital_management_theme_css .='.scrollup i{';
            $hospital_management_theme_css .='right: 30px;';
        $hospital_management_theme_css .='}';
    }else if($hospital_management_width_option == 'Full Width'){
        $hospital_management_theme_css .='body{';
            $hospital_management_theme_css .='max-width: 100%;';
        $hospital_management_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $hospital_management_nav_menu = get_theme_mod( 'hospital_management_nav_menu_text_transform','Capitalize');
    if($hospital_management_nav_menu == 'Capitalize'){
        $hospital_management_theme_css .='.main-navigation .menu > li > a{';
            $hospital_management_theme_css .='text-transform:Capitalize;';
        $hospital_management_theme_css .='}';
    }
    if($hospital_management_nav_menu == 'Lowercase'){
        $hospital_management_theme_css .='.main-navigation .menu > li > a{';
            $hospital_management_theme_css .='text-transform:Lowercase;';
        $hospital_management_theme_css .='}';
    }
    if($hospital_management_nav_menu == 'Uppercase'){
        $hospital_management_theme_css .='.main-navigation .menu > li > a{';
            $hospital_management_theme_css .='text-transform:Uppercase;';
        $hospital_management_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $hospital_management_global_color = get_theme_mod('hospital_management_global_color');

    if($hospital_management_global_color != false){
        $hospital_management_theme_css .='#button, .top-info, .search-form-main input.search-submit, #top-slider .slide-btn a, .feature-box, .sidebar input[type="submit"], .sidebar button[type="submit"], a.btn-text, span.onsale, .pro-button a, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt,.woocommerce a.added_to_cart, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, .comment-respond input#submit, #colophon, .sidebar h5, .sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover{';
            $hospital_management_theme_css .='background-color: '.esc_attr($hospital_management_global_color).';';
        $hospital_management_theme_css .='}';
    }

    if($hospital_management_global_color != false){
        $hospital_management_theme_css .='.slider-inner-box h2, .service-icon i, #site-navigation .menu ul li a:hover, .article-box h3 a, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .widget a:hover, .widget a:focus, .sidebar ul li a:hover{';
            $hospital_management_theme_css .='color: '.esc_attr($hospital_management_global_color).';';
        $hospital_management_theme_css .='}';
    }

    if($hospital_management_global_color != false){
        $hospital_management_theme_css .='.postcat-name{';
            $hospital_management_theme_css .='color: '.esc_attr($hospital_management_global_color).' !important;';
        $hospital_management_theme_css .='}';
    }

    if($hospital_management_global_color != false){
        $hospital_management_theme_css .='.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover{';
            $hospital_management_theme_css .='border-color: '.esc_attr($hospital_management_global_color).';';
        $hospital_management_theme_css .='}';
    }

    if($hospital_management_global_color != false){
        $hospital_management_theme_css .='.woocommerce-message, .woocommerce-info{';
            $hospital_management_theme_css .='border-top-color: '.esc_attr($hospital_management_global_color).';';
        $hospital_management_theme_css .='}';
    }

    $hospital_management_theme_css .='@media screen and (max-width:1000px) {';
        if($hospital_management_global_color != false){
            $hospital_management_theme_css .='.toggle-nav i, .sidenav .closebtn{
            background: '.esc_attr($hospital_management_global_color).';
            }';
        }
    $hospital_management_theme_css .='}';

    /*-------------------- Heading typography -------------------*/

    $hospital_management_heading_color = get_theme_mod('hospital_management_heading_color');
    $hospital_management_heading_font_family = get_theme_mod('hospital_management_heading_font_family');
    $hospital_management_heading_font_size = get_theme_mod('hospital_management_heading_font_size');
    if($hospital_management_heading_color != false || $hospital_management_heading_font_family != false || $hospital_management_heading_font_size != false){
        $hospital_management_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #colophon h5, .sidebar h5, .article-box h3.entry-title, .slider-inner-box h2, #top-slider .slider-inner-box h3, .featured h3.main-heading, .service-sec h3.main-heading, .ser-content h4 a, .slider-inner-box h1 a {';
            $hospital_management_theme_css .='color: '.esc_attr($hospital_management_heading_color).'!important; 
            font-family: '.esc_attr($hospital_management_heading_font_family).'!important;
            font-size: '.esc_attr($hospital_management_heading_font_size).'px !important;';
        $hospital_management_theme_css .='}';
    }

    $hospital_management_paragraph_color = get_theme_mod('hospital_management_paragraph_color');
    $hospital_management_paragraph_font_family = get_theme_mod('hospital_management_paragraph_font_family');
    $hospital_management_paragraph_font_size = get_theme_mod('hospital_management_paragraph_font_size');
    if($hospital_management_paragraph_color != false || $hospital_management_paragraph_font_family != false || $hospital_management_paragraph_font_size != false){
        $hospital_management_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $hospital_management_theme_css .='color: '.esc_attr($hospital_management_paragraph_color).'!important; 
            font-family: '.esc_attr($hospital_management_paragraph_font_family).'!important;
            font-size: '.esc_attr($hospital_management_paragraph_font_size).'px !important;';
        $hospital_management_theme_css .='}';
    }