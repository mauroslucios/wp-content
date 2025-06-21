<?php
/**
 * Displays top navigation
 *
 * @subpackage Medical Care
 * @since 1.0
 */
?>

<div id="mySidenav" class="sidenav">
  	<nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','medical-care' ); ?>">
                <a href="javascript:void(0)" class="close-button">x</a>
        <?php
          	wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
          	) );
        ?>
    	
  	</nav>
</div>