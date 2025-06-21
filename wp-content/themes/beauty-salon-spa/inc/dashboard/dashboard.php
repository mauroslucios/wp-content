<?php

add_action( 'admin_menu', 'beauty_salon_spa_gettingstarted' );
function beauty_salon_spa_gettingstarted() {
	add_theme_page( esc_html__('Begin Installation', 'beauty-salon-spa'), esc_html__('Begin Installation', 'beauty-salon-spa'), 'edit_theme_options', 'beauty-salon-spa-guide-page', 'beauty_salon_spa_guide');
}

function beauty_salon_spa_admin_theme_style() {
   wp_enqueue_style('beauty-salon-spa-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'beauty_salon_spa_admin_theme_style');

if ( ! defined( 'BEAUTY_SALON_SPA_SUPPORT' ) ) {
	define('BEAUTY_SALON_SPA_SUPPORT',__('https://wordpress.org/support/theme/beauty-salon-spa/','beauty-salon-spa'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_REVIEW' ) ) {
	define('BEAUTY_SALON_SPA_REVIEW',__('https://wordpress.org/support/theme/beauty-salon-spa/reviews/','beauty-salon-spa'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_LIVE_DEMO' ) ) {
define('BEAUTY_SALON_SPA_LIVE_DEMO',__('https://trial.ovationthemes.com/beauty-salon/','beauty-salon-spa'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_BUY_PRO' ) ) {
define('BEAUTY_SALON_SPA_BUY_PRO',__('https://www.ovationthemes.com/products/beauty-salon-wordpress-theme','beauty-salon-spa'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_PRO_DOC' ) ) {
define('BEAUTY_SALON_SPA_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-beauty-salon-pro-doc/','beauty-salon-spa'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_FREE_DOC' ) ) {
define('BEAUTY_SALON_SPA_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-beauty-salon-spa-free-doc/','beauty-salon-spa'));
}
if ( ! defined( 'BEAUTY_SALON_SPA_THEME_NAME' ) ) {
define('BEAUTY_SALON_SPA_THEME_NAME',__('Premium Salon Theme','beauty-salon-spa'));
}


/**
 * Theme Info Page
 */
function beauty_salon_spa_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$beauty_salon_spa_theme = wp_get_theme(); ?>

	<div class="getting-started__header">
		<div class="header-box-left">
			<h2><?php echo esc_html( $beauty_salon_spa_theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'beauty-salon-spa'); ?><?php echo esc_html($beauty_salon_spa_theme['Version']);?></p>
		</div>
		<div class="cheader-box-right">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( BEAUTY_SALON_SPA_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Theme Documentation', 'beauty-salon-spa'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( BEAUTY_SALON_SPA_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'beauty-salon-spa'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( BEAUTY_SALON_SPA_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'beauty-salon-spa'); ?></a>
			</div>
		</div>
	</div>
	<div class="import-box">
		<div class="box-container">
			<h2><?php esc_html_e( 'DEMO IMPORT', 'beauty-salon-spa' ); ?></h2>
			<p><?php esc_html_e('To import all of the demo content, click the Begin With Demo Import button.','beauty-salon-spa'); ?></p>
			<?php require get_theme_file_path( '/inc/dashboard/setup.php' ); ?>
		</div>
	</div>
	<div class="wrap getting-started">
		<div class="box-container">
			<div class="box-left-main">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','beauty-salon-spa'); ?></h3>
					<p><?php esc_html_e('To step the beauty salon spa theme follow the below steps.','beauty-salon-spa'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','beauty-salon-spa'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','beauty-salon-spa'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your phone number and email address.','beauty-salon-spa'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=beauty_salon_spa_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','beauty-salon-spa'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','beauty-salon-spa'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','beauty-salon-spa'); ?></a>

					<h4><?php esc_html_e('4. Setup Footer','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','beauty-salon-spa'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','beauty-salon-spa'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','beauty-salon-spa'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=beauty_salon_spa_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','beauty-salon-spa'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','beauty-salon-spa'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','beauty-salon-spa'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates >> Publish it.','beauty-salon-spa'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','beauty-salon-spa'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','beauty-salon-spa'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','beauty-salon-spa'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=beauty_salon_spa_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','beauty-salon-spa'); ?></a>

					<h4><?php esc_html_e('3. Setup Services','beauty-salon-spa'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','beauty-salon-spa'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Services Settings >> Select post','beauty-salon-spa'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=beauty_salon_spa_services_section') ); ?>" target="_blank"><?php esc_html_e('Add Services','beauty-salon-spa'); ?></a>
				</div>
        	</div>
			<div class="box-right-main">
				<h3><?php echo esc_html(BEAUTY_SALON_SPA_THEME_NAME); ?></h3>
				<img class="beauty_salon_spa_img_responsive" style="width: 100%;" src="<?php echo esc_url( $beauty_salon_spa_theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
					<a class="button-primary livedemo" href="<?php echo esc_url( BEAUTY_SALON_SPA_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'beauty-salon-spa'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( BEAUTY_SALON_SPA_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'beauty-salon-spa'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( BEAUTY_SALON_SPA_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'beauty-salon-spa'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'beauty-salon-spa');?> </li>
                </ul>
        	</div>
		</div>
	</div>

<?php }?>
