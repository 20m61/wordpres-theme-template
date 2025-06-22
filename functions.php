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

// Composer autoloader
require_once get_template_directory() . '/vendor/autoload.php';

// Initialize the theme
$theme = new \KawaiiUltra\Theme\Core\Theme();
$theme->init();