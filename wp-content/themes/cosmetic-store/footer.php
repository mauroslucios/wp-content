<footer>
  <div class="container">
      <?php
        if (is_active_sidebar('cosmetic-store-footer-sidebar')) {
          echo '<div class="row sidebar-area footer-area">';
            dynamic_sidebar('cosmetic-store-footer-sidebar');
          echo '</div>';
        } else { ?>
          <div id="footer-widgets" role="contentinfo">
            <div class="container">
              <div class="row sidebar-area footer-area">
                <div id="categories-2" class="col-lg-3 col-md-6 widget_categories">
                    <h4 class="title"><?php esc_html_e('Categories', 'cosmetic-store'); ?></h4>
                    <ul>
                        <?php
                        wp_list_categories(array(
                            'title_li' => '',
                        ));
                        ?>
                    </ul>
                </div>
                <div id="pages-2" class="col-lg-3 col-md-6 widget_pages">
                    <h4 class="title"><?php esc_html_e('Pages', 'cosmetic-store'); ?></h4>
                    <ul>
                        <?php
                        wp_list_pages(array(
                            'title_li' => '',
                        ));
                        ?>
                    </ul>
                </div>
                <div id="archives-2" class="col-lg-3 col-md-6 widget_archive">
                    <h4 class="title"><?php esc_html_e('Archives', 'cosmetic-store'); ?></h4>
                    <ul>
                        <?php
                        wp_get_archives(array(
                            'type' => 'postbypost',
                            'format' => 'html',
                            'before' => '<li>',
                            'after' => '</li>',
                        ));
                        ?>
                    </ul>
                </div>
                <div id="calendar" class="col-lg-3 col-md-6 widget_calendar">
                  <h4 class="title"><?php esc_html_e('Calendar', 'cosmetic-store'); ?></h4>
                  <?php get_calendar(); ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copy-text">
            <p class="mb-0 py-3">
              <?php
              if (!get_theme_mod('cosmetic_store_footer_text') ) { ?>
                <a href="<?php echo esc_url('https://www.misbahwp.com/products/free-cosmetic-wordpress-theme'); ?>" target="_blank">
                <?php esc_html_e('Cosmetic Store WordPress Theme ','cosmetic-store'); ?></a>
              <?php } else {
                echo esc_html(get_theme_mod('cosmetic_store_footer_text'));
              }
            ?>
              <?php
             /* translators: %s: Misbah WP */
              printf( esc_html__( 'by %s', 'cosmetic-store' ), 'Misbah WP' ); ?>
              <a href="<?php echo esc_url('https://wordpress.org'); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'cosmetic-store' ), 'WordPress' ); ?></a>
          </p>
          </div>
        </div>
    </div>
    </div>
  </div>
     <?php $cosmetic_store_scroll_top_icon = get_theme_mod( 'cosmetic_store_scroll_top_icon', 'dashicons dashicons-arrow-up-alt' ); ?>
        <?php if ( get_theme_mod('cosmetic_store_scroll_enable_setting', true) == true ) : ?>
          <div class="scroll-up">
              <a href="#tobottom"><span class="dashicons dashicons-<?php echo esc_attr( $cosmetic_store_scroll_top_icon ); ?>"></span></a>
          </div>
        <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>
