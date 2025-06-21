<?php
/**
 * Organic Farm functions and definitions
 *
 * @subpackage Organic Farm
 * @since 1.0
 */

//woocommerce//
//shop page no of columns
function organic_farm_woocommerce_loop_columns() {
	
	$retrun = get_theme_mod( 'organic_farm_archieve_item_columns', 3 );
    
    return $retrun;
}
add_filter( 'loop_shop_columns', 'organic_farm_woocommerce_loop_columns' );
function organic_farm_woocommerce_products_per_page() {

		$retrun = get_theme_mod( 'organic_farm_archieve_shop_perpage', 6 );
    
    return $retrun;
}
add_filter( 'loop_shop_per_page', 'organic_farm_woocommerce_products_per_page' );
// related products
function organic_farm_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => get_theme_mod( 'organic_farm_related_shop_perpage', 3 ),
        'columns'        => get_theme_mod( 'organic_farm_related_item_columns', 3),
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'organic_farm_related_products_args' );

// breadcrumb seperator
function organic_farm_woocommerce_breadcrumb_separator($organic_farm_defaults) {
    $organic_farm_separator = get_theme_mod('woocommerce_breadcrumb_separator', ' / ');

    // Update the separator
    $organic_farm_defaults['delimiter'] = $organic_farm_separator;

    return $organic_farm_defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'organic_farm_woocommerce_breadcrumb_separator');

//add animation class
if ( class_exists( 'WooCommerce' ) ) { 
	add_filter('post_class', function($organic_farm_classes, $class, $product_id) {
	    if( is_shop() || is_product_category() ){
	        
	        $organic_farm_classes = array_merge(['wow','zoomIn'], $organic_farm_classes);
	    }
	    return $organic_farm_classes;
	},10,3);
}

//woocommerce-end//

// Get start function

// Enqueue scripts and styles
function organic_farm_enqueue_admin_script($hook) {
    // Admin JS
    wp_enqueue_script('organic-farm-admin-js', get_theme_file_uri('/assets/js/organic-farm-admin.js'), array('jquery'), true);
    wp_localize_script(
		'organic-farm-admin-js',
		'organic_farm',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('organic_farm_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('organic-farm-admin-js');

    wp_localize_script( 'organic-farm-admin-js', 'organic_farm_scripts_localize',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action('admin_enqueue_scripts', 'organic_farm_enqueue_admin_script');

//dismiss function 
add_action( 'wp_ajax_organic_farm_dismissed_notice_handler', 'organic_farm_ajax_notice_dismiss_fuction' );

function organic_farm_ajax_notice_dismiss_fuction() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'organic_farm_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

//get start box
function organic_farm_custom_admin_notice() {
    // Check if the notice is dismissed
    if ( ! get_option('dismissed-get_started_notice', FALSE ) )  {
        // Check if not on the theme documentation page
        $organic_farm_current_screen = get_current_screen();
        if ($organic_farm_current_screen && $organic_farm_current_screen->id !== 'appearance_page_organic-farm-guide-page') {
            $organic_farm_theme = wp_get_theme();
            ?>
            <div class="notice notice-info is-dismissible" data-notice="get_started_notice">
                <div class="notice-div">
                    <div>
                        <p class="theme-name"><?php echo esc_html($organic_farm_theme->get('Name')); ?></p>
                        <p><?php _e('For information and detailed instructions, check out our theme documentation.', 'organic-farm'); ?></p>
                    </div>
                    <div class="notice-buttons-box">
                        <a class="button-primary livedemo" href="<?php echo esc_url( ORGANIC_FARM_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'organic-farm'); ?></a>
                        <a class="button-primary buynow" href="<?php echo esc_url( ORGANIC_FARM_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'organic-farm'); ?></a>
                        <a class="button-primary theme-install" href="themes.php?page=organic-farm-guide-page"><?php _e('Begin Installation', 'organic-farm'); ?></a> 
                    </div>
                </div>
            </div>
        <?php
        }
    }
}
add_action('admin_notices', 'organic_farm_custom_admin_notice');

//after switch theme
add_action('after_switch_theme', 'organic_farm_after_switch_theme');
function organic_farm_after_switch_theme () {
    update_option('dismissed-get_started_notice', FALSE );
}

//get-start-function-end//

// tag count
function organic_farm_display_post_tag_count() {
    $organic_farm_tags = get_the_tags();
    $organic_farm_tag_count = ($organic_farm_tags) ? count($organic_farm_tags) : 0;
    $organic_farm_tag_text = ($organic_farm_tag_count === 1) ? 'tag' : 'tags';
    echo $organic_farm_tag_count . ' ' . $organic_farm_tag_text;
}

//media post format
function organic_farm_get_media($organic_farm_type = array()){
	$organic_farm_content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get media from the content if a playlist isn't present.
  if ( false === strpos( $organic_farm_content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $organic_farm_content, $organic_farm_type );
    return $output;
  }
}

// front page template
function organic_farm_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'organic_farm_front_page_template' );

// excerpt function
function organic_farm_custom_excerpt() {
    $organic_farm_excerpt = get_the_excerpt();
    $organic_farm_plain_text_excerpt = wp_strip_all_tags($organic_farm_excerpt);
    
    // Get dynamic word limit from theme mod
    $organic_farm_word_limit = esc_attr(get_theme_mod('organic_farm_post_excerpt', '30'));
    
    // Limit the number of words
    $organic_farm_limited_excerpt = implode(' ', array_slice(explode(' ', $organic_farm_plain_text_excerpt), 0, $organic_farm_word_limit));

    echo esc_html($organic_farm_limited_excerpt);
}

// typography
function organic_farm_fonts_scripts() {
	$organic_farm_headings_font = esc_html(get_theme_mod('organic_farm_headings_text'));
	$organic_farm_body_font = esc_html(get_theme_mod('organic_farm_body_text'));

	if( $organic_farm_headings_font ) {
		wp_enqueue_style( 'organic-farm-headings-fonts', '//fonts.googleapis.com/css?family='. $organic_farm_headings_font );
	} else {
		wp_enqueue_style( 'organic-farm-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $organic_farm_body_font ) {
		wp_enqueue_style( 'organic-farm-body-fonts', '//fonts.googleapis.com/css?family='. $organic_farm_body_font );
	} else {
		wp_enqueue_style( 'organic-farm-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'organic_farm_fonts_scripts' );

// Footer Text
function organic_farm_copyright_link() {
    $organic_farm_footer_text = get_theme_mod('organic_farm_footer_text', esc_html__('Organic Farm WordPress Theme', 'organic-farm'));
    $organic_farm_credit_link = esc_url('https://www.ovationthemes.com/products/free-organic-wordpress-theme');

    echo '<a href="' . $organic_farm_credit_link . '" target="_blank">' . esc_html($organic_farm_footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'organic-farm') . '</span></a>';
}

// custom sanitizations
// dropdown
function organic_farm_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
// slider custom control
if ( ! function_exists( 'organic_farm_sanitize_integer' ) ) {
	function organic_farm_sanitize_integer( $input ) {
		return (int) $input;
	}
}
// range contol
function organic_farm_sanitize_number_absint( $number, $setting ) {

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
function organic_farm_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
// toggle switch
function organic_farm_callback_sanitize_switch( $value ) {
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );
}
//choices control
function organic_farm_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
// phone number
function organic_farm_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}
// Sanitize Sortable control.
function organic_farm_sanitize_sortable( $val, $setting ) {
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
function organic_farm_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'organic-farm-featured-image', 2000, 1200, true );
	add_image_size( 'organic-farm-thumbnail-avatar', 100, 100, true );

	define( 'THEME_DIR', dirname( __FILE__ ) );

	load_theme_textdomain( 'organic-farm', get_template_directory() . '/languages' );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'organic-farm' ),
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
		'flex-height'  => true,
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
	add_editor_style( array( 'assets/css/editor-style.css', organic_farm_fonts_url() ) );
}
add_action( 'after_setup_theme', 'organic_farm_setup' );

// widgets
function organic_farm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'organic-farm' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'organic-farm' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'organic-farm' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'organic-farm' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'organic-farm' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'organic-farm' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'organic-farm' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'organic-farm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'organic_farm_widgets_init' );

// google fonts
function organic_farm_fonts_url(){
	$organic_farm_font_url = '';
	$organic_farm_font_family = array();
	$organic_farm_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$organic_farm_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

	$organic_farm_query_args = array(
		'family'	=> rawurlencode(implode('|',$organic_farm_font_family)),
	);
	$organic_farm_font_url = add_query_arg($organic_farm_query_args,'//fonts.googleapis.com/css');
	return $organic_farm_font_url;
	$organic_farm_contents = wptt_get_webfont_url( esc_url_raw( $organic_farm_fonts_url ) );
}

//Enqueue scripts and styles.
function organic_farm_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'organic-farm-fonts', organic_farm_fonts_url(), array(), null );

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', esc_url( get_template_directory_uri() ).'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'organic-farm-style', get_stylesheet_uri() );

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'organic-farm-style',$organic_farm_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style',get_template_directory_uri() .'/assets/css/fontawesome-all.css' );

	//Block Style
	wp_enqueue_style( 'organic-farm-block-style',get_template_directory_uri() .'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'organic-farm-custom-js', get_theme_file_uri( '/assets/js/organic-farm-custom.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'organic-farm-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap.js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (get_option('organic_farm_animation_enable', false) !== 'off') {
		//wow.js
		wp_enqueue_script( 'organic-farm-wow-js', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), true );

		//animate.css
		wp_enqueue_style( 'organic-farm-animate-css', get_template_directory_uri().'/assets/css/animate.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'organic_farm_scripts' );

function organic_farm_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'organic-farm-block-editor-style', trailingslashit(get_template_directory_uri() ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'organic-farm-fonts', organic_farm_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'organic_farm_block_editor_styles' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'organic_farm_customize_controls_register_scripts' );
function organic_farm_customize_controls_register_scripts() {
	wp_enqueue_style( 'organic-farm-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}

// enque files
require get_parent_theme_file_path( '/inc/custom-header.php' );
require get_parent_theme_file_path( '/inc/template-tags.php' );
require get_parent_theme_file_path( '/inc/template-functions.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_template_directory() .'/inc/TGM/tgm.php';
require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );
require get_parent_theme_file_path( '/inc/typofont.php' );
require get_template_directory() . '/inc/wptt-webfont-loader.php';
require get_parent_theme_file_path( '/inc/breadcrumb.php' );
require get_parent_theme_file_path( 'inc/sortable/sortable_control.php' );