<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Ativista
 */

get_header(); ?>

	<div class="medium-7 medium-centered columns">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php ativista_post_nav(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;

			if( get_theme_mod('ativista_display_fb_comments') == 1 )
				{  ?>
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
			<?php }
				
				endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .medium-7 .medium-centered .columns -->

<?php get_footer(); ?>