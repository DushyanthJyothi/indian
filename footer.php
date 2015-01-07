<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Indian
 *
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'indian' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'indian' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme %1$s by %2$s.', 'indian' ), '<a href="https://github.com/DushyanthJyothi/indian">Indian</a>', '<a href="http://dushi.co.uk/" rel="designer">Dushyanth Jyothi</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>


