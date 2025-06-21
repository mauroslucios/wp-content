<?php
/**
 * Beauty Salon Spa functions and definitions
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

//woocommerce//
//shop page no of columns
function beauty_salon_spa_woocommerce_loop_columns() {
	
	$retrun = get_theme_mod( 'beauty_salon_spa_archieve_item_columns', 3 );
    
    return $retrun;
}
add_filter( 'loop_shop_columns', 'beauty_salon_spa_woocommerce_loop_columns' );
function beauty_salon_spa_woocommerce_products_per_page() {

		$retrun = get_theme_mod( 'beauty_salon_spa_archieve_shop_perpage', 6 );
    
    return $retrun;
}
add_filter( 'loop_shop_per_page', 'beauty_salon_spa_woocommerce_products_per_page' );
// related products
function beauty_salon_spa_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => get_theme_mod( 'beauty_salon_spa_related_shop_perpage', 3 ),
        'columns'        => get_theme_mod( 'beauty_salon_spa_related_item_columns', 3),
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'beauty_salon_spa_related_products_args' );

// breadcrumb seperator
function beauty_salon_spa_woocommerce_breadcrumb_separator($beauty_salon_spa_defaults) {
    $beauty_salon_spa_separator = get_theme_mod('woocommerce_breadcrumb_separator', ' / ');

    // Update the separator
    $beauty_salon_spa_defaults['delimiter'] = $beauty_salon_spa_separator;

    return $beauty_salon_spa_defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'beauty_salon_spa_woocommerce_breadcrumb_separator');

//add animation class
if ( class_exists( 'WooCommerce' ) ) { 
	add_filter('post_class', function($beauty_salon_spa_classes, $class, $product_id) {
	    if( is_shop() || is_product_category() ){
	        
	        $beauty_salon_spa_classes = array_merge(['wow','zoomIn'], $beauty_salon_spa_classes);
	    }
	    return $beauty_salon_spa_classes;
	},10,3);
}
//woocommerce-end//

// Get start function

// Enqueue scripts and styles
function beauty_salon_spa_enqueue_admin_script($hook) {
    // Admin JS
    wp_enqueue_script('beauty-salon-spa-admin-js', get_theme_file_uri('/assets/js/beauty-salon-spa-admin.js'), array('jquery'), true);
    wp_localize_script(
		'beauty-salon-spa-admin-js',
		'beauty_salon_spa',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('beauty_salon_spa_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('beauty-salon-spa-admin-js');

    wp_localize_script( 'beauty-salon-spa-admin-js', 'beauty_salon_spa_scripts_localize',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action('admin_enqueue_scripts', 'beauty_salon_spa_enqueue_admin_script');

//dismiss function 
add_action( 'wp_ajax_beauty_salon_spa_dismissed_notice_handler', 'beauty_salon_spa_ajax_notice_dismiss_fuction' );

function beauty_salon_spa_ajax_notice_dismiss_fuction() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'beauty_salon_spa_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

//get start box
function beauty_salon_spa_custom_admin_notice() {
    // Check if the notice is dismissed
    if ( ! get_option('dismissed-get_started_notice', FALSE ) )  {
        // Check if not on the theme documentation page
        $beauty_salon_spa_current_screen = get_current_screen();
        if ($beauty_salon_spa_current_screen && $beauty_salon_spa_current_screen->id !== 'appearance_page_beauty-salon-spa-guide-page') {
            $beauty_salon_spa_theme = wp_get_theme();
            ?>
            <div class="notice notice-info is-dismissible" data-notice="get_started_notice">
                <div class="notice-div">
                    <div>
                        <p class="theme-name"><?php echo esc_html($beauty_salon_spa_theme->get('Name')); ?></p>
                        <p><?php _e('For information and detailed instructions, check out our theme documentation.', 'beauty-salon-spa'); ?></p>
                    </div>
                    <div class="notice-buttons-box">
                        <a class="button-primary livedemo" href="<?php echo esc_url( BEAUTY_SALON_SPA_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'beauty-salon-spa'); ?></a>
                        <a class="button-primary buynow" href="<?php echo esc_url( BEAUTY_SALON_SPA_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'beauty-salon-spa'); ?></a>
                        <a class="button-primary theme-install" href="themes.php?page=beauty-salon-spa-guide-page"><?php _e('Begin Installation', 'beauty-salon-spa'); ?></a> 
                    </div>
                </div>
            </div>
        <?php
        }
    }
}
add_action('admin_notices', 'beauty_salon_spa_custom_admin_notice');

//after switch theme
add_action('after_switch_theme', 'beauty_salon_spa_after_switch_theme');
function beauty_salon_spa_after_switch_theme () {
    update_option('dismissed-get_started_notice', FALSE );
}
//get-start-function-end//

// tag count
function beauty_salon_spa_display_post_tag_count() {
    $beauty_salon_spa_tags = get_the_tags();
    $beauty_salon_spa_tag_count = ($beauty_salon_spa_tags) ? count($beauty_salon_spa_tags) : 0;
    $beauty_salon_spa_tag_text = ($beauty_salon_spa_tag_count === 1) ? 'tag' : 'tags';
    echo $beauty_salon_spa_tag_count . ' ' . $beauty_salon_spa_tag_text;
}

//media post format
function beauty_salon_spa_get_media($beauty_salon_spa_type = array()){
	$beauty_salon_spa_content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get media from the content if a playlist isn't present.
  if ( false === strpos( $beauty_salon_spa_content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $beauty_salon_spa_content, $beauty_salon_spa_type );
    return $output;
  }
}

// front page template
function beauty_salon_spa_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'beauty_salon_spa_front_page_template' );

// excerpt function
function beauty_salon_spa_custom_excerpt() {
    $beauty_salon_spa_excerpt = get_the_excerpt();
    $beauty_salon_spa_plain_text_excerpt = wp_strip_all_tags($beauty_salon_spa_excerpt);
    
    // Get dynamic word limit from theme mod
    $beauty_salon_spa_word_limit = esc_attr(get_theme_mod('beauty_salon_spa_post_excerpt', '30'));
    
    // Limit the number of words
    $beauty_salon_spa_limited_excerpt = implode(' ', array_slice(explode(' ', $beauty_salon_spa_plain_text_excerpt), 0, $beauty_salon_spa_word_limit));

    echo esc_html($beauty_salon_spa_limited_excerpt);
}

// typography
function beauty_salon_spa_fonts_scripts() {
	$beauty_salon_spa_headings_font = esc_html(get_theme_mod('beauty_salon_spa_headings_text'));
	$beauty_salon_spa_body_font = esc_html(get_theme_mod('beauty_salon_spa_body_text'));

	if( $beauty_salon_spa_headings_font ) {
		wp_enqueue_style( 'beauty-salon-spa-headings-fonts', '//fonts.googleapis.com/css?family='. $beauty_salon_spa_headings_font );
	} else {
		wp_enqueue_style( 'beauty-salon-spa-playfair-sans', '//fonts.googleapis.com/css?family=Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900');
	}
	if( $beauty_salon_spa_body_font ) {
		wp_enqueue_style( 'beauty-salon-spa-body-fonts', '//fonts.googleapis.com/css?family='. $beauty_salon_spa_body_font );
	} else {
		wp_enqueue_style( 'beauty-salon-spa-jost-body', '//fonts.googleapis.com/css?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'beauty_salon_spa_fonts_scripts' );

// Footer Text
function beauty_salon_spa_copyright_link() {
    $beauty_salon_spa_footer_text = get_theme_mod('beauty_salon_spa_footer_text', esc_html__('Salon WordPress Theme', 'beauty-salon-spa'));
    $beauty_salon_spa_credit_link = esc_url('https://www.ovationthemes.com/products/free-salon-wordpress-theme');

    echo '<a href="' . $beauty_salon_spa_credit_link . '" target="_blank">' . esc_html($beauty_salon_spa_footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'beauty-salon-spa') . '</span></a>';
}

// custom sanitizations
// dropdown
function beauty_salon_spa_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
// slider custom control
if ( ! function_exists( 'beauty_salon_spa_sanitize_integer' ) ) {
	function beauty_salon_spa_sanitize_integer( $input ) {
		return (int) $input;
	}
}
// range contol
function beauty_salon_spa_sanitize_number_absint( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
// select post page
function beauty_salon_spa_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
// toggle switch
function beauty_salon_spa_callback_sanitize_switch( $value ) {
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );
}
//choices control
function beauty_salon_spa_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
// phone number
function beauty_salon_spa_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}
// Sanitize Sortable control.
function beauty_salon_spa_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

// theme setup
function beauty_salon_spa_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'beauty-salon-spa-featured-image', 2000, 1200, true );
	add_image_size( 'beauty-salon-spa-thumbnail-avatar', 100, 100, true );

	define( 'THEME_DIR', dirname( __FILE__ ) );

	load_theme_textdomain( 'beauty-salon-spa', get_template_directory() . '/languages' );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beauty-salon-spa' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio','quote',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', beauty_salon_spa_fonts_url() ) );
}
add_action( 'after_setup_theme', 'beauty_salon_spa_setup' );

// widgets
function beauty_salon_spa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'beauty-salon-spa' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'beauty-salon-spa' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'beauty-salon-spa' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'beauty-salon-spa' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'beauty-salon-spa' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'beauty-salon-spa' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'beauty-salon-spa' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'beauty-salon-spa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'beauty_salon_spa_widgets_init' );

// google fonts
function beauty_salon_spa_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$beauty_salon_spa_query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($beauty_salon_spa_query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function beauty_salon_spa_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'beauty-salon-spa-fonts', beauty_salon_spa_fonts_url(), array() );

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'beauty-salon-spa-style', get_stylesheet_uri() );

	// rtl
	wp_style_add_data('beauty-salon-spa-style', 'rtl', 'replace');

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'beauty-salon-spa-style',$beauty_salon_spa_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	//owl-carousel
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css' );

	// Block Style
	wp_enqueue_style( 'beauty-salon-spa-block-style',get_template_directory_uri().'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'beauty-salon-spa-custom.js', get_theme_file_uri( '/assets/js/theme-script.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'beauty-salon-spa-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	//Owl-carousel JS
	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (get_option('beauty_salon_spa_animation_enable', false) !== 'off') {
		//wow.js
		wp_enqueue_script( 'beauty-salon-spa-wow-js', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), true );

		//animate.css
		wp_enqueue_style( 'beauty-salon-spa-animate-css', get_template_directory_uri().'/assets/css/animate.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'beauty_salon_spa_scripts' );

// Enqueue editor styles for Gutenberg
function beauty_salon_spa_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'beauty-salon-spa-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'beauty-salon-spa-fonts', beauty_salon_spa_fonts_url(), array() );
}
add_action( 'enqueue_block_editor_assets', 'beauty_salon_spa_block_editor_styles' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'beauty_salon_spa_customize_controls_register_scripts' );

function beauty_salon_spa_customize_controls_register_scripts() {
	wp_enqueue_style( 'beauty-salon-spa-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}

// enque files
require get_parent_theme_file_path( '/inc/custom-header.php' );
require get_parent_theme_file_path( '/inc/template-tags.php' );
require get_parent_theme_file_path( '/inc/template-functions.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );
require get_parent_theme_file_path( '/inc/typofont.php' );
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
require get_parent_theme_file_path( '/inc/breadcrumb.php' );
require get_parent_theme_file_path( 'inc/sortable/sortable_control.php' );
require get_template_directory() .'/inc/TGM/tgm.php';