<?php
/**
 * Fashion Estore Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Fashion Estore
 */

if ( ! defined( 'FASHION_ESTORE_URL' ) ) {
    define( 'FASHION_ESTORE_URL', esc_url( 'https://www.themagnifico.net/themes/fashion-store-wordpress-theme/', 'fashion-estore') );
}
if ( ! defined( 'FASHION_ESTORE_TEXT' ) ) {
    define( 'FASHION_ESTORE_TEXT', __( 'Fashion Estore Pro','fashion-estore' ));
}

use WPTRT\Customize\Section\Fashion_Estore_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Fashion_Estore_Button::class );

    $manager->add_section(
        new Fashion_Estore_Button( $manager, 'fashion_estore_pro', [
            'title'       => esc_html( FASHION_ESTORE_TEXT,'fashion-estore' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'fashion-estore' ),
            'button_url'  => esc_url( FASHION_ESTORE_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'fashion-estore-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'fashion-estore-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fashion_estore_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title',
            'render_callback' => 'fashion_estore_customize_partial_blogname',
        ));
    }

    // Theme Color
    $wp_customize->add_section('fashion_estore_color_option',array(
        'title' => esc_html__('Theme Color','fashion-estore'),
        'description' => esc_html__('Change theme color on one click.','fashion-estore'),
        'priority'   => 10,
    ));

    $wp_customize->add_setting( 'fashion_estore_theme_color', array(
        'default' => '#ff5353',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_estore_theme_color', array(
        'label' => esc_html__('First Color Option','fashion-estore'),
        'section' => 'fashion_estore_color_option',
        'settings' => 'fashion_estore_theme_color' 
    )));

    $wp_customize->add_setting( 'fashion_estore_theme_color_2', array(
        'default' => '#0f1114',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_estore_theme_color_2', array(
        'label' => esc_html__('Second Color Option','fashion-estore'),
        'section' => 'fashion_estore_color_option',
        'settings' => 'fashion_estore_theme_color_2' 
    )));

    // Top Header
    $wp_customize->add_section('fashion_estore_top_header',array(
        'title' => esc_html__('Top Header','fashion-estore'),
        'priority'   => 20,
    ));

    $wp_customize->add_setting('fashion_estore_phone_number_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_estore_phone_number_text',array(
        'label' => esc_html__('Text','fashion-estore'),
        'section' => 'fashion_estore_top_header',
        'setting' => 'fashion_estore_phone_number_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('fashion_estore_phone_number_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_estore_phone_number_icon',array(
        'label' => esc_html__('Add Phone Icon','fashion-estore'),
        'section' => 'fashion_estore_top_header',
        'setting' => 'fashion_estore_phone_number_icon',
        'type'  => 'text',
        'default' => 'fas fa-phone',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-phone','fashion-estore')
    ));

    $wp_customize->add_setting('fashion_estore_phone_number_info',array(
        'default' => '',
        'sanitize_callback' => 'fashion_estore_sanitize_phone_number'
    )); 
    $wp_customize->add_control('fashion_estore_phone_number_info',array(
        'label' => esc_html__('Phone Number','fashion-estore'),
        'section' => 'fashion_estore_top_header',
        'setting' => 'fashion_estore_phone_number_info',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('fashion_estore_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'fashion_estore_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'fashion_estore_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'fashion-estore' ),
        'section'        => 'fashion_estore_top_header',
        'settings'       => 'fashion_estore_sticky_header',
        'type'           => 'checkbox',
    )));

    // General Settings
     $wp_customize->add_section('fashion_estore_general_settings',array(
        'title' => esc_html__('General Settings','fashion-estore'),
        'description' => esc_html__('General settings of our theme.','fashion-estore'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('fashion_estore_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'fashion_estore_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'fashion_estore_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'fashion-estore' ),
        'section'        => 'fashion_estore_general_settings',
        'settings'       => 'fashion_estore_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'fashion_estore_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_estore_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','fashion-estore'),
        'section' => 'fashion_estore_general_settings',
        'settings' => 'fashion_estore_preloader_bg_color' 
    )));
    
    $wp_customize->add_setting( 'fashion_estore_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_estore_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','fashion-estore'),
        'section' => 'fashion_estore_general_settings',
        'settings' => 'fashion_estore_preloader_dot_1_color' 
    )));

    $wp_customize->add_setting( 'fashion_estore_preloader_dot_2_color', array(
        'default' => '#ff5353',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_estore_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','fashion-estore'),
        'section' => 'fashion_estore_general_settings',
        'settings' => 'fashion_estore_preloader_dot_2_color' 
    )));

    // Social Link
    $wp_customize->add_section('fashion_estore_social_link',array(
        'title' => esc_html__('Social Links','fashion-estore'),
        'priority'   => 40,
    ));

    $wp_customize->add_setting('fashion_estore_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_estore_facebook_icon',array(
        'label' => esc_html__('Add Facebook Icon','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','fashion-estore')
    ));

    $wp_customize->add_setting('fashion_estore_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_estore_facebook_url',array(
        'label' => esc_html__('Facebook Link','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('fashion_estore_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_estore_twitter_icon',array(
        'label' => esc_html__('Add Twitter Icon','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_twitter_icon',
        'type'  => 'text',
        'default' => 'fab fa-twitter',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','fashion-estore')
    ));

    $wp_customize->add_setting('fashion_estore_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_estore_twitter_url',array(
        'label' => esc_html__('Twitter Link','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_twitter_url',
        'type'  => 'url'
    ));

     $wp_customize->add_setting('fashion_estore_intagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_estore_intagram_icon',array(
        'label' => esc_html__('Add Intagram Icon','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_intagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','fashion-estore')
    ));

    $wp_customize->add_setting('fashion_estore_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_estore_intagram_url',array(
        'label' => esc_html__('Intagram Link','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('fashion_estore_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_estore_linkedin_icon',array(
        'label' => esc_html__('Add Linkedin Icon','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','fashion-estore')
    ));

    $wp_customize->add_setting('fashion_estore_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_estore_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('fashion_estore_pintrest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_estore_pintrest_icon',array(
        'label' => esc_html__('Add Pinterest Icon','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_pintrest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','fashion-estore')
    ));

    $wp_customize->add_setting('fashion_estore_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_estore_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','fashion-estore'),
        'section' => 'fashion_estore_social_link',
        'setting' => 'fashion_estore_pintrest_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('fashion_estore_top_slider',array(
        'title' => esc_html__('Slider Settings','fashion-estore'),
        'description' => esc_html__('Here you have to add 3 different pages in below dropdown. Note: Image Dimensions 1400 x 550 px','fashion-estore'),
        'priority'   => 50,
    ));

    for ( $count = 1; $count <= 3; $count++ ) {

        $wp_customize->add_setting( 'fashion_estore_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'fashion_estore_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'fashion_estore_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'fashion-estore' ),
            'section'  => 'fashion_estore_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    // Footer
    $wp_customize->add_section('fashion_estore_site_footer_section', array(
        'title' => esc_html__('Footer', 'fashion-estore'),
        'priority'   => 70,
    ));

    $wp_customize->add_setting('fashion_estore_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('fashion_estore_footer_text_setting', array(
        'label' => __('Replace the footer text', 'fashion-estore'),
        'section' => 'fashion_estore_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'fashion_estore_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fashion_estore_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fashion_estore_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fashion_estore_customize_preview_js(){
    wp_enqueue_script('fashion-estore-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'fashion_estore_customize_preview_js');