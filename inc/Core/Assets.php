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
     * Vite manifest
     *
     * @var array|null
     */
    private $vite_manifest;

    /**
     * Constructor
     *
     * @since 1.0.0
     */
    public function __construct() {
        $this->version = wp_get_theme()->get('Version') ?: '1.0.0';
        $this->vite_manifest = $this->load_vite_manifest();
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
        // Enqueue main theme assets (includes main CSS via Vite)
        $this->enqueue_vite_asset('kawaii-ultra-main', 'src/js/main.js');

        // Enqueue navigation script
        $this->enqueue_vite_asset('kawaii-ultra-navigation', 'src/js/navigation.js');

        // Enqueue skip link focus fix
        $this->enqueue_vite_asset('kawaii-ultra-skip-link-focus-fix', 'src/js/skip-link-focus-fix.js');

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

        // Enqueue admin CSS
        if (!$this->is_development_mode()) {
            $admin_css_url = $this->get_vite_asset_url('src/css/admin.scss');
            if ($admin_css_url) {
                wp_enqueue_style(
                    'kawaii-ultra-admin',
                    $admin_css_url,
                    [],
                    null
                );
            }
        }

        // Enqueue admin JavaScript
        $this->enqueue_vite_asset('kawaii-ultra-admin', 'src/js/admin.js', ['jquery']);
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

    /**
     * Load Vite manifest file
     *
     * @since 1.0.0
     * @return array|null Vite manifest data or null if not found.
     */
    private function load_vite_manifest(): ?array {
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
        
        if (!file_exists($manifest_path)) {
            return null;
        }
        
        $manifest_content = file_get_contents($manifest_path);
        return $manifest_content ? json_decode($manifest_content, true) : null;
    }

    /**
     * Get Vite asset URL
     *
     * @since 1.0.0
     * @param string $entry Entry name from manifest.
     * @return string|null Asset URL or null if not found.
     */
    private function get_vite_asset_url(string $entry): ?string {
        if (!$this->vite_manifest || !isset($this->vite_manifest[$entry])) {
            return null;
        }

        $asset_file = $this->vite_manifest[$entry]['file'] ?? null;
        return $asset_file ? get_template_directory_uri() . '/dist/' . $asset_file : null;
    }

    /**
     * Get Vite CSS dependencies
     *
     * @since 1.0.0
     * @param string $entry Entry name from manifest.
     * @return array CSS file URLs.
     */
    private function get_vite_css_deps(string $entry): array {
        if (!$this->vite_manifest || !isset($this->vite_manifest[$entry])) {
            return [];
        }

        $css_files = $this->vite_manifest[$entry]['css'] ?? [];
        $css_urls = [];
        
        foreach ($css_files as $css_file) {
            $css_urls[] = get_template_directory_uri() . '/dist/' . $css_file;
        }
        
        return $css_urls;
    }

    /**
     * Check if we're in development mode (Vite dev server running)
     *
     * @since 1.0.0
     * @return bool True if in development mode.
     */
    private function is_development_mode(): bool {
        return defined('WP_DEBUG') && WP_DEBUG && $this->vite_manifest === null;
    }

    /**
     * Enqueue Vite asset
     *
     * @since 1.0.0
     * @param string $handle Script/style handle.
     * @param string $entry Entry name from manifest.
     * @param array  $deps Dependencies.
     * @param bool   $in_footer Load script in footer.
     * @return void
     */
    private function enqueue_vite_asset(string $handle, string $entry, array $deps = [], bool $in_footer = true): void {
        if ($this->is_development_mode()) {
            // Development mode - load from Vite dev server
            wp_enqueue_script(
                $handle,
                'http://localhost:3000/src/js/' . basename($entry, '.js') . '.js',
                $deps,
                null,
                $in_footer
            );
            return;
        }

        // Production mode - load compiled assets
        $js_url = $this->get_vite_asset_url($entry);
        $css_deps = $this->get_vite_css_deps($entry);
        
        // Enqueue CSS dependencies first
        foreach ($css_deps as $index => $css_url) {
            wp_enqueue_style(
                $handle . '-css-' . $index,
                $css_url,
                [],
                null
            );
        }
        
        // Enqueue JavaScript
        if ($js_url) {
            wp_enqueue_script(
                $handle,
                $js_url,
                $deps,
                null,
                $in_footer
            );
        }
    }
}