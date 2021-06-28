<?php

$image = xpro_get_option('xpro_layout_404_image',XPRO_THEME_IMAGES_URI . '404.png');
$post_title = xpro_get_option('xpro_layout_404_title_text','Oops, that link is broken.');
$output = xpro_get_option('xpro_layout_404_desc_text','Page doesn’t exist or some other error occurred. Go to our [go_previous_page] or go back to [go_home_page]');

$output = str_replace( '[go_previous_page]', '<a href="javascript:history.go(-1)" class="go-back"> Previous page </a>', $output );
$output = str_replace( '[go_home_page]', '<a href="' . home_url() . '" class="go-back"> Home page </a>', $output );


?>

<div class="not-found-wrapper">
	<div class="not-found-inner-wrapper">
		<div class="not-found-content">
			<?php if(!empty($image)): ?>
				<div class="not-found-image">
					<img src="<?php echo esc_url($image) ?>" alt="404-image">
				</div>
			<?php endif; ?>
			<h2 class="not-found-title"><?php echo esc_html($post_title); ?></h2>
			<p class="not-found-desc"><?php echo wp_kses_data($output); ?></p>
		</div>
	</div>
</div>
