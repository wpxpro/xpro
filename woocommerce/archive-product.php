<?php
/**
 * The shop archive template file
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$post_layout = xpro_get_option('xpro_archive_post_layout');
$layout = xpro_get_option( 'xpro_archive_layout','right-layout');
$post_layout = xpro_get_option('xpro_archive_post_layout','classic');

?>

	<main class="xpro-main xpro-post-<?php echo esc_attr($post_layout); ?>">

		<?php

		if ( have_posts() ) {

			/* Check shop page */
			wc_get_template_part( 'content', 'before-category' );

			woocommerce_product_xpro_loop_start();

			// Start the Loop.
			while ( have_posts() ) {

				the_post();

				wc_get_template_part( 'content', 'product' );

			}

			woocommerce_product_xpro_loop_end();

			/* Check shop page */
			wc_get_template_part( 'content', 'after-category' );


			xpro_pagination();

		} else {
			get_template_part( 'template-parts/content', 'none' );
		}

		?>

	</main>

<?php

if($layout != 'full-layout' ): do_action('xpro_woo_sidebar'); endif;

get_footer();
