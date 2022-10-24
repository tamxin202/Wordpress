<?php
function rebeccafashion_sanitize_default( $input ){
    return $input;
}

//radio box sanitization function
function rebeccafashion_sanitize_radio( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function rebeccafashion_sanitize_checkbox( $checked ) {
	return ( isset($checked) && !empty($checked) ? 1 : 0 );
}

function rebeccafashion_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function rebeccafashion_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/** RebeccaFashion - Customizer - Add Settings */
function rebeccafashion_theme_customizer( $wp_customize ) {
    /**
     * Colors
     */
    $wp_customize->add_setting( 'rebeccafashion_primary_color', array( 'default' => '#212121', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccafashion_text_color', array( 'default' => '#363636', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccafashion_accent_color', array( 'default' => '#dd7777', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccafashion_meta_color', array( 'default' => '#666', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccafashion_border_color', array( 'default' => '#ddd', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_primary_color',
			array(
				'label'      => __( 'Primary Color', 'rebeccafashion' ),
				'section'    => 'colors'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_text_color',
			array(
				'label'      => __( 'Text Color', 'rebeccafashion' ),
				'section'    => 'colors'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_accent_color',
			array(
				'label'      => __( 'Accent Color', 'rebeccafashion' ),
				'section'    => 'colors'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_meta_color',
			array(
				'label'      => __( 'Meta Color', 'rebeccafashion' ),
				'section'    => 'colors'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_border_color',
			array(
				'label'      => __( 'Border Color', 'rebeccafashion' ),
				'section'    => 'colors'
			)
		)
	);

    /**
     * Social Media settings
     */
    $wp_customize->add_section( 'rebeccafashion_section_social_media', array( 'title' => __( 'Social Media Settings', 'rebeccafashion' ) ) );

    $wp_customize->add_setting( 'rebeccafashion_facebook', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_twitter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_instagram', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_pinterest', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_youtube', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_tumblr', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_bloglovin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_dribbble', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_soundcloud', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_vimeo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_setting( 'rebeccafashion_linkedin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rebeccafashion_facebook', array(
	   'label'     => __( 'Facebook URL', 'rebeccafashion' ),
	   'section'   => 'rebeccafashion_section_social_media'
	)));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_twitter',
			array(
				'label'      => __( 'Twitter URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_instagram',
			array(
				'label'      => __( 'Instagram URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_pinterest',
			array(
				'label'      => __( 'Pinterest URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_youtube',
			array(
				'label'      => __( 'Youtube URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_tumblr',
			array(
				'label'      => __( 'Tumblr URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_bloglovin',
			array(
				'label'      => __( 'Bloglovin URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_dribbble',
			array(
				'label'      => __( 'Dribbble URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_soundcloud',
			array(
				'label'      => __( 'SoundCloud URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_vimeo',
			array(
				'label'      => __( 'Vimeo URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_linkedin',
			array(
				'label'      => __( 'LinkedIn URL', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_social_media'
			)
		)
	);

    /**
     * Footer settings
     */
    $wp_customize->add_section( 'rebeccafashion_section_footer', array( 'title' => __( 'Footer Settings', 'rebeccafashion' ) ) );

    $wp_customize->add_setting( 'rebeccafashion_footer_copyright', array( 'default' => __( 'Your copyright text here !', 'rebeccafashion' ), 'sanitize_callback' => 'wp_kses_post' ));
    $wp_customize->add_setting( 'rebeccafashion_footer_bg_color', array( 'default' => '#eab6a2', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccafashion_footer_text_color', array( 'default' => '#363636', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'rebeccafashion_footer_icon_color', array( 'default' => '#212121', 'sanitize_callback' => 'sanitize_hex_color' ) );

    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rebeccafashion_footer_copyright',
			array(
				'label'      => __( 'Copyright Text', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_footer',
				'type'		 => 'textarea'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_footer_bg_color',
			array(
				'label'      => __( 'Footer Background Color', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_footer'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_footer_text_color',
			array(
				'label'      => __( 'Footer Text Color', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_footer'
			)
		)
	);

    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rebeccafashion_footer_icon_color',
			array(
				'label'      => __( 'Footer Icon Color', 'rebeccafashion' ),
				'section'    => 'rebeccafashion_section_footer'
			)
		)
	);
}

add_action( 'customize_register', 'rebeccafashion_theme_customizer' );

/**
 * Inline style
 */
function rebeccafashion_inline_style() {
    $custom_css = '';
    /**
     * Colors
     */
    if ( get_theme_mod( 'rebeccafashion_primary_color' ) ) {
        $custom_css .= '
            :root {
                --primary-color: ' . esc_attr( get_theme_mod( 'rebeccafashion_primary_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccafashion_text_color' ) ) {
        $custom_css .= '
            :root{
                --text-color: ' . esc_attr( get_theme_mod( 'rebeccafashion_text_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccafashion_accent_color' ) ) {
        $custom_css .= '
            :root{
                --accent-color: ' . esc_attr( get_theme_mod( 'rebeccafashion_accent_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccafashion_meta_color' ) ) {
        $custom_css .= '
            :root{
                --meta-color: ' . esc_attr( get_theme_mod( 'rebeccafashion_meta_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccafashion_border_color' ) ) {
        $custom_css .= '
            :root{
                --border-color: ' . esc_attr( get_theme_mod( 'rebeccafashion_border_color' ) ) . ';
            }';
    }

    /**
     * Footer
     */
    if ( get_theme_mod( 'rebeccafashion_footer_bg_color' ) ) {
        $custom_css .= '
            .credits {
                background-color: ' . esc_attr( get_theme_mod( 'rebeccafashion_footer_bg_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccafashion_footer_text_color' ) ) {
        $custom_css .= '
            .copyright {
                color: ' . esc_attr( get_theme_mod( 'rebeccafashion_footer_text_color' ) ) . ';
            }';
    }

    if ( get_theme_mod( 'rebeccafashion_footer_icon_color' ) ) {
        $custom_css .= '
            .credits .social-icons a {
                color: ' . esc_attr( get_theme_mod( 'rebeccafashion_footer_icon_color' ) ) . ';
            }';
    }

    wp_add_inline_style( 'rebeccafashion-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'rebeccafashion_inline_style', 15 );

