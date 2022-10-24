<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('fashion-footwear-footer-sidebar')) {
        echo '<div class="row sidebar-area footer-area">';
          dynamic_sidebar('fashion-footwear-footer-sidebar');
        echo '</div>';
      }
    ?>
    <div class="row">
      <div class="col-md-12">
        <p class="mb-0 py-3 text-center text-md-left">
          <?php
            if (!get_theme_mod('fashion_footwear_footer_text') ) { ?>
              <?php esc_html_e('Fashion Footwear WordPress Theme','fashion-footwear'); ?>
            <?php } else {
              echo esc_html(get_theme_mod('fashion_footwear_footer_text'));
            }
          ?>
          <?php if ( get_theme_mod('fashion_footwear_copyright_enable', true) == true ) : ?>
            <?php
            /* translators: %s: Misbah WP */
            printf( esc_html__( 'by %s', 'fashion-footwear' ), 'Misbah WP' ); ?>
            <a href="<?php echo esc_url(__('https://wordpress.org', 'fashion-footwear' )); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'fashion-footwear' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </p>
      </div>
    </div>
    <?php if ( get_theme_mod('fashion_footwear_scroll_enable_setting', true) == true ) : ?>
      <div class="scroll-up">
        <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
      </div>
    <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
