<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_filter( 'body_class', 'xpro_body_classes' );

if ( ! function_exists( 'xpro_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function xpro_body_classes( $classes ) {

		$classes[] = 'xpro-theme';

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		return $classes;
	}
}

if ( function_exists( 'xpro_adjust_body_class' ) ) {
	/*
	 * xpro_adjust_body_class() deprecated in v0.9.4. We keep adding the
	 * filter for child themes which use their own xpro_adjust_body_class.
	 */
	add_filter( 'body_class', 'xpro_adjust_body_class' );
}

if ( ! function_exists( 'xpro_pingback' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts of any post type.
	 */
	function xpro_pingback() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">' . "\n";
		}
	}
}
add_action( 'wp_head', 'xpro_pingback' );

if ( ! function_exists( 'xpro_mobile_web_app_meta' ) ) {
	/**
	 * Add mobile-web-app meta.
	 */
	function xpro_mobile_web_app_meta() {
		echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
		echo '<meta name="apple-mobile-web-app-title" content="' . esc_attr( get_bloginfo( 'name' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'xpro_mobile_web_app_meta' );

if ( ! function_exists( 'xpro_default_body_attributes' ) ) {
	/**
	 * Adds schema markup to the body element.
	 *
	 * @param array $atts An associative array of attributes.
	 * @return array
	 */
	function xpro_default_body_attributes( $atts ) {
		$atts['itemscope'] = '';
		$atts['itemtype']  = 'http://schema.org/WebSite';
		return $atts;
	}
}
add_filter( 'xpro_body_attributes', 'xpro_default_body_attributes' );

// Escapes all occurances of 'the_archive_description'.
add_filter( 'get_the_archive_description', 'xpro_escape_the_archive_description' );

if ( ! function_exists( 'xpro_escape_the_archive_description' ) ) {
	/**
	 * Escapes the description for an author or post type archive.
	 *
	 * @param string $description Archive description.
	 * @return string Maybe escaped $description.
	 */
	function xpro_escape_the_archive_description( $description ) {
		if ( is_author() || is_post_type_archive() ) {
			return wp_kses_post( $description );
		}

		/*
		 * All other descriptions are retrieved via term_description() which returns
		 * a sanitized description.
		 */
		return $description;
	}
} // End of if function_exists( 'xpro_escape_the_archive_description' ).

// Escapes all occurances of 'the_title()' and 'get_the_title()'.
add_filter( 'the_title', 'xpro_kses_title' );

// Escapes all occurances of 'the_archive_title' and 'get_the_archive_title()'.
add_filter( 'get_the_archive_title', 'xpro_kses_title' );

if ( ! function_exists( 'xpro_kses_title' ) ) {
	/**
	 * Sanitizes data for allowed HTML tags for post title.
	 *
	 * @param string $data Post title to filter.
	 * @return string Filtered post title with allowed HTML tags and attributes intact.
	 */
	function xpro_kses_title( $data ) {
		// Tags not supported in HTML5 are not allowed.
		$allowed_tags = array(
			'abbr'             => array(),
			'aria-describedby' => true,
			'aria-details'     => true,
			'aria-label'       => true,
			'aria-labelledby'  => true,
			'aria-hidden'      => true,
			'b'                => array(),
			'bdo'              => array(
				'dir' => true,
			),
			'blockquote'       => array(
				'cite'     => true,
				'lang'     => true,
				'xml:lang' => true,
			),
			'cite'             => array(
				'dir'  => true,
				'lang' => true,
			),
			'dfn'              => array(),
			'em'               => array(),
			'i'                => array(
				'aria-describedby' => true,
				'aria-details'     => true,
				'aria-label'       => true,
				'aria-labelledby'  => true,
				'aria-hidden'      => true,
				'class'            => true,
			),
			'code'             => array(),
			'del'              => array(
				'datetime' => true,
			),
			'ins'              => array(
				'datetime' => true,
				'cite'     => true,
			),
			'kbd'              => array(),
			'mark'             => array(),
			'pre'              => array(
				'width' => true,
			),
			'q'                => array(
				'cite' => true,
			),
			's'                => array(),
			'samp'             => array(),
			'span'             => array(
				'dir'      => true,
				'align'    => true,
				'lang'     => true,
				'xml:lang' => true,
			),
			'small'            => array(),
			'strong'           => array(),
			'sub'              => array(),
			'sup'              => array(),
			'u'                => array(),
			'var'              => array(),
		);
		$allowed_tags = apply_filters( 'xpro_kses_title', $allowed_tags );

		return wp_kses( $data, $allowed_tags );
	}
} // End of if function_exists( 'xpro_kses_title' ).

/**
 * Xpro Check Post.
 */
if ( ! function_exists( 'xpro_is_blog' ) ) {
	function xpro_is_blog() {
		return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() ) && 'post' == get_post_type();
	}
}

/**
 * Xpro page title option for individual pages.
 */
if ( ! function_exists( 'xpro_breadcrumb_display' ) ) {
	function xpro_breadcrumb_display() {

		if( class_exists( 'WooCommerce' ) && ( is_product() || is_product_category() || is_tax('product_brand') || is_shop() ) ) {// if WooCommerce plugin is activated and WooCommerce category, brand, shop page

			ob_start();
			do_action('xpro_woocommerce_breadcrumb');
			return ob_get_clean();

		} elseif (class_exists('Xpro_Breadcrumb_Navigation')) {


			$xpro_breadcrumb = new Xpro_Breadcrumb_Navigation;
			$xpro_breadcrumb->opt['static_frontpage'] = false;
			$xpro_breadcrumb->opt['url_blog'] = '';
			$xpro_breadcrumb->opt['title_blog'] = esc_html__( 'Home', 'xpro' );
			$xpro_breadcrumb->opt['title_home'] = esc_html__( 'Home', 'xpro' );
			$xpro_breadcrumb->opt['separator'] = '';
			$xpro_breadcrumb->opt['tag_page_prefix'] = '';
			$xpro_breadcrumb->opt['singleblogpost_category_display'] = apply_filters( 'xpro_display_blog_category_breadcrumb', false );

			return $xpro_breadcrumb->display();
		}
	}
}

/**
 * Xpro Moving the Comment Text Field to Bottom.
 */
function xpro_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'xpro_move_comment_field_to_bottom' );


/**
 * Custom comment call back
 */
if( ! function_exists( 'xpro_comment_callback' ) ) :

	function xpro_comment_callback( $comment, $args, $depth ) {

		if( 'div' === $args['style'] ) {
		    $tag       = 'div';
			$add_below = 'comment';
		} else {
		    $tag       = 'li';
			$add_below = 'div-comment';
		}

		?>

        <<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? 'post-comment' : 'parent post-comment' ) ?> id="comment-<?php comment_ID() ?>">

		<?php if( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-item">
		<?php endif; ?>

		<?php if( get_avatar( $comment, $args['avatar_size'] ) ){?>

            <div class="comment-avatar">
				<?php if( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>

		<?php } ?>

        <div class="comment-content">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            <a href="<?php echo get_comment_author_url( $comment ) ?>" class="author-name alt-font"><?php echo get_comment_author() ?></a>
            <p class="comment-time">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
					/* translators: 1: date, 2: time */
					printf( esc_html__('%1$s, %2$s', 'xpro'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'xpro' ));
				?>

            </p>

            <div class="comment-text">
				<?php if ( 'pingback' != $comment->comment_type || 'trackback' != $comment->comment_type ) {

					comment_text();

				}
				?>
            </div>

        </div>



		<?php if( $comment->comment_approved == '0' ) : ?>

            <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'xpro' ); ?></em>

            <br />

		<?php endif; ?>

		<?php if( 'div' != $args['style'] ) : ?>

            </div>

		<?php endif; ?>

		<?php

	}

endif;


/**
 * Custom Replay Link
 */
function xpro_comment_reply($content) {
	$content = str_replace('Reply', '<span></span>', $content);
	return $content;
}
add_filter('comment_reply_link', 'xpro_comment_reply');


/**
 * xpro option customizer
 */
if ( !function_exists( 'xpro_get_option' ) ) {
	function xpro_get_option( $option, $default = '' ) {
		if ( is_string( $option ) && ( strlen( $option ) > 0 || is_array( $option ) ) && ( $option != 'default' ) ) {
			// Get options
			return get_theme_mod( $option, $default );
		}
	}
}

/**
 * xpro Meta
 */
if ( !function_exists( 'xpro_get_meta' ) ) {
	function xpro_get_meta( $meta_id ) {
	    return get_post_meta( get_the_ID(), $meta_id, true );
	}
}

/**
 * Check whether we should display the default loop or not.
 *
 * @since 3.0.0
 */
function xpro_wrapper_get_tittle() {

	$blog = xpro_get_option('xpro_banner_blog_title',__('Blog List','xpro'));
	$post_single_custom = xpro_get_option('xpro_banner_single_custom_enable','1');
	$single = xpro_get_option('xpro_banner_single_title',__('Blog Detail','xpro'));
	$search = xpro_get_option('xpro_banner_search_title',__('Search Results For ','xpro'));
	$not_found = xpro_get_option('xpro_banner_not_found_title',__('Page Not Found','xpro'));

	if(is_page()){
		$title = get_the_title();
	}elseif (is_home()){
		$title = esc_html($blog);
	}elseif (is_singular( 'post' )){
	    $title = ($post_single_custom == '1') ? esc_html($single) : get_the_title();
	} elseif ( is_tag() ) {
		$title = sprintf( '%s', single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( '%s', get_the_author() );
	} elseif ( is_category() ) {
		$title = sprintf( '%s', single_tag_title( '', false ) );
	} elseif ( is_year() ) {
		$title = sprintf( '%s', get_the_date( _x( 'Y', 'yearly archives date format', 'xpro' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( '%s', get_the_date( _x( 'F Y', 'monthly archives date format', 'xpro' ) ) );
	} elseif ( is_day() ) {
		// phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
		$title = sprintf( '%s', get_the_date( _x( '', 'daily archives date format', 'xpro' ) ) );
	} elseif ( is_search() ) {
		$title = esc_html( $search).'"'. get_search_query().'"';
	} elseif ( is_404() ) {
		$title = esc_html( $not_found);
	}elseif( class_exists( 'WooCommerce' ) && is_shop() ) {
		$title = woocommerce_page_title( false );
	}else{
		$title = get_the_title();
	}
	return print_r($title);
}

/**
 * Check the WordPress version.
 *
 * @since  2.5.4
 * @param string $version   WordPress version to compare with the current version.
 * @param string $compare   Comparison value i.e > or < etc.
 * @return bool            True/False based on the  $version and $compare value.
 */
function xpro_wp_version_compare( $version, $compare ) {

	return version_compare( get_bloginfo( 'version' ), $version, $compare );
}

if ( ! function_exists( 'xpro_enable_page_builder_compatibility' ) ) :

	/**
	 * Allow filter to enable/disable page builder compatibility.
	 *
	 * @see  https://wpxpro.com/docs/recommended-settings-beaver-builder-xpro/
	 * @see  https://wpxpro.com/docs/recommended-settings-for-elementor/
	 *
	 * @since  1.2.2
	 * @return  bool True - If the page builder compatibility is enabled. False - IF the page builder compatibility is disabled.
	 */
	function xpro_enable_page_builder_compatibility() {
		return apply_filters( 'xpro_enable_page_builder_compatibility', true );
	}

endif;


/**
 * Callback method for the nav menu fallback when no menu
 * has been selected.
 *
 * @since 1.0
 * @param array $args An array of args for the menu.
 * @return void
 */
function xpro_nav_menu_fallback( $args ) {
	$url  = current_user_can( 'edit_theme_options' ) ? admin_url( 'nav-menus.php' ) : esc_url( home_url( '/' ) );
	$url  = apply_filters( 'xpro_nav_menu_fallback_url', $url );
	$text = current_user_can( 'edit_theme_options' ) ? __( 'Choose Menu', 'xpro' ) : __( 'Home', 'xpro' );

	echo '<div id="xpro-navbar-menu" class="xpro-navbar-collapse">';
	echo '<ul id="xpro-nav-menu" class="xpro-navbar-nav">';
	echo '<li>';
	echo '<a class="no-menu" href="' . esc_url($url) . '">' . esc_html($text) . '</a>';
	echo '</li>';
	echo '</ul>';
	echo '</div>';
}
