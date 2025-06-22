<?php
/**
 * Main Theme class
 *
 * This class handles the main theme initialization and bootstrapping.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Core;

use KawaiiUltra\Theme\Core\Assets;
use KawaiiUltra\Theme\Core\Setup;
use KawaiiUltra\Theme\Admin\Customizer;

/**
 * Main Theme class
 *
 * Handles theme initialization and coordinates all theme components.
 */
class Theme {

    /**
     * Theme version
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * Theme text domain
     *
     * @var string
     */
    const TEXT_DOMAIN = 'kawaii-ultra';

    /**
     * Setup class instance
     *
     * @var Setup
     */
    private $setup;

    /**
     * Assets class instance
     *
     * @var Assets
     */
    private $assets;

    /**
     * Customizer class instance
     *
     * @var Customizer
     */
    private $customizer;

    /**
     * Constructor
     *
     * Initialize theme components and hooks.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $this->setup = new Setup();
        $this->assets = new Assets();
        $this->customizer = new Customizer();
    }

    /**
     * Initialize the theme
     *
     * Sets up all theme components and WordPress hooks.
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        // Initialize core components
        $this->setup->init();
        $this->assets->init();
        $this->customizer->init();

        // Add theme-specific hooks
        add_action('after_setup_theme', [$this, 'load_textdomain']);
        add_action('wp_head', [$this, 'pingback_header']);
        add_filter('body_class', [$this, 'body_classes']);
        add_filter('excerpt_length', [$this, 'excerpt_length'], 999);
        add_filter('excerpt_more', [$this, 'excerpt_more']);
    }

    /**
     * Load theme textdomain for translations
     *
     * @since 1.0.0
     * @return void
     */
    public function load_textdomain(): void {
        load_theme_textdomain(
            self::TEXT_DOMAIN,
            get_template_directory() . '/languages'
        );
    }

    /**
     * Add pingback header for singular posts
     *
     * @since 1.0.0
     * @return void
     */
    public function pingback_header(): void {
        if (is_singular() && pings_open()) {
            printf(
                '<link rel="pingback" href="%s">',
                esc_url(get_bloginfo('pingback_url'))
            );
        }
    }

    /**
     * Add custom body classes
     *
     * @since 1.0.0
     * @param array $classes Existing body classes.
     * @return array Modified body classes.
     */
    public function body_classes(array $classes): array {
        if (!is_singular()) {
            $classes[] = 'hfeed';
        }

        if (is_active_sidebar('sidebar-1')) {
            $classes[] = 'has-sidebar';
        }

        return $classes;
    }

    /**
     * Custom excerpt length
     *
     * @since 1.0.0
     * @param int $length Default excerpt length.
     * @return int Modified excerpt length.
     */
    public function excerpt_length(int $length): int {
        return 20;
    }

    /**
     * Custom excerpt more text
     *
     * @since 1.0.0
     * @param string $more Default excerpt more text.
     * @return string Modified excerpt more text.
     */
    public function excerpt_more(string $more): string {
        return '...';
    }

    /**
     * Get theme version
     *
     * @since 1.0.0
     * @return string Theme version.
     */
    public function get_version(): string {
        return self::VERSION;
    }

    /**
     * Get theme text domain
     *
     * @since 1.0.0
     * @return string Theme text domain.
     */
    public function get_text_domain(): string {
        return self::TEXT_DOMAIN;
    }
}