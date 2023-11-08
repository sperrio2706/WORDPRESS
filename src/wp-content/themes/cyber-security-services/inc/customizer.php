<?php
/**
 * Cyber Security Services: Customizer
 *
 * @subpackage Cyber Security Services
 * @since 1.0
 */

function cyber_security_services_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	$wp_customize->add_section( 'cyber_security_services_typography_settings', array(
		'title'       => __( 'Typography', 'cyber-security-services' ),
		'priority'       => 2,
	) );

	$cyber_security_services_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'cyber_security_services_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_typography_settings',
		'settings'    => 'cyber_security_services_section_typo_heading',
	) ) );

	$wp_customize->add_setting( 'cyber_security_services_headings_text', array(
		'sanitize_callback' => 'cyber_security_services_sanitize_fonts',
	));
	$wp_customize->add_control( 'cyber_security_services_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'cyber-security-services'),
		'section' => 'cyber_security_services_typography_settings',
		'choices' => $cyber_security_services_font_choices
	));
	
	$wp_customize->add_setting( 'cyber_security_services_body_text', array(
		'sanitize_callback' => 'cyber_security_services_sanitize_fonts'
	));
	$wp_customize->add_control( 'cyber_security_services_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'cyber-security-services' ),
		'section' => 'cyber_security_services_typography_settings',
		'choices' => $cyber_security_services_font_choices
	) );
	
 	$wp_customize->add_section('cyber_security_services_pro', array(
        'title'    => __('UPGRADE CYBER SECURITY PREMIUM', 'cyber-security-services'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('cyber_security_services_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Cyber_Security_Services_Pro_Control($wp_customize, 'cyber_security_services_pro', array(
        'label'    => __('Cyber Security Services PREMIUM', 'cyber-security-services'),
        'section'  => 'cyber_security_services_pro',
        'settings' => 'cyber_security_services_pro',
        'priority' => 1,
    )));
	//logo
		$wp_customize->add_setting('cyber_security_services_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'cyber_security_services_sanitize_integer'
	));
	$wp_customize->add_control(new Cyber_Security_Services_Slider_Custom_Control( $wp_customize, 'cyber_security_services_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','cyber-security-services'),
		'section'=> 'title_tagline',
		'settings'=>'cyber_security_services_logo_max_height',
		'input_attrs' => array(
			'reset'            => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
	)));

		$wp_customize->add_setting('cyber_security_services_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_logo_title',
			array(
				'settings'        => 'cyber_security_services_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('cyber_security_services_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_logo_text',
			array(
				'settings'        => 'cyber_security_services_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);
   
		// Theme General Settings
    $wp_customize->add_section('cyber_security_services_theme_settings',array(
        'title' => __('Theme General Settings', 'cyber-security-services'),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'cyber_security_services_section_sticky_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_theme_settings',
		'settings'    => 'cyber_security_services_section_sticky_heading',
	) ) );

    $wp_customize->add_setting(
		'cyber_security_services_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_sticky_header',
			array(
				'settings'        => 'cyber_security_services_sticky_header',
				'section'         => 'cyber_security_services_theme_settings',
				'label'           => __( 'Show Sticky Header', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'cyber_security_services_section_loader_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_theme_settings',
		'settings'    => 'cyber_security_services_section_loader_heading',
	) ) );

	$wp_customize->add_setting(
		'cyber_security_services_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_theme_loader',
			array(
				'settings'        => 'cyber_security_services_theme_loader',
				'section'         => 'cyber_security_services_theme_settings',
				'label'           => __( 'Show Site Loader', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'cyber_security_services_section_menu_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_theme_settings',
		'settings'    => 'cyber_security_services_section_menu_heading',
	) ) );

	$wp_customize->add_setting('cyber_security_services_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'cyber_security_services_sanitize_choices'
	));
	$wp_customize->add_control('cyber_security_services_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','cyber-security-services'),
        'section' => 'cyber_security_services_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','cyber-security-services'),
            'UPPERCASE' => __('UPPERCASE','cyber-security-services'),
            'LOWERCASE' => __('LOWERCASE','cyber-security-services'),
        ),
	) );

	$wp_customize->add_setting( 'cyber_security_services_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_theme_settings',
		'settings'    => 'cyber_security_services_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
		'cyber_security_services_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);

	
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_scroll_enable',
			array(
				'settings'        => 'cyber_security_services_scroll_enable',
				'section'         => 'cyber_security_services_theme_settings',
				'label'           => __( 'Show Scroll Top', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('cyber_security_services_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'cyber_security_services_sanitize_choices'
	));
	$wp_customize->add_control('cyber_security_services_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','cyber-security-services'),
        'section' => 'cyber_security_services_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','cyber-security-services'),
            'center_align' => __('Center Align','cyber-security-services'),
            'left_align' => __('Left Align','cyber-security-services'),
        ),
	) );


	$wp_customize->add_setting('cyber_security_services_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new  Cyber_Security_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'cyber_security_services_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','cyber-security-services'),
		'transport' => 'refresh',
		'section'	=> 'cyber_security_services_theme_settings',
		'setting'	=> 'cyber_security_services_scroll_top_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_section('cyber_security_services_breadcrumb_settings',array(
        'title' => __('Breadcrumb', 'cyber-security-services'),
        'priority' => 2
    ) );

	$wp_customize->add_setting( 'cyber_security_services_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Breadcrumb Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_breadcrumb_settings',
		'settings'    => 'cyber_security_services_section_breadcrumb_heading',
	) ) );

	$wp_customize->add_setting(
		'cyber_security_services_enable_breadcrumb',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_enable_breadcrumb',
			array(
				'settings'        => 'cyber_security_services_enable_breadcrumb',
				'section'         => 'cyber_security_services_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
	$wp_customize->add_section('cyber_security_services_woocommerce_section',array(
        'title' => __('WooCommerce Settings', 'cyber-security-services'),
        'priority' => 2,
    ) );

	$wp_customize->add_setting( 'cyber_security_services_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_shoppage_heading', array(
		'label'       => esc_html__( 'Sidebar Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_woocommerce_section',
		'settings'    => 'cyber_security_services_section_shoppage_heading',
	) ) );

	$wp_customize->add_setting(
		'cyber_security_services_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_shop_page_sidebar',
			array(
				'settings'        => 'cyber_security_services_shop_page_sidebar',
				'section'         => 'cyber_security_services_woocommerce_section',
				'label'           => __( 'Show Shop Page Sidebar', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'cyber_security_services_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'cyber_security_services_wocommerce_single_page_sidebar',
				'section'         => 'cyber_security_services_woocommerce_section',
				'label'           => __( 'Show Single Product Page Sidebar', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'cyber_security_services_section_archieve_product_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_archieve_product_heading', array(
		'label'       => esc_html__( 'Archieve Product Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_woocommerce_section',
		'settings'    => 'cyber_security_services_section_archieve_product_heading',
	) ) );

	$wp_customize->add_setting('cyber_security_services_archieve_item_columns',array(
        'default' => '3',
        'sanitize_callback' => 'cyber_security_services_sanitize_choices'
	));

	$wp_customize->add_control('cyber_security_services_archieve_item_columns',array(
        'type' => 'select',
        'label' => __('Select No of Columns','cyber-security-services'),
        'section' => 'cyber_security_services_woocommerce_section',
        'choices' => array(
            '1' => __('One Column','cyber-security-services'),
            '2' => __('Two Column','cyber-security-services'),
            '3' => __('Three Column','cyber-security-services'),
            '4' => __('four Column','cyber-security-services'),
            '5' => __('Five Column','cyber-security-services'),
            '6' => __('Six Column','cyber-security-services'),
        ),
	) );

	$wp_customize->add_setting( 'cyber_security_services_archieve_shop_perpage', array(
		'default'              => 6,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'cyber_security_services_sanitize_number_absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'cyber_security_services_archieve_shop_perpage', array(
		'label'       => esc_html__( 'Display Products','cyber-security-services' ),
		'section'     => 'cyber_security_services_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	) );

	$wp_customize->add_setting( 'cyber_security_services_section_related_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_related_heading', array(
		'label'       => esc_html__( 'Related Product Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_woocommerce_section',
		'settings'    => 'cyber_security_services_section_related_heading',
	) ) );

	$wp_customize->add_setting('cyber_security_services_related_item_columns',array(
        'default' => '3',
        'sanitize_callback' => 'cyber_security_services_sanitize_choices'
	));

	$wp_customize->add_control('cyber_security_services_related_item_columns',array(
        'type' => 'select',
        'label' => __('Select No of Columns','cyber-security-services'),
        'section' => 'cyber_security_services_woocommerce_section',
        'choices' => array(
            '1' => __('One Column','cyber-security-services'),
            '2' => __('Two Column','cyber-security-services'),
            '3' => __('Three Column','cyber-security-services'),
            '4' => __('four Column','cyber-security-services'),
            '5' => __('Five Column','cyber-security-services'),
            '6' => __('Six Column','cyber-security-services'),
        ),
	) );

	$wp_customize->add_setting( 'cyber_security_services_related_shop_perpage', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'cyber_security_services_sanitize_number_absint',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'cyber_security_services_related_shop_perpage', array(
		'label'       => esc_html__( 'Display Products','cyber-security-services' ),
		'section'     => 'cyber_security_services_woocommerce_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting(
		'cyber_security_services_related_product',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);

	$wp_customize->add_control(new Cyber_Security_Services_Customizer_Customcontrol_Switch($wp_customize,'cyber_security_services_related_product',
		array(
			'settings'        => 'cyber_security_services_related_product',
			'section'         => 'cyber_security_services_woocommerce_section',
			'label'           => __( 'Show Related Products', 'cyber-security-services' ),				
			'choices'		  => array(
				'1'      => __( 'On', 'cyber-security-services' ),
				'off'    => __( 'Off', 'cyber-security-services' ),
			),
			'active_callback' => '',
		)
	));
}
//theme width

	$wp_customize->add_section('cyber_security_services_theme_width_settings',array(
        'title' => __('Theme Width Option', 'cyber-security-services'),
        'priority' => 2,
    ) );

	$wp_customize->add_setting( 'cyber_security_services_section_theme_width_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Setting', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_theme_width_settings',
		'settings'    => 'cyber_security_services_section_theme_width_heading',
	) ) );

	$wp_customize->add_setting('cyber_security_services_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'cyber_security_services_sanitize_choices'
	));
	$wp_customize->add_control('cyber_security_services_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','cyber-security-services'),
        'section' => 'cyber_security_services_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','cyber-security-services'),
            'Container' => __('Container','cyber-security-services'),
            'container_fluid' => __('Container Fluid','cyber-security-services'),
        ),
	) );
	

	//button
	$wp_customize->add_section('cyber_security_services_button_options',array(
        'title' => __('Button settings', 'cyber-security-services'),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'cyber_security_services_section_button_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_button_heading', array(
		'label'       => esc_html__( 'Theme Button Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_button_options',
		'settings'    => 'cyber_security_services_section_button_heading',
	) ) );


    $wp_customize->add_setting( 'cyber_security_services_theme_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cyber_security_services_theme_button_color', array(
	    'label' => esc_html__( 'Background Color','cyber-security-services' ),
	    'section' => 'cyber_security_services_button_options',
	    'settings' => 'cyber_security_services_theme_button_color',
  	)));

	$wp_customize->add_setting('cyber_security_services_button_border_radius',array(
		'default'=> 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'cyber_security_services_sanitize_integer'
	));
	$wp_customize->add_control(new Cyber_Security_Services_Slider_Custom_Control( $wp_customize, 'cyber_security_services_button_border_radius',array(
		'label' => esc_html__( 'Border Radius','cyber-security-services' ),
		'section'=> 'cyber_security_services_button_options',
		'settings'=>'cyber_security_services_button_border_radius',
		'input_attrs' => array(
			'reset'			   => 5,
            'step'             => 1,
			'min'              => 0,
			'max'              => 30,
        ),
	)));
	// Post Layouts
    $wp_customize->add_section('cyber_security_services_layout',array(
        'title' => __('Post Layout', 'cyber-security-services'),
        'priority' => 2
    ) );

    $wp_customize->add_setting( 'cyber_security_services_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_post_heading', array(
		'label'       => esc_html__( 'single Post Structure', 'cyber-security-services' ),
		 'description' => __( 'Change the post layout from below options', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_layout',
		'settings'    => 'cyber_security_services_section_post_heading',
	) ) );

	$wp_customize->add_setting( 'cyber_security_services_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control( new Cyber_Security_Services_Radio_Image_Control( $wp_customize, 'cyber_security_services_single_post_option',
			array(
				'type'=>'select',
				'label' => __( 'select Single Post Page Layout', 'cyber-security-services' ),
				'section' => 'cyber_security_services_layout',
				'choices' => array(

					'single_right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'cyber-security-services' )
					),
					'single_left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'cyber-security-services' )
					),
					'single_full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'One Column', 'cyber-security-services' )
					),
				)
			)
		) );


	$wp_customize->add_setting('cyber_security_services_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new cyber_security_services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_single_post_date',
			array(
				'settings'        => 'cyber_security_services_single_post_date',
				'section'         => 'cyber_security_services_layout',
				'label'           => __( 'Show Date', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'cyber_security_services_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'cyber_security_services_customize_partial_cyber_security_services_single_post_date',
	) );

	$wp_customize->add_setting('cyber_security_services_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new cyber_security_services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_single_post_admin',
			array(
				'settings'        => 'cyber_security_services_single_post_admin',
				'section'         => 'cyber_security_services_layout',
				'label'           => __( 'Show Author/Admin', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'cyber_security_services_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'cyber_security_services_customize_partial_cyber_security_services_single_post_admin',
	) );

	$wp_customize->add_setting('cyber_security_services_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new cyber_security_services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_single_post_comment',
			array(
				'settings'        => 'cyber_security_services_single_post_comment',
				'section'         => 'cyber_security_services_layout',
				'label'           => __( 'Show Comment', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'cyber_security_services_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'cyber-security-services' ),
		 'description' => __( 'Change the Single  post layout from below options', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_layout',
		'settings'    => 'cyber_security_services_section_archive_post_heading',
	) ) );
	
    $wp_customize->add_setting( 'cyber_security_services_post_option',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Cyber_Security_Services_Radio_Image_Control( $wp_customize, 'cyber_security_services_post_option',
			array(
				'type'=>'select',
				'label' => __( 'select Post Page Layout', 'cyber-security-services' ),
				'section' => 'cyber_security_services_layout',
				'choices' => array(
					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'cyber-security-services' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'cyber-security-services' )
					),					
					'one_column' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'One Column', 'cyber-security-services' )
					),
					'three_column' => array(
						'image' => get_template_directory_uri().'/assets/images/3column.jpg',
						'name' => __( 'Three Column', 'cyber-security-services' )
					),
					'four_column' => array(
						'image' => get_template_directory_uri().'/assets/images/4column.jpg',
						'name' => __( 'Four Column', 'cyber-security-services' )
					),
					'grid_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
						'name' => __( 'Grid-Right-Sidebar Layout', 'cyber-security-services' )
					),
					'grid_left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/grid-left.png',
						'name' => __( 'Grid-Left-Sidebar Layout', 'cyber-security-services' )
					),
					'grid_post' => array(
						'image' => get_template_directory_uri().'/assets/images/grid.jpg',
						'name' => __( 'Grid Layout', 'cyber-security-services' )
					)
				)
			)
		) );

    $wp_customize->add_setting('cyber_security_services_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'cyber_security_services_sanitize_select'
	));
	$wp_customize->add_control('cyber_security_services_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','cyber-security-services'),
		'section' => 'cyber_security_services_layout',
		'setting' => 'cyber_security_services_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','cyber-security-services'),
            '2_column' => __('2','cyber-security-services'),
            '3_column' => __('3','cyber-security-services'),
            '4_column' => __('4','cyber-security-services'),
            '5_column' => __('6','cyber-security-services'),
        ),
	));

	$wp_customize->add_setting('cyber_security_services_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_date',
			array(
				'settings'        => 'cyber_security_services_date',
				'section'         => 'cyber_security_services_layout',
				'label'           => __( 'Show Date', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'cyber_security_services_date', array(
		'selector' => '.date-box',
		'render_callback' => 'cyber_security_services_customize_partial_cyber_security_services_date',
	) );

	$wp_customize->add_setting('cyber_security_services_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_admin',
			array(
				'settings'        => 'cyber_security_services_admin',
				'section'         => 'cyber_security_services_layout',
				'label'           => __( 'Show Author/Admin', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'cyber_security_services_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'cyber_security_services_customize_partial_cyber_security_services_admin',
	) );

	$wp_customize->add_setting('cyber_security_services_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_comment',
			array(
				'settings'        => 'cyber_security_services_comment',
				'section'         => 'cyber_security_services_layout',
				'label'           => __( 'Show Comment', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'cyber_security_services_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'cyber_security_services_customize_partial_cyber_security_services_comment',
	) );

	// Social Media
    $wp_customize->add_section('cyber_security_services_urls',array(
        'title' => __('Social Media', 'cyber-security-services'),
        'priority' => 3
    ) );

     $wp_customize->add_setting( 'cyber_security_services_section_social_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'cyber-security-services' ),
		'description' => __( 'Add social media links in the below feilds', 'cyber-security-services' ),			
		'section'     => 'cyber_security_services_urls',
		'settings'    => 'cyber_security_services_section_social_heading',
	) ) );

	$wp_customize->add_setting(
		'header_social_icon_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new  Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'header_social_icon_enable',
			array(
				'settings'        => 'header_social_icon_enable',
				'section'         => 'cyber_security_services_urls',
				'label'           => __( 'Check to show social fields', 'cyber-security-services' ),
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'header_social_icon_enable', array(
		'selector' => '.links a i',
		'render_callback' => 'cyber_security_services_customize_partial_header_social_icon_enable',
	) );

	$wp_customize->add_setting( 'cyber_security_services_section_fb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_fb_heading', array(
		'label'       => esc_html__( 'Facebook Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_urls',
		'settings'    => 'cyber_security_services_section_fb_heading',
	) ) );

    $wp_customize->add_setting('cyber_security_services_facebook_icon',array(
		'default'	=> 'fab fa-facebook',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Cyber_Security_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'cyber_security_services_facebook_icon',array(
		'label'	=> __('Add Icon','cyber-security-services'),
		'transport' => 'refresh',
		'section'	=> 'cyber_security_services_urls',
		'setting'	=> 'cyber_security_services_facebook_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('cyber_security_services_facebook',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('cyber_security_services_facebook',array(
		'label' => esc_html__('Add URL','cyber-security-services'),
		'section' => 'cyber_security_services_urls',
		'setting' => 'cyber_security_services_facebook',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'cyber_security_services_header_facebook_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_header_facebook_target',
			array(
				'settings'        => 'cyber_security_services_header_facebook_target',
				'section'         => 'cyber_security_services_urls',
				'label'           => __( 'Open link in a new tab', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);
	
	$wp_customize->add_setting( 'cyber_security_services_section_twitter_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_twitter_heading', array(
		'label'       => esc_html__( 'Twitter Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_urls',
		'settings'    => 'cyber_security_services_section_twitter_heading',
	) ) );

	$wp_customize->add_setting('cyber_security_services_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Cyber_Security_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'cyber_security_services_twitter_icon',array(
		'label'	=> __('Add Icon','cyber-security-services'),
		'transport' => 'refresh',
		'section'	=> 'cyber_security_services_urls',
		'setting'	=> 'cyber_security_services_twitter_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->selective_refresh->add_partial( 'cyber_security_services_twitter', array(
		'selector' => '.social-icon a i',
		'render_callback' => 'cyber_security_services_customize_partial_cyber_security_services_twitter',
	) );

	$wp_customize->add_setting('cyber_security_services_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('cyber_security_services_twitter',array(
		'label' => esc_html__('Add URL','cyber-security-services'),
		'section' => 'cyber_security_services_urls',
		'setting' => 'cyber_security_services_twitter',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'cyber_security_services_header_twt_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_header_twt_target',
			array(
				'settings'        => 'cyber_security_services_header_twt_target',
				'section'         => 'cyber_security_services_urls',
				'label'           => __( 'Open link in a new tab', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);
		
	$wp_customize->add_setting( 'cyber_security_services_section_linkedin_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_linkedin_heading', array(
		'label'       => esc_html__( 'Linkedin Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_urls',
		'settings'    => 'cyber_security_services_section_linkedin_heading',
	) ) );

	$wp_customize->add_setting('cyber_security_services_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Cyber_Security_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'cyber_security_services_linkedin_icon',array(
		'label'	=> __('Add Icon','cyber-security-services'),
		'transport' => 'refresh',
		'section'	=> 'cyber_security_services_urls',
		'setting'	=> 'cyber_security_services_linkedin_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('cyber_security_services_linkedin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('cyber_security_services_linkedin',array(
		'label' => esc_html__('Add URL','cyber-security-services'),
		'section' => 'cyber_security_services_urls',
		'setting' => 'cyber_security_services_linkedin',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'cyber_security_services_header_linkedin_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_header_linkedin_target',
			array(
				'settings'        => 'cyber_security_services_header_linkedin_target',
				'section'         => 'cyber_security_services_urls',
				'label'           => __( 'Open link in a new tab', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);
	
	$wp_customize->add_setting( 'cyber_security_services_section_pinterest_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_pinterest_heading', array(
		'label'       => esc_html__( 'Pinterest Settings', 'cyber-security-services' ),
		'section'     => 'cyber_security_services_urls',
		'settings'    => 'cyber_security_services_section_pinterest_heading',
	) ) );

	$wp_customize->add_setting('cyber_security_services_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Cyber_Security_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'cyber_security_services_pinterest_icon',array(
		'label'	=> __('Add Icon','cyber-security-services'),
		'transport' => 'refresh',
		'section'	=> 'cyber_security_services_urls',
		'setting'	=> 'cyber_security_services_pinterest_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('cyber_security_services_pinterest',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('cyber_security_services_pinterest',array(
		'label' => esc_html__('Add URL','cyber-security-services'),
		'section' => 'cyber_security_services_urls',
		'setting' => 'cyber_security_services_pinterest',
		'type'    => 'url'
	));

	$wp_customize->add_setting(
		'cyber_security_services_header_pinterest_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_header_pinterest_target',
			array(
				'settings'        => 'cyber_security_services_header_pinterest_target',
				'section'         => 'cyber_security_services_urls',
				'label'           => __( 'Open link in a new tab', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'cyber_security_services_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'cyber-security-services' ),
    	'priority'   => 3,
	) );

	$wp_customize->add_setting( 'cyber_security_services_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'cyber-security-services' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'cyber-security-services' ),		
		'section'     => 'cyber_security_services_slider_section',
		'settings'    => 'cyber_security_services_section_slide_heading',
		'priority'       => 1,
	) ) );

	$wp_customize->add_setting('cyber_security_services_slide_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('cyber_security_services_slide_heading',array(
		'label' => esc_html__('Slider Text','cyber-security-services'),
		'section' => 'cyber_security_services_slider_section',
		'setting' => 'cyber_security_services_slide_heading',
		'type'    => 'text',
		'priority'       => 1,
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('cyber_security_services_post_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'cyber_security_services_sanitize_select',
	));
	$wp_customize->add_control('cyber_security_services_post_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display slider images','cyber-security-services'),
		'section' => 'cyber_security_services_slider_section',
		'priority'       => 1,
	));

	$wp_customize->add_setting('cyber_security_services_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'cyber_security_services_sanitize_choices'
	));
	$wp_customize->add_control('cyber_security_services_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','cyber-security-services'),
        'section' => 'cyber_security_services_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','cyber-security-services'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','cyber-security-services'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','cyber-security-services'),),
	) );

	// About Section
	$wp_customize->add_section( 'cyber_security_services_services_section' , array(
    	'title'      => __( 'About Us Section Settings', 'cyber-security-services' ),
		'priority'   => 4,
	) );
	$wp_customize->add_setting( 'cyber_security_services_section_about_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_about_heading', array(
		'label'       => esc_html__( 'About Us Section Settings', 'cyber-security-services' ),	
		'section'     => 'cyber_security_services_services_section',
		'settings'    => 'cyber_security_services_section_about_heading',
	) ) );

	$wp_customize->add_setting(
		'cyber_security_services_about_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'cyber_security_services_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Cyber_Security_Services_Customizer_Customcontrol_Switch(
			$wp_customize,
			'cyber_security_services_about_show_hide',
			array(
				'settings'        => 'cyber_security_services_about_show_hide',
				'section'         => 'cyber_security_services_services_section',
				'label'           => __( 'Check To Show Section', 'cyber-security-services' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'cyber-security-services' ),
					'off'    => __( 'Off', 'cyber-security-services' ),
				),
				'active_callback' => '',
			)
		)
	);
	
    $wp_customize->add_setting( 'cyber_security_services_about_images', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cyber_security_services_about_images', array(
        'label' => 'Upload Image',
        'section' => 'cyber_security_services_services_section',
        'settings' => 'cyber_security_services_about_images',
        'button_labels' => array(
            'select' => 'Select Image',
            'remove' => 'Remove Image',
            'change' => 'Change Image',
        )
    )));

    $wp_customize->add_setting( 'cyber_security_services_about_images1', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cyber_security_services_about_images1', array(
        'label' => 'Upload Image',
        'section' => 'cyber_security_services_services_section',
        'settings' => 'cyber_security_services_about_images1',
        'button_labels' => array(
            'select' => 'Select Image',
            'remove' => 'Remove Image',
            'change' => 'Change Image',
        )
    )));

    $wp_customize->add_setting( 'cyber_security_services_about_images2', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cyber_security_services_about_images2', array(
        'label' => 'Upload Image',
        'section' => 'cyber_security_services_services_section',
        'settings' => 'cyber_security_services_about_images2',
        'button_labels' => array(
            'select' => 'Select Image',
            'remove' => 'Remove Image',
            'change' => 'Change Image',
        )
    )));

    $wp_customize->add_setting('cyber_security_services_services_heading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cyber_security_services_services_heading',array(
		'label'	=> esc_html__('Add Heading','cyber-security-services'),
		'section'	=> 'cyber_security_services_services_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('cyber_security_services_about_us_settigs',array(
		'sanitize_callback' => 'cyber_security_services_sanitize_dropdown_pages',
	));
	$wp_customize->add_control('cyber_security_services_about_us_settigs',array(
		'type'    => 'dropdown-pages',
		'label' => __('Select Page','cyber-security-services'),
		'section' => 'cyber_security_services_services_section',
	));

	//Footer
    $wp_customize->add_section( 'cyber_security_services_footer_copyright', array(
    	'title' => esc_html__( 'Footer Text', 'cyber-security-services' ),
    	'priority' => 6
	) );

	$wp_customize->add_setting( 'cyber_security_services_section_footer_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Cyber_Security_Services_Customizer_Customcontrol_Section_Heading( $wp_customize, 'cyber_security_services_section_footer_heading', array(
			'label'       => esc_html__( 'Footer Settings', 'cyber-security-services' ),		
			'section'     => 'cyber_security_services_footer_copyright',
			'settings'    => 'cyber_security_services_section_footer_heading',
		) ) );

    $wp_customize->add_setting('cyber_security_services_footer_text',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
		$wp_customize->add_control('cyber_security_services_footer_text',array(
			'label'	=> esc_html__('Copyright Text','cyber-security-services'),
			'section'	=> 'cyber_security_services_footer_copyright',
			'type'		=> 'text'
	));

	$wp_customize->add_setting('cyber_security_services_footer_widget',array(
		'default' => '4',
		'sanitize_callback' => 'cyber_security_services_sanitize_select'
	));
	$wp_customize->add_control('cyber_security_services_footer_widget',array(
		'label' => esc_html__('Footer Per Column','cyber-security-services'),
		'section' => 'cyber_security_services_footer_copyright',
		'setting' => 'cyber_security_services_footer_widget',
		'type' => 'radio',
				'choices' => array(
						'1'   => __('1 Column', 'cyber-security-services'),
						'2'  => __('2 Column', 'cyber-security-services'),
						'3' => __('3 Column', 'cyber-security-services'),
						'4' => __('4 Column', 'cyber-security-services')
				),
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'cyber_security_services_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'cyber_security_services_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'cyber_security_services_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'cyber_security_services_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'cyber-security-services' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'cyber-security-services' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'cyber_security_services_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'cyber_security_services_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'cyber_security_services_customize_register' );

function cyber_security_services_customize_partial_blogname() {
	bloginfo( 'name' );
}
function cyber_security_services_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function cyber_security_services_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function cyber_security_services_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('CYBER_SECURITY_SERVICES_PRO_LINK',__('https://www.ovationthemes.com/wordpress/wordpress-cyber-security-theme/
','cyber-security-services'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Cyber_Security_Services_Pro_Control')):
    class Cyber_Security_Services_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( CYBER_SECURITY_SERVICES_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CYBER SECURITY PREMIUM','cyber-security-services');?> </a>
	        </div>
            <div class="col-md">
                <img class="cyber_security_services_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('Cyber Security Services PREMIUM - Features', 'cyber-security-services'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'cyber-security-services');?> </li>
                    <li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'cyber-security-services');?> </li>
                   	<li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'cyber-security-services');?> </li>
                   	<li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'cyber-security-services');?> </li>
                   	<li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'cyber-security-services');?> </li>
                   	<li class="upsell-cyber_security_services"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'cyber-security-services');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( CYBER_SECURITY_SERVICES_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CYBER SECURITY PREMIUM','cyber-security-services');?> </a>
		    </div>
        </label>
    <?php } }
endif;
