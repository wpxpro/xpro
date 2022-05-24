<?php
/**
 * Beaver Themer Compatibility File.
 *
 * @package Xpro
 */

// If plugin - 'Beaver Themer' not exist then return.
if ( ! class_exists( 'FLThemeBuilderLoader' ) || ! class_exists( 'FLThemeBuilderLayoutData' ) ) {
	return;
}

/**
 * Xpro Beaver Themer Compatibility
 */
if ( ! class_exists( 'Xpro_Beaver_Themer' ) ) :

	/**
	 * Xpro Beaver Themer Compatibility
	 *
	 * @since 1.0.0
	 */
	class Xpro_Beaver_Themer {

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
			add_action( 'after_setup_theme', array( $this, 'header_footer_support' ) );
			add_action( 'wp', array( $this, 'theme_header_footer_render' ) );
			add_filter( 'fl_theme_builder_part_hooks', array( $this, 'register_part_hooks' ) );
		}

		/**
		 * Builder Template Content layout set as Full Width / Stretched
		 *
		 * @param  string $layout Content Layout.
		 * @return string
		 * @since  1.0.2
		 */
		public function builder_template_content_layout( $layout ) {

			$ids       = FLThemeBuilderLayoutData::get_current_page_content_ids();
			$post_type = get_post_type();

			if ( empty( $ids ) && 'fl-theme-layout' != $post_type ) {
				return $layout;
			}

			return 'page-builder';
		}

		/**
		 * Function to add Theme Support
		 *
		 * @since 1.0.0
		 */
		public function header_footer_support() {

			add_theme_support( 'fl-theme-builder-headers' );
			add_theme_support( 'fl-theme-builder-footers' );
			add_theme_support( 'fl-theme-builder-parts' );
		}

		/**
		 * Function to update Atra header/footer with Beaver template
		 *
		 * @since 1.0.0
		 */
		public function theme_header_footer_render() {

			// Get the header ID.
			$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

			// If we have a header, remove the theme header and hook in Theme Builder's.
			if ( ! empty( $header_ids ) ) {
				remove_action( 'xpro_header', 'xpro_construct_header' );
				add_action( 'xpro_header', 'FLThemeBuilderLayoutRenderer::render_header' );
			}

			// Get the footer ID.
			$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

			// If we have a footer, remove the theme footer and hook in Theme Builder's.
			if ( ! empty( $footer_ids ) ) {
				remove_action( 'xpro_footer', 'xpro_construct_footer' );
				add_action( 'xpro_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
			}

			// BB Themer Support.
			$template_ids = FLThemeBuilderLayoutData::get_current_page_content_ids();

			if ( ! empty( $template_ids ) ) {

				$template_id   = $template_ids[0];
				$template_type = get_post_meta( $template_id, '_fl_theme_layout_type', true );

				if ( 'archive' === $template_type || 'singular' === $template_type || '404' === $template_type || 'part' === $template_type ) {

					remove_action( 'xpro_title_wrapper', 'xpro_construct_title_wrapper' );
					remove_action( 'xpro_content_before', 'xpro_construct_content_before' );
					remove_action( 'xpro_content_after', 'xpro_construct_content_after' );

				}
			}
		}

		/**
		 * Function to Xpro theme parts
		 *
		 * @since 1.0.0
		 */
		public function register_part_hooks() {

			return array(
				array(
					'label' => 'Page',
					'hooks' => array(
						'xpro_body_top'    => __( 'Before Page', 'xpro' ),
						'xpro_body_bottom' => __( 'After Page', 'xpro' ),
					),
				),
				array(
					'label' => 'Header',
					'hooks' => array(
						'xpro_header_before' => __( 'Before Header', 'xpro' ),
						'xpro_header_after'  => __( 'After Header', 'xpro' ),
					),
				),
				array(
					'label' => 'Content',
					'hooks' => array(
						'xpro_primary_content_top'    => __( 'Before Content', 'xpro' ),
						'xpro_primary_content_bottom' => __( 'After Content', 'xpro' ),
					),
				),
				array(
					'label' => 'Footer',
					'hooks' => array(
						'xpro_footer_before' => __( 'Before Footer', 'xpro' ),
						'xpro_footer_after'  => __( 'After Footer', 'xpro' ),
					),
				),
				array(
					'label' => 'Sidebar',
					'hooks' => array(
						'xpro_sidebars_before' => __( 'Before Sidebar', 'xpro' ),
						'xpro_sidebars_after'  => __( 'After Sidebar', 'xpro' ),
					),
				),
				array(
					'label' => 'Posts',
					'hooks' => array(
						'xpro_entry_top'            => __( 'Before Post', 'xpro' ),
						'xpro_entry_bottom'         => __( 'After Post', 'xpro' ),
					),
				),
			);
		}

	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Xpro_Beaver_Themer::get_instance();
