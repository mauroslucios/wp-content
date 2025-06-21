<div class="<?php linnet_print_archive_entry_class("h-column h-column-container d-flex  masonry-item style-306-outer style-local-1845-m4-outer");?>" data-masonry-width="<?php linnet_print_masonry_col_class(true); ?>">
  <div data-colibri-id="1845-m4" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-0 style-306 style-local-1845-m4 position-relative">
    <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
      <div data-href="<?php the_permalink(); ?>" data-colibri-component="link" data-colibri-id="1845-m5" class="colibri-post-thumbnail <?php linnet_post_thumbnail_classes(); ?> <?php linnet_post_thumb_placeholder_classes(); ?> style-307 style-local-1845-m5 h-overflow-hidden position-relative h-element">
        <div class="h-global-transition-all colibri-post-thumbnail-shortcode style-dynamic-1845-m5-height">
          <?php linnet_post_thumbnail(array (
            'link' => true,
          )); ?>
        </div>
        <div class="colibri-post-thumbnail-content align-items-lg-center align-items-md-center align-items-center flex-basis-100">
          <div class="w-100 h-y-container"></div>
        </div>
      </div>
      <div data-colibri-id="1845-m6" class="h-row-container gutters-row-lg-2 gutters-row-md-3 gutters-row-3 gutters-row-v-lg-2 gutters-row-v-md-0 gutters-row-v-0 style-110 style-local-1845-m6 position-relative">
        <div class="h-row justify-content-lg-start justify-content-md-start justify-content-start align-items-lg-stretch align-items-md-stretch align-items-stretch gutters-col-lg-2 gutters-col-md-3 gutters-col-3 gutters-col-v-lg-2 gutters-col-v-md-0 gutters-col-v-0">
          <div class="h-column h-column-container d-flex h-col-lg-auto h-col-md-auto h-col-auto style-309-outer style-local-1845-m7-outer">
            <div data-colibri-id="1845-m7" class="d-flex h-flex-basis h-column__inner h-px-lg-2 h-px-md-2 h-px-2 v-inner-lg-2 v-inner-md-2 v-inner-2 style-309 style-local-1845-m7 position-relative">
              <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
                <div data-colibri-id="1845-m8" class="h-blog-title style-311 style-local-1845-m8 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php linnet_post_title(array (
                      'heading_type' => 'h3',
                      'classes' => 'colibri-word-wrap',
                    )); ?>
                  </div>
                </div>
                <?php if ( \ColibriWP\Theme\Core\Hooks::prefixed_apply_filters( 'show_post_meta', true ) ): ?>
                <div data-colibri-id="1845-m9" class="h-blog-meta style-315 style-local-1845-m9 position-relative h-element">
                  <div name="1" class="metadata-item">
                    <span class="metadata-prefix">
                      <?php esc_html_e('by','linnet'); ?>
                    </span>
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
                      <?php echo esc_html(get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) )); ?>
                    </a>
                  </div>
                  <div name="2" class="metadata-item">
                    <span class="metadata-prefix">
                      <?php esc_html_e('on','linnet'); ?>
                    </span>
                    <a href="<?php linnet_post_meta_date_url(); ?>">
                      <?php linnet_the_date('M j'); ?>
                    </a>
                  </div>
                </div>
                <?php endif; ?>
                <div data-colibri-id="1845-m10" class="style-312 style-local-1845-m10 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php linnet_post_excerpt(array (
                      'max_length' => 16,
                    )); ?>
                  </div>
                </div>
                <div data-colibri-id="1845-m11" class="h-x-container style-120 style-local-1845-m11 position-relative h-element">
                  <div class="h-x-container-inner style-dynamic-1845-m11-group">
                    <span class="h-button__outer style-318-outer style-local-1845-m12-outer d-inline-flex h-element">
                      <a h-use-smooth-scroll="true" href="<?php the_permalink(); ?>" data-colibri-id="1845-m12" class="d-flex w-100 align-items-center h-button justify-content-lg-center justify-content-md-center justify-content-center style-318 style-local-1845-m12 position-relative">
                        <span>
                          <?php esc_html_e('read more','linnet'); ?>
                        </span>
                        <span class="h-svg-icon h-button__icon style-318-icon style-local-1845-m12-icon">
                          <!--Icon by Icons8 Line Awesome (https://icons8.com/line-awesome)-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="arrow-right" viewBox="0 0 512 545.5">
                            <path d="M299.5 140.5l136 136 11 11.5-11 11.5-136 136-23-23L385 304H64v-32h321L276.5 163.5z"></path>
                          </svg>
                        </span>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
