<?php
/**
 * Xpro functions and definitions
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Xpro's includes directory.
$xpro_inc_dir = get_template_directory();

// Array of files to include.
$xpro_includes = array(

	'/inc/setup.php',                           // Theme setup and custom theme supports.
	'/inc/widgets.php',                         // Register widget area.
	'/inc/enqueue.php',                         // Enqueue scripts and styles.
	'/inc/template-tags.php',                   // Custom template tags for this theme.
	'/inc/pagination.php',                      // Custom pagination for this theme.
	'/inc/hooks.php',                           // Custom hooks.
	'/inc/extras.php',                          // Custom functions that act independently of the theme templates.
	'/inc/editor.php',                          // Load Editor functions.

	//Load Classes
	'/classes/class-xpro-navwalker.php',        // Load class navwalker.
	'/classes/class-xpro-script-loader.php',    // Load class script loader.
	'/classes/class-xpro-breadcrumb.php',      // Load breadcrumb.
	'/classes/class-xpro-meta-boxes.php',      // Load meta boxes.

	//Compatibility
	'/classes/compatibility/class-xpro-beaver-builder.php',  // Beaver Builder Compatibility.
	'/classes/compatibility/class-xpro-beaver-themer.php',  // Beaver Themer Compatibility.
	'/classes/compatibility/class-xpro-elementor.php',      // Elementor Compatibility.
	'/classes/compatibility/class-xpro-elementor-pro.php',      // Elementor Compatibility.

	//Load Libraries
	'/lib/customizer/customizer-config.php',          // Load class navwalker.

);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$xpro_includes[] = '/inc/woocommerce.php';
}

// Load Kirki Plugin.
if ( ! class_exists( 'Kirki' ) ) {
	$xpro_includes[] = '/lib/plugins/kirki/kirki.php';
}

// Include files.
foreach ( $xpro_includes as $xpro_file ) {
	require_once $xpro_inc_dir . $xpro_file;
}
