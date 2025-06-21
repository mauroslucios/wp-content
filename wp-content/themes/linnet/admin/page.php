<?php


use ColibriWP\Theme\Core\Hooks;
use ColibriWP\Theme\Translations;
use ColibriWP\Theme\View;

$linnet_tabs            = View::getData( 'tabs', array() );
$linnet_current_tab     = View::getData( 'current_tab', null );
$linnet_url             = View::getData( 'page_url', null );
$linnet_welcome_message = View::getData( 'welcome_message', null );
$linnet_tab_partial     = View::getData( "tabs.{$linnet_current_tab}.tab_partial", null );
Hooks::prefixed_do_action( "before_info_page_tab_{$linnet_current_tab}" );
$linnet_slug        = "colibri-wp-page-info";
$colibri_get_started = array(
    'plugin_installed_and_active' => Translations::escHtml( 'plugin_installed_and_active' ),
    'activate'                    => Translations::escHtml( 'activate' ),
    'activating'                  => __( 'Activating', 'linnet' ),
    'install_recommended'         => isset( $_GET['install_recommended'] ) ? $_GET['install_recommended'] : ''
);

wp_localize_script( $linnet_slug, 'colibri_get_started', $colibri_get_started );
?>
<div class="linnet-admin-page wrap about-wrap full-width-layout mesmerize-page">

    <div class="linnet-admin-page--hero">
        <div class="linnet-admin-page--hero-intro linnet-admin-page-spacing ">
            <div class="linnet-admin-page--hero-logo">
                <img src="<?php echo esc_url( linnet_theme()->getAssetsManager()->getBaseURL() . "/images/colibriwp-logo.png" ) ?>"
                     alt="logo"/>
            </div>
            <div class="linnet-admin-page--hero-text ">
                <?php if ( $linnet_welcome_message ): ?>
                    <h1><?php echo esc_html( $linnet_welcome_message ); ?></h1>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( count( $linnet_tabs ) ): ?>
            <nav class="nav-tab-wrapper wp-clearfix">
                <?php foreach ( $linnet_tabs as $linnet_tab_id => $linnet_tab ) : ?>
                    <a class="nav-tab <?php echo ( $linnet_current_tab === $linnet_tab_id ) ? 'nav-tab-active' : '' ?>"
                       href="<?php echo esc_url( add_query_arg( array( 'current_tab' => $linnet_tab_id ),
                           $linnet_url ) ); ?>">
                        <?php echo esc_html( $linnet_tab['title'] ); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </div>
    <?php if ( $linnet_tab_partial ): ?>
        <div class="linnet-admin-page--body linnet-admin-page-spacing">
            <div class="linnet-admin-page--content">
                <div class="linnet-admin-page--tab">
                    <div class="linnet-admin-page--tab-<?php echo esc_attr( $linnet_current_tab ); ?>">
                        <?php View::make( $linnet_tab_partial,
                            Hooks::prefixed_apply_filters( "info_page_data_tab_{$linnet_current_tab}",
                                array() ) ); ?>
                    </div>
                </div>

            </div>
            <div class="linnet-admin-page--sidebar">
                <?php View::make( 'admin/sidebar' ) ?>
            </div>
        </div>
    <?php endif; ?>
</div>


