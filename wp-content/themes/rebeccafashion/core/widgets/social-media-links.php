<?php
class Rebecca_Fashion_Social_Media_Links_Widget extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'rebecca-fashion-social-media-links',
            'description' => esc_html__('Social Media Links Widget', 'rebeccafashion')
        );
        
        parent::__construct( 'rebecca-fashion-social-media-links', 'Rebecca Fashion: Social Media Links', $widget_ops );
    }

    public function widget($args, $instance) {

        $instance = wp_parse_args( $instance, $args );
        extract( $instance );

        echo wp_kses_post($before_widget);

        if ( $title ) {
            echo wp_kses_post( $before_title . $title . $after_title );
        }

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

        if ( $fb || $tw || $in || $pi || $yt || $tu || $bl || $dr || $sc || $vm || $li ) {
            ?>
            <div class="social-media-links">
                <?php if ( $fb ) { ?><a href="<?php echo esc_url($facebook); ?>" ><i class="fab fa-facebook-f"></i></a><?php } ?>
                <?php if( $tw ) { ?><a href="<?php echo esc_url($twitter); ?>" ><i class="fab fa-twitter"></i></a><?php } ?>
            	<?php if( $in ) { ?><a href="<?php echo esc_url($instagram); ?>" ><i class="fab fa-instagram"></i></a><?php } ?>
            	<?php if( $pi ) { ?><a href="<?php echo esc_url($pinterest); ?>" ><i class="fab fa-pinterest-p"></i></a><?php } ?>
                <?php if( $yt ) { ?><a href="<?php echo esc_url($youtube); ?>" ><i class="fab fa-youtube"></i></a><?php } ?>
                <?php if( $tu ) { ?><a href="<?php echo esc_url($tumblr); ?>" ><i class="fab fa-tumblr"></i></a><?php } ?>
            	<?php if( $bl ) { ?><a href="<?php echo esc_url($bloglovin); ?>" ><i class="fa fa-heart"></i></a><?php } ?>
            	<?php if( $dr ) { ?><a href="<?php echo esc_url($dribbble); ?>" ><i class="fab fa-dribbble"></i></a><?php } ?>
            	<?php if( $sc ) { ?><a href="<?php echo esc_url($soundcloud); ?>" ><i class="fab fa-soundcloud"></i></a><?php } ?>
            	<?php if( $vm ) { ?><a href="<?php echo esc_url($vimeo); ?>" ><i class="fab fa-vimeo-square"></i></a><?php } ?>
                <?php if( $li ) { ?><a href="<?php echo esc_url($linkedin); ?>" ><i class="fab fa-linkedin"></i></a><?php } ?>
            </div>
            <?php
        }

        echo wp_kses_post($after_widget);
    }
    
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['fb'] = $new_instance['fb'];
        $instance['tw'] = $new_instance['tw'];
        $instance['in'] = $new_instance['in'];
        $instance['pi'] = $new_instance['pi'];
        $instance['yt'] = $new_instance['yt'];
        $instance['tu'] = $new_instance['tu'];
        $instance['bl'] = $new_instance['bl'];
        $instance['dr'] = $new_instance['dr'];
        $instance['sc'] = $new_instance['sc'];
        $instance['vm'] = $new_instance['vm'];
        $instance['li'] = $new_instance['li'];
        return $instance;
    }

    public function form( $instance ) {        
        $defaults = array(
            'title' => 'Social Media Links',
            'fb' => 'off',
            'tw' => 'off',
            'in' => 'off',
            'pi' => 'off',
            'yt' => 'off',
            'tu' => 'off',
            'fb' => 'off',
            'bl' => 'off',
            'dr' => 'off',
            'sc' => 'off',
            'vm' => 'off',
            'li' => 'off'
        );
        
        $instance = wp_parse_args( ( array ) $instance, $defaults );
        extract( $instance );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'rebeccafashion' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p><i>Note: Set your social links in the <a href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=rebeccafashion_section_social_media' ) ); ?>">Customize</a></i></p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'fb' ) ); ?>">Facebook</label>
			<input type="checkbox" <?php checked( $fb, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'fb' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'tw' ) ); ?>">Twitter</label>
			<input type="checkbox" <?php checked( $tw, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'tw' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'in' ) ); ?>">Instagram</label>
			<input type="checkbox" <?php checked( $in, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'in' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'pi' ) ); ?>">Pinterest</label>
			<input type="checkbox" <?php checked( $pi, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'pi' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'yt' ) ); ?>">Youtube</label>
			<input type="checkbox" <?php checked( $yt, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'yt' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'tu' ) ); ?>">Tumblr</label>
			<input type="checkbox" <?php checked( $tu, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'tu' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'bl' ) ); ?>">Bloglovin</label>
			<input type="checkbox" <?php checked( $bl, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'bl' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'dr' ) ); ?>">Dribbble</label>
			<input type="checkbox" <?php checked( $dr, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'dr' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'sc' ) ); ?>">SoudCloud</label>
			<input type="checkbox" <?php checked( $sc, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'sc' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'vm' ) ); ?>">Vimeo</label>
			<input type="checkbox" <?php checked( $vm, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'vm' )); ?>" />
		</p>
        <p>
    		<label for="<?php echo esc_attr( $this->get_field_id( 'li' ) ); ?>">Linked In</label>
			<input type="checkbox" <?php checked( $li, 'on' ); ?> name="<?php echo esc_attr($this->get_field_name( 'li' )); ?>" />
		</p>
        <?php
    }
}

function rebecca_fashion_social_media_links_widget_init() {
    register_widget( 'Rebecca_Fashion_Social_Media_Links_Widget' );
}

add_action( 'widgets_init', 'rebecca_fashion_social_media_links_widget_init' );
