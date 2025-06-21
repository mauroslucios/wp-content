<?php
/**
 * The template for displaying similar posts
 * 
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

$beauty_salon_spa_post_args = array(
    'posts_per_page'    => '3',
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$related = wp_get_post_terms( get_the_ID(), 'category' );
$beauty_salon_spa_ids = array();
foreach( $related as $term ) {
    $beauty_salon_spa_ids[] = $term->term_id;
}

$beauty_salon_spa_post_args['category__in'] = $beauty_salon_spa_ids; 

$related_posts = new WP_Query( $beauty_salon_spa_post_args );

if ( $related_posts->have_posts() ) : ?>
    <div id="Category-section" class="similar-post">
        <h3 class="text-center pb-3"><?php echo esc_html(get_theme_mod('beauty_salon_spa_similar_text',__('Explore More','beauty-salon-spa'))); ?></h3>
        <div class="row">
            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="postbox smallpostimage p-3">
                        <?php $blog_archive_ordering = get_theme_mod('archieve_post_order', array('title', 'image', 'excerpt','btn'));
                        foreach ($blog_archive_ordering as $post_data_order) :
                            if ('title' === $post_data_order) :?>
                                <h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <?php elseif ('image' === $post_data_order) :?>
                                <?php
                                    if(has_post_thumbnail()) { ?>
                                    <div class="box-content-post text-center">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php }?>
                            <?php elseif ('excerpt' === $post_data_order) :?>
                                <p class="text-center"><?php beauty_salon_spa_custom_excerpt(); ?></p>
                            <?php elseif ('btn' === $post_data_order) :?>
                                <div class="link-more mb-2 text-center">
                                    <a class="more-link" href="<?php echo esc_url( get_permalink() );?>"><?php echo esc_html(get_theme_mod('beauty_salon_spa_read_more_text',__('Read More','beauty-salon-spa'))); ?></a>
                                </div>
                            <?php endif;
                        endforeach;
                        ?>       
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();