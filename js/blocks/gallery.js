/**
 * Kawaii Gallery Block JavaScript
 * 
 * Handles lightbox, carousel, and masonry functionality
 */

(function($) {
    'use strict';

    /**
     * Lightbox functionality
     */
    function initLightbox() {
        // Create lightbox modal
        const lightboxHTML = `
            <div id="kawaii-lightbox" class="kawaii-lightbox" style="display: none;">
                <div class="kawaii-lightbox__overlay"></div>
                <div class="kawaii-lightbox__content">
                    <img class="kawaii-lightbox__image" src="" alt="">
                    <div class="kawaii-lightbox__caption"></div>
                    <button class="kawaii-lightbox__close">&times;</button>
                    <button class="kawaii-lightbox__prev">&lt;</button>
                    <button class="kawaii-lightbox__next">&gt;</button>
                </div>
            </div>
        `;
        
        if (!$('#kawaii-lightbox').length) {
            $('body').append(lightboxHTML);
        }

        const $lightbox = $('#kawaii-lightbox');
        const $image = $lightbox.find('.kawaii-lightbox__image');
        const $caption = $lightbox.find('.kawaii-lightbox__caption');
        let currentIndex = 0;
        let images = [];

        // Open lightbox
        $('.kawaii-gallery[data-lightbox="true"] .kawaii-gallery__link').on('click', function(e) {
            e.preventDefault();
            
            const $gallery = $(this).closest('.kawaii-gallery');
            images = $gallery.find('.kawaii-gallery__link').map(function() {
                return {
                    src: $(this).attr('href'),
                    caption: $(this).find('.kawaii-gallery__caption').text() || ''
                };
            }).get();
            
            currentIndex = $(this).index('.kawaii-gallery__link');
            showImage(currentIndex);
            $lightbox.fadeIn(300);
        });

        // Close lightbox
        $lightbox.find('.kawaii-lightbox__close, .kawaii-lightbox__overlay').on('click', function() {
            $lightbox.fadeOut(300);
        });

        // Navigation
        $lightbox.find('.kawaii-lightbox__prev').on('click', function() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        });

        $lightbox.find('.kawaii-lightbox__next').on('click', function() {
            currentIndex = (currentIndex + 1) % images.length;
            showImage(currentIndex);
        });

        // Keyboard navigation
        $(document).on('keydown', function(e) {
            if ($lightbox.is(':visible')) {
                switch(e.keyCode) {
                    case 27: // Escape
                        $lightbox.fadeOut(300);
                        break;
                    case 37: // Left arrow
                        $lightbox.find('.kawaii-lightbox__prev').click();
                        break;
                    case 39: // Right arrow
                        $lightbox.find('.kawaii-lightbox__next').click();
                        break;
                }
            }
        });

        function showImage(index) {
            if (images[index]) {
                $image.attr('src', images[index].src);
                $caption.text(images[index].caption);
            }
        }
    }

    /**
     * Carousel functionality
     */
    function initCarousel() {
        $('.kawaii-gallery--carousel').each(function() {
            const $gallery = $(this);
            const $items = $gallery.find('.kawaii-gallery__item');
            
            if ($items.length <= 1) return;

            // Add navigation buttons
            const navHTML = `
                <button class="kawaii-carousel__prev">&lt;</button>
                <button class="kawaii-carousel__next">&gt;</button>
                <div class="kawaii-carousel__dots"></div>
            `;
            $gallery.append(navHTML);

            // Add dots
            const $dots = $gallery.find('.kawaii-carousel__dots');
            $items.each(function(index) {
                $dots.append(`<button class="kawaii-carousel__dot" data-index="${index}"></button>`);
            });

            let currentSlide = 0;
            const totalSlides = $items.length;

            function goToSlide(index) {
                currentSlide = index;
                const offset = -currentSlide * 100;
                $gallery.find('.kawaii-gallery__item').css('transform', `translateX(${offset}%)`);
                
                $dots.find('.kawaii-carousel__dot').removeClass('active');
                $dots.find(`.kawaii-carousel__dot[data-index="${currentSlide}"]`).addClass('active');
            }

            // Navigation
            $gallery.find('.kawaii-carousel__prev').on('click', function() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                goToSlide(currentSlide);
            });

            $gallery.find('.kawaii-carousel__next').on('click', function() {
                currentSlide = (currentSlide + 1) % totalSlides;
                goToSlide(currentSlide);
            });

            // Dot navigation
            $dots.on('click', '.kawaii-carousel__dot', function() {
                const index = parseInt($(this).attr('data-index'));
                goToSlide(index);
            });

            // Initialize
            goToSlide(0);

            // Touch/swipe support
            let startX = 0;
            let isDragging = false;

            $gallery.on('touchstart mousedown', function(e) {
                startX = e.type === 'touchstart' ? e.touches[0].clientX : e.clientX;
                isDragging = true;
            });

            $gallery.on('touchmove mousemove', function(e) {
                if (!isDragging) return;
                e.preventDefault();
            });

            $gallery.on('touchend mouseup', function(e) {
                if (!isDragging) return;
                isDragging = false;
                
                const endX = e.type === 'touchend' ? e.changedTouches[0].clientX : e.clientX;
                const diff = startX - endX;
                
                if (Math.abs(diff) > 50) {
                    if (diff > 0) {
                        $gallery.find('.kawaii-carousel__next').click();
                    } else {
                        $gallery.find('.kawaii-carousel__prev').click();
                    }
                }
            });
        });
    }

    /**
     * Masonry layout
     */
    function initMasonry() {
        $('.kawaii-gallery--masonry').each(function() {
            const $gallery = $(this);
            
            // Simple masonry implementation
            function layoutMasonry() {
                const items = $gallery.find('.kawaii-gallery__item');
                const columns = parseInt($gallery.attr('data-columns')) || 3;
                const columnHeights = new Array(columns).fill(0);
                
                items.each(function(index) {
                    const $item = $(this);
                    const shortestColumn = columnHeights.indexOf(Math.min(...columnHeights));
                    
                    $item.css({
                        position: 'absolute',
                        left: `${(shortestColumn / columns) * 100}%`,
                        top: `${columnHeights[shortestColumn]}px`,
                        width: `${100 / columns}%`
                    });
                    
                    columnHeights[shortestColumn] += $item.outerHeight(true);
                });
                
                $gallery.css('height', Math.max(...columnHeights) + 'px');
            }
            
            // Layout after images load
            $gallery.find('img').on('load', layoutMasonry);
            
            // Initial layout
            setTimeout(layoutMasonry, 100);
            
            // Re-layout on window resize
            $(window).on('resize', debounce(layoutMasonry, 250));
        });
    }

    /**
     * Lazy loading for gallery images
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            $('.kawaii-gallery img[data-src]').each(function() {
                imageObserver.observe(this);
            });
        }
    }

    /**
     * Utility function for debouncing
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
     * Validate gallery attributes
     */
    function validateGalleryAttributes($gallery) {
        const columns = parseInt($gallery.attr('data-columns')) || 3;
        const validColumns = Math.max(1, Math.min(6, columns));
        $gallery.attr('data-columns', validColumns);
    }

    /**
     * Initialize all gallery functionality
     */
    function initKawaiiGalleries() {
        $('.kawaii-gallery').each(function() {
            validateGalleryAttributes($(this));
        });
        
        initLightbox();
        initCarousel();
        initMasonry();
        initLazyLoading();
    }

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        initKawaiiGalleries();
    });

    // Re-initialize for dynamically added content
    $(document).on('DOMNodeInserted', function() {
        initKawaiiGalleries();
    });

})(jQuery);