/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var textwp_secondary_container, textwp_secondary_button, textwp_secondary_menu, textwp_secondary_links, textwp_secondary_i, textwp_secondary_len;

    textwp_secondary_container = document.getElementById( 'textwp-secondary-navigation' );
    if ( ! textwp_secondary_container ) {
        return;
    }

    textwp_secondary_button = textwp_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof textwp_secondary_button ) {
        return;
    }

    textwp_secondary_menu = textwp_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof textwp_secondary_menu ) {
        textwp_secondary_button.style.display = 'none';
        return;
    }

    textwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === textwp_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        textwp_secondary_menu.className += ' nav-menu';
    }

    textwp_secondary_button.onclick = function() {
        if ( -1 !== textwp_secondary_container.className.indexOf( 'textwp-toggled' ) ) {
            textwp_secondary_container.className = textwp_secondary_container.className.replace( ' textwp-toggled', '' );
            textwp_secondary_button.setAttribute( 'aria-expanded', 'false' );
            textwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            textwp_secondary_container.className += ' textwp-toggled';
            textwp_secondary_button.setAttribute( 'aria-expanded', 'true' );
            textwp_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    textwp_secondary_links    = textwp_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( textwp_secondary_i = 0, textwp_secondary_len = textwp_secondary_links.length; textwp_secondary_i < textwp_secondary_len; textwp_secondary_i++ ) {
        textwp_secondary_links[textwp_secondary_i].addEventListener( 'focus', textwp_secondary_toggleFocus, true );
        textwp_secondary_links[textwp_secondary_i].addEventListener( 'blur', textwp_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function textwp_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'textwp-focus' ) ) {
                    self.className = self.className.replace( ' textwp-focus', '' );
                } else {
                    self.className += ' textwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( textwp_secondary_container ) {
        var touchStartFn, textwp_secondary_i,
            parentLink = textwp_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, textwp_secondary_i;

                if ( ! menuItem.classList.contains( 'textwp-focus' ) ) {
                    e.preventDefault();
                    for ( textwp_secondary_i = 0; textwp_secondary_i < menuItem.parentNode.children.length; ++textwp_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[textwp_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[textwp_secondary_i].classList.remove( 'textwp-focus' );
                    }
                    menuItem.classList.add( 'textwp-focus' );
                } else {
                    menuItem.classList.remove( 'textwp-focus' );
                }
            };

            for ( textwp_secondary_i = 0; textwp_secondary_i < parentLink.length; ++textwp_secondary_i ) {
                parentLink[textwp_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( textwp_secondary_container ) );
} )();


( function() {
    var textwp_primary_container, textwp_primary_button, textwp_primary_menu, textwp_primary_links, textwp_primary_i, textwp_primary_len;

    textwp_primary_container = document.getElementById( 'textwp-primary-navigation' );
    if ( ! textwp_primary_container ) {
        return;
    }

    textwp_primary_button = textwp_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof textwp_primary_button ) {
        return;
    }

    textwp_primary_menu = textwp_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof textwp_primary_menu ) {
        textwp_primary_button.style.display = 'none';
        return;
    }

    textwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === textwp_primary_menu.className.indexOf( 'nav-menu' ) ) {
        textwp_primary_menu.className += ' nav-menu';
    }

    textwp_primary_button.onclick = function() {
        if ( -1 !== textwp_primary_container.className.indexOf( 'textwp-toggled' ) ) {
            textwp_primary_container.className = textwp_primary_container.className.replace( ' textwp-toggled', '' );
            textwp_primary_button.setAttribute( 'aria-expanded', 'false' );
            textwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            textwp_primary_container.className += ' textwp-toggled';
            textwp_primary_button.setAttribute( 'aria-expanded', 'true' );
            textwp_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    textwp_primary_links    = textwp_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( textwp_primary_i = 0, textwp_primary_len = textwp_primary_links.length; textwp_primary_i < textwp_primary_len; textwp_primary_i++ ) {
        textwp_primary_links[textwp_primary_i].addEventListener( 'focus', textwp_primary_toggleFocus, true );
        textwp_primary_links[textwp_primary_i].addEventListener( 'blur', textwp_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function textwp_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'textwp-focus' ) ) {
                    self.className = self.className.replace( ' textwp-focus', '' );
                } else {
                    self.className += ' textwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( textwp_primary_container ) {
        var touchStartFn, textwp_primary_i,
            parentLink = textwp_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, textwp_primary_i;

                if ( ! menuItem.classList.contains( 'textwp-focus' ) ) {
                    e.preventDefault();
                    for ( textwp_primary_i = 0; textwp_primary_i < menuItem.parentNode.children.length; ++textwp_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[textwp_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[textwp_primary_i].classList.remove( 'textwp-focus' );
                    }
                    menuItem.classList.add( 'textwp-focus' );
                } else {
                    menuItem.classList.remove( 'textwp-focus' );
                }
            };

            for ( textwp_primary_i = 0; textwp_primary_i < parentLink.length; ++textwp_primary_i ) {
                parentLink[textwp_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( textwp_primary_container ) );
} )();