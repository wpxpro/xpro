<?php

/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package xpro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}

?>


<div class="xpro-comments-area" id="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

        <h4 class="comments-title ">

			<?php

			$comments_number = get_comments_number();

			if ( 1 === (int) $comments_number ) {

				printf(

				/* translators: %s: post title */

					esc_html_x( '1 Comment', 'comments title', 'xpro-bb-addons' ),

					'<span>' . esc_html( get_the_title() ) . '</span>'

				);

			} else {

				printf(

				/* translators: 1: number of comments, 2: post title */

					esc_html( _nx(

						'%1$s Comment',

						'%1$s Comments',

						$comments_number,

						'comments title',

						'xpro-bb-addons'

					) ),

					number_format_i18n( $comments_number ),

					'<span>' . esc_html( get_the_title() ) . '</span>'

				);

			}

			?>

        </h4><!-- .comments-title -->


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>


            <nav class="comment-navigation" id="comment-nav-above">


                <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'xpro-bb-addons' ); ?></h1>


				<?php if ( get_previous_comments_link() ) { ?>

                    <div class="nav-previous">

						<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'xpro-bb-addons' ) ); ?>

                    </div>

				<?php } ?>


				<?php if ( get_next_comments_link() ) { ?>

                    <div class="nav-next">

						<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'xpro-bb-addons' ) ); ?>

                    </div>

				<?php } ?>


            </nav><!-- #comment-nav-above -->


		<?php endif; // check for comment navigation. ?>


        <ul class="comment-list">


			<?php

			wp_list_comments(

				array(

					'style' => 'li',

					'short_ping' => true,

					'avatar_size' => 400,

					'callback' => 'xpro_comment_callback',

				)

			);

			?>


        </ul><!-- .comment-list -->


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>


            <nav class="comment-navigation" id="comment-nav-below">


                <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'xpro-bb-addons' ); ?></h1>


				<?php if ( get_previous_comments_link() ) { ?>

                    <div class="nav-previous">

						<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'xpro-bb-addons' ) ); ?>

                    </div>

				<?php } ?>



				<?php if ( get_next_comments_link() ) { ?>

                    <div class="nav-next">

						<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'xpro-bb-addons' ) ); ?>

                    </div>

				<?php } ?>


            </nav><!-- #comment-nav-below -->


		<?php endif; // check for comment navigation. ?>


	<?php endif; // endif have_comments(). ?>



	<?php

	// If comments are closed and there are comments, let's leave a little note, shall we?

	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :

		?>


        <p class="xpro-no-comments"><?php esc_html_e( 'Comments are closed.', 'xpro-bb-addons' ); ?></p>


	<?php endif; ?>



	<?php

	$user = wp_get_current_user();

	$commenter = wp_get_current_commenter();

	// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = array();

	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req = get_option( 'require_name_email' );

	$aria_req = '';

	$html_req = '';

	$html5 = 'html5' === $args['format'];

	$fields = array(

		'author' => '<input id="author" placeholder="' . esc_attr__( 'Name *', 'xpro-bb-addons' ) . '" class="input-field comment-fields" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . esc_html( $aria_req . $html_req ) . ' />',

		'email' => '<input id="email" placeholder="' . esc_attr__( 'Email *', 'xpro-bb-addons' ) . '" class="input-field comment-fields" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . esc_html( $aria_req . $html_req ) . ' />',

		'url' => '<input id="url" placeholder="' . esc_attr__( 'Website', 'xpro-bb-addons' ) . '" class="input-field medium-input comment-fields" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" />',

	);

	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
	$fields = apply_filters( 'comment_form_default_fields', $fields );

	comment_form( array(

		'fields' => $fields,

		'comment_field' => '<div class="xpro-comments-textarea"><textarea id="comment" placeholder="' . esc_attr__( 'Enter your comment here...', 'xpro-bb-addons' ) . '" rows="8" class="input-field comment-fields" name="comment" required="required"></textarea></div>',

		'title_reply_before' => '<h4 class="xpro-comment-form-title">',

		'title_reply_after' => '</h4>',

		'class_form' => 'comment-form blog-comment-form',

		'title_reply' => esc_html__( 'Write a comment', 'xpro-bb-addons' ),

		'title_reply_to' => esc_html__( 'Write a comment to %s', 'xpro-bb-addons' ),

		'cancel_reply_link' => '<i class="xi xi-bin"></i>',

		'label_submit' => esc_html__( 'Post Comment', 'xpro-bb-addons' ),

		'comment_notes_before' => '',

		'comment_notes_after' => '',

		'class_submit' => 'xpro-btn',

		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',

		'submit_field' => '<div class="form-submit">%1$s %2$s</div>',

		'logged_in_as' => '<p class="logged-in-as mb-4">' .

		                  sprintf( '<a href="%1$s" class="text-dark" aria-label="%2$s">%3$s</a>. <a href="%4$s">%5$s</a>',

			                  get_edit_user_link(),

			                  esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.', 'xpro-bb-addons' ), $user_identity ) ),

			                  esc_attr( sprintf( __( 'Logged in as %s', 'xpro-bb-addons' ), $user_identity ) ),

			                  // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
			                  wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) ),

			                  sprintf( esc_html__( 'Log Out?', 'xpro-bb-addons' ) )

		                  ) . '</p>',

	) );

	?>


</div><!-- #comments -->

