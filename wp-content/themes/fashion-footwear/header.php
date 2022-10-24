<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fashion-footwear' ); ?></a>

<header id="site-navigation" class="header py-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-4 align-self-center">
				<div class="logo text-center text-md-left mb-3 mb-lg-0">
		    		<div class="logo-image">
		    			<?php echo esc_url( the_custom_logo() ); ?>
			    	</div>
			    	<div class="logo-content">
				    	<?php
				    		if ( get_theme_mod('fashion_footwear_display_header_title', true) == true ) :
					      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
					      			echo esc_attr(get_bloginfo('name'));
					      		echo '</a>';
					      	endif;

					      	if ( get_theme_mod('fashion_footwear_display_header_text', true) == true ) :
				      			echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
				      		endif;
			    		?>
					</div>
				</div>
		   	</div>
		   	<div class="col-lg-4 col-md-8 col-sm-8 align-self-center text-center text-md-left">
			   	<?php if(has_nav_menu('main-menu')){ ?>
					<button class="menu-toggle my-2 py-2 px-3 text-center" aria-controls="top-menu" aria-expanded="false" type="button">
						<span aria-hidden="true"><?php esc_html_e( 'Menu', 'fashion-footwear' ); ?></span>
					</button>
					<nav id="main-menu" class="close-panal">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'container' => 'false'
							));
						?>
						<button class="close-menu my-2 p-2" type="button">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
						</button>
					</nav>
				<?php }?>
		   	</div>
		   	<div class="col-lg-1 col-md-2 col-sm-2 align-self-center text-center text-md-left">
				<?php if ( class_exists( 'woocommerce' ) ) {?>
					<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','fashion-footwear' ); ?>"><i class="fas fa-shopping-cart mr-2"></i><span class="cart-item-box">( <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?> )</span></a>
				<?php }?>
	   		</div>
		   	<div class="col-lg-2 col-md-5 col-sm-5 align-self-center info-head text-center text-md-left">
		   		<?php if ( get_theme_mod('fashion_footwear_header_phone_text') || get_theme_mod('fashion_footwear_header_phone_number') ) : ?>
			   		<div class="row">
			   			<div class="col-lg-3 col-md-3 align-self-center">
			   				<i class="fas fa-phone"></i>
			   			</div>
			   			<div class="col-lg-9 col-md-9 align-self-center">
                  			<h6 class="mb-0"><?php echo esc_html(get_theme_mod('fashion_footwear_header_phone_text'));?></h6>
                  			<p class="mb-0"><?php echo esc_html(get_theme_mod('fashion_footwear_header_phone_number'));?></p>
			   			</div>
			   		</div>
			   	<?php endif; ?>
		   	</div>
		   	<div class="col-lg-2 col-md-5 col-sm-5 align-self-center info-head text-center text-md-left">
		   		<?php if ( get_theme_mod('fashion_footwear_header_email_text') || get_theme_mod('fashion_footwear_header_email_address') ) : ?>
			   		<div class="row">
			   			<div class="col-lg-3 col-md-3 align-self-center">
			   				<i class="fas fa-envelope"></i>
			   			</div>
			   			<div class="col-lg-9 col-md-9 align-self-center">
			   				<h6 class="mb-0"><?php echo esc_html(get_theme_mod('fashion_footwear_header_email_text'));?></h6>
                  			<p class="mb-0"><?php echo esc_html(get_theme_mod('fashion_footwear_header_email_address'));?></p>
			   			</div>
			   		</div>
			   	<?php endif; ?>
		   	</div>
	   	</div>
	</div>
</header>