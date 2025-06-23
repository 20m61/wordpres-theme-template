# KawaiiUltra WordPress Theme Project Structure

## Root Directory Structure
```
kawaiiultra/
├── .github/
│   ├── workflows/
│   │   ├── ci.yml
│   │   ├── deploy.yml
│   │   └── dependency-update.yml
│   └── ISSUE_TEMPLATE/
│       ├── bug_report.md
│       ├── feature_request.md
│       └── performance_issue.md
├── src/
│   ├── php/
│   │   ├── Classes/
│   │   │   ├── Core/
│   │   │   │   ├── Theme.php
│   │   │   │   ├── Assets.php
│   │   │   │   └── Setup.php
│   │   │   ├── Blocks/
│   │   │   │   ├── BlockManager.php
│   │   │   │   └── Patterns/
│   │   │   ├── Admin/
│   │   │   │   └── Customizer.php
│   │   │   └── Utils/
│   │   │       ├── Sanitization.php
│   │   │       └── Helpers.php
│   │   └── templates/
│   │       ├── blocks/
│   │       ├── parts/
│   │       └── patterns/
│   ├── js/
│   │   ├── blocks/
│   │   ├── components/
│   │   ├── utils/
│   │   └── main.js
│   └── scss/
│       ├── abstracts/
│       │   ├── _variables.scss
│       │   ├── _mixins.scss
│       │   └── _functions.scss
│       ├── base/
│       │   ├── _reset.scss
│       │   ├── _typography.scss
│       │   └── _global.scss
│       ├── blocks/
│       │   └── _index.scss
│       ├── components/
│       │   ├── _buttons.scss
│       │   ├── _forms.scss
│       │   └── _cards.scss
│       ├── layouts/
│       │   ├── _header.scss
│       │   ├── _footer.scss
│       │   └── _sidebar.scss
│       └── style.scss
├── assets/
│   ├── images/
│   ├── fonts/
│   └── icons/
├── build/
├── languages/
├── tests/
│   ├── php/
│   │   ├── unit/
│   │   └── integration/
│   ├── js/
│   │   └── unit/
│   └── e2e/
│       └── specs/
├── docker/
│   ├── nginx/
│   ├── php/
│   └── mysql/
├── docs/
│   ├── API.md
│   ├── CONTRIBUTING.md
│   ├── DESIGN_SYSTEM.md
│   └── DEVELOPMENT.md
├── templates/
│   ├── index.html
│   ├── single.html
│   ├── page.html
│   ├── archive.html
│   └── 404.html
├── parts/
│   ├── header.html
│   ├── footer.html
│   └── sidebar.html
├── patterns/
│   ├── hero-kawaii.php
│   ├── cta-kawaii.php
│   └── gallery-kawaii.php
├── .editorconfig
├── .eslintrc.js
├── .gitignore
├── .nvmrc
├── .prettierrc
├── composer.json
├── docker-compose.yml
├── functions.php
├── package.json
├── phpcs.xml
├── phpunit.xml
├── playwright.config.js
├── README.md
├── screenshot.png
├── style.css
├── theme.json
└── vite.config.js
```

## Key Directory Descriptions

### `/src/php/Classes/`
Object-oriented PHP code organized by functionality with proper namespacing.

### `/src/scss/`
Sass files following the block-centric architecture pattern with BEM naming conventions.

### `/src/js/`
Modern JavaScript modules for blocks, components, and utilities.

### `/templates/` and `/parts/`
Block-based template files for the Full Site Editing approach.

### `/patterns/`
Reusable block patterns featuring the Kawaii design aesthetic.

### `/tests/`
Comprehensive test suites including unit tests (PHPUnit, Vitest) and E2E tests (Playwright).

### `/docker/`
Docker configuration files for consistent development environments.

### `/docs/`
Internal documentation for development team, API references, and contribution guidelines.