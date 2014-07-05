<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ativista
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<div class="site-lead">
			    	<?php if ( has_post_thumbnail() ) : ?>
			    		<figure class="entry-image">
				     		<?php the_post_thumbnail( 'featured-main' ); ?>
				    		
				    		<?php if ( $image_caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
				    			<figcaption class="entry-image-caption"><?php echo $image_caption; ?></figcaption>
				     		<?php endif; ?>
			     		</figure>
			    	<?php endif; ?>
			    </div>

			    <div class="row">
				    <div class="large-5 large-push-7 columns">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'panel' ); ?>>

							<div class="entry-content">
								<?php the_content(); ?>
							      
						      	<div class="mc-form">
							        <form>
										<label>
										  <input type="text" placeholder="Email" />
										</label>
										<label>
										  <input type="text" placeholder="Telefone" />
										</label>
										<label>
										  <input type="text" placeholder="Bairro" />
										</label>
										<label>
										  <input type="text" placeholder="Cidade" />
										</label>
										<a href="#" class="button expand">Registrar</a>
								    </form>
								</div><!-- .mc-form -->

							</div><!-- .entry-content -->

						</article><!-- #post-## -->
					</div><!-- .large-5 .large-push-7  .columns -->
				</div>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
