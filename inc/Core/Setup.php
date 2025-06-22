<?php
/**
 * Setup class
 *
 * Handles theme setup and configuration.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Core;

/**
 * Setup class
 *
 * Configures theme features, navigation menus, and content width.
 */
class Setup {

    /**
     * Initialize setup
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('after_setup_theme', [$this, 'theme_setup']);
        add_action('after_setup_theme', [$this, 'content_width'], 0);
        add_action('widgets_init', [$this, 'widgets_init']);
    }

    /**
     * Theme setup
     *
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since 1.0.0
     * @return void
     */
    public function theme_setup(): void {
        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages
        add_theme_support('post-thumbnails');

        // Register navigation menus
        register_nav_menus([
            'menu-1' => esc_html__('Primary', 'kawaii-ultra'),
            'footer' => esc_html__('Footer', 'kawaii-ultra'),
        ]);

        // Switch default core markup to output valid HTML5
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Add theme support for selective refresh for widgets
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        // Add support for custom backgrounds
        add_theme_support('custom-background', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]);

        // Add support for wide alignment
        add_theme_support('align-wide');

        // Add support for editor styles
        add_theme_support('editor-styles');

        // Enqueue editor styles
        add_editor_style('style-editor.css');

        // Add support for block editor
        add_theme_support('wp-block-styles');

        // Add support for responsive embeds
        add_theme_support('responsive-embeds');

        // Add support for custom line height
        add_theme_support('custom-line-height');

        // Add support for custom units
        add_theme_support('custom-units');

        // Add support for custom spacing
        add_theme_support('custom-spacing');

        // Add support for Full Site Editing
        add_theme_support('block-templates');

        // Add support for template parts
        add_theme_support('block-template-parts');
    }

    /**
     * Set content width
     *
     * @since 1.0.0
     * @return void
     */
    public function content_width(): void {
        $GLOBALS['content_width'] = apply_filters('kawaii_ultra_content_width', 640);
    }

    /**
     * Register widget areas
     *
     * @since 1.0.0
     * @return void
     */
    public function widgets_init(): void {
        $this->register_sidebar([
            'name'        => esc_html__('Sidebar', 'kawaii-ultra'),
            'id'          => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'kawaii-ultra'),
        ]);

        $this->register_sidebar([
            'name'        => esc_html__('Footer 1', 'kawaii-ultra'),
            'id'          => 'footer-1',
            'description' => esc_html__('Add widgets here for footer column 1.', 'kawaii-ultra'),
            'title_tag'   => 'h3',
        ]);

        $this->register_sidebar([
            'name'        => esc_html__('Footer 2', 'kawaii-ultra'),
            'id'          => 'footer-2',
            'description' => esc_html__('Add widgets here for footer column 2.', 'kawaii-ultra'),
            'title_tag'   => 'h3',
        ]);
    }

    /**
     * Register a single sidebar
     *
     * @since 1.0.0
     * @param array $args Sidebar arguments.
     * @return void
     */
    private function register_sidebar(array $args): void {
        $defaults = [
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ];

        // Override title tag if specified
        if (isset($args['title_tag'])) {
            $defaults['before_title'] = '<' . $args['title_tag'] . ' class="widget-title">';
            $defaults['after_title'] = '</' . $args['title_tag'] . '>';
            unset($args['title_tag']);
        }

        $args = wp_parse_args($args, $defaults);
        register_sidebar($args);
    }
}