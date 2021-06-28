<?php
/**
 * The template for displaying search forms
 *
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'xpro' ); ?></label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search Post &hellip;', 'xpro' ); ?>" value="<?php the_search_query(); ?>">
        <input type="hidden" name="post_type" value="post" />
		<button id="searchsubmit" class="xpro-btn-search" type="submit">
            <i class="xpro-icon-search"></i>
        </button>
	</div>
</form>
