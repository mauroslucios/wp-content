<?php
/**
 * Displays footer widgets if assigned
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 * @version 1.4
 */
?>

<?php //Set widget areas classes based on user choice
    $beauty_salon_spa_footer_columns = get_theme_mod('beauty_salon_spa_footer_widget', '4');
    if ($beauty_salon_spa_footer_columns == '3') {
      $beauty_salon_spa_cols = 'col-lg-4 col-md-6';
    } elseif ($beauty_salon_spa_footer_columns == '4') {
      $beauty_salon_spa_cols = 'col-lg-3 col-md-6';
    } elseif ($beauty_salon_spa_footer_columns == '2') {
      $beauty_salon_spa_cols = 'col-lg-6 col-md-6';
    } else {
      $beauty_salon_spa_cols = 'col-lg-12 col-md-12';
    }
  ?>
  <?php
  if ( is_active_sidebar( 'footer-1' ) ||
    is_active_sidebar( 'footer-2' ) ||
    is_active_sidebar( 'footer-3' ) ||
    is_active_sidebar( 'footer-4' ) ) {
  ?>
    <aside class="widget-area" role="complementary">
      <div class="row">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
          <div class="widget-column footer-widget-1 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <?php dynamic_sidebar( 'footer-1'); ?>
          </div>
        <?php endif; ?>
        <?php if ( $beauty_salon_spa_footer_columns >= '2' && is_active_sidebar( 'footer-2' ) ) : ?>
          <div class="widget-column footer-widget-2 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <?php dynamic_sidebar( 'footer-2'); ?>
          </div>
        <?php endif; ?>
        <?php if ( $beauty_salon_spa_footer_columns >= '3' && is_active_sidebar( 'footer-3' ) ) : ?>
          <div class="widget-column footer-widget-3 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <?php dynamic_sidebar( 'footer-3'); ?>
          </div>
        <?php endif; ?>
         <?php if ( $beauty_salon_spa_footer_columns >= '4' && is_active_sidebar( 'footer-4' ) ) : ?>
          <div class="widget-column footer-widget-4 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <?php dynamic_sidebar( 'footer-4'); ?>
          </div>
        <?php endif; ?>
      </div>
    </aside>
  <?php } else { ?>
    <aside class="widget-area default-footer" role="complementary">
      <div class="row">
        <div class="widget-column footer-widget-1 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Archieves', 'beauty-salon-spa' ); ?></h3>
            <?php
              wp_get_archives(array(
                'type' => 'monthly',
                'show_post_count' => false,
                'limit' => 5,
            ));
            ?>
        </div>
        <div class="widget-column footer-widget-2 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Categories', 'beauty-salon-spa' ); ?></h3>
            <?php
            wp_list_categories(array(
                'title_li' => '',
                'number'   => 5,
            ));
            ?>
        </div>
        <div class="widget-column footer-widget-3 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Recent Posts', 'beauty-salon-spa' ); ?></h3>
            <ul>
                <?php
                    $recent_posts = wp_get_recent_posts(array('numberposts' => 5));
                    foreach( $recent_posts as $recent ){
                        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   esc_html($recent["post_title"]) . '</a></li>';
                    }
                ?>
            </ul>
        </div>
        <div class="widget-column footer-widget-4 <?php echo esc_attr( $beauty_salon_spa_cols ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Search', 'beauty-salon-spa' ); ?></h3>
            <?php get_search_form(); ?>
        </div>
      </div>
    </aside>
<?php } ?>
