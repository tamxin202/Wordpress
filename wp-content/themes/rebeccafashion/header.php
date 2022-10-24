<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
        wp_body_open();
    ?>
    <a class="screen-reader-text skip-link" href="#content"><?php echo esc_html__( 'Skip to content', 'rebeccafashion' ); ?></a>
    <?php
        $wrapper_classes  = 'site-header';
        $wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
        $blog_info        = get_bloginfo( 'name' );
        $description      = get_bloginfo( 'description', 'display' );
    ?>
    <header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>">
        <nav class="site-nav">
            <div class="container">
                <div class="site-nav-wrap">                    
                    <div class="mobile-toggle">
                        <div class="menu-name"><?php esc_html_e( 'Menu', 'rebeccafashion' ); ?></div>
                        <a href="javascript:void(0)" class="open-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu(
                                array(
                                'container'         => false,
                                'theme_location'    => 'primary',
                                'menu_class'        => 'primary-menu',
                                'menu_id'           => 'primary-menu',
                                'depth'             => 3,
                                'link_after'        => '<span class="toggle"><i class="caret fa fa-angle-down"></i></span>'
                            ));
                        } else {  ?>
                            <a class="add-menu" href="<?php echo esc_url(home_url('/') . 'wp-admin/nav-menus.php'); ?>"><?php echo esc_html__( 'Add a menu', 'rebeccafashion' ); ?></a><?php
                        }
                    ?>
                    <div class="site-nav-icons">
                        <?php
                            get_template_part( 'template-parts/social' );
                        ?>
                        <div class="search-wrap">
                            <a class="search-toggle" href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
                            </a>
                            <?php get_search_form(); ?>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </nav>
        <div class="container">
            <?php
                $blog_info   = get_bloginfo( 'name' );
                $description = get_bloginfo( 'description', 'display' );
            ?>
            <div class="site-branding">
                <?php if ( has_custom_logo() ) { ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php if ( $description && get_theme_mod('rebecca_site_display_tagline') ) { ?>
                		<p class="site-description">
                			<?php echo wp_kses_post( $description ); ?>
                		</p>
                	<?php } ?>
                <?php } else { ?>
                    <?php if ( $blog_info ) { ?>
                        <?php if ( is_front_page() && ! is_paged() ) { ?>
                			<h1 class="site-title"><?php echo esc_html( $blog_info ); ?></h1>
                		<?php } elseif ( is_front_page() || is_home() ) { ?>
                			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
                		<?php } else { ?>
                			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
                		<?php } ?>
                        <?php if ( $description && get_theme_mod('rebecca_site_display_tagline') ) { ?>
                    		<p class="site-description">
                    			<?php echo wp_kses_post( $description ); ?>
                    		</p>
                    	<?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </header>
    <div id="content" class="site-container">
        <div class="container">
