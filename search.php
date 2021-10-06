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
$mainCol = ($layout == 'left-layout' || $layout == 'right-layout') ? 'xpro-col-lg-9' : ' xpro-col-lg-12';

?>

<div class="xpro-theme-grid <?php echo esc_attr($mainCol); ?>">
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
</div>

<?php

if($layout == 'left-layout' || $layout == 'right-layout' ){
	?>
    <div class="xpro-col-lg-3">
		<?php do_action('xpro_sidebar'); ?>
    </div>
<?php }

get_footer();
