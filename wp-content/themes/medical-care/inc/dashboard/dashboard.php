<?php

add_action( 'admin_menu', 'medical_care_gettingstarted' );
function medical_care_gettingstarted() {
	add_theme_page( esc_html__('Begin Installation', 'medical-care'), esc_html__('Begin Installation', 'medical-care'), 'edit_theme_options', 'medical-care-guide-page', 'medical_care_guide');
}

function medical_care_admin_theme_style() {
   wp_enqueue_style('medical-care-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'medical_care_admin_theme_style');

if ( ! defined( 'MEDICAL_CARE_SUPPORT' ) ) {
	define('MEDICAL_CARE_SUPPORT',__('https://wordpress.org/support/theme/medical-care/','medical-care'));
}
if ( ! defined( 'MEDICAL_CARE_REVIEW' ) ) {
	define('MEDICAL_CARE_REVIEW',__('https://wordpress.org/support/theme/medical-care/reviews/','medical-care'));
}
if ( ! defined( 'MEDICAL_CARE_LIVE_DEMO' ) ) {
define('MEDICAL_CARE_LIVE_DEMO',__('https://trial.ovationthemes.com/ovation-medical-care-pro/','medical-care'));
}
if ( ! defined( 'MEDICAL_CARE_BUY_PRO' ) ) {
define('MEDICAL_CARE_BUY_PRO',__('https://www.ovationthemes.com/products/medical-wordpress-theme','medical-care'));
}
if ( ! defined( 'MEDICAL_CARE_PRO_DOC' ) ) {
define('MEDICAL_CARE_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-medical-pro/','medical-care'));
}
if ( ! defined( 'MEDICAL_CARE_FREE_DOC' ) ) {
define('MEDICAL_CARE_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-medical-care-free-doc/','medical-care'));
}
if ( ! defined( 'MEDICAL_CARE_THEME_NAME' ) ) {
define('MEDICAL_CARE_THEME_NAME',__('Premium Medical Theme','medical-care'));
}


/**
 * Theme Info Page
 */
function medical_care_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$medical_care_theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="header-box-left">
			<h2><?php echo esc_html( $medical_care_theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'medical-care'); ?><?php echo esc_html($medical_care_theme['Version']);?></p>
		</div>
		<div class="header-box-right">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( MEDICAL_CARE_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Theme Documentation', 'medical-care'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( MEDICAL_CARE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'medical-care'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( MEDICAL_CARE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'medical-care'); ?></a>
			</div>
		</div>
	</div>
	<div class="import-box">
		<div class="box-container">
			<h2><?php esc_html_e( 'DEMO IMPORT', 'medical-care' ); ?></h2>
			<p><?php esc_html_e('To import all of the demo content, click the Begin With Demo Import button.','medical-care'); ?></p>
			<?php require get_theme_file_path( '/inc/dashboard/setup.php' ); ?>
		</div>
	</div>
	<div class="wrap getting-started">
		<div class="box-container">
			<div class="box-left-main">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','medical-care'); ?></h3>
					<p><?php esc_html_e('To step the medical care theme follow the below steps.','medical-care'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','medical-care'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','medical-care'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number, timming and address.','medical-care'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=medical_care_header') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','medical-care'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','medical-care'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','medical-care'); ?></a>

					<h4><?php esc_html_e('4. Setup Footer','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','medical-care'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','medical-care'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','medical-care'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=medical_care_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','medical-care'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','medical-care'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','medical-care'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates. >> Publish it.','medical-care'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','medical-care'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','medical-care'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','medical-care'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=medical_care_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','medical-care'); ?></a>

					<h4><?php esc_html_e('4. Setup Services','medical-care'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post Category >> Add New Post >> Add title, content, select post category and featured image >> Publish it.','medical-care'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Services Settings >> Add section heading and select post category.','medical-care'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=medical_care_popular_courses') ); ?>" target="_blank"><?php esc_html_e('Add Services','medical-care'); ?></a>
				</div>
        	</div>
			<div class="box-right-main">
				<h3><?php echo esc_html(MEDICAL_CARE_THEME_NAME); ?></h3>
				<img class="medical_care_img_responsive" style="width: 100%;" src="<?php echo esc_url( $medical_care_theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
					<a class="button-primary livedemo" href="<?php echo esc_url( MEDICAL_CARE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'medical-care'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( MEDICAL_CARE_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'medical-care'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( MEDICAL_CARE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'medical-care'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'medical-care');?> </li>
                </ul>
        	</div>
		</div>
	</div>

<?php }?>
