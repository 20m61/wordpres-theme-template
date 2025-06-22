# Kawaii Components Documentation

This documentation covers the comprehensive system of reusable components for the KawaiiUltra theme, including custom Gutenberg blocks, block patterns, template parts, and block variations.

## Table of Contents

1. [Overview](#overview)
2. [Custom Gutenberg Blocks](#custom-gutenberg-blocks)
3. [Block Patterns](#block-patterns)
4. [Template Parts](#template-parts)
5. [Block Variations](#block-variations)
6. [Usage Guide](#usage-guide)
7. [Customization](#customization)

## Overview

The KawaiiUltra theme includes a complete component system designed around the kawaii aesthetic. All components are:

- **Easy to use**: Non-technical users can access them through the WordPress block editor
- **Fully customizable**: Multiple styling options and variations available
- **Responsive**: Work perfectly on all screen sizes
- **Accessible**: Built with accessibility best practices
- **Performance optimized**: Lightweight and fast-loading

## Custom Gutenberg Blocks

### Kawaii Button Block

**Block Name:** `kawaii-ultra/button`

A customizable button component with kawaii styling and animations.

#### Attributes

- `text` (string): Button text content
- `url` (string): Button link URL  
- `style` (string): Button style variant
- `size` (string): Button size
- `icon` (string): Optional icon class
- `backgroundColor` (string): Custom background color
- `textColor` (string): Custom text color

#### Style Variations

- **Primary**: Gradient pink background with white text
- **Secondary**: Light pink background with dark text
- **Ghost**: Transparent background with pink border
- **Round**: Circular button perfect for icons

#### Usage Example

```html
<!-- wp:kawaii-ultra/button {"text":"Get Started ✨","style":"primary","size":"large"} /-->
```

#### Available Sizes

- `small`: Compact button for tight spaces
- `medium`: Standard button size (default)
- `large`: Prominent button for CTAs

---

### Kawaii Card Block

**Block Name:** `kawaii-ultra/card`

A versatile card component for displaying content with optional image, title, text, and action button.

#### Attributes

- `title` (string): Card title
- `content` (string): Card content/description
- `imageUrl` (string): Featured image URL
- `imageAlt` (string): Image alt text
- `buttonText` (string): Optional action button text
- `buttonUrl` (string): Action button URL
- `style` (string): Card style variant
- `backgroundColor` (string): Custom background color
- `textColor` (string): Custom text color

#### Style Variations

- **Default**: Clean white card with subtle shadow
- **Minimal**: Minimal styling with border
- **Cute**: Extra kawaii styling with decorative elements
- **Pastel**: Soft pastel background colors
- **Product**: Optimized for product showcases

#### Usage Example

```html
<!-- wp:kawaii-ultra/card {"title":"Kawaii Card 🌸","content":"This is a cute card!","style":"cute"} /-->
```

---

### Kawaii Gallery Block

**Block Name:** `kawaii-ultra/gallery`

An advanced gallery component with multiple layout options and interactive features.

#### Attributes

- `images` (array): Array of image objects
- `columns` (number): Number of columns (1-6)
- `style` (string): Gallery layout style
- `spacing` (string): Spacing between images
- `showCaptions` (boolean): Show/hide image captions
- `lightbox` (boolean): Enable/disable lightbox functionality

#### Style Variations

- **Grid**: Standard grid layout
- **Masonry**: Pinterest-style masonry layout
- **Carousel**: Horizontal scrolling carousel
- **Collage**: Creative collage arrangement

#### Spacing Options

- `none`: No spacing between images
- `small`: 0.5rem spacing
- `medium`: 1rem spacing (default)
- `large`: 2rem spacing

#### Usage Example

```html
<!-- wp:kawaii-ultra/gallery {"columns":3,"style":"grid","lightbox":true} /-->
```

## Block Patterns

Block patterns are pre-designed layouts that users can insert and customize.

### Hero Section Patterns

#### Simple Hero (`kawaii-ultra/hero-simple`)

A clean hero section with:
- Large heading with emoji
- Subtitle text
- Call-to-action button
- Kawaii background color

#### Hero with Image (`kawaii-ultra/hero-with-image`)

A hero section featuring:
- Background image with overlay
- Centered content
- Prominent heading
- Action button

### Call-to-Action Patterns

#### Simple CTA (`kawaii-ultra/cta-simple`)

Basic CTA section with:
- Centered heading
- Description text
- Single action button

#### CTA with Cards (`kawaii-ultra/cta-with-cards`)

Advanced CTA featuring:
- Feature cards highlighting benefits
- Gradient background
- Multiple kawaii cards
- Prominent action button

### Feature Showcase Patterns

#### Features Grid (`kawaii-ultra/features-grid`)

A grid layout showcasing features with:
- 6 feature cards in 2 rows
- Icons and descriptions
- Pastel color backgrounds
- Responsive design

#### Features with Gallery (`kawaii-ultra/features-gallery`)

Combined feature section with:
- Gallery showcase
- Feature descriptions
- Call-to-action
- Mixed content layout

## Template Parts

Template parts are reusable theme components for consistent layouts.

### Header Variations

#### Simple Header (`template-parts/headers/header-simple.php`)

Features:
- Logo and site title
- Horizontal navigation menu
- Search toggle button
- Clean layout

#### Centered Header (`template-parts/headers/header-centered.php`)

Features:
- Centered logo and title
- Social media icons
- Centered navigation menu
- Two-row layout

### Footer Variations

#### Simple Footer (`template-parts/footers/footer-simple.php`)

Features:
- Widget areas
- Copyright notice
- Footer navigation
- Simple layout

#### Detailed Footer (`template-parts/footers/footer-detailed.php`)

Features:
- Brand section with description
- Multiple widget areas
- Social media links
- Comprehensive layout

### Sidebar Variations

#### Default Sidebar (`template-parts/sidebars/sidebar-default.php`)

Features:
- Kawaii styling
- Widget title with emoji
- Rounded container
- Branded header

#### Minimal Sidebar (`template-parts/sidebars/sidebar-minimal.php`)

Features:
- Clean, minimal design
- No extra styling
- Focus on content

## Block Variations

Block variations provide preset configurations for blocks.

### Button Variations

- **Kawaii Primary**: Pink gradient with sparkle emoji
- **Kawaii Secondary**: Light pink with flower emoji
- **Kawaii Ghost**: Transparent with pink border and unicorn emoji
- **Kawaii Round**: Circular button with heart emoji

### Card Variations

- **Kawaii Minimal**: Clean white card with flower emoji
- **Kawaii Cute**: Extra cute styling with maximum kawaii elements
- **Kawaii Pastel**: Soft pastel colors with sparkle emoji
- **Kawaii Product**: Optimized for product display with shopping emoji

### Gallery Variations

- **Kawaii Grid**: Standard 3-column grid with medium spacing
- **Kawaii Masonry**: 4-column masonry with captions
- **Kawaii Carousel**: Single-column carousel slider
- **Kawaii Collage**: 2-column creative collage layout

### Core Block Variations

Enhanced versions of WordPress core blocks:

- **Kawaii Heading**: Pink color with sparkle emoji
- **Kawaii Paragraph**: Styled text with flower emoji
- **Kawaii Quote**: Cute quote styling with heart emoji
- **Kawaii Core Button**: WordPress button with kawaii styling
- **Kawaii Section**: Group block with pastel background

## Usage Guide

### For Content Editors

1. **Adding Blocks**: In the block editor, look for the "Kawaii Blocks" category
2. **Using Patterns**: Go to the patterns tab and find "Kawaii" categories
3. **Customizing**: Use the block settings panel to adjust colors, sizes, and styles
4. **Template Parts**: Contact your developer to switch header/footer variations

### For Developers

1. **Accessing Managers**: Use the theme's getter methods:
   ```php
   $theme = new \KawaiiUltra\Theme\Core\Theme();
   $blocks_manager = $theme->get_blocks_manager();
   $patterns_manager = $theme->get_patterns_manager();
   ```

2. **Adding Custom Blocks**: Extend the `BlocksManager` class
3. **Creating Patterns**: Add patterns to the `PatternsManager` class
4. **Template Parts**: Place custom template parts in the `template-parts/` directory

### CSS Customization

The component system uses CSS custom properties for easy customization:

```css
:root {
    --kawaii-primary-color: #ff69b4;
    --kawaii-secondary-color: #ffb6c1;
    --kawaii-accent-color: #ff1493;
    --kawaii-background-color: #fff0f8;
}
```

### JavaScript Interactions

Interactive features include:
- **Lightbox**: Automatic lightbox for galleries
- **Carousel**: Touch-friendly carousel navigation  
- **Button Effects**: Ripple animations on click
- **Hover Effects**: Smooth transitions and transforms

## Customization

### Adding New Block Variations

```php
register_block_variation('kawaii-ultra/button', [
    'name' => 'my-custom-variation',
    'title' => __('My Custom Button', 'kawaii-ultra'),
    'attributes' => [
        'style' => 'custom',
        'text' => 'Custom Text'
    ]
]);
```

### Creating Custom Patterns

```php
register_block_pattern('kawaii-ultra/my-pattern', [
    'title' => __('My Custom Pattern', 'kawaii-ultra'),
    'categories' => ['kawaii-custom'],
    'content' => '<!-- wp:heading {"content":"My Pattern"} /-->'
]);
```

### Styling Customizations

All components can be customized via CSS. Component classes follow BEM methodology:

- `.kawaii-button` - Button component
- `.kawaii-button--primary` - Button modifier
- `.kawaii-button__text` - Button element
- `.kawaii-card` - Card component
- `.kawaii-gallery` - Gallery component

## Browser Support

The component system supports:
- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- **CSS**: Optimized with minimal specificity
- **JavaScript**: Lazy-loaded interactive features
- **Images**: Responsive images with proper sizing
- **Animations**: Hardware-accelerated CSS transitions

## Accessibility

All components include:
- Proper ARIA labels
- Keyboard navigation support
- Screen reader compatibility
- High contrast support
- Focus indicators

---

*This documentation is part of the KawaiiUltra WordPress theme. For support or questions, please refer to the theme documentation or contact the development team.*