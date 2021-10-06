<?php

$thumb = xpro_get_option('xpro_layout_archive_thumb','1');
$post_title = xpro_get_option('xpro_layout_archive_title','1');
$date = xpro_get_option('xpro_layout_archive_date','1');
$category = xpro_get_option('xpro_layout_archive_category','1');
$comments_enable = xpro_get_option('xpro_layout_archive_comments','1');
$author = xpro_get_option('xpro_layout_archive_author','1');
$content = xpro_get_option('xpro_layout_archive_content','1');
$excerpt = xpro_get_option('xpro_layout_archive_excerpt_enable','1');
$excerpt_length = xpro_get_option('xpro_layout_archive_excerpt',40);
$social = xpro_get_option('xpro_layout_archive_social_icon','1');
$button = xpro_get_option('xpro_layout_archive_button','1');
$buttonText = xpro_get_option('xpro_layout_archive_button_text','Read More');

?>

<article <?php post_class('xpro-post xpro-layout-grid'); ?> id="xpro-post-<?php the_ID(); ?>">

	<?php do_action('xpro_entry_top'); ?>

	<?php if($post_title == '1'): ?>
        <h3 class="xpro-post-title">
            <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url(get_permalink()) ), '</a>' ); ?>
        </h3>
	<?php endif; ?>

    <ul class="xpro-post-links">

        <?php if($author == '1'): ?>
            <li class="xpro-post-author">
			    <?php esc_html_e( 'By', 'xpro' ); ?>
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a>
            </li>
	    <?php endif; ?>

		<?php if($date == '1'): ?>
            <li class="xpro-post-date"><?php the_time( 'F j, Y' ) ?></li>
		<?php endif; ?>


    </ul>

	<?php if ( has_post_thumbnail() && $thumb == '1' ) {

		echo '<div class="xpro-post-thumbnail">';

		echo get_the_post_thumbnail( $post->ID, 'full' );

		echo '</div>';

	} ?>

	<?php if($content == '1'): ?>
        <div class="xpro-post-content">
            <p>
				<?php
				if($excerpt == '1'){
					xpro_excerpt( $excerpt_length );
				}else{
					the_content();
				}
				?>
            </p>
        </div>
	<?php endif; ?>

    <div class="xpro-post-footer">
		<?php if($button == '1'): ?>
            <a class="xpro-link" href="<?php echo esc_url( get_permalink( get_the_ID() ) ) ?>"><?php echo esc_html($buttonText); ?></a>
		<?php endif; ?>

    </div>

	<?php do_action('xpro_entry_bottom'); ?>

</article>
