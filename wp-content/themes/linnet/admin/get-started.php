<?php

use ColibriWP\Theme\PluginsManager;
use ColibriWP\Theme\Translations;

$linnet_is_builder_installed = apply_filters( 'linnet_page_builder/installed', false );

wp_enqueue_script( 'updates' );

function linnet_get_setting_link( $setting ) {
    return esc_attr( linnet_theme()->getCustomizer()->getSettingQuickLink( $setting ) );
}

?>

<div class="linnet-get-started__container linnet-admin-panel">
    <div class="linnet-get-started__section">
        <h2 class="col-title linnet-get-started__section-title">
            <span class="linnet-get-started__section-title__icon dashicons dashicons-admin-plugins"></span>
            <?php Translations::escHtmlE( 'get_started_section_1_title' ); ?>
        </h2>
        <div class="linnet-get-started__content">


            <?php foreach ( linnet_theme()->getPluginsManager()->getPluginData() as $linnet_recommended_plugin_slug => $linnet_recommended_plugin_data ): ?>
                <?php
                $linnet_plugin_state = linnet_theme()->getPluginsManager()->getPluginState( $linnet_recommended_plugin_slug );
                $linnet_notice_type  = $linnet_plugin_state === PluginsManager::ACTIVE_PLUGIN ? 'blue' : '';
                if ( isset( $linnet_recommended_plugin_data['internal'] ) && $linnet_recommended_plugin_data['internal'] ) {
                    continue;
                }
                ?>
                <div 
				
					class="linnet-notice <?php echo esc_attr( $linnet_notice_type ); ?> plugin-card-<?php echo $linnet_recommended_plugin_slug;?>">
                    <div class="linnet-notice__header">
                        <h3 class="linnet-notice__title"><?php echo esc_html( linnet_theme()->getPluginsManager()->getPluginData( "{$linnet_recommended_plugin_slug}.name" ) ); ?></h3>
                        <div class="linnet-notice__action">
                            <?php if ( $linnet_plugin_state === PluginsManager::ACTIVE_PLUGIN ): ?>
                                <p class="linnet-notice__action__active"><?php Translations::escHtmlE( 'plugin_installed_and_active' ); ?> </p>
                            <?php else: ?>
                                <?php if ( $linnet_plugin_state === PluginsManager::INSTALLED_PLUGIN ): ?>
                                    <a class="button button-large colibri-plugin activate-now" 
										data-slug="<?php echo $linnet_recommended_plugin_slug;?>"
                                       href="<?php echo esc_url( linnet_theme()->getPluginsManager()->getActivationLink( $linnet_recommended_plugin_slug ) ); ?>">
                                        <?php Translations::escHtmlE( 'activate' ); ?>
                                    </a>
                                <?php else: ?>
                                    <a class="button button-large colibri-plugin install-now"
									   data-slug="<?php echo $linnet_recommended_plugin_slug;?>"
                                       href="<?php echo esc_url( linnet_theme()->getPluginsManager()->getInstallLink( $linnet_recommended_plugin_slug ) ); ?>">
                                        <?php Translations::escHtmlE( 'install' ); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="linnet-notice__description"><?php echo esc_html( linnet_theme()->getPluginsManager()->getPluginData( "{$linnet_recommended_plugin_slug}.description" ) ); ?></p>


                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="linnet-get-started__section">
        <h2 class="linnet-get-started__section-title">
            <span class="linnet-get-started__section-title__icon dashicons dashicons-admin-appearance"></span>
            <?php Translations::escHtmlE( 'get_started_section_2_title' ); ?>
        </h2>
        <div class="linnet-get-started__content">
            <div class="linnet-customizer-option__container">
                <div class="linnet-customizer-option">
                    <span class="linnet-customizer-option__icon dashicons dashicons-format-image"></span>
                    <a class="linnet-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( linnet_get_setting_link( 'logo' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_set_logo' ); ?>
                    </a>
                </div>
                <div class="linnet-customizer-option">
                    <span class="linnet-customizer-option__icon dashicons dashicons-format-image"></span>
                    <a class="linnet-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( linnet_get_setting_link( 'hero_background' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_hero_image' ); ?>
                    </a>
                </div>
                <div class="linnet-customizer-option">
                    <span class="linnet-customizer-option__icon dashicons dashicons-menu-alt3"></span>
                    <a class="linnet-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( linnet_get_setting_link( 'navigation' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_customize_navigation' ); ?>
                    </a>
                </div>
                <div class="linnet-customizer-option">
                    <span class="linnet-customizer-option__icon dashicons dashicons-layout"></span>
                    <a class="linnet-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( linnet_get_setting_link( 'hero_layout' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_change_customize_hero' ); ?>
                    </a>
                </div>
                <div class="linnet-customizer-option">
                    <span class="linnet-customizer-option__icon dashicons dashicons-admin-appearance"></span>
                    <a class="linnet-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( linnet_get_setting_link( 'footer' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_customize_footer' ); ?>
                    </a>
                </div>
                <?php if ( $linnet_is_builder_installed ): ?>
                    <div class="linnet-customizer-option">
                        <span class="linnet-customizer-option__icon dashicons dashicons-art"></span>
                        <a class="linnet-customizer-option__label"
                           target="_blank"
                           href="<?php echo esc_url( linnet_get_setting_link( 'color_scheme' ) ); ?>">
                            <?php Translations::escHtmlE( 'get_started_change_color_settings' ); ?>
                        </a>
                    </div>
                    <div class="linnet-customizer-option">
                        <span class="linnet-customizer-option__icon dashicons dashicons-editor-textcolor"></span>
                        <a class="linnet-customizer-option__label"
                           target="_blank"
                           href="<?php echo esc_url( linnet_get_setting_link( 'general_typography' ) ); ?>">
                            <?php Translations::escHtmlE( 'get_started_customize_fonts' ); ?>
                        </a>
                    </div>

                <?php endif; ?>
                <div class="linnet-customizer-option">
                    <span class="linnet-customizer-option__icon dashicons dashicons-menu-alt3"></span>
                    <a class="linnet-customizer-option__label"
                       target="_blank"
                       href="<?php echo esc_url( linnet_get_setting_link( 'menu' ) ); ?>">
                        <?php Translations::escHtmlE( 'get_started_set_menu_links' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php



wp_print_request_filesystem_credentials_modal();
wp_print_admin_notice_templates();
