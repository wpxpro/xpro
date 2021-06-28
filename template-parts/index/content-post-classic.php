<?php

$post_title = xpro_get_option('xpro_layout_blog_title','1');
$thumb = xpro_get_option('xpro_layout_blog_thumb','1');
$date = xpro_get_option('xpro_layout_blog_date','1');
$category = xpro_get_option('xpro_layout_blog_category','1');
$comments_enable = xpro_get_option('xpro_layout_blog_comments','1');
$author = xpro_get_option('xpro_layout_blog_author','1');
$content = xpro_get_option('xpro_layout_blog_content','1');
$excerpt = xpro_get_option('xpro_layout_blog_excerpt_enable','1');
$excerpt_length = xpro_get_option('xpro_layout_blog_excerpt',40);
$social = xpro_get_option('xpro_layout_blog_social_icon','1');
$button = xpro_get_option('xpro_layout_blog_button','1');
$buttonText = xpro_get_option('xpro_layout_blog_button_text','Read More');

?>

<article <?php post_class('xpro-post xpro-layout-classic'); ?> id="xpro-post-<?php the_ID(); ?>">

	<?php do_action('xpro_entry_top'); ?>

    <?php if($post_title == '1'): ?>
	<h3 class="xpro-post-title">
        <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url(get_permalink()) ), '</a>' ); ?>
	</h3>
	<?php endif; ?>

	<ul class="xpro-post-links">

		<?php if($date == '1'): ?>
		<li class="xpro-post-date"><i class="xpro-icon-calendar"></i><?php the_time( 'F j, Y' ) ?></li>
		<?php endif; ?>

		<?php if( !empty(get_the_category_list()) && $category == '1' ): ?>
			<li class="xpro-post-date">
				<span class="cat-links"><i class="xpro-icon-layout"></i><?php echo get_the_category_list(esc_html__(', ', 'xpro')) ?></span>
			</li>
		<?php endif; ?>

		<?php if($comments_enable == '1'): ?>
		<li class="xpro-post-comment">
			<i class="xpro-icon-comment"></i>
			<a href="<?php comments_link(); ?>">
				<?php comments_number( esc_html__( 'Leave A  Comment', 'xpro' ), esc_html__( '1 Comment', 'xpro' ), esc_html__( '% Comments', 'xpro' ) ); ?>
			</a>
		</li>
		<?php endif; ?>

		<?php if($author == '1'): ?>
		<li class="xpro-post-author">
			<i class="xpro-icon-user"></i>
			<?php esc_html_e( 'By', 'xpro' ); ?>
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php echo esc_html(get_the_author()); ?></a>
		</li>
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
        <hr/>
		<?php if($social == '1'): ?>
        <ul class="xpro-share-icons">
        <?php get_template_part( 'template-parts/social', 'share' ); ?>
        </ul>
		<?php endif; ?>

		<?php if($button == '1'): ?>
        <a class="xpro-btn" href="<?php echo esc_url( get_permalink( get_the_ID() ) ) ?>"><?php echo esc_html($buttonText); ?></a>
		<?php endif; ?>

    </div>

	<?php do_action('xpro_entry_bottom'); ?>

</article>
