<?php
/**
 * ominis Theme Customizer
 *
 * @package ominis
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ominis_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ominis_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ominis_customize_partial_blogdescription',
			)
		);
	}
	
	/**
	 * Social networks.
	 */
	$wp_customize->add_section( 'rrss', array(
		'title'			=> __( 'RRSS', 'ominis' ),
		'priority'		=> 35
	) );
	$rrss = array('facebook','twitter','instagram','pinterest');
	foreach($rrss as $rs){
		$wp_customize->add_setting("ominis_theme_options[$rs]", array(
			'default'	=> '',
			'capability'=> 'edit_theme_options',
			'type'		=> 'option',
			'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters
		));
		$wp_customize->add_control("ominis_$rs", array(
			'label'		=> ucfirst($rs),
			'section'	=> 'rrss',
			'settings'	=> "ominis_theme_options[$rs]",
		));
	}
	$rrss = array('email');
	foreach($rrss as $rs){
		$wp_customize->add_setting("ominis_theme_options[$rs]", array(
			'default'	=> '',
			'capability'=> 'edit_theme_options',
			'type'		=> 'option',
			'sanitize_callback' => 'sanitize_email' //removes all invalid characters
		));
		$wp_customize->add_control("ominis_$rs", array(
			'label'		=> ucfirst($rs),
			'section'	=> 'rrss',
			'settings'	=> "ominis_theme_options[$rs]",
		));
	}
	
	/**
	 * Footer.
	 */
	$wp_customize->add_section( 'footer', array(
		'title'			=> __( 'Footer', 'ominis' ),
		'priority'		=> 120
	) );
	$wp_customize->add_setting("ominis_theme_options[credits]", array(
		'default'		=> 'By Ominis',
		'capability'	=> 'edit_theme_options',
		'type'			=> 'option',
		'sanitize_callback' => 'wp_kses_post' //keeps only HTML tags that are allowed in post content
	));
	$wp_customize->add_control("ominis_credits", array(
		'label'			=> __( 'Credits', 'ominis' ),
		'type'			=> 'textarea',
		'section'		=> 'footer',
		'settings'		=> "ominis_theme_options[credits]",
	));
	
	$wp_customize->add_setting("ominis_theme_options[cookies]", array(
		'default'		=> '',
		'capability'	=> 'edit_theme_options',
		'type'			=> 'option',
		'sanitize_callback' => 'sanitize_title' //Sanitize list options
	));
	
	// List of pages.
	$paginas = get_all_page_ids();
	$selector = array( __('- Select -', 'ominis') );
	foreach ($paginas as $pag){
		$selector[$pag] = get_the_title($pag);
	}
	
	$wp_customize->add_control("ominis_cookies", array(
		'label'			=> __( 'Cookies advice page', 'ominis' ),
		'section'		=> 'footer',
		'settings'		=> "ominis_theme_options[cookies]",
		'type'			=> 'select',
		'choices'		=> $selector
	));

	/**
	 * I remove what I don't need.
	 */	
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');	
}
add_action( 'customize_register', 'ominis_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ominis_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ominis_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ominis_customize_preview_js() {
	wp_enqueue_script( 'ominis-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'ominis_customize_preview_js' );
