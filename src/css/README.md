# Kawaii Ultra Theme - CSS Architecture

This document explains the CSS architecture and conventions used in the Kawaii Ultra WordPress theme.

## Architecture Overview

The CSS is organized using a modular Sass architecture with BEM (Block Element Modifier) naming convention:

```
src/css/
├── abstracts/           # Variables, mixins, functions
│   ├── _variables.scss  # Design tokens from theme.json
│   ├── _mixins.scss     # Reusable mixins for common patterns
│   ├── _functions.scss  # Utility functions for calculations
│   └── _index.scss      # Forwarding module
├── base/               # Reset, typography, global utilities
│   ├── _reset.scss     # Modern CSS reset with accessibility
│   ├── _typography.scss # BEM typography system
│   ├── _global.scss    # Global utilities and helpers
│   └── _index.scss     # Forwarding module
├── components/         # Reusable UI components (BEM)
│   ├── _buttons.scss   # Button component with variants
│   ├── _cards.scss     # Card component with layouts
│   ├── _forms.scss     # Form components and inputs
│   └── _index.scss     # Forwarding module
├── layouts/            # Layout patterns (BEM)
│   ├── _header.scss    # Header layouts and navigation
│   ├── _footer.scss    # Footer layouts and components
│   ├── _grid.scss      # Grid systems and layouts
│   └── _index.scss     # Forwarding module
└── blocks/             # Gutenberg block styles (BEM)
    ├── _button.scss    # Button block with kawaii variants
    ├── _card.scss      # Card block with multiple layouts
    ├── _gallery.scss   # Gallery block with grid/masonry
    └── _index.scss     # Forwarding module
```

## BEM Naming Convention

All CSS classes follow the BEM methodology:

- **Block**: The main component (e.g., `.card`, `.btn`, `.header`)
- **Element**: A child component (e.g., `.card__title`, `.btn__icon`)
- **Modifier**: A variant or state (e.g., `.card--featured`, `.btn--large`)

### Examples

```scss
// Block
.card { }

// Element
.card__title { }
.card__content { }
.card__footer { }

// Modifiers
.card--featured { }
.card--no-shadow { }

// Element with modifier
.card__title--large { }
```

## Creating New Components

When creating a new component:

1. Create a new file in the appropriate directory (e.g., `components/_new-component.scss`)
2. Follow the BEM naming convention
3. Use the abstracts for consistency:

```scss
// components/_alert.scss
@use '../abstracts' as *;

.alert {
  @include card-base;
  padding: $spacing-base;
  margin-bottom: $spacing-base;
  
  &__title {
    @include heading-4;
    margin-bottom: $spacing-sm;
  }
  
  &__content {
    color: $color-text;
  }
  
  &--success {
    background: $color-pale-green;
    border-left: 4px solid kawaii-darken($color-pale-green, 20%);
  }
  
  &--error {
    background: alpha($color-deep-pink, 0.1);
    border-left: 4px solid $color-deep-pink;
  }
}
```

4. Add the import to the directory's `_index.scss`:

```scss
@forward 'alert';
```

## Design Tokens

All design tokens are stored in `abstracts/_variables.scss` and are extracted from the theme.json file. Use these variables instead of hard-coded values:

### Colors
- Primary colors: `$color-hot-pink`, `$color-kawaii-pink`, `$color-deep-pink`
- Semantic colors: `$color-primary`, `$color-secondary`, `$color-text`
- Gradients: `$gradient-pink-to-deep-pink`, `$gradient-kawaii-rainbow`

### Spacing
- Use the spacing scale: `$spacing-xs` through `$spacing-3xl`
- Or specific values: `$spacing-10` through `$spacing-100`

### Typography
- Font sizes: `$font-size-small` through `$font-size-xxx-large`
- Font weights: `$font-weight-regular` through `$font-weight-extrabold`
- Line heights: `$line-height-tight`, `$line-height-normal`, `$line-height-loose`

## Mixins

Common patterns are abstracted into mixins:

```scss
// Button styles
@include button-base;
@include button-primary;
@include button-kawaii-hover;

// Layout helpers
@include container;
@include flex-center;
@include grid-auto-fit($min-width: 300px);

// Typography
@include heading-1;
@include text-gradient;

// Responsive
@include mobile-only { }
@include tablet-and-up { }
@include desktop-and-up { }
```

## Utility Classes

Utility classes are prefixed with `u-` and use BEM modifiers:

```html
<!-- Spacing -->
<div class="u-margin-bottom--large u-padding--small">

<!-- Text -->
<p class="u-text-center u-font-weight--bold">

<!-- Display -->
<div class="u-display-flex u-display-none@mobile">

<!-- Visibility -->
<span class="u-visually-hidden">Screen reader only</span>
```

## WordPress Integration

### Gutenberg Blocks
Block styles are in the `blocks/` directory and follow the pattern:

```scss
.block-{name} {
  // Block wrapper styles
  
  &__content {
    // Inner content
  }
  
  &__button {
    @extend .btn;
    
    &--kawaii {
      @extend .btn--kawaii;
    }
  }
}
```

### Legacy Support
During the transition period, some legacy classes are mapped to new BEM classes:

```scss
// Legacy mapping (will be deprecated)
.kawaii-button {
  @extend .block-button__button--kawaii;
}
```

## Best Practices

1. **Use abstracts**: Always use variables, mixins, and functions from abstracts
2. **Avoid deep nesting**: Maximum 3 levels of nesting
3. **Mobile-first**: Write base styles for mobile, then add responsive overrides
4. **Component scope**: Keep styles scoped to their component
5. **No magic numbers**: Use spacing/sizing variables instead of arbitrary values
6. **Accessibility first**: Always include focus states and ARIA considerations

## Build Process

The Sass files are compiled through Vite:
- Development: Source maps enabled for debugging
- Production: Minified and optimized output
- Modern Sass API with `@use` and `@forward`

## Contributing

When contributing CSS:
1. Follow the established patterns and conventions
2. Test responsive behavior
3. Ensure accessibility compliance
4. Add new abstracts if creating reusable patterns
5. Document any new mixins or functions