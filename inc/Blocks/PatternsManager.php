<?php
/**
 * Block Patterns Manager
 *
 * Handles registration and management of custom block patterns.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Blocks;

/**
 * Block Patterns Manager class
 *
 * Manages custom block patterns for common layouts.
 */
class PatternsManager {

    /**
     * Initialize patterns manager
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('init', [$this, 'register_patterns']);
    }

    /**
     * Register all block patterns
     *
     * @since 1.0.0
     * @return void
     */
    public function register_patterns(): void {
        // Register pattern categories first
        $this->register_pattern_categories();

        // Register individual patterns
        $this->register_hero_patterns();
        $this->register_cta_patterns();
        $this->register_feature_patterns();
    }

    /**
     * Register pattern categories
     *
     * @since 1.0.0
     * @return void
     */
    private function register_pattern_categories(): void {
        register_block_pattern_category('kawaii-hero', [
            'label' => __('Kawaii Hero Sections', 'kawaii-ultra'),
        ]);

        register_block_pattern_category('kawaii-cta', [
            'label' => __('Kawaii Call-to-Action', 'kawaii-ultra'),
        ]);

        register_block_pattern_category('kawaii-features', [
            'label' => __('Kawaii Features', 'kawaii-ultra'),
        ]);
    }

    /**
     * Register hero section patterns
     *
     * @since 1.0.0
     * @return void
     */
    private function register_hero_patterns(): void {
        // Simple Hero Pattern
        register_block_pattern('kawaii-ultra/hero-simple', [
            'title' => __('Simple Hero Section', 'kawaii-ultra'),
            'description' => __('A simple hero section with title, subtitle, and button.', 'kawaii-ultra'),
            'categories' => ['kawaii-hero'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}},"color":{"background":"#ffb6c1"}},"className":"kawaii-hero-simple"} -->
<div class="wp-block-group alignfull kawaii-hero-simple has-background" style="background-color:#ffb6c1;padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"color":{"text":"#2d3748"}}} -->
<h1 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;font-size:3rem;font-weight:700">Welcome to Kawaii World! 🌸</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"},"color":{"text":"#4a5568"},"spacing":{"margin":{"top":"1rem","bottom":"2rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-top:1rem;margin-bottom:2rem;font-size:1.25rem">Discover the cutest and most adorable content that will make your day brighter and filled with joy.</p>
<!-- /wp:paragraph -->

<!-- wp:kawaii-ultra/button {"text":"Get Started ✨","style":"primary","size":"large","backgroundColor":"#ff69b4","textColor":"#ffffff"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // Hero with Image Pattern
        register_block_pattern('kawaii-ultra/hero-with-image', [
            'title' => __('Hero with Background Image', 'kawaii-ultra'),
            'description' => __('A hero section with background image and overlay content.', 'kawaii-ultra'),
            'categories' => ['kawaii-hero'],
            'content' => '<!-- wp:cover {"url":"","dimRatio":30,"overlayColor":"pink","minHeight":500,"align":"full","className":"kawaii-hero-image"} -->
<div class="wp-block-cover alignfull kawaii-hero-image" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-pink-background-color has-background-dim-30 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"2.5rem","fontWeight":"800"},"color":{"text":"#ffffff"}}} -->
<h1 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff;font-size:2.5rem;font-weight:800">Kawaii Dreams Come True 🦄</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem"},"color":{"text":"#ffffff"},"spacing":{"margin":{"top":"1rem","bottom":"2rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;margin-top:1rem;margin-bottom:2rem;font-size:1.125rem">Join our magical community and experience the most kawaii adventures ever!</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"pink","style":{"border":{"radius":"25px"},"typography":{"fontWeight":"600"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-pink-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:25px;font-weight:600">Explore Now 🌟</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:cover -->',
        ]);
    }

    /**
     * Register call-to-action patterns
     *
     * @since 1.0.0
     * @return void
     */
    private function register_cta_patterns(): void {
        // Simple CTA Pattern
        register_block_pattern('kawaii-ultra/cta-simple', [
            'title' => __('Simple Call-to-Action', 'kawaii-ultra'),
            'description' => __('A simple call-to-action section with centered content.', 'kawaii-ultra'),
            'categories' => ['kawaii-cta'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"}},"color":{"background":"#f7fafc"}},"className":"kawaii-cta-simple"} -->
<div class="wp-block-group alignfull kawaii-cta-simple has-background" style="background-color:#f7fafc;padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"},"color":{"text":"#2d3748"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;font-size:2rem;font-weight:700">Ready for Something Kawaii? 💖</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem"},"color":{"text":"#4a5568"},"spacing":{"margin":{"top":"1rem","bottom":"2rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-top:1rem;margin-bottom:2rem;font-size:1.125rem">Join thousands of others who have discovered the magic of kawaii culture and lifestyle.</p>
<!-- /wp:paragraph -->

<!-- wp:kawaii-ultra/button {"text":"Join Us Now! 🎀","style":"primary","size":"large","backgroundColor":"#ff1493","textColor":"#ffffff"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // CTA with Cards Pattern
        register_block_pattern('kawaii-ultra/cta-with-cards', [
            'title' => __('CTA with Feature Cards', 'kawaii-ultra'),
            'description' => __('Call-to-action section with feature cards highlighting benefits.', 'kawaii-ultra'),
            'categories' => ['kawaii-cta'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}},"color":{"background":"linear-gradient(135deg, #667eea 0%, #764ba2 100%)"}},"className":"kawaii-cta-cards"} -->
<div class="wp-block-group alignfull kawaii-cta-cards has-background" style="background:linear-gradient(135deg, #667eea 0%, #764ba2 100%);padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2.5rem","fontWeight":"800"},"color":{"text":"#ffffff"},"spacing":{"margin":{"bottom":"3rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff;margin-bottom:3rem;font-size:2.5rem;font-weight:800">Why Choose Kawaii? ✨</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"Super Cute 🌸","content":"Everything is designed with maximum cuteness in mind to bring joy to your daily life.","style":"kawaii","backgroundColor":"#ffffff","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"Easy to Use 🎀","content":"Simple and intuitive interface that anyone can use without any technical knowledge.","style":"kawaii","backgroundColor":"#ffffff","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"Community Love 💕","content":"Join a loving community of kawaii enthusiasts from around the world.","style":"kawaii","backgroundColor":"#ffffff","textColor":"#2d3748"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"3rem"}}}} -->
<div class="wp-block-buttons" style="margin-top:3rem"><!-- wp:button {"backgroundColor":"white","textColor":"purple","style":{"border":{"radius":"30px"},"typography":{"fontWeight":"700","fontSize":"1.125rem"}}} -->
<div class="wp-block-button has-custom-font-size" style="font-size:1.125rem"><a class="wp-block-button__link has-purple-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:30px;font-weight:700">Start Your Journey 🚀</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);
    }

    /**
     * Register feature showcase patterns
     *
     * @since 1.0.0
     * @return void
     */
    private function register_feature_patterns(): void {
        // Feature Grid Pattern
        register_block_pattern('kawaii-ultra/features-grid', [
            'title' => __('Features Grid', 'kawaii-ultra'),
            'description' => __('A grid layout showcasing features with icons and descriptions.', 'kawaii-ultra'),
            'categories' => ['kawaii-features'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}}},"className":"kawaii-features-grid"} -->
<div class="wp-block-group alignfull kawaii-features-grid" style="padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2.5rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"3rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:3rem;font-size:2.5rem;font-weight:700">Amazing Features 🌟</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"🎨 Creative Design","content":"Beautiful and creative designs that stand out from the crowd and capture attention.","style":"minimal","backgroundColor":"#fff5f8","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"⚡ Lightning Fast","content":"Optimized for speed and performance to provide the best user experience possible.","style":"minimal","backgroundColor":"#f0fff4","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"📱 Mobile Ready","content":"Perfectly responsive design that looks great on all devices and screen sizes.","style":"minimal","backgroundColor":"#f0f8ff","textColor":"#2d3748"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"2rem"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:2rem"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"🔒 Secure & Safe","content":"Built with security in mind, keeping your data protected at all times.","style":"minimal","backgroundColor":"#fffacd","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"🌈 Customizable","content":"Tons of customization options to make it uniquely yours and match your style.","style":"minimal","backgroundColor":"#f5f0ff","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"💖 Support","content":"Friendly and helpful support team ready to assist you whenever you need help.","style":"minimal","backgroundColor":"#fff0f5","textColor":"#2d3748"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // Feature with Gallery Pattern
        register_block_pattern('kawaii-ultra/features-gallery', [
            'title' => __('Features with Gallery', 'kawaii-ultra'),
            'description' => __('Feature section combined with an image gallery showcase.', 'kawaii-ultra'),
            'categories' => ['kawaii-features'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}}},"className":"kawaii-features-gallery"} -->
<div class="wp-block-group alignfull kawaii-features-gallery" style="padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2.5rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:2rem;font-size:2.5rem;font-weight:700">See It in Action 📸</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem"},"color":{"text":"#4a5568"},"spacing":{"margin":{"bottom":"3rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-bottom:3rem;font-size:1.125rem">Check out these amazing examples of kawaii design in action!</p>
<!-- /wp:paragraph -->

<!-- wp:kawaii-ultra/gallery {"columns":3,"style":"kawaii","spacing":"large","showCaptions":true,"lightbox":true} /-->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"backgroundColor":"pink","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-pink-color has-alpha-channel-opacity has-pink-background-color has-background is-style-wide" style="margin-top:3rem;margin-bottom:3rem"/>
<!-- /wp:separator -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.875rem","fontWeight":"600"},"color":{"text":"#2d3748"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#2d3748;font-size:1.875rem;font-weight:600">Why Choose Our Gallery? 🎭</h3>
<!-- /wp:heading -->

<!-- wp:list {"style":{"color":{"text":"#4a5568"},"typography":{"fontSize":"1.125rem"}}} -->
<ul class="has-text-color" style="color:#4a5568;font-size:1.125rem"><li>🌸 Beautifully curated kawaii content</li><li>✨ High-quality images and graphics</li><li>🎀 Easy-to-browse categories</li><li>💕 Regular updates with new content</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:kawaii-ultra/button {"text":"View Full Gallery 🖼️","style":"secondary","size":"large","backgroundColor":"#ff69b4","textColor":"#ffffff"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);
    }
}