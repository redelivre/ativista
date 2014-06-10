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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="lead">
	      <img src="http://placehold.it/1350x400/eeeeee/dddddd&text=Imagem" />
	    </div>

		<div class="row">
	      <div class="medium-6 large-6 medium-centered large-centered columns">
	        <h3 class="subheader">Eu quero fazer parte da campanha.</h3>
	       </div>
	    </div>

	    <form>
	      <div class="row">
	        <div class="medium-6 large-6 medium-centered large-centered columns">
	          <div class="panel">
	            <label>Email
	              <input type="text" placeholder="Email" />
	            </label>
	            <label>Telefone
	              <input type="text" placeholder="Telefone" />
	            </label>
	            <label>Bairro
	              <input type="text" placeholder="Bairro" />
	            </label>
	            <label>Cidade
	              <input type="text" placeholder="Cidade" />
	            </label>
	            <a href="#" class="button secondary">Registrar</a>
	          </div>
	        </div>
	      </div>
	    </form>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
