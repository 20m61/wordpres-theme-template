# Development Guide

This guide provides information on developing with the KawaiiUltra WordPress theme, including Composer usage, Vite build system, coding standards, and testing.

## Prerequisites

- PHP 7.4 or higher
- Composer 2.0 or higher
- Node.js 16.0 or higher
- npm 7.0 or higher  
- WordPress 5.0 or higher

## Getting Started

### 1. Install Dependencies

For production deployment:
```bash
composer install --no-dev --optimize-autoloader
npm install --production
npm run build
```

For development:
```bash
composer install
npm install
```

### 2. Build System

The theme uses Vite for modern asset compilation. See [BUILD.md](BUILD.md) for detailed information.

**Quick Start:**
```bash
# Development with HMR
npm run dev

# Production build
npm run build
```

### 3. Autoloading

The theme uses PSR-4 autoloading with Composer. All classes in the `inc/` directory are automatically loaded using the `KawaiiUltra\Theme\` namespace.

Example:
- `inc/Core/Theme.php` → `KawaiiUltra\Theme\Core\Theme`
- `inc/Admin/Customizer.php` → `KawaiiUltra\Theme\Admin\Customizer`
- `inc/Utils/Sanitization.php` → `KawaiiUltra\Theme\Utils\Sanitization`

## Development Workflow

### Code Quality Tools

The project includes several tools to maintain code quality:

#### PHP CodeSniffer with WordPress Standards

Check code style:
```bash
composer run cs-check
```

Fix code style issues automatically:
```bash
composer run cs-fix
```

#### PHPStan Static Analysis

Run static analysis:
```bash
composer run analyze
```

#### Run All Quality Checks

Run both linting and static analysis:
```bash
composer run lint
```

Run all quality checks including tests:
```bash
composer run quality
```

#### PHPUnit Testing

Run unit tests:
```bash
composer run test
```

## Coding Standards

### WordPress Coding Standards

The project follows WordPress coding standards with some modifications:

- **Short array syntax** is allowed (`[]` instead of `array()`)
- **Modern PHP features** are encouraged (type declarations, null coalescing, etc.)
- **Proper namespacing** is required for all classes
- **PHPDoc blocks** are required for all classes and methods

### File Structure

```
kawaii-ultra-theme/
├── .github/                # GitHub configuration
│   ├── dependabot.yml     # Automated dependency updates
│   └── mergify.yml        # Automated PR management
├── inc/                   # OOP classes (PSR-4 autoloaded)
│   ├── Core/             # Core theme functionality
│   ├── Admin/            # Admin and customizer features
│   └── Utils/            # Utility classes
├── vendor/               # Composer dependencies (gitignored)
├── composer.json         # Composer configuration
├── phpcs.xml            # PHP CodeSniffer configuration
├── phpstan.neon         # PHPStan configuration
├── functions.php        # Theme bootstrap (minimal)
└── ...                  # WordPress theme files
```

## Adding New Features

### 1. Create a New Class

Create new classes in the appropriate namespace under `inc/`:

```php
<?php
namespace KawaiiUltra\Theme\Core;

/**
 * Example class
 */
class Example {
    /**
     * Initialize the class
     */
    public function init(): void {
        // Initialize hooks and functionality
    }
}
```

### 2. Use the Class

Classes are automatically loaded via Composer's autoloader:

```php
use KawaiiUltra\Theme\Core\Example;

$example = new Example();
$example->init();
```

### 3. Follow WordPress Hooks Pattern

```php
public function init(): void {
    add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    add_filter('body_class', [$this, 'body_classes']);
}

public function enqueue_scripts(): void {
    // Enqueue scripts
}

public function body_classes(array $classes): array {
    // Modify body classes
    return $classes;
}
```

## Dependency Management

### Automated Updates

The project uses Dependabot for automated dependency updates:

- **Composer dependencies** are checked weekly on Mondays
- **Patch updates** are auto-merged if tests pass
- **Minor updates** require approval before auto-merging
- **Major updates** require manual review

### Manual Dependency Management

Add a new dependency:
```bash
composer require vendor/package
```

Add a development dependency:
```bash
composer require --dev vendor/package
```

Update dependencies:
```bash
composer update
```

Update a specific package:
```bash
composer update vendor/package
```

## Testing

### Unit Testing with PHPUnit

Create tests in the `tests/` directory following PHPUnit conventions:

```php
<?php
namespace KawaiiUltra\Theme\Tests;

use PHPUnit\Framework\TestCase;
use KawaiiUltra\Theme\Core\Theme;

class ThemeTest extends TestCase {
    public function test_theme_initialization(): void {
        $theme = new Theme();
        $this->assertInstanceOf(Theme::class, $theme);
    }
}
```

Run tests:
```bash
composer run test
```

### Integration Testing

For WordPress-specific functionality, consider using:
- WP_Mock for mocking WordPress functions
- WordPress's official testing framework

## Deployment

### Production Deployment

1. Install production dependencies only:
```bash
composer install --no-dev --optimize-autoloader
```

2. Ensure the `vendor/` directory is included in your deployment

3. The theme will automatically check for the autoloader and provide user-friendly error messages if missing

### Theme Activation

The theme includes proper error handling in `functions.php`:
- If Composer dependencies are missing, it shows a helpful error message in debug mode
- In production, it logs the error and gracefully disables theme features

## Configuration Files

### composer.json

Contains project metadata, dependencies, autoloading configuration, and scripts.

### phpcs.xml

Configures PHP CodeSniffer with WordPress coding standards and project-specific rules.

### phpstan.neon

Configures PHPStan static analysis with appropriate settings for WordPress development.

### .github/dependabot.yml

Configures automated dependency updates via Dependabot.

### .github/mergify.yml

Configures automated PR management and merging rules.

## Troubleshooting

### Autoloader Not Found

If you see "Composer dependencies not found" error:

1. Make sure Composer is installed
2. Run `composer install` in the theme directory
3. Verify `vendor/autoload.php` exists

### Coding Standards Issues

If PHPCS reports issues:

1. Run `composer run cs-fix` to auto-fix
2. Manually fix remaining issues
3. Run `composer run cs-check` to verify

### Static Analysis Errors

If PHPStan reports errors:

1. Check the error messages in detail
2. Fix type annotations and method signatures
3. Add PHPStan ignore comments for WordPress-specific issues if needed

## Contributing

1. Follow WordPress coding standards
2. Use proper PHPDoc comments
3. Include type declarations
4. Write unit tests for new functionality
5. Update documentation as needed
6. Ensure all quality checks pass before submitting PRs