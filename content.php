<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Indian
 *
 */

$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-format-type">
			<?php if ( $format && in_array( $format, $formats[0] ) ): ?>
				<a class="entry-format-link" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'indian' ), get_post_format_string( $format ) ) ); ?>">
					<span class="screen-reader-text"><?php echo get_post_format_string( $format ); ?></span>
				</a>
			<?php endif; ?> 
		</div><!-- .entry-format-type -->		
		<div class="entry-meta-post">
			<?php indian_posted_on(); ?>
		</div><!-- .entry-meta-post -->		
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="entry-meta-author">
			<?php indian_posted_by(); ?>
		</div><!-- .entry-meta-author -->
	</header><!-- .entry-header -->

	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('thumbnail'); ?></a>
		</figure>
	<?php endif; ?>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'indian' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>', 'link_before' => '<span class="active-link">', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<footer class="entry-footer">
		<?php if ( is_single() ) : // Hide if not displayed as a single post ?>		
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'indian' ) );
				if ( $categories_list && indian_categorized_blog() ) :
			?>
			<span class="cat-links"><?php printf( __( '%1$s', 'indian' ), $categories_list ); ?></span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'indian' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links"><?php printf( __( '%1$s', 'indian' ), $tags_list ); ?></span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if is_single ?>
	
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?><span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'indian' ), __( '1 Comment', 'indian' ), __( '% Comments', 'indian' ) ); ?></span><?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'indian' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->