<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ativista
 */
?>
		</div><!-- .row -->
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'ativista' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'ativista' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'ativista' ), 'Ativista', '<a href="http://ethymos.com.br" rel="designer">Ethymos</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- .row -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
