<?php
/**
 * Xpro enqueue scripts
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'xpro_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function xpro_scripts() {

		$css_type = xpro_get_option('xpro_minify_css_enable','0');
		$js_type = xpro_get_option('xpro_minify_js_enable','0');

		// Get the theme data.
		$dir_uri = get_template_directory_uri();

		$css_version = XPRO_VERSION . '.' . filemtime( get_template_directory() . "/assets/css/xpro-main.min.css" );

		if($css_type == '0'){

			wp_enqueue_style( 'xpro-grid', $dir_uri . "/assets/css/xpro-grid.min.css", array(), '1.0.0', 'all' );
			wp_enqueue_style( 'xpro-theme-main', $dir_uri . "/assets/css/xpro-main.min.css", array(), $css_version, 'all' );
			wp_enqueue_style( 'xpro-icons', $dir_uri . "/assets/css/xpro-icons.min.css", array(), '1.0.0', 'all' );

			if(is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() || is_search() ){
				wp_enqueue_style( 'xpro-theme-blog', $dir_uri . "/assets/css/xpro-blog.min.css", array(), $css_version, 'all' );
			}

			if ( is_active_sidebar( 'xpro-main-sidebar' ) ){
				wp_enqueue_style( 'xpro-theme-sidebar', $dir_uri . "/assets/css/xpro-sidebar.min.css", array(), $css_version, 'all');
			}

			if ( class_exists( 'WooCommerce' ) ){
				wp_enqueue_style( 'xpro-theme-woocommerce', $dir_uri . "/assets/css/xpro-woocommerce.min.css", array(), $css_version, 'all');
			}

			wp_enqueue_style( 'xpro-theme-responsive', $dir_uri . "/assets/css/xpro-responsive.min.css", array(), $css_version, 'all' );

		}else{

			wp_enqueue_style( 'xpro-theme-main', $dir_uri . "/assets/css/xpro-main-all.min.css", array(), $css_version, 'all' );
			wp_enqueue_style( 'xpro-theme-responsive', $dir_uri . "/assets/css/xpro-responsive.min.css", array(), $css_version, 'all' );

		}

		if($js_type == '0'){
			$js_version = XPRO_VERSION . '.' . filemtime( get_template_directory() . "/assets/js/xpro-functions.js" );
			wp_enqueue_script( 'xpro-theme-main', $dir_uri . "/assets/js/xpro-functions.js", array('jquery'), $js_version, true );
		}else{
			$js_version = XPRO_VERSION . '.' . filemtime( get_template_directory() . "/assets/js/xpro-functions.min.js" );
			wp_enqueue_script( 'xpro-theme-main', $dir_uri . "/assets/js/xpro-functions.min.js", array('jquery'), $js_version, true );
		}

		wp_script_add_data( 'xpro-theme-main', 'async', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'xpro_scripts' );

/**
 * Enqueue supplemental block editor styles.
 */

add_action( 'enqueue_block_editor_assets', 'xpro_block_editor_styles', 1, 1 );

if ( ! function_exists( 'xpro_block_editor_styles' ) ) {

function xpro_block_editor_styles() {

	// Enqueue the editor styles.
	wp_enqueue_style( 'xpro-block-editor-styles', get_theme_file_uri( '/assets/css/admin/editor-style-block.min.css' ), array(),XPRO_VERSION, 'all' );
	wp_style_add_data( 'xpro-block-editor-styles', 'rtl', 'replace' );

	}
}

/**
 * Load theme's JavaScript and CSS sources For Admin.
 */

add_action( 'admin_enqueue_scripts', 'xpro_admin_scripts',99);

if ( ! function_exists( 'xpro_admin_scripts' ) ) {

	function xpro_admin_scripts() {
		wp_enqueue_style( 'xpro-theme-customizer', get_theme_file_uri( '/assets/css/admin/customizer.min.css' ), array(),XPRO_VERSION,'all');

	}
}


/**
 * Generate custom css base on customizer settings
 */

if( ! function_exists( 'xpro_generate_custom_css' ) ) {

	function xpro_generate_custom_css() {

		$output_css = '';
		ob_start();

		/* Include custom css */
		require_once XPRO_THEME_DIR . '/lib/customizer/customizer-output/custom-css.php';
		$output_css = ob_get_contents();

		ob_end_clean();

		// 1. Remove comments.
		$output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
		// 2. Remove whitespace.
		$output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
		// 3. Remove starting whitespace.
		$output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

		wp_add_inline_style( 'xpro-theme-main', $output_css );

	}

}

add_action( 'wp_enqueue_scripts', 'xpro_generate_custom_css', 999 );

