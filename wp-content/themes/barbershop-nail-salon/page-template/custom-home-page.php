<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('beauty_salon_spa_slider_arrows', false) !== 'off'){ ?>
    <section id="slider">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <?php $barbershop_nail_salon_slider_count = get_theme_mod('beauty_salon_spa_slider_count'); ?>
        <?php
          for ( $i = 1; $i <= $barbershop_nail_salon_slider_count; $i++ ) {
            $barbershop_nail_salon_mod =  get_theme_mod( 'beauty_salon_spa_post_setting' . $i );
            if ( 'page-none-selected' != $barbershop_nail_salon_mod ) {
              $beauty_salon_spa_slide_post[] = $barbershop_nail_salon_mod;
            }
          }
           if( !empty($beauty_salon_spa_slide_post) ) :
          $barbershop_nail_salon_args = array(
            'post_type' =>array('post'),
            'post__in' => $beauty_salon_spa_slide_post,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($beauty_salon_spa_slide_post) && is_sticky()) {
            $barbershop_nail_salon_args['post__in'] = get_option('sticky_posts');
          }

          $barbershop_nail_salon_query = new WP_Query( $barbershop_nail_salon_args );
          if ( $barbershop_nail_salon_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $barbershop_nail_salon_query->have_posts() ) : $barbershop_nail_salon_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else{?>
              <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/slider.png" alt="" />
            <?php } ?>
            <div class="carousel-caption slider-inner">
              <h2><?php the_title();?></h2>
              <?php if( get_option('beauty_salon_spa_slider_excerpt_show_hide',false) != 'off' ){ ?>
                <p class="slider-excerpt mb-0"><?php echo wp_trim_words(get_the_content(), get_theme_mod('beauty_salon_spa_slider_excerpt_count',20) );?></p>
              <?php } ?>
              <div class="home-btn my-4">
                <a class="py-sm-3 px-sm-4 py-2 px-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('beauty_salon_spa_slider_read_more',__('BOOK NOW','barbershop-nail-salon'))); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>
  <?php if( get_option('beauty_salon_spa_services_show_hide', false) !== 'off'){ ?>
    <section id="home-services" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('beauty_salon_spa_services_short_title') != '' ){ ?>
          <h3 class="text-center service-short-text"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_short_title','')); ?></h3>
        <?php }?>
        <?php if( get_theme_mod('beauty_salon_spa_services_main_title') != '' ){ ?>
          <p class="heading-text text-center mb-0"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_main_title','')); ?></p>
        <?php }?>
        <div class="row pt-5">
          <?php
            $barbershop_nail_salon_project_category=  get_theme_mod('beauty_salon_spa_services_category_setting');if($barbershop_nail_salon_project_category){
            $barbershop_nail_salon_page_query = new WP_Query(array( 

              'category_name' => esc_html($barbershop_nail_salon_project_category ,'barbershop-nail-salon'),

              'posts_per_page' => get_theme_mod('beauty_salon_spa_service_count')

            ));?>
              <?php while( $barbershop_nail_salon_page_query->have_posts() ) : $barbershop_nail_salon_page_query->the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-sm-5">
                  <div class="box mb-5 wow swing">
                    <div class="img-box">
                      <?php if(has_post_thumbnail()){ 
                         the_post_thumbnail(); 
                      } else{?>
                        <img class="default-sec-img" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/service.png" alt="" />
                      <?php } ?>
                    </div>
                    <div class="box-content">
                      <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                     <p><?php echo wp_trim_words( get_the_content(), 10 );?></p>
                      <div class="box-button">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','barbershop-nail-salon');?></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile;
            wp_reset_postdata();
          }?>
        </div>
      </div>
    </section>
  <?php }?>
  <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
