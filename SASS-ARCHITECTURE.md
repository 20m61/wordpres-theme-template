# Sass Architecture Guide

This document outlines the new modular Sass architecture implemented in the KawaiiUltra theme using BEM (Block Element Modifier) naming convention.

## Architecture Overview

The CSS is organized using a modular approach with clear separation of concerns:

```
src/css/
├── abstracts/           # Variables, mixins, functions
├── base/               # Reset, typography, global utilities  
├── components/         # Reusable UI components (BEM)
├── layouts/            # Layout patterns (BEM)
└── blocks/             # Gutenberg block styles (BEM)
```

## BEM Naming Convention

### Blocks
Independent components that can be reused anywhere:
```scss
.btn { }           // Button component
.card { }          // Card component
.header { }        // Header component
```

### Elements
Parts of a block that have no standalone meaning:
```scss
.btn__icon { }     // Icon inside button
.card__title { }   // Title inside card
.header__logo { }  // Logo inside header
```

### Modifiers
Flags that change appearance, behavior, or state:
```scss
.btn--primary { }      // Primary button variant
.btn--large { }        // Large button size
.card--featured { }    // Featured card style
```

## Usage Examples

### Components
```scss
// Button component with BEM
.btn {
  @include button-base;
  
  // Modifiers
  &--primary { @include button-primary; }
  &--secondary { @include button-secondary; }
  &--large { padding: $spacing-base $spacing-lg; }
  
  // Elements
  &__icon {
    font-size: 1.2em;
    
    &--left { margin-right: $spacing-xs; }
    &--right { margin-left: $spacing-xs; }
  }
}
```

### Using Design Tokens
```scss
// Import abstracts for access to variables and mixins
@use 'abstracts' as *;

.my-component {
  color: $color-primary;           // Kawaii pink
  background: $gradient-kawaii-rainbow;
  padding: $spacing-base;
  border-radius: $border-radius-medium;
  box-shadow: $shadow-kawaii-soft;
}
```

### Responsive Design
```scss
.my-component {
  padding: $spacing-sm;
  
  @include tablet-and-up {
    padding: $spacing-base;
  }
  
  @include desktop-and-up {
    padding: $spacing-lg;
  }
}
```

## Available Mixins

### Button Mixins
- `@include button-base` - Base button styles
- `@include button-primary` - Primary button variant
- `@include button-secondary` - Secondary button variant
- `@include button-ghost` - Ghost button variant

### Layout Mixins
- `@include container` - Container with max-width
- `@include flex-center` - Flex center alignment
- `@include grid-auto-fit($min-width)` - Auto-fit grid

### Typography Mixins
- `@include heading-1` to `@include heading-4` - Heading styles
- `@include text-gradient($gradient)` - Gradient text effect

### Utility Mixins
- `@include visually-hidden` - Screen reader only content
- `@include focus-ring` - Focus outline styling

## Design Tokens

### Colors
Primary kawaii colors from theme.json:
- `$color-hot-pink` (#ff69b4)
- `$color-kawaii-pink` (#ffb6c1)
- `$color-deep-pink` (#ff1493)

### Spacing
12-step spacing scale:
- `$spacing-xs` (0.25rem) to `$spacing-3xl` (5rem)

### Typography
- Font families: `$font-family-system`, `$font-family-serif`
- Font sizes: `$font-size-small` to `$font-size-xxx-large`

## Migration from Legacy CSS

### Legacy Class Support
Old classes are automatically mapped to new BEM classes:
```scss
// Legacy classes still work
.kawaii-button {
  @extend .btn--kawaii;
}
```

### WordPress Compatibility
WordPress-specific classes are preserved:
```scss
.site-header {
  @extend .header--sticky;
}
```

## Performance Notes

- **Modular imports**: Only import what you need
- **Build optimization**: Sass modules enable better tree-shaking
- **CSS output**: ~106KB main CSS file (optimized)
- **No conflicts**: BEM prevents specificity issues

## Best Practices

1. **Use semantic class names**: `.product-card` not `.red-box`
2. **Keep nesting shallow**: Maximum 3 levels deep
3. **Use mixins for repeated patterns**: Don't repeat styles
4. **Follow BEM strictly**: Consistent naming conventions
5. **Import abstracts**: Always `@use 'abstracts' as *;` for variables

## Development Workflow

1. **Components**: Add new components to `components/`
2. **Layouts**: Add page layouts to `layouts/`
3. **Blocks**: Add Gutenberg block styles to `blocks/`
4. **Variables**: Update design tokens in `abstracts/_variables.scss`
5. **Mixins**: Add reusable patterns to `abstracts/_mixins.scss`

---

This architecture provides a scalable, maintainable foundation for the KawaiiUltra theme while preserving the beloved kawaii aesthetic! 🌸