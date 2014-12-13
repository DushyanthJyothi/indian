<?php
/**
 * The template for displaying image attachments.
 *
 * This gives greater flexibility to adjust image width.
 *
 * @package Indian
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
					<div class="entry-format-type"></div><!-- .entry-format-type -->							
						<div class="entry-meta-post">
							<?php indian_posted_on(); ?>
						</div><!-- .entry-meta-post -->
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
						<div class="entry-meta-author">
							<?php indian_posted_by(); ?>
						</div><!-- .entry-meta-author -->
						<div class="entry-meta-links">
							<?php indian_image_full_size_link(); ?>
							<?php indian_parent_post_link(); ?>
						</div><!-- .entry-meta-links -->						
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="entry-attachment">
							<div class="attachment">
								<?php indian_the_attached_image(); ?>
							</div><!-- .attachment -->

							<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div><!-- .entry-caption -->
							<?php endif; ?>
						</div><!-- .entry-attachment -->
	
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>', 'link_before' => '<span class="active-link">', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
			
					<footer class="entry-footer">
						<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?><span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'indian' ), __( '1 Comment', 'indian' ), __( '% Comments', 'indian' ) ); ?></span><?php endif; ?>
						<?php edit_post_link( __( 'Edit', 'indian' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			<?php indian_image_nav(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
