<?php
/**
 * Ativista Theme Customizer
 *
 * @package Ativista
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ativista_customize_register( $wp_customize ) {

	/**
     * Customize Image Reloaded Class
     *
     * Extend WP_Customize_Image_Control allowing access to uploads made within
     * the same context
     * 
     */
    class My_Customize_Image_Reloaded_Control extends WP_Customize_Image_Control {
        /**
         * Constructor.
         *
         * @since 3.4.0
         * @uses WP_Customize_Image_Control::__construct()
         *
         * @param WP_Customize_Manager $manager
         */
        public function __construct( $manager, $id, $args = array() ) {
                parent::__construct( $manager, $id, $args );
        }
        
        /**
        * Search for images within the defined context
        * If there's no context, it'll bring all images from the library
        * 
        */
        public function tab_uploaded() {
            $my_context_uploads = get_posts( array(
                'post_type'  => 'attachment',
                'meta_key'   => '_wp_attachment_context',
                'meta_value' => $this->context,
                'orderby'    => 'post_date',
                'nopaging'   => true,
            ) );
            
            ?>
            
            <div class="uploaded-target"></div>
            
            <?php
            if ( empty( $my_context_uploads ) )
                return;
            
            foreach ( (array) $my_context_uploads as $my_context_upload ) {
                $this->print_tab_image( esc_url_raw( $my_context_upload->guid ) );
            }
        }
    }

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*
     * Branding Section  
     */
    $wp_customize->add_section( 'ativista_branding', array(
        'title'    => __( 'Branding', 'ativista' ),
        'priority' => 30,
    ) );
    
    // Logo uploader
    $wp_customize->add_setting( 'ativista_logo', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback' => 'ativista_get_customizer_logo_size'
    ) );
        
    $wp_customize->add_control( new My_Customize_Image_Reloaded_Control( $wp_customize, 'ativista_logo', array(
        'label'     => __( 'Logo', 'ativista' ),
        'section'   => 'ativista_branding',
        'settings'  => 'ativista_logo',
        'context'   => 'ativista-custom-logo'
    ) ) );

    /*
     * Color Section  
     */
    
    // Link color
    $wp_customize->add_setting( 'ativista_link_color', array(
        'default'   => '#e7642c',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ativista_link_color', array(
        'label'      => __( 'Link Color', 'ativista' ),
        'section'    => 'colors',
        'setting'   => 'ativista_link_color'
    ) ) );

    // Main color
    $wp_customize->add_setting( 'ativista_main_color', array(
        'default'   => '#ffd01d',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ativista_main_color', array(
        'label'      => __( 'Main Color', 'ativista' ),
        'section'    => 'colors',
        'setting'   => 'ativista_main_color'
    ) ) );

    // Secondary color
    $wp_customize->add_setting( 'ativista_secondary_color', array(
        'default'   => '#008497',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ativista_secondary_color', array(
        'label'      => __( 'Secondary Color', 'ativista' ),
        'section'    => 'colors',
        'setting'   => 'ativista_secondary_color'
    ) ) );

    // Featured front page panel color
    $wp_customize->add_setting( 'ativista_front_page_color', array(
        'default'   => '#e7642c',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ativista_front_page_color', array(
        'label'      => __( 'Featured Front Page Color', 'ativista' ),
        'section'    => 'colors',
        'setting'   => 'ativista_front_page_color'
    ) ) );

    /*
     * Footer Section  
     */
    $wp_customize->add_section( 'ativista_footer', array(
        'title'    => __( 'Footer', 'ativista' ),
        'priority' => 60,
    ) );
    
    // Footer text
    $wp_customize->add_setting( 'ativista_footer_text', array(
        'default'       => get_option( 'name' ),
        'capability'    => 'edit_theme_options',
        'transport'     => 'postMessage'
    ) );

    $wp_customize->add_control( 'ativista_footer_text', array(
        'label'    => __( 'Footer Text', 'ativista' ),
        'section'  => 'ativista_footer',
        'settings' => 'ativista_footer_text'
    ) );

    /*
     * Facebook Section  
     */
    $wp_customize->add_section( 'ativista_facebook', array(
        'title'    => __( 'Facebook', 'ativista' ),
        'priority' => 70,
        'description' => 'É necessário preencher o campo abaixo com o seu <strong>app ID</strong> do Facebook. <a href="https://developers.facebook.com/docs/wordpress/register-facebook-application" target="_blank">Saiba como criar um aplicativo</a> e então insira o seu ID corretamente no campo seguinte.',
    ) );
    
    // Footer text
    $wp_customize->add_setting( 'ativista_facebook_appid', array(
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'ativista_sanitize_facebook_appid',
    ) );

    $wp_customize->add_control( 'ativista_facebook_appid', array(
        'label'    => _x( 'App ID', 'Facebook App ID', 'ativista' ),
        'section'  => 'ativista_facebook',
        'settings' => 'ativista_facebook_appid'
    ) );
    
    // Comments FB
    $wp_customize->add_section( 'ativista_fb_comments', array(
    		'title'    => __( 'Comentários via Facebook', 'ativista' ),
    		'priority' => 30,
    ) );
    $wp_customize->add_setting( 'ativista_display_fb_comments', array(
    		'capability' => 'edit_theme_options',
    ) );
    
    $wp_customize->add_control( 'ativista_display_fb_comments', array(
    		'label'    => __( 'Exibe a caixa de comentários do Facebook', 'ativista' ),
    		'section'  => 'ativista_fb_comments',
    		'type'     => 'checkbox',
    		'settings' => 'ativista_display_fb_comments'
    ) );

    /**
     * Sanitize Facebook app ID value
     * @param  string $value The app ID value
     * @return string $value The sanitized app ID
     */
    function ativista_sanitize_facebook_appid( $value ) {
        if ( ! empty ( $value ) && is_numeric( $value ) ) {
            return trim( $value );
        }
        else {
            return '';
        }
    }
}
add_action( 'customize_register', 'ativista_customize_register' );

/**
 * Get 'ativista_logo' ID and use it to define the default logo size
 * 
 * @param  string $value The attachment guid, which is the full imagem URL
 * @return string $value The new image size for 'ativista_logo'
 */
function ativista_get_customizer_logo_size( $value ) {
    global $wpdb;

    if ( ! is_numeric( $value ) ) {
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'attachment' AND guid = %s ORDER BY post_date DESC LIMIT 1;", $value ) );
        if ( ! is_wp_error( $attachment_id ) && wp_attachment_is_image( $attachment_id ) )
            $value = $attachment_id;
    }

    $image_attributes = wp_get_attachment_image_src( $value, 'archive' );
    $value = $image_attributes[0];

    return $value;
}

/**
 * This will output the custom WordPress settings to the live theme's WP head.
 * 
 * Used for inline custom CSS
 *
 * @since Ativista 1.0
 */
function ativista_customize_css() {
    ?>
    <!-- Customizer options -->
    <style type="text/css">
        <?php
        $link_color = get_theme_mod( 'ativista_link_color' );
        if ( ! empty( $link_color ) ) : ?>
            .site-content a,
            .site-content a:visited,
            .site-content a:hover,
            .site-content a:active,
            .site-content a:focus,
            .site-footer a:hover {
                color: <?php echo $link_color; ?>
            }
        <?php endif; ?>

        <?php
        $main_color = get_theme_mod( 'ativista_main_color' );
        if ( ! empty( $main_color ) ) : ?>
            .main-navigation a,
            .text-box,
            .widget,
            .site-footer {
                background-color: <?php echo $main_color; ?>
            }
        <?php endif; ?>

        <?php
        $secondary_color = get_theme_mod( 'ativista_secondary_color' );
        if ( ! empty( $secondary_color ) ) : ?>
            .main-navigation a,
            .widget-title,
            .site-footer a,
            .entry-title,
            .entry-title a {
                color: <?php echo $secondary_color; ?> !important;
            }

            button,
            .button,
            .content-button,
            input[type="button"],
            input[type="reset"],
            input[type="submit"] {
                background-color: <?php echo $secondary_color; ?>
            }
        <?php endif; ?>

        <?php
        $front_page_color = get_theme_mod( 'ativista_front_page_color' );
        if ( ! empty( $front_page_color ) ) : ?>
            .site-lead .entry-content {
                background-color: <?php echo $front_page_color; ?>
            }
        <?php endif; ?>
    </style> 
    <!-- / Customizer options -->
    <?php
}
add_action( 'wp_head', 'ativista_customize_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ativista_customize_preview_js() {
	wp_enqueue_script( 'ativista_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ativista_customize_preview_js' );
