/* Contains the "Load More Posts" functionality */
jQuery( document ).ready( function( $ ) {
	var next_page = parseInt( mt_load_more.current_page ) + 1;
	var max_pages = parseInt( mt_load_more.max_pages );
	
	if ( next_page <= max_pages ) {
		$( '.navigation' ).html( '<a class="mt_load_more" href="#">' + mt_load_more.main_text + '</a><img class="mt_load_more_img" style="display: none;" src="' + mt_load_more.loading_img + '" alt="Loading..." />' );
	}
	
	var mt_ajax_load_posts = function() {
		//Begin Ajax
		$.post( mt_load_more.ajaxurl, { action: 'load_posts', next_page: next_page }, function( response ) {
			next_page = response.next_page;
			max_pages = response.max_pages;
			
			//Append the HTML
			var html = $.parseHTML( response.html );
			html = $( html ).filter( '.post' );
			$( '#content .type-post:last' ).after( html );
			
			//Enable Metroshare
			if ( $.isFunction( jQuery.fn.metroshare ) ) {
				$( html ).metroshare();
			}
			
			//If the next page exceeds the number of pages available, get rid of the navigation
			if ( next_page > max_pages ) {
				$( '.navigation' ).html( '' );
			}
			
			//Fade out loading img and fade in loading text
			$( '.mt_load_more_img' ).fadeOut( 'slow', function() {
				$( '.mt_load_more' ).fadeIn( 'slow' );
			} );
		}, 'json' );
	};
	
	//Clicking the load more button
	$( '.navigation' ).on( 'click', 'a.mt_load_more', function( e ) {
		e.preventDefault();
		
		$( '.mt_load_more' ).fadeOut( 'slow', function() {
			$( '.mt_load_more_img' ).fadeIn( 'slow', function() {
				mt_ajax_load_posts();
			} );
		} );
		
		
	} );
} );