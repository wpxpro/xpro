<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$layout_option = xpro_get_option( 'xpro_page_layout','full-layout');
$layout_meta = xpro_get_meta( 'site-sidebar-layout');
$layout = (!empty($layout_meta)) ? $layout_meta : $layout_option;
$comments_enable = xpro_get_option( 'xpro_page_comments','1');
$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ):
?>

<main class="xpro-main">

<?php
if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		get_template_part( 'template-parts/page/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( $comments_enable == '1' && ( comments_open() || get_comments_number() ) ) {
			comments_template();
		}

	}

	xpro_pagination();

}else{
	get_template_part( 'template-parts/content', 'none' );
}
?>

</main>

<?php

if($layout == 'left-layout' || $layout == 'right-layout' ){
    do_action('xpro_sidebar');
}

endif;

get_footer();
