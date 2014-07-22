<?php
/**
 * Ativista functions and definitions
 *
 * @package Ativista
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ativista_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ativista_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ativista, use a find and replace
	 * to change 'ativista' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ativista', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'archive', 362, 150, false );
	add_image_size( 'featured-main', 1920, 550, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ativista' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ativista_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ativista_setup
add_action( 'after_setup_theme', 'ativista_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ativista_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Front Page Widget Area', 'ativista' ),
		'id'            => 'sidebar-front-page',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
        'name'          => __( 'Mc Form Widget Area', 'ativista' ),
        'id'            => 'sidebar-mcform-front-page',
        'description'   => '',
        'before_widget' => '<div class="mc-form">',
        'after_widget'  => '</div><!-- .mc-form -->',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ativista' ),
		'id'            => 'sidebar-general',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ativista_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ativista_scripts() {

	// Normalize
	wp_register_style( 'ativista-normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'ativista-normalize' );

	// Foundation
	wp_register_style( 'ativista-foundation', get_template_directory_uri() . '/css/foundation.min.css' );
	wp_enqueue_style( 'ativista-foundation' );

	// Main stylesheet
	wp_enqueue_style( 'ativista-style', get_stylesheet_uri() );

	// Modernizer Custom Build (only the basics)
	wp_enqueue_script( 'ativista-modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array( 'jquery' ), '2.8.3' );

	wp_enqueue_script( 'ativista-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ativista-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ativista_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom shortcodes for this theme.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add Facebook scripts for the theme
 *
 * @todo Create an option page (or maybe in Customizer) to insert App ID
 */
function ativista_fb_scripts() {
	?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=264414477093872&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<script>
		var siteLeadUrl = "<?php echo get_template_directory_uri() . "/js/site-lead.js" ?>";
		Modernizr.load({
	        test: Modernizr.mq("only screen and (min-width:64.063em)"),
	        yep: siteLeadUrl
		});
	</script>

	<?php
}
add_action( 'wp_footer', 'ativista_fb_scripts' );


