<?php
/**
 * Custom Taxonomies class
 *
 * Handles registration of custom taxonomies.
 *
 * @package KawaiiUltra\Functionality
 * @since 1.0.0
 */

namespace KawaiiUltra\Functionality\Features;

/**
 * Custom Taxonomies class
 *
 * Registers and manages custom taxonomies for the plugin.
 */
class CustomTaxonomies {

    /**
     * Initialize custom taxonomies
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('init', [$this, 'register_taxonomies']);
    }

    /**
     * Register custom taxonomies
     *
     * @since 1.0.0
     * @return void
     */
    public function register_taxonomies(): void {
        $this->register_portfolio_category_taxonomy();
        $this->register_portfolio_tag_taxonomy();
        $this->register_testimonial_category_taxonomy();
    }

    /**
     * Register portfolio category taxonomy
     *
     * @since 1.0.0
     * @return void
     */
    private function register_portfolio_category_taxonomy(): void {
        $labels = [
            'name'                       => _x('Portfolio Categories', 'Taxonomy General Name', 'kawaiiultra-functionality'),
            'singular_name'              => _x('Portfolio Category', 'Taxonomy Singular Name', 'kawaiiultra-functionality'),
            'menu_name'                  => __('Categories', 'kawaiiultra-functionality'),
            'all_items'                  => __('All Categories', 'kawaiiultra-functionality'),
            'parent_item'                => __('Parent Category', 'kawaiiultra-functionality'),
            'parent_item_colon'          => __('Parent Category:', 'kawaiiultra-functionality'),
            'new_item_name'              => __('New Category Name', 'kawaiiultra-functionality'),
            'add_new_item'               => __('Add New Category', 'kawaiiultra-functionality'),
            'edit_item'                  => __('Edit Category', 'kawaiiultra-functionality'),
            'update_item'                => __('Update Category', 'kawaiiultra-functionality'),
            'view_item'                  => __('View Category', 'kawaiiultra-functionality'),
            'separate_items_with_commas' => __('Separate categories with commas', 'kawaiiultra-functionality'),
            'add_or_remove_items'        => __('Add or remove categories', 'kawaiiultra-functionality'),
            'choose_from_most_used'      => __('Choose from the most used', 'kawaiiultra-functionality'),
            'popular_items'              => __('Popular Categories', 'kawaiiultra-functionality'),
            'search_items'               => __('Search Categories', 'kawaiiultra-functionality'),
            'not_found'                  => __('Not Found', 'kawaiiultra-functionality'),
            'no_terms'                   => __('No categories', 'kawaiiultra-functionality'),
            'items_list'                 => __('Categories list', 'kawaiiultra-functionality'),
            'items_list_navigation'      => __('Categories list navigation', 'kawaiiultra-functionality'),
        ];

        $args = [
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => ['slug' => 'portfolio-category'],
            'show_in_rest'               => true,
            'rest_base'                  => 'portfolio-categories',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
        ];

        register_taxonomy('portfolio_category', ['portfolio'], $args);
    }

    /**
     * Register portfolio tag taxonomy
     *
     * @since 1.0.0
     * @return void
     */
    private function register_portfolio_tag_taxonomy(): void {
        $labels = [
            'name'                       => _x('Portfolio Tags', 'Taxonomy General Name', 'kawaiiultra-functionality'),
            'singular_name'              => _x('Portfolio Tag', 'Taxonomy Singular Name', 'kawaiiultra-functionality'),
            'menu_name'                  => __('Tags', 'kawaiiultra-functionality'),
            'all_items'                  => __('All Tags', 'kawaiiultra-functionality'),
            'parent_item'                => __('Parent Tag', 'kawaiiultra-functionality'),
            'parent_item_colon'          => __('Parent Tag:', 'kawaiiultra-functionality'),
            'new_item_name'              => __('New Tag Name', 'kawaiiultra-functionality'),
            'add_new_item'               => __('Add New Tag', 'kawaiiultra-functionality'),
            'edit_item'                  => __('Edit Tag', 'kawaiiultra-functionality'),
            'update_item'                => __('Update Tag', 'kawaiiultra-functionality'),
            'view_item'                  => __('View Tag', 'kawaiiultra-functionality'),
            'separate_items_with_commas' => __('Separate tags with commas', 'kawaiiultra-functionality'),
            'add_or_remove_items'        => __('Add or remove tags', 'kawaiiultra-functionality'),
            'choose_from_most_used'      => __('Choose from the most used', 'kawaiiultra-functionality'),
            'popular_items'              => __('Popular Tags', 'kawaiiultra-functionality'),
            'search_items'               => __('Search Tags', 'kawaiiultra-functionality'),
            'not_found'                  => __('Not Found', 'kawaiiultra-functionality'),
            'no_terms'                   => __('No tags', 'kawaiiultra-functionality'),
            'items_list'                 => __('Tags list', 'kawaiiultra-functionality'),
            'items_list_navigation'      => __('Tags list navigation', 'kawaiiultra-functionality'),
        ];

        $args = [
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => ['slug' => 'portfolio-tag'],
            'show_in_rest'               => true,
            'rest_base'                  => 'portfolio-tags',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
        ];

        register_taxonomy('portfolio_tag', ['portfolio'], $args);
    }

    /**
     * Register testimonial category taxonomy
     *
     * @since 1.0.0
     * @return void
     */
    private function register_testimonial_category_taxonomy(): void {
        $labels = [
            'name'                       => _x('Testimonial Categories', 'Taxonomy General Name', 'kawaiiultra-functionality'),
            'singular_name'              => _x('Testimonial Category', 'Taxonomy Singular Name', 'kawaiiultra-functionality'),
            'menu_name'                  => __('Categories', 'kawaiiultra-functionality'),
            'all_items'                  => __('All Categories', 'kawaiiultra-functionality'),
            'parent_item'                => __('Parent Category', 'kawaiiultra-functionality'),
            'parent_item_colon'          => __('Parent Category:', 'kawaiiultra-functionality'),
            'new_item_name'              => __('New Category Name', 'kawaiiultra-functionality'),
            'add_new_item'               => __('Add New Category', 'kawaiiultra-functionality'),
            'edit_item'                  => __('Edit Category', 'kawaiiultra-functionality'),
            'update_item'                => __('Update Category', 'kawaiiultra-functionality'),
            'view_item'                  => __('View Category', 'kawaiiultra-functionality'),
            'separate_items_with_commas' => __('Separate categories with commas', 'kawaiiultra-functionality'),
            'add_or_remove_items'        => __('Add or remove categories', 'kawaiiultra-functionality'),
            'choose_from_most_used'      => __('Choose from the most used', 'kawaiiultra-functionality'),
            'popular_items'              => __('Popular Categories', 'kawaiiultra-functionality'),
            'search_items'               => __('Search Categories', 'kawaiiultra-functionality'),
            'not_found'                  => __('Not Found', 'kawaiiultra-functionality'),
            'no_terms'                   => __('No categories', 'kawaiiultra-functionality'),
            'items_list'                 => __('Categories list', 'kawaiiultra-functionality'),
            'items_list_navigation'      => __('Categories list navigation', 'kawaiiultra-functionality'),
        ];

        $args = [
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
            'rewrite'                    => ['slug' => 'testimonial-category'],
            'show_in_rest'               => true,
            'rest_base'                  => 'testimonial-categories',
            'rest_controller_class'      => 'WP_REST_Terms_Controller',
        ];

        register_taxonomy('testimonial_category', ['testimonial'], $args);
    }

    /**
     * Get registered taxonomies
     *
     * @since 1.0.0
     * @return array Array of registered taxonomy names.
     */
    public function get_taxonomies(): array {
        return ['portfolio_category', 'portfolio_tag', 'testimonial_category'];
    }
}