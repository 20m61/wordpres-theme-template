<?php
/**
 * Template Parts Manager
 *
 * Handles template parts registration and management.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Blocks;

/**
 * Template Parts Manager class
 *
 * Manages template parts for reusable theme components.
 */
class TemplatePartsManager {

    /**
     * Initialize template parts manager
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('init', [$this, 'register_template_parts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_template_parts_styles']);
    }

    /**
     * Register template parts
     *
     * @since 1.0.0
     * @return void
     */
    public function register_template_parts(): void {
        // Create template parts directory if it doesn't exist
        $template_parts_dir = get_template_directory() . '/template-parts';
        if (!file_exists($template_parts_dir)) {
            wp_mkdir_p($template_parts_dir);
        }

        // Register header variations
        $this->create_header_variations();

        // Register footer variations  
        $this->create_footer_variations();

        // Register sidebar variations
        $this->create_sidebar_variations();
    }

    /**
     * Create header variations
     *
     * @since 1.0.0
     * @return void
     */
    private function create_header_variations(): void {
        $headers_dir = get_template_directory() . '/template-parts/headers';
        wp_mkdir_p($headers_dir);

        // Simple Header Template Part
        $simple_header = '<?php
/**
 * Template part for displaying a simple kawaii header
 *
 * @package KawaiiUltra\Theme
 */
?>
<header class="site-header kawaii-header kawaii-header--simple">
    <div class="kawaii-header__container">
        <div class="kawaii-header__branding">
            <?php if (has_custom_logo()): ?>
                <div class="kawaii-header__logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>
            <div class="kawaii-header__site-title">
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url(\'/\')); ?>" rel="home">
                        <?php bloginfo(\'name\'); ?> 🌸
                    </a>
                </h1>
                <?php if (get_bloginfo(\'description\')): ?>
                    <p class="site-description"><?php echo esc_html(get_bloginfo(\'description\')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        
        <nav class="kawaii-header__navigation">
            <?php
            wp_nav_menu([
                \'theme_location\' => \'menu-1\',
                \'menu_class\' => \'kawaii-nav-menu\',
                \'container\' => false,
                \'fallback_cb\' => false,
            ]);
            ?>
        </nav>
        
        <div class="kawaii-header__search">
            <button class="kawaii-search-toggle" aria-label="<?php esc_attr_e(\'Toggle search\', \'kawaii-ultra\'); ?>">
                🔍
            </button>
        </div>
    </div>
</header>';

        file_put_contents($headers_dir . '/header-simple.php', $simple_header);

        // Centered Header Template Part
        $centered_header = '<?php
/**
 * Template part for displaying a centered kawaii header
 *
 * @package KawaiiUltra\Theme
 */
?>
<header class="site-header kawaii-header kawaii-header--centered">
    <div class="kawaii-header__container">
        <div class="kawaii-header__top">
            <div class="kawaii-header__social">
                <!-- Social media icons would go here -->
                <span class="kawaii-social-icon">💕</span>
                <span class="kawaii-social-icon">🌸</span>
                <span class="kawaii-social-icon">✨</span>
            </div>
            <div class="kawaii-header__search">
                <button class="kawaii-search-toggle" aria-label="<?php esc_attr_e(\'Toggle search\', \'kawaii-ultra\'); ?>">
                    🔍
                </button>
            </div>
        </div>
        
        <div class="kawaii-header__main">
            <?php if (has_custom_logo()): ?>
                <div class="kawaii-header__logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>
            <div class="kawaii-header__site-title">
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url(\'/\')); ?>" rel="home">
                        <?php bloginfo(\'name\'); ?> 🦄
                    </a>
                </h1>
                <?php if (get_bloginfo(\'description\')): ?>
                    <p class="site-description"><?php echo esc_html(get_bloginfo(\'description\')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        
        <nav class="kawaii-header__navigation">
            <?php
            wp_nav_menu([
                \'theme_location\' => \'menu-1\',
                \'menu_class\' => \'kawaii-nav-menu kawaii-nav-menu--centered\',
                \'container\' => false,
                \'fallback_cb\' => false,
            ]);
            ?>
        </nav>
    </div>
</header>';

        file_put_contents($headers_dir . '/header-centered.php', $centered_header);
    }

    /**
     * Create footer variations
     *
     * @since 1.0.0
     * @return void
     */
    private function create_footer_variations(): void {
        $footers_dir = get_template_directory() . '/template-parts/footers';
        wp_mkdir_p($footers_dir);

        // Simple Footer Template Part
        $simple_footer = '<?php
/**
 * Template part for displaying a simple kawaii footer
 *
 * @package KawaiiUltra\Theme
 */
?>
<footer class="site-footer kawaii-footer kawaii-footer--simple">
    <div class="kawaii-footer__container">
        <div class="kawaii-footer__widgets">
            <?php if (is_active_sidebar(\'footer-1\')): ?>
                <div class="kawaii-footer__widget-area">
                    <?php dynamic_sidebar(\'footer-1\'); ?>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar(\'footer-2\')): ?>
                <div class="kawaii-footer__widget-area">
                    <?php dynamic_sidebar(\'footer-2\'); ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="kawaii-footer__bottom">
            <div class="kawaii-footer__copyright">
                <p>&copy; <?php echo date(\'Y\'); ?> <?php bloginfo(\'name\'); ?> - Made with 💖 and lots of kawaii!</p>
            </div>
            
            <nav class="kawaii-footer__navigation">
                <?php
                wp_nav_menu([
                    \'theme_location\' => \'footer\',
                    \'menu_class\' => \'kawaii-footer-menu\',
                    \'container\' => false,
                    \'fallback_cb\' => false,
                ]);
                ?>
            </nav>
        </div>
    </div>
</footer>';

        file_put_contents($footers_dir . '/footer-simple.php', $simple_footer);

        // Detailed Footer Template Part
        $detailed_footer = '<?php
/**
 * Template part for displaying a detailed kawaii footer
 *
 * @package KawaiiUltra\Theme
 */
?>
<footer class="site-footer kawaii-footer kawaii-footer--detailed">
    <div class="kawaii-footer__container">
        <div class="kawaii-footer__main">
            <div class="kawaii-footer__brand">
                <?php if (has_custom_logo()): ?>
                    <div class="kawaii-footer__logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php endif; ?>
                <h3 class="kawaii-footer__title"><?php bloginfo(\'name\'); ?> 🌸</h3>
                <p class="kawaii-footer__description">
                    Spreading kawaii vibes and positive energy across the internet, one cute pixel at a time! ✨
                </p>
            </div>
            
            <div class="kawaii-footer__widgets">
                <?php if (is_active_sidebar(\'footer-1\')): ?>
                    <div class="kawaii-footer__widget-area">
                        <?php dynamic_sidebar(\'footer-1\'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar(\'footer-2\')): ?>
                    <div class="kawaii-footer__widget-area">
                        <?php dynamic_sidebar(\'footer-2\'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="kawaii-footer__bottom">
            <div class="kawaii-footer__copyright">
                <p>&copy; <?php echo date(\'Y\'); ?> <?php bloginfo(\'name\'); ?> - Crafted with 💖, 🌸, and endless kawaii inspiration!</p>
            </div>
            
            <div class="kawaii-footer__social">
                <span class="kawaii-social-text">Follow us for more kawaii: </span>
                <span class="kawaii-social-icons">
                    <span class="kawaii-social-icon">🐱</span>
                    <span class="kawaii-social-icon">🦄</span>
                    <span class="kawaii-social-icon">🌈</span>
                </span>
            </div>
        </div>
    </div>
</footer>';

        file_put_contents($footers_dir . '/footer-detailed.php', $detailed_footer);
    }

    /**
     * Create sidebar variations
     *
     * @since 1.0.0
     * @return void
     */
    private function create_sidebar_variations(): void {
        $sidebars_dir = get_template_directory() . '/template-parts/sidebars';
        wp_mkdir_p($sidebars_dir);

        // Default Sidebar Template Part
        $default_sidebar = '<?php
/**
 * Template part for displaying the default kawaii sidebar
 *
 * @package KawaiiUltra\Theme
 */

if (!is_active_sidebar(\'sidebar-1\')) {
    return;
}
?>
<aside class="widget-area kawaii-sidebar kawaii-sidebar--default">
    <div class="kawaii-sidebar__header">
        <h2 class="kawaii-sidebar__title">Kawaii Corner 🌸</h2>
    </div>
    <div class="kawaii-sidebar__content">
        <?php dynamic_sidebar(\'sidebar-1\'); ?>
    </div>
</aside>';

        file_put_contents($sidebars_dir . '/sidebar-default.php', $default_sidebar);

        // Minimal Sidebar Template Part
        $minimal_sidebar = '<?php
/**
 * Template part for displaying a minimal kawaii sidebar
 *
 * @package KawaiiUltra\Theme
 */

if (!is_active_sidebar(\'sidebar-1\')) {
    return;
}
?>
<aside class="widget-area kawaii-sidebar kawaii-sidebar--minimal">
    <?php dynamic_sidebar(\'sidebar-1\'); ?>
</aside>';

        file_put_contents($sidebars_dir . '/sidebar-minimal.php', $minimal_sidebar);
    }

    /**
     * Enqueue template parts styles
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_template_parts_styles(): void {
        wp_enqueue_style(
            'kawaii-ultra-template-parts',
            get_template_directory_uri() . '/css/template-parts.css',
            [],
            wp_get_theme()->get('Version')
        );
    }

    /**
     * Get available template parts
     *
     * @since 1.0.0
     * @return array Available template parts.
     */
    public function get_available_template_parts(): array {
        return [
            'headers' => [
                'simple' => __('Simple Header', 'kawaii-ultra'),
                'centered' => __('Centered Header', 'kawaii-ultra'),
            ],
            'footers' => [
                'simple' => __('Simple Footer', 'kawaii-ultra'),
                'detailed' => __('Detailed Footer', 'kawaii-ultra'),
            ],
            'sidebars' => [
                'default' => __('Default Sidebar', 'kawaii-ultra'),
                'minimal' => __('Minimal Sidebar', 'kawaii-ultra'),
            ],
        ];
    }
}