<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Medical Care
 * @since 1.0
 */
?>
<?php
  $video = medical_care_get_media(array('video', 'object', 'embed', 'iframe'));
?>
<div id="Category-section" class="entry-content">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="postbox smallpostimage p-3 wow zoomIn">
			<?php $blog_archive_ordering = get_theme_mod('archieve_post_order', array('title', 'image', 'meta','excerpt','btn'));
			foreach ($blog_archive_ordering as $post_data_order) :
				if ('title' === $post_data_order) :?>
				    <h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
				<?php elseif ('image' === $post_data_order) :?>
	        <?php
      			if ( ! is_single() ) {
        			// If not a single post, highlight the video file.
        			if ( ! empty( $video ) ) {
          				foreach ( $video as $video_html ) {
            				echo '<div class="entry-video">';
              				echo $video_html;
            				echo '</div>';
          				}
        			};
      			};
					?> 
				<?php elseif ('meta' === $post_data_order) :?>
				    <div class="date-box mb-2 text-center">
			    	<?php if ( is_sticky() ) { ?>
			    		<span class="me-2"><i class="<?php echo esc_attr(get_theme_mod('medical_care_sticky_icon','fas fa-thumb-tack')); ?> me-2"></i><?php echo esc_html( __('Sticky', 'medical-care') ); ?></span>
			    	<?php } ?>
						<?php if( get_option('medical_care_date',false) != 'off'){ ?>
							<span class="me-2"><i class="<?php echo esc_attr(get_theme_mod('medical_care_date_icon','far fa-calendar-alt')); ?> me-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
						<?php } ?>
						<?php if( get_option('medical_care_admin',false) != 'off'){ ?>
							<span class="entry-author me-2"><i class="<?php echo esc_attr(get_theme_mod('medical_care_author_icon','fas fa-user')); ?> me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
						<?php }?>
						<?php if( get_option('medical_care_comment',false) != 'off'){ ?>
							<span class="entry-comments me-2"><i class="<?php echo esc_attr(get_theme_mod('medical_care_comment_icon','fas fa-comments')); ?> me-2"></i> <?php comments_number( __('0 Comments','medical-care'), __('0 Comments','medical-care'), __('% Comments','medical-care')); ?></span>
						<?php }?>
						<?php if( get_option('medical_care_tag',false) != 'off'){ ?>
							<span class="tags"><i class="<?php echo esc_attr(get_theme_mod('medical_care_tag_icon','fas fa-tags')); ?> me-2"></i> <?php medical_care_display_post_tag_count(); ?></span>
						<?php }?>
					</div>
				<?php elseif ('excerpt' === $post_data_order) :?>
				    <p class="text-center"><?php medical_care_custom_excerpt(); ?></p>
				<?php elseif ('btn' === $post_data_order) :?>
				    <div class="link-more mb-2 text-center">
						<a class="more-link" href="<?php echo esc_url( get_permalink() );?>"><?php echo esc_html(get_theme_mod('medical_care_read_more_text',__('Read More','medical-care'))); ?></a>
			  		</div>
				<?php endif;
			endforeach;
			?>       
		  <div class="clearfix"></div>
		</div>
	</div>
</div>