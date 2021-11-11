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
$layout_meta = xpro_get_meta( 'xpro-sidebar-layout');
$layout = (!empty($layout_meta)) ? $layout_meta : $layout_option;
$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );
$mainCol = ($layout == 'left-layout' || $layout == 'right-layout') ? 'xpro-col-lg-9' : ' xpro-col-lg-12';

if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ):
?>

<div class="xpro-theme-grid <?php echo esc_attr($mainCol); ?>">
<main class="xpro-main">
	<?php do_action('xpro_content_loop'); ?>
</main>
</div>

<?php
if($layout == 'left-layout' || $layout == 'right-layout' ){
    ?>
    <div class="xpro-col-lg-3">
        <?php do_action('xpro_sidebar'); ?>
    </div>
<?php }
endif;

get_footer();
