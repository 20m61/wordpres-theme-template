# Kawaii Theme.json Design System

This document outlines the comprehensive design system implemented in `theme.json` for the KawaiiUltra theme.

## 🎨 Color Palette

### Primary Kawaii Colors
- **Hot Pink** (`#ff69b4`) - Main brand color, used for primary buttons and links
- **Kawaii Pink** (`#ffb6c1`) - Secondary brand color, softer variation
- **Deep Pink** (`#ff1493`) - Accent color for hover states and emphasis
- **Pink** (`#ffc0cb`) - Light pink for backgrounds and subtle elements

### Accent Colors
- **Plum** (`#dda0dd`) - Purple variation for diversity
- **Orchid** (`#da70d6`) - Medium orchid for highlights
- **Medium Orchid** (`#ba55d3`) - Deeper purple for contrast
- **Sky Blue** (`#87ceeb`) - Cool balance to warm pinks
- **Light Blue** (`#add8e6`) - Softer blue variation
- **Powder Blue** (`#b0e0e6`) - Very light blue for backgrounds

### Neutral Colors
- **White** (`#ffffff`) - Pure white for backgrounds
- **Light Gray** (`#f8f9fa`) - Very light gray for subtle backgrounds
- **Gray 100-400** - Progressive gray scale for text and UI elements
- **Medium Gray** (`#4a5568`) - Standard text color
- **Dark Gray** (`#2d3748`) - Primary text color
- **Almost Black** (`#1a202c`) - High contrast text

## 🌈 Gradients

- **Pink to Deep Pink** - Primary gradient
- **Light Pink to Pink** - Secondary gradient  
- **Kawaii Pink Gradient** - Subtle variation
- **Purple Gradient** - Purple accent gradient
- **Sky Blue Gradient** - Cool gradient option
- **Kawaii Rainbow** - Multi-color gradient
- **Soft Pastel** - Very subtle background gradient

## 🖼️ Duotone Filters

Kawaii-themed duotone filters for images:
- **Pink and White** - Classic kawaii look
- **Deep Pink and Light Pink** - Monochromatic pink
- **Purple and Alice Blue** - Cool kawaii palette
- **Sky Blue and White** - Fresh, clean look
- **Dark and Hot Pink** - High contrast kawaii

## 📝 Typography

### Font Families
- **System Font** - Primary font stack with modern system fonts
- **Serif** - Georgia-based serif stack for emphasis
- **Monospace** - Code and technical content

### Font Sizes (Fluid)
- **X-Small** - 0.75rem → 0.875rem
- **Small** - 0.875rem → 1rem
- **Medium** - 1rem → 1.125rem (base size)
- **Normal** - 1.125rem → 1.25rem
- **Large** - 1.25rem → 1.5rem
- **X-Large** - 1.75rem → 2rem
- **XX-Large** - 2.25rem → 2.75rem
- **XXX-Large** - 2.75rem → 3.5rem

All font sizes use fluid typography for responsive scaling.

## 📏 Spacing Scale

12-step spacing scale from 0.25rem to 10rem:
- **10** (0.25rem) - Micro spacing
- **15** (0.5rem) - Tiny spacing  
- **20** (1rem) - Base unit
- **30** (1.5rem) - Small spacing
- **40** (2rem) - Medium spacing
- **45** (2.5rem) - Medium-large spacing
- **50** (3rem) - Large spacing
- **60** (4rem) - Extra large
- **70** (5rem) - Section spacing
- **80** (6rem) - Large section spacing
- **90** (8rem) - Extra large sections
- **100** (10rem) - Maximum spacing

## 🌟 Shadow System

### Shadow Presets
- **Kawaii Soft** - Subtle pink-tinted shadow
- **Kawaii Medium** - Medium pink-tinted shadow  
- **Kawaii Strong** - Strong pink-tinted shadow

### Custom Shadow Properties
- **Soft** - Generic soft shadow
- **Medium** - Generic medium shadow
- **Kawaii** - Branded kawaii shadow

## 🎛️ Custom CSS Properties

### Border Radius
- `--wp--custom--kawaii--border-radius--small: 8px`
- `--wp--custom--kawaii--border-radius--medium: 15px`
- `--wp--custom--kawaii--border-radius--large: 25px`
- `--wp--custom--kawaii--border-radius--round: 50%`

### Transitions
- `--wp--custom--kawaii--transitions--fast: 0.15s ease`
- `--wp--custom--kawaii--transitions--normal: 0.3s ease`
- `--wp--custom--kawaii--transitions--slow: 0.5s ease`

### Shadows
- `--wp--custom--kawaii--shadows--soft`
- `--wp--custom--kawaii--shadows--medium`
- `--wp--custom--kawaii--shadows--kawaii`

### Spacing
- `--wp--custom--kawaii--spacing--section: 5rem`
- `--wp--custom--kawaii--spacing--container: 2rem`

## 🧱 Block Configuration

### Enhanced Block Support
- **Buttons** - Custom gradients, padding, typography
- **Headings** - Gradients, advanced typography controls
- **Paragraphs** - Text and background colors, typography
- **Groups** - Backgrounds, spacing, borders
- **Images/Gallery** - Duotone filters, border radius
- **Quotes** - Custom borders and styling
- **Navigation** - Enhanced link styling

### Global Block Styles
All blocks inherit kawaii aesthetic with:
- Rounded corners (15px default)
- Soft shadows with pink tints
- Smooth transitions (0.3s ease)
- Kawaii color palette integration

## 🎨 Design Tokens Usage

The theme.json serves as the single source of truth for:
- Color decisions across all blocks and elements
- Consistent spacing throughout the design
- Typography hierarchy and fluid scaling
- Shadow and border radius consistency
- Transition timing for animations

This system ensures the kawaii aesthetic is applied consistently across the entire WordPress site while providing extensive customization options through the block editor.