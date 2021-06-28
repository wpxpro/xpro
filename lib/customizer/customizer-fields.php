<?php
/**
 *	Customizer General Settings
 *	styles for logo/title - sizing, spacing ...
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Xpro_Fields{

	/**
     * Holds the class object.
     *
     * @since 1.0.0
     *
     */

	public static $_instance;

	/**
     * Load Construct
     *
     * @since 1.0.0
     */

	public function __construct(){
		$this->xs_customizer_init();
	}

	/**
     * Customizer field Initialization
     *
     * @since 1.0.0
     *
     */

	public function xs_customizer_init(){
		add_filter( 'kirki/fields', array($this,'xpro_general_setting') );
	}

	public function xpro_general_setting( $xpro_fields ){

		require XPRO_THEME_PARENT_FILE . '/lib/customizer/customizer-maps/general-settings.php';
		require XPRO_THEME_PARENT_FILE . '/lib/customizer/customizer-maps/header-settings.php';
		require XPRO_THEME_PARENT_FILE . '/lib/customizer/customizer-maps/layout-settings.php';
		require XPRO_THEME_PARENT_FILE . '/lib/customizer/customizer-maps/banner-settings.php';
		require XPRO_THEME_PARENT_FILE . '/lib/customizer/customizer-maps/footer-settings.php';

		return $xpro_fields;
	}

	public static function xpro_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Xpro_Fields();
        }
        return self::$_instance;
    }
}
$Xpro_Fields = Xpro_Fields::xpro_get_instance();
