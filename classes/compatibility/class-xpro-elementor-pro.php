<?php
/**
 * Elementor Compatibility File.
 *
 * @package Xpro
 */

namespace Elementor; // phpcs:ignore PHPCompatibility.Keywords.NewKeywords.t_namespaceFound, WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) || ! class_exists( 'ElementorPro\Modules\ThemeBuilder\Module' ) ) {
	return;
}

namespace ElementorPro\Modules\ThemeBuilder\ThemeSupport; // phpcs:ignore PHPCompatibility.Keywords.NewKeywords.t_namespaceFound, PHPCompatibility.LanguageConstructs.NewLanguageConstructs.t_ns_separatorFound, WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

// @codingStandardsIgnoreStart PHPCompatibility.Keywords.NewKeywords.t_useFound
use Elementor\TemplateLibrary\Source_Local;
use ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager;
use ElementorPro\Modules\ThemeBuilder\Module;
// @codingStandardsIgnoreEnd PHPCompatibility.Keywords.NewKeywords.t_useFound

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Xpro Elementor Compatibility
 */
if ( ! class_exists( 'Xpro_Elementor_Pro' ) ) :

	/**
	 * Xpro Elementor Compatibility
	 *
	 * @since 1.2.7
	 */
	class Xpro_Elementor_Pro {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.2.7
		 * @return object Class object.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.2.7
		 */
		public function __construct() {
			// Add locations.
			add_action( 'elementor/theme/register_locations', array( $this, 'register_locations' ) );

			// Override theme templates.
			add_action( 'xpro_header', array( $this, 'do_header' ), 0 );
			add_action( 'xpro_footer', array( $this, 'do_footer' ), 0 );
			add_action( 'xpro_title_wrapper', array( $this, 'do_template_parts' ), 0 );
			add_action( 'xpro_not_found', array( $this, 'do_template_part_404' ), 0 );

		}

		/**
		 * Register Locations
		 *
		 * @since 1.2.7
		 * @param object $manager Location manager.
		 * @return void
		 */
		public function register_locations( $manager ) {
			$manager->register_all_core_location();
		}

		/**
		 * Template Parts Support
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function do_template_parts() {

			// Is Archive?
			$did_location = Module::instance()->get_locations_manager()->do_location( 'archive' );
			if ( $did_location ) {
				remove_action( 'xpro_title_wrapper', 'xpro_construct_title_wrapper' );
				remove_action( 'xpro_content_before', 'xpro_construct_content_before' );
				remove_action( 'xpro_content_after', 'xpro_construct_content_after' );
			}

			// IS Single?
			$did_location = Module::instance()->get_locations_manager()->do_location( 'single' );
			if ( $did_location ) {
				remove_action( 'xpro_title_wrapper', 'xpro_construct_title_wrapper' );
				remove_action( 'xpro_content_before', 'xpro_construct_content_before' );
				remove_action( 'xpro_content_after', 'xpro_construct_content_after' );
			}
		}

		/**
		 * Override 404 page
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function do_template_part_404() {
			if ( is_404() ) {

				// Is Single?
				$did_location = Module::instance()->get_locations_manager()->do_location( 'single' );
				if ( $did_location ) {
					remove_action( 'xpro_not_found', 'xpro_construct_not_found' );
				}
			}
		}

		/**
		 * Header Support
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function do_header() {
			$did_location = Module::instance()->get_locations_manager()->do_location( 'header' );
			if ( $did_location ) {
				remove_action( 'xpro_header', 'xpro_construct_header' );
			}
		}

		/**
		 * Footer Support
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function do_footer() {
			$did_location = Module::instance()->get_locations_manager()->do_location( 'footer' );
			if ( $did_location ) {
				remove_action( 'xpro_footer', 'xpro_construct_footer' );
			}
		}

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Xpro_Elementor_Pro::get_instance();

endif;
