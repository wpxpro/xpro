<?php

$preloader = xpro_get_option('xpro_preload_enable','0');
$preloader_style = xpro_get_option('xpro_preloader_style','1');
$preloader_image = xpro_get_option('xpro_preloader_image');

if($preloader == '1') { ?>

<div class="xpro-loader-wrapper">

    <?php if($preloader_style == '1'): ?>
		<div class="xpro-loader-layout-1"></div>
	<?php endif; ?>

	<?php if($preloader_style == 'image' && !empty($preloader_image['url'])): ?>
        <div class="xpro-loader-layout-image">
            <img src="<?php echo esc_url($preloader_image['url']); ?>" alt="<?php echo esc_attr(get_post_meta($preloader_image['id'], '_wp_attachment_image_alt', true)) ?>">
        </div>
	<?php endif; ?>

</div>
<?php } ?>