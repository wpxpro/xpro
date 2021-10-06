<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * xpro_primary_content_bottom hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_primary_content_bottom - 10
 */
do_action( 'xpro_primary_content_bottom' );

/**
 * xpro_content_after hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_content_after - 10
 */
do_action( 'xpro_content_after' );

/**
 * xpro_footer_before hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_footer_before - 10
 */
do_action( 'xpro_footer_before' );

/**
 * xpro_footer hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_footer - 10
 */
do_action( 'xpro_footer' );

/**
 * xpro_footer_after hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_footer_after - 10
 */
do_action( 'xpro_footer_after' );

/**
 * xpro_scroll_top hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_scroll_top - 10
 */
do_action( 'xpro_scroll_top' );

?>

</div>


<?php

/**
 * xpro_body_top hook.
 *
 * @since 1.0.0
 */
do_action( 'xpro_body_bottom' );

/**
 * wp Footer.
 *
 * @since 1.0.0
 */
wp_footer();

?>

</body>

</html>

