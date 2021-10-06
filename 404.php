<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

/**
 * not_found hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_construct_not_found - 10
 */

do_action( 'xpro_not_found' );

get_footer();


