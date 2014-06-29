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

	// Branding section
    $wp_customize->add_section( 'ativista_branding', array(
        'title'    => __( 'Branding', 'ativista' ),
        'priority' => 30,
    ) );
    
    // Branding section: logo uploader
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
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ativista_customize_preview_js() {
	wp_enqueue_script( 'ativista_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ativista_customize_preview_js' );
