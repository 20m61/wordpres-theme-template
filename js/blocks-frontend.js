/**
 * Kawaii Ultra - Blocks JavaScript
 * Frontend functionality for custom blocks
 */

(function($) {
    'use strict';

    /**
     * Initialize all block functionality
     */
    function initializeBlocks() {
        initializeGalleryLightbox();
        initializeCarouselGallery();
        initializeButtonAnimations();
    }

    /**
     * Initialize gallery lightbox functionality
     */
    function initializeGalleryLightbox() {
        $('.kawaii-gallery--lightbox .kawaii-gallery__link').on('click', function(e) {
            e.preventDefault();
            
            const imageUrl = $(this).attr('href');
            const altText = $(this).find('img').attr('alt') || '';
            
            // Create lightbox
            const lightbox = $('<div>', {
                class: 'kawaii-lightbox',
                html: `
                    <div class="kawaii-lightbox__backdrop"></div>
                    <div class="kawaii-lightbox__content">
                        <img src="${imageUrl}" alt="${altText}" class="kawaii-lightbox__image">
                        <button class="kawaii-lightbox__close" aria-label="Close lightbox">×</button>
                    </div>
                `
            });
            
            $('body').append(lightbox);
            
            // Show lightbox with animation
            setTimeout(() => {
                lightbox.addClass('kawaii-lightbox--active');
            }, 10);
            
            // Close lightbox functionality
            lightbox.find('.kawaii-lightbox__close, .kawaii-lightbox__backdrop').on('click', function() {
                lightbox.removeClass('kawaii-lightbox--active');
                setTimeout(() => {
                    lightbox.remove();
                }, 300);
            });
            
            // Close on escape key
            $(document).on('keydown.kawaii-lightbox', function(e) {
                if (e.keyCode === 27) {
                    lightbox.find('.kawaii-lightbox__close').click();
                    $(document).off('keydown.kawaii-lightbox');
                }
            });
        });
    }

    /**
     * Initialize carousel gallery functionality
     */
    function initializeCarouselGallery() {
        $('.kawaii-gallery--carousel').each(function() {
            const $gallery = $(this);
            const $items = $gallery.find('.kawaii-gallery__item');
            
            if ($items.length <= 1) return;
            
            let currentIndex = 0;
            
            // Add navigation controls
            const $controls = $('<div>', {
                class: 'kawaii-carousel-controls',
                html: `
                    <button class="kawaii-carousel-prev" aria-label="Previous image">‹</button>
                    <div class="kawaii-carousel-dots"></div>
                    <button class="kawaii-carousel-next" aria-label="Next image">›</button>
                `
            });
            
            $gallery.after($controls);
            
            // Add dots
            $items.each(function(index) {
                $controls.find('.kawaii-carousel-dots').append(
                    `<button class="kawaii-carousel-dot ${index === 0 ? 'active' : ''}" data-index="${index}"></button>`
                );
            });
            
            // Navigation functionality
            function goToSlide(index) {
                currentIndex = index;
                const scrollLeft = $items.eq(index).position().left + $gallery.scrollLeft();
                $gallery.animate({ scrollLeft: scrollLeft }, 300);
                
                $controls.find('.kawaii-carousel-dot').removeClass('active');
                $controls.find('.kawaii-carousel-dot').eq(index).addClass('active');
            }
            
            $controls.find('.kawaii-carousel-prev').on('click', function() {
                const newIndex = currentIndex > 0 ? currentIndex - 1 : $items.length - 1;
                goToSlide(newIndex);
            });
            
            $controls.find('.kawaii-carousel-next').on('click', function() {
                const newIndex = currentIndex < $items.length - 1 ? currentIndex + 1 : 0;
                goToSlide(newIndex);
            });
            
            $controls.find('.kawaii-carousel-dot').on('click', function() {
                const index = parseInt($(this).data('index'));
                goToSlide(index);
            });
            
            // Auto-play functionality (optional)
            if ($gallery.data('autoplay')) {
                setInterval(function() {
                    const newIndex = currentIndex < $items.length - 1 ? currentIndex + 1 : 0;
                    goToSlide(newIndex);
                }, 5000);
            }
        });
    }

    /**
     * Initialize button animations and interactions
     */
    function initializeButtonAnimations() {
        $('.kawaii-button').each(function() {
            const $button = $(this);
            
            // Add ripple effect on click
            $button.on('click', function(e) {
                const ripple = $('<span class="kawaii-button-ripple"></span>');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.css({
                    width: size,
                    height: size,
                    left: x,
                    top: y
                });
                
                $button.append(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }

    /**
     * Add CSS for dynamic elements
     */
    function addDynamicStyles() {
        const styles = `
            <style id="kawaii-blocks-dynamic-styles">
                .kawaii-lightbox {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    z-index: 9999;
                    opacity: 0;
                    visibility: hidden;
                    transition: all 0.3s ease;
                }
                
                .kawaii-lightbox--active {
                    opacity: 1;
                    visibility: visible;
                }
                
                .kawaii-lightbox__backdrop {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.8);
                    cursor: pointer;
                }
                
                .kawaii-lightbox__content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    max-width: 90vw;
                    max-height: 90vh;
                }
                
                .kawaii-lightbox__image {
                    max-width: 100%;
                    max-height: 100%;
                    border-radius: 10px;
                    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
                }
                
                .kawaii-lightbox__close {
                    position: absolute;
                    top: -10px;
                    right: -10px;
                    width: 40px;
                    height: 40px;
                    background: #ff69b4;
                    color: white;
                    border: none;
                    border-radius: 50%;
                    font-size: 20px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }
                
                .kawaii-lightbox__close:hover {
                    background: #ff1493;
                    transform: scale(1.1);
                }
                
                .kawaii-carousel-controls {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 1rem;
                    margin-top: 1rem;
                }
                
                .kawaii-carousel-prev,
                .kawaii-carousel-next {
                    background: #ff69b4;
                    color: white;
                    border: none;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    font-size: 18px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }
                
                .kawaii-carousel-prev:hover,
                .kawaii-carousel-next:hover {
                    background: #ff1493;
                    transform: scale(1.1);
                }
                
                .kawaii-carousel-dots {
                    display: flex;
                    gap: 0.5rem;
                }
                
                .kawaii-carousel-dot {
                    width: 10px;
                    height: 10px;
                    border-radius: 50%;
                    border: none;
                    background: #e2e8f0;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }
                
                .kawaii-carousel-dot.active {
                    background: #ff69b4;
                    transform: scale(1.2);
                }
                
                .kawaii-button {
                    position: relative;
                    overflow: hidden;
                }
                
                .kawaii-button-ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    pointer-events: none;
                    transform: scale(0);
                    animation: kawaii-ripple 0.6s linear;
                }
                
                @keyframes kawaii-ripple {
                    to {
                        transform: scale(2);
                        opacity: 0;
                    }
                }
            </style>
        `;
        
        if (!$('#kawaii-blocks-dynamic-styles').length) {
            $('head').append(styles);
        }
    }

    /**
     * Initialize everything when DOM is ready
     */
    $(document).ready(function() {
        addDynamicStyles();
        initializeBlocks();
    });

})(jQuery);