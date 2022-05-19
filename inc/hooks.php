<?php
/**
 * Custom hooks
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add site info hook to WP hook library.
 */

if ( ! function_exists( 'xpro_site_info' ) ) {

	function xpro_site_info() {
		do_action( 'xpro_site_info' );
	}
}

/**
 * Add site info content.
 */

add_action( 'xpro_site_info', 'xpro_add_site_info' );
if ( ! function_exists( 'xpro_add_site_info' ) ) {

	function xpro_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'xpro-bb-addons' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'xpro-bb-addons' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'xpro-bb-addons' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://wpxpro.com', 'xpro-bb-addons' ) ) . '">wpxpro.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'xpro-bb-addons' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'xpro_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

add_action( 'xpro_header_before', 'xpro_do_skip_to_content_link', 2 );
/**
 * Add skip to content link before the header.
 *
 * @since 2.0
 */
function xpro_do_skip_to_content_link() {
	printf(
		'<a class="screen-reader-text skip-link" href="#content" title="%1$s">%2$s</a>',
		esc_attr__( 'Skip to content', 'xpro-bb-addons' ),
		esc_html__( 'Skip to content', 'xpro-bb-addons' )
	);
}

/**
 * Build the header.
 *
 * @since 1.0.0
 */
add_action( 'xpro_header', 'xpro_construct_header' );
if ( ! function_exists( 'xpro_construct_header' ) ) {

	function xpro_construct_header() {
		get_template_part( 'template-parts/header');
	}
}

/**
 * Build the loader.
 *
 * @since 1.0.0
 */
add_action( 'xpro_loader', 'xpro_construct_loader' );
if ( ! function_exists( 'xpro_construct_loader' ) ) {

	function xpro_construct_loader() {
		get_template_part( 'template-parts/pre-loader');
	}
}

/**
 * Build the title wrapper.
 *
 * @since 1.0.0
 */
add_action( 'xpro_title_wrapper', 'xpro_construct_title_wrapper' );
if ( ! function_exists( 'xpro_construct_title_wrapper' ) ) {

	function xpro_construct_title_wrapper() {
		get_template_part( 'template-parts/title-banner');
	}
}

/**
 * Build the footer.
 *
 * @since 1.0.0
 */
add_action( 'xpro_footer', 'xpro_construct_footer' );
if ( ! function_exists( 'xpro_construct_footer' ) ) {

	function xpro_construct_footer() {
		get_template_part( 'template-parts/footer');
    }
}

add_action( 'xpro_not_found', 'xpro_construct_not_found' );
if ( ! function_exists( 'xpro_construct_not_found' ) ) {

	function xpro_construct_not_found() {
	    get_template_part( 'template-parts/not-found');
    }
}

/**
 * Build the footer.
 *
 * @since 1.0.0
 */
add_action( 'xpro_scroll_top', 'xpro_construct_scroll_top' );
if ( ! function_exists( 'xpro_construct_scroll_top' ) ) {

	function xpro_construct_scroll_top() {

	    $scrollTop = xpro_get_option('xpro_scrolltop_enable','1');

	    if($scrollTop == '1'): ?>
         <span class="xpro-scroll-top-btn"><i class="xi xi-chevron-up"></i></span>
    	<?php endif;
	}
}

/**
 * Build Sidebar.
 *
 * @since 1.0.0
 */
add_action( 'xpro_sidebar', 'xpro_construct_sidebar' );
if ( ! function_exists( 'xpro_construct_sidebar' ) ) {

	function xpro_construct_sidebar() {

	if ( is_active_sidebar( 'xpro-main-sidebar' ) ) { ?>

            <aside class="xpro-aside-widget">

                <?php

                do_action('xpro_sidebars_before');

                dynamic_sidebar( 'xpro-main-sidebar' );

                do_action('xpro_sidebars_after');

                ?>

            </aside>

			<?php }

	}

}

/**
 * Build Woo Sidebar.
 *
 * @since 1.0.0
 */
add_action( 'xpro_woo_sidebar', 'xpro_construct_woo_sidebar' );
if ( ! function_exists( 'xpro_construct_woo_sidebar' ) ) {

	function xpro_construct_woo_sidebar() {

		if ( is_active_sidebar( 'xpro-woocommerce-sidebar' ) ) { ?>

            <aside class="xpro-aside-widget">

				<?php

				do_action('xpro_sidebars_before');

				dynamic_sidebar( 'xpro-woocommerce-sidebar' );

				do_action('xpro_sidebars_after');

				?>

            </aside>

		<?php }

	}

}

/**
 * Build Sidebar.
 *
 * @since 1.0.0
 */
add_action( 'xpro_content_before', 'xpro_construct_content_before' );
if ( ! function_exists( 'xpro_construct_content_before' ) ) {

	function xpro_construct_content_before() {

    if(is_page()){
	    $container_option = xpro_get_option('xpro_page_container_layout','xpro-container');
    } elseif (is_home()){
	    $container_option = xpro_get_option('xpro_blog_container_layout','xpro-container');
    }elseif (is_singular( 'post' )){
	    $container_option = xpro_get_option('xpro_single_container_layout','xpro-container');
    }elseif ( is_404() ){
	    $container_option = xpro_get_option('xpro_not_found_container_layout','xpro-container');
    }elseif( class_exists( 'WooCommerce' ) && is_shop() ) {
	    $container_option = xpro_get_option('xpro_shop_container_layout','xpro-container');
    }elseif ( is_archive() ){
	    $container_option = xpro_get_option('xpro_archive_container_layout','xpro-container');
    }else{
	    $container_option = 'xpro-container';
    }
    $container_meta = xpro_get_meta( 'xpro-content-layout');
    $container = (!empty($container_meta)) ? $container_meta : $container_option;
    ?>
        <div id="content" class="xpro-content-wrapper">
        <div class="<?php echo esc_attr($container); ?>">
        <div class="xpro-row">

	<?php }

}

/**
 * Build Sidebar.
 *
 * @since 1.0.0
 */
add_action( 'xpro_content_after', 'xpro_construct_content_after' );
if ( ! function_exists( 'xpro_construct_content_after' ) ) {

	function xpro_construct_content_after() {
	    ?>
        </div>
        </div>
        </div>
	<?php }

}

/**
 * Build Post nav.
 *
 * @since 1.0.0
 */
add_action( 'xpro_post_nav', 'xpro_construct_post_nav' );

if ( ! function_exists( 'xpro_construct_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function xpro_construct_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
        <nav class="xpro-post-single-navigation">
            <h2 class="sr-only"><?php esc_html_e( 'Post navigation', 'xpro-bb-addons' ); ?></h2>
            <ul class="xpro-post-naviagtion-list">
				<?php
				if ( get_previous_post_link() ) {
					// phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
					previous_post_link( '<li class="xpro-nav-previous">%link</li>', _x( '<i class="xi xi-chevron-left"></i><div class="xpro-nav-contnet"><span>' . __('Previous Post','xpro-bb-addons') . '</span><h6>%title</h6></div>', 'Previous post link', 'xpro-bb-addons' ) );
				}
				if ( get_next_post_link() ) {
					// phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText
					next_post_link( '<li class="xpro-nav-next">%link</li>', _x( '<div class="xpro-nav-contnet"><span>' . __('Next Post','xpro-bb-addons') . '</span><h6>%title</h6></div><i class="xi xi-chevron-right"></i>', 'Next post link', 'xpro-bb-addons' ) );
				}
				?>
            </ul><!-- .nav-links -->
        </nav><!-- .navigation -->
		<?php
	}
}

/**
 * Build Pagination.
 *
 * @since 1.0.0
 */
add_action( 'xpro_pagination', 'xpro_construct_pagination' );

if ( ! function_exists( 'xpro_construct_pagination' ) ) {

	function xpro_construct_pagination() {
		xpro_pagination();
	}
}

/**
 * Build Content Loop.
 *
 * @since 1.0.0
 */

add_action( 'xpro_content_loop', 'xpro_construct_content_loop' );

if ( ! function_exists( 'xpro_construct_content_loop' ) ) {

	function xpro_construct_content_loop() {

		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();

				if(is_home()){
					$post_layout   = xpro_get_option( 'xpro_blog_post_layout', 'classic' );
					get_template_part( 'template-parts/index/content', 'post-' . $post_layout );

				}

				else if(is_archive() || is_author() || is_category() || is_search() || is_tag()){
					$post_layout   = xpro_get_option( 'xpro_blog_post_layout', 'classic' );
					get_template_part( 'template-parts/archive/content', 'post-' . $post_layout );
				}

				else if(is_page()){

				    get_template_part( 'template-parts/page/content', 'page' );

					$comments_enable = xpro_get_option( 'xpro_page_comments','1');

					if ( $comments_enable == '1' && ( comments_open() || get_comments_number() ) ) {
						comments_template();
					}
				}

				else if(is_single()){

					get_template_part( 'template-parts/single/content', 'single' );

					$comments_enable          = xpro_get_option( 'xpro_layout_single_comments', '1' );

					if ( $comments_enable == '1' && ( comments_open() || get_comments_number() ) ) {
						comments_template();
					}

				}

			}

			do_action('xpro_pagination');

		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
	}
}