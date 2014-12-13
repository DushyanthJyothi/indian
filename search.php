<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Indian
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'indian' ), '<span>' . get_search_query() . '</span>' ); ?> from search.php</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>
				<!--
					Include the post format-specific template for the content. If you want to
					use this in a child theme, then include a file called called content-___.php
					(where ___ is the post format) and that will be used instead.
				-->
				<?php get_template_part( 'content',  get_post_format() ); ?>


			<?php endwhile; ?>

			<?php indian_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
