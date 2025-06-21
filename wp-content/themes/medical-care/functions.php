<?php
/**
 * Medical Care functions and definitions
 *
 * @subpackage Medical Care
 * @since 1.0
 */

//woocommerce//
//shop page no of columns
function medical_care_woocommerce_loop_columns() {
	
	$retrun = get_theme_mod( 'medical_care_archieve_item_columns', 3 );
    
    return $retrun;
}
add_filter( 'loop_shop_columns', 'medical_care_woocommerce_loop_columns' );
function medical_care_woocommerce_products_per_page() {

		$retrun = get_theme_mod( 'medical_care_archieve_shop_perpage', 6 );
    
    return $retrun;
}
add_filter( 'loop_shop_per_page', 'medical_care_woocommerce_products_per_page' );
// related products
function medical_care_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => get_theme_mod( 'medical_care_related_shop_perpage', 3 ),
        'columns'        => get_theme_mod( 'medical_care_related_item_columns', 3),
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'medical_care_related_products_args' );

// breadcrumb seperator
function medical_care_woocommerce_breadcrumb_separator($medical_care_defaults) {
    $medical_care_separator = get_theme_mod('woocommerce_breadcrumb_separator', ' / ');

    // Update the separator
    $medical_care_defaults['delimiter'] = $medical_care_separator;

    return $medical_care_defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'medical_care_woocommerce_breadcrumb_separator');

//add animation class
if ( class_exists( 'WooCommerce' ) ) { 
	add_filter('post_class', function($medical_care_classes, $class, $product_id) {
	    if( is_shop() || is_product_category() ){
	        
	        $medical_care_classes = array_merge(['wow','zoomIn'], $medical_care_classes);
	    }
	    return $medical_care_classes;
	},10,3);
}
//woocommerce-end//

// Get start function

// Enqueue scripts and styles
function medical_care_enqueue_admin_script($hook) {
    // Admin JS
    wp_enqueue_script('medical-care-admin-js', get_theme_file_uri('/assets/js/medical-care-admin.js'), array('jquery'), true);
    wp_localize_script(
		'medical-care-admin-js',
		'medical_care',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('medical_care_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('medical-care-admin-js');

    wp_localize_script( 'medical-care-admin-js', 'medical_care_scripts_localize',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action('admin_enqueue_scripts', 'medical_care_enqueue_admin_script');

//dismiss function 
add_action( 'wp_ajax_medical_care_dismissed_notice_handler', 'medical_care_ajax_notice_dismiss_fuction' );

function medical_care_ajax_notice_dismiss_fuction() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'medical_care_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

//get start box
function medical_care_custom_admin_notice() {
    // Check if the notice is dismissed
    if ( ! get_option('dismissed-get_started_notice', FALSE ) )  {
        // Check if not on the theme documentation page
        $medical_care_current_screen = get_current_screen();
        if ($medical_care_current_screen && $medical_care_current_screen->id !== 'appearance_page_medical-care-guide-page') {
            $medical_care_theme = wp_get_theme();
            ?>
            <div class="notice notice-info is-dismissible" data-notice="get_started_notice">
                <div class="notice-div">
                    <div>
                        <p class="theme-name"><?php echo esc_html($medical_care_theme->get('Name')); ?></p>
                        <p><?php _e('For information and detailed instructions, check out our theme documentation.', 'medical-care'); ?></p>
                    </div>
                    <div class="notice-buttons-box">
                        <a class="button-primary livedemo" href="<?php echo esc_url( MEDICAL_CARE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'medical-care'); ?></a>
                        <a class="button-primary buynow" href="<?php echo esc_url( MEDICAL_CARE_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'medical-care'); ?></a>
                        <a class="button-primary theme-install" href="themes.php?page=medical-care-guide-page"><?php _e('Begin Installation', 'medical-care'); ?></a> 
                    </div>
                </div>
            </div>
        <?php
        }
    }
}
add_action('admin_notices', 'medical_care_custom_admin_notice');

//after switch theme
add_action('after_switch_theme', 'medical_care_after_switch_theme');
function medical_care_after_switch_theme () {
    update_option('dismissed-get_started_notice', FALSE );
}
//get-start-function-end//

// tag count
function medical_care_display_post_tag_count() {
    $medical_care_tags = get_the_tags();
    $medical_care_tag_count = ($medical_care_tags) ? count($medical_care_tags) : 0;
    $medical_care_tag_text = ($medical_care_tag_count === 1) ? 'tag' : 'tags';
    echo $medical_care_tag_count . ' ' . $medical_care_tag_text;
}

//media post format
function medical_care_get_media($medical_care_type = array()){
	$medical_care_content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get media from the content if a playlist isn't present.
  if ( false === strpos( $medical_care_content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $medical_care_content, $medical_care_type );
    return $output;
  }
}

// front page template
function medical_care_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'medical_care_front_page_template' );

// excerpt function
function medical_care_custom_excerpt() {
    $medical_care_excerpt = get_the_excerpt();
    $medical_care_plain_text_excerpt = wp_strip_all_tags($medical_care_excerpt);
    
    // Get dynamic word limit from theme mod
    $medical_care_word_limit = esc_attr(get_theme_mod('medical_care_post_excerpt', '30'));
    
    // Limit the number of words
    $medical_care_limited_excerpt = implode(' ', array_slice(explode(' ', $medical_care_plain_text_excerpt), 0, $medical_care_word_limit));

    echo esc_html($medical_care_limited_excerpt);
}

// typography
function medical_care_fonts_scripts() {
	$medical_care_headings_font = esc_html(get_theme_mod('medical_care_headings_text'));
	$medical_care_body_font = esc_html(get_theme_mod('medical_care_body_text'));

	if( $medical_care_headings_font ) {
		wp_enqueue_style( 'medical-care-headings-fonts', '//fonts.googleapis.com/css?family='. $medical_care_headings_font );
	} else {
		wp_enqueue_style( 'medical-care-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $medical_care_body_font ) {
		wp_enqueue_style( 'medical-care-body-fonts', '//fonts.googleapis.com/css?family='. $medical_care_body_font );
	} else {
		wp_enqueue_style( 'medical-care-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'medical_care_fonts_scripts' );

// Footer Text
function medical_care_copyright_link() {
    $cyber_security_services_footer_text = get_theme_mod('medical_care_footer_text', esc_html__('Medical WordPress Theme', 'medical-care'));
    $cyber_security_services_credit_link = esc_url('https://www.ovationthemes.com/products/free-medical-wordpress-theme');

    echo '<a href="' . $cyber_security_services_credit_link . '" target="_blank">' . esc_html($cyber_security_services_footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'medical-care') . '</span></a>';
}

// custom sanitizations
// dropdown
function medical_care_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
// slider custom control
if ( ! function_exists( 'medical_care_sanitize_integer' ) ) {
	function medical_care_sanitize_integer( $input ) {
		return (int) $input;
	}
}
// range contol
function medical_care_sanitize_number_absint( $number, $setting ) {

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
function medical_care_sanitize_select( $input, $setting ){  
    $input = sanitize_key($input);    
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );      
}
// toggle switch
function medical_care_callback_sanitize_switch( $value ) {
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );
}
//choices control
function medical_care_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
// phone number
function medical_care_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}
// Sanitize Sortable control.
function medical_care_sanitize_sortable( $val, $setting ) {
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
function medical_care_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'medical-care-featured-image', 2000, 1200, true );
	add_image_size( 'medical-care-thumbnail-avatar', 100, 100, true );

	define( 'THEME_DIR', dirname( __FILE__ ) );

	load_theme_textdomain( 'medical-care', get_template_directory() . '/languages' );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'medical-care' ),
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
	add_editor_style( array( 'assets/css/editor-style.css', medical_care_fonts_url() ) );
}
add_action( 'after_setup_theme', 'medical_care_setup' );

// widgets
function medical_care_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'medical-care' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'medical-care' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'medical-care' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'medical-care' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'medical-care' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'medical-care' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'medical-care' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'medical-care' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'medical-care' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'medical-care' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'medical-care' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'medical-care' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'medical-care' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'medical-care' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'medical_care_widgets_init' );

// google fonts
function medical_care_fonts_url(){
	$medical_care_font_url = '';
	$medical_care_font_family = array();
	$medical_care_font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
	$medical_care_font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$medical_care_font_family[] = 'Titillium Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700';
	$medical_care_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';

	$medical_care_query_args = array(
		'family'	=> rawurlencode(implode('|',$medical_care_font_family)),
	);
	$medical_care_font_url = add_query_arg($medical_care_query_args,'//fonts.googleapis.com/css');
	return $medical_care_font_url;
}

//Enqueue scripts and styles.
function medical_care_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'medical-care-fonts', medical_care_fonts_url(), array(), null );

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style',get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'medical-care-style', get_stylesheet_uri() );

	// RTL
	wp_style_add_data('medical-care-style', 'rtl', 'replace');

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'medical-care-style',$medical_care_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style',get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	//Block Style
	wp_enqueue_style( 'medical-care-block-style',get_template_directory_uri().'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'medical-care-custom.js', get_theme_file_uri( '/assets/js/medical-care-custom.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'medical-care-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap.js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (get_option('medical_care_animation_enable', false) !== 'off') {
		//wow.js
		wp_enqueue_script( 'medical-care-wow-js', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), true );

		//animate.css
		wp_enqueue_style( 'medical-care-animate-css', get_template_directory_uri().'/assets/css/animate.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'medical_care_scripts' );

function medical_care_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'medical-care-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'medical-care-fonts', medical_care_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'medical_care_block_editor_styles' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'medical_care_customize_controls_register_scripts' );

function medical_care_customize_controls_register_scripts() {
	
	wp_enqueue_style( 'medical-care-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}

//enque files
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