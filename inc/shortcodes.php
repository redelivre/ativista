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
	return '<span class="content-button">' . do_shortcode( $content ) . '</span>';
}
add_shortcode( 'button', 'ativista_content_button' );

function ativista_share_twitter( $atts, $content = null ) {
	$a = shortcode_atts( array(
	    'text' => ''
	), $atts );

	if ( ! empty ( $atts['text'] ) ) {
		$twitter_text = $atts['text'] . ' ' . wp_get_shortlink();
	}
	else {
		$twitter_text = wp_get_shortlink();
	}

	return '<a href="https://twitter.com/intent/tweet?text='. $twitter_text . ' " class="content-button content-button-twitter icon-twitter" target="_blank">' . do_shortcode( $content ) . '</a>';
}
add_shortcode( 'twitter', 'ativista_share_twitter' );

function ativista_share_facebook( $atts, $content = null ) {
	$a = shortcode_atts( array(
	    'text' => 'default'
	), $atts );

	return '<a href="https://www.facebook.com/sharer/sharer.php?u='. get_permalink() . ' " class="content-button content-button-twitter icon-facebook" target="_blank">' . do_shortcode( $content ) . '</a>';
}
add_shortcode( 'facebook', 'ativista_share_facebook' );