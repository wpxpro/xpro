<?php
/**
 * Add WooCommerce support
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'xpro_woocommerce_support' );
if ( ! function_exists( 'xpro_woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function xpro_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add Product Gallery support.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Add Bootstrap classes to form fields.
		add_filter( 'woocommerce_form_field_args', 'xpro_wc_form_field_args', 10, 3 );
	}
}


if ( ! function_exists( 'xpro_wc_form_field_args' ) ) {
	/**
	 * Filter hook function monkey patching form classes
	 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
	 *
	 * @param string $args Form attributes.
	 * @param string $key Not in use.
	 * @param null   $value Not in use.
	 *
	 * @return mixed
	 */
	function xpro_wc_form_field_args( $args, $key, $value = null ) {
		// Start field type switch case.
		switch ( $args['type'] ) {
			// Targets all select input type elements, except the country and state select input types.
			case 'select':
				/*
				 * Add a class to the field's html element wrapper - woocommerce
				 * input types (fields) are often wrapped within a <p></p> tag.
				 */
				$args['class'][] = 'form-group';
				// Add a class to the form input itself.
				$args['input_class'] = array( 'form-control' );
				// Add custom data attributes to the form input itself.
				$args['custom_attributes'] = array(
					'data-plugin'      => 'select2',
					'data-allow-clear' => 'true',
					'aria-hidden'      => 'true',
				);
				break;

			/*
			 * By default WooCommerce will populate a select with the country names - $args
			 * defined for this specific input type targets only the country select element.
			 */
			case 'country':
				$args['class'][] = 'form-group single-country';
				break;

			/*
			 * By default WooCommerce will populate a select with state names - $args defined
			 * for this specific input type targets only the country select element.
			 */
			case 'state':
				$args['class'][]           = 'form-group';
				$args['custom_attributes'] = array(
					'data-plugin'      => 'select2',
					'data-allow-clear' => 'true',
					'aria-hidden'      => 'true',
				);
				break;
			case 'password':
			case 'text':
			case 'email':
			case 'tel':
			case 'number':
				$args['class'][]     = 'form-group';
				$args['input_class'] = array( 'form-control' );
				break;
			case 'textarea':
				$args['input_class'] = array( 'form-control' );
				break;
			case 'checkbox':
					$args['class'][] = 'form-group';
					// Wrap the label in <span> tag.
					$args['label'] = isset( $args['label'] ) ? '<span class="custom-control-label">' . $args['label'] . '<span>' : '';
					// Add a class to the form input's <label> tag.
					$args['label_class'] = array( 'custom-control custom-checkbox' );
					$args['input_class'] = array( 'custom-control-input' );
				break;
			case 'radio':
				$args['label_class'] = array( 'custom-control custom-radio' );
				$args['input_class'] = array( 'custom-control-input' );
				break;
			default:
				$args['class'][]     = 'form-group';
				$args['input_class'] = array( 'form-control' );
				break;
		} // End of switch ( $args ).
		return $args;
	}
}

if ( ! is_admin() && ! function_exists( 'wc_review_ratings_enabled' ) ) {
	/**
	 * Check if reviews are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
	function wc_reviews_enabled() {
		return 'yes' === get_option( 'woocommerce_enable_reviews' );
	}

	/**
	 * Check if reviews ratings are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
	function wc_review_ratings_enabled() {
		// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
		return wc_reviews_enabled() && 'yes' === get_option( 'woocommerce_enable_review_rating' );
	}
}


/* To Remove woocommerce_breadcrumb Action And Add New Action For WooCommerce Breadcrumb */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'xpro_woocommerce_breadcrumb', 'xpro_woocommerce_breadcrumb', 20, 0 );

if ( ! function_exists( 'xpro_woocommerce_breadcrumb' ) ) {
	function xpro_woocommerce_breadcrumb( $args = array() ) {
		// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
		$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => '',
			'wrap_before' => '',
			'wrap_after'  => '',
			'before'      => '<li>',
			'after'       => '</li>',
			'home'        => _x( 'Home', 'breadcrumb', 'xpro' ),
		) ) );

		$breadcrumbs = new WC_Breadcrumb();

		if ( ! empty( $args['home'] ) ) {
			// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}

		$args['breadcrumb'] = $breadcrumbs->generate();

		/**
		 * WooCommerce Breadcrumb hook
		 *
		 * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
		 */
		// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
		do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

		wc_get_template( 'global/breadcrumb.php', $args );
	}
}

/* Add no. of column for shop or archive page */
add_filter( 'loop_shop_columns', 'xpro_override_loop_shop_columns', 99 );
if ( ! function_exists( 'xpro_override_loop_shop_columns' ) ) {
	function xpro_override_loop_shop_columns( $no_of_columns ) {

		$xpro_product_archive_page_column = xpro_get_option( 'xpro_shop_post_layout', '3' );
		$no_of_columns = esc_attr( $xpro_product_archive_page_column );

		return $no_of_columns;
	}
}

/* Add no. of column for shop single page */
add_filter( 'woocommerce_output_related_products_args', 'xpro_related_products_args', 20 );
function xpro_related_products_args( $args ) {

	$xpro_product_single_page_column = xpro_get_option( 'xpro_shop_post_layout', '3' );

	$args['columns'] = $xpro_product_single_page_column; // arranged in 2 columns
	$args['posts_per_page'] = $xpro_product_single_page_column; // 4 related products

	return $args;
}

/* Add product per page for shop or archive page */
add_filter( 'loop_shop_per_page', 'xpro_override_loop_shop_per_page', 99 );
if ( ! function_exists( 'xpro_override_loop_shop_per_page' ) ) {
	function xpro_override_loop_shop_per_page( $per_page ) {

		$xpro_product_archive_page_per_page = xpro_get_option( 'xpro_shop_post_per_pages', '12' );
		$per_page = esc_attr( $xpro_product_archive_page_per_page );

		return $per_page;
	}
}
