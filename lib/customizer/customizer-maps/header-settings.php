<?php

/*=================================================
    Header Layout
=================================================*/


$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_header_type',
	'label' => __('Header Layout', 'xpro'),
	'description' => __('Specifies the header layout.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => 'standard',
	'choices' => array(
		'standard' => XPRO_THEME_IMAGES_URI . 'customizer/header-standard.png',
		'left-top' => XPRO_THEME_IMAGES_URI . 'customizer/header-left-top.png',
		'center-top' => XPRO_THEME_IMAGES_URI . 'customizer/header-center-top.png',
		'none' => XPRO_THEME_IMAGES_URI . '/customizer/header-none.png',
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_header_container',
	'label' => __('Container', 'xpro'),
	'description' => __('Specifies the navigation container.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => 'xpro-container',
	'transport' => 'auto',
	'choices' => array(
		'xpro-container' => __('Fixed', 'xpro'),
		'xpro-container-fluid' => __('Full Width', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_header_container_width',
	'label' => __('Container Width', 'xpro'),
	'description' => __('Specifies the width of the header container.', 'xpro'),
	'section'     => 'xpro_header_layout',
	'transport'   => 'auto',
	'default'     => 1170,
	'choices'     => [
		'min'  => 1000,
		'max'  => 1920,
		'step' => 5,
	],
	'required' => array(
		array(
			'setting' => 'xpro_header_container',
			'operator' => '==',
			'value' => 'xpro-container',
		)
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-container',
			'property' => 'max-width',
			'units'    => 'px',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'typography',
	'settings' => 'xpro_header_menu_typogrphy',
	'label'    => __('Menu Font', 'xpro' ),
	'description' => __('Theme additional fonts for header menu.', 'xpro'),
	'section' => 'xpro_header_layout',
	'transport' => 'auto',
	'default'  => array(
		'font-family'    => '',
		'variant'        => '',
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => '.xpro-navbar-primary .xpro-navbar-nav',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_font_weight_menu',
	'label' => __('Font Weight', 'xpro'),
	'section' => 'xpro_header_layout',
	'transport' => 'auto',
	'default' => 'normal',
	'choices' => array(
		'normal' => __('Normal', 'xpro'),
		'100' => __('100', 'xpro'),
		'200' => __('200', 'xpro'),
		'300' => __('300', 'xpro'),
		'400' => __('400', 'xpro'),
		'500' => __('500', 'xpro'),
		'600' => __('600', 'xpro'),
		'700' => __('700', 'xpro'),
		'800' => __('800', 'xpro'),
		'900' => __('900', 'xpro'),
	),
	'output' => array(
		array(
			'element' => '.xpro-navbar-primary .xpro-navbar-nav',
			'property' => 'font-weight',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'text',
	'settings' => 'xpro_header_height',
	'label' => __('Header Height', 'xpro'),
	'description' => __('Specifies the height of header e.i 100px', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '',
	'transport' => 'auto',
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary',
			'property' => 'height',
		),
		array(
			'element'  => '.xpro-header-sticky ~ .xpro-title-wrapper',
			'property' => 'padding-top',
			'suffix' => ' !important',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_header_menu_margin',
	'label' => __('Left/Right Space', 'xpro'),
	'description' => __('Specifies the margin left/right between menu.', 'xpro'),
	'section'     => 'xpro_header_layout',
	'transport'   => 'auto',
	'default'     => 15,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav > li > a',
			'property' => 'margin-left',
			'units' => 'px',
			'media_query' => '@media (min-width: 991px)',
		),
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav > li > a',
			'property' => 'margin-right',
			'units' => 'px',
			'media_query' => '@media (min-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_header_menu_padding',
	'label' => __('Top/Bottom Space', 'xpro'),
	'description' => __('Specifies the padding top/bottom between menu.', 'xpro'),
	'section'     => 'xpro_header_layout',
	'transport'   => 'auto',
	'default'     => 25,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav > li > a',
			'property' => 'padding-top',
			'units' => 'px',
			'media_query' => '@media (min-width: 991px)',
		),
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav > li > a',
			'property' => 'padding-bottom',
			'units' => 'px',
			'media_query' => '@media (min-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_bg',
	'label' => __('Header Background', 'xpro'),
	'description' => __('Specifies the color of header background.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '#fff',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_header_gradient',
			'operator' => '==',
			'value' => '0',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_border',
	'label' => __('Header Border', 'xpro'),
	'description' => __('Specifies the color of header border bottom.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '#eceef1',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary',
			'property' => 'border-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_menu_color',
	'label' => __('Header Menu Color', 'xpro'),
	'description' => __('Specifies the color of header menu.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '',
	'transport' => 'auto',
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-brand > a, .xpro-navbar-primary .xpro-navbar-nav > li > a',
			'property' => 'color',
			'media_query' => '@media (min-width: 991px)',
		),
		array(
			'element'  => '.xpro-navbar-primary .navbar-toggler-icon,.xpro-navbar-primary .xpro-navbar-toggle::before, .xpro-navbar-primary .xpro-navbar-toggle::after',
			'property' => 'background-color',
		),
	),
	'choices' => array(
		'alpha' => true,
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Header Gradient', 'xpro'),
	'description' => __('Enable this option to header background gradient.', 'xpro'),
	'section' => 'xpro_header_layout',
	'settings' => 'xpro_header_gradient',
	'default' => '0',
	'choices' => array(
		'0' => __('On', 'xpro'),
		'1' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'multicolor',
	'settings'    => 'xpro_header_gradient_style',
	'label'       => __( 'Gradient Colors', 'xpro' ),
	'description' => __('Specifies the header background gradient.', 'xpro'),
	'section'     => 'xpro_header_layout',
	'choices'     => [
		'primary'    => __( 'Primary', 'xpro' ),
		'secondary'   => __( 'Secondary', 'xpro' ),
	],
	'default'     => [
		'primary'    => '',
		'secondary'   => '',
	],
	'required' => array(
		array(
			'setting' => 'xpro_header_gradient',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_active_color',
	'label' => __('Active/Hover Color', 'xpro'),
	'description' => __('Specifies the color of nav menu active and hover.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li[class*="current-menu-"] > a, .xpro-navbar-primary .xpro-navbar-nav > li > a:hover',
			'property' => 'color',
			'media_query' => '@media (min-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Sticky Header', 'xpro'),
	'description' => __('Enable it to display header menu on top even by scrolling the page.', 'xpro'),
	'section' => 'xpro_header_layout',
	'settings' => 'xpro_sticky_header_enable',
	'transport' => 'auto',
	'default' => '0',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_sticky_header_bg',
	'label' => __('Sticky Background', 'xpro'),
	'description' => __('Specifies the color of sticky header background.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '#fff',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'required' => array(
		array(
			'setting' => 'xpro_sticky_header_gradient',
			'operator' => '==',
			'value' => '0',
		),
		array(
			'setting' => 'xpro_sticky_header_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
	'output' => array(
		array(
			'element'  => '.xpro-appear .xpro-navbar-primary',
			'property' => 'background-color',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Sticky Gradient', 'xpro'),
	'description' => __('Enable this option to sticky header background gradient.', 'xpro'),
	'section' => 'xpro_header_layout',
	'settings' => 'xpro_sticky_header_gradient',
	'transport' => 'auto',
	'default' => '0',
	'choices' => array(
		'0' => __('On', 'xpro'),
		'1' => __('Off', 'xpro'),
	),
	'required' => array(
		array(
			'setting' => 'xpro_sticky_header_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_sticky_header_menu_color',
	'label' => __('Sticky Menu Color', 'xpro'),
	'description' => __('Specifies the color of sticky header menu.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '#2b2b2b',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-appear .xpro-navbar-primary .xpro-navbar-brand > a,.xpro-appear .xpro-navbar-primary .xpro-navbar-nav > li > a',
			'property' => 'color',
			'media_query' => '@media (min-width: 991px)',
		),
		array(
			'element'  => '.xpro-appear .xpro-navbar-primary .navbar-toggler-icon,.xpro-appear .xpro-navbar-primary .xpro-navbar-toggle::before,.xpro-appear .xpro-navbar-primary .xpro-navbar-toggle::after',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_sticky_header_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_sticky_header_active_color',
	'label' => __('Sticky Active/Hover', 'xpro'),
	'description' => __('Specifies the color of nav menu active and hover of header sticky.', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-appear .xpro-navbar-primary .xpro-navbar-nav li[class*="current-menu-"] > a,.xpro-appear .xpro-navbar-primary .xpro-navbar-nav li > a:hover',
			'property' => 'color',
			'media_query' => '@media (min-width: 991px)',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_sticky_header_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'multicolor',
	'settings'    => 'xpro_sticky_header_gradient_style',
	'label'       => __( 'Gradient Colors', 'xpro' ),
	'description' => __('Specifies the sticky header background gradient.', 'xpro'),
	'section'     => 'xpro_header_layout',
	'choices'     => [
		'primary'    => __( 'Primary', 'xpro' ),
		'secondary'   => __( 'Secondary', 'xpro' ),
	],
	'default'     => [
		'primary'    => '',
		'secondary'   => '',
	],
	'required' => array(
		array(
			'setting' => 'xpro_sticky_header_gradient',
			'operator' => '==',
			'value' => '1',
		),
		array(
			'setting' => 'xpro_sticky_header_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'text',
	'settings' => 'xpro_sticky_header_height',
	'label' => __('Sticky Height', 'xpro'),
	'description' => __('Specifies the height of header sticky e.i 100px', 'xpro'),
	'section' => 'xpro_header_layout',
	'default' => '',
	'transport' => 'auto',
	'output' => array(
		array(
			'element'  => '.xpro-appear .xpro-navbar-primary',
			'property' => 'height',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_sticky_header_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

/*=================================================
    Header Sub Menu
=================================================*/

$xpro_fields[] = array(
	'type' => 'typography',
	'settings' => 'xpro_header_submenu_typogrphy',
	'label'    => __('Submenu Font', 'xpro' ),
	'description' => __('Theme additional fonts for header sub menu.', 'xpro'),
	'section' => 'xpro_header_sub',
	'transport' => 'auto',
	'default'  => array(
//		'font-family'    => '',
//		'variant'        => '',
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element' => '.xpro-navbar-primary .xpro-dropdown-menu > li > a',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_font_weight_submenu',
	'label' => __('Font Weight', 'xpro'),
	'section' => 'xpro_header_sub',
	'transport' => 'auto',
	'default' => 'normal',
	'choices' => array(
		'normal' => __('Normal', 'xpro'),
		'100' => __('100', 'xpro'),
		'200' => __('200', 'xpro'),
		'300' => __('300', 'xpro'),
		'400' => __('400', 'xpro'),
		'500' => __('500', 'xpro'),
		'600' => __('600', 'xpro'),
		'700' => __('700', 'xpro'),
		'800' => __('800', 'xpro'),
		'900' => __('900', 'xpro'),
	),
	'output' => array(
		array(
			'element' => '.xpro-navbar-primary .xpro-dropdown-menu > li > a',
			'property' => 'font-weight',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_header_submenu_padding',
	'label' => __('Top/Bottom Space', 'xpro'),
	'description' => __('Specifies the padding top/bottom between submenu.', 'xpro'),
	'section'     => 'xpro_header_sub',
	'transport'   => 'auto',
	'default'     => 6,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element' => '.xpro-navbar-primary .xpro-dropdown-menu > li > a',
			'property' => 'padding-top',
			'units' => 'px',
			'media_query' => '@media (min-width: 991px)',
		),
		array(
			'element' => '.xpro-navbar-primary .xpro-dropdown-menu > li > a',
			'property' => 'padding-bottom',
			'units' => 'px',
			'media_query' => '@media (min-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Submenu Gradient', 'xpro'),
	'description' => __('Enable this option to header dropdown background gradient.', 'xpro'),
	'section' => 'xpro_header_sub',
	'settings' => 'xpro_header_submenu_gradient',
	'default' => '0',
	'choices' => array(
		'0' => __('On', 'xpro'),
		'1' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'multicolor',
	'settings'    => 'xpro_header_sub_gradient_style',
	'label'       => __( 'Gradient Colors', 'xpro' ),
	'description' => __('Specifies the header submenu background gradient.', 'xpro'),
	'section'     => 'xpro_header_sub',
	'choices'     => [
		'primary'    => __( 'Primary', 'xpro' ),
		'secondary'   => __( 'Secondary', 'xpro' ),
	],
	'default'     => [
		'primary'    => '',
		'secondary'   => '',
	],
	'required' => array(
		array(
			'setting' => 'xpro_header_submenu_gradient',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_submenu_bg_color',
	'label' => __('Submenu Background', 'xpro'),
	'description' => __('Specifies the color of header submenu menu background.', 'xpro'),
	'section' => 'xpro_header_sub',
	'default' => '#fff',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-dropdown-menu',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_header_submenu_gradient',
			'operator' => '==',
			'value' => '0',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_submenu_color',
	'label' => __('Submenu Color', 'xpro'),
	'description' => __('Specifies the color of header submenu menu.', 'xpro'),
	'section' => 'xpro_header_sub',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-dropdown-menu > li a',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_submenu_active_color',
	'label' => __('Submenu Active/Hover', 'xpro'),
	'description' => __('Specifies the color of header submenu menu active.', 'xpro'),
	'section' => 'xpro_header_sub',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li .xpro-dropdown-menu li[class*="current-menu-"] > a,.xpro-navbar-primary .xpro-dropdown-menu > li > a:hover',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_submenu_border',
	'label' => __('Submenu Border', 'xpro'),
	'description' => __('Specifies the top border color of header submenu.', 'xpro'),
	'section' => 'xpro_header_sub',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-dropdown-menu',
			'property' => 'border-color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Sticky Submenu Gradient', 'xpro'),
	'description' => __('Enable this option to sticky header dropdown background gradient.', 'xpro'),
	'section' => 'xpro_header_sub',
	'settings' => 'xpro_header_sticky_submenu_gradient',
	'default' => '0',
	'choices' => array(
		'0' => __('On', 'xpro'),
		'1' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type'        => 'multicolor',
	'settings'    => 'xpro_header_sticky_sub_gradient_style',
	'label'       => __( 'Gradient Colors', 'xpro' ),
	'description' => __('Specifies the header submenu background gradient.', 'xpro'),
	'section'     => 'xpro_header_sub',
	'choices'     => [
		'primary'    => __( 'Primary', 'xpro' ),
		'secondary'   => __( 'Secondary', 'xpro' ),
	],
	'default'     => [
		'primary'    => '',
		'secondary'   => '',
	],
	'required' => array(
		array(
			'setting' => 'xpro_header_sticky_submenu_gradient',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_sticky_header_submenu_bg_color',
	'label' => __('Sticky Submenu Background', 'xpro'),
	'description' => __('Specifies the color of sticky header submenu menu background.', 'xpro'),
	'section' => 'xpro_header_sub',
	'transport' => 'auto',
	'default' => '',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-header-sticky .xpro-navbar-primary .xpro-dropdown-menu',
			'property' => 'background-color',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_header_sticky_submenu_gradient',
			'operator' => '==',
			'value' => '0',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_sticky_header_submenu_color',
	'label' => __('Sticky Submenu Color', 'xpro'),
	'description' => __('Specifies the color of sticky submenu menu.', 'xpro'),
	'section' => 'xpro_header_sub',
	'transport' => 'auto',
	'default' => '',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-header-sticky .xpro-navbar-primary .xpro-dropdown-menu > li a',
			'property' => 'color',
		),
	),
);


$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_sticky_submenu_active_color',
	'label' => __('Sticky Submenu Active/Hover', 'xpro'),
	'description' => __('Specifies the color of sticky header submenu menu active.', 'xpro'),
	'section' => 'xpro_header_sub',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-header-sticky .xpro-navbar-primary li[class*="current-menu-"] > a > .xpro-dropdown-menu > li a,.xpro-appear .xpro-navbar-primary .xpro-dropdown-menu > li > a:hover',
			'property' => 'color',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_header_sticky_submenu_border',
	'label' => __('Sticky Submenu Border', 'xpro'),
	'description' => __('Specifies the top border color of sticky header submenu.', 'xpro'),
	'section' => 'xpro_header_sub',
	'default' => '',
	'transport' => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-header-sticky .xpro-navbar-primary .xpro-dropdown-menu',
			'property' => 'border-color',
		),
	),
);

/*=================================================
    Header Logo
=================================================*/

$xpro_fields[] = array(
	'type' => 'switch',
	'label' => __('Logo', 'xpro'),
	'description' => __('Enable/Disable site header logo.', 'xpro'),
	'section' => 'xpro_header_logo',
	'settings' => 'xpro_header_logo_enable',
	'transport' => 'auto',
	'default' => '0',
	'choices' => array(
		'1' => __('On', 'xpro'),
		'0' => __('Off', 'xpro'),
	),
);

$xpro_fields[] = array(
	'type' => 'image',
	'settings' => 'xpro_site_logo',
	'label' => __('Logo', 'xpro'),
	'description' => __('Upload the logo image which will be displayed in the website header.', 'xpro'),
	'section' => 'xpro_header_logo',
	'transport' => 'auto',
	'required' => array(
		array(
			'setting' => 'xpro_header_logo_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_logo_width',
	'label' => __('Logo Width', 'xpro'),
	'description' => __('To change header logo width.', 'xpro'),
	'section'     => 'xpro_header_logo',
	'default'     => 150,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-brand > a > .xpro-logo',
			'property' => 'width',
			'units' => 'px',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_header_logo_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'image',
	'settings' => 'xpro_site_logo_sticky',
	'label' => __('Sticky Logo', 'xpro'),
	'description' => __('Upload the logo sticky image which will be displayed in the website header in scrolled version header.', 'xpro'),
	'section' => 'xpro_header_logo',
	'transport' => 'auto',
	'required' => array(
		array(
			'setting' => 'xpro_header_logo_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_sticky_logo_width',
	'label' => __('Sticky Logo Width', 'xpro'),
	'description' => __('To change sticky header logo width.', 'xpro'),
	'section'     => 'xpro_header_logo',
	'default'     => 150,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-appear .xpro-navbar-primary .xpro-navbar-brand > a > .xpro-logo',
			'property' => 'width',
			'units' => 'px',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_header_logo_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);


/*=================================================
    Hamburger
=================================================*/


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_resonsive_logo_width',
	'label' => __('Logo Width', 'xpro'),
	'description' => __('To change header logo width.', 'xpro'),
	'section'     => 'xpro_hamburger',
	'default'     => 150,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-brand > a > .xpro-logo',
			'property' => 'width',
			'units' => 'px',
			'media_query' => '@media (max-width: 991px)',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_header_logo_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_resonsive_sticky_logo_width',
	'label' => __('Sticky Logo Width', 'xpro'),
	'description' => __('To change sticky header logo width.', 'xpro'),
	'section'     => 'xpro_hamburger',
	'default'     => 150,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-appear .xpro-navbar-primary .xpro-navbar-brand > a > .xpro-logo',
			'property' => 'width',
			'units' => 'px',
			'media_query' => '@media (max-width: 991px)',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_header_logo_enable',
			'operator' => '==',
			'value' => '1',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'typography',
	'settings' => 'xpro_hamburger_typography',
	'label' => __('Font Size', 'xpro'),
	'description' => __('To change hamburger menu font size. e.g. 15px', 'xpro'),
	'section' => 'xpro_hamburger',
	'transport' => 'auto',
	'default'  => array(
		'font-size'      => '',
		'line-height'    => '',
		'letter-spacing' => '',
		'text-transform' => '',
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li > a',
			'media_query' => '@media (max-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'select',
	'settings' => 'xpro_font_weight_hamburger',
	'label' => __('Font Weight', 'xpro'),
	'section' => 'xpro_hamburger',
	'transport' => 'auto',
	'default' => 'normal',
	'choices' => array(
		'normal' => __('Normal', 'xpro'),
		'100' => __('100', 'xpro'),
		'200' => __('200', 'xpro'),
		'300' => __('300', 'xpro'),
		'400' => __('400', 'xpro'),
		'500' => __('500', 'xpro'),
		'600' => __('600', 'xpro'),
		'700' => __('700', 'xpro'),
		'800' => __('800', 'xpro'),
		'900' => __('900', 'xpro'),
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li > a',
			'property' => 'font-weight',
			'media_query' => '@media (max-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_hamburger_menu_padding',
	'label' => __('Top/Bottom Space', 'xpro'),
	'description' => __('Specifies the padding top/bottom between menu.', 'xpro'),
	'section'     => 'xpro_hamburger',
	'transport'   => 'auto',
	'default'     => 8,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li > a',
			'property' => 'padding-top',
			'units' => 'px',
			'media_query' => '@media (max-width: 991px)',
		),
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li > a',
			'property' => 'padding-bottom',
			'units' => 'px',
			'media_query' => '@media (max-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_hamburger_color',
	'label' => __('Menu Color', 'xpro'),
	'description' => __('Specifies the color of hamburger menu.', 'xpro'),
	'section' => 'xpro_hamburger',
	'transport' => 'auto',
	'default' => '#2b2b2b',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li > a,.xpro-navbar-primary .xpro-navbar-nav li > a:hover',
			'property' => 'color',
			'media_query' => '@media (max-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_hamburger_bgcolor',
	'label' => __('Background Color', 'xpro'),
	'description' => __('Specifies the color of hamburger menu background.', 'xpro'),
	'section' => 'xpro_hamburger',
	'transport' => 'auto',
	'default' => '#eaeaea',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li',
			'property' => 'background-color',
			'media_query' => '@media (max-width: 991px)',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_hamburger_bdrcolor',
	'label' => __('Border Color', 'xpro'),
	'description' => __('Specifies the border color of hamburger menu background.', 'xpro'),
	'section' => 'xpro_hamburger',
	'transport' => 'auto',
	'default' => '#d8d8d8',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav li',
			'property' => 'border-color',
			'media_query' => '@media (max-width: 991px)',
		),
		array(
			'element'  => '.xpro-navbar-primary .xpro-navbar-nav ul',
			'property' => 'border-color',
			'media_query' => '@media (max-width: 991px)',
		),
	),
);
