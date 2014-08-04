<?php
/**
 * The template for displaying all pages with a sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Ativista
 */

get_header(); ?>

	<div class="medium-7 medium-centered columns">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-colorscheme="light" data-width="100%"></div>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .medium-7 .medium-centered .columns -->

<?php get_footer(); ?>
