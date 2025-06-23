/**
 * Kawaii Button Block JavaScript
 * 
 * Handles interactive features for the Kawaii Button block
 */

(function($) {
    'use strict';

    /**
     * Initialize button interactions
     */
    function initKawaiiButtons() {
        $('.kawaii-button').each(function() {
            const $button = $(this);
            
            // Add click ripple effect
            $button.on('click', function(e) {
                const $ripple = $('<span class="kawaii-button__ripple"></span>');
                const buttonOffset = $button.offset();
                const x = e.pageX - buttonOffset.left;
                const y = e.pageY - buttonOffset.top;
                
                $ripple.css({
                    left: x + 'px',
                    top: y + 'px'
                });
                
                $button.append($ripple);
                
                setTimeout(() => {
                    $ripple.remove();
                }, 600);
            });
            
            // Add hover animations
            $button.hover(
                function() {
                    $(this).addClass('kawaii-button--hovered');
                },
                function() {
                    $(this).removeClass('kawaii-button--hovered');
                }
            );
        });
    }

    /**
     * Validate button attributes
     */
    function validateButtonAttributes($button) {
        const validStyles = ['primary', 'secondary', 'ghost', 'round'];
        const validSizes = ['small', 'medium', 'large'];
        
        const currentStyle = $button.attr('data-style');
        const currentSize = $button.attr('data-size');
        
        if (currentStyle && !validStyles.includes(currentStyle)) {
            $button.attr('data-style', 'primary');
        }
        
        if (currentSize && !validSizes.includes(currentSize)) {
            $button.attr('data-size', 'medium');
        }
    }

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        initKawaiiButtons();
        
        // Validate all buttons on page
        $('.kawaii-button').each(function() {
            validateButtonAttributes($(this));
        });
    });

    // Re-initialize for dynamically added content
    $(document).on('DOMNodeInserted', function() {
        initKawaiiButtons();
    });

})(jQuery);