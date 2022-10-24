<?php
    $categories   = get_the_category($post->ID);
    $category_ids = array();
    
    if ( $categories ) {
        
    	foreach($categories as $individual_category) {
            $category_ids[] = $individual_category->term_id;
    	}
    
    	$args = array(
    		'category__in'        => $category_ids,
    		'post__not_in'        => array($post->ID),
    		'posts_per_page'      => 3,
    		'ignore_sticky_posts' => 1,
    		'orderby'             => 'rand'
    	);
    
    	$single_related_posts = new WP_Query( $args );
        if( $single_related_posts->have_posts() ) { ?>
        <div class="single-related-posts">
            <h4 class="post-related-title"><?php esc_html_e( 'You May Also Like', 'rebeccafashion' ); ?></h4>
            <div class="row">
            <?php while( $single_related_posts->have_posts() ) { ?>
                <?php $single_related_posts->the_post(); ?>
                <article <?php post_class( 'col-sm-6 col-lg-4' ); ?>>                
                    <?php if ( get_the_post_thumbnail() ) { ?>
                    <a class="entry-image" href="<?php the_permalink() ?>">
                        <?php
                            the_post_thumbnail( 'large', array(
                                'sizes' => '(max-width: 575.98px) calc( 100vw - 24px ),
                                (max-width: 767.98px) 246px,
                                (max-width: 991.98px) 336px,
                                (max-width: 1399.98px) 261px,
                                306px'
                            ) );
                        ?>
                    </a>                    
                    <?php } ?>
                    <div class="entry-meta">
                        <div class="entry-date"><?php echo  get_the_date(); ?></div>
                        <div class="entry-categories"><?php the_category( '<span class="sep">/</span>' ); ?></div>
                    </div>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink() ?>">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                </article>
            <?php } ?>
    		</div> 
        </div>
        <?php
        }
    }
    wp_reset_postdata();
?>
