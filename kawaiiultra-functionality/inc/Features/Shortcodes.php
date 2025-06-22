<?php
/**
 * Shortcodes class
 *
 * Handles registration of custom shortcodes for non-design functionality.
 *
 * @package KawaiiUltra\Functionality
 * @since 1.0.0
 */

namespace KawaiiUltra\Functionality\Features;

/**
 * Shortcodes class
 *
 * Registers and manages custom shortcodes for the plugin.
 */
class Shortcodes {

    /**
     * Initialize shortcodes
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('init', [$this, 'register_shortcodes']);
    }

    /**
     * Register custom shortcodes
     *
     * @since 1.0.0
     * @return void
     */
    public function register_shortcodes(): void {
        add_shortcode('portfolio_list', [$this, 'portfolio_list_shortcode']);
        add_shortcode('recent_testimonials', [$this, 'recent_testimonials_shortcode']);
        add_shortcode('portfolio_categories', [$this, 'portfolio_categories_shortcode']);
    }

    /**
     * Portfolio list shortcode
     *
     * Displays a list of portfolio items.
     *
     * @since 1.0.0
     * @param array $atts Shortcode attributes.
     * @return string Shortcode output.
     */
    public function portfolio_list_shortcode(array $atts): string {
        $atts = shortcode_atts([
            'limit' => 6,
            'category' => '',
            'columns' => 3,
            'show_excerpt' => 'true',
        ], $atts, 'portfolio_list');

        // Sanitize attributes
        $limit = absint($atts['limit']);
        $category = sanitize_text_field($atts['category']);
        $columns = absint($atts['columns']);
        $show_excerpt = filter_var($atts['show_excerpt'], FILTER_VALIDATE_BOOLEAN);

        // Ensure minimum values
        $limit = max(1, $limit);
        $columns = max(1, min(6, $columns)); // Max 6 columns

        $args = [
            'post_type' => 'portfolio',
            'posts_per_page' => $limit,
            'post_status' => 'publish',
        ];

        // Add category filter if specified
        if (!empty($category) && taxonomy_exists('portfolio_category')) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'portfolio_category',
                    'field' => 'slug',
                    'terms' => $category,
                ],
            ];
        }

        $query = new \WP_Query($args);

        if (!$query->have_posts()) {
            return '<p>' . esc_html__('No portfolio items found.', 'kawaiiultra-functionality') . '</p>';
        }

        ob_start();
        ?>
        <div class="portfolio-shortcode-grid portfolio-columns-<?php echo esc_attr($columns); ?>">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="portfolio-shortcode-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="portfolio-shortcode-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="portfolio-shortcode-content">
                        <h3 class="portfolio-shortcode-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <?php if ($show_excerpt && has_excerpt()) : ?>
                            <div class="portfolio-shortcode-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>
                        
                        <a href="<?php the_permalink(); ?>" class="portfolio-shortcode-link">
                            <?php esc_html_e('View Project', 'kawaiiultra-functionality'); ?>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        wp_reset_postdata();
        
        return ob_get_clean();
    }

    /**
     * Recent testimonials shortcode
     *
     * Displays recent testimonials.
     *
     * @since 1.0.0
     * @param array $atts Shortcode attributes.
     * @return string Shortcode output.
     */
    public function recent_testimonials_shortcode(array $atts): string {
        $atts = shortcode_atts([
            'limit' => 3,
            'category' => '',
            'show_author' => 'true',
        ], $atts, 'recent_testimonials');

        // Sanitize attributes
        $limit = absint($atts['limit']);
        $category = sanitize_text_field($atts['category']);
        $show_author = filter_var($atts['show_author'], FILTER_VALIDATE_BOOLEAN);

        $limit = max(1, $limit);

        $args = [
            'post_type' => 'testimonial',
            'posts_per_page' => $limit,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ];

        // Add category filter if specified
        if (!empty($category) && taxonomy_exists('testimonial_category')) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'testimonial_category',
                    'field' => 'slug',
                    'terms' => $category,
                ],
            ];
        }

        $query = new \WP_Query($args);

        if (!$query->have_posts()) {
            return '<p>' . esc_html__('No testimonials found.', 'kawaiiultra-functionality') . '</p>';
        }

        ob_start();
        ?>
        <div class="testimonials-shortcode">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="testimonial-shortcode-item">
                    <div class="testimonial-shortcode-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if ($show_author) : ?>
                        <div class="testimonial-shortcode-author">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="testimonial-author-photo">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="testimonial-author-name">
                                <strong><?php the_title(); ?></strong>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        wp_reset_postdata();
        
        return ob_get_clean();
    }

    /**
     * Portfolio categories shortcode
     *
     * Displays a list of portfolio categories.
     *
     * @since 1.0.0
     * @param array $atts Shortcode attributes.
     * @return string Shortcode output.
     */
    public function portfolio_categories_shortcode(array $atts): string {
        $atts = shortcode_atts([
            'show_count' => 'true',
            'orderby' => 'name',
            'order' => 'ASC',
        ], $atts, 'portfolio_categories');

        // Sanitize attributes
        $show_count = filter_var($atts['show_count'], FILTER_VALIDATE_BOOLEAN);
        $orderby = sanitize_text_field($atts['orderby']);
        $order = sanitize_text_field($atts['order']);

        if (!taxonomy_exists('portfolio_category')) {
            return '<p>' . esc_html__('Portfolio categories are not available.', 'kawaiiultra-functionality') . '</p>';
        }

        $categories = get_terms([
            'taxonomy' => 'portfolio_category',
            'hide_empty' => true,
            'orderby' => $orderby,
            'order' => $order,
        ]);

        if (empty($categories) || is_wp_error($categories)) {
            return '<p>' . esc_html__('No portfolio categories found.', 'kawaiiultra-functionality') . '</p>';
        }

        ob_start();
        ?>
        <div class="portfolio-categories-shortcode">
            <ul class="portfolio-categories-list">
                <?php foreach ($categories as $category) : ?>
                    <li class="portfolio-category-item">
                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                            <?php echo esc_html($category->name); ?>
                            <?php if ($show_count) : ?>
                                <span class="category-count">(<?php echo intval($category->count); ?>)</span>
                            <?php endif; ?>
                        </a>
                        <?php if (!empty($category->description)) : ?>
                            <p class="category-description"><?php echo esc_html($category->description); ?></p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
        
        return ob_get_clean();
    }
}