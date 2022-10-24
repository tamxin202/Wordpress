<?php if ( get_theme_mod('fashion_footwear_blog_box_enable') ) : ?>

<?php $args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('fashion_footwear_blog_slide_category'),
  'posts_per_page' => get_theme_mod('fashion_footwear_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $arr_posts = new WP_Query( $args );
    if ( $arr_posts->have_posts() ) :
      while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <div class="blog_inner_box">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="blog_box pt-3 pt-md-0">
                <?php if ( get_theme_mod('fashion_footwear_extra_text') ) : ?>
                  <h6><?php echo esc_html(get_theme_mod('fashion_footwear_extra_text'));?></h6>
                <?php endif; ?>
                <?php if ( get_theme_mod('fashion_footwear_title_unable_disable',true) ) : ?>
                  <h3><?php the_title(); ?></h3>
                <?php endif; ?>
                <p class="slider-text"><?php echo wp_trim_words( get_the_content(), 25); ?></p>
                <?php if ( get_theme_mod('fashion_footwear_button_unable_disable',true) ) : ?>
                  <p class="slider-button mt-5">
                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('Shop Now','fashion-footwear'); ?></a>
                  </p>
                <?php endif; ?>
                <?php $fashion_footwear_settings = get_theme_mod( 'fashion_footwear_social_links_settings' ); ?>
                <div class="social-links text-center text-md-right py-2 py-md-3">
                  <?php if ( is_array($fashion_footwear_settings) || is_object($fashion_footwear_settings) ){ ?>
                    <span class="mr-2"><?php esc_html_e('Connect With Us - ','fashion-footwear'); ?></span>
                    <?php foreach( $fashion_footwear_settings as $fashion_footwear_setting ) { ?>
                      <a href="<?php echo esc_url( $fashion_footwear_setting['link_url'] ); ?>">
                        <i class="<?php echo esc_attr( $fashion_footwear_setting['link_text'] ); ?> mr-1"></i>
                      </a>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="image-box">
                <?php
                  if ( has_post_thumbnail() ) :
                    the_post_thumbnail();
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>