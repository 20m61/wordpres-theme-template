<?php
/**
 * Block Variations Manager
 *
 * Handles registration and management of block variations for different Kawaii styles.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Blocks;

/**
 * Block Variations Manager class
 *
 * Manages block variations for different Kawaii design styles.
 */
class VariationsManager {

    /**
     * Initialize block variations manager
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('init', [$this, 'register_block_variations']);
    }

    /**
     * Register all block variations
     *
     * @since 1.0.0
     * @return void
     */
    public function register_block_variations(): void {
        // Register button variations
        $this->register_button_variations();

        // Register card variations
        $this->register_card_variations();

        // Register gallery variations
        $this->register_gallery_variations();

        // Register core block variations
        $this->register_core_block_variations();
    }

    /**
     * Register button variations
     *
     * @since 1.0.0
     * @return void
     */
    private function register_button_variations(): void {
        // Kawaii Primary Button
        register_block_variation('kawaii-ultra/button', [
            'name' => 'kawaii-primary',
            'title' => __('Kawaii Primary Button', 'kawaii-ultra'),
            'description' => __('A primary button with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'primary',
                'backgroundColor' => '#ff69b4',
                'textColor' => '#ffffff',
                'text' => 'Click me! ✨'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Secondary Button
        register_block_variation('kawaii-ultra/button', [
            'name' => 'kawaii-secondary',
            'title' => __('Kawaii Secondary Button', 'kawaii-ultra'),
            'description' => __('A secondary button with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'secondary',
                'backgroundColor' => '#ffb6c1',
                'textColor' => '#2d3748',
                'text' => 'Learn More 🌸'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Ghost Button
        register_block_variation('kawaii-ultra/button', [
            'name' => 'kawaii-ghost',
            'title' => __('Kawaii Ghost Button', 'kawaii-ultra'),
            'description' => __('A ghost/outline button with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'ghost',
                'backgroundColor' => 'transparent',
                'textColor' => '#ff69b4',
                'text' => 'Explore 🦄'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Round Button
        register_block_variation('kawaii-ultra/button', [
            'name' => 'kawaii-round',
            'title' => __('Kawaii Round Button', 'kawaii-ultra'),
            'description' => __('A round button perfect for kawaii designs', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'round',
                'backgroundColor' => '#ff1493',
                'textColor' => '#ffffff',
                'text' => '💖',
                'size' => 'small'
            ],
            'scope' => ['inserter', 'transform'],
        ]);
    }

    /**
     * Register card variations
     *
     * @since 1.0.0
     * @return void
     */
    private function register_card_variations(): void {
        // Kawaii Minimal Card
        register_block_variation('kawaii-ultra/card', [
            'name' => 'kawaii-minimal',
            'title' => __('Kawaii Minimal Card', 'kawaii-ultra'),
            'description' => __('A minimal card with kawaii touches', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'minimal',
                'backgroundColor' => '#ffffff',
                'textColor' => '#2d3748',
                'title' => 'Minimal Card 🌸',
                'content' => 'Clean and simple design with kawaii elements.'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Cute Card
        register_block_variation('kawaii-ultra/card', [
            'name' => 'kawaii-cute',
            'title' => __('Kawaii Cute Card', 'kawaii-ultra'),
            'description' => __('An extra cute card with full kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'cute',
                'backgroundColor' => '#fff0f8',
                'textColor' => '#2d3748',
                'title' => 'Super Cute Card 💕',
                'content' => 'Maximum cuteness overload with adorable styling!'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Pastel Card
        register_block_variation('kawaii-ultra/card', [
            'name' => 'kawaii-pastel',
            'title' => __('Kawaii Pastel Card', 'kawaii-ultra'),
            'description' => __('A card with soft pastel kawaii colors', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'pastel',
                'backgroundColor' => '#f0f8ff',
                'textColor' => '#4a5568',
                'title' => 'Pastel Dreams ✨',
                'content' => 'Soft and dreamy pastel colors for a gentle kawaii vibe.'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Product Card
        register_block_variation('kawaii-ultra/card', [
            'name' => 'kawaii-product',
            'title' => __('Kawaii Product Card', 'kawaii-ultra'),
            'description' => __('A product showcase card with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'product',
                'backgroundColor' => '#ffffff',
                'textColor' => '#2d3748',
                'title' => 'Kawaii Product 🛍️',
                'content' => 'Perfect for showcasing your kawaii products and merchandise.',
                'buttonText' => 'Buy Now',
                'buttonUrl' => '#'
            ],
            'scope' => ['inserter', 'transform'],
        ]);
    }

    /**
     * Register gallery variations
     *
     * @since 1.0.0
     * @return void
     */
    private function register_gallery_variations(): void {
        // Kawaii Grid Gallery
        register_block_variation('kawaii-ultra/gallery', [
            'name' => 'kawaii-grid',
            'title' => __('Kawaii Grid Gallery', 'kawaii-ultra'),
            'description' => __('A grid layout gallery with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'grid',
                'columns' => 3,
                'spacing' => 'medium',
                'showCaptions' => false,
                'lightbox' => true
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Masonry Gallery
        register_block_variation('kawaii-ultra/gallery', [
            'name' => 'kawaii-masonry',
            'title' => __('Kawaii Masonry Gallery', 'kawaii-ultra'),
            'description' => __('A masonry layout gallery with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'masonry',
                'columns' => 4,
                'spacing' => 'small',
                'showCaptions' => true,
                'lightbox' => true
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Carousel Gallery
        register_block_variation('kawaii-ultra/gallery', [
            'name' => 'kawaii-carousel',
            'title' => __('Kawaii Carousel Gallery', 'kawaii-ultra'),
            'description' => __('A carousel/slider gallery with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'carousel',
                'columns' => 1,
                'spacing' => 'none',
                'showCaptions' => true,
                'lightbox' => false
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Collage Gallery
        register_block_variation('kawaii-ultra/gallery', [
            'name' => 'kawaii-collage',
            'title' => __('Kawaii Collage Gallery', 'kawaii-ultra'),
            'description' => __('A creative collage layout with kawaii elements', 'kawaii-ultra'),
            'attributes' => [
                'style' => 'collage',
                'columns' => 2,
                'spacing' => 'large',
                'showCaptions' => false,
                'lightbox' => true
            ],
            'scope' => ['inserter', 'transform'],
        ]);
    }

    /**
     * Register core block variations
     *
     * @since 1.0.0
     * @return void
     */
    private function register_core_block_variations(): void {
        // Kawaii Heading variations
        register_block_variation('core/heading', [
            'name' => 'kawaii-heading',
            'title' => __('Kawaii Heading', 'kawaii-ultra'),
            'description' => __('A heading with kawaii styling and emoji', 'kawaii-ultra'),
            'attributes' => [
                'content' => 'Kawaii Heading ✨',
                'textColor' => '#ff69b4',
                'fontSize' => 'large',
                'className' => 'kawaii-heading'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Paragraph variations
        register_block_variation('core/paragraph', [
            'name' => 'kawaii-paragraph',
            'title' => __('Kawaii Paragraph', 'kawaii-ultra'),
            'description' => __('A paragraph with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'content' => 'This is a kawaii paragraph with cute styling! 🌸',
                'textColor' => '#4a5568',
                'className' => 'kawaii-paragraph'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Quote variations
        register_block_variation('core/quote', [
            'name' => 'kawaii-quote',
            'title' => __('Kawaii Quote', 'kawaii-ultra'),
            'description' => __('A quote block with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'value' => '<p>Life is better when you add a little kawaii magic! ✨</p>',
                'citation' => 'Kawaii Wisdom 💖',
                'className' => 'kawaii-quote'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Button (Core) variations
        register_block_variation('core/button', [
            'name' => 'kawaii-core-button',
            'title' => __('Kawaii Core Button', 'kawaii-ultra'),
            'description' => __('A WordPress core button with kawaii styling', 'kawaii-ultra'),
            'attributes' => [
                'text' => 'Kawaii Button 🌸',
                'backgroundColor' => 'pink',
                'textColor' => 'white',
                'className' => 'is-style-kawaii-button'
            ],
            'scope' => ['inserter', 'transform'],
        ]);

        // Kawaii Group variations for layout
        register_block_variation('core/group', [
            'name' => 'kawaii-section',
            'title' => __('Kawaii Section', 'kawaii-ultra'),
            'description' => __('A section wrapper with kawaii background', 'kawaii-ultra'),
            'attributes' => [
                'backgroundColor' => 'pale-pink',
                'className' => 'kawaii-section'
            ],
            'innerBlocks' => [
                ['core/heading', ['content' => 'Kawaii Section ✨']],
                ['core/paragraph', ['content' => 'Add your kawaii content here! 🌸']]
            ],
            'scope' => ['inserter'],
        ]);
    }

    /**
     * Get all registered variations
     *
     * @since 1.0.0
     * @return array All registered block variations.
     */
    public function get_registered_variations(): array {
        return [
            'kawaii-ultra/button' => [
                'kawaii-primary',
                'kawaii-secondary', 
                'kawaii-ghost',
                'kawaii-round'
            ],
            'kawaii-ultra/card' => [
                'kawaii-minimal',
                'kawaii-cute',
                'kawaii-pastel',
                'kawaii-product'
            ],
            'kawaii-ultra/gallery' => [
                'kawaii-grid',
                'kawaii-masonry',
                'kawaii-carousel',
                'kawaii-collage'
            ],
            'core/heading' => [
                'kawaii-heading'
            ],
            'core/paragraph' => [
                'kawaii-paragraph'
            ],
            'core/quote' => [
                'kawaii-quote'
            ],
            'core/button' => [
                'kawaii-core-button'
            ],
            'core/group' => [
                'kawaii-section'
            ]
        ];
    }
}