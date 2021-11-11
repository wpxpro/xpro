<?php
/**
 * The main template file
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$layout_option = xpro_get_option( 'xpro_blog_layout', 'right-layout' );
$layout_meta   = xpro_get_meta( 'xpro-sidebar-layout' );
$layout        = ( ! empty( $layout_meta ) ) ? $layout_meta : $layout_option;
$mainCol       = ( $layout == 'left-layout' || $layout == 'right-layout' ) ? 'xpro-col-lg-9' : ' xpro-col-lg-12';
$post_layout   = xpro_get_option( 'xpro_blog_post_layout', 'classic' );

?>

    <div class="xpro-theme-grid <?php echo esc_attr( $mainCol ); ?>">
        <main class="xpro-main xpro-post-<?php echo esc_attr( $post_layout ); ?>">
			<?php do_action('xpro_content_loop'); ?>
        </main>
    </div>

<?php

if ( $layout == 'left-layout' || $layout == 'right-layout' ) {
	?>
    <div class="xpro-col-lg-3">
		<?php do_action( 'xpro_sidebar' ); ?>
    </div>
<?php }

get_footer();
