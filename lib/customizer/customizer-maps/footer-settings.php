<?php

/*=================================================
    Footer
=================================================*/

$xpro_fields[] = array(
	'type' => 'radio-image',
	'settings' => 'xpro_footer_type',
	'label' => __('Footer Layout', 'xpro-bb-addons'),
	'description' => __('Specifies the footer layout.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_footer_section',
	'default' => 'xpro-footer-layout-1',
	'choices' => array(
		'xpro-footer-layout-1' => XPRO_THEME_IMAGES_URI . 'customizer/footer-bottom-1.png',
		'none' => XPRO_THEME_IMAGES_URI . 'customizer/footer-none.png',
	),
);

$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_footer_height',
	'label' => __('Footer Height', 'xpro-bb-addons'),
	'description' => __('To change footer height.', 'xpro-bb-addons'),
	'section'     => 'xpro_layout_footer_section',
	'default'     => 80,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.xpro_footer_height',
			'property' => 'height',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type'        => 'background',
	'settings'    => 'xpro_footer_background',
	'label'       => __( 'Footer Background', 'xpro-bb-addons' ),
	'description' => __( 'Footer background controls.', 'xpro-bb-addons' ),
	'section'     => 'xpro_layout_footer_section',
	'transport'   => 'auto',
	'default'     => array(
		'background-color'      => '#2b2b2b',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'output' => array(
		array(
			'element'  => '.xpro-copyright-bar',
		),
	),
	'required' => array(
		array(
			'setting' => 'xpro_footer_type',
			'operator' => '!=',
			'value' => 'none',
		),
	),
);


$xpro_fields[] = array(
	'type'        => 'slider',
	'settings'    => 'xpro_footer_bottom_space',
	'label' => __('Margin Top', 'xpro-bb-addons'),
	'description' => __('To change footer top space.', 'xpro-bb-addons'),
	'section'     => 'xpro_layout_footer_section',
	'default'     => 0,
	'transport' => 'auto',
	'choices'     => [
		'min'  => 0,
		'max'  => 300,
		'step' => 5,
	],
	'output' => array(
		array(
			'element'  => '.xpro-footer-wrapper',
			'property' => 'margin-top',
			'units' => 'px',
		),
	),
);

$xpro_fields[] = array(
	'type' => 'textarea',
	'label' => __('Footer Content', 'xpro-bb-addons'),
	'description' => __('Specify the content of footer.', 'xpro-bb-addons'),
	'settings' => 'xpro_footer_content',
	'section' => 'xpro_layout_footer_section',
	'transport' => 'auto',
	'default' => 'Copyright © [current_year] [site_title] - [theme_author]',
);

$xpro_fields[] = array(
	'type' => 'color',
	'settings' => 'xpro_footer_color',
	'label' => __('Text Color', 'xpro-bb-addons'),
	'description' => __('Specifies the color of footer content.', 'xpro-bb-addons'),
	'section' => 'xpro_layout_footer_section',
	'default' => '',
	'transport'   => 'auto',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.xpro-copyright-bar .site-info,.xpro-copyright-bar .site-info a',
			'property' => 'color',
		),
	),
);
