/**
 * Kawaii Card Block JavaScript
 * 
 * Handles interactive features for the Kawaii Card block
 */

(function($) {
    'use strict';

    /**
     * Initialize card interactions
     */
    function initKawaiiCards() {
        $('.kawaii-card').each(function() {
            const $card = $(this);
            
            // Add hover effects
            $card.hover(
                function() {
                    $(this).addClass('kawaii-card--hovered');
                },
                function() {
                    $(this).removeClass('kawaii-card--hovered');
                }
            );
            
            // Handle card click if it has a link
            const $link = $card.find('.kawaii-card__link').first();
            if ($link.length) {
                $card.css('cursor', 'pointer');
                $card.on('click', function(e) {
                    // Don't trigger if clicking on a button or other interactive element
                    if (!$(e.target).is('button, a, input, textarea, select')) {
                        window.location.href = $link.attr('href');
                    }
                });
            }
            
            // Animate card entrance
            if (isElementInViewport($card[0])) {
                $card.addClass('kawaii-card--visible');
            }
        });
    }

    /**
     * Initialize card animations on scroll
     */
    function initCardAnimations() {
        const $cards = $('.kawaii-card:not(.kawaii-card--visible)');
        
        $cards.each(function() {
            const $card = $(this);
            
            if (isElementInViewport($card[0])) {
                $card.addClass('kawaii-card--visible');
            }
        });
    }

    /**
     * Check if element is in viewport
     */
    function isElementInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    /**
     * Initialize card image lazy loading
     */
    function initCardImageLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            $('.kawaii-card img[data-src]').each(function() {
                imageObserver.observe(this);
            });
        }
    }

    /**
     * Handle card image errors
     */
    function initCardImageErrorHandling() {
        $('.kawaii-card img').on('error', function() {
            const $img = $(this);
            const $container = $img.closest('.kawaii-card__image');
            
            // Hide image container if image fails to load
            $container.hide();
            
            // Optionally show a placeholder
            if (!$container.find('.kawaii-card__image-placeholder').length) {
                $container.append('<div class="kawaii-card__image-placeholder">🖼️</div>');
            }
        });
    }

    /**
     * Validate card attributes
     */
    function validateCardAttributes($card) {
        const validStyles = ['default', 'minimal', 'cute', 'pastel', 'product'];
        const currentStyle = $card.attr('data-style');
        
        if (currentStyle && !validStyles.includes(currentStyle)) {
            $card.attr('data-style', 'default');
        }
    }

    /**
     * Initialize card accessibility features
     */
    function initCardAccessibility() {
        $('.kawaii-card').each(function() {
            const $card = $(this);
            const $link = $card.find('.kawaii-card__link').first();
            
            if ($link.length) {
                // Add ARIA label if not present
                if (!$card.attr('aria-label') && !$card.attr('aria-labelledby')) {
                    const title = $card.find('.kawaii-card__title').text();
                    if (title) {
                        $card.attr('aria-label', title);
                    }
                }
                
                // Add keyboard navigation
                $card.attr('tabindex', '0');
                $card.on('keydown', function(e) {
                    if (e.keyCode === 13 || e.keyCode === 32) { // Enter or Space
                        e.preventDefault();
                        $link[0].click();
                    }
                });
            }
        });
    }

    /**
     * Initialize card truncation for long content
     */
    function initCardContentTruncation() {
        $('.kawaii-card__content').each(function() {
            const $content = $(this);
            const maxHeight = parseInt($content.css('max-height'), 10);
            
            if (maxHeight && $content[0].scrollHeight > maxHeight) {
                $content.addClass('kawaii-card__content--truncated');
                
                // Add expand button
                const $expandBtn = $('<button class="kawaii-card__expand-btn">Read more</button>');
                $content.after($expandBtn);
                
                $expandBtn.on('click', function() {
                    $content.toggleClass('kawaii-card__content--expanded');
                    $(this).text($content.hasClass('kawaii-card__content--expanded') ? 'Read less' : 'Read more');
                });
            }
        });
    }

    /**
     * Debounce utility function
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Initialize all card functionality
     */
    function initAllCardFeatures() {
        $('.kawaii-card').each(function() {
            validateCardAttributes($(this));
        });
        
        initKawaiiCards();
        initCardImageLazyLoading();
        initCardImageErrorHandling();
        initCardAccessibility();
        initCardContentTruncation();
    }

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        initAllCardFeatures();
        
        // Initialize scroll-based animations
        $(window).on('scroll', debounce(initCardAnimations, 100));
        $(window).on('resize', debounce(initCardAnimations, 250));
    });

    // Re-initialize for dynamically added content
    $(document).on('DOMNodeInserted', function() {
        initAllCardFeatures();
    });

})(jQuery);