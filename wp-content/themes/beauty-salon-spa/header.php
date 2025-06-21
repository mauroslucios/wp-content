<?php
/**
 * The header for our theme
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'beauty-salon-spa' ); ?></a>
	<?php if( get_option('beauty_salon_spa_theme_loader',true) != 'off'){ ?>
		<?php $beauty_salon_spa_loader_option = get_theme_mod( 'beauty_salon_spa_loader_style','style_one');
		if($beauty_salon_spa_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($beauty_salon_spa_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="top_bar py-2 text-center wow slideInDown">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-12 col-sm-12 align-self-center text-lg-start top-text">
							<?php if( get_theme_mod('beauty_salon_spa_top_text') != '' ){ ?>
								<p class="mb-0"><?php echo esc_html(get_theme_mod('beauty_salon_spa_top_text','')); ?></p>
							<?php }?>
						</div>
						<div class="col-lg-7 col-md-12 col-sm-12 align-self-center text-lg-end top-info">
							<?php if( get_theme_mod('beauty_salon_spa_email_address') != '' ){ ?>
								<span class="me-md-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_mail_icon','')); ?> me-3"></i><?php echo esc_html(get_theme_mod('beauty_salon_spa_email_address','')); ?></span>
							<?php }?>
							<?php if( get_theme_mod('beauty_salon_spa_location_address') != '' ){ ?>
								<span class="me-md-2"><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_address_icon','')); ?> me-3"></i><?php echo esc_html(get_theme_mod('beauty_salon_spa_location_address','')); ?></span>
							<?php }?>
							<?php if( get_theme_mod('beauty_salon_spa_call_number') != '' ){ ?>
								<span><i class="<?php echo esc_attr(get_theme_mod('beauty_salon_spa_call_icon','')); ?> me-3"></i><?php echo esc_html(get_theme_mod('beauty_salon_spa_call_number','')); ?></span>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
			<div class="wrap_figure">
				<div class="menu_header py-3 wow slideInUp">
					<div class="fixed_header">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-4 col-12 align-self-center">
								<div class="logo py-3 py-md-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $beauty_salon_spa_blog_info = get_bloginfo( 'name' ); ?>
					              		<?php if( get_option('beauty_salon_spa_logo_title',false) != 'off' ){ ?>
						                <?php if ( ! empty( $beauty_salon_spa_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						                  	<?php else : ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                  		<?php endif; ?>
						                <?php endif; ?>
						            <?php }?>
						                <?php
					                  		$beauty_salon_spa_description = get_bloginfo( 'description', 'display' );
						                  	if ( $beauty_salon_spa_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('beauty_salon_spa_logo_text',true) != 'off' ){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($beauty_salon_spa_description); ?>
					                  	</p>
					                  <?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-6 col-md-2 col-sm-2 col-4 align-self-center">
								<div class="toggle-menu gb_menu text-lg-start text-center">
									<button onclick="beauty_salon_spa_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','beauty-salon-spa'); ?></p></button>
								</div>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
							<div class="col-lg-1 col-md-2 col-sm-2 col-3 align-self-center">
								<div class="header-search">
	              					<div class="header-search-wrapper">
						                <span class="search-main">
						                    <i class="search-icon fas fa-search"></i>
						                </span>
						                <span class="search-close-icon"><i class="fas fa-xmark"></i>
						                </span>
						                <div class="search-form-main clearfix">
						                  <?php get_search_form(); ?>
						                </div>
	              					</div>
	            				</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-5 align-self-center text-sm-end text-center">
								<?php if( get_theme_mod('beauty_salon_spa_talk_btn_link') != '' || get_theme_mod('beauty_salon_spa_talk_btn_text') != ''){ ?>
									<p class="chat_btn mb-0"><a href="<?php echo esc_url(get_theme_mod('beauty_salon_spa_talk_btn_link','')); ?>"><?php echo esc_html(get_theme_mod('beauty_salon_spa_talk_btn_text','')); ?></a></p>
								<?php }?>
							</div>
							
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>