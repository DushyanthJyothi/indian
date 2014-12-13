<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package indian
 */

if ( ! function_exists( 'indian_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function indian_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'indian' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( _x( '<span class="meta-nav screen-reader-text">&larr;</span>', 'indian' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( _x( 'Newer posts <span class="meta-nav screen-reader-text">&rarr;</span>', 'indian' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;



if ( ! function_exists( 'indian_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function indian_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'indian' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav screen-reader-text">&larr;</span>', 'Previous post link', 'sorbet' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '<span class="meta-nav screen-reader-text">&rarr;</span>', 'Next post link',     'sorbet' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;



if ( ! function_exists( 'indian_image_nav' ) ) :
/**
 * Display navigation to next/previous images when applicable.
 */
function indian_image_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	?>
	<nav class="navigation image-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Image navigation', 'indian' ); ?></h1>
		<div class="nav-links">
			<div class="nav-previous">
				<?php previous_image_link(false, _x( '<span class="meta-nav screen-reader-text">&larr;</span>', 'indian' ) );?>
			</div>
			<div class="nav-next">
				<?php next_image_link(false, _x( '<span class="meta-nav screen-reader-text">&rarr;</span>', 'indian' ) );?>
			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'indian_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current posted-on/time and author.
 */
function indian_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ) 
	);
	printf( __( '<span class="posted-on">%1$s</span>', 'indian' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);
}
endif;


if ( ! function_exists( 'indian_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current posted-on/time and author.
 */
function indian_posted_by() {
	printf( __( '<span class="byline">%1$s</span>', 'indian' ),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author_meta( 'display_name' ) )
		)
	);
}
endif;


if ( ! function_exists( 'indian_image_full_size_link' ) ) :
/**
 * Gets image size when showing as imgae-attachment in image.php page
 */
function indian_image_full_size_link() {
	$metadata = wp_get_attachment_metadata();
	printf( __( '<span class="image-full-size-link">%1$s</span>', 'indian' ),
		sprintf( '<a href="%1$s" rel="bookmark">Full size: %2$s&times;%3$s</a>',
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		)
	);
}
endif;

if ( ! function_exists( 'indian_parent_post_link' ) ) :
/**
 * Prints parents post link, used in image.php
 */
function indian_parent_post_link() {
	$parent_post_link = get_post( get_post()->post_parent );
	printf( __( '<span class="parent-post-link">%1$s</span>', 'indian' ),
		sprintf( '<a href="%1$s" rel="gallery">%2$s</a>',
			esc_url( get_permalink( $parent_post_link ) ),
			get_the_title( $parent_post_link )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function indian_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'indian_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'indian_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so indian_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so indian_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in indian_categorized_blog.
 */
function indian_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'indian_categories' );
}
add_action( 'edit_category', 'indian_category_transient_flusher' );
add_action( 'save_post',     'indian_category_transient_flusher' );


if ( ! function_exists( 'indian_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function indian_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$args['avatar_size'] = 80;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'indian' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'indian' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			
			<div class="comment-meta-author">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) { echo '<span class="avatar-wrapper">' . get_avatar( $comment, $args['avatar_size'] ) . '</span>'; } ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'indian' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'indian' ); ?></p>
				<?php endif; ?>
			</div><!-- .comment-meta-author -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<div class="comment-metadata">
				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<div class="reply">',
						'after'     => '</div>',
					) ) );
				?>
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<time datetime="<?php comment_time( 'c' ); ?>">
						<span class="post-date"><?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'indian' ), get_comment_date(), get_comment_time() ); ?></span>
					</time>
				</a>
				<?php edit_comment_link( __( 'Edit', 'indian' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .comment-metadata -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for indian_comment()

