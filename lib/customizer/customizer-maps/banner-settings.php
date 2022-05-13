<?php

/*=================================================
    Title Wrapper
=================================================*/

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_banner_type',
	'label' => __('Title Banner', 'xpro-bb-addons'),
	'description' => __('Specifies the title banner layout.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'default' => 'xpro-wrapper-layout-1',
	'choices' => array(
		'xpro-wrapper-layout-1' => XPRO_THEME_IMAGES_URI . 'customizer/page-title-style-1.png',
		'xpro-wrapper-layout-2' => XPRO_THEME_IMAGES_URI . 'customizer/page-title-style-2.png',
		'none' => XPRO_THEME_IMAGES_URI . 'customizer/page-title-style-none.png',
	),
);


$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_banner_container',
	'label' => __('Container', 'xpro-bb-addons'),
	'description' => __('Choose between Bootstrap container container-fluid.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'default' => 'xpro-container',
	'transport' => 'auto',
	'choices' => array(
		'xpro-container' => __('Fixed', 'xpro-bb-addons'),
		'xpro-container-fluid' => __('Full Width', 'xpro-bb-addons'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_banner_container_width',
	'label' => __('Container Width', 'xpro-bb-addons'),
	'description' => __('Specifies the width of the banner container.', 'xpro-bb-addons'),
	'section'     => 'xpro_layout_banner_section',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_banner_container',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_banner_height',
	'label' => __('Banner Height', 'xpro-bb-addons'),
	'description' => __('To change title banner height.', 'xpro-bb-addons'),
	'section'     => 'xpro_layout_banner_section',
	'default'     => 90,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 50,
		'max'  => 1000,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper > .xpro-title-wrapper-inner',
			'property' => 'height',
			'units' => 'px',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_banner_type',
			'operator' => '!=',
			'value' => 'none',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'background',
	'settings'    => 'xpro_banner_background',
	'label'       => __( 'Background Type', 'xpro-bb-addons' ),
	'description' => __( 'Title Banner background controls.', 'xpro-bb-addons' ),
	'section'     => 'xpro_layout_banner_section',
	'transport'   => 'auto',
	'default'     => array(
		'background-color'      => '#f7f7f7',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_banner_type',
			'operator' => '!=',
			'value' => 'none',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_banner_overlay',
	'label' => __('Overlay Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of banner overlay.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'transport' => 'auto',
	'default' => '',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper:before',
			'property' => 'background-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_banner_alignment',
	'label' => __('Alignment', 'xpro-bb-addons'),
	'description' => __('Select image alignment of banner wrapper.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'default' => 'center',
	'transport' => 'auto',
	'choices' => array(
		'flex-start' => __('Left', 'xpro-bb-addons'),
		'center' => __('Center', 'xpro-bb-addons'),
		'flex-end' => __('Right', 'xpro-bb-addons'),
	),
	'output' => array(
		array(
			'element' => '.xpro-wrapper-layout-2 > .xpro-title-wrapper-inner',
			'property' => 'align-items',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_banner_type',
			'operator' => '==',
			'value' => 'xpro-wrapper-layout-2',
		),
	),
);


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_banner_bottom_space',
	'label' => __('Space Bottom', 'xpro-bb-addons'),
	'description' => __('To change banner bottom space.', 'xpro-bb-addons'),
	'section'     => 'xpro_layout_banner_section',
	'default'     => 0,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper',
			'property' => 'margin-bottom',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'settings' => 'xpro_banner_blog_title',
	'label' => __('Blog Title', 'xpro-bb-addons'),
	'description' => __('Specifies the title text of blog page.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'default' => __('Blog List', 'xpro-bb-addons'),
	'transport' => 'auto',
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Custom Single Title', 'xpro-bb-addons'),
	'description' => __('Disable this option to use blog post name as title.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'settings' => 'xpro_banner_single_custom_enable',
	'transport' => 'auto',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro-bb-addons'),
		'0' => __('Off', 'xpro-bb-addons'),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'settings' => 'xpro_banner_single_title',
	'label' => __('Post Single Title', 'xpro-bb-addons'),
	'description' => __('Specifies the title text of post single.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'default' => __('Blog Detail', 'xpro-bb-addons'),
	'transport' => 'auto',
	'required' => array(
		array(
			'setting' => 'xpro_banner_single_title_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'settings' => 'xpro_banner_search_title',
	'label' => __('Search Title', 'xpro-bb-addons'),
	'description' => __('Specifies the title text of page not found.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'default' => __('Search Results For', 'xpro-bb-addons'),
	'transport' => 'auto',
);

$xpro_fields[] = array(
	'type' => 'text',
	'settings' => 'xpro_banner_not_found_title',
	'label' => __('Not Found Title', 'xpro-bb-addons'),
	'description' => __('Specifies the title text of page not found.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'default' => __('Page Not Found', 'xpro-bb-addons'),
	'transport' => 'auto',
);

$xpro_fields[] = array(
	'type' => 'typography',
	'settings' => 'xpro_banner_title_typography',
	'label'    => __('Title Font', 'xpro-bb-addons' ),
	'description' => __('Additional fonts for banner title.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'transport' => 'auto',
	'default'  => array(
		'font-family'    => '',
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => '.xpro-title-wrapper .xpro-title-wrapper-text',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_font_weight_banner_title',
	'label' => __('Font Weight', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'transport' => 'auto',
	'default' => 'normal',
	'choices' => array(
		'normal' => __('Normal', 'xpro-bb-addons'),
		'100' => __('100', 'xpro-bb-addons'),
		'200' => __('200', 'xpro-bb-addons'),
		'300' => __('300', 'xpro-bb-addons'),
		'400' => __('400', 'xpro-bb-addons'),
		'500' => __('500', 'xpro-bb-addons'),
		'600' => __('600', 'xpro-bb-addons'),
		'700' => __('700', 'xpro-bb-addons'),
		'800' => __('800', 'xpro-bb-addons'),
		'900' => __('900', 'xpro-bb-addons'),
	),
	'output' => array(
		array(
			'element' => '.xpro-title-wrapper .xpro-title-wrapper-text',
			'property' => 'font-weight',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_banner_title_color',
	'label' => __('Title Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of banner title.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'transport' => 'auto',
	'default' => '',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper .xpro-title-wrapper-text',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Breadcrumb Enable', 'xpro-bb-addons'),
	'description' => __('Enable/Disable the post banner breadcrumbs.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'settings' => 'xpro_banner_breadcurmb_enable',
	'transport' => 'auto',
	'default' => '1',
	'choices' => array(
		'1' => __('On', 'xpro-bb-addons'),
		'0' => __('Off', 'xpro-bb-addons'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_banner_breadcrumb_font',
	'label' => __('Breadcrumb Font', 'xpro-bb-addons'),
	'description' => __('To change breadcrumb font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_layout_banner_section',
	'default'     => 14,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper ul li',
			'property' => 'font-size',
			'units' => 'px',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_banner_breadcurmb_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_banner_breadcrumb_color',
	'label' => __('Breadcrumb Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of banner breadcrumb.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'transport' => 'auto',
	'default' => '',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper ul li',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_banner_breadcrumb_link_color',
	'label' => __('Breadcrumb Link Hover', 'xpro-bb-addons'),
	'description' => __('Specifies the color of banner breadcrumb link on hover.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_banner_section',
	'transport' => 'auto',
	'default' => '',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-title-wrapper ul li > a:hover',
			'property' => 'color',
		),
	),
);
