# Usage Examples

This document provides examples of how to use the refactored KawaiiUltra theme's OOP architecture.

## Basic Usage

The theme automatically bootstraps itself when WordPress loads. No additional setup is required.

```php
// functions.php - The entire theme bootstrap
require_once get_template_directory() . '/vendor/autoload.php';

$theme = new \KawaiiUltra\Theme\Core\Theme();
$theme->init();
```

## Extending the Theme

### Adding a New Class

1. Create your class in the appropriate namespace:

```php
<?php
// inc/Features/CustomPostTypes.php

namespace KawaiiUltra\Theme\Features;

class CustomPostTypes {
    
    public function init(): void {
        add_action('init', [$this, 'register_post_types']);
    }
    
    public function register_post_types(): void {
        register_post_type('portfolio', [
            'label' => 'Portfolio',
            'public' => true,
            'supports' => ['title', 'editor', 'thumbnail'],
        ]);
    }
}
```

2. Initialize it in the main Theme class:

```php
// inc/Core/Theme.php - in __construct()
$this->custom_post_types = new \KawaiiUltra\Theme\Features\CustomPostTypes();

// In init() method
$this->custom_post_types->init();
```

### Using Sanitization Utilities

```php
use KawaiiUltra\Theme\Utils\Sanitization;

$sanitizer = new Sanitization();

// Sanitize various data types
$clean_email = $sanitizer->sanitize_email($user_input);
$clean_url = $sanitizer->sanitize_url($url_input);
$clean_text = $sanitizer->sanitize_text_field($form_input);
$clean_html = $sanitizer->sanitize_html($content_input);
```

### Accessing Theme Options

```php
use KawaiiUltra\Theme\Admin\Customizer;

$customizer = new Customizer();

// Get theme options
$primary_color = $customizer->get_primary_color();
$footer_text = $customizer->get_footer_text();
$show_search = $customizer->get_show_search();
```

## Hook Integration

The OOP structure integrates seamlessly with WordPress hooks:

```php
// Traditional approach
function my_custom_function() {
    // Custom code
}
add_action('wp_head', 'my_custom_function');

// OOP approach
class MyCustomClass {
    public function init(): void {
        add_action('wp_head', [$this, 'custom_function']);
    }
    
    public function custom_function(): void {
        // Custom code
    }
}
```

## Benefits Demonstrated

1. **No Global Namespace Pollution**: All functions are methods of classes
2. **Easy Testing**: Each class can be tested independently
3. **Clear Dependencies**: Constructor injection makes dependencies explicit
4. **Single Responsibility**: Each class has one focused purpose
5. **Extensibility**: Easy to extend classes or add new ones

## Migration Path

If you have existing procedural code, follow this pattern:

### Before (Procedural)
```php
function mytheme_enqueue_scripts() {
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
```

### After (OOP)
```php
namespace MyTheme\Core;

class Assets {
    public function init(): void {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }
    
    public function enqueue_scripts(): void {
        wp_enqueue_style('mytheme-style', get_stylesheet_uri());
    }
}
```

This maintains all existing functionality while providing better organization and maintainability.