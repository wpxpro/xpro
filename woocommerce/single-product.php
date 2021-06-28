<?php
/**
 * The single shop template file
 * @package Xpro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

	<main class="xpro-main xpro-shop-single">

		<?php

		if ( have_posts() ) {


			/* Check shop page */
			wc_get_template_part( 'content', 'before-product' );

			// Start the Loop.
			while ( have_posts() ) {

				the_post();

				wc_get_template_part( 'content', 'single-product' );

			}

			/* Check shop page */
			wc_get_template_part( 'content', 'after-product' );


			xpro_pagination();

		} else {
			get_template_part( 'template-parts/content', 'none' );
		}

		?>

	</main>

<?php


get_footer();
