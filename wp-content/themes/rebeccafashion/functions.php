<?php
/**
 * Theme define
 */
define( 'REBECCALITE_LIBS_URI', get_template_directory_uri() . '/libs/');
define( 'REBECCALITE_CORE_PATH', get_template_directory() . '/core/');

if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Theme setup
 */
function rebeccafashion_setup() {
    if ( ! isset( $content_width ) ) { $content_width = 1320; }
    load_theme_textdomain( 'rebeccafashion', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );
    remove_theme_support( 'widgets-block-editor' );
    register_nav_menus(
        array(
            'primary'   => __( 'Primary Menu', 'rebeccafashion' )
        )
    );

    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true
    );
    add_theme_support( 'custom-logo', $defaults );
    
    add_theme_support( 'wp-block-styles' );
   /**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
}

add_action('after_setup_theme', 'rebeccafashion_setup');

/**
 * Register & Enqueue Styles / Scripts
 */
function rebeccafashion_load_scripts() {
    // CSS
    $fonts_url = '';
    $font_families = array();
    
    $Montserrat = _x( 'on', 'Montserrat: on or off', 'rebeccafashion' );
    $Lora = _x( 'on', 'Lora: on or off', 'rebeccafashion' );
    if ( $Montserrat !== 'off' || $Lora !== 'off' ) {
        if ( 'off' !== $Montserrat ) $font_families[] = 'Montserrat:400,500,400i';
        if ( 'off' !== $Lora ) $font_families[] = 'Lora:400,400i';
    }
    
    if ( !empty( $font_families ) ) {
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
            'display' => 'swap'
        );
    
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
        wp_enqueue_style( 'google-fonts', $fonts_url );
    }
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css.css', array(), rand(1, 999) );
    wp_enqueue_style('bootstrap', REBECCALITE_LIBS_URI . 'bootstrap/bootstrap.min.css');
    wp_enqueue_style('fontawesome', REBECCALITE_LIBS_URI . 'fontawesome/css/all.min.css');
    wp_enqueue_style('rebeccafashion-style', get_template_directory_uri() . '/style.css', array(), rand(1, 999) );

    // JS
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'rebeccafashion-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), rand(1, 999), true );

    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}

add_action( 'wp_enqueue_scripts', 'rebeccafashion_load_scripts' );


/**
 * Register Sidebar
 */
function rebeccafashion_widgets_init() {
    if ( function_exists('register_sidebar') ) {
    	register_sidebar(array(
    		'name'            => __( 'Sidebar', 'rebeccafashion' ),
    		'id'              => 'sidebar',
    		'before_widget'   => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'    => '</div>',
    		'before_title'    => '<h3 class="widget-title">',
    		'after_title'     => '</h3>'
    	));
    }
}

add_action( 'widgets_init', 'rebeccafashion_widgets_init' );

/**
 * Check file exists and require
 */
function rebeccafashion_require_file( $path ) {
    if ( file_exists($path) ) {
        require $path;
    }
}

/**
 * Core Files
 */
rebeccafashion_require_file( REBECCALITE_CORE_PATH . 'customizer.php' );

/**
 * Widgets
 */
rebeccafashion_require_file( REBECCALITE_CORE_PATH . 'widgets/about-me.php' );
rebeccafashion_require_file( REBECCALITE_CORE_PATH . 'widgets/latest-posts.php' );
rebeccafashion_require_file( REBECCALITE_CORE_PATH . 'widgets/social-media-links.php' );
    
if ( ! function_exists( 'rebecca_fashion_share' ) ) {
    /**
     * Post sharing
     */
    function rebecca_fashion_share() {
        global $post;
        $pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
        ?>
    	<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
        <div class="entry-share">
        	<a class="social-icon" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a>
            <a class="social-icon" target="_blank" href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
            <a class="social-icon" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($pin_image); ?>&description=<?php the_title(); ?>"><i class="fab fa-pinterest-p"></i></a>
        </div>
        <?php
    }
}

/**
 * Get Social
 */
function rebeccafashion_social_media( $class = 'social-media') {
    $show = true;

    $facebook   = get_theme_mod('rebeccafashion_facebook');
    $twitter    = get_theme_mod('rebeccafashion_twitter');
    $instagram  = get_theme_mod('rebeccafashion_instagram');
    $pinterest  = get_theme_mod('rebeccafashion_pinterest');
    $bloglovin  = get_theme_mod('rebeccafashion_bloglovin');
    $tumblr     = get_theme_mod('rebeccafashion_tumblr');
    $youtube    = get_theme_mod('rebeccafashion_youtube');
    $dribbble   = get_theme_mod('rebeccafashion_dribbble');
    $soundcloud = get_theme_mod('rebeccafashion_soundcloud');
    $vimeo      = get_theme_mod('rebeccafashion_vimeo');
    $linkedin   = get_theme_mod('rebeccafashion_linkedin');

    if ( !$facebook && !$twitter && !$instagram && !$pinterest && !$bloglovin && !$tumblr && !$youtube && !$dribbble && !$soundcloud && !$vimeo && !$linkedin ) {
        $show = false;
    }

    if ( $show ) { ?>
    <div class="<?php echo esc_attr( $class ); ?>">
        <?php if($facebook) : ?><a class="social-icon" href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fab fa-facebook-f"></i><span class="text"><?php esc_html_e( 'Facebook', 'rebeccafashion' ); ?></span></a><?php endif; ?>
        <?php if($twitter) : ?><a class="social-icon" href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="text"><?php esc_html_e( 'Twitter', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($instagram) : ?><a class="social-icon" href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fab fa-instagram"></i><span class="text"><?php esc_html_e( 'Instagram', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($pinterest) : ?><a class="social-icon" href="<?php echo esc_url($pinterest); ?>" target="_blank"><i class="fab fa-pinterest-p"></i><span class="text"><?php esc_html_e( 'Pinterest', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($bloglovin) : ?><a class="social-icon" href="<?php echo esc_url($bloglovin); ?>" target="_blank"><i class="fa fa-heart"></i><span class="text"><?php esc_html_e( 'Bloglovin', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($tumblr) : ?><a class="social-icon" href="<?php echo esc_url($tumblr); ?>" target="_blank"><i class="fab fa-tumblr"></i><span class="text"><?php esc_html_e( 'Tumblr', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($youtube) : ?><a class="social-icon" href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="fab fa-youtube"></i><span class="text"><?php esc_html_e( 'Youtube', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($dribbble) : ?><a class="social-icon" href="<?php echo esc_url($dribbble); ?>" target="_blank"><i class="fab fa-dribbble"></i><span class="text"><?php esc_html_e( 'Dribbble', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($soundcloud) : ?><a class="social-icon" href="<?php echo esc_url($soundcloud); ?>" target="_blank"><i class="fab fa-soundcloud"></i><span class="text"><?php esc_html_e( 'Soundcloud', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    	<?php if($vimeo) : ?><a class="social-icon" href="<?php echo esc_url($vimeo); ?>" target="_blank"><i class="fab fa-vimeo-square"></i><span class="text"><?php esc_html_e( 'Vimeo', 'rebeccafashion' ); ?></span></a><?php endif; ?>
        <?php if($linkedin) : ?><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fab fa-linkedin"></i><span class="text"><?php esc_html_e( 'LinkedIn', 'rebeccafashion' ); ?></span></a><?php endif; ?>
    </div>
    <?php
    }
}

/**
 * Comment Layout
 */
function rebeccafashion_custom_comment($comment, $args, $depth) {
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		<div class="comment-author">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="comment-content">
			<div class="author-wrap">
                <div class="author-left">
                    <h4 class="author-name"><?php echo get_comment_author_link(); ?></h4>
        			<a class="date-comment" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
        			    <?php printf( __('%1$s at %2$s', 'rebeccafashion'), get_comment_date(),  get_comment_time() ); ?>
                    </a>
                </div>
    			<div class="reply">
    				<?php edit_comment_link( esc_html__( '(Edit)', 'rebeccafashion' ), '  ', '' );?>
    				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    			</div>
            </div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'rebeccafashion' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-text"><?php comment_text(); ?></div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

if ( ! is_admin() ) {
    /**
     * Custom excerpt length
     */
    function rebeccafashion_custom_excerpt_length() {
        return 100;
    }
    
    add_filter( 'excerpt_length', 'rebeccafashion_custom_excerpt_length' );
}

/** Pagination */
function rebeccafashion_pagination() {
    if ( get_the_posts_pagination() ) { ?>
    <div class="rebeccafashion-pagination"><?php
        $args = array(
            'prev_text' => '<span class="fa fa-angle-left"></span>',
            'next_text' => '<span class="fa fa-angle-right"></span>'
        );
        the_posts_pagination($args);
    ?>
    </div>
    <?php
    }
}
