<?php
/**
 * The main template file
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

    		// Start the Loop.
			while ( have_posts() ) {

				the_post();

				switch ($post_layout) {

					case 'grid':
						get_template_part( 'template-parts/archive/content', 'post-grid' );
						break;

					default:
						get_template_part( 'template-parts/archive/content', 'post-classic' );

				}

			}

			xpro_pagination();

		} else {
			get_template_part( 'template-parts/content', 'none' );
		}

		?>

    </main>

<?php

if($layout != 'full-layout' ): do_action('xpro_sidebar'); endif;

get_footer();
