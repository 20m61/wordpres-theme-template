<?php
/**
 * Plugin core class
 *
 * Main plugin initialization and coordination class.
 *
 * @package KawaiiUltra\Functionality
 * @since 1.0.0
 */

namespace KawaiiUltra\Functionality\Core;

use KawaiiUltra\Functionality\Features\CustomPostTypes;
use KawaiiUltra\Functionality\Features\CustomTaxonomies;
use KawaiiUltra\Functionality\Features\Shortcodes;

/**
 * Plugin core class
 *
 * Handles plugin initialization and coordinates all plugin components.
 */
class Plugin {

    /**
     * Custom post types instance
     *
     * @var CustomPostTypes
     */
    private $custom_post_types;

    /**
     * Custom taxonomies instance
     *
     * @var CustomTaxonomies
     */
    private $custom_taxonomies;

    /**
     * Shortcodes instance
     *
     * @var Shortcodes
     */
    private $shortcodes;

    /**
     * Constructor
     *
     * Initialize plugin components.
     *
     * @since 1.0.0
     */
    public function __construct() {
        $this->custom_post_types = new CustomPostTypes();
        $this->custom_taxonomies = new CustomTaxonomies();
        $this->shortcodes = new Shortcodes();
    }

    /**
     * Initialize the plugin
     *
     * Sets up all plugin components and WordPress hooks.
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        // Initialize feature components
        $this->custom_post_types->init();
        $this->custom_taxonomies->init();
        $this->shortcodes->init();

        // Add admin notices
        add_action('admin_notices', [$this, 'activation_notice']);
        
        // Add plugin action links
        add_filter('plugin_action_links_' . plugin_basename(KAWAIIULTRA_FUNCTIONALITY_PLUGIN_DIR . 'kawaiiultra-functionality.php'), [$this, 'plugin_action_links']);
    }

    /**
     * Show activation notice
     *
     * @since 1.0.0
     * @return void
     */
    public function activation_notice(): void {
        if (get_transient('kawaiiultra_functionality_activated')) {
            delete_transient('kawaiiultra_functionality_activated');
            ?>
            <div class="notice notice-success is-dismissible">
                <p><?php esc_html_e('KawaiiUltra Functionality plugin activated successfully! Your custom post types and taxonomies are now available.', 'kawaiiultra-functionality'); ?></p>
            </div>
            <?php
        }
    }

    /**
     * Add plugin action links
     *
     * @since 1.0.0
     * @param array $links Plugin action links.
     * @return array Modified plugin action links.
     */
    public function plugin_action_links(array $links): array {
        $custom_links = [
            '<a href="' . admin_url('edit.php?post_type=portfolio') . '">' . esc_html__('Portfolio', 'kawaiiultra-functionality') . '</a>',
            '<a href="' . admin_url('edit.php?post_type=testimonial') . '">' . esc_html__('Testimonials', 'kawaiiultra-functionality') . '</a>',
        ];

        return array_merge($custom_links, $links);
    }

    /**
     * Get custom post types instance
     *
     * @since 1.0.0
     * @return CustomPostTypes
     */
    public function get_custom_post_types(): CustomPostTypes {
        return $this->custom_post_types;
    }

    /**
     * Get custom taxonomies instance
     *
     * @since 1.0.0
     * @return CustomTaxonomies
     */
    public function get_custom_taxonomies(): CustomTaxonomies {
        return $this->custom_taxonomies;
    }

    /**
     * Get shortcodes instance
     *
     * @since 1.0.0
     * @return Shortcodes
     */
    public function get_shortcodes(): Shortcodes {
        return $this->shortcodes;
    }
}