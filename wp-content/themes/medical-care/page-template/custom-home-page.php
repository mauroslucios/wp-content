<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('medical_care_slider_arrows', false) !== 'off'){ ?>
    <section id="slider">
      <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $medical_care_mod =  get_theme_mod( 'medical_care_post_setting' . $i );
            if ( 'page-none-selected' != $medical_care_mod ) {
              $medical_care_slide_pages[] = $medical_care_mod;
            }
          }
           if( !empty($medical_care_slide_pages) ) :
          $medical_care_slide_args = array(
            'post_type' =>array('post'),
            'post__in' => $medical_care_slide_pages,
            'ignore_sticky_posts'  => true, // Exclude sticky posts by default
          );

          // Check if specific posts are selected
          if (empty($medical_care_slide_pages) && is_sticky()) {
              $medical_care_slide_args['post__in'] = get_option('sticky_posts');
          }

          $medical_care_query = new WP_Query( $medical_care_slide_args );
          if ( $medical_care_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $medical_care_query->have_posts() ) : $medical_care_query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <?php }else{?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.jpg" alt="" />
            <?php } ?>
            <div class="carousel-caption slider-inner">
              <div class="inner_carousel">
                <h2><?php the_title();?></h2>
                <?php if( get_option('medical_care_slider_excerpt_show_hide',true) != 'off'){ ?>
                  <p class="slider-excerpt"><?php echo wp_trim_words(get_the_content(), get_theme_mod('medical_care_slider_excerpt_count',20) );?></p>
                <?php } ?>
                <div class="getstarted-btn">
                  <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('medical_care_slider_read_more',__('Make An Appointment','medical-care'))); ?></a>
                </div>
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
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          </a>
          <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

   <?php if( get_option('medical_care_services_enable', false) !== 'off'){ ?>
      <?php if( get_theme_mod('medical_care_our_services_subtitle') != '' || get_theme_mod('medical_care_our_services_title') != '' || get_theme_mod('medical_care_category_setting') != ''){ ?>
        <div id="our-services">
          <div class="container-md">
            <?php if( get_theme_mod('medical_care_our_services_subtitle') != ''){ ?>
              <strong><?php echo esc_html(get_theme_mod('medical_care_our_services_subtitle','')); ?></strong>
            <?php }?>
            <?php if( get_theme_mod('medical_care_our_services_title') != ''){ ?>
              <h3><?php echo esc_html(get_theme_mod('medical_care_our_services_title','')); ?></h3>
            <?php }?>

            <div class="row">
              <?php
              $medical_care_catData1=  get_theme_mod('medical_care_category_setting');if($medical_care_catData1){
              $medical_care_page_query = new WP_Query(array( 

              'category_name' => esc_html($medical_care_catData1 ,'medical-care'),

              'posts_per_page' => get_theme_mod('medical_care_service_count'),

              ));?>
              <?php while( $medical_care_page_query->have_posts() ) : $medical_care_page_query->the_post(); ?>
                  <div class="col-lg-4 col-md-4 col-sm-4 mb-4">
                    <div class="box wow swing">
                      <?php if(has_post_thumbnail()){ ?>
                        <?php the_post_thumbnail(); ?>
                      <?php }else{?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/image.jpg" alt="" />
                      <?php } ?>
                      <div class="box-content">
                        <h4><?php the_title();?></h4>
                        <p><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
                      </div>
                      <div class="box-button">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','medical-care');?></a>
                      </div>
                    </div>
                  </div>
                <?php endwhile;
                wp_reset_postdata();
              }?>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      <?php }?>
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
