<?php

/*=================================================
    General Typography
=================================================*/

$xpro_fields[] = array(
	'type' => 'typography',
	'settings' => 'xpro_body_font_typo',
	'label' => __('Main Font', 'xpro-bb-addons'),
	'description' => __('Theme main fonts for body content with your desired fonts.', 'xpro-bb-addons'),
	'section' => 'xpro_general_typography_section',
	'transport'   => 'auto',
	'default' => array(
		'font-family' => '',
		'font-size' => '',
		'variant' => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => 'initial',
	),
	'output' => array(
		array(
			'element' => 'body, .main-font',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_font_weight_body',
	'label' => __('Font Weight', 'xpro-bb-addons'),
	'section' => 'xpro_general_typography_section',
	'transport' => 'auto',
	'default' => '',
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
			'element' => 'body, .main-font',
			'property' => 'font-weight',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'typography',
	'settings' => 'xpro_alt_font_typo',
	'label' => __('Heading Font', 'xpro-bb-addons'),
	'description' => __('Theme additional fonts for all headings with your desired fonts.', 'xpro-bb-addons'),
	'section' => 'xpro_general_typography_section',
	'transport'   => 'auto',
	'default' => array(
		'font-family' => '',
		'variant' => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => 'initial',
	),
	'output' => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6, .alt-font, .xpro-navbar-primary',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_font_weight_alt',
	'label' => __('Font Weight', 'xpro-bb-addons'),
	'section' => 'xpro_general_typography_section',
	'transport' => 'auto',
	'default' => '',
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
			'element' => 'h1, h2, h3, h4, h5, h6, .alt-font, .xpro-navbar-primary',
			'property' => 'font-weight',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_heading_one',
	'label' => __('Heading 1 (H1)', 'xpro-bb-addons'),
	'description' => __('Theme heading (H1) font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_general_typography_section',
	'transport'   => 'auto',
	'default'     => 35,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => 'h1',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_heading_two',
	'label' => __('Heading 2 (H2)', 'xpro-bb-addons'),
	'description' => __('Theme heading (H2) font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_general_typography_section',
	'transport'   => 'auto',
	'default'     => 30,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => 'h2',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_heading_three',
	'label' => __('Heading 3 (H3)', 'xpro-bb-addons'),
	'description' => __('Theme heading (H3) font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_general_typography_section',
	'transport'   => 'auto',
	'default'     => 25,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => 'h3',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_heading_four',
	'label' => __('Heading 4 (H4)', 'xpro-bb-addons'),
	'description' => __('Theme heading (H4) font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_general_typography_section',
	'default'     => 20,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => 'h4',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_heading_five',
	'label' => __('Heading 5 (H5)', 'xpro-bb-addons'),
	'description' => __('Theme heading (H5) font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_general_typography_section',
	'transport'   => 'auto',
	'default'     => 20,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => 'h5',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_heading_six',
	'label' => __('Heading 6 (H6)', 'xpro-bb-addons'),
	'description' => __('Theme heading (H6) font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_general_typography_section',
	'transport'   => 'auto',
	'default'     => 18,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => 'h6',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
);


/*=================================================
    General Color
=================================================*/

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_content_color',
	'label' => __('Content Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of body content.', 'xpro-bb-addons'),
	'section' => 'xpro_general_color_section',
	'default' => '#383838',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body',
			'property' => 'color',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_heading_color',
	'label' => __('Heading Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of heading(s) content.', 'xpro-bb-addons'),
	'section' => 'xpro_general_color_section',
	'transport' => 'auto',
	'default' => '#2b2b2b',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6, .alt-font',
			'property' => 'color',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_link_color',
	'label' => __('Link Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of link content.', 'xpro-bb-addons'),
	'section' => 'xpro_general_color_section',
	'transport' => 'auto',
	'default' => '#929292',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => 'a, a:active,a:focus ',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_link_hover_color',
	'label' => __('Link Hover', 'xpro-bb-addons'),
	'description' => __('Specifies the color of link content on hover.', 'xpro-bb-addons'),
	'section' => 'xpro_general_color_section',
	'transport' => 'auto',
	'default' => '#8d377f',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => ':root',
			'property' => '--xpro-main-hover-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_base_color',
	'label' => __('Theme Base Color', 'xpro-bb-addons'),
	'description' => __('Specifies the complete theme base color.', 'xpro-bb-addons'),
	'section' => 'xpro_general_color_section',
	'transport' => 'auto',
	'default' => '#8d377f',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => ':root',
			'property' => '--xpro-main-color',
		),
	),
);

/*=================================================
    Site Pre Loader
=================================================*/

$xpro_fields[] = array(
	'type' => 'switch',
	'settings' => 'xpro_preload_enable',
	'label' => __('Pre Loader', 'xpro-bb-addons'),
	'description' => __('Enable this option to show loader before site load.', 'xpro-bb-addons'),
	'section' => 'xpro_general_preloader_section',
	'default' => '0',
	'transport' => 'auto',
	'choices' => array(
		'0' => __('On', 'xpro-bb-addons'),
		'1' => __('Off', 'xpro-bb-addons'),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_preloader_style',
	'label' => __('Pre Loader Style', 'xpro-bb-addons'),
	'description' => __('Specifies site preloader style.', 'xpro-bb-addons'),
	'section' => 'xpro_general_preloader_section',
	'default' => '1',
	'choices' => array(
		'1' => __('Loader Style 1', 'xpro-bb-addons'),
		'image' => __('Loader Image', 'xpro-bb-addons'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_preload_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
);


$xpro_fields[] = array(
	'type' => 'image',
	'settings' => 'xpro_preloader_image',
	'label' => __('Loader Image', 'xpro-bb-addons'),
	'description' => __('Select an animated gif to display while site is loading.', 'xpro-bb-addons'),
	'section' => 'xpro_general_preloader_section',
	'choices'     => [
		'save_as' => 'array',
	],
	'required' => array(
		array(
			'setting' => 'xpro_preloader_style',
			'operator' => '==',
			'value' => 'image',
		),
		array(
			'setting' => 'xpro_preload_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
);


$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_preloader_color',
	'label' => __('Pre Loader Color', 'xpro-bb-addons'),
	'description' => __('To change site preloader color.', 'xpro-bb-addons'),
	'section' => 'xpro_general_preloader_section',
	'transport' => 'auto',
	'default' => '',
	'choices' => array(
		'alpha' => true,
	),
	'required' => array(
		array(
			'setting' => 'xpro_preloader_style',
			'operator' => '!==',
			'value' => 'image',
		),
		array(
			'setting' => 'xpro_preload_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'output' => array(
		array(
			'element'  => '.xpro-loader-layout-1',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'settings' => 'xpro_preloader_width',
	'label' => __('Loader Image Width', 'xpro-bb-addons'),
	'description' => __('Custom loader image width e.g. 200px.', 'xpro-bb-addons'),
	'section' => 'xpro_general_preloader_section',
	'transport' => 'auto',
	'default' => '',
	'required' => array(
		array(
			'setting' => 'xpro_preloader_style',
			'operator' => '==',
			'value' => 'image',
		),
		array(
			'setting' => 'xpro_preload_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'output' => array(
		array(
			'element'  => '.xpro-loader-layout-image',
			'property' => 'width',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_preloader_bgcolor',
	'label' => __('Pre Loader Background', 'xpro-bb-addons'),
	'description' => __('To change site preloader background color.', 'xpro-bb-addons'),
	'section' => 'xpro_general_preloader_section',
	'transport' => 'auto',
	'default' => '',
	'choices' => [
		'alpha' => true,
	],
	'required' => array(
		array(
			'setting' => 'xpro_preload_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'output' => array(
		array(
			'element'  => '.xpro-loader-wrapper',
			'property' => 'background-color',
		),
	),
);


/*=================================================
    Scroll To Top
=================================================*/

$xpro_fields[] = array(
	'type' => 'switch',
	'settings' => 'xpro_scrolltop_enable',
	'label' => __('Scroll Top', 'xpro-bb-addons'),
	'description' => __('Enable this option to add scroll to top button on site.', 'xpro-bb-addons'),
	'section' => 'xpro_general_scroll_top_section',
	'default' => '1',
	'transport' => 'auto',
	'choices' => array(
		'1' => __('On', 'xpro-bb-addons'),
		'0' => __('Off', 'xpro-bb-addons'),
	),
);

$xpro_fields[] = array(
	'type'        => 'dimensions',
	'settings'    => 'xpro_scrolltop_dimensions',
	'label'       => __( 'Scroll Top Dimension', 'xpro-bb-addons' ),
	'description' => __( 'To change site scroll top button dimensions e.g. 50px', 'xpro-bb-addons' ),
	'section'     => 'xpro_general_scroll_top_section',
	'transport' => 'auto',
	'default'     => [
		'height'    => '',
		'width' => '',
		'font-size'   => '',
		'border-radius'   => '',
	],
	'required' => array(
		array(
			'setting' => 'xpro_scrolltop_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'choices'     => [
		'labels' => [
			'height'  => __( 'Height', 'xpro-bb-addons' ),
			'width'  => __( 'Width', 'xpro-bb-addons' ),
			'font-size' => __( 'Icon Size', 'xpro-bb-addons' ),
			'border-radius' => __( 'Border Radius', 'xpro-bb-addons' ),
		],
	],
	'output' => array(
		array(
			'choice'      => 'height',
			'element'     => '.xpro-scroll-top-btn > i',
			'property'    => 'height',
		),
		array(
			'choice'      => 'width',
			'element'     => '.xpro-scroll-top-btn > i',
			'property'    => 'width',
		),
		array(
			'choice'      => 'font-size',
			'element'     => '.xpro-scroll-top-btn > i',
			'property'    => 'font-size',
		),
		array(
			'choice'      => 'border-radius',
			'element'     => '.xpro-scroll-top-btn > i',
			'property'    => 'border-radius',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_page_scrolltop_color',
	'label' => __('Button Color', 'xpro-bb-addons'),
	'description' => __('To change site scroll top button color.', 'xpro-bb-addons'),
	'section' => 'xpro_general_scroll_top_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'required' => array(
		array(
			'setting' => 'xpro_scrolltop_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'output' => array(
		array(
			'element'     => '.xpro-scroll-top-btn > i',
			'property'    => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_page_scrolltop_hcolor',
	'label' => __('Button Hover Color', 'xpro-bb-addons'),
	'description' => __('To change site scroll top button color on hover.', 'xpro-bb-addons'),
	'section' => 'xpro_general_scroll_top_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'required' => array(
		array(
			'setting' => 'xpro_scrolltop_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'output' => array(
		array(
			'element'     => '.xpro-scroll-top-btn > i:hover',
			'property'    => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_scrolltop_bgcolor',
	'label' => __('Button Background', 'xpro-bb-addons'),
	'description' => __('Scroll top background color.', 'xpro-bb-addons'),
	'section' => 'xpro_general_scroll_top_section',
	'transport' => 'auto',
	'choices' => [
		'alpha' => true,
	],
	'required' => array(
		array(
			'setting' => 'xpro_scrolltop_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'output' => array(
		array(
			'element'     => '.xpro-scroll-top-btn > i',
			'property'    => 'background-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_scrolltop_bgcolor_hover',
	'label' => __('Button Background Hover', 'xpro-bb-addons'),
	'description' => __('Scroll top background color on hover.', 'xpro-bb-addons'),
	'section' => 'xpro_general_scroll_top_section',
	'transport' => 'auto',
	'choices' => [
		'alpha' => true,
	],
	'required' => array(
		array(
			'setting' => 'xpro_scrolltop_enable',
			'operator' => '==',
			'value' => '1',
		)
	),
	'output' => array(
		array(
			'element'     => '.xpro-scroll-top-btn > i:hover',
			'property'    => 'background-color',
		),
	),
);

/*=================================================
   Button
=================================================*/

$xpro_fields[] = array(
	'type'        => 'dimensions',
	'settings'    => 'xpro_button_dimension',
	'label'       => __( 'Button Dimension', 'xpro-bb-addons' ),
	'description' => __( 'Specify the button dimensions e.g. 10px.', 'xpro-bb-addons' ),
	'section'     => 'xpro_general_button_section',
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
			'padding-top'  => __( 'Padding Top', 'xpro-bb-addons' ),
			'padding-right'  => __( 'Padding Right', 'xpro-bb-addons' ),
			'padding-bottom' => __( 'Padding Bottom', 'xpro-bb-addons' ),
			'padding-left' => __( 'Padding Left', 'xpro-bb-addons' ),
			'border-radius' => __( 'Border Radius', 'xpro-bb-addons' ),
		),
	),
	'output' => array(
		array(
			'element'     => '.xpro-theme .xpro-btn',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_button_font',
	'label' => __('Font Size', 'xpro-bb-addons'),
	'description' => __('Specify the button font size.', 'xpro-bb-addons'),
	'section'     => 'xpro_general_button_section',
	'default'     => 15,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-theme .xpro-btn',
			'property' => 'font-size',
			'units' => 'px',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_button_color',
	'label' => __('Button Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of theme button.', 'xpro-bb-addons'),
	'section' => 'xpro_general_button_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-theme .xpro-btn',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce .xpro-aside-widget .widget_shopping_cart .buttons a, .woocommerce .widget_price_filter .price_slider_amount .button',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_button_hcolor',
	'label' => __('Hover Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of theme button on hover.', 'xpro-bb-addons'),
	'section' => 'xpro_general_button_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-theme .xpro-btn:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce .xpro-aside-widget .widget_shopping_cart .buttons a:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_button_bgcolor',
	'label' => __('Background Color', 'xpro-bb-addons'),
	'description' => __('Specifies the background color of theme button.', 'xpro-bb-addons'),
	'section' => 'xpro_general_button_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-theme .xpro-btn',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce .xpro-aside-widget .widget_shopping_cart .buttons a, .woocommerce .widget_price_filter .price_slider_amount .button',
			'property' => 'background-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_button_bghcolor',
	'label' => __('Hover Background', 'xpro-bb-addons'),
	'description' => __('Specifies the background color of theme button on hover.', 'xpro-bb-addons'),
	'section' => 'xpro_general_button_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-theme .xpro-btn:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce .xpro-aside-widget .widget_shopping_cart .buttons a:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover',
			'property' => 'background-color',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_button_bdrcolor',
	'label' => __('Border Color', 'xpro-bb-addons'),
	'description' => __('Specifies the border color of theme button.', 'xpro-bb-addons'),
	'section' => 'xpro_general_button_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-theme .xpro-btn',
			'property' => 'border-color',
		),
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block',
			'property' => 'border-color',
		),
		array(
			'element'  => '.woocommerce .xpro-aside-widget .widget_shopping_cart .buttons a, .woocommerce .widget_price_filter .price_slider_amount .button',
			'property' => 'border-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_button_bdrhcolor',
	'label' => __('Hover Border', 'xpro-bb-addons'),
	'description' => __('Specifies the border color of theme button on hover.', 'xpro-bb-addons'),
	'section' => 'xpro_general_button_section',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-theme .xpro-btn:hover',
			'property' => 'border-color',
		),
		array(
			'element'  => '.woocommerce ul.products li.product .btn-block:hover',
			'property' => 'border-color',
		),
		array(
			'element'  => '.woocommerce .xpro-aside-widget .widget_shopping_cart .buttons a:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover',
			'property' => 'border-color',
		),
	),
);


/*=================================================
    Custom Font
=================================================*/

$xpro_fields[] = array(
	'type' => 'repeater',
	'label' => __( 'Upload Fonts', 'xpro-bb-addons' ) ,
	'description' => __( 'Here you can add your custom fonts', 'xpro-bb-addons' ) ,
	'settings' => 'xpro_custom_font',
	'section' => 'xpro_general_custom_font_section',
	'transport' => 'auto',
	'row_label' => array(
		'type' => 'text',
		'value' => __( 'Upload Font', 'xpro-bb-addons' ) ,
	),
	'fields' => array(
		'font_name' => array(
			'type' => 'text',
			'label' => __( 'Name', 'xpro-bb-addons' ) ,
		) ,
		'font_src_woff' => array(
			'type' => 'upload',
			'label' => __( 'Font File (*.woff)', 'xpro-bb-addons' ) ,
			'mime_type' => array(),
		),
		'font_src_woff2' => array(
			'type' => 'upload',
			'label' => __( 'Font File (*.woff2)', 'xpro-bb-addons' ) ,
			'mime_type' => array(),
		),
		'font_src_ttf' => array(
			'type' => 'upload',
			'label' => __( 'Font File (*.ttf)', 'xpro-bb-addons' ) ,
			'mime_type' => array(),
		) ,
		'font_weight' => array(
			'type' => 'select',
			'label' => __( 'Font Weight', 'xpro-bb-addons' ) ,
			'default' => '300',
			'choices' => array(
				100 => 100 ,
				200 => 200 ,
				300 => 300 ,
				400 => 400 ,
				500 => 500 ,
				600 => 600 ,
				700 => 700 ,
				800 => 800 ,
				900 => 900 ,
			),
		) ,
	),
);

/*=================================================
    Minified CSS/JS
=================================================*/

$xpro_fields[] = array(
	'type' => 'switch',
	'settings' => 'xpro_minify_css_enable',
	'label' => __('Minify CSS', 'xpro-bb-addons'),
	'description' => __('Enable this option to compress all CSS in one file.', 'xpro-bb-addons'),
	'section' => 'xpro_general_minify_section',
	'default' => '0',
	'transport' => 'auto',
	'choices' => array(
		'0' => __('On', 'xpro-bb-addons'),
		'1' => __('Off', 'xpro-bb-addons'),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'settings' => 'xpro_minify_js_enable',
	'label' => __('Minify JS', 'xpro-bb-addons'),
	'description' => __('Enable this option to compress all JS in one file.', 'xpro-bb-addons'),
	'section' => 'xpro_general_minify_section',
	'default' => '0',
	'transport' => 'auto',
	'choices' => array(
		'0' => __('On', 'xpro-bb-addons'),
		'1' => __('Off', 'xpro-bb-addons'),
	),
);
