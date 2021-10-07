<?php
/**
 * The template for displaying all single posts
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$layout_option = xpro_get_option( 'xpro_single_layout','right-layout');
$layout_meta = xpro_get_meta( 'xpro-sidebar-layout');
$layout = (!empty($layout_meta)) ? $layout_meta : $layout_option;
$comments_enable = xpro_get_option('xpro_layout_single_comments','1');
$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );
$mainCol = ($layout == 'left-layout' || $layout == 'right-layout') ? 'xpro-col-lg-9' : ' xpro-col-lg-12';

if ( ! $is_elementor_theme_exist || ! elementor_theme_do_location( 'single' ) ):

?>

<div class="xpro-theme-grid <?php echo esc_attr($mainCol); ?>">
<main class="xpro-main">

<?php

if ( have_posts() ) {

	do_action( 'xpro_loop_start' );

	while ( have_posts() ) {

		the_post();

		if(get_post_type() == 'elementor_library'){

		    the_content();

		}else{

			get_template_part( 'template-parts/single/content', 'single' );

			do_action('xpro_post_nav');

		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( $comments_enable == '1' && ( comments_open() || get_comments_number() ) ) {
			comments_template();
		}

	}

	do_action('xpro_loop_end');

}else{
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

endif;

get_footer();
