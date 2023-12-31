<?php

//$content_width is required even though this is a variable-width theme
if ( ! isset( $dw_medieval_content_width ) ) {
	$dw_medieval_content_width = 400;
}

function dw_medieval_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

function dw_medieval_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true === $input ) ? true : false );
}

//makes replying look neat
if ( ! function_exists( 'dw_medieval_threaded_comments' ) ) :
	function dw_medieval_threaded_comments() {
		if ( get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'dw_medieval_threaded_comments' );
endif;

// displays "Comments are closed" instead of comment form when comments are closed.
if ( ! function_exists( 'dw_medieval_closed_comments' ) ) :
	function dw_medieval_closed_comments() {
		echo '<p>', esc_html__( 'Comments are closed.', 'dw-medieval' ), '</p>';
	}
	add_action( 'comment_form_comments_closed', 'dw_medieval_closed_comments' );
endif;

if ( ! function_exists( 'dw_medieval_setup' ) ) :
	function dw_medieval_setup() {
		load_theme_textdomain( 'dw-medieval', get_template_directory() . '/languages' );
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 75,
				'width'       => 548,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'customize-selective-remedieval-widgets' );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150 );
		add_image_size( 'dw-medieval-single-post-thumbnail', 9999, 9999 );
		add_image_size( 'dw-medieval-homepage-featured', 350, 350 );
		add_theme_support(
			'starter-content', 
			array(
				'widgets' => array(
					'left-sidebar'  => array(
						array(
							'text',
							array(
								'title' => esc_html__( 'First Sidebar', 'dw-medieval' ),
								'text'  => _x( 'This is some text in the first sidebar.', 'Theme Starter Content', 'dw-medieval' ),
							),
						),
					),
					'right-sidebar' => array(
						array(
							'text',
							array(
								'title' => esc_html__( 'Second Sidebar', 'dw-medieval' ),
								'text'  => _x( 'This is some text in the second sidebar.', 'Theme Starter Content', 'dw-medieval' ),
							),
						),
					),
					'center-block'  => array(
						array(
							'text',
							array(
								'title' => esc_html__( 'Center Block', 'dw-medieval' ),
								'text'  => _x( 'This is some text in the center block.', 'Theme Starter Content', 'dw-medieval' ),
							),
						),
					),
				),
			)
		);
	}
	add_action( 'after_setup_theme', 'dw_medieval_setup' );
endif;

if ( ! function_exists( 'dw_medieval_register_menu' ) ) :
	function dw_medieval_register_menu() {
		register_nav_menus(
			array(
				'top_header_menu' => esc_html__( 'Top Header Menu', 'dw-medieval' ),
			)
		);
	}
	add_action( 'init', 'dw_medieval_register_menu' );
endif;

if ( ! function_exists( 'dw_medieval_stylesheet' ) ) :
	function dw_medieval_stylesheet() {
		wp_enqueue_style( 'dw-medieval-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->version );
	}
	add_action( 'wp_enqueue_scripts', 'dw_medieval_stylesheet' );
endif;

if ( ! function_exists( 'dw_medieval_sidebars' ) ) :
	// register the sidebars
	function dw_medieval_sidebars() {
		register_sidebar( 
			array(
				'name' => __( 'Left Sidebar 1', 'dw-medieval' ),
				'id'   => 'left-sidebar',
			)
		);
		register_sidebar(
			array(
				'name' => __( 'Center Block 1', 'dw-medieval' ),
				'id'   => 'center-block',
			)
		);
		register_sidebar(
			array(
				'name' => __( 'Right Sidebar 1', 'dw-medieval' ),
				'id'   => 'right-sidebar',
			)
		);
	}
	add_action( 'widgets_init', 'dw_medieval_sidebars' );
endif;

// display information about a post under the post title
if ( ! function_exists( 'dw_medieval_post_meta' ) ) :
	function dw_medieval_post_meta() {
		echo '<div class="meta">';
		if ( get_post_type() === 'page' ) :
			printf(
				/* translators: %s = author */
				esc_html__( 'Posted by %s', 'dw-medieval' ),
				get_the_author()
			);
		elseif ( has_category() ) :
			printf(
				/* translators: %1$s = date, %2$s = categories, %3$s = author */
				esc_html__( 'Posted on %1$s in %2$s by %3$s', 'dw-medieval' ),
				get_the_date(),
				wp_kses_post( get_the_category_list( ',' ) ),
				get_the_author()
			);
		else :
			printf(
				/* translators: %1$s = date, %2$s = author */
				esc_html__( 'Posted on %1$s by %2$s', 'dw-medieval' ),
				get_the_date(),
				get_the_author()
			);
		endif;
		edit_post_link( _x( 'Edit', 'verb', 'dw-medieval' ), ' | ' );
		if ( get_post_type() !== 'page' && has_tag() ) :
			echo '<br>';
			the_tags();
		endif;
		echo '</div>';
	}
endif;

// change the archive title to show the search query when showing the archive title on a search result page.
if ( ! function_exists( 'dw_medieval_search_title' ) ) :
	function dw_medieval_search_title( $title ) {
		if ( is_search() ) {
			/* translators: %s = search query */
			$title = sprintf( __( 'Search: %s', 'dw-medieval' ), get_search_query() );
		}
		return $title;
	}
	add_filter( 'get_the_archive_title', 'dw_medieval_search_title' );
endif;

function dw_medieval_google_fonts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=MedievalSharp&display=swap', array(), wp_get_theme()->version );
}
add_action( 'wp_enqueue_scripts', 'dw_medieval_google_fonts' );

/**
 * Enqueue scripts
 */
function dw_medieval_enqueue_scripts() {
	wp_enqueue_script( 'dw-medieval-header-clock', get_template_directory_uri() . '/js/dw-medieval-header-clock.js', array(), wp_get_theme()->version, true );
	wp_enqueue_script( 'dw-medieval-top-button', get_template_directory_uri() . '/js/dw-medieval-top-button.js', array(), wp_get_theme()->version, true );
	wp_enqueue_script( 'dw-medieval-navigation', get_template_directory_uri() . '/js/dw-medieval-navigation.js', array( 'jquery' ), '20141205', true );
}
add_action( 'wp_enqueue_scripts', 'dw_medieval_enqueue_scripts' );

// Add Footer Text Box section to customize
function dw_medieval_fcontent( $wp_customize ) {
	$wp_customize->add_section(
		'dw-medieval-fcontent-section', 
		array(
			'title' => __( 'Footer Text Box', 'dw-medieval' ),
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-fcontent-text-control', 
			array(
				'type'        => 'button',
				'settings'    => array(),
				'label'       => __( 'Get this feature with premium!', 'dw-medieval' ),
				'priority'    => 10,
				'section'     => 'dw-medieval-fcontent-section',
				'input_attrs' => array(
					'value'   => __( 'Click Here!', 'dw-medieval' ),
					'class'   => 'button-secondary',
					'onclick' => "window.open('https://www.designwicked.com/premium-medieval', '_blank')",
				),
			)
		)
	);
}

add_action( 'customize_register', 'dw_medieval_fcontent' );

// Premium Upgrade Section
function dw_medieval_procontent( 
	$wp_customize ) {
	$wp_customize->add_section(
		'pro_sec', 
		array(
			'title'       => __( 'GET PREMIUM VERSION', 'dw-medieval' ),
			'description' => '',
			'priority'    => 10,
			'capability'  => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
		'button_id',
		array(
			'type'        => 'button',
			'settings'    => array(),
			'priority'    => 10,
			'section'     => 'pro_sec',
			'input_attrs' => array(
				'value'   => __( 'BUY PREMIUM VERSION', 'dw-medieval' ),
				'class'   => 'button-primary',
				'onclick' => "window.open('https://www.designwicked.com/premium-medieval', '_blank')",
			),
		)
	);

	$wp_customize->add_control(
		'label',
		array(
			'type'        => 'button',
			'settings'    => array(),
			'label'       => __( 'Premium Features:', 'dw-medieval' ),
			'priority'    => 10,
			'section'     => 'pro_sec',
			'input_attrs' => array(
				'value'   => __( '12 More Widget Blocks', 'dw-medieval' ),
				'class'   => 'button-secondary',
				'onclick' => "window.open('https://www.designwicked.com/wordpress-themes', '_blank')",
			),
		)
	);
	
	$wp_customize->add_control(
		'label1',
		array(
			'type'        => 'button',
			'settings'    => array(),
			'priority'    => 10,
			'section'     => 'pro_sec',
			'input_attrs' => array(
				'value'   => __( 'Footer HTML/Text Content Area', 'dw-medieval' ),
				'class'   => 'button-secondary',
				'onclick' => "window.open('https://www.designwicked.com/wordpress-themes', '_blank')",
			),
		)
	);
	
	$wp_customize->add_control(
		'label2',
		array(
			'type'        => 'button',
			'settings'    => array(),
			'priority'    => 10,
			'section'     => 'pro_sec',
			'input_attrs' => array(
				'value'   => __( 'Top Header and Bottom Footer Length Widget Area', 'dw-medieval' ),
				'class'   => 'button-secondary',
				'onclick' => "window.open('https://www.designwicked.com/wordpress-themes', '_blank')",
			),
		)
	);
	
	$wp_customize->add_control(
		'label3',
		array(
			'type'        => 'button',
			'settings'    => array(),
			'priority'    => 10,
			'section'     => 'pro_sec',
			'input_attrs' => array(
				'value'   => __( 'bbPress Matching Forum Style', 'dw-medieval' ),
				'class'   => 'button-secondary',
				'onclick' => "window.open('https://www.designwicked.com/wordpress-themes', '_blank')",
			),
		)
	);
	
	$wp_customize->add_control(
		'label4',
		array(
			'type'        => 'button',
			'settings'    => array(),
			'priority'    => 10,
			'section'     => 'pro_sec',
			'input_attrs' => array(
				'value'   => __( 'And More!', 'dw-medieval' ),
				'class'   => 'button-secondary',
				'onclick' => "window.open('https://www.designwicked.com/wordpress-themes', '_blank')",
			),
		)
	);
	
	$wp_customize->add_control(
		'label5',
		array(
			'type'        => 'button',
			'settings'    => array(),
			'label'       => __( 'FOR MORE DW THEMES:', 'dw-medieval' ),
			'priority'    => 10,
			'section'     => 'pro_sec',
			'input_attrs' => array(
				'value'   => __( 'CLICK HERE!', 'dw-medieval' ),
				'class'   => 'button-primary',
				'onclick' => "window.open('https://www.designwicked.com/wordpress-themes', '_blank')",
			),
		)
	);
	
}
	
	add_action( 'customize_register', 'dw_medieval_procontent' );

// Header Nav
function dw_medieval_hnav( $wp_customize ) {
	$wp_customize->add_section(
		'dw-medieval-hnav-section',
		array(
			'title' => esc_html__( 'Header Navigation', 'dw-medieval' ),
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-linkname1',
		array(
			'default'           => esc_html__( 'Link 1', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);


	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-linkname1',
			array(
				'label'       => esc_html__( 'Link 1 Name:', 'dw-medieval' ),
				'section'     => 'dw-medieval-hnav-section',
				'description' => esc_html__( 'The visible name of the link on the button.', 'dw-medieval' ),
				'settings'    => 'dw-medieval-hnav-linkname1',
				'type'        => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-link1',
		array(
			'default'           => esc_html__( 'http://', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);


	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-link1',
			array(
				'label'       => esc_html__( 'Link 1 Address:', 'dw-medieval' ),
				'section'     => 'dw-medieval-hnav-section',
				'description' => esc_html__( 'You can use /address to point to a directory, or just put a full link including http://', 'dw-medieval' ),
				'settings'    => 'dw-medieval-hnav-link1',
				'type'        => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-linkname2',
		array(
			'default'           => esc_html__( 'Link 2', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-linkname2',
			array(
				'label'    => esc_html__( 'Link 2 Name:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-linkname2',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-link2',
		array(
			'default'           => esc_html__( 'http://', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-link2',
			array(
				'label'    => esc_html__( 'Link 2 Address:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-link2',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-linkname3',
		array(
			'default'           => esc_html__( 'Link 3', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-linkname3',
			array(
				'label'    => esc_html__( 'Link 3 Name:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-linkname3',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-link3',
		array(
			'default'           => esc_html__( 'http://', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-link3',
			array(
				'label'    => esc_html__( 'Link 3 Address:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-link3',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-linkname4',
		array(
			'default'           => esc_html__( 'Link 4', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-linkname4',
			array(
				'label'    => esc_html__( 'Link 4 Name:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-linkname4',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-link4',
		array(
			'default'           => esc_html__( 'http://', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-link4',
			array(
				'label'    => esc_html__( 'Link 4 Address:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-link4',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-linkname5',
		array(
			'default'           => esc_html__( 'Link 5', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-linkname5',
			array(
				'label'    => esc_html__( 'Link 5 Name:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-linkname5',
				'type'     => 'text',
			)
		)
	);

	$wp_customize->add_setting(
		'dw-medieval-hnav-link5',
		array(
			'default'           => esc_html__( 'http://', 'dw-medieval' ),
			'sanitize_callback' => 'dw_medieval_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'dw-medieval-hnav-control-link5',
			array(
				'label'    => esc_html__( 'Link 5 Address:', 'dw-medieval' ),
				'section'  => 'dw-medieval-hnav-section',
				'settings' => 'dw-medieval-hnav-link5',
				'type'     => 'text',
			)
		)
	);
}
add_action( 'customize_register', 'dw_medieval_hnav' );
