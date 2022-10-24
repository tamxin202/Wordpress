<?php if ( get_theme_mod('fashion_footwear_new_arrival_section_enable') ) : ?>
	<div id="new-arrival" class="py-5">
		<div class="container">
			<?php if ( get_theme_mod('fashion_footwear_new_arrival_heading') ) : ?>
    			<h6 class="head_text"><?php echo esc_html(get_theme_mod('fashion_footwear_new_arrival_heading'));?></h6>
    		<?php endif; ?>
	    	<?php if ( get_theme_mod('fashion_footwear_new_arrival_heading_text') ) : ?>
	    		<h3 class="head_text"><?php echo esc_html(get_theme_mod('fashion_footwear_new_arrival_heading_text'));?></h3>
	    	<?php endif; ?>
	    	<div class="row mt-4">
	      		<?php
	      		$fashion_footwear_catData = get_theme_mod('fashion_footwear_new_arrival_category','');
	      		if ( class_exists( 'WooCommerce' ) ) {
	    			$args = array( 
			          	'post_type' => 'product',
			          	'posts_per_page' => 100,
			          	'product_cat' => $fashion_footwear_catData,
			          	'order' => 'ASC'
			        );
	        		$loop = new WP_Query( $args );
	       			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
		          		<div class="col-lg-4 col-lg-4 col-sm-6">
				            <div class="product-image box">
				            	<figure class="mb-0">
					              	<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
					              	<?php if ( has_post_thumbnail() ) { ?>
				                    <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
					                <?php }?>
				              	</figure>
				            </div>
				            <div class="product-details mb-4">
			          			<h5 class="product-text my-2 "><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
			          			<h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></h6>
				          	</div>
		          		</div>
	        		<?php endwhile; wp_reset_query(); ?>
	      		<?php } ?>
		    </div>
		</div>
	</div>
<?php endif; ?>