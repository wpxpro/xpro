<?php
/**
 * Beaver Builder Compatibility File.
 *
 * @package Xpro
 */

// If plugin - 'Builder Builder' not exist then return.
if ( ! class_exists( 'FLBuilderModel' ) ) {
	return;
}

/**
 * Xpro Beaver Builder Compatibility
 */
if ( ! class_exists( 'Xpro_Beaver_Builder' ) ) :

	/**
	 * Xpro Beaver Builder Compatibility
	 *
	 * @since 1.0.0
	 */
	class Xpro_Beaver_Builder {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'wp', array( $this, 'beaver_builder_default_setting' ), 20 );
			add_action( 'do_meta_boxes', array( $this, 'beaver_builder_default_setting' ), 20 );
		}

		/**
		 * Builder Template Content layout set as Full Width / Stretched
		 *
		 * @since  1.0.13
		 * @return void
		 */
		public function beaver_builder_default_setting() {

			if ( false == xpro_enable_page_builder_compatibility() || 'post' == get_post_type() ) {
				return;
			}

		}

	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Xpro_Beaver_Builder::get_instance();
