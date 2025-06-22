/**
 * Admin JavaScript
 * 
 * JavaScript for WordPress admin and customizer.
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Customizer live preview updates
        if (typeof wp !== 'undefined' && wp.customize) {
            
            // Primary color live preview
            wp.customize('kawaii_ultra_primary_color', function(value) {
                value.bind(function(color) {
                    $('head').find('#kawaii-ultra-primary-color').remove();
                    $('head').append('<style id="kawaii-ultra-primary-color">:root { --primary-color: ' + color + '; } .main-navigation a:hover, a { color: ' + color + '; }</style>');
                });
            });

            // Footer text live preview
            wp.customize('kawaii_ultra_footer_text', function(value) {
                value.bind(function(text) {
                    $('.site-footer .site-info').text(text);
                });
            });

        }

        // Admin notices auto-dismiss
        $('.kawaii-ultra-admin-notice.is-dismissible').on('click', '.notice-dismiss', function() {
            $(this).closest('.kawaii-ultra-admin-notice').fadeOut();
        });

    });

})(jQuery);