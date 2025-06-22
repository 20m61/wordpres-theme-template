/**
 * Navigation JavaScript
 * 
 * Handles theme navigation functionality.
 */

(function() {
    'use strict';

    // Mobile menu toggle functionality
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.main-navigation');

    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function() {
            const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !expanded);
            navigation.classList.toggle('toggled');
        });
    }

    // Dropdown menu handling
    const menuItems = document.querySelectorAll('.main-navigation .menu-item-has-children > a');
    
    menuItems.forEach(function(item) {
        item.addEventListener('click', function(e) {
            if (window.innerWidth < 768) {
                e.preventDefault();
                const submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.classList.toggle('show');
                }
            }
        });
    });

})();