<?php
/**
 * The main template file
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$post_layout = xpro_get_option('xpro_blog_post_layout');
$layout_option = xpro_get_option( 'xpro_blog_layout','right-layout');
$layout_meta = xpro_get_meta( 'site-sidebar-layout');
$layout = (!empty($layout_meta)) ? $layout_meta : $layout_option;
$post_layout = xpro_get_option('xpro_blog_post_layout','classic');

?>

<main class="xpro-main xpro-post-<?php echo esc_attr($post_layout); ?>">

<?php

if ( have_posts() ) {

	// Start the Loop.
	while ( have_posts() ) {

		the_post();

		switch ($post_layout) {

			case 'grid':
				get_template_part( 'template-parts/index/content', 'post-grid' );
				break;

			default:
				get_template_part( 'template-parts/index/content', 'post-classic' );

		}

	}

	xpro_pagination();

} else {
	get_template_part( 'template-parts/content', 'none' );
}

?>

</main>

<?php

if($layout == 'left-layout' || $layout == 'right-layout' ){
	do_action('xpro_sidebar');
}

get_footer();
