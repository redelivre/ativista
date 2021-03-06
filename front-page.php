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
			    		<figure class="entry-image show-for-medium-up">
				     		<?php the_post_thumbnail( 'featured-main' ); ?>
				    		
				    		<?php if ( $image_caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
				    			<figcaption class="entry-image-caption"><?php echo $image_caption; ?></figcaption>
				     		<?php endif; ?>
			     		</figure>
			    	<?php endif; ?>
					<?php
					$content = get_the_content(); 
					if(!empty($content) || is_active_sidebar( 'sidebar-mcform-front-page' ) )
					{?>
			    	<div class="row">
				    	<div class="entry-content">
							<?php echo $content; ?>
							<?php
	                        if ( is_active_sidebar( 'sidebar-mcform-front-page' ) ) {
	                            dynamic_sidebar( 'sidebar-mcform-front-page' );
	                        }
							?>
						</div><!-- .entry-content -->
					</div><?php
					}?>
			    </div><!-- .site-lead -->

				<?php if ( is_active_sidebar( 'sidebar-front-page' ) ) : ?>
				<div class="row">
			        <div id="tertiary" class="widget-area widget-area--front-page clearfix" role="complementary">
			                <?php dynamic_sidebar( 'sidebar-front-page' ); ?>
			        </div><!-- .widget-area--footer -->
			    </div><!-- .row -->
	        <?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
