<?php
/**
 * Single post partial template
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_title = xpro_get_option('xpro_layout_single_title','1');
$thumb = xpro_get_option('xpro_layout_single_thumb','1');
$date = xpro_get_option('xpro_layout_single_date','1');
$category = xpro_get_option('xpro_layout_single_category','1');
$author = xpro_get_option('xpro_layout_single_author','1');
$tags = xpro_get_option('xpro_layout_single_tags','1');
$social = xpro_get_option('xpro_layout_single_social_icon','1');

?>

<article <?php post_class('xpro-post-single'); ?> id="xpro-post-<?php the_ID(); ?>">

	<?php do_action('xpro_entry_top'); ?>

	<?php if ( has_post_thumbnail() && $thumb == '1' ) {

		echo '<div class="xpro-post-thumbnail">';

		echo get_the_post_thumbnail( $post->ID, 'full' );

		echo '</div>';

	}?>

    <?php if($post_title == '1'): ?>
        <h3 class="xpro-post-title">
			<?php the_title(); ?>
        </h3>
	<?php endif; ?>


    <ul class="xpro-post-links">

		<?php if($date == '1'):  ?>
            <li class="xpro-post-date"><?php the_time( 'F j, Y' ) ?></li>
		<?php endif;  ?>

		<?php if( !empty(get_the_category_list()) && $category == '1' ): ?>
            <li class="xpro-post-date">
                <span class="cat-links"><?php echo get_the_category_list(esc_html__(', ', 'xpro')) ?></span>
            </li>
		<?php endif; ?>

		<?php if($author == '1'):  ?>
            <li class="xpro-post-author">
				<?php esc_html_e( 'By', 'xpro' ); ?>
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a>
            </li>
		<?php endif; ?>

    </ul>

    <div class="xpro-post-content">
        <p><?php the_content(); ?></p>
    </div>

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

	<?php if($tags == '1' || $social == '1'):  ?>
    <div class="xpro-post-footer-meta">

	    <?php if($tags == '1'):  ?>
        <ul class="xpro-post-tags">
            <?php the_tags( '<li class="xpro_post_meta_tag">', '', '</span>' ); ?>
        </ul>
	    <?php endif; ?>

    </div>
	<?php endif; ?>

	<?php do_action('xpro_entry_bottom'); ?>

</article>
