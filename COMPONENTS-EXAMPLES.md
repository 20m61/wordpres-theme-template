# Kawaii Components - Quick Start Examples

This file provides practical examples of how to use the Kawaii components system.

## Using Custom Blocks in Posts/Pages

### 1. Kawaii Button Examples

```html
<!-- Basic primary button -->
<!-- wp:kawaii-ultra/button {"text":"Get Started! ✨","style":"primary","size":"large"} /-->

<!-- Secondary button with custom colors -->
<!-- wp:kawaii-ultra/button {"text":"Learn More 🌸","style":"secondary","backgroundColor":"#ffb6c1","textColor":"#2d3748"} /-->

<!-- Ghost button for subtle CTAs -->
<!-- wp:kawaii-ultra/button {"text":"Explore 🦄","style":"ghost","size":"medium"} /-->

<!-- Round icon button -->
<!-- wp:kawaii-ultra/button {"text":"💖","style":"round","size":"small"} /-->
```

### 2. Kawaii Card Examples

```html
<!-- Simple content card -->
<!-- wp:kawaii-ultra/card {"title":"Welcome to Kawaii! 🌸","content":"Discover the cutest designs and layouts for your website.","style":"default"} /-->

<!-- Product showcase card -->
<!-- wp:kawaii-ultra/card {"title":"Cute Plushie 🧸","content":"Adorable kawaii plushie perfect for any collection!","buttonText":"Buy Now","buttonUrl":"#shop","style":"product"} /-->

<!-- Minimal info card -->
<!-- wp:kawaii-ultra/card {"title":"Quick Tip 💡","content":"Use kawaii emojis to make your content more engaging!","style":"minimal"} /-->
```

### 3. Kawaii Gallery Examples

```html
<!-- Standard 3-column grid gallery -->
<!-- wp:kawaii-ultra/gallery {"columns":3,"style":"grid","spacing":"medium","lightbox":true} /-->

<!-- Masonry layout with captions -->
<!-- wp:kawaii-ultra/gallery {"columns":4,"style":"masonry","showCaptions":true,"spacing":"small"} /-->

<!-- Carousel gallery for featured images -->
<!-- wp:kawaii-ultra/gallery {"style":"carousel","showCaptions":true,"lightbox":false} /-->
```

## Using Block Patterns

### 1. Adding a Hero Section

1. In the block editor, click the "+" button
2. Go to the "Patterns" tab  
3. Find "Kawaii Hero Sections" category
4. Click "Simple Hero Section" or "Hero with Background Image"
5. Customize the text and colors as needed

### 2. Creating a Call-to-Action

1. Insert pattern: "Simple Call-to-Action" or "CTA with Feature Cards"
2. Update the heading and description text
3. Change button text and URL
4. Adjust colors to match your brand

### 3. Showcasing Features

1. Use "Features Grid" pattern for a 6-feature layout
2. Or use "Features with Gallery" to combine features with images
3. Replace placeholder text with your content
4. Update icons/emojis in titles

## Template Parts Usage

### For Theme Developers

```php
// Use different header variation
get_template_part('template-parts/headers/header', 'centered');

// Use different footer variation  
get_template_part('template-parts/footers/footer', 'detailed');

// Use different sidebar variation
get_template_part('template-parts/sidebars/sidebar', 'minimal');
```

### Available Template Parts

**Headers:**
- `header-simple.php` - Logo, menu, search
- `header-centered.php` - Centered layout with social icons

**Footers:**
- `footer-simple.php` - Basic footer with widgets
- `footer-detailed.php` - Comprehensive footer with branding

**Sidebars:**
- `sidebar-default.php` - Kawaii-styled sidebar with title
- `sidebar-minimal.php` - Clean, minimal sidebar

## CSS Customization Examples

### 1. Custom Button Colors

```css
/* Add to your theme's style.css or customizer */
.kawaii-button--primary {
    background: linear-gradient(135deg, #your-color-1 0%, #your-color-2 100%);
}

.kawaii-button--secondary {
    background: #your-secondary-color;
    color: #your-text-color;
}
```

### 2. Custom Card Styling

```css
/* Create a new card variation */
.kawaii-card--custom {
    background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%);
    border: 2px solid #87ceeb;
    border-radius: 20px;
}

.kawaii-card--custom .kawaii-card__title {
    color: #4169e1;
}
```

### 3. Gallery Customization

```css
/* Customize gallery hover effects */
.kawaii-gallery__item:hover {
    transform: scale(1.05) rotate(1deg);
    transition: all 0.3s ease;
}

/* Custom spacing */
.kawaii-gallery--custom-spacing {
    gap: 1.5rem;
}
```

## JavaScript Customization

### 1. Custom Button Click Effects

```javascript
// Add to your theme's JavaScript
jQuery(document).ready(function($) {
    $('.kawaii-button').on('click', function() {
        // Add custom click effect
        $(this).addClass('clicked');
        setTimeout(() => {
            $(this).removeClass('clicked');
        }, 200);
    });
});
```

### 2. Gallery Enhancements

```javascript
// Custom gallery initialization
jQuery(document).ready(function($) {
    $('.kawaii-gallery--custom').each(function() {
        // Add custom gallery behavior
        $(this).find('.kawaii-gallery__item').on('mouseenter', function() {
            $(this).siblings().addClass('dimmed');
        }).on('mouseleave', function() {
            $(this).siblings().removeClass('dimmed');
        });
    });
});
```

## Common Use Cases

### 1. Landing Page Layout

```html
<!-- Hero Section -->
<!-- wp:kawaii-ultra/hero-simple /-->

<!-- Features Section -->
<!-- wp:kawaii-ultra/features-grid /-->

<!-- Call to Action -->
<!-- wp:kawaii-ultra/cta-simple /-->
```

### 2. About Page Layout

```html
<!-- Heading -->
<!-- wp:heading {"content":"About Us 🌸"} /-->

<!-- Content Cards -->
<!-- wp:columns -->
<!-- wp:column -->
<!-- wp:kawaii-ultra/card {"title":"Our Story","content":"..."} /-->
<!-- /wp:column -->
<!-- wp:column -->
<!-- wp:kawaii-ultra/card {"title":"Our Mission","content":"..."} /-->
<!-- /wp:column -->
<!-- /wp:columns -->

<!-- Gallery -->
<!-- wp:kawaii-ultra/gallery {"style":"masonry"} /-->
```

### 3. Product Page Layout

```html
<!-- Product Gallery -->
<!-- wp:kawaii-ultra/gallery {"style":"carousel","columns":1} /-->

<!-- Product Info -->
<!-- wp:kawaii-ultra/card {"title":"Product Name","style":"product","buttonText":"Add to Cart"} /-->

<!-- Related Products -->
<!-- wp:heading {"content":"You Might Also Like 💕"} /-->
<!-- wp:columns -->
<!-- Multiple product cards... -->
<!-- /wp:columns -->
```

## Tips for Best Results

### 1. Color Consistency
- Use the same color palette across all components
- Stick to 2-3 main colors plus neutrals
- Use the kawaii color scheme: pinks, pastels, whites

### 2. Typography
- Keep emoji usage consistent (🌸 for headers, 💖 for CTAs, etc.)
- Use readable font sizes
- Maintain consistent spacing

### 3. Layout
- Use consistent spacing between sections
- Follow the rule of thirds for layouts
- Keep mobile responsiveness in mind

### 4. Performance
- Optimize images before adding to galleries
- Use appropriate image sizes
- Test loading times on mobile devices

## Troubleshooting

### Blocks Not Appearing
1. Ensure the theme is properly activated
2. Check that JavaScript is enabled
3. Clear any caching plugins

### Styling Issues
1. Check CSS file paths are correct
2. Ensure CSS is being loaded
3. Check for theme conflicts

### Gallery Not Working
1. Verify images are properly uploaded
2. Check JavaScript console for errors
3. Test with different image formats

---

*For more detailed information, see COMPONENTS.md or contact the theme developer.*