<?php
/**
 * Displays main header
 *
 * @package Fashion Estore
 */
?>

<div class="main_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 align-self-center">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) :
                        ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-7 align-self-center">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="pro_search">
                        <?php get_product_search_form(); ?>
                    </div>
                <?php }?>
            </div>
            <div class="col-lg-3 col-md-4 col-8 align-self-center">
                <div class="call-info">
                    <div class="row">
                        <?php if(get_theme_mod('fashion_estore_phone_number_info') != ''){ ?>
                            <div class="col-lg-2 col-md-2 col-3">
                                <i class="<?php echo esc_html( get_theme_mod('fashion_estore_phone_number_icon') ); ?>"></i>
                            </div>
                            <div class="col-lg-10 col-md-10 col-9">
                                <strong><?php echo esc_html(get_theme_mod('fashion_estore_phone_number_text','')); ?></strong>
                                <p><?php echo esc_html(get_theme_mod('fashion_estore_phone_number_info','')); ?></p>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-4 align-self-center">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="cart_box">
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','fashion-ecommerce-zone' ); ?>"><i class="fas fa-shopping-bag"></i><span class="cart-value"><?php echo sprintf ( esc_html( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>