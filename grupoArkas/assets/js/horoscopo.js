$(function() {

	var $el = $( '#baraja-el' ); baraja = $el.baraja();

	baraja.fan( {
		speed : 800,
		easing : 'ease-out',
		range : 20 + ($(document).width() / 40),
		direction : 'right',
		origin : { x : 50, y : 200 },
		center : true,
		translation: 0
	} );

	$( '#nav-prev' ).on( 'click', function( event ) {

		baraja.previous();
	
	} );

	$( '#nav-next' ).on( 'click', function( event ) {

		baraja.next();
	
	} );

	$( '#nav-circle' ).on( 'click', function( event ) {

		baraja.fan( {
			speed : 800,
			easing : 'ease-out',
			range : 360,
			direction : 'right',
			origin : { x : 50, y : 90 },
			center : false
		} );	
	
	} );

	$( '#nav-shell' ).on( 'click', function( event ) {

		baraja.fan( {
			speed : 800,
			easing : 'ease-out',
			range : 330,
			direction : 'right',
			origin : { x : 50, y : 120 },
			center : true
		} );
	
	} );

});
