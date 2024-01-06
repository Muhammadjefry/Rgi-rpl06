/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});

   	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	// Click event to scroll to top.
	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 500 );
		return false;
	});
});

function coaching_institute_open() {
	jQuery(".sidenav").addClass('show');
}
function coaching_institute_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function coaching_institute_menuAccessibility() {
	var links, i, len,
	    coaching_institute_menu = document.querySelector( '.nav-menu' ),
	    coaching_institute_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let coaching_institute_focusableElements = 'button, a, input';
	let coaching_institute_firstFocusableElement = coaching_institute_iconToggle; // get first element to be focused inside menu
	let coaching_institute_focusableContent = coaching_institute_menu.querySelectorAll(coaching_institute_focusableElements);
	let coaching_institute_lastFocusableElement = coaching_institute_focusableContent[coaching_institute_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! coaching_institute_menu ) {
    	return false;
	}

	links = coaching_institute_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === coaching_institute_firstFocusableElement) {
		        coaching_institute_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === coaching_institute_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	coaching_institute_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    coaching_institute_menuAccessibility();
  	});
});