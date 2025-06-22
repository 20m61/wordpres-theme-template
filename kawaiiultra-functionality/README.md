# KawaiiUltra Functionality Plugin

A companion plugin for the KawaiiUltra WordPress theme that provides functionality features including custom post types, taxonomies, and business logic that should be preserved when switching themes.

## Features

- **Custom Post Types**: Portfolio items and Testimonials
- **Custom Taxonomies**: Portfolio categories, portfolio tags, and testimonial categories
- **Shortcodes**: Non-design related shortcodes for displaying content
- **REST API Support**: All custom post types and taxonomies are available via WordPress REST API
- **Translation Ready**: Full internationalization support

## Installation

1. Download or clone this plugin to your `wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Your custom post types and taxonomies will be immediately available

## Custom Post Types

### Portfolio
- Post type slug: `portfolio`
- Archive slug: `/portfolio/`
- Supports: Title, editor, thumbnail, excerpt, custom fields
- REST API endpoint: `/wp-json/wp/v2/portfolio`

### Testimonials
- Post type slug: `testimonial` 
- Archive slug: `/testimonials/`
- Supports: Title, editor, thumbnail, custom fields
- REST API endpoint: `/wp-json/wp/v2/testimonials`

## Custom Taxonomies

### Portfolio Categories
- Hierarchical taxonomy for portfolio items
- Taxonomy slug: `portfolio_category`
- Archive slug: `/portfolio-category/`
- REST API endpoint: `/wp-json/wp/v2/portfolio-categories`

### Portfolio Tags
- Non-hierarchical taxonomy for portfolio items
- Taxonomy slug: `portfolio_tag`
- Archive slug: `/portfolio-tag/`
- REST API endpoint: `/wp-json/wp/v2/portfolio-tags`

### Testimonial Categories
- Hierarchical taxonomy for testimonials
- Taxonomy slug: `testimonial_category`
- Archive slug: `/testimonial-category/`
- REST API endpoint: `/wp-json/wp/v2/testimonial-categories`

## Theme Integration

This plugin is designed to work with the KawaiiUltra theme but can function independently. The theme includes templates and styling for the custom post types provided by this plugin.

### Template Files

When using with KawaiiUltra theme, the following template files are available:
- `single-portfolio.php` - Single portfolio item template
- `archive-portfolio.php` - Portfolio archive template
- `single-testimonial.php` - Single testimonial template
- `archive-testimonial.php` - Testimonials archive template
- `taxonomy-portfolio_category.php` - Portfolio category archive template

## Shortcodes

The plugin provides several shortcodes for displaying content:

### [portfolio_list]
Displays a list of portfolio items.

**Attributes:**
- `limit` (default: 6) - Number of items to display
- `category` - Portfolio category slug to filter by
- `columns` (default: 3) - Number of columns (1-6)
- `show_excerpt` (default: true) - Whether to show excerpts

**Examples:**
```
[portfolio_list limit="8" columns="4"]
[portfolio_list category="web-design" limit="4"]
[portfolio_list show_excerpt="false" columns="2"]
```

### [recent_testimonials]
Displays recent testimonials.

**Attributes:**
- `limit` (default: 3) - Number of testimonials to display
- `category` - Testimonial category slug to filter by
- `show_author` (default: true) - Whether to show author information

**Examples:**
```
[recent_testimonials limit="5"]
[recent_testimonials category="client-feedback" limit="2"]
[recent_testimonials show_author="false"]
```

### [portfolio_categories]
Displays a list of portfolio categories.

**Attributes:**
- `show_count` (default: true) - Whether to show post counts
- `orderby` (default: name) - How to order categories
- `order` (default: ASC) - Sort order

**Examples:**
```
[portfolio_categories]
[portfolio_categories show_count="false" orderby="count" order="DESC"]
```

## Development

### Adding New Post Types

To add a new custom post type, edit the `CustomPostTypes` class in `inc/Features/CustomPostTypes.php`:

```php
// Add to register_post_types() method
$this->register_your_new_post_type();

// Create the registration method
private function register_your_new_post_type(): void {
    // Your post type registration code
}
```

### Adding New Taxonomies

To add a new custom taxonomy, edit the `CustomTaxonomies` class in `inc/Features/CustomTaxonomies.php`:

```php
// Add to register_taxonomies() method
$this->register_your_new_taxonomy();

// Create the registration method
private function register_your_new_taxonomy(): void {
    // Your taxonomy registration code
}
```

## Requirements

- PHP 7.4 or higher
- WordPress 5.0 or higher

## License

MIT License - see LICENSE file for details.