<?php
/**
 * Elementor Compatibility File.
 *
 * @package Xpro
 */

namespace Elementor;// phpcs:ignore PHPCompatibility.Keywords.NewKeywords.t_namespaceFound, WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' ) ) {
	return;
}

/**
 * Xpro Elementor Compatibility
 */
if ( ! class_exists( 'Xpro_Elementor' ) ) :

	/**
	 * Xpro Elementor Compatibility
	 *
	 * @since 1.0.0
	 */
	class Xpro_Elementor {

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
			add_action( 'wp', array( $this, 'elementor_default_setting' ), 20 );
			add_action( 'elementor/preview/init', array( $this, 'elementor_default_setting' ) );
		}

		/**
		 * Elementor Content layout set as Page Builder
		 *
		 * @return void
		 * @since  1.0.2
		 */
		public function elementor_default_setting() {

			if ( false == xpro_enable_page_builder_compatibility() || 'post' == get_post_type() ) {
				return;
			}

			if(get_post_type() == 'elementor_library'){
				remove_action( 'xpro_header', 'xpro_construct_header' );
				remove_action( 'xpro_title_wrapper', 'xpro_construct_title_wrapper' );
				remove_action( 'xpro_content_before', 'xpro_construct_content_before' );
				remove_action( 'xpro_content_after', 'xpro_construct_content_after' );
				remove_action( 'xpro_footer', 'xpro_construct_footer' );
				remove_action( 'xpro_post_nav', 'xpro_construct_post_nav' );
				remove_action( 'xpro_content_loop', 'xpro_construct_content_loop' );
				remove_action( 'xpro_sidebar', 'xpro_construct_sidebar' );
				add_filter( 'single_template', [ $this, 'blank_template' ] );

			}

		}

		function blank_template( $template ) {


			if ( file_exists( XPRO_THEME_DIR . '/template-parts/blank.php' ) ) {
				return XPRO_THEME_DIR . '/template-parts/blank.php';
			}

			return $template;
		}


		/**
		 * Check is elementor activated.
		 *
		 * @param int $id Post/Page Id.
		 * @return boolean
		 */
		public function is_elementor_activated( $id ) {
			if ( version_compare( ELEMENTOR_VERSION, '1.5.0', '<' ) ) {
				return ( 'builder' === Plugin::$instance->db->get_edit_mode( $id ) );
			} else {
				return Plugin::$instance->db->is_built_with_elementor( $id );
			}
		}

		/**
		 * Check if Elementor Editor is open.
		 *
		 * @since  1.2.7
		 *
		 * @return boolean True IF Elementor Editor is loaded, False If Elementor Editor is not loaded.
		 */
		private function is_elementor_editor() {
			if ( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				return true;
			}

			return false;
		}

	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Xpro_Elementor::get_instance();
