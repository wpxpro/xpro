<?php
/**
 * Declaring widgets
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//Widget Init
add_action( 'widgets_init', 'xpro_widgets_init' );

if ( ! function_exists( 'xpro_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function xpro_widgets_init() {

		register_sidebar(
			array(
				'name'          => __( 'Main Sidebar', 'xpro' ),
				'id'            => 'xpro-main-sidebar',
				'description'   => __( 'Right sidebar widget area', 'xpro' ),
				'before_widget' => '<div id="%1$s" class="xpro-widget widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);

		if ( class_exists( 'WooCommerce' ) ) {

			register_sidebar(
				array(
					'name'          => __( 'WooCommerce Shop', 'xpro' ),
					'id'            => 'xpro-woocommerce-sidebar',
					'description'   => __( 'Woocommerce sidebar widget area', 'xpro' ),
					'before_widget' => '<div id="%1$s" class="xpro-widget widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="widget-title">',
					'after_title'   => '</h4>',
				)
			);
		}

	}
}

/**
 * Add span elements to post count number in category widget
 * @since  1.0
 */
add_filter( 'wp_list_categories', 'xpro_modify_category_widget_post_count', 10, 2 );

if ( ! function_exists( 'xpro_modify_category_widget_post_count' ) ):
	function xpro_modify_category_widget_post_count( $links, $args ) {
	if ( isset( $args['taxonomy'] ) && $args['taxonomy'] != 'category' ) {
		return $links;
	}
	if ( !isset( $args['show_count'] ) ||  !$args['show_count'] ) {
		return $links;
	}
	$links = str_replace( '(', '<span class="xpro-count">', $links );
	$links = str_replace( ')', '</span>', $links );
	return $links;
	}

endif;

/**
 * Add span elements to post count number in archives widget
 * @since  1.0
 */
add_filter( 'get_archives_link', 'xpro_modify_archive_widget_post_count', 10, 6 );

if ( !function_exists( 'xpro_modify_archive_widget_post_count' ) ):
	function xpro_modify_archive_widget_post_count( $link_html, $url, $text, $format, $before, $after ) {
	if ( $format == 'html' && !empty( $after ) ) {
		$new_after = str_replace( '(', '<span class="xpro-count">', $after );
		$new_after = str_replace( ')', '</span>', $new_after );
		$link_html = str_replace( $after, $new_after, $link_html );
	}
	return $link_html;
}

endif;
