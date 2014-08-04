/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Link color
    wp.customize( 'ativista_link_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-content a, .site-content a:hover, .site-content a:visited, .site-footer a:hover' ).css( 'color', to );
        } );
    } );
    // Main color
    wp.customize( 'ativista_main_color', function( value ) {
        value.bind( function( to ) {
            $( '.main-navigation a, .text-box, .widget, .site-footer' ).css( 'background-color', to );
        } );
    } );
    // Secondary color
    wp.customize( 'ativista_secondary_color', function( value ) {
        value.bind( function( to ) {
        	$( '.main-navigation a, .widget-title, .site-footer a' ).css( 'color', to );
            $( 'button, .button, .content-button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( 'background-color', to );
        } );
    } );
    // Front page panel color
    wp.customize( 'ativista_front_page_color', function( value ) {
        value.bind( function( to ) {
            $( '.site-lead .entry-content' ).css( 'background-color', to );
        } );
    } );
	// Footer text
	wp.customize( 'ativista_footer_text', function( value ) {
		value.bind( function( to ) {
			$( '.site-info' ).text( to );
		} );
	} );
} )( jQuery );
