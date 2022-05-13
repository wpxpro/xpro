<?php
$footer_type = xpro_get_option('xpro_footer_type','xpro-footer-layout-1');
$footer_type_meta = xpro_get_meta('xpro-footer-layout');
$output = xpro_get_option('xpro_footer_content','Copyright © [current_year] [site_title] - [theme_author]');

$output = str_replace( '[current_year]', date_i18n( 'Y' ), $output );
$output = str_replace( '[site_title]', '<span class="xpro-footer-site-title">' . get_bloginfo( 'name' ) . '</span>', $output );

$theme_author = apply_filters(
	'xpro_theme_author',
	array(
		'theme_name'       => __( 'Xpro WordPress Theme', 'xpro-bb-addons' ),
		'theme_author_url' => 'https://wpxpro.com/',
	)
);

$output = str_replace( '[theme_author]', '<a href="' . esc_url( $theme_author['theme_author_url'] ) . '">' . $theme_author['theme_name'] . '</a>', $output );


?>



<?php if($footer_type !== 'none' && $footer_type_meta !== 'disabled'){ ?>
<footer class="xpro-footer-wrapper <?php esc_attr($footer_type); ?>">
	<div class="xpro-copyright-bar">
		<div class="xpro-container">
			<p class="site-info"><?php echo wp_kses_data($output) ?></p>
		</div>
	</div>
</footer>
<?php } ?>
