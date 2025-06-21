<?php
/**
 * Hospital Management functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hospital Management
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Hospital_Management_Loader.php' );

$Hospital_Management_Loader = new \WPTRT\Autoload\Hospital_Management_Loader();

$Hospital_Management_Loader->hospital_management_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Hospital_Management_Loader->hospital_management_register();

if ( ! function_exists( 'hospital_management_setup' ) ) :

	function hospital_management_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		load_theme_textdomain( 'hospital-management', get_template_directory() . '/languages' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_image_size('hospital-management-featured-header-image', 2000, 660, true);

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','hospital-management' ),
	        'footer'=> esc_html__( 'Footer Menu','hospital-management' ),
        ) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'hospital_management_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_hospital_management_dismissable_notice', 'hospital_management_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'hospital_management_setup' );


function hospital_management_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hospital_management_content_width', 1170 );
}
add_action( 'after_setup_theme', 'hospital_management_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hospital_management_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hospital-management' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'hospital-management' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'hospital-management' ),
		'id'            => 'hospital-management-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'hospital-management' ),
		'id'            => 'hospital-management-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'hospital-management' ),
		'id'            => 'hospital-management-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'hospital_management_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hospital_management_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'lato',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'hospital-management-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'hospital-management-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'hospital-management-style',$hospital_management_theme_css );

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('hospital-management-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hospital_management_scripts' );

/**
 * Enqueue Preloader.
 */
function hospital_management_preloader() {

	$hospital_management_theme_color_css = '';
	$hospital_management_preloader_bg_color = get_theme_mod('hospital_management_preloader_bg_color');
	$hospital_management_preloader_dot_1_color = get_theme_mod('hospital_management_preloader_dot_1_color');
	$hospital_management_preloader_dot_2_color = get_theme_mod('hospital_management_preloader_dot_2_color');
	$hospital_management_logo_max_height = get_theme_mod('hospital_management_logo_max_height');
	$hospital_management_scroll_bg_color = get_theme_mod('hospital_management_scroll_bg_color');
	$hospital_management_scroll_color = get_theme_mod('hospital_management_scroll_color');
	$hospital_management_scroll_font_size = get_theme_mod('hospital_management_scroll_font_size');
	$hospital_management_scroll_border_radius = get_theme_mod('hospital_management_scroll_border_radius');

  	if(get_theme_mod('hospital_management_logo_max_height') == '') {
		$hospital_management_logo_max_height = '80';
	}

	if(get_theme_mod('hospital_management_preloader_bg_color') == '') {
		$hospital_management_preloader_bg_color = '#0088FF';
	}
	if(get_theme_mod('hospital_management_preloader_dot_1_color') == '') {
		$hospital_management_preloader_dot_1_color = '#ffffff';
	}
	if(get_theme_mod('hospital_management_preloader_dot_2_color') == '') {
		$hospital_management_preloader_dot_2_color = '#3F3C6C';
	}
	$hospital_management_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($hospital_management_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($hospital_management_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($hospital_management_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($hospital_management_preloader_dot_2_color).';
		  }
		}
		a#button{
			background-color: '.esc_attr($hospital_management_scroll_bg_color).';
			color: '.esc_attr($hospital_management_scroll_color).' !important;
			font-size: '.esc_attr($hospital_management_scroll_font_size).'px;
			border-radius: '.esc_attr($hospital_management_scroll_border_radius).'%;
		}
	';
    wp_add_inline_style( 'hospital-management-style',$hospital_management_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'hospital_management_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


function hospital_management_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*dropdown page sanitization*/
function hospital_management_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function hospital_management_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/*radio button sanitization*/
function hospital_management_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function hospital_management_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function hospital_management_sanitize_number_range( $number, $setting ) {
	
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

// Change number or products per row to 3
add_filter('loop_shop_columns', 'hospital_management_loop_columns');
if (!function_exists('hospital_management_loop_columns')) {
	function hospital_management_loop_columns() {
		$columns = get_theme_mod( 'hospital_management_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'hospital_management_shop_per_page', 9 );
function hospital_management_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'hospital_management_product_per_page', 9 );
	return $cols;
}

function hospital_management_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'pro_version_footer' );
    $wp_customize->remove_control( 'pro_version_footer' );

}
add_action( 'customize_register', 'hospital_management_remove_customize_register', 11 );

/**
 * Get CSS
 */

function hospital_management_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','hospital_management',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('hospital_management_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'hospital_management_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_hospital-management-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'hospital-management-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'hospital_management_getpage_css' );

if ( ! defined( 'HOSPITAL_MANAGEMENT_CONTACT_SUPPORT' ) ) {
define('HOSPITAL_MANAGEMENT_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/hospital-management/','hospital-management'));
}
if ( ! defined( 'HOSPITAL_MANAGEMENT_REVIEW' ) ) {
define('HOSPITAL_MANAGEMENT_REVIEW',__('https://wordpress.org/support/theme/hospital-management/reviews/','hospital-management'));
}
if ( ! defined( 'HOSPITAL_MANAGEMENT_LIVE_DEMO' ) ) {
define('HOSPITAL_MANAGEMENT_LIVE_DEMO',__('https://demo.themagnifico.net/hospital-management/','hospital-management'));
}
if ( ! defined( 'HOSPITAL_MANAGEMENT_GET_PREMIUM_PRO' ) ) {
define('HOSPITAL_MANAGEMENT_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/hospital-management-wordpress-theme','hospital-management'));
}
if ( ! defined( 'HOSPITAL_MANAGEMENT_PRO_DOC' ) ) {
define('HOSPITAL_MANAGEMENT_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/hospital-management-pro-doc/','hospital-management'));
}
if ( ! defined( 'HOSPITAL_MANAGEMENT_FREE_DOC' ) ) {
define('HOSPITAL_MANAGEMENT_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/hospital-management-free-doc/','hospital-management'));
}

add_action('admin_menu', 'hospital_management_themepage');
function hospital_management_themepage(){

	$hospital_management_theme_test = wp_get_theme();

	$hospital_management_theme_info = add_theme_page( __('Theme Options','hospital-management'), __(' Theme Options','hospital-management'), 'manage_options', 'hospital-management-info.php', 'hospital_management_info_page' );
}

function hospital_management_info_page() {
	$hospital_management_theme_user = wp_get_current_user();
	$hospital_management_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap hospital-management-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','hospital-management'); ?><?php echo esc_html( $hospital_management_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "hospital-management"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Hospital Management , feel free to contact us for any support regarding our theme.", "hospital-management"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "hospital-management"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "hospital-management"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "hospital-management"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "hospital-management"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "hospital-management"); ?></h3>
						<p><?php esc_html_e("If You love Hospital Management theme then we would appreciate your review about our theme.", "hospital-management"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "hospital-management"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "hospital-management"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "hospital-management"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "hospital-management"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","hospital-management"); ?></h2>
		<div class="hospital-management-button-container">
			<a target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "hospital-management"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "hospital-management"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "hospital-management"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "hospital-management"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "hospital-management"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "hospital-management"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "hospital-management"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "hospital-management"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "hospital-management"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="hospital-management-button-container">
			<a target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "hospital-management"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function hospital_management_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function hospital_management_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'hospital_management_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'hospital-management'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'hospital-management'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=hospital-management-info.php' )); ?>"><?php esc_html_e( 'Get started', 'hospital-management' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'hospital-management' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( HOSPITAL_MANAGEMENT_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'hospital-management' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'hospital_management_deprecated_hook_admin_notice' );

function hospital_management_switch_theme() {
    delete_user_meta(get_current_user_id(), 'hospital_management_dismissable_notice');
}
add_action('after_switch_theme', 'hospital_management_switch_theme');
function hospital_management_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'hospital_management_dismissable_notice', true);
    die();
}
