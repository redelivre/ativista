<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Ativista
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ativista' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row">
			<div class="medium-6 columns">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>

			<div class="medium-6 columns">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Primary Menu', 'ativista' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div><!-- .row -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if ( is_front_page() ) : ?>
		<div class="site-lead">
	      <img src="http://placehold.it/1600x550/eeeeee/dddddd&text=Imagem" />

	       <div class="row">
		      <div class="medium-6 large-6 medium-centered large-right columns">
		      	<div class="mc-form">
			        <h3 class="subheader">Eu quero fazer parte da campanha.</h3>
			        <form>
			          	<div class="panel">
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
							<a href="#" class="button secondary expand">Registrar</a>
			          	</div>
				    </form>
				</div><!-- .mc-form -->
		       </div>
		    </div>
	    </div>
		<?php endif; ?>

		<div class="row">
