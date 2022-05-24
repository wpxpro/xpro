<?php
/**
 * Partial template for content in page.php
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$featured_meta = xpro_get_meta( 'xpro-featured-image');

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php do_action('xpro_entry_top'); ?>

        <?php if( has_post_thumbnail() && $featured_meta !== 'disabled'){
            echo get_the_post_thumbnail( $post->ID, 'large' );
        } ?>

	<div class="xpro-entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before'      =>    '<div class="xpro-pagination"><span class="pagination-title">' . __( 'Pages:', 'xpro' ) . '</span>',
				'after'       =>    '</div>',
				'link_before' =>    '<span class="page-number">',
				'link_after'  =>    '</span>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<?php do_action('xpro_entry_bottom'); ?>

</article><!-- #post-## -->
