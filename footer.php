<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ativista
 */
?>
		
	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
			<div class="medium-6 columns">
				<div class="site-info">
					<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div><!-- .site-info -->
			</div><!-- .medium-6 .columns -->
			
			<div class="medium-6 columns">
				<div class="site-social">
					<?php
		            // Social networks & RSS feed
					$social = get_option( 'campanha_social_networks' );
					if ( isset( $social ) && ! empty( $social ) ) :
						foreach ( $social as $key => $value ) :
							if ( ! empty( $value) ) : ?>
								<a class="icon icon-<?php echo $key; ?> social-link social-link-<?php echo $key; ?>" href="<?php echo esc_url( $value ); ?>"><span class="screen-reader-text"><?php echo $key; ?></span></a>
							<?php
							endif;
						endforeach;
					endif;
					?>
					<a class="icon icon-rss social-link social-link-rss" href="<?php bloginfo( 'rss2_url' ); ?>"><span class="screen-reader-text"><abbr title="Really Simple Syndication">RSS</abbr></span></a>
				</div><!-- .site-social -->
			</div><!-- .medium-6 .columns -->
		</div><!-- .row -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
