<?php
/**
 * Functions and definitions - OOP Bootstrap
 *
 * This file bootstraps the theme's object-oriented architecture.
 * All procedural code has been refactored into namespaced classes.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Composer autoloader with fallback
$autoload_file = get_template_directory() . '/vendor/autoload.php';

if (file_exists($autoload_file)) {
    require_once $autoload_file;
} else {
    // Fallback error handling for production
    if (defined('WP_DEBUG') && WP_DEBUG) {
        wp_die(
            '<h1>Theme Error</h1><p>Composer dependencies not found. Please run:</p><pre>composer install --no-dev</pre>',
            'Theme Setup Required'
        );
    } else {
        // Log error and disable theme features gracefully
        error_log('KawaiiUltra Theme: Composer autoloader not found. Theme functionality disabled.');
        return;
    }
}

// Initialize the theme
$theme = new \KawaiiUltra\Theme\Core\Theme();
$theme->init();