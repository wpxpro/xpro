<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$banner_type = xpro_get_option('xpro_banner_type','xpro-wrapper-layout-1');
$banner_type_meta = xpro_get_meta('site-post-banner');
$container = xpro_get_option('xpro_banner_container','xpro-container');
$breadcrumb = xpro_get_option('xpro_banner_breadcurmb_enable','1');

if($banner_type !== 'none' && $banner_type_meta !== 'disabled') : ?>

<div class="xpro-title-wrapper xpro-top-area-space <?php echo esc_attr($banner_type); ?>">
    <div class="<?php echo esc_attr($container); ?> xpro-title-wrapper-inner">
        <h2 class="xpro-title-wrapper-text"><?php xpro_wrapper_get_tittle(); ?></h2>
        <?php if($breadcrumb == '1'): ?>
            <ul class="xpro-breadcrumb-list alt-font">
                <?php echo xpro_breadcrumb_display(); ?>
            </ul>
	    <?php endif; ?>
    </div>
</div>

<?php endif; ?>
