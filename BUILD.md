# Build System Documentation

## Vite Build System

This theme uses Vite for modern asset compilation and hot module replacement (HMR).

### Development Setup

1. **Install dependencies:**
   ```bash
   npm install
   ```

2. **Start development server:**
   ```bash
   npm run dev
   ```
   
   This starts the Vite development server at `http://localhost:3000` with HMR enabled.

3. **Build for production:**
   ```bash
   npm run build
   ```

### Asset Structure

#### Source Files (src/)
- `src/js/` - JavaScript source files
- `src/css/` - SCSS/CSS source files  
- `src/images/` - Image assets for optimization

#### Compiled Assets (dist/)
- `dist/` - Compiled and optimized assets
- `dist/.vite/manifest.json` - Asset manifest for WordPress integration

### Features

#### Sass Compilation
- Converts SCSS to CSS with autoprefixing
- Variables defined in `src/css/_variables.scss`
- Automatically imported into all SCSS files

#### JavaScript Bundling
- ES6+ JavaScript support
- Code splitting and tree shaking
- Legacy browser support with polyfills

#### Image Optimization
- Automatic image optimization during build
- Supports various formats (JPEG, PNG, SVG, WebP)

#### Hot Module Replacement (HMR)
- Instant updates during development
- CSS updates without page refresh
- JavaScript updates with state preservation

#### Production Optimizations
- Minification of JS and CSS
- Source maps for debugging
- Asset versioning for cache busting
- Legacy browser support

### WordPress Integration

The theme automatically detects development vs production mode:

- **Development Mode**: Loads assets from Vite dev server (localhost:3000)
- **Production Mode**: Loads compiled assets from dist/ directory

### NPM Scripts

```bash
# Development server with HMR
npm run dev

# Production build
npm run build

# Preview production build
npm run preview

# Watch mode for development
npm run build:watch
```

### Configuration Files

- `vite.config.js` - Vite configuration
- `postcss.config.js` - PostCSS configuration
- `package.json` - NPM dependencies and scripts

### Troubleshooting

1. **Assets not loading**: Ensure you've run `npm run build` for production
2. **HMR not working**: Check that the Vite dev server is running on port 3000
3. **Sass errors**: Verify that `_variables.scss` exists and is properly formatted