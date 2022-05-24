<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'xpro_theme_customize_register' ) ) {

/**
 * Register individual settings through customizer's API.
 *
 * @param WP_Customize_Manager $wp_customize Customizer reference.
 */

	/**
	 * Configuration sample for the Kirki Customizer
	 */
	function xpro_demo_configuration_sample($config) {

		/**
		 * If you need to include Kirki in your theme,
		 * then you may want to consider adding the translations here
		 * using your textdomain.
		 *
		 * If you're using Kirki as a plugin then you can remove these.
		 */

		$strings = array(
			'background-color' => esc_html__('Background Color', 'xpro' ),
			'background-image' => esc_html__('Background Image', 'xpro' ),
			'no-repeat' => esc_html__('No Repeat', 'xpro' ),
			'repeat-all' => esc_html__('Repeat All', 'xpro' ),
			'repeat-x' => esc_html__('Repeat Horizontally', 'xpro' ),
			'repeat-y' => esc_html__('Repeat Vertically', 'xpro' ),
			'inherit' => esc_html__('Inherit', 'xpro' ),
			'background-repeat' => esc_html__('Background Repeat', 'xpro' ),
			'cover' => esc_html__('Cover', 'xpro' ),
			'contain' => esc_html__('Contain', 'xpro' ),
			'background-size' => esc_html__('Background Size', 'xpro' ),
			'fixed' => esc_html__('Fixed', 'xpro' ),
			'scroll' => esc_html__('Scroll', 'xpro' ),
			'background-attachment' => esc_html__('Background Attachment', 'xpro' ),
			'left-top' => esc_html__('Left Top', 'xpro' ),
			'left-center' => esc_html__('Left Center', 'xpro' ),
			'left-bottom' => esc_html__('Left Bottom', 'xpro' ),
			'right-top' => esc_html__('Right Top', 'xpro' ),
			'right-center' => esc_html__('Right Center', 'xpro' ),
			'right-bottom' => esc_html__('Right Bottom', 'xpro' ),
			'center-top' => esc_html__('Center Top', 'xpro' ),
			'center-center' => esc_html__('Center Center', 'xpro' ),
			'center-bottom' => esc_html__('Center Bottom', 'xpro' ),
			'background-position' => esc_html__('Background Position', 'xpro' ),
			'background-opacity' => esc_html__('Background Opacity', 'xpro' ),
			'ON' => esc_html__('ON', 'xpro' ),
			'OFF' => esc_html__('OFF', 'xpro' ),
			'all' => esc_html__('All', 'xpro' ),
			'cyrillic' => esc_html__('Cyrillic', 'xpro' ),
			'cyrillic-ext' => esc_html__('Cyrillic Extended', 'xpro' ),
			'devanagari' => esc_html__('Devanagari', 'xpro' ),
			'greek' => esc_html__('Greek', 'xpro' ),
			'greek-ext' => esc_html__('Greek Extended', 'xpro' ),
			'khmer' => esc_html__('Khmer', 'xpro' ),
			'latin' => esc_html__('Latin', 'xpro' ),
			'latin-ext' => esc_html__('Latin Extended', 'xpro' ),
			'vietnamese' => esc_html__('Vietnamese', 'xpro' ),
		);

		$args = array(
			'textdomain'   => 'xpro',
			'disable_loader' =>true,
//			'disable_output' =>true,
			'gutenberg_support' => true,
			'capability'  => 'edit_theme_options',
			'option_type' => 'theme_mod',
		);

		return $args;

	}

	add_filter( 'kirki/config', 'xpro_demo_configuration_sample' );

	function xpro_font_add_all_variants() {
		if ( class_exists( 'Kirki_Fonts_Google' ) ) {
			Kirki_Fonts_Google::$force_load_all_variants = true;
		}
	}

	add_action( 'after_setup_theme',  'xpro_font_add_all_variants', 100 );

	define( 'KIRKI_NO_OUTPUT', true );

// Customizer Custom Font
function xpro_add_custom_fonts( $system_fonts ){

		$custom_fonts = get_theme_mod( 'xpro_custom_font');
		$my_custom_fonts = array();
		if ( ! empty( $custom_fonts ) ) {
			foreach( $custom_fonts as $key=>$custom_font )
			{
				$my_custom_fonts[ $custom_font[ 'font_name' ] ] = array(
					'label' => $custom_font[ 'font_name' ],
					'stack' => $custom_font[ 'font_name' ] . ', sans-serif',
				);
			}
		}
		return array_merge_recursive( $my_custom_fonts, $system_fonts );
	}

add_filter( 'kirki/fonts/standard_fonts', 'xpro_add_custom_fonts' , 20);

// If plugin - 'Builder Builder' exist
if (class_exists( 'FLBuilderModel' ) ) {

	function xpro_bb_custom_fonts ( $system_fonts ) {

		$custom_fonts = get_theme_mod( 'xpro_custom_font');
		$my_custom_fonts = array();
		if ( ! empty( $custom_fonts ) ) {
			foreach( $custom_fonts as $key=>$custom_font )
			{
				$font_weight = (!empty($custom_font[ 'font_weight' ])) ? $custom_font[ 'font_weight' ] : 'default';

				$my_custom_fonts[ $custom_font[ 'font_name' ] ] = array(
					'fallback' => $custom_font[ 'font_name' ]. ', sans-serif',
					'weights' => array( $font_weight, ),
				);
			}
		}

		return array_merge_recursive( $my_custom_fonts, $system_fonts );

	}

	//Add to Beaver Builder Theme Customizer
	add_filter( 'fl_theme_system_fonts', 'xpro_bb_custom_fonts' );

	//Add to Beaver Builder modules
	add_filter( 'fl_builder_font_families_system', 'xpro_bb_custom_fonts' );
}

// If plugin - 'Elementor' exist
if ( class_exists( '\Elementor\Plugin' ) ) {

	function xpro_elementor_custom_fonts ( $system_fonts ) {

		$custom_fonts = get_theme_mod( 'xpro_custom_font');
		$my_custom_fonts = array();
		if ( ! empty( $custom_fonts ) ) {
			foreach( $custom_fonts as $key=>$custom_font )
			{
				$my_custom_fonts[ $custom_font[ 'font_name' ] ] = 'system';
			}
		}

		return array_merge_recursive( $my_custom_fonts, $system_fonts );

	}

	//Add to Elementor Fonts
	add_filter( 'elementor/fonts/additional_fonts', 'xpro_elementor_custom_fonts' );

}

function xpro_customize_register($wp_customize){

	/*** Configuration to disable default WordPress customizer tabs
	 **/

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


    /**
     * Partial Refresh Site title and description.
     */

    $wp_customize->selective_refresh->add_partial( 'header_site_title', [
        'selector'        => '.site-title a',
        'settings'        => [ 'blogname' ],
        'render_callback' => function() {
            return get_bloginfo( 'name', 'display' );
        },
    ] );

    $wp_customize->selective_refresh->add_partial( 'document_title', [
        'selector'        => 'head > title',
        'settings'        => [ 'blogname' ],
        'render_callback' => 'wp_get_document_title',
    ] );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector'        => '.site-description',
        'render_callback' => '_s_customize_partial_blogdescription',
    ) );



    /*================================
           Customizer Panel
    =================================*/

    /* Add Genral Panels */
    $wp_customize->add_panel( 'xpro_general_panel', array(
        'title' 	 	=> esc_html__( 'General', 'xpro' ),
        'capability' 	=> 'manage_options',
        'priority'	 	=> 21,
    ) );

	$wp_customize->add_panel( 'xpro_header_panel', array(
		'title' 	 	=> esc_html__( 'Header', 'xpro' ),
		'capability' 	=> 'manage_options',
		'priority'	 	=> 21,
	) );

	$wp_customize->add_panel( 'xpro_layout_panel', array(
		'title' 	 	=> esc_html__( 'Layout', 'xpro' ),
		'capability' 	=> 'manage_options',
		'priority'	 	=> 101,
	) );


    /*================================
           Customizer Section
    =================================*/


    //General
    $wp_customize->add_section( 'xpro_general_typography_section', array(
        'title'       => esc_html__( 'Typography', 'xpro' ),
        'capability'  => 'edit_theme_options',
        'panel'       => 'xpro_general_panel'
    ) );

	$wp_customize->add_section( 'xpro_general_color_section', array(
		'title'       => esc_html__( 'Color', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_general_panel'
	) );

	$wp_customize->add_section( 'xpro_general_preloader_section', array(
		'title'       => esc_html__( 'Pre Loader', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_general_panel'
	) );

	$wp_customize->add_section( 'xpro_general_scroll_top_section', array(
		'title'       => esc_html__( 'Scroll Top', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_general_panel'
	) );

	$wp_customize->add_section( 'xpro_general_button_section', array(
		'title'       => esc_html__( 'Button', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_general_panel'
	) );

	$wp_customize->add_section( 'xpro_general_custom_font_section', array(
		'title'       => esc_html__( 'Custom Fonts', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_general_panel'
	) );

	$wp_customize->add_section( 'xpro_general_minify_section', array(
		'title'       => esc_html__( 'Minify CSS/JS', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_general_panel'
	) );

	//Header
	$wp_customize->add_section( 'xpro_header_layout', array(
		'title'       => esc_html__( 'Layout', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_header_panel'
	) );

	$wp_customize->add_section( 'xpro_header_sub', array(
		'title'       => esc_html__( 'Submenu', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_header_panel'
	) );

	$wp_customize->add_section( 'xpro_header_logo', array(
		'title'       => esc_html__( 'Logo', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_header_panel'
	) );

	$wp_customize->add_section( 'xpro_hamburger', array(
		'title'       => esc_html__( 'Responsive Menu', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_header_panel'
	) );


	//Layout
	$wp_customize->add_section( 'xpro_layout_page_section', array(
		'title'       => esc_html__( 'Page', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_layout_panel'
	) );

	$wp_customize->add_section( 'xpro_layout_blog_section', array(
		'title'       => esc_html__( 'Blog', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_layout_panel'
	) );

	$wp_customize->add_section( 'xpro_layout_archive_section', array(
		'title'       => esc_html__( 'Archive', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_layout_panel'
	) );

	$wp_customize->add_section( 'xpro_layout_sticky_section', array(
		'title'       => esc_html__( 'Sticky Post', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_layout_panel'
	) );

	$wp_customize->add_section( 'xpro_layout_single_section', array(
		'title'       => esc_html__( 'Single Post', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_layout_panel'
	) );

	$wp_customize->add_section( 'xpro_layout_404_section', array(
		'title'       => esc_html__( '404 Page', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_layout_panel'
	) );

	if( class_exists( 'WooCommerce' )) {

	$wp_customize->add_section( 'xpro_layout_shop_section', array(
		'title'       => esc_html__( 'Shop Archive', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => 'xpro_layout_panel'
	) );

	}

	//Title Wrapper
	$wp_customize->add_section( 'xpro_layout_banner_section', array(
		'title'       => esc_html__( 'Banner', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => '',
		'priority'	 	=> 101,
	) );

	$wp_customize->add_section( 'xpro_layout_footer_section', array(
		'title'       => esc_html__( 'Footer', 'xpro' ),
		'capability'  => 'edit_theme_options',
		'panel'       => '',
		'priority'	 	=> 101,
	) );

}

}

add_action( 'customize_register', 'xpro_customize_register' );

/**
 * Advance Custom Field Options
 */

require XPRO_THEME_PARENT_FILE . '/lib/customizer/customizer-fields.php' ;
