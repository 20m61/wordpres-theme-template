<?php
/**
 * Assets class
 *
 * Handles asset loading and management for the theme.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Core;

/**
 * Assets class
 *
 * Manages theme stylesheets and JavaScript files.
 */
class Assets {

    /**
     * Theme version for cache busting
     *
     * @var string
     */
    private $version;

    /**
     * Constructor
     *
     * @since 1.0.0
     */
    public function __construct() {
        $this->version = wp_get_theme()->get('Version') ?: '1.0.0';
    }

    /**
     * Initialize assets
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('admin_enqueue_scripts', [$this, 'admin_scripts']);
        add_action('wp_head', [$this, 'custom_css']);
    }

    /**
     * Enqueue scripts and styles
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_scripts(): void {
        // Enqueue theme stylesheet
        wp_enqueue_style(
            'kawaii-ultra-style',
            get_stylesheet_uri(),
            [],
            $this->version
        );

        // Enqueue navigation script
        wp_enqueue_script(
            'kawaii-ultra-navigation',
            get_template_directory_uri() . '/js/navigation.js',
            [],
            $this->version,
            true
        );

        // Enqueue skip link focus fix
        wp_enqueue_script(
            'kawaii-ultra-skip-link-focus-fix',
            get_template_directory_uri() . '/js/skip-link-focus-fix.js',
            [],
            $this->version,
            true
        );

        // Enqueue comment reply script for threaded comments
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        // Localize script for AJAX
        wp_localize_script('kawaii-ultra-navigation', 'kawaii_ultra_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('kawaii_ultra_nonce'),
        ]);
    }

    /**
     * Enqueue admin scripts and styles
     *
     * @since 1.0.0
     * @param string $hook Current admin page hook.
     * @return void
     */
    public function admin_scripts(string $hook): void {
        // Load on customizer, theme option pages, and appearance pages
        $allowed_hooks = [
            'customize.php',
            'appearance_page_theme-options',
            'themes.php',
            'widgets.php'
        ];
        
        if (!in_array($hook, $allowed_hooks, true)) {
            return;
        }

        wp_enqueue_style(
            'kawaii-ultra-admin',
            get_template_directory_uri() . '/css/admin.css',
            [],
            $this->version
        );

        wp_enqueue_script(
            'kawaii-ultra-admin',
            get_template_directory_uri() . '/js/admin.js',
            ['jquery'],
            $this->version,
            true
        );
    }

    /**
     * Add custom CSS to head
     *
     * @since 1.0.0
     * @return void
     */
    public function custom_css(): void {
        $primary_color = $this->get_primary_color();
        
        $css = sprintf(
            '<style type="text/css">
                :root { --primary-color: %s; }
                .main-navigation a:hover { color: %s; }
                a { color: %s; }
            </style>',
            esc_attr($primary_color),
            esc_attr($primary_color),
            esc_attr($primary_color)
        );

        echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    /**
     * Get primary color from theme options
     *
     * @since 1.0.0
     * @return string Primary color hex code.
     */
    private function get_primary_color(): string {
        return get_theme_mod('kawaii_ultra_primary_color', '#0073aa');
    }

    /**
     * Get template directory URI
     *
     * @since 1.0.0
     * @return string Template directory URI.
     */
    public function get_template_uri(): string {
        return get_template_directory_uri();
    }

    /**
     * Get theme version
     *
     * @since 1.0.0
     * @return string Theme version.
     */
    public function get_version(): string {
        return $this->version;
    }
}