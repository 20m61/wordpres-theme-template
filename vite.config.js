import { defineConfig } from 'vite';
import { resolve } from 'path';
import liveReload from 'vite-plugin-live-reload';
import legacy from '@vitejs/plugin-legacy';
import autoprefixer from 'autoprefixer';

export default defineConfig(({ mode }) => {
  const isDev = mode === 'development';
  
  return {
    plugins: [
      // Live reload for PHP files during development
      liveReload([
        __dirname + '/**/*.php',
      ]),
      // Legacy browser support
      legacy({
        targets: ['defaults', 'not IE 11']
      })
    ],
    
    // Entry points for different asset types
    build: {
      outDir: 'dist',
      emptyOutDir: true,
      manifest: true,
      rollupOptions: {
        input: {
          main: resolve(__dirname, 'src/js/main.js'),
          admin: resolve(__dirname, 'src/js/admin.js'),
          blocks: resolve(__dirname, 'src/js/blocks.js'),
          'blocks-frontend': resolve(__dirname, 'src/js/blocks-frontend.js'),
          navigation: resolve(__dirname, 'src/js/navigation.js'),
          'skip-link-focus-fix': resolve(__dirname, 'src/js/skip-link-focus-fix.js'),
          style: resolve(__dirname, 'src/css/style.scss'),
          admin_css: resolve(__dirname, 'src/css/admin.scss'),
          blocks_css: resolve(__dirname, 'src/css/blocks.scss'),
          blocks_editor: resolve(__dirname, 'src/css/blocks-editor.scss'),
          template_parts: resolve(__dirname, 'src/css/template-parts.scss')
        },
        output: {
          entryFileNames: isDev ? '[name].js' : '[name].[hash].js',
          chunkFileNames: isDev ? '[name].js' : '[name].[hash].js',
          assetFileNames: isDev ? '[name].[ext]' : '[name].[hash].[ext]'
        }
      },
      // Source maps for development
      sourcemap: isDev,
      // Minification for production
      minify: !isDev ? 'terser' : false,
      terserOptions: !isDev ? {
        compress: {
          drop_console: true,
          drop_debugger: true
        }
      } : {}
    },
    
    // CSS configuration with modern Sass
    css: {
      preprocessorOptions: {
        scss: {
          // Use modern Sass API
          api: 'modern-compiler',
          // Don't inject global imports - let modules handle their own imports
          // This allows for proper @use/@forward functionality
          silenceDeprecations: ['legacy-js-api']
        }
      },
      postcss: {
        plugins: [
          autoprefixer
        ]
      }
    },
    
    // Development server configuration
    server: {
      host: 'localhost',
      port: 3000,
      strictPort: true,
      hmr: {
        host: 'localhost',
        port: 3001
      }
    },
    
    // Asset handling
    assetsInclude: ['**/*.woff', '**/*.woff2', '**/*.ttf', '**/*.eot']
  };
});