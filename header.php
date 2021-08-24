<?php
/**
 * The header for xpro theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php xpro_body_attributes(); ?>>

<?php

/**
 * xpro_body_top hook.
 *
 * @since 1.0.0
 */
do_action( 'xpro_body_top' );

/**
 * wp_body_open hook.
 *
 * @since 1.0.0
 */
// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
do_action( 'wp_body_open' );

?>

<div id="primary" class="xpro-primary-wrapper">

<?php

/**
 * xpro_before_header hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_do_skip_to_content_link
 */
do_action( 'xpro_header_before' );

/**
 * xpro_header hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_construct_loader - 10
 */
do_action( 'xpro_loader' );

/**
 * xpro_header hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_construct_header - 10
 */
do_action( 'xpro_header' );

/**
 * xpro_header hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_construct_header - 10
 */
do_action( 'xpro_header_after' );

/**
 * xpro_title_wrapper hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_construct_title_wrapper - 10
 */
do_action( 'xpro_title_wrapper' );


/**
 * xpro_header hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_content_before - 10
 */
do_action( 'xpro_content_before' );

/**
 * xpro_primary_content_top hook.
 *
 * @since 1.0.0
 *
 * @hooked xpro_primary_content_top - 10
 */
do_action( 'xpro_primary_content_top' );

?>
