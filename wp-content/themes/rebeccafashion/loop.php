<?php
$sidebar = true;

if ( ! is_active_sidebar( 'sidebar' ) ) {
    $sidebar = false;
}

$blog_cols = 'col-xl-9 col-lg-8 col-md-7';
if ( ! $sidebar ) {
    $blog_cols = 'col';
}

$sizes = array( 'sizes' => '(max-width: 575.98px) calc( 100vw - 24px ), (max-width: 767.98px) 516px, (max-width: 991.98px) 396px, (max-width: 1199.98px) 616px, (max-width: 1399.98px) 831px, 966px' );

?>
<div class="row">
    <div class="<?php echo esc_attr( $blog_cols ); ?>">
    <?php
        if ( have_posts() ) {
            ?>
            <div class="rebeccafashion-blog blog-standard">
                <div class="row">
                <?php
                    while ( have_posts() ) {
                        the_post();
                        ?>
                        <article <?php post_class( 'post-large' ); ?>>
                            <?php if ( get_the_post_thumbnail() ) { ?>
                            <a class="entry-image" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'full', $sizes ); ?>
                            </a>
                            <?php } ?>
                            <div class="entry-meta">
                                <div class="entry-date">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo get_the_date(); ?>
                                    </a>
                                </div>
                                <div class="entry-categories">
                                    <?php the_category( '<span class="sep">/</span>' ); ?>
                                </div>
                            </div>
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="entry-excerpt">
                                <?php echo wp_trim_words( get_the_excerpt(), 50, '...' ); ?>
                            </div>
                        </article>
                        <?php
                    }
                ?>
                </div>
            </div>
            <?php
            the_posts_pagination();
        } else {
            get_template_part( 'template-parts/content', 'none' );
        }
    ?>
    </div>
    <?php if ( $sidebar ) { ?>
    <div class="col-xl-3 col-lg-4 col-md-5 sidebar">
        <?php
            get_sidebar();
        ?>
    </div>
    <?php } ?>
</div>
