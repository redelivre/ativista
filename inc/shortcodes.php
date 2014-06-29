<?php
/**
 * Ativista Custom Shortcodes
 *
 * @package Ativista
 */

function ativista_text_box( $atts, $content = null ) {
	return '<p class="text-box">' . do_shortcode( $content ) . '</p>';
}
add_shortcode( 'box', 'ativista_text_box' );

function ativista_content_button( $atts, $content = null ) {
	$a = shortcode_atts( array(
	    'title' => 'My Title',
	    'foo' => 123,
	), $atts );

	return '<span class="content-button">' . do_shortcode( $content ) . '</span>';
}
add_shortcode( 'button', 'ativista_content_button' );