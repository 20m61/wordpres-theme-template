<?php
/**
 * Custom Post Types class
 *
 * Handles registration of custom post types.
 *
 * @package KawaiiUltra\Functionality
 * @since 1.0.0
 */

namespace KawaiiUltra\Functionality\Features;

/**
 * Custom Post Types class
 *
 * Registers and manages custom post types for the plugin.
 */
class CustomPostTypes {

    /**
     * Initialize custom post types
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('init', [$this, 'register_post_types']);
        add_action('init', [$this, 'add_rewrite_rules']);
    }

    /**
     * Register custom post types
     *
     * @since 1.0.0
     * @return void
     */
    public function register_post_types(): void {
        $this->register_portfolio_post_type();
        $this->register_testimonial_post_type();
    }

    /**
     * Register portfolio post type
     *
     * @since 1.0.0
     * @return void
     */
    private function register_portfolio_post_type(): void {
        $labels = [
            'name'                  => _x('Portfolio', 'Post type general name', 'kawaiiultra-functionality'),
            'singular_name'         => _x('Portfolio Item', 'Post type singular name', 'kawaiiultra-functionality'),
            'menu_name'             => _x('Portfolio', 'Admin Menu text', 'kawaiiultra-functionality'),
            'name_admin_bar'        => _x('Portfolio Item', 'Add New on Toolbar', 'kawaiiultra-functionality'),
            'add_new'               => __('Add New', 'kawaiiultra-functionality'),
            'add_new_item'          => __('Add New Portfolio Item', 'kawaiiultra-functionality'),
            'new_item'              => __('New Portfolio Item', 'kawaiiultra-functionality'),
            'edit_item'             => __('Edit Portfolio Item', 'kawaiiultra-functionality'),
            'view_item'             => __('View Portfolio Item', 'kawaiiultra-functionality'),
            'all_items'             => __('All Portfolio Items', 'kawaiiultra-functionality'),
            'search_items'          => __('Search Portfolio Items', 'kawaiiultra-functionality'),
            'parent_item_colon'     => __('Parent Portfolio Items:', 'kawaiiultra-functionality'),
            'not_found'             => __('No portfolio items found.', 'kawaiiultra-functionality'),
            'not_found_in_trash'    => __('No portfolio items found in Trash.', 'kawaiiultra-functionality'),
            'featured_image'        => _x('Portfolio Item Cover Image', 'Overrides the "Featured Image" phrase', 'kawaiiultra-functionality'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase', 'kawaiiultra-functionality'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase', 'kawaiiultra-functionality'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase', 'kawaiiultra-functionality'),
            'archives'              => _x('Portfolio Item archives', 'The post type archive label', 'kawaiiultra-functionality'),
            'insert_into_item'      => _x('Insert into portfolio item', 'Overrides the "Insert into post" phrase', 'kawaiiultra-functionality'),
            'uploaded_to_this_item' => _x('Uploaded to this portfolio item', 'Overrides the "Uploaded to this post" phrase', 'kawaiiultra-functionality'),
            'filter_items_list'     => _x('Filter portfolio items list', 'Screen reader text for the filter links', 'kawaiiultra-functionality'),
            'items_list_navigation' => _x('Portfolio items list navigation', 'Screen reader text for the pagination', 'kawaiiultra-functionality'),
            'items_list'            => _x('Portfolio items list', 'Screen reader text for the items list', 'kawaiiultra-functionality'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'portfolio'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-portfolio',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
            'show_in_rest'       => true,
            'rest_base'          => 'portfolio',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ];

        register_post_type('portfolio', $args);
    }

    /**
     * Register testimonial post type
     *
     * @since 1.0.0
     * @return void
     */
    private function register_testimonial_post_type(): void {
        $labels = [
            'name'                  => _x('Testimonials', 'Post type general name', 'kawaiiultra-functionality'),
            'singular_name'         => _x('Testimonial', 'Post type singular name', 'kawaiiultra-functionality'),
            'menu_name'             => _x('Testimonials', 'Admin Menu text', 'kawaiiultra-functionality'),
            'name_admin_bar'        => _x('Testimonial', 'Add New on Toolbar', 'kawaiiultra-functionality'),
            'add_new'               => __('Add New', 'kawaiiultra-functionality'),
            'add_new_item'          => __('Add New Testimonial', 'kawaiiultra-functionality'),
            'new_item'              => __('New Testimonial', 'kawaiiultra-functionality'),
            'edit_item'             => __('Edit Testimonial', 'kawaiiultra-functionality'),
            'view_item'             => __('View Testimonial', 'kawaiiultra-functionality'),
            'all_items'             => __('All Testimonials', 'kawaiiultra-functionality'),
            'search_items'          => __('Search Testimonials', 'kawaiiultra-functionality'),
            'parent_item_colon'     => __('Parent Testimonials:', 'kawaiiultra-functionality'),
            'not_found'             => __('No testimonials found.', 'kawaiiultra-functionality'),
            'not_found_in_trash'    => __('No testimonials found in Trash.', 'kawaiiultra-functionality'),
            'featured_image'        => _x('Testimonial Author Photo', 'Overrides the "Featured Image" phrase', 'kawaiiultra-functionality'),
            'set_featured_image'    => _x('Set author photo', 'Overrides the "Set featured image" phrase', 'kawaiiultra-functionality'),
            'remove_featured_image' => _x('Remove author photo', 'Overrides the "Remove featured image" phrase', 'kawaiiultra-functionality'),
            'use_featured_image'    => _x('Use as author photo', 'Overrides the "Use as featured image" phrase', 'kawaiiultra-functionality'),
            'archives'              => _x('Testimonial archives', 'The post type archive label', 'kawaiiultra-functionality'),
            'insert_into_item'      => _x('Insert into testimonial', 'Overrides the "Insert into post" phrase', 'kawaiiultra-functionality'),
            'uploaded_to_this_item' => _x('Uploaded to this testimonial', 'Overrides the "Uploaded to this post" phrase', 'kawaiiultra-functionality'),
            'filter_items_list'     => _x('Filter testimonials list', 'Screen reader text for the filter links', 'kawaiiultra-functionality'),
            'items_list_navigation' => _x('Testimonials list navigation', 'Screen reader text for the pagination', 'kawaiiultra-functionality'),
            'items_list'            => _x('Testimonials list', 'Screen reader text for the items list', 'kawaiiultra-functionality'),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'testimonials'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'menu_icon'          => 'dashicons-format-quote',
            'supports'           => ['title', 'editor', 'thumbnail', 'custom-fields'],
            'show_in_rest'       => true,
            'rest_base'          => 'testimonials',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ];

        register_post_type('testimonial', $args);
    }

    /**
     * Add custom rewrite rules
     *
     * @since 1.0.0
     * @return void
     */
    public function add_rewrite_rules(): void {
        // Add any custom rewrite rules here if needed
        // For now, we'll rely on the default WordPress rewrite rules
    }

    /**
     * Get registered post types
     *
     * @since 1.0.0
     * @return array Array of registered post type names.
     */
    public function get_post_types(): array {
        return ['portfolio', 'testimonial'];
    }
}