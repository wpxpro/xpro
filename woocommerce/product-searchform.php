<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form method="get" id="woosearchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <label class="sr-only" for="s"><?php esc_html_e( 'Search', 'xpro' ); ?></label>
    <div class="input-group">
        <input class="field form-control" id="s" name="s" type="text"
               placeholder="<?php esc_attr_e( 'Search &hellip;', 'xpro' ); ?>" value="<?php the_search_query(); ?>">
        <input type="hidden" name="post_type" value="product" />
        <button id="woosearchsubmit" class="xpro-btn-search" type="submit">
            <i class="xi-xi-search"></i>
        </button>
    </div>
</form>