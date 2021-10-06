<?php

/*=================================================
    Page Layout
=================================================*/

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_page_layout',
	'label' => __('Page Layout', 'xpro'),
	'description' => __('Specifies the page layout.', 'xpro'),
	'section' => 'xpro_layout_page_section',
	'default' => 'full-layout',
	'choices' => array(
		'left-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-left.png',
		'full-layout' => XPRO_THEME_IMAGES_URI . '/customizer/full.png',
		'right-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-right.png',
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_page_container_layout',
	'label' => __('Container', 'xpro'),
	'description' => __('Specifies the page container.', 'xpro'),
	'section' => 'xpro_layout_page_section',
	'default' => 'xpro-container',
	'choices' => array(
		'xpro-container' => __('Container', 'xpro'),
		'xpro-container-fluid' => __('Container Fluid', 'xpro'),
		'xpro-page-builder' => __('Full Width', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_page_container_width',
	'label' => __('Container Width', 'xpro'),
	'description' => __('Specifies the width of the page container.', 'xpro'),
	'section'     => 'xpro_layout_page_section',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_page_container_layout',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.page .xpro-content-wrapper > .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_page_spacing',
	'label' => __('Space Top/Bottom', 'xpro'),
	'description' => __('To change page content top bottom padding.', 'xpro'),
	'section'     => 'xpro_layout_page_section',
	'default'     => 80,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.page .xpro-content-wrapper',
			'property' => 'padding-top',
			'units' => 'px',
		),
		array(
			'element'  => '.page .xpro-content-wrapper',
			'property' => 'padding-bottom',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Comments', 'xpro'),
	'description' => __('( if page comment is off in WordPress then it cannot be switched on here. )', 'xpro'),
	'section' => 'xpro_layout_page_section',
	'settings' => 'xpro_layout_page_section',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);


/*=================================================
    Blog Layout
=================================================*/

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_blog_layout',
	'label' => __('Blog Layout', 'xpro'),
	'description' => __('Specifies the blog/default post layout.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'default' => 'right-layout',
	'choices' => array(
		'left-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-left.png',
		'full-layout' => XPRO_THEME_IMAGES_URI . '/customizer/full.png',
		'right-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-right.png',
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_blog_container_layout',
	'label' => __('Container', 'xpro'),
	'description' => __('Specifies the blog container.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'default' => 'xpro-container',
	'choices' => array(
		'xpro-container' => __('Container', 'xpro'),
		'xpro-container-fluid' => __('Container Fluid', 'xpro'),
		'xpro-page-builder' => __('Full Width', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_blog_container_width',
	'label' => __('Container Width', 'xpro'),
	'description' => __('Specifies the width of the blog container.', 'xpro'),
	'section'     => 'xpro_layout_blog_section',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_blog_container_layout',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.blog .xpro-content-wrapper > .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_blog_spacing',
	'label' => __('Space Top/Bottom', 'xpro'),
	'description' => __('To change blog content top bottom padding.', 'xpro'),
	'section'     => 'xpro_layout_blog_section',
	'default'     => 80,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.blog .xpro-content-wrapper',
			'property' => 'padding-top',
			'units' => 'px',
		),
		array(
			'element'  => '.blog .xpro-content-wrapper',
			'property' => 'padding-bottom',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_blog_post_layout',
	'label' => __('Post Layout', 'xpro'),
	'description' => __('Specifies the post item layout.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'default' => 'classic',
	'choices' => array(
		'classic' => XPRO_THEME_IMAGES_URI . '/customizer/post-classic.png',
		'grid' => XPRO_THEME_IMAGES_URI . '/customizer/post-modern.png',
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Thumbnail', 'xpro'),
	'description' => __('Enable/Disable post item thumbnail.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_thumb',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Title', 'xpro'),
	'description' => __('Enable/Disable post item title.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_title',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Date', 'xpro'),
	'description' => __('Enable/Disable post item date.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_date',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Category', 'xpro'),
	'description' => __('Enable/Disable post item category.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_category',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '==',
			'value' => 'classic',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Comments', 'xpro'),
	'description' => __('Enable/Disable post item comments.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_comments',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '==',
			'value' => 'classic',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Author', 'xpro'),
	'description' => __('Enable/Disable post item author.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_author',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Content', 'xpro'),
	'description' => __('Enable/Disable post item description.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_content',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Excerpt', 'xpro'),
	'description' => __('Enable/Disable post item excerpt.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_excerpt_enable',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_layout_blog_content',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_blog_excerpt',
	'label' => __('Excerpt Length', 'xpro'),
	'description' => __('To change post content excerpt lenght.', 'xpro'),
	'section'     => 'xpro_layout_blog_section',
	'default'     => 40,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 500,
		'step' => 10,
	],
	'required' => array(
		array(
			'setting' => 'xpro_layout_blog_content',
			'operator' => '==',
			'value' => '1',
		),
		array(
			'setting' => 'xpro_layout_blog_excerpt_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Button', 'xpro'),
	'description' => __('Enable/Disable post item button.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_button',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'label' => __('Link Text', 'xpro'),
	'description' => __('Custom text of post button.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'settings' => 'xpro_layout_blog_button_text',
	'transport' => 'auto',
	'default' => 'Read More',
	'required' => array(
		array(
			'setting' => 'xpro_layout_blog_button',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_blog_title_font',
	'label' => __('Title Font', 'xpro'),
	'description' => __('To change post title font size.', 'xpro'),
	'section'     => 'xpro_layout_blog_section',
	'default'     => 30,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 15,
		'max'  => 100,
//		'step' => 10,
	],
	'output' => array(
		array(
			'element'  => '.blog .xpro-post-title',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_layout_blog_title',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_blog_meta_font',
	'label' => __('Meta Font', 'xpro'),
	'description' => __('To change post meta font size.', 'xpro'),
	'section'     => 'xpro_layout_blog_section',
	'default'     => 15,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 50,
//		'step' => 10,
	],
	'output' => array(
		array(
			'element'  => '.blog .xpro-post-links > li',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_blog_meta_color',
	'label' => __('Meta Color', 'xpro'),
	'description' => __('Specifies the color of meta.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.blog .xpro-post-links > li',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_blog_meta_separator_color',
	'label' => __('Separator Color', 'xpro'),
	'description' => __('Specifies the color of separator color.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.blog .xpro-post',
			'property' => 'border-bottom-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '==',
			'value' => 'classic',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_blog_link_color',
	'label' => __('Link Color', 'xpro'),
	'description' => __('Specifies the color of button.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.blog .xpro-link',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '==',
			'value' => 'grid',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_blog_button_hcolor',
	'label' => __('Button Hover', 'xpro'),
	'description' => __('Specifies the color of button on hover.', 'xpro'),
	'section' => 'xpro_layout_blog_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.blog .xpro-link:hover',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '==',
			'value' => 'grid',
		),
	),
);


/*=================================================
    Blog Archive
=================================================*/

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_archive_layout',
	'label' => __('Archive Layout', 'xpro'),
	'description' => __('Specifies the archive post layout.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'default' => 'right-layout',
	'choices' => array(
		'left-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-left.png',
		'full-layout' => XPRO_THEME_IMAGES_URI . '/customizer/full.png',
		'right-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-right.png',
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_archive_container_layout',
	'label' => __('Container', 'xpro'),
	'description' => __('Specifies the archive post container.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'default' => 'xpro-container',
	'choices' => array(
		'xpro-container' => __('Container', 'xpro'),
		'xpro-container-fluid' => __('Container Fluid', 'xpro'),
		'xpro-page-builder' => __('Full Width', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_archive_container_width',
	'label' => __('Container Width', 'xpro'),
	'description' => __('Specifies the width of the archive post container.', 'xpro'),
	'section'     => 'xpro_layout_archive_section',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_archive_container_layout',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.archive .xpro-content-wrapper > .xpro-container,.search .xpro-content-wrapper > .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_archive_spacing',
	'label' => __('Space Top/Bottom', 'xpro'),
	'description' => __('To change archive content top bottom padding.', 'xpro'),
	'section'     => 'xpro_layout_archive_section',
	'default'     => 80,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.archive .xpro-content-wrapper,.search .xpro-content-wrapper',
			'property' => 'padding-top',
			'units' => 'px',
		),
		array(
			'element'  => '.archive .xpro-content-wrapper,.search .xpro-content-wrapper',
			'property' => 'padding-bottom',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_archive_post_layout',
	'label' => __('Post Layout', 'xpro'),
	'description' => __('Specifies the post item layout.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'default' => 'classic',
	'choices' => array(
		'classic' => XPRO_THEME_IMAGES_URI . '/customizer/post-classic.png',
		'grid' => XPRO_THEME_IMAGES_URI . '/customizer/post-modern.png',
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Thumbnail', 'xpro'),
	'description' => __('Enable/Disable post item thumbnail.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_thumb',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Title', 'xpro'),
	'description' => __('Enable/Disable post item title.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_title',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);



$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Date', 'xpro'),
	'description' => __('Enable/Disable post item date.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_date',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Category', 'xpro'),
	'description' => __('Enable/Disable post item category.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_category',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_archive_post_layout',
			'operator' => '==',
			'value' => 'classic',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Comments', 'xpro'),
	'description' => __('Enable/Disable post item comments.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_comments',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_archive_post_layout',
			'operator' => '==',
			'value' => 'classic',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Author', 'xpro'),
	'description' => __('Enable/Disable post item author.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_author',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Content', 'xpro'),
	'description' => __('Enable/Disable post item description.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_content',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Excerpt', 'xpro'),
	'description' => __('Enable/Disable post item excerpt.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_excerpt_enable',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_layout_archive_content',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_archive_excerpt',
	'label' => __('Excerpt Length', 'xpro'),
	'description' => __('To change post content excerpt lenght.', 'xpro'),
	'section'     => 'xpro_layout_archive_section',
	'default'     => 40,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 500,
		'step' => 10,
	],
	'required' => array(
		array(
			'setting' => 'xpro_layout_archive_content',
			'operator' => '==',
			'value' => '1',
		),
		array(
			'setting' => 'xpro_layout_archive_excerpt_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Button', 'xpro'),
	'description' => __('Enable/Disable post item button.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_button',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'label' => __('Link Text', 'xpro'),
	'description' => __('Custom text of post button.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'settings' => 'xpro_layout_archive_button_text',
	'transport' => 'auto',
	'default' => 'Read More',
	'required' => array(
		array(
			'setting' => 'xpro_layout_archive_button',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_archive_title_font',
	'label' => __('Title Font', 'xpro'),
	'description' => __('To change post title font size.', 'xpro'),
	'section'     => 'xpro_layout_archive_section',
	'default'     => 30,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 15,
		'max'  => 100,
//		'step' => 10,
	],
	'output' => array(
		array(
			'element'  => '.archive .xpro-post-title,.search .xpro-post-title',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_layout_archive_title',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_archive_meta_font',
	'label' => __('Meta Font', 'xpro'),
	'description' => __('To change post meta font size.', 'xpro'),
	'section'     => 'xpro_layout_archive_section',
	'default'     => 15,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 50,
//		'step' => 10,
	],
	'output' => array(
		array(
			'element'  => '.archive .xpro-post-links > li,.search .xpro-post-links > li',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_archive_meta_color',
	'label' => __('Meta Color', 'xpro'),
	'description' => __('Specifies the color of meta.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.archive .xpro-post-links > li,.search .xpro-post-links > li',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_archive_separator_color',
	'label' => __('Separator Color', 'xpro'),
	'description' => __('Specifies the color of separator color.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.archive .xpro-post',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_archive_post_layout',
			'operator' => '==',
			'value' => 'classic',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_archive_button_color',
	'label' => __('Button Color', 'xpro'),
	'description' => __('Specifies the color of button link.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.archive .xpro-link',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_archive_post_layout',
			'operator' => '==',
			'value' => 'grid',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_archive_button_hcolor',
	'label' => __('Button Hover', 'xpro'),
	'description' => __('Specifies the color of button on hover.', 'xpro'),
	'section' => 'xpro_layout_archive_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.archive .xpro-link:hover',
			'property' => 'color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_archive_post_layout',
			'operator' => '==',
			'value' => 'grid',
		),
	),
);


/*=================================================
    Sticky Post
=================================================*/

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_sticky_padding',
	'label' => __('Sticky Post Padding', 'xpro'),
	'description' => __('To change post sticky post padding.', 'xpro'),
	'section'     => 'xpro_layout_sticky_section',
	'default'     => 50,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 100,
//		'step' => 10,
	],
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky',
			'property' => 'padding',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_bg_color',
	'label' => __('Background Color', 'xpro'),
	'description' => __('Specifies the color of sticky post background.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky',
			'property' => 'background-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_border_color',
	'label' => __('Border Color', 'xpro'),
	'description' => __('Specifies the color of sticky post border.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky',
			'property' => 'border-color',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_sticky_title_size',
	'label' => __('Title Font', 'xpro'),
	'description' => __('To change post sticky post title font-size.', 'xpro'),
	'section'     => 'xpro_layout_sticky_section',
	'default'     => 30,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 15,
		'max'  => 100,
	],
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-post-title',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_title_color',
	'label' => __('Title Color', 'xpro'),
	'description' => __('Specifies the color of sticky post title.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-post-title',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_sticky_meta_size',
	'label' => __('Meta Font', 'xpro'),
	'description' => __('To change post sticky post title font-size.', 'xpro'),
	'section'     => 'xpro_layout_sticky_section',
	'default'     => 15,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 100,
	],
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-post-links > li',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_meta_color',
	'label' => __('Meta Color', 'xpro'),
	'description' => __('Specifies the color of sticky post title.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-post-links > li',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_sticky_content',
	'label' => __('Content Font', 'xpro'),
	'description' => __('To change post sticky post content font-size.', 'xpro'),
	'section'     => 'xpro_layout_sticky_section',
	'default'     => 15,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 100,
	],
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-post-content',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_content_color',
	'label' => __('Content Color', 'xpro'),
	'description' => __('Specifies the color of sticky post content.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-post-content',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_button_color',
	'label' => __('Button Color', 'xpro'),
	'description' => __('Specifies the color of sticky post button.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-btn,.xpro-post.sticky .xpro-link',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_button_color_hover',
	'label' => __('Button Hover', 'xpro'),
	'description' => __('Specifies the color of sticky post button hover color.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-post.sticky .xpro-btn:hover,.xpro-post.sticky .xpro-link:hover',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_button_bg',
	'label' => __('Button Background', 'xpro'),
	'description' => __('Specifies the color of sticky post button background.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-layout-classic.sticky .xpro-btn',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '!=',
			'value' => 'grid',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_button_bg_hover',
	'label' => __('Button Background Hover', 'xpro'),
	'description' => __('Specifies the color of sticky post button hover background.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-layout-classic.sticky .xpro-btn:hover',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '!=',
			'value' => 'grid',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_button_border',
	'label' => __('Button Border', 'xpro'),
	'description' => __('Specifies the color of sticky post button background.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-layout-classic.sticky .xpro-btn',
			'property' => 'border-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '!=',
			'value' => 'grid',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_sticky_button_bg_hover',
	'label' => __('Button Border Hover', 'xpro'),
	'description' => __('Specifies the color of sticky post button hover border.', 'xpro'),
	'section' => 'xpro_layout_sticky_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-layout-classic.sticky .xpro-btn:hover',
			'property' => 'border-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_blog_post_layout',
			'operator' => '!=',
			'value' => 'grid',
		),
	),
);

/*=================================================
    Single Layout
=================================================*/

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_single_layout',
	'label' => __('Single Layout', 'xpro'),
	'description' => __('Specifies the single post layout.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'default' => 'right-layout',
	'choices' => array(
		'left-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-left.png',
		'full-layout' => XPRO_THEME_IMAGES_URI . '/customizer/full.png',
		'right-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-right.png',
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_single_container_layout',
	'label' => __('Container', 'xpro'),
	'description' => __('Specifies the post single container.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'default' => 'xpro-container',
	'choices' => array(
		'xpro-container' => __('Container', 'xpro'),
		'xpro-container-fluid' => __('Container Fluid', 'xpro'),
		'xpro-page-builder' => __('Full Width', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_single_container_width',
	'label' => __('Container Width', 'xpro'),
	'description' => __('Specifies the width of the post single container.', 'xpro'),
	'section'     => 'xpro_layout_single_section',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_single_container_layout',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.single .xpro-content-wrapper > .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_single_spacing',
	'label' => __('Space Top/Bottom', 'xpro'),
	'description' => __('To change single content top bottom padding.', 'xpro'),
	'section'     => 'xpro_layout_single_section',
	'default'     => 80,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.single .xpro-content-wrapper',
			'property' => 'padding-top',
			'units' => 'px',
		),
		array(
			'element'  => '.single .xpro-content-wrapper',
			'property' => 'padding-bottom',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Title', 'xpro'),
	'description' => __('Enable/Disable single post title.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'settings' => 'xpro_layout_single_title',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Thumbnail', 'xpro'),
	'description' => __('Enable/Disable post item thumbnail.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'settings' => 'xpro_layout_single_thumb',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);


$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Date', 'xpro'),
	'description' => __('Enable/Disable post item date.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'settings' => 'xpro_layout_single_date',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);


$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Post Category', 'xpro'),
	'description' => __('Enable/Disable post item category.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'settings' => 'xpro_layout_single_category',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);


$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Author', 'xpro'),
	'description' => __('Enable/Disable post item author.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'settings' => 'xpro_layout_single_author',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Tags', 'xpro'),
	'description' => __('Enable/Disable post item tags.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'settings' => 'xpro_layout_single_tags',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Comments', 'xpro'),
	'description' => __('Enable/Disable post item comments.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'settings' => 'xpro_layout_single_comments',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_single_title_font',
	'label' => __('Title Font', 'xpro'),
	'description' => __('To change single post title font size.', 'xpro'),
	'section'     => 'xpro_layout_single_section',
	'default'     => 30,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 15,
		'max'  => 100,
//		'step' => 10,
	],
	'output' => array(
		array(
			'element'  => '.single .xpro-post-title',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_layout_single_title',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_single_meta_font',
	'label' => __('Meta Font', 'xpro'),
	'description' => __('To change post meta font size.', 'xpro'),
	'section'     => 'xpro_layout_single_section',
	'default'     => 15,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 50,
//		'step' => 10,
	],
	'output' => array(
		array(
			'element'  => '.single .xpro-post-links > li',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_single_meta_color',
	'label' => __('Meta Color', 'xpro'),
	'description' => __('Specifies the color of meta.', 'xpro'),
	'section' => 'xpro_layout_single_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.single .xpro-post-links > li',
			'property' => 'color',
		),
	),
);


/*=================================================
    404 Page
=================================================*/

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_404_container_layout',
	'label' => __('Container', 'xpro'),
	'description' => __('Specifies the not found page container.', 'xpro'),
	'section' => 'xpro_layout_404_section',
	'default' => 'xpro-container',
	'choices' => array(
		'xpro-container' => __('Container', 'xpro'),
		'xpro-container-fluid' => __('Container Fluid', 'xpro'),
		'xpro-page-builder' => __('Full Width', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_404_container_width',
	'label' => __('Container Width', 'xpro'),
	'description' => __('Specifies the width of the not found page container.', 'xpro'),
	'section'     => 'xpro_layout_404_section',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_404_container_layout',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.error404 .xpro-content-wrapper > .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_404_spacing',
	'label' => __('Space Top/Bottom', 'xpro'),
	'description' => __('To change not fount content top bottom padding.', 'xpro'),
	'section'     => 'xpro_layout_404_section',
	'default'     => 80,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.error404 .xpro-content-wrapper',
			'property' => 'padding-top',
			'units' => 'px',
		),
		array(
			'element'  => '.error404 .xpro-content-wrapper',
			'property' => 'padding-bottom',
			'units' => 'px',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'image',
	'settings' => 'xpro_layout_404_image',
	'label' => __('404 Image', 'xpro'),
	'description' => __('You can change page not found image here.', 'xpro'),
	'section' => 'xpro_layout_404_section',
	'default' => XPRO_THEME_IMAGES_URI . '404.png',
	'transport'   => 'auto',
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_404_image_width',
	'label' => __('Image Width', 'xpro'),
	'description' => __('To change not found image width.', 'xpro'),
	'section'     => 'xpro_layout_404_section',
	'default'     => 630,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 50,
		'max'  => 1200,
	],
	'output' => array(
		array(
			'element'  => '.not-found-image > img',
			'property' => 'width',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'label' => __('Title Text', 'xpro'),
	'description' => __('Title text of not found.', 'xpro'),
	'section' => 'xpro_layout_404_section',
	'settings' => 'xpro_layout_404_title_text',
	'transport' => 'auto',
	'default' => esc_html( 'Oops, that link is broken.'),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_404_title_size',
	'label' => __('Title Font', 'xpro'),
	'description' => esc_attr__('To change not found title font size.', 'xpro'),
	'section'     => 'xpro_layout_404_section',
	'default'     => 60,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 100,
	],
	'output' => array(
		array(
			'element'  => '.not-found-title',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'textarea',
	'label' => __('Description Text', 'xpro'),
	'description' => __('Description text of not found.', 'xpro'),
	'section' => 'xpro_layout_404_section',
	'settings' => 'xpro_layout_404_desc_text',
	'transport' => 'auto',
	'default' => 'Page doesn’t exist or some other error occurred. Go to our [go_previous_page] or go back to [go_home_page]',
);


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_404_desc_size',
	'label' => __('Description Font', 'xpro'),
	'description' => __('To change not found description font size.', 'xpro'),
	'section'     => 'xpro_layout_404_section',
	'default'     => 25,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 50,
	],
	'output' => array(
		array(
			'element'  => '.not-found-desc',
			'property' => 'font-size',
			'units' => 'px',
			'media_query' => '@media (min-width: 992px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_layout_404_link_color',
	'label' => __('Links Color', 'xpro'),
	'description' => __('Specifies the color of back links.', 'xpro'),
	'section' => 'xpro_layout_404_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.not-found-desc > a',
			'property' => 'color',
		),
	),
);


/*=================================================
    Woocommerce Shop
=================================================*/

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_shop_layout',
	'label' => __('Shop Layout', 'xpro'),
	'description' => __('Specifies the shop archive layout.', 'xpro'),
	'section' => 'xpro_layout_shop_section',
	'default' => 'right-layout',
	'choices' => array(
		'left-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-left.png',
		'full-layout' => XPRO_THEME_IMAGES_URI . '/customizer/full.png',
		'right-layout' => XPRO_THEME_IMAGES_URI . '/customizer/sidebar-right.png',
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_shop_container_layout',
	'label' => __('Container', 'xpro'),
	'description' => __('Specifies the shop container.', 'xpro'),
	'section' => 'xpro_layout_shop_section',
	'default' => 'xpro-container',
	'choices' => array(
		'xpro-container' => __('Container', 'xpro'),
		'xpro-container-fluid' => __('Container Fluid', 'xpro'),
		'xpro-page-builder' => __('Full Width', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_shop_container_width',
	'label' => __('Container Width', 'xpro'),
	'description' => __('Specifies the width of the shop container.', 'xpro'),
	'section'     => 'xpro_layout_shop_section',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_shop_container_layout',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.woocommerce .xpro-content-wrapper > .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_layout_shop_spacing',
	'label' => __('Space Top/Bottom', 'xpro'),
	'description' => __('To change shop content top bottom padding.', 'xpro'),
	'section'     => 'xpro_layout_shop_section',
	'default'     => 80,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.woocommerce .xpro-content-wrapper',
			'property' => 'padding-top',
			'units' => 'px',
		),
		array(
			'element'  => '.woocommerce .xpro-content-wrapper',
			'property' => 'padding-bottom',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_shop_post_layout',
	'label' => __('Product Layout', 'xpro'),
	'description' => __('Specifies the product item layout.', 'xpro'),
	'section' => 'xpro_layout_shop_section',
	'default' => '3',
	'choices' => array(
		'2' => XPRO_THEME_IMAGES_URI . '/customizer/2-column.png',
		'3' => XPRO_THEME_IMAGES_URI . '/customizer/3-column.png',
		'4' => XPRO_THEME_IMAGES_URI . '/customizer/4-column.png',
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_shop_post_per_pages',
	'label' => __('Products Per Page', 'xpro'),
	'description' => __('Specifies the shop item per page.', 'xpro'),
	'section'     => 'xpro_layout_shop_section',
	'default'     => 12,
	'choices' => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_shop_post_title_font',
	'label' => __('Title Font', 'xpro'),
	'description' => __('To change page post title font size.', 'xpro'),
	'section'     => 'xpro_layout_shop_section',
	'default'     => 22,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.woocommerce ul.products li.product .woocommerce-loop-product__title',
			'property' => 'font-size',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_shop_post_meta_font',
	'label' => __('Meta Font', 'xpro'),
	'description' => __('To change page post meta font size.', 'xpro'),
	'section'     => 'xpro_layout_shop_section',
	'default'     => 15,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins',
			'property' => 'font-size',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'dimensions',
	'settings'    => 'xpro_shop_post_button_dimension',
	'label'       => __( 'Button Dimension', 'xpro' ),
	'description' => __( 'Specify the shop button dimensions. e.g. 10px', 'xpro' ),
	'section'     => 'xpro_layout_shop_section',
	'transport' => 'auto',
	'default'     => array(
		'padding-top'  => '',
		'padding-right'  => '',
		'padding-bottom' => '',
		'padding-left' => '',
		'border-radius' => '',
	),
	'choices'     => array(
		'labels' => array(
			'padding-top'  => __( 'Padding Top', 'xpro' ),
			'padding-right'  => __( 'Padding Right', 'xpro' ),
			'padding-bottom' => __( 'Padding Bottom', 'xpro' ),
			'border-radius' => __( 'Border Radius', 'xpro' ),
		),
	),
	'output' => array(
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_shop_post_button_font',
	'label' => __('Font Size', 'xpro'),
	'description' => __('Specify the shop button font size.', 'xpro'),
	'section'     => 'xpro_layout_shop_section',
	'default'     => 14,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block',
			'property' => 'font-size',
			'units' => 'px',
		),
	),
);
