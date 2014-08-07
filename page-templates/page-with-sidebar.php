<?php
/**
 * Template name: Page With Sidebar
 * 
 * The template for displaying all pages with a sidebar
 *
 * @package Ativista
 */

get_header(); ?>

	<div class="medium-8 columns">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' );

					if( get_theme_mod('quizumba_display_fb_comments') == 1 )
					{  ?>
					<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-colorscheme="light" data-width="100%"></div>

				<?php }
				endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .medium-8 .columns -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
