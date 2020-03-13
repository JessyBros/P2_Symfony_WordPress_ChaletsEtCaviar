<?php
/**
 * Comments related functions
 *
 * @package roseta
 */

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own roseta_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
if ( ! function_exists( 'roseta_comment' ) ) :
function roseta_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback'  :
		case 'trackback' :
		?>
			<li class="post pingback">
			<p><?php _e( 'Pingback: ', 'roseta' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'roseta' ), ' ' ); ?></p>
		<?php
		break;
		case '' :
		default :
		?>
			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>"<?php cryout_schema_microdata( 'comment' ); ?>>

				<article>
					<div class="comment-avatar">
							<?php echo get_avatar( $comment, 50, '', '', array( 'extra_attr' => cryout_schema_microdata('image', 0) )  ); ?>
					</div>
					<div class="comment-body" <?php cryout_schema_microdata( 'text' ); ?>>

						<header class="comment-header vcard">

							<div class="comment-author" <?php cryout_schema_microdata( 'comment-author' ); ?>>
								<?php printf(  '%s ', sprintf( '<span class="author-name fn"' . cryout_schema_microdata( 'author-name', 0) . '>%s</span>', get_comment_author_link() ) ); ?>
							</div> <!-- .comment-author -->

							<div class="comment-meta">
								<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<time datetime="<?php comment_time( 'c' );?>" <?php cryout_schema_microdata( 'time' );?>>

									<span class="comment-date">
										<?php /* translators: 1: date, 2: time */
										printf(  '%1$s ' . __( 'at', 'roseta' ) . ' %2$s', get_comment_date(),  get_comment_time() ); ?>
									</span>
									<span class="comment-timediff">
										<?php printf( _x( '%1$s ago', '%s = human-readable time difference', 'roseta' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
									</span>

								</time>
								</a>
								<?php edit_comment_link( __( '(Edit)', 'roseta' ), ' ' ); ?>
							</div><!-- .comment-meta -->

							<div class="reply">
								<?php comment_reply_link( array_merge( $args, array(
										'reply_text' 	=> '<i class="icon-reply-comments"></i> ' . __( 'Reply', 'roseta' ),
										'depth'			=> $depth,
										'max_depth'		=> $args['max_depth'] ) ) );
								?>
							</div><!-- .reply -->

						</header><!-- .comment-header .vcard -->

						<?php if ( $comment->comment_approved == '0' ) : ?>
							<span class="comment-await"><em><?php _e( 'Your comment is awaiting moderation.', 'roseta' ); ?></em></span>
						<?php endif; ?>
						<?php comment_text(); ?>
					</div><!-- .comment-body -->
				</article>
		<?php
		break;
	endswitch;

	// </li><!-- #comment-##  -->  closed by wp_comments_list()
} // roseta_comment()
endif;

/** Number of comments on loop post if comments are enabled. */
if ( ! function_exists( 'roseta_comments_on' ) ) :
function roseta_comments_on() {
	$meta_blog_comment = cryout_get_option( 'theme_meta_blog_comment' );
    // Only show comments if they're open, or are closed but with comments already posted, if the theme's meta comments are enabled and if it's not a single post
    if ( ( comments_open() || get_comments_number() ) && ! post_password_required() && $meta_blog_comment && ! is_single() ) :
			echo '<span class="comments-link" title="' . sprintf( esc_attr__('Comments on "%s"', 'roseta'), get_the_title() ) . '"><i class="icon-comments icon-metas" title="' . esc_attr__('Comments', 'roseta') . '"></i>';
			comments_popup_link(
				 __( '0', 'roseta' ),
				sprintf( _n( '1', '%1$s', get_comments_number(), 'roseta' ), number_format_i18n( get_comments_number() ) ),
				sprintf( _n( '1', '%1$s', get_comments_number(), 'roseta' ), number_format_i18n( get_comments_number() ) ),
				'',
				''
			);
			echo '</span>';
		endif;
} // roseta_comments_on()
endif;

/** Adds microdata tags to comment link */
if ( ! function_exists( 'roseta_comments_microdata' ) ) :
function roseta_comments_microdata() {

	cryout_schema_microdata('comment-meta');

} // roseta_comments_microdata()
endif;
add_filter( 'comments_popup_link_attributes', 'roseta_comments_microdata' );


/* Edit comments form inputs: removed labels and replaced them with placeholders */
function roseta_comments_form( $arg ) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$arg =  array(

		'author' =>	'<p class="comment-form-author"><label for="author">' . __( 'Name', 'roseta' ) .  ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
					'<em><input id="author" placeholder="'. esc_attr__( 'Name', 'roseta' ) .'*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30" maxlength="245"' . $aria_req . ' /></em></p>',

		'email' =>	'<p class="comment-form-email"><label for="email">' . __( 'Email', 'roseta' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
					'<em><input id="email" placeholder="'. esc_attr__( 'Email', 'roseta' ) . '*" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"  maxlength="100" aria-describedby="email-notes"' . $aria_req . ' /></em></p>',

		'url' =>	'<p class="comment-form-url"><label for="url">' . __( 'Website', 'roseta' ) . '</label>' .
					'<em><input id="url" placeholder="'. esc_attr__( 'Website', 'roseta' ) .'" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
					'" size="30"  maxlength="200" /></em></p>',
		'cookies' => '<p class="comment-form-cookies-consent"><label for="wp-comment-cookies-consent">' .
   	                  '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" />' .
 	                   __( 'Save my name, email, and site URL in my browser for next time I post a comment.', 'roseta' ) . '</label></p>',

	);

	return $arg;
} // roseta_comments_form()

/* Edit comments form textarea: removed label and replaced it with a placeholder */
function roseta_comments_form_textarea( $arg ) {
	$arg = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'roseta' ) .
			'</label><em><textarea placeholder="'. esc_attr_x( 'Comment', 'noun', 'roseta' ) .'" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
			'</textarea></em></p>';

	return $arg;
} // roseta_comments_form_textarea()

/* Hooks are located in cryout_master_hook() in core.php */

/* FIN */
