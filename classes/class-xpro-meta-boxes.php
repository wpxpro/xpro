<?php
/**
 * Post Meta Box
 *
 * @package     Xpro
 * @author      Xpro
 * @copyright   Copyright (c) 2021, Xpro
 * @link        https://wpxpro.com/
 * @since       Xpro 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Meta Boxes setup
 */
if ( ! class_exists( 'Xpro_Meta_Boxes' ) ) {

	/**
	 * Meta Boxes setup
	 */
	class Xpro_Meta_Boxes {

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Meta Option
		 *
		 * @var $meta_option
		 */
		private static $meta_option;

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

			add_action( 'load-post.php', array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
			add_action( 'do_meta_boxes', array( $this, 'remove_metabox' ) );
		}

		/**
		 * Check if layout is bb themer's layout
		 */
		public static function is_bb_themer_layout() {

			$is_layout = false;

			$post_type = get_post_type();
			$post_id   = get_the_ID();

			if ( 'fl-theme-layout' === $post_type && $post_id ) {

				$is_layout = true;
			}

			return $is_layout;
		}

		/**
		 *  Remove Metabox for beaver themer specific layouts
		 */
		public function remove_metabox() {

			$post_type = get_post_type();
			$post_id   = get_the_ID();

            if('page' !== $post_type && 'post' !== $post_type){
	            remove_meta_box( 'xpro_settings_meta_box', $post_type,'side');
            }

		}

		/**
		 *  Init Metabox
		 */
		public function init_metabox() {

			add_action( 'add_meta_boxes', array( $this, 'setup_meta_box' ) );
			add_action( 'save_post', array( $this, 'save_meta_box' ) );

			/**
			 * Set metabox options
			 *
			 * @see https://php.net/manual/en/filter.filters.sanitize.php
			 */
			self::$meta_option = apply_filters(
				'xpro_meta_box_options',
				array(
					'xpro-main-header-display' => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'xpro-footer-layout'       => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-post-banner'         => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-sidebar-layout'     => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-content-layout'     => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'xpro-space-content' => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
				)
			);
		}

		/**
		 *  Setup Metabox
		 */
		public function setup_meta_box() {

			// Get all public posts.
			$post_types = get_post_types(
				array(
					'public' => true,
				)
			);

			$post_types['fl-theme-layout'] = 'fl-theme-layout';

			$metabox_name = sprintf(
			// Translators: %s is the theme name.
				__( '%s Settings', 'xpro' ),
				XPRO_THEME
			);

			// Enable for all posts.
			foreach ( $post_types as $type ) {

				if ( 'attachment' !== $type ) {
					add_meta_box(
						'xpro_settings_meta_box',              // Id.
						$metabox_name,                          // Banner.
						array( $this, 'markup_meta_box' ),      // Callback.
						$type,                                  // Post_type.
						'side',                                 // Context.
						'default'                               // Priority.
					);
				}
			}
		}

		/**
		 * Get metabox options
		 */
		public static function get_meta_option() {
			return self::$meta_option;
		}

		/**
		 * Metabox Markup
		 *
		 * @param  object $post Post object.
		 * @return void
		 */
		public function markup_meta_box( $post ) {

			wp_nonce_field( basename( __FILE__ ), 'xpro_settings_meta_box' );
			$stored = get_post_meta( $post->ID );

			if ( is_array( $stored ) ) {

				wp_enqueue_style( 'xpro-layout-metabox', get_template_directory_uri() . '/assets/css/admin/meta-box.css', array(), XPRO_VERSION );

				// Set stored and override defaults.
				foreach ( $stored as $key => $value ) {
					self::$meta_option[ $key ]['default'] = ( isset( $stored[ $key ][0] ) ) ? $stored[ $key ][0] : '';
				}
			}

			// Get defaults.
			$meta = self::get_meta_option();

			/**
			 * Get options
			 */

			$site_sidebar        = ( isset( $meta['site-sidebar-layout']['default'] ) ) ? $meta['site-sidebar-layout']['default'] : '';
			$site_content_layout = ( isset( $meta['site-content-layout']['default'] ) ) ? $meta['site-content-layout']['default'] : '';
			$site_post_banner     = ( isset( $meta['site-post-banner']['default'] ) ) ? $meta['site-post-banner']['default'] : '';
			$footer_bar          = ( isset( $meta['xpro-footer-layout']['default'] ) ) ? $meta['xpro-footer-layout']['default'] : '';
			$primary_header      = ( isset( $meta['xpro-main-header-display']['default'] ) ) ? $meta['xpro-main-header-display']['default'] : '';
			$space_content = ( isset( $meta['xpro-space-content']['default'] ) ) ? $meta['xpro-space-content']['default'] : '';

			$show_meta_field = ! self::is_bb_themer_layout();
			do_action( 'xpro_meta_box_markup_before', $meta );

			/**
			 * Option: Sidebar
			 */
			?>
            <div class="site-sidebar-layout-meta-wrap components-base-control__field">
                <p class="post-attributes-label-wrapper" >
                    <strong> <?php esc_html_e( 'Sidebar Layout', 'xpro' ); ?> </strong>
                </p>
                <select name="site-sidebar-layout" id="site-sidebar-layout">
                    <option value="" <?php selected( $site_sidebar, 'default' ); ?> > <?php esc_html_e( 'Default', 'xpro' ); ?></option>
                    <option value="left-layout" <?php selected( $site_sidebar, 'left-layout' ); ?> > <?php esc_html_e( 'Left Sidebar', 'xpro' ); ?></option>
                    <option value="right-layout" <?php selected( $site_sidebar, 'right-layout' ); ?> > <?php esc_html_e( 'Right Sidebar', 'xpro' ); ?></option>
                    <option value="full-layout" <?php selected( $site_sidebar, 'full-layout' ); ?> > <?php esc_html_e( 'No Sidebar', 'xpro' ); ?></option>
                </select>
            </div>
			<?php
			/**
			 * Option: Sidebar
			 */
			?>
            <div class="site-content-layout-meta-wrap components-base-control__field">
                <p class="post-attributes-label-wrapper" >
                    <strong> <?php esc_html_e( 'Content Layout', 'xpro' ); ?> </strong>
                </p>
                <select name="site-content-layout" id="site-content-layout">
                    <option value="" <?php selected( $site_content_layout, 'default' ); ?> > <?php esc_html_e( 'Default', 'xpro' ); ?></option>
                    <option value="xpro-container" <?php selected( $site_content_layout, 'xpro-container' ); ?> > <?php esc_html_e( 'Container', 'xpro' ); ?></option>
                    <option value="xpro-container-fluid" <?php selected( $site_content_layout, 'xpro-container-fluid' ); ?> > <?php esc_html_e( 'Container Fluid', 'xpro' ); ?></option>
                    <option value="xpro-page-builder" <?php selected( $site_content_layout, 'xpro-page-builder' ); ?> > <?php esc_html_e( 'Full Width', 'xpro' ); ?></option>
                </select>
            </div>
			<?php
			/**
			 * Option: Disable Sections - Primary Header, Banner, Footer Widgets, Footer Bar
			 */
			?>
            <div class="disable-section-meta-wrap components-base-control__field">
                <p class="post-attributes-label-wrapper">
                    <strong> <?php esc_html_e( 'Disable Sections', 'xpro' ); ?> </strong>
                </p>
                <div class="disable-section-meta">
					<?php do_action( 'xpro_meta_box_markup_disable_sections_before', $meta ); ?>

                    <div class="xpro-main-header-display-option-wrap">
                        <label for="xpro-main-header-display">
                            <input type="checkbox" id="xpro-main-header-display" name="xpro-main-header-display" value="disabled" <?php checked( $primary_header, 'disabled' ); ?> />
							<?php esc_html_e( 'Disable Header', 'xpro' ); ?>
                        </label>
                    </div>
					<?php do_action( 'xpro_meta_box_markup_disable_sections_after_primary_header', $meta ); ?>
					<?php if ( $show_meta_field ) { ?>
                        <div class="site-post-banner-option-wrap">
                            <label for="site-post-banner">
                                <input type="checkbox" id="site-post-banner" name="site-post-banner" value="disabled" <?php checked( $site_post_banner, 'disabled' ); ?> />
								<?php esc_html_e( 'Disable Banner', 'xpro' ); ?>
                            </label>
                        </div>

                        <div class="xpro-space-content-option-wrap">
                            <label for="xpro-space-content">
                                <input type="checkbox" id="xpro-space-content" name="xpro-space-content" value="disabled" <?php checked( $space_content, 'disabled' ); ?> />
								<?php esc_html_e( 'Disable Space', 'xpro' ); ?>
                            </label>
                        </div>

                        <div class="xpro-footer-layout-option-wrap">
                            <label for="xpro-footer-layout">
                                <input type="checkbox" id="xpro-footer-layout" name="xpro-footer-layout" value="disabled" <?php checked( $footer_bar, 'disabled' ); ?> />
								<?php esc_html_e( 'Disable Footer', 'xpro' ); ?>
                            </label>
                        </div>

					<?php } ?>

					<?php do_action( 'xpro_meta_box_markup_disable_sections_after', $meta ); ?>
                </div>
            </div>
			<?php

			do_action( 'xpro_meta_box_markup_after', $meta );
		}

		/**
		 * Metabox Save
		 *
		 * @param  number $post_id Post ID.
		 * @return void
		 */
		public function save_meta_box( $post_id ) {

			// Checks save status.
			$is_autosave = wp_is_post_autosave( $post_id );
			$is_revision = wp_is_post_revision( $post_id );

			$is_valid_nonce = ( isset( $_POST['xpro_settings_meta_box'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['xpro_settings_meta_box'] ) ), basename( __FILE__ ) ) ) ? true : false;

			// Exits script depending on save status.
			if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
				return;
			}

			/**
			 * Get meta options
			 */
			$post_meta = self::get_meta_option();

			foreach ( $post_meta as $key => $data ) {

				// Sanitize values.
				$sanitize_filter = ( isset( $data['sanitize'] ) ) ? $data['sanitize'] : 'FILTER_DEFAULT';

				switch ( $sanitize_filter ) {

					case 'FILTER_SANITIZE_STRING':
						$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_STRING );
						break;

					case 'FILTER_SANITIZE_URL':
						$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_URL );
						break;

					case 'FILTER_SANITIZE_NUMBER_INT':
						$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_NUMBER_INT );
						break;

					default:
						$meta_value = filter_input( INPUT_POST, $key, FILTER_DEFAULT );
						break;
				}

				// Store values.
				if ( $meta_value ) {
					update_post_meta( $post_id, $key, $meta_value );
				} else {
					delete_post_meta( $post_id, $key );
				}
			}

		}
	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Xpro_Meta_Boxes::get_instance();
