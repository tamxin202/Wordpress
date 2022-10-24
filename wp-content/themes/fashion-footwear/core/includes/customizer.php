<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'fashion_footwear_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'fashion-footwear' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'fashion-footwear' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'fashion-footwear' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );

	// PANEL

	Kirki::add_panel( 'fashion_footwear_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'fashion-footwear' ),
	) );

	// Scroll Top

	Kirki::add_section( 'fashion_footwear_section_scroll', array(
	    'title'          => esc_html__( 'Additional Settings', 'fashion-footwear' ),
	    'description'    => esc_html__( 'Scroll To Top', 'fashion-footwear' ),
	    'panel'          => 'fashion_footwear_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'fashion_footwear_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_section_scroll',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'fashion_footwear_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'fashion-footwear' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'fashion-footwear' ),
	    'panel'          => 'fashion_footwear_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_enable_post_heading',
		'section'     => 'fashion_footwear_section_post',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'fashion_footwear_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// HEADER SECTION

	Kirki::add_section( 'fashion_footwear_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'fashion-footwear' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'fashion-footwear' ),
	    'panel'          => 'fashion_footwear_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_slider_heading',
		'section'     => 'fashion_footwear_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => 'Text',
		'settings' => 'fashion_footwear_header_phone_text',
		'section'  => 'fashion_footwear_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => 'Phone Number',
		'settings' => 'fashion_footwear_header_phone_number',
		'section'  => 'fashion_footwear_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_slider_heading',
		'section'     => 'fashion_footwear_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => 'Text',
		'settings' => 'fashion_footwear_header_email_text',
		'section'  => 'fashion_footwear_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => 'Email Address',
		'settings' => 'fashion_footwear_header_email_address',
		'section'  => 'fashion_footwear_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_enable_socail_link',
		'section'     => 'fashion_footwear_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'fashion_footwear_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'fashion-footwear' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'fashion-footwear' ),
		'settings'     => 'fashion_footwear_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'fashion-footwear' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'fashion-footwear' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'fashion-footwear' ),
				'description' => esc_html__( 'Add the social icon url here.', 'fashion-footwear' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'fashion_footwear_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'fashion-footwear' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'fashion-footwear' ),
        'panel'          => 'fashion_footwear_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_enable_heading',
		'section'     => 'fashion_footwear_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_button_unable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_slider_heading',
		'section'     => 'fashion_footwear_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'fashion_footwear_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'fashion_footwear_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'fashion-footwear' ),
		'priority'    => 10,
		'choices'     => fashion_footwear_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => 'Extra Slider Text',
		'settings' => 'fashion_footwear_extra_text',
		'section'  => 'fashion_footwear_blog_slide_section',
		'default'  => '',
	] );

	// NEW ARRIVAL SECTION

	Kirki::add_section( 'fashion_footwear_new_arrival_section', array(
	    'title'          => esc_html__( 'New Arrival Settings', 'fashion-footwear' ),
	    'panel'          => 'fashion_footwear_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_enable_heading',
		'section'     => 'fashion_footwear_new_arrival_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable New Arrivals',  'fashion-footwear' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_new_arrival_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'fashion-footwear' ),
		'section'     => 'fashion_footwear_new_arrival_section',
		'default'     => '0',
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'fashion-footwear' ),
			'off' => esc_html__( 'Disable',  'fashion-footwear' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'fashion_footwear_new_arrival_heading' ,
        'label'    => esc_html__( 'Heading',  'fashion-footwear' ),
        'section'  => 'fashion_footwear_new_arrival_section',
    ] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'fashion_footwear_new_arrival_heading_text' ,
        'label'    => esc_html__( 'Heading Text',  'fashion-footwear' ),
        'section'  => 'fashion_footwear_new_arrival_section',
    ] );

	// FOOTER SECTION

	Kirki::add_section( 'fashion_footwear_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'fashion-footwear' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'fashion-footwear' ),
        'panel'          => 'fashion_footwear_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_footer_text_heading',
		'section'     => 'fashion_footwear_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'fashion_footwear_footer_text',
		'section'  => 'fashion_footwear_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'fashion_footwear_footer_enable_heading',
		'section'     => 'fashion_footwear_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'fashion-footwear' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'fashion_footwear_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'fashion-footwear' ),
		'section'     => 'fashion_footwear_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fashion-footwear' ),
			'off' => esc_html__( 'Disable', 'fashion-footwear' ),
		],
	] );
}

add_action( 'customize_register', 'fashion_footwear_customizer_settings' );
function fashion_footwear_customizer_settings( $wp_customize ) {
	$args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$categories = get_categories($args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('fashion_footwear_new_arrival_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'fashion_footwear_sanitize_select',
	));
	$wp_customize->add_control('fashion_footwear_new_arrival_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','fashion-footwear'),
		'section' => 'fashion_footwear_new_arrival_section',
	));
}