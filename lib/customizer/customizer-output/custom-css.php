<?php

/**
 * Generate inline css.
 *
 * @package xpro
 *
 **/

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

// @codingStandardsIgnoreStart

$custom_css = xpro_get_option('xpro_custom_font',[]);
$header_gradient_enable = xpro_get_option('xpro_header_gradient','0');
$header_gradient = get_theme_mod('xpro_header_gradient_style',[]);
$sticky_gradient_enable = xpro_get_option('xpro_sticky_header_gradient','0');
$sticky_gradient = get_theme_mod('xpro_sticky_header_gradient_style',[]);
$headerSticky = xpro_get_option('xpro_sticky_header_enable','0');
$headerLayout = xpro_get_option('xpro_header_type','standard');
$header_meta    = xpro_get_meta( 'xpro-main-header-display');

$submenu_gradient_enable = xpro_get_option('xpro_header_submenu_gradient','0');
$submenu_gradient = get_theme_mod('xpro_header_sub_gradient_style',[]);
$sticky_submenu_gradient_enable = xpro_get_option('xpro_header_sticky_submenu_gradient','0');
$sticky_submenu_gradient = get_theme_mod('xpro_header_sticky_sub_gradient_style',[]);

//Per Page
$sidebar = xpro_get_meta( 'site-sidebar-layout');
$content_space = xpro_get_meta( 'xpro-space-content');

//Page
$pageLayoutOption = xpro_get_option( 'xpro_page_layout','full-layout');
$pageLayout = (!empty($sidebar)) ? $sidebar : $pageLayoutOption;

//Blog
$blogLayoutOption = xpro_get_option( 'xpro_blog_layout','right-layout');
$blogLayout = (!empty($sidebar)) ? $sidebar : $blogLayoutOption;

//Single
$singleLayoutOption = xpro_get_option( 'xpro_single_layout','right-layout');
$singleLayout = (!empty($sidebar)) ? $sidebar : $singleLayoutOption;

//Archive
$archiveLayout = xpro_get_option( 'xpro_archive_layout','right-layout');

//Shop
$archiveShop = xpro_get_option( 'xpro_shop_layout','left-layout');

//Banner
$banner_background = xpro_get_option('xpro_banner_background',[]);

//Footer
$footer_background = xpro_get_option('xpro_footer_background',[]);

if ( ! empty( $custom_css ) )
{
	foreach( $custom_css as $custom_font ){


		$font_src = [];

		if(!empty($custom_font[ 'font_src_woff' ])){
			if (filter_var($custom_font[ 'font_src_woff' ], FILTER_VALIDATE_URL) === FALSE) {
				$custom_font[ 'font_src_woff' ] = wp_get_attachment_url($custom_font[ 'font_src_woff' ]);
			}
			$font_src[0] = 'url('.esc_url($custom_font[ 'font_src_woff' ]).') format("woff")';
        }

		if(!empty($custom_font[ 'font_src_woff2' ])){
			if (filter_var($custom_font[ 'font_src_woff2' ], FILTER_VALIDATE_URL) === FALSE) {
				$custom_font[ 'font_src_woff2' ] = wp_get_attachment_url($custom_font[ 'font_src_woff2' ]);
			}
			$font_src[1] = 'url('.esc_url($custom_font[ 'font_src_woff2' ]).') format("woff2")';
		}

		if(!empty($custom_font[ 'font_src_ttf' ])){
			if (filter_var($custom_font[ 'font_src_ttf' ], FILTER_VALIDATE_URL) === FALSE) {
				$custom_font[ 'font_src_ttf' ] = wp_get_attachment_url($custom_font[ 'font_src_ttf' ]);
			}
			$font_src[2] = 'url('.esc_url($custom_font[ 'font_src_ttf' ]).') format("truetype")';
		}

		$font_src = implode( ", ", $font_src );

		$font_weight = (!empty($custom_font[ 'font_weight' ])) ? $custom_font[ 'font_weight' ] : 'regular';

		$css = '@font-face {
	                	font-family: "'.$custom_font[ 'font_name' ].'";
	                	src: '.$font_src.';
	                	font-weight: '.$font_weight.';
	                }
                ';

		print_r($css);
	}
}

if (method_exists('Kirki_Modules_CSS', 'print_styles')){
	$styles = Kirki_Modules_CSS::get_instance();
	$styles->print_styles();
}

if($headerSticky == '1' && $headerLayout !== 'none' && $header_meta !== 'disabled'){ ?>
   .xpro-header-sticky ~ .xpro-title-wrapper{
        padding-top: 73px;
    }
<?php }

if($content_space == true){ ?>
    .xpro-primary-wrapper .xpro-content-wrapper{
        padding-top:0;
        padding-bottom:0;
    }
<?php }

if($header_gradient_enable == 1 && !empty($header_gradient['primary']) && !empty($header_gradient['secondary']) ){ ?>

	.xpro-navbar-primary{
		background: <?php echo esc_attr($header_gradient['primary']); ?>;
		background: -moz-linear-gradient(left, <?php echo esc_attr($header_gradient['primary']); ?> 2%, <?php echo esc_attr($header_gradient['secondary']); ?> 82%);
		background: -webkit-linear-gradient(left, <?php echo esc_attr($header_gradient['primary']); ?> 2%, <?php echo esc_attr($header_gradient['secondary']); ?> 82%);
		background: linear-gradient(to right, <?php echo esc_attr($header_gradient['primary']); ?> 2%, <?php echo esc_attr($header_gradient['secondary']); ?> 82%);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='@colorPrimary', endColorstr='@colorPrimary', GradientType=1);
	}

<?php }

if($sticky_gradient_enable == 1 && !empty($sticky_gradient['primary']) && !empty($sticky_gradient['secondary']) ){ ?>

	.xpro-appear .xpro-navbar-primary{
	background: <?php echo esc_attr($sticky_gradient['primary']); ?>;
	background: -moz-linear-gradient(left, <?php echo esc_attr($sticky_gradient['primary']); ?> 2%, <?php echo esc_attr($sticky_gradient['secondary']); ?> 82%);
	background: -webkit-linear-gradient(left, <?php echo esc_attr($sticky_gradient['primary']); ?> 2%, <?php echo esc_attr($sticky_gradient['secondary']); ?> 82%);
	background: linear-gradient(to right, <?php echo esc_attr($sticky_gradient['primary']); ?> 2%, <?php echo esc_attr($sticky_gradient['secondary']); ?> 82%);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='@colorPrimary', endColorstr='@colorPrimary', GradientType=1);
	}

<?php }


if($submenu_gradient_enable == 1 && !empty($submenu_gradient['primary']) && !empty($submenu_gradient['secondary']) ){ ?>

    .xpro-navbar-primary .xpro-dropdown-menu{
    background: <?php echo esc_attr($submenu_gradient['primary']); ?>;
    background: -moz-linear-gradient(left, <?php echo esc_attr($submenu_gradient['primary']); ?> 2%, <?php echo esc_attr($submenu_gradient['secondary']); ?> 82%);
    background: -webkit-linear-gradient(left, <?php echo esc_attr($submenu_gradient['primary']); ?> 2%, <?php echo esc_attr($submenu_gradient['secondary']); ?> 82%);
    background: linear-gradient(to right, <?php echo esc_attr($submenu_gradient['primary']); ?> 2%, <?php echo esc_attr($submenu_gradient['secondary']); ?> 82%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='@colorPrimary', endColorstr='@colorPrimary', GradientType=1);
    }

<?php }


if($sticky_submenu_gradient_enable == 1 && !empty($sticky_submenu_gradient['primary']) && !empty($sticky_submenu_gradient['secondary']) ){ ?>

    .xpro-appear .xpro-navbar-primary .xpro-dropdown-menu{
    background: <?php echo esc_attr($sticky_submenu_gradient['primary']); ?>;
    background: -moz-linear-gradient(left, <?php echo esc_attr($sticky_submenu_gradient['primary']); ?> 2%, <?php echo esc_attr($sticky_submenu_gradient['secondary']); ?> 82%);
    background: -webkit-linear-gradient(left, <?php echo esc_attr($sticky_submenu_gradient['primary']); ?> 2%, <?php echo esc_attr($sticky_submenu_gradient['secondary']); ?> 82%);
    background: linear-gradient(to right, <?php echo esc_attr($sticky_submenu_gradient['primary']); ?> 2%, <?php echo esc_attr($sticky_submenu_gradient['secondary']); ?> 82%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='@colorPrimary', endColorstr='@colorPrimary', GradientType=1);
    }

<?php } ?>

<?php if(!empty($banner_background['background-image'])){ ?>

    .xpro-title-wrapper{
        background-image:url('<?php echo esc_url($banner_background['background-image']); ?>');
    }

<?php } ?>

<?php if(!empty($footer_background['background-image'])){ ?>

    .xpro-copyright-bar{
    background-image:url('<?php echo esc_url($banner_background['background-image']); ?>');
    }

<?php } ?>

@media screen and (min-width: 991px) {

<?php if($pageLayout == 'right-layout'){ ?>
      .page .xpro-main{
        width: 75%;
        flex-basis: 75%;
        padding-right: 50px;
       }
<?php } ?>

<?php if($pageLayout == 'left-layout'){ ?>
    .page .xpro-main{
        width: 75%;
        flex-basis: 75%;
        order:1;
        padding-left: 50px;
    }
<?php } ?>

<?php if($blogLayout == 'right-layout'){ ?>
    .blog .xpro-main{
        width: 75%;
        flex-basis: 75%;
        padding-right: 50px;
    }
<?php } ?>

<?php if($blogLayout == 'left-layout'){ ?>
    .blog .xpro-main{
        width: 75%;
        flex-basis: 75%;
        order:1;
        padding-left: 50px;
    }
<?php } ?>


<?php if($archiveLayout == 'right-layout'){ ?>
    .archive .xpro-main,.search .xpro-main{
    width: 75%;
    flex-basis: 75%;
    padding-right: 50px;
    }
<?php } ?>

<?php if($archiveLayout == 'left-layout'){ ?>
    .archive .xpro-main,.search .xpro-main{
    width: 75%;
    flex-basis: 75%;
    order:1;
    padding-left: 50px;
    }
<?php } ?>

<?php if($singleLayout == 'right-layout'){ ?>
    .single-post .xpro-main{
    width: 75%;
    float: left;
    padding-right: 50px;
    }
<?php } ?>

<?php if($singleLayout == 'left-layout'){ ?>
    .single-post .xpro-main{
    width: 75%;
    flex-basis: 75%;
    order:1;
    padding-left: 50px;
    }
<?php } ?>

<?php if($archiveShop == 'right-layout'){ ?>
    .archive.woocommerce .xpro-main{
    width: 75%;
    flex-basis: 75%;
    padding-left:0;
    padding-right: 50px;
    }
<?php } ?>

<?php if($archiveShop == 'left-layout'){ ?>
    .archive.woocommerce .xpro-main{
    width: 75%;
    flex-basis: 75%;
    order:1;
    padding-right:0;
    padding-left: 50px;
    }

<?php } ?>

<?php if($archiveShop == 'full-layout'){ ?>
    .archive.woocommerce .xpro-main{
    width: 100%;
    flex-basis: 100%;
    display: block;
    padding:0;
    }

<?php } ?>

}

<?php

// @codingStandardsIgnoreEnd
