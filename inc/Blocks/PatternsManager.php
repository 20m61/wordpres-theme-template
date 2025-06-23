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
        $this->register_testimonial_patterns();
        $this->register_team_patterns();
        
        // Register pattern variations
        $this->register_pattern_variations();
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

        register_block_pattern_category('kawaii-testimonials', [
            'label' => __('Kawaii Testimonials', 'kawaii-ultra'),
        ]);

        register_block_pattern_category('kawaii-team', [
            'label' => __('Kawaii Team', 'kawaii-ultra'),
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

    /**
     * Register testimonial patterns
     *
     * @since 1.0.0
     * @return void
     */
    private function register_testimonial_patterns(): void {
        // Testimonial Carousel Pattern
        register_block_pattern('kawaii-ultra/testimonials-carousel', [
            'title' => __('Testimonial Carousel', 'kawaii-ultra'),
            'description' => __('A kawaii testimonial carousel with cute customer reviews.', 'kawaii-ultra'),
            'categories' => ['kawaii-testimonials'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}},"color":{"background":"linear-gradient(135deg, #fff0f5 0%, #f0f8ff 100%)"}},"className":"kawaii-testimonials-carousel"} -->
<div class="wp-block-group alignfull kawaii-testimonials-carousel has-background" style="background:linear-gradient(135deg, #fff0f5 0%, #f0f8ff 100%);padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2.5rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"3rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:3rem;font-size:2.5rem;font-weight:700">What Our Kawaii Community Says 💕</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"color":{"background":"#ffffff"},"border":{"radius":"20px"}},"className":"kawaii-testimonial-card","shadow":"kawaii-soft"} -->
<div class="wp-block-group kawaii-testimonial-card has-background" style="background-color:#ffffff;border-radius:20px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic"},"color":{"text":"#4a5568"},"spacing":{"margin":{"bottom":"1.5rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-bottom:1.5rem;font-size:1.125rem;font-style:italic">"This theme is absolutely adorable! It made my website so kawaii and my visitors love it. The pink colors and cute design elements are perfect! 🌸"</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontWeight":"600"},"color":{"text":"#ff69b4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff69b4;font-size:1rem;font-weight:600">Sakura M.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"#718096"}}} -->
<p class="has-text-align-center has-text-color" style="color:#718096;font-size:0.875rem">Kawaii Blogger</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"color":{"background":"#ffffff"},"border":{"radius":"20px"}},"className":"kawaii-testimonial-card","shadow":"kawaii-soft"} -->
<div class="wp-block-group kawaii-testimonial-card has-background" style="background-color:#ffffff;border-radius:20px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic"},"color":{"text":"#4a5568"},"spacing":{"margin":{"bottom":"1.5rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-bottom:1.5rem;font-size:1.125rem;font-style:italic">"The block patterns are amazing! I can create beautiful kawaii layouts in minutes. My clients are so happy with their cute websites! ✨"</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontWeight":"600"},"color":{"text":"#ff69b4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff69b4;font-size:1rem;font-weight:600">Yuki T.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"#718096"}}} -->
<p class="has-text-align-center has-text-color" style="color:#718096;font-size:0.875rem">Web Designer</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"color":{"background":"#ffffff"},"border":{"radius":"20px"}},"className":"kawaii-testimonial-card","shadow":"kawaii-soft"} -->
<div class="wp-block-group kawaii-testimonial-card has-background" style="background-color:#ffffff;border-radius:20px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem","fontStyle":"italic"},"color":{"text":"#4a5568"},"spacing":{"margin":{"bottom":"1.5rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-bottom:1.5rem;font-size:1.125rem;font-style:italic">"Such a delightful theme! The kawaii aesthetic is perfectly executed. My online shop looks adorable and sales have increased! 🛍️"</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontWeight":"600"},"color":{"text":"#ff69b4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff69b4;font-size:1rem;font-weight:600">Hana K.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"#718096"}}} -->
<p class="has-text-align-center has-text-color" style="color:#718096;font-size:0.875rem">Shop Owner</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"3rem","bottom":"2rem"}}},"backgroundColor":"kawaii-pink","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-kawaii-pink-color has-alpha-channel-opacity has-kawaii-pink-background-color has-background is-style-wide" style="margin-top:3rem;margin-bottom:2rem"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem"},"color":{"text":"#718096"}}} -->
<p class="has-text-align-center has-text-color" style="color:#718096;font-size:1rem">Join our kawaii community and create your own adorable website! 🌟</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // Simple Testimonials Pattern
        register_block_pattern('kawaii-ultra/testimonials-simple', [
            'title' => __('Simple Testimonials', 'kawaii-ultra'),
            'description' => __('A simple testimonial section with kawaii styling.', 'kawaii-ultra'),
            'categories' => ['kawaii-testimonials'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"}},"color":{"background":"#fff5f8"}},"className":"kawaii-testimonials-simple"} -->
<div class="wp-block-group alignfull kawaii-testimonials-simple has-background" style="background-color:#fff5f8;padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:2rem;font-size:2rem;font-weight:700">Kawaii Love 💖</h2>
<!-- /wp:heading -->

<!-- wp:quote {"align":"center","style":{"typography":{"fontSize":"1.5rem","fontStyle":"italic"},"color":{"text":"#4a5568"},"border":{"color":"#ff69b4","width":"3px","radius":"15px"},"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}}}} -->
<blockquote class="wp-block-quote has-text-align-center has-text-color has-border-color" style="border-color:#ff69b4;border-width:3px;border-radius:15px;color:#4a5568;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem;font-size:1.5rem;font-style:italic"><p>"This kawaii theme transformed my website into a magical place that brings joy to everyone who visits!"</p><cite style="color:#ff69b4;font-weight:600">— Kawaii Community Member 🌸</cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);
    }

    /**
     * Register team member patterns
     *
     * @since 1.0.0
     * @return void
     */
    private function register_team_patterns(): void {
        // Team Member Cards Pattern
        register_block_pattern('kawaii-ultra/team-cards', [
            'title' => __('Team Member Cards', 'kawaii-ultra'),
            'description' => __('Kawaii team member cards with photos and bios.', 'kawaii-ultra'),
            'categories' => ['kawaii-team'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}}},"className":"kawaii-team-cards"} -->
<div class="wp-block-group alignfull kawaii-team-cards" style="padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2.5rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:1rem;font-size:2.5rem;font-weight:700">Meet Our Kawaii Team 🌟</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem"},"color":{"text":"#4a5568"},"spacing":{"margin":{"bottom":"3rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-bottom:3rem;font-size:1.125rem">The adorable people behind the magic who make everything kawaii possible!</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"color":{"background":"linear-gradient(135deg, #ffb6c1 0%, #ffc0cb 100%)"},"border":{"radius":"20px"}},"className":"kawaii-team-card","shadow":"kawaii-medium"} -->
<div class="wp-block-group kawaii-team-card has-background" style="background:linear-gradient(135deg, #ffb6c1 0%, #ffc0cb 100%);border-radius:20px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"medium","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-medium is-resized has-custom-border"><img src="" alt="Team Member" style="border-radius:50%;width:120px;height:120px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"},"color":{"text":"#2d3748"},"spacing":{"margin":{"top":"1rem","bottom":"0.5rem"}}}} -->
<h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-top:1rem;margin-bottom:0.5rem;font-size:1.5rem;font-weight:600">Sakura Kawaii 🌸</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontWeight":"500"},"color":{"text":"#ff1493"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff1493;margin-bottom:1rem;font-size:1rem;font-weight:500">Kawaii Design Lead</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem"},"color":{"text":"#4a5568"}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;font-size:0.95rem">Creates the most adorable designs that bring smiles to everyone. Loves pink, unicorns, and making the web a cuter place! ✨</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"color":{"background":"linear-gradient(135deg, #dda0dd 0%, #da70d6 100%)"},"border":{"radius":"20px"}},"className":"kawaii-team-card","shadow":"kawaii-medium"} -->
<div class="wp-block-group kawaii-team-card has-background" style="background:linear-gradient(135deg, #dda0dd 0%, #da70d6 100%);border-radius:20px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"medium","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-medium is-resized has-custom-border"><img src="" alt="Team Member" style="border-radius:50%;width:120px;height:120px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"},"color":{"text":"#2d3748"},"spacing":{"margin":{"top":"1rem","bottom":"0.5rem"}}}} -->
<h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-top:1rem;margin-bottom:0.5rem;font-size:1.5rem;font-weight:600">Yuki Neko 🐱</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontWeight":"500"},"color":{"text":"#ffffff"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;margin-bottom:1rem;font-size:1rem;font-weight:500">Development Wizard</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:0.95rem">Codes magical experiences with kawaii flair. Expert in making websites both beautiful and functional. Cat lover! 🎀</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"color":{"background":"linear-gradient(135deg, #87ceeb 0%, #add8e6 100%)"},"border":{"radius":"20px"}},"className":"kawaii-team-card","shadow":"kawaii-medium"} -->
<div class="wp-block-group kawaii-team-card has-background" style="background:linear-gradient(135deg, #87ceeb 0%, #add8e6 100%);border-radius:20px;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:image {"align":"center","width":"120px","height":"120px","sizeSlug":"medium","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-medium is-resized has-custom-border"><img src="" alt="Team Member" style="border-radius:50%;width:120px;height:120px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"600"},"color":{"text":"#2d3748"},"spacing":{"margin":{"top":"1rem","bottom":"0.5rem"}}}} -->
<h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-top:1rem;margin-bottom:0.5rem;font-size:1.5rem;font-weight:600">Hana Mochi 🍡</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1rem","fontWeight":"500"},"color":{"text":"#ffffff"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;margin-bottom:1rem;font-size:1rem;font-weight:500">Kawaii Community Manager</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:0.95rem">Spreads kawaii joy and connects with our amazing community. Always ready to help with the sweetest smile! 🌈</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // Team Grid Compact Pattern
        register_block_pattern('kawaii-ultra/team-grid-compact', [
            'title' => __('Team Grid (Compact)', 'kawaii-ultra'),
            'description' => __('Compact kawaii team grid with minimal information.', 'kawaii-ultra'),
            'categories' => ['kawaii-team'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"}},"color":{"background":"#f0f8ff"}},"className":"kawaii-team-grid-compact"} -->
<div class="wp-block-group alignfull kawaii-team-grid-compact has-background" style="background-color:#f0f8ff;padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:2rem;font-size:2rem;font-weight:700">Our Kawaii Squad 💫</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#ffffff"},"border":{"radius":"15px"}},"className":"kawaii-team-compact-card","shadow":"kawaii-soft"} -->
<div class="wp-block-group kawaii-team-compact-card has-background" style="background-color:#ffffff;border-radius:15px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:image {"align":"center","width":"80px","height":"80px","sizeSlug":"medium","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-medium is-resized has-custom-border"><img src="" alt="Team Member" style="border-radius:50%;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"600"},"color":{"text":"#2d3748"},"spacing":{"margin":{"top":"1rem","bottom":"0.25rem"}}}} -->
<h4 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-top:1rem;margin-bottom:0.25rem;font-size:1.125rem;font-weight:600">Miku ✨</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"#ff69b4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff69b4;font-size:0.875rem">Designer</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#ffffff"},"border":{"radius":"15px"}},"className":"kawaii-team-compact-card","shadow":"kawaii-soft"} -->
<div class="wp-block-group kawaii-team-compact-card has-background" style="background-color:#ffffff;border-radius:15px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:image {"align":"center","width":"80px","height":"80px","sizeSlug":"medium","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-medium is-resized has-custom-border"><img src="" alt="Team Member" style="border-radius:50%;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"600"},"color":{"text":"#2d3748"},"spacing":{"margin":{"top":"1rem","bottom":"0.25rem"}}}} -->
<h4 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-top:1rem;margin-bottom:0.25rem;font-size:1.125rem;font-weight:600">Rin 🎀</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"#ff69b4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff69b4;font-size:0.875rem">Developer</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#ffffff"},"border":{"radius":"15px"}},"className":"kawaii-team-compact-card","shadow":"kawaii-soft"} -->
<div class="wp-block-group kawaii-team-compact-card has-background" style="background-color:#ffffff;border-radius:15px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:image {"align":"center","width":"80px","height":"80px","sizeSlug":"medium","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-medium is-resized has-custom-border"><img src="" alt="Team Member" style="border-radius:50%;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"600"},"color":{"text":"#2d3748"},"spacing":{"margin":{"top":"1rem","bottom":"0.25rem"}}}} -->
<h4 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-top:1rem;margin-bottom:0.25rem;font-size:1.125rem;font-weight:600">Len 🌟</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"#ff69b4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff69b4;font-size:0.875rem">Manager</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#ffffff"},"border":{"radius":"15px"}},"className":"kawaii-team-compact-card","shadow":"kawaii-soft"} -->
<div class="wp-block-group kawaii-team-compact-card has-background" style="background-color:#ffffff;border-radius:15px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:image {"align":"center","width":"80px","height":"80px","sizeSlug":"medium","style":{"border":{"radius":"50%"}}} -->
<figure class="wp-block-image aligncenter size-medium is-resized has-custom-border"><img src="" alt="Team Member" style="border-radius:50%;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"600"},"color":{"text":"#2d3748"},"spacing":{"margin":{"top":"1rem","bottom":"0.25rem"}}}} -->
<h4 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-top:1rem;margin-bottom:0.25rem;font-size:1.125rem;font-weight:600">Kaito 💖</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"#ff69b4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ff69b4;font-size:0.875rem">Support</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);
    }

    /**
     * Register pattern variations with different color schemes and layouts
     *
     * @since 1.0.0
     * @return void
     */
    private function register_pattern_variations(): void {
        // Hero Section - Purple Theme Variation
        register_block_pattern('kawaii-ultra/hero-simple-purple', [
            'title' => __('Hero Section (Purple Theme)', 'kawaii-ultra'),
            'description' => __('A simple hero section with purple kawaii color scheme.', 'kawaii-ultra'),
            'categories' => ['kawaii-hero'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}},"color":{"background":"linear-gradient(135deg, #dda0dd 0%, #da70d6 100%)"}},"className":"kawaii-hero-simple kawaii-purple-theme"} -->
<div class="wp-block-group alignfull kawaii-hero-simple kawaii-purple-theme has-background" style="background:linear-gradient(135deg, #dda0dd 0%, #da70d6 100%);padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"color":{"text":"#ffffff"}}} -->
<h1 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff;font-size:3rem;font-weight:700">Welcome to Kawaii World! 🦄</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"},"color":{"text":"#ffffff"},"spacing":{"margin":{"top":"1rem","bottom":"2rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;margin-top:1rem;margin-bottom:2rem;font-size:1.25rem">Discover the cutest and most adorable content in our magical purple kawaii universe.</p>
<!-- /wp:paragraph -->

<!-- wp:kawaii-ultra/button {"text":"Explore Magic ✨","style":"primary","size":"large","backgroundColor":"#ffffff","textColor":"#da70d6"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // Hero Section - Blue Theme Variation
        register_block_pattern('kawaii-ultra/hero-simple-blue', [
            'title' => __('Hero Section (Blue Theme)', 'kawaii-ultra'),
            'description' => __('A simple hero section with blue kawaii color scheme.', 'kawaii-ultra'),
            'categories' => ['kawaii-hero'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}},"color":{"background":"linear-gradient(135deg, #87ceeb 0%, #add8e6 100%)"}},"className":"kawaii-hero-simple kawaii-blue-theme"} -->
<div class="wp-block-group alignfull kawaii-hero-simple kawaii-blue-theme has-background" style="background:linear-gradient(135deg, #87ceeb 0%, #add8e6 100%);padding-top:4rem;padding-right:2rem;padding-bottom:4rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"color":{"text":"#2d3748"}}} -->
<h1 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;font-size:3rem;font-weight:700">Welcome to Kawaii World! 🌊</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"},"color":{"text":"#4a5568"},"spacing":{"margin":{"top":"1rem","bottom":"2rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-top:1rem;margin-bottom:2rem;font-size:1.25rem">Dive into the serene and peaceful kawaii ocean of wonderful content.</p>
<!-- /wp:paragraph -->

<!-- wp:kawaii-ultra/button {"text":"Dive In 🌊","style":"primary","size":"large","backgroundColor":"#2d3748","textColor":"#ffffff"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // CTA Section - Compact Variation
        register_block_pattern('kawaii-ultra/cta-simple-compact', [
            'title' => __('CTA Section (Compact)', 'kawaii-ultra'),
            'description' => __('A compact call-to-action section with minimal content.', 'kawaii-ultra'),
            'categories' => ['kawaii-cta'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"2rem","bottom":"2rem","left":"2rem","right":"2rem"}},"color":{"background":"#fff0f5"}},"className":"kawaii-cta-simple kawaii-compact"} -->
<div class="wp-block-group alignfull kawaii-cta-simple kawaii-compact has-background" style="background-color:#fff0f5;padding-top:2rem;padding-right:2rem;padding-bottom:2rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"500px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"1.5rem","fontWeight":"700"},"color":{"text":"#2d3748"}}} -->
<h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;font-size:1.5rem;font-weight:700">Ready for Kawaii? 💖</h3>
<!-- /wp:heading -->

<!-- wp:kawaii-ultra/button {"text":"Join Now! 🎀","style":"primary","size":"medium","backgroundColor":"#ff69b4","textColor":"#ffffff"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // Features Grid - Minimal Variation
        register_block_pattern('kawaii-ultra/features-grid-minimal', [
            'title' => __('Features Grid (Minimal)', 'kawaii-ultra'),
            'description' => __('A minimal features grid with essential content only.', 'kawaii-ultra'),
            'categories' => ['kawaii-features'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"2rem","right":"2rem"}}},"className":"kawaii-features-grid kawaii-minimal"} -->
<div class="wp-block-group alignfull kawaii-features-grid kawaii-minimal" style="padding-top:3rem;padding-right:2rem;padding-bottom:3rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1000px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:2rem;font-size:2rem;font-weight:700">Features ✨</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#ffffff"},"border":{"radius":"15px"}},"shadow":"kawaii-soft"} -->
<div class="wp-block-group has-background" style="background-color:#ffffff;border-radius:15px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"600"},"color":{"text":"#ff69b4"}}} -->
<h4 class="wp-block-heading has-text-align-center has-text-color" style="color:#ff69b4;font-size:1.25rem;font-weight:600">🎨 Creative</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem"},"color":{"text":"#4a5568"}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;font-size:0.95rem">Beautiful designs</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#ffffff"},"border":{"radius":"15px"}},"shadow":"kawaii-soft"} -->
<div class="wp-block-group has-background" style="background-color:#ffffff;border-radius:15px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"600"},"color":{"text":"#ff69b4"}}} -->
<h4 class="wp-block-heading has-text-align-center has-text-color" style="color:#ff69b4;font-size:1.25rem;font-weight:600">⚡ Fast</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem"},"color":{"text":"#4a5568"}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;font-size:0.95rem">Lightning speed</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"}},"color":{"background":"#ffffff"},"border":{"radius":"15px"}},"shadow":"kawaii-soft"} -->
<div class="wp-block-group has-background" style="background-color:#ffffff;border-radius:15px;padding-top:1.5rem;padding-right:1.5rem;padding-bottom:1.5rem;padding-left:1.5rem"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"fontSize":"1.25rem","fontWeight":"600"},"color":{"text":"#ff69b4"}}} -->
<h4 class="wp-block-heading has-text-align-center has-text-color" style="color:#ff69b4;font-size:1.25rem;font-weight:600">📱 Mobile</h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.95rem"},"color":{"text":"#4a5568"}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;font-size:0.95rem">Responsive design</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);

        // Features Grid - Rich Content Variation
        register_block_pattern('kawaii-ultra/features-grid-rich', [
            'title' => __('Features Grid (Rich Content)', 'kawaii-ultra'),
            'description' => __('A feature-rich grid with detailed descriptions and multiple sections.', 'kawaii-ultra'),
            'categories' => ['kawaii-features'],
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem","left":"2rem","right":"2rem"}}},"className":"kawaii-features-grid kawaii-rich"} -->
<div class="wp-block-group alignfull kawaii-features-grid kawaii-rich" style="padding-top:5rem;padding-right:2rem;padding-bottom:5rem;padding-left:2rem"><!-- wp:group {"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"3rem","fontWeight":"700"},"color":{"text":"#2d3748"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#2d3748;margin-bottom:1rem;font-size:3rem;font-weight:700">Amazing Kawaii Features 🌟</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"},"color":{"text":"#4a5568"},"spacing":{"margin":{"bottom":"3rem"}}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;margin-bottom:3rem;font-size:1.25rem">Discover all the wonderful features that make our kawaii theme special and unique!</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"🎨 Ultra Creative Design","content":"Our kawaii design system includes hundreds of carefully crafted components, patterns, and layouts. Every element is designed with love and attention to detail to create the most adorable user experience possible.","style":"kawaii","backgroundColor":"#fff5f8","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"⚡ Lightning Fast Performance","content":"Built with modern web technologies and optimized for speed. Includes lazy loading, image optimization, CSS minification, and advanced caching strategies to ensure your kawaii site loads instantly.","style":"kawaii","backgroundColor":"#f0fff4","textColor":"#2d3748"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem","margin":{"top":"2rem"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:2rem"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"📱 Perfect Mobile Experience","content":"Fully responsive design that looks amazing on all devices. Touch-friendly interfaces, optimized for mobile performance, and special kawaii animations that work beautifully on smartphones and tablets.","style":"kawaii","backgroundColor":"#f0f8ff","textColor":"#2d3748"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:kawaii-ultra/card {"title":"🔒 Security & Privacy First","content":"Built with security best practices including XSS protection, CSRF tokens, secure headers, and GDPR compliance. Your kawaii site and user data are always protected with enterprise-level security.","style":"kawaii","backgroundColor":"#fffacd","textColor":"#2d3748"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"backgroundColor":"kawaii-pink","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-kawaii-pink-color has-alpha-channel-opacity has-kawaii-pink-background-color has-background is-style-wide" style="margin-top:3rem;margin-bottom:3rem"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.125rem"},"color":{"text":"#4a5568"}}} -->
<p class="has-text-align-center has-text-color" style="color:#4a5568;font-size:1.125rem">Ready to experience the kawaii magic? Start building your adorable website today! ✨</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
        ]);
    }
}