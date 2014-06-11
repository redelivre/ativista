<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Ativista
 */

get_header(); ?>

	<div class="medium-8 medium-centered columns">
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
				?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .medium-8 .medium-centered .columns -->

<?php get_footer(); ?>