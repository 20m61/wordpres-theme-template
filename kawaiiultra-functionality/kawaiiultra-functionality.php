<?php
/**
 * Plugin Name: KawaiiUltra Functionality
 * Plugin URI: https://github.com/20m61/wordpres-theme-template
 * Description: Companion plugin for KawaiiUltra theme providing custom post types, taxonomies, and business logic functionality.
 * Version: 1.0.0
 * Author: 20m61
 * License: MIT
 * Text Domain: kawaiiultra-functionality
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Requires PHP: 7.4
 *
 * @package KawaiiUltra\Functionality
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('KAWAIIULTRA_FUNCTIONALITY_VERSION', '1.0.0');
define('KAWAIIULTRA_FUNCTIONALITY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('KAWAIIULTRA_FUNCTIONALITY_PLUGIN_URL', plugin_dir_url(__FILE__));
define('KAWAIIULTRA_FUNCTIONALITY_TEXT_DOMAIN', 'kawaiiultra-functionality');

// Composer autoloader with fallback
$autoload_file = KAWAIIULTRA_FUNCTIONALITY_PLUGIN_DIR . 'vendor/autoload.php';

if (file_exists($autoload_file)) {
    require_once $autoload_file;
} else {
    // Simple fallback autoloader for core plugin files
    spl_autoload_register(function ($class) {
        $prefix = 'KawaiiUltra\\Functionality\\';
        $base_dir = KAWAIIULTRA_FUNCTIONALITY_PLUGIN_DIR . 'inc/';

        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }

        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            require $file;
        }
    });
}

/**
 * Main plugin class
 */
class KawaiiUltra_Functionality {

    /**
     * Plugin instance
     *
     * @var KawaiiUltra_Functionality
     */
    private static $instance = null;

    /**
     * Plugin core instance
     *
     * @var \KawaiiUltra\Functionality\Core\Plugin
     */
    private $plugin;

    /**
     * Get plugin instance
     *
     * @return KawaiiUltra_Functionality
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
    }

    /**
     * Initialize plugin
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        // Load text domain
        load_plugin_textdomain(
            KAWAIIULTRA_FUNCTIONALITY_TEXT_DOMAIN,
            false,
            dirname(plugin_basename(__FILE__)) . '/languages'
        );

        // Initialize plugin core
        if (class_exists('KawaiiUltra\\Functionality\\Core\\Plugin')) {
            $this->plugin = new \KawaiiUltra\Functionality\Core\Plugin();
            $this->plugin->init();
        }
    }

    /**
     * Plugin activation
     *
     * @since 1.0.0
     * @return void
     */
    public function activate(): void {
        // Flush rewrite rules to ensure custom post types work properly
        flush_rewrite_rules();
        
        // Set a flag to show activation notice
        set_transient('kawaiiultra_functionality_activated', true, 30);
    }

    /**
     * Plugin deactivation
     *
     * @since 1.0.0
     * @return void
     */
    public function deactivate(): void {
        // Flush rewrite rules on deactivation
        flush_rewrite_rules();
    }

    /**
     * Get plugin version
     *
     * @since 1.0.0
     * @return string
     */
    public function get_version(): string {
        return KAWAIIULTRA_FUNCTIONALITY_VERSION;
    }
}

// Initialize the plugin
KawaiiUltra_Functionality::get_instance();