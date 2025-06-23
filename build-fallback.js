/**
 * Fallback build script for environments without Vite
 * 
 * This provides a simple fallback mechanism when Vite is not available.
 */

const fs = require('fs');
const path = require('path');

console.log('Building assets with fallback method...');

// Create dist directory if it doesn't exist
const distDir = path.join(__dirname, 'dist');
if (!fs.existsSync(distDir)) {
    fs.mkdirSync(distDir, { recursive: true });
}

// Create a simple manifest for fallback
const fallbackManifest = {
    'src/js/main.js': { file: 'js/main.js' },
    'src/js/navigation.js': { file: 'js/navigation.js' },
    'src/js/admin.js': { file: 'js/admin.js' },
    'src/css/style.scss': { file: 'css/style.css' },
    'src/css/admin.scss': { file: 'css/admin.css' },
    'src/css/blocks.scss': { file: 'css/blocks.css' }
};

// Write fallback manifest
const manifestPath = path.join(distDir, '.vite', 'manifest.json');
fs.mkdirSync(path.dirname(manifestPath), { recursive: true });
fs.writeFileSync(manifestPath, JSON.stringify(fallbackManifest, null, 2));

console.log('Fallback manifest created successfully');
console.log('Note: For full functionality, please install Node.js and run "npm install" followed by "npm run build"');