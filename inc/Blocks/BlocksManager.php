<?php
/**
 * Blocks Manager
 *
 * Handles registration and management of custom Gutenberg blocks.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Blocks;

/**
 * Blocks Manager class
 *
 * Manages custom Gutenberg blocks for the Kawaii design system.
 */
class BlocksManager {

    /**
     * Registered blocks
     *
     * @var array
     */
    private $blocks = [];

    /**
     * Initialize blocks manager
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('init', [$this, 'register_blocks']);
        add_action('enqueue_block_editor_assets', [$this, 'enqueue_block_editor_assets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_block_assets']);
    }

    /**
     * Register all custom blocks
     *
     * @since 1.0.0
     * @return void
     */
    public function register_blocks(): void {
        // Register individual blocks
        $this->register_kawaii_button_block();
        $this->register_kawaii_card_block();
        $this->register_kawaii_gallery_block();
    }

    /**
     * Register Kawaii Button Block
     *
     * @since 1.0.0
     * @return void
     */
    private function register_kawaii_button_block(): void {
        register_block_type('kawaii-ultra/button', [
            'attributes' => [
                'text' => [
                    'type' => 'string',
                    'default' => 'Click me!'
                ],
                'url' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'style' => [
                    'type' => 'string',
                    'default' => 'primary'
                ],
                'size' => [
                    'type' => 'string',
                    'default' => 'medium'
                ],
                'icon' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'backgroundColor' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'textColor' => [
                    'type' => 'string',
                    'default' => ''
                ]
            ],
            'render_callback' => [$this, 'render_kawaii_button_block'],
        ]);

        $this->blocks['kawaii-ultra/button'] = true;
    }

    /**
     * Register Kawaii Card Block
     *
     * @since 1.0.0
     * @return void
     */
    private function register_kawaii_card_block(): void {
        register_block_type('kawaii-ultra/card', [
            'attributes' => [
                'title' => [
                    'type' => 'string',
                    'default' => 'Card Title'
                ],
                'content' => [
                    'type' => 'string',
                    'default' => 'Card content goes here...'
                ],
                'imageUrl' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'imageAlt' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'buttonText' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'buttonUrl' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'style' => [
                    'type' => 'string',
                    'default' => 'default'
                ],
                'backgroundColor' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'textColor' => [
                    'type' => 'string',
                    'default' => ''
                ]
            ],
            'render_callback' => [$this, 'render_kawaii_card_block'],
        ]);

        $this->blocks['kawaii-ultra/card'] = true;
    }

    /**
     * Register Kawaii Gallery Block
     *
     * @since 1.0.0
     * @return void
     */
    private function register_kawaii_gallery_block(): void {
        register_block_type('kawaii-ultra/gallery', [
            'attributes' => [
                'images' => [
                    'type' => 'array',
                    'default' => []
                ],
                'columns' => [
                    'type' => 'number',
                    'default' => 3
                ],
                'style' => [
                    'type' => 'string',
                    'default' => 'grid'
                ],
                'spacing' => [
                    'type' => 'string',
                    'default' => 'medium'
                ],
                'showCaptions' => [
                    'type' => 'boolean',
                    'default' => false
                ],
                'lightbox' => [
                    'type' => 'boolean',
                    'default' => true
                ]
            ],
            'render_callback' => [$this, 'render_kawaii_gallery_block'],
        ]);

        $this->blocks['kawaii-ultra/gallery'] = true;
    }

    /**
     * Render Kawaii Button Block
     *
     * @since 1.0.0
     * @param array $attributes Block attributes.
     * @return string Block HTML output.
     */
    public function render_kawaii_button_block(array $attributes): string {
        $text = esc_html($attributes['text'] ?? 'Click me!');
        $url = esc_url($attributes['url'] ?? '');
        $style = sanitize_html_class($attributes['style'] ?? 'primary');
        $size = sanitize_html_class($attributes['size'] ?? 'medium');
        $icon = sanitize_html_class($attributes['icon'] ?? '');
        $bg_color = sanitize_hex_color($attributes['backgroundColor'] ?? '');
        $text_color = sanitize_hex_color($attributes['textColor'] ?? '');

        $classes = [
            'kawaii-button',
            'kawaii-button--' . $style,
            'kawaii-button--' . $size
        ];

        if ($icon) {
            $classes[] = 'kawaii-button--has-icon';
        }

        $style_attr = '';
        if ($bg_color) {
            $style_attr .= 'background-color: ' . $bg_color . ';';
        }
        if ($text_color) {
            $style_attr .= 'color: ' . $text_color . ';';
        }

        $tag = $url ? 'a' : 'button';
        $href_attr = $url ? 'href="' . $url . '"' : '';
        $style_attr = $style_attr ? 'style="' . $style_attr . '"' : '';

        ob_start();
        ?>
        <<?php echo $tag; ?> class="<?php echo esc_attr(implode(' ', $classes)); ?>" <?php echo $href_attr; ?> <?php echo $style_attr; ?>>
            <?php if ($icon): ?>
                <span class="kawaii-button__icon <?php echo esc_attr($icon); ?>"></span>
            <?php endif; ?>
            <span class="kawaii-button__text"><?php echo $text; ?></span>
        </<?php echo $tag; ?>>
        <?php
        return ob_get_clean();
    }

    /**
     * Render Kawaii Card Block
     *
     * @since 1.0.0
     * @param array $attributes Block attributes.
     * @return string Block HTML output.
     */
    public function render_kawaii_card_block(array $attributes): string {
        $title = esc_html($attributes['title'] ?? 'Card Title');
        $content = wp_kses_post($attributes['content'] ?? 'Card content goes here...');
        $image_url = esc_url($attributes['imageUrl'] ?? '');
        $image_alt = esc_attr($attributes['imageAlt'] ?? '');
        $button_text = esc_html($attributes['buttonText'] ?? '');
        $button_url = esc_url($attributes['buttonUrl'] ?? '');
        $style = sanitize_html_class($attributes['style'] ?? 'default');
        $bg_color = sanitize_hex_color($attributes['backgroundColor'] ?? '');
        $text_color = sanitize_hex_color($attributes['textColor'] ?? '');

        $classes = [
            'kawaii-card',
            'kawaii-card--' . $style
        ];

        if ($image_url) {
            $classes[] = 'kawaii-card--has-image';
        }

        $style_attr = '';
        if ($bg_color) {
            $style_attr .= 'background-color: ' . $bg_color . ';';
        }
        if ($text_color) {
            $style_attr .= 'color: ' . $text_color . ';';
        }

        ob_start();
        ?>
        <div class="<?php echo esc_attr(implode(' ', $classes)); ?>" <?php echo $style_attr ? 'style="' . $style_attr . '"' : ''; ?>>
            <?php if ($image_url): ?>
                <div class="kawaii-card__image">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
                </div>
            <?php endif; ?>
            <div class="kawaii-card__content">
                <h3 class="kawaii-card__title"><?php echo $title; ?></h3>
                <div class="kawaii-card__text"><?php echo $content; ?></div>
                <?php if ($button_text && $button_url): ?>
                    <div class="kawaii-card__actions">
                        <a href="<?php echo $button_url; ?>" class="kawaii-button kawaii-button--primary">
                            <?php echo $button_text; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Render Kawaii Gallery Block
     *
     * @since 1.0.0
     * @param array $attributes Block attributes.
     * @return string Block HTML output.
     */
    public function render_kawaii_gallery_block(array $attributes): string {
        $images = $attributes['images'] ?? [];
        $columns = max(1, min(6, (int)($attributes['columns'] ?? 3)));
        $style = sanitize_html_class($attributes['style'] ?? 'grid');
        $spacing = sanitize_html_class($attributes['spacing'] ?? 'medium');
        $show_captions = (bool)($attributes['showCaptions'] ?? false);
        $lightbox = (bool)($attributes['lightbox'] ?? true);

        if (empty($images)) {
            return '<p class="kawaii-gallery--empty">' . esc_html__('No images selected for gallery.', 'kawaii-ultra') . '</p>';
        }

        $classes = [
            'kawaii-gallery',
            'kawaii-gallery--' . $style,
            'kawaii-gallery--spacing-' . $spacing,
            'kawaii-gallery--columns-' . $columns
        ];

        if ($lightbox) {
            $classes[] = 'kawaii-gallery--lightbox';
        }

        ob_start();
        ?>
        <div class="<?php echo esc_attr(implode(' ', $classes)); ?>">
            <?php foreach ($images as $image): ?>
                <div class="kawaii-gallery__item">
                    <?php if ($lightbox): ?>
                        <a href="<?php echo esc_url($image['url'] ?? ''); ?>" class="kawaii-gallery__link" data-lightbox="kawaii-gallery">
                    <?php endif; ?>
                        <img 
                            src="<?php echo esc_url($image['url'] ?? ''); ?>" 
                            alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                            class="kawaii-gallery__image"
                        />
                    <?php if ($lightbox): ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($show_captions && !empty($image['caption'])): ?>
                        <div class="kawaii-gallery__caption">
                            <?php echo wp_kses_post($image['caption']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Enqueue block editor assets
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_block_editor_assets(): void {
        // Load Vite manifest for asset URLs
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
        $is_dev = defined('WP_DEBUG') && WP_DEBUG && !file_exists($manifest_path);
        
        if ($is_dev) {
            // Development mode - load from Vite dev server
            wp_enqueue_script(
                'kawaii-ultra-blocks',
                'http://localhost:3000/src/js/blocks.js',
                ['wp-blocks', 'wp-components', 'wp-element', 'wp-editor'],
                null,
                true
            );
            
            wp_enqueue_style(
                'kawaii-ultra-blocks-editor',
                'http://localhost:3000/src/css/blocks-editor.scss',
                [],
                null
            );
        } else {
            // Production mode - load compiled assets
            $manifest = file_exists($manifest_path) ? json_decode(file_get_contents($manifest_path), true) : null;
            
            if ($manifest) {
                $blocks_js = $manifest['src/js/blocks.js']['file'] ?? null;
                $blocks_editor_css = $manifest['src/css/blocks-editor.scss']['file'] ?? null;
                
                if ($blocks_js) {
                    wp_enqueue_script(
                        'kawaii-ultra-blocks',
                        get_template_directory_uri() . '/dist/' . $blocks_js,
                        ['wp-blocks', 'wp-components', 'wp-element', 'wp-editor'],
                        null,
                        true
                    );
                }
                
                if ($blocks_editor_css) {
                    wp_enqueue_style(
                        'kawaii-ultra-blocks-editor',
                        get_template_directory_uri() . '/dist/' . $blocks_editor_css,
                        [],
                        null
                    );
                }
            }
        }
    }

    /**
     * Enqueue block frontend assets
     *
     * @since 1.0.0
     * @return void
     */
    public function enqueue_block_assets(): void {
        // Load Vite manifest for asset URLs
        $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
        $is_dev = defined('WP_DEBUG') && WP_DEBUG && !file_exists($manifest_path);
        
        if ($is_dev) {
            // Development mode - load from Vite dev server
            wp_enqueue_style(
                'kawaii-ultra-blocks',
                'http://localhost:3000/src/css/blocks.scss',
                [],
                null
            );
            
            wp_enqueue_script(
                'kawaii-ultra-blocks-frontend',
                'http://localhost:3000/src/js/blocks-frontend.js',
                ['jquery'],
                null,
                true
            );
        } else {
            // Production mode - load compiled assets
            $manifest = file_exists($manifest_path) ? json_decode(file_get_contents($manifest_path), true) : null;
            
            if ($manifest) {
                $blocks_css = $manifest['src/css/blocks.scss']['file'] ?? null;
                $blocks_frontend_js = $manifest['src/js/blocks-frontend.js']['file'] ?? null;
                
                if ($blocks_css) {
                    wp_enqueue_style(
                        'kawaii-ultra-blocks',
                        get_template_directory_uri() . '/dist/' . $blocks_css,
                        [],
                        null
                    );
                }
                
                if ($blocks_frontend_js) {
                    wp_enqueue_script(
                        'kawaii-ultra-blocks-frontend',
                        get_template_directory_uri() . '/dist/' . $blocks_frontend_js,
                        ['jquery'],
                        null,
                        true
                    );
                }
            }
        }
    }

    /**
     * Get registered blocks
     *
     * @since 1.0.0
     * @return array Registered blocks.
     */
    public function get_registered_blocks(): array {
        return $this->blocks;
    }
}