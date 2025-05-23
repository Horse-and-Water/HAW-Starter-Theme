/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const hamburger = document.getElementById( 'haw-hamburger' );

	// Return early if the hamburger doesn't exist.
	if ( 'undefined' === typeof hamburger ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu hamburger toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		hamburger.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the hamburger button is clicked.
	hamburger.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( hamburger.getAttribute( 'aria-expanded' ) === 'true' ) {
			hamburger.setAttribute( 'aria-expanded', 'false' );
		} else {
			hamburger.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			hamburger.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus(event) {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );


// Wait for document load
document.addEventListener("DOMContentLoaded", function() {
	/**
	 * Add or remove '.scrolled' class on masthead when page is scrolled
	 */
	const masthead = document.getElementById( 'masthead' );
	let lastKnownScrollPosition = window.scrollY;
	let debounceTimeout;
   
	const updateIsScrolled = (lastKnownScrollPosition) => {
		lastKnownScrollPosition >= 50 ? masthead.classList.add('scrolled') : masthead.classList.remove('scrolled');
	}
   
	document.addEventListener("scroll", () => {
   
		// If there's a debounce timeout set, clear it
		if (debounceTimeout) {
		  clearTimeout(debounceTimeout);
		}
	  
		// Set a new debounce timeout to limit function calls
		debounceTimeout = setTimeout(() => {
		  lastKnownScrollPosition = window.scrollY;
		  updateIsScrolled(lastKnownScrollPosition);
		}, 100); // Adjust the debounce delay (in milliseconds) as needed
   
	});
   
	// call on page load to add class to menu if already part way down the page
	updateIsScrolled(lastKnownScrollPosition);

});
