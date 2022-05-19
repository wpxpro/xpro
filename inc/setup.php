<?php
/**
 * Theme basic setup
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 *  Xpro Theme Folder URI
 */
define('XPRO_THEME', 'xpro-bb-addons');
define('XPRO_VERSION', '1.0.0');
define('XPRO_THEME_DIR',         			get_template_directory());
define('XPRO_THEME_PARENT_FILE',         	get_parent_theme_file_path());
define('XPRO_THEME_URI',             		get_template_directory_uri());
define('XPRO_STYLESHEET_URI',             	get_stylesheet_directory_uri());
define('XPRO_THEME_IMAGES_URI',      		XPRO_THEME_URI . '/assets/img/' );

add_action( 'after_setup_theme', 'xpro_setup' );

if ( ! isset( $content_width ) ) {
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'xpro_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function xpro_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on xpro, use a find and replace
		 * to change 'xpro-bb-addons' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'xpro-bb-addons', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'xpro-bb-addons' ),
			)
		);

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'custom-background' );

		// Set Custom Header
		add_theme_support( 'custom-header', apply_filters( 'xpro_custom_header_args', array(
			'width'                  => 1920,
			'height'                 => 100,
		) ) );

		// Set Custom Logo
		add_theme_support( 'custom-logo', array(
			'height' => 480,
			'width'  => 720,
		) );

	}
}

// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {do_action( 'wp_body_open' );}
}
// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */

add_action( 'wp_print_footer_scripts', 'xpro_skip_link_focus_fix' );

if ( ! function_exists( 'xpro_skip_link_focus_fix' ) ) {
    function xpro_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
        /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
}

function xpro_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'xpro_excerpt_more');

/**
 * Xpro Excerpt Limit.
 */
if ( ! function_exists( 'xpro_excerpt' ) ) {

	$xpro_excerpt_limit = 15;

	function xpro_excerpt($limit) {

		$excerpt = explode(' ', get_the_excerpt(), $limit);

		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}

		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return print_r($excerpt);
	}
}
