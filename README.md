# KawaiiUltra WordPress Theme Template

A modern WordPress theme template demonstrating Object-Oriented Programming (OOP) architecture with proper PHP namespacing and PSR-4 autoloading.

## Features

- **Object-Oriented Architecture**: Clean, modular code structure
- **PSR-4 Autoloading**: Composer-based autoloading for efficient class loading
- **Proper Namespacing**: All classes under `KawaiiUltra\Theme` namespace
- **Single Responsibility Principle**: Each class has a focused purpose
- **Comprehensive PHPDoc**: Full documentation for all classes and methods
- **Modern PHP**: Utilizes PHP 7.4+ features including type declarations

## Architecture

### Namespace Structure

```
KawaiiUltra\Theme\
├── Core\
│   ├── Theme.php          # Main theme initialization
│   ├── Assets.php         # Asset loading and management
│   └── Setup.php          # Theme setup and configuration
├── Admin\
│   └── Customizer.php     # WordPress customizer settings
└── Utils\
    └── Sanitization.php   # Data sanitization helpers
```

### Class Responsibilities

- **`Core\Theme`**: Main theme bootstrap, coordinates all components
- **`Core\Assets`**: Manages CSS/JS enqueuing and custom styles
- **`Core\Setup`**: Handles theme supports, menus, and widget areas
- **`Admin\Customizer`**: WordPress customizer settings and controls
- **`Utils\Sanitization`**: Centralized data sanitization methods

## Installation

1. Clone or download the theme to your WordPress themes directory
2. Install Composer dependencies:
   ```bash
   composer install --no-dev
   ```
3. Activate the theme in WordPress admin

## Development

### Requirements

- PHP 7.4 or higher
- Composer
- WordPress 5.0 or higher

### Development Setup

1. Install all dependencies including dev dependencies:
   ```bash
   composer install
   ```

2. Run code style checks:
   ```bash
   composer run cs-check
   ```

3. Fix code style issues:
   ```bash
   composer run cs-fix
   ```

### Adding New Features

1. Create new classes in appropriate namespaces under `inc/`
2. Follow PSR-4 autoloading conventions
3. Add proper PHPDoc comments
4. Use type declarations for all method parameters and return values
5. Implement proper error handling and sanitization

## Migration from Procedural

This theme demonstrates the migration from procedural WordPress theme development to modern OOP practices:

### Before (Procedural)
```php
function kawaii_ultra_setup() {
    add_theme_support('title-tag');
    // ... more setup code
}
add_action('after_setup_theme', 'kawaii_ultra_setup');
```

### After (OOP)
```php
namespace KawaiiUltra\Theme\Core;

class Setup {
    public function init(): void {
        add_action('after_setup_theme', [$this, 'theme_setup']);
    }
    
    public function theme_setup(): void {
        add_theme_support('title-tag');
        // ... more setup code
    }
}
```

## Benefits of OOP Architecture

1. **Better Organization**: Related functionality grouped in classes
2. **Reusability**: Classes can be extended and reused
3. **Maintainability**: Easier to modify and debug specific features
4. **Testing**: Individual classes can be unit tested
5. **No Global Namespace Pollution**: All functions properly namespaced
6. **Modern PHP Standards**: Follows current best practices

## File Structure

```
kawaii-ultra-theme/
├── inc/                    # OOP classes (PSR-4 autoloaded)
│   ├── Core/
│   ├── Admin/
│   └── Utils/
├── vendor/                 # Composer dependencies (gitignored)
├── composer.json          # Composer configuration
├── functions.php          # Theme bootstrap (minimal)
├── style.css              # Theme stylesheet
├── index.php              # Main template
├── header.php             # Header template
├── footer.php             # Footer template
└── README.md              # This file
```

## License

MIT License - see LICENSE file for details.

## Contributing

1. Follow WordPress coding standards
2. Use proper PHPDoc comments
3. Include type declarations
4. Write unit tests for new functionality
5. Update documentation as needed