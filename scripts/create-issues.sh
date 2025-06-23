#!/bin/bash

# Create all GitHub issues for KawaiiUltra WordPress Theme project
# Usage: ./create-issues.sh [owner/repo]

REPO=${1:-"$(gh repo view --json nameWithOwner -q .nameWithOwner)"}
ISSUE_DIR="../github-issues"

echo "Creating issues for repository: $REPO"
echo "=========================================="

# Function to create an issue
create_issue() {
    local number=$1
    local title=$2
    local labels=$3
    local milestone=$4
    local body=$5
    
    echo "Creating Issue #$number: $title"
    
    gh issue create \
        --repo "$REPO" \
        --title "$title" \
        --body "$body" \
        --label "$labels" \
        --milestone "$milestone" \
        2>/dev/null || echo "  ⚠️  Failed to create issue #$number"
}

# Architecture Issues (Phase 1)
echo -e "\n📁 Creating Architecture Issues..."

create_issue 1 \
    "Refactor functions.php to Object-Oriented Architecture with Namespacing" \
    "enhancement,architecture,high-priority" \
    "Phase 1: Foundation" \
    "$(cat <<'EOF'
**Description:**
Current `functions.php` file is bloated with procedural code. We need to migrate to a modern OOP architecture with proper PHP namespacing.

**Tasks:**
- [ ] Create namespace structure `KawaiiUltra\Theme`
- [ ] Extract functionality into logical classes:
  - [ ] `Core\Theme` - Main theme initialization
  - [ ] `Core\Assets` - Asset loading and management
  - [ ] `Core\Setup` - Theme setup and configuration
  - [ ] `Admin\Customizer` - Customizer settings
  - [ ] `Utils\Sanitization` - Data sanitization helpers
- [ ] Implement PSR-4 autoloading via Composer
- [ ] Update `functions.php` to bootstrap the OOP structure
- [ ] Add comprehensive PHPDoc comments

**Acceptance Criteria:**
- All procedural code removed from functions.php
- Each class has single responsibility
- No naming conflicts with other themes/plugins
- All functions properly namespaced
EOF
)"

create_issue 2 \
    "Set up Composer for dependency management and autoloading" \
    "enhancement,architecture,tooling" \
    "Phase 1: Foundation" \
    "$(cat <<'EOF'
**Description:**
Implement Composer for managing PHP dependencies and enabling PSR-4 autoloading.

**Tasks:**
- [ ] Create `composer.json` with project metadata
- [ ] Configure PSR-4 autoloading for `src/php/Classes`
- [ ] Add development dependencies:
  - [ ] PHPUnit for testing
  - [ ] PHP_CodeSniffer with WordPress standards
  - [ ] PHPStan for static analysis
- [ ] Set up Dependabot for automated dependency updates
- [ ] Configure Mergify for auto-merging dependency updates
- [ ] Document Composer usage in DEVELOPMENT.md

**Acceptance Criteria:**
- Composer properly manages all PHP dependencies
- Autoloading works without manual require statements
- Automated dependency updates configured
EOF
)"

create_issue 3 \
    "Extract plugin-like functionality into separate companion plugin" \
    "enhancement,architecture,refactoring" \
    "Phase 1: Foundation" \
    "$(cat <<'EOF'
**Description:**
Following WordPress best practices, we need to separate functionality that doesn't belong in a theme.

**Tasks:**
- [ ] Audit current functions.php for non-presentation functionality
- [ ] Create companion plugin `kawaiiultra-functionality`
- [ ] Move the following to plugin:
  - [ ] Custom post types
  - [ ] Custom taxonomies
  - [ ] Shortcodes (non-design related)
  - [ ] API integrations
  - [ ] Complex business logic
- [ ] Ensure theme gracefully handles plugin absence
- [ ] Document plugin dependency in README

**Acceptance Criteria:**
- Theme contains only presentation-related code
- Plugin handles all functionality
- Site remains functional when switching themes
- Clear documentation on theme/plugin relationship
EOF
)"

create_issue 4 \
    "Create reusable components system with blocks and patterns" \
    "enhancement,architecture,frontend" \
    "Phase 2: Frontend Modernization" \
    "$(cat <<'EOF'
**Description:**
Establish a comprehensive system of reusable components aligned with the Kawaii design system.

**Tasks:**
- [ ] Create custom Gutenberg blocks for Kawaii components:
  - [ ] Kawaii Button Block
  - [ ] Kawaii Card Block
  - [ ] Kawaii Gallery Block
- [ ] Develop block patterns for common layouts:
  - [ ] Hero sections
  - [ ] Call-to-action sections
  - [ ] Feature showcases
- [ ] Implement template parts:
  - [ ] Reusable headers/footers
  - [ ] Sidebar variations
- [ ] Create block variations for different Kawaii styles
- [ ] Document component usage and variations

**Acceptance Criteria:**
- All components follow Kawaii design system
- Components are easily reusable across pages
- Non-technical users can use components via block editor
- Comprehensive documentation for each component
EOF
)"

create_issue 5 \
    "Set up Vite for asset compilation and hot module replacement" \
    "enhancement,tooling,developer-experience" \
    "Phase 1: Foundation" \
    "$(cat <<'EOF'
**Description:**
Implement Vite as the modern build tool for compiling and optimizing frontend assets.

**Tasks:**
- [ ] Configure Vite for WordPress theme development
- [ ] Set up compilation for:
  - [ ] Sass to CSS with autoprefixing
  - [ ] ES6+ JavaScript with bundling
  - [ ] Image optimization
- [ ] Enable Hot Module Replacement (HMR) for development
- [ ] Configure production build with:
  - [ ] Minification
  - [ ] Source maps
  - [ ] Asset versioning
- [ ] Integrate with WordPress enqueue system
- [ ] Add npm scripts for development and production builds

**Acceptance Criteria:**
- Vite successfully compiles all assets
- HMR works in development environment
- Production builds are optimized
- Build process documented
EOF
)"

# Frontend Issues (Phase 2)
echo -e "\n🎨 Creating Frontend Issues..."

create_issue 6 \
    "Migrate theme to block-based templates with Full Site Editing" \
    "enhancement,frontend,high-priority,gutenberg" \
    "Phase 2: Frontend Modernization" \
    "$(cat <<'EOF'
**Description:**
Transform the theme to fully embrace WordPress's block editor paradigm with Full Site Editing capabilities.

**Tasks:**
- [ ] Convert PHP templates to block-based HTML templates:
  - [ ] index.html
  - [ ] single.html
  - [ ] page.html
  - [ ] archive.html
  - [ ] 404.html
- [ ] Create block template parts:
  - [ ] header.html
  - [ ] footer.html
  - [ ] sidebar.html
- [ ] Implement Query Loop blocks for dynamic content
- [ ] Configure block editor settings in theme.json
- [ ] Remove legacy PHP template files after migration
- [ ] Test with various content scenarios

**Acceptance Criteria:**
- All templates use block-based structure
- Content editors can modify layouts via Site Editor
- No reliance on classic PHP templates
- Maintains Kawaii aesthetic throughout
EOF
)"

create_issue 7 \
    "Implement comprehensive theme.json for global styles and block settings" \
    "enhancement,frontend,design-system" \
    "Phase 2: Frontend Modernization" \
    "$(cat <<'EOF'
**Description:**
Create a robust theme.json file that serves as the single source of truth for the Kawaii design system.

**Tasks:**
- [ ] Define color palette with Kawaii colors:
  - [ ] Primary pink shades
  - [ ] Accent colors
  - [ ] Neutral colors
- [ ] Configure typography settings:
  - [ ] Font families (with self-hosted fonts)
  - [ ] Font sizes with fluid typography
  - [ ] Line heights and letter spacing
- [ ] Set spacing scale and layout settings:
  - [ ] Consistent spacing units
  - [ ] Content width and wide alignment
- [ ] Configure block-specific settings:
  - [ ] Default block styles
  - [ ] Allowed customizations
  - [ ] Block supports
- [ ] Define custom CSS properties for advanced styling
- [ ] Add duotone filters for Kawaii image effects

**Acceptance Criteria:**
- theme.json controls all global styles
- Design tokens are consistently applied
- Block editor reflects theme styles accurately
- Customization options appropriately limited
EOF
)"

create_issue 8 \
    "Implement modular Sass architecture with BEM naming convention" \
    "enhancement,frontend,css,refactoring" \
    "Phase 2: Frontend Modernization" \
    "$(cat <<'EOF'
**Description:**
Restructure all CSS using Sass with a block-centric architecture and BEM methodology.

**Tasks:**
- [ ] Set up Sass compilation in Vite build process
- [ ] Organize styles following block-centric pattern:
  - [ ] abstracts/ (variables, mixins, functions)
  - [ ] base/ (reset, typography, global)
  - [ ] blocks/ (Gutenberg block styles)
  - [ ] components/ (buttons, forms, cards)
  - [ ] layouts/ (header, footer, grid)
- [ ] Convert existing CSS to Sass with:
  - [ ] Variables for design tokens
  - [ ] Mixins for common patterns
  - [ ] Nesting for logical grouping
- [ ] Apply BEM naming convention throughout
- [ ] Integrate theme.json values into Sass variables
- [ ] Remove redundant/unused styles

**Acceptance Criteria:**
- All styles use Sass features effectively
- BEM naming applied consistently
- No CSS conflicts or specificity issues
- Styles synchronized with theme.json
EOF
)"

create_issue 9 \
    "Develop comprehensive library of reusable Kawaii block patterns" \
    "enhancement,frontend,design-system,content" \
    "Phase 2: Frontend Modernization" \
    "$(cat <<'EOF'
**Description:**
Build a collection of block patterns that embody the Kawaii aesthetic for easy content creation.

**Tasks:**
- [ ] Design and implement synced patterns:
  - [ ] Kawaii Hero Section
  - [ ] Kawaii Feature Grid
  - [ ] Kawaii Testimonial Carousel
  - [ ] Kawaii CTA Section
  - [ ] Kawaii Team Member Cards
- [ ] Create unsynced pattern variations:
  - [ ] Different color schemes
  - [ ] Layout variations
  - [ ] Content density options
- [ ] Add pattern categories in theme.json
- [ ] Include demo content for each pattern
- [ ] Create pattern documentation
- [ ] Register patterns properly in PHP

**Acceptance Criteria:**
- Patterns maintain consistent Kawaii style
- Easy to insert and customize
- Work across different page contexts
- Well-documented for users
EOF
)"

create_issue 10 \
    "Set up ES6+ modules with proper component structure" \
    "enhancement,frontend,javascript,refactoring" \
    "Phase 2: Frontend Modernization" \
    "$(cat <<'EOF'
**Description:**
Modernize JavaScript codebase with ES6+ modules and component-based architecture.

**Tasks:**
- [ ] Migrate from jQuery to vanilla JavaScript
- [ ] Structure JS modules:
  - [ ] blocks/ (block-specific scripts)
  - [ ] components/ (reusable UI components)
  - [ ] utils/ (helper functions)
  - [ ] main.js (entry point)
- [ ] Implement ES6+ features:
  - [ ] Arrow functions
  - [ ] Destructuring
  - [ ] Async/await
  - [ ] Classes for complex components
- [ ] Add event delegation for dynamic content
- [ ] Implement intersection observer for animations
- [ ] Configure Vite for module bundling
- [ ] Add JSDoc comments for documentation

**Acceptance Criteria:**
- No jQuery dependencies
- Clean module structure
- Modern JavaScript syntax throughout
- Proper error handling
- Performance optimized
EOF
)"

# Performance Issues (Phase 3)
echo -e "\n⚡ Creating Performance Issues..."

create_issue 11 \
    "Set up automated CSS/JS/HTML minification in build process" \
    "enhancement,performance,high-priority,core-web-vitals" \
    "Phase 3: Performance Optimization" \
    "$(cat <<'EOF'
**Description:**
Configure comprehensive minification for all static assets to improve loading times and Core Web Vitals scores.

**Tasks:**
- [ ] Configure Vite for production minification:
  - [ ] CSS minification with cssnano
  - [ ] JavaScript minification with Terser
  - [ ] HTML minification for templates
- [ ] Set up source maps for debugging
- [ ] Implement conditional loading:
  - [ ] Unminified assets in development
  - [ ] Minified assets in production
- [ ] Add build size reporting
- [ ] Configure critical CSS extraction
- [ ] Test minification impact on functionality

**Acceptance Criteria:**
- All production assets are minified
- Source maps available for debugging
- No functionality broken by minification
- Measurable reduction in file sizes
EOF
)"

create_issue 12 \
    "Add strategic lazy loading for images and videos with LCP optimization" \
    "enhancement,performance,seo,core-web-vitals" \
    "Phase 3: Performance Optimization" \
    "$(cat <<'EOF'
**Description:**
Implement intelligent lazy loading that improves performance without harming Core Web Vitals.

**Tasks:**
- [ ] Audit all image/video loading points
- [ ] Implement native lazy loading:
  - [ ] Add loading="lazy" to appropriate images
  - [ ] Exclude above-the-fold content
  - [ ] Exclude LCP elements
- [ ] Add intersection observer for advanced cases
- [ ] Implement placeholder strategies:
  - [ ] LQIP (Low Quality Image Placeholders)
  - [ ] Aspect ratio boxes to prevent CLS
  - [ ] Skeleton screens for content areas
- [ ] Configure lazy loading for block patterns
- [ ] Add performance monitoring
- [ ] Document lazy loading guidelines

**Acceptance Criteria:**
- Images below fold are lazy loaded
- LCP elements load immediately
- No layout shift from lazy loading
- Improved initial page load time
EOF
)"

create_issue 13 \
    "Self-host fonts with subsetting and optimal loading strategies" \
    "enhancement,performance,typography,gdpr" \
    "Phase 3: Performance Optimization" \
    "$(cat <<'EOF'
**Description:**
Optimize web font loading for performance and privacy compliance by self-hosting and subsetting.

**Tasks:**
- [ ] Download and self-host Google Fonts:
  - [ ] Identify required font families
  - [ ] Download only needed weights/styles
  - [ ] Convert to WOFF2 format
- [ ] Implement font subsetting:
  - [ ] Remove unused glyphs
  - [ ] Create Latin subset
  - [ ] Add Japanese subset if needed
- [ ] Configure optimal loading:
  - [ ] Use font-display: swap
  - [ ] Preload critical fonts
  - [ ] Implement fallback font stack
- [ ] Update theme.json with local fonts
- [ ] Remove Google Fonts external requests
- [ ] Test font rendering across browsers

**Acceptance Criteria:**
- All fonts self-hosted
- Reduced font file sizes via subsetting
- No FOIT (Flash of Invisible Text)
- GDPR compliant (no external requests)
EOF
)"

create_issue 14 \
    "Optimize resource loading and reduce DOM complexity" \
    "enhancement,performance,high-priority,core-web-vitals" \
    "Phase 3: Performance Optimization" \
    "$(cat <<'EOF'
**Description:**
Reduce the number of HTTP requests and optimize DOM structure for better performance.

**Tasks:**
- [ ] Audit current HTTP requests:
  - [ ] Identify redundant requests
  - [ ] Find combinable resources
  - [ ] Check for unused assets
- [ ] Implement request reduction:
  - [ ] Combine CSS files in build
  - [ ] Bundle JavaScript modules
  - [ ] Sprite SVG icons
  - [ ] Inline critical CSS
- [ ] Optimize DOM structure:
  - [ ] Remove unnecessary wrapper divs
  - [ ] Simplify block markup
  - [ ] Limit nesting depth to <32
  - [ ] Keep child nodes <60 per parent
- [ ] Configure resource hints:
  - [ ] DNS prefetch for external domains
  - [ ] Preconnect for critical origins
  - [ ] Prefetch for likely navigations
- [ ] Implement code splitting for large JS

**Acceptance Criteria:**
- Reduced total HTTP requests
- DOM size within recommended limits
- Improved Time to Interactive
- No broken functionality
EOF
)"

create_issue 15 \
    "Optimize animations for performance and accessibility" \
    "enhancement,performance,accessibility,animation" \
    "Phase 3: Performance Optimization" \
    "$(cat <<'EOF'
**Description:**
Create performant CSS animations that respect user preferences and maintain smooth 60fps.

**Tasks:**
- [ ] Audit existing animations:
  - [ ] Identify performance bottlenecks
  - [ ] Find JavaScript animations to convert
  - [ ] Check for layout-triggering properties
- [ ] Optimize animation performance:
  - [ ] Use transform and opacity only
  - [ ] Add will-change for complex animations
  - [ ] Implement GPU acceleration hints
  - [ ] Remove jQuery animations
- [ ] Add accessibility features:
  - [ ] Respect prefers-reduced-motion
  - [ ] Add animation toggle controls
  - [ ] Ensure no seizure-inducing effects
- [ ] Implement smooth scrolling:
  - [ ] CSS scroll-behavior: smooth
  - [ ] Intersection Observer for scroll animations
  - [ ] Throttle scroll event handlers
- [ ] Create animation utilities:
  - [ ] Reusable animation classes
  - [ ] Sass mixins for common effects
  - [ ] Documentation for usage

**Acceptance Criteria:**
- All animations run at 60fps
- Reduced motion preferences respected
- No janky scrolling or animations
- Clear animation guidelines documented
EOF
)"

create_issue 16 \
    "Set up automated image optimization with modern formats" \
    "enhancement,performance,media,build-tools" \
    "Phase 3: Performance Optimization" \
    "$(cat <<'EOF'
**Description:**
Create comprehensive image optimization workflow with modern format support.

**Tasks:**
- [ ] Configure Vite image optimization:
  - [ ] Automatic compression
  - [ ] WebP generation
  - [ ] AVIF generation for supported browsers
  - [ ] Responsive image generation
- [ ] Implement picture element strategy:
  - [ ] WebP/AVIF with JPEG fallback
  - [ ] Art direction for different viewports
  - [ ] Proper srcset implementation
- [ ] Add image processing utilities:
  - [ ] Automatic alt text reminders
  - [ ] Dimension attributes for CLS prevention
  - [ ] Loading strategy attributes
- [ ] Create image component/block:
  - [ ] Automatic optimization
  - [ ] Format selection
  - [ ] Lazy loading integration
- [ ] Document image guidelines:
  - [ ] Recommended dimensions
  - [ ] File size limits
  - [ ] Format selection criteria

**Acceptance Criteria:**
- Automated image optimization in build
- Modern format support with fallbacks
- Significant file size reductions
- No visual quality degradation
EOF
)"

# Development Workflow Issues (Phase 1 & 4)
echo -e "\n🛠️ Creating Development Workflow Issues..."

create_issue 17 \
    "Configure Docker/DDEV for consistent local development" \
    "enhancement,tooling,developer-experience,docker" \
    "Phase 1: Foundation" \
    "$(cat <<'EOF'
**Description:**
Establish a containerized development environment using Docker and DDEV for consistent development across the team.

**Tasks:**
- [ ] Create Docker configuration:
  - [ ] PHP 8.1+ with necessary extensions
  - [ ] MySQL 8.0
  - [ ] Nginx with WordPress rules
  - [ ] Node.js for build tools
- [ ] Configure docker-compose.yml:
  - [ ] Service definitions
  - [ ] Volume mappings
  - [ ] Network configuration
  - [ ] Environment variables
- [ ] Set up DDEV alternative:
  - [ ] .ddev/config.yaml
  - [ ] Custom PHP configuration
  - [ ] Database import/export scripts
- [ ] Add development utilities:
  - [ ] WP-CLI integration
  - [ ] PHPMyAdmin/Adminer
  - [ ] Mailhog for email testing
- [ ] Create setup documentation:
  - [ ] Installation instructions
  - [ ] Common commands
  - [ ] Troubleshooting guide

**Acceptance Criteria:**
- One-command environment setup
- Consistent across all platforms
- Includes all necessary tools
- Well-documented procedures
EOF
)"

create_issue 18 \
    "Set up PHPUnit, Vitest, and Playwright for comprehensive testing" \
    "enhancement,testing,quality-assurance,ci" \
    "Phase 4: Quality Assurance" \
    "$(cat <<'EOF'
**Description:**
Establish a complete testing framework covering unit, integration, and E2E tests.

**Tasks:**
- [ ] Configure PHPUnit for PHP testing:
  - [ ] Bootstrap file for WordPress
  - [ ] Test database configuration
  - [ ] Mock objects for WordPress functions
  - [ ] Code coverage reporting
- [ ] Set up Vitest for JavaScript:
  - [ ] Test configuration
  - [ ] Component testing setup
  - [ ] Coverage reporting
  - [ ] Watch mode configuration
- [ ] Implement Playwright for E2E:
  - [ ] Browser configuration
  - [ ] Test scenarios for key workflows
  - [ ] Visual regression tests
  - [ ] Accessibility tests
- [ ] Create test fixtures and factories
- [ ] Add testing documentation
- [ ] Integrate with CI pipeline

**Acceptance Criteria:**
- All test suites functional
- 80%+ code coverage target
- E2E tests cover critical paths
- Tests run in CI automatically
EOF
)"

create_issue 19 \
    "Set up automated CI/CD pipeline with GitHub Actions" \
    "enhancement,ci-cd,automation,devops" \
    "Phase 4: Quality Assurance" \
    "$(cat <<'EOF'
**Description:**
Implement comprehensive CI/CD pipeline for automated testing and deployment.

**Tasks:**
- [ ] Create CI workflow (.github/workflows/ci.yml):
  - [ ] Trigger on PR and push
  - [ ] PHP linting and coding standards
  - [ ] JavaScript linting (ESLint)
  - [ ] Unit test execution
  - [ ] E2E test execution
  - [ ] Build verification
- [ ] Set up deployment workflow:
  - [ ] Staging deployment on merge
  - [ ] Production deployment on release
  - [ ] Rollback capabilities
  - [ ] Deployment notifications
- [ ] Configure dependency updates:
  - [ ] Dependabot configuration
  - [ ] Automated security updates
  - [ ] Weekly dependency PRs
- [ ] Add status badges to README
- [ ] Configure branch protection rules
- [ ] Set up code coverage reporting

**Acceptance Criteria:**
- All PRs run through CI
- Automated deployments working
- Dependencies stay updated
- Clear build status visibility
EOF
)"

create_issue 20 \
    "Implement linting, formatting, and code standards enforcement" \
    "enhancement,code-quality,developer-experience" \
    "Phase 4: Quality Assurance" \
    "$(cat <<'EOF'
**Description:**
Set up automated code quality tools and standards for consistent codebase.

**Tasks:**
- [ ] Configure PHP tools:
  - [ ] PHP_CodeSniffer with WordPress standards
  - [ ] PHPStan for static analysis
  - [ ] PHP-CS-Fixer for formatting
  - [ ] Custom ruleset in phpcs.xml
- [ ] Set up JavaScript tooling:
  - [ ] ESLint with WordPress config
  - [ ] Prettier for formatting
  - [ ] TypeScript support (optional)
- [ ] Configure CSS/Sass linting:
  - [ ] Stylelint with custom rules
  - [ ] BEM naming enforcement
  - [ ] Property order rules
- [ ] Add pre-commit hooks:
  - [ ] Husky configuration
  - [ ] lint-staged for changed files
  - [ ] Commit message validation
- [ ] Create .editorconfig file
- [ ] Document coding standards

**Acceptance Criteria:**
- Automated linting on commit
- Consistent code formatting
- CI enforces standards
- Clear documentation
EOF
)"

create_issue 21 \
    "Write comprehensive developer documentation and guides" \
    "documentation,developer-experience,onboarding" \
    "Phase 5: Release Preparation" \
    "$(cat <<'EOF'
**Description:**
Create thorough documentation for developers working on the theme.

**Tasks:**
- [ ] Write DEVELOPMENT.md:
  - [ ] Environment setup
  - [ ] Build commands
  - [ ] Testing procedures
  - [ ] Deployment process
- [ ] Create CONTRIBUTING.md:
  - [ ] Code style guide
  - [ ] PR process
  - [ ] Issue templates
  - [ ] Review checklist
- [ ] Document architecture:
  - [ ] Folder structure
  - [ ] Class hierarchy
  - [ ] Data flow
  - [ ] Hook documentation
- [ ] Add inline documentation:
  - [ ] PHPDoc for all classes/methods
  - [ ] JSDoc for JavaScript
  - [ ] Sass documentation
- [ ] Create design system docs:
  - [ ] Component library
  - [ ] Pattern usage
  - [ ] Styling guidelines
- [ ] Add troubleshooting guide

**Acceptance Criteria:**
- Complete onboarding documentation
- All code well-documented
- Examples for common tasks
- Searchable and organized
EOF
)"

# Quality Assurance Issues (Phase 4 & 5)
echo -e "\n✅ Creating Quality Assurance Issues..."

create_issue 22 \
    "Ensure full WCAG 2.1 AA accessibility compliance" \
    "enhancement,accessibility,high-priority,compliance" \
    "Phase 4: Quality Assurance" \
    "$(cat <<'EOF'
**Description:**
Implement comprehensive accessibility features following WCAG 2.1 AA guidelines and POUR principles.

**Tasks:**
- [ ] Perceivable improvements:
  - [ ] Add alt text to all images
  - [ ] Ensure 4.5:1 contrast ratio for normal text
  - [ ] Ensure 3:1 contrast ratio for large text
  - [ ] Add captions/transcripts for media
- [ ] Operable enhancements:
  - [ ] Full keyboard navigation support
  - [ ] Skip links implementation
  - [ ] Focus indicators styling
  - [ ] No keyboard traps
- [ ] Understandable features:
  - [ ] Clear form labels and instructions
  - [ ] Error identification and suggestions
  - [ ] Consistent navigation
  - [ ] Meaningful link text
- [ ] Robust implementation:
  - [ ] Semantic HTML structure
  - [ ] ARIA labels where needed
  - [ ] Valid HTML markup
  - [ ] Screen reader testing
- [ ] Add accessibility testing:
  - [ ] Axe DevTools integration
  - [ ] Automated a11y tests
  - [ ] Manual testing checklist
- [ ] Create accessibility statement

**Acceptance Criteria:**
- Passes WAVE and Axe audits
- Keyboard fully functional
- Screen reader compatible
- WCAG AA compliant
EOF
)"

create_issue 23 \
    "Apply WordPress security hardening and best practices" \
    "security,high-priority,compliance" \
    "Phase 4: Quality Assurance" \
    "$(cat <<'EOF'
**Description:**
Implement comprehensive security measures to protect against common vulnerabilities.

**Tasks:**
- [ ] Input validation and sanitization:
  - [ ] Sanitize all user inputs
  - [ ] Validate data types
  - [ ] Implement nonces for forms
  - [ ] Escape all outputs
- [ ] File security:
  - [ ] Prevent direct file access
  - [ ] Secure file uploads
  - [ ] Hide sensitive files
  - [ ] Implement file permissions
- [ ] Database security:
  - [ ] Use prepared statements
  - [ ] Implement proper escaping
  - [ ] Limit database privileges
  - [ ] Regular backups
- [ ] Authentication hardening:
  - [ ] Strong password requirements
  - [ ] Login attempt limiting
  - [ ] Two-factor auth support
  - [ ] Session management
- [ ] Security headers:
  - [ ] Content Security Policy
  - [ ] X-Frame-Options
  - [ ] X-Content-Type-Options
  - [ ] Referrer Policy
- [ ] Create security documentation

**Acceptance Criteria:**
- Passes security audit
- No SQL injection vulnerabilities
- No XSS vulnerabilities
- Follows OWASP guidelines
EOF
)"

create_issue 24 \
    "Implement comprehensive SEO optimizations and structured data" \
    "enhancement,seo,performance" \
    "Phase 5: Release Preparation" \
    "$(cat <<'EOF'
**Description:**
Built-in SEO optimizations without relying on external plugins.

**Tasks:**
- [ ] Meta tag management:
  - [ ] Dynamic title tags
  - [ ] Meta descriptions
  - [ ] Canonical URLs
  - [ ] Robots meta tags
- [ ] Open Graph implementation:
  - [ ] OG tags for all pages
  - [ ] Twitter Card support
  - [ ] Social media previews
  - [ ] Image optimization
- [ ] Structured data (JSON-LD):
  - [ ] Organization schema
  - [ ] Article schema
  - [ ] Breadcrumb schema
  - [ ] FAQ schema for relevant content
- [ ] Technical SEO:
  - [ ] XML sitemap generation
  - [ ] Clean URL structure
  - [ ] 404 error handling
  - [ ] Redirect management
- [ ] Performance SEO:
  - [ ] Core Web Vitals optimization
  - [ ] Mobile-first approach
  - [ ] Fast loading times
- [ ] Create SEO guidelines document

**Acceptance Criteria:**
- Rich snippets in search results
- Passing SEO audit tools
- Improved Core Web Vitals
- Clean, crawlable structure
EOF
)"

create_issue 25 \
    "Ensure theme works across all major browsers and devices" \
    "testing,compatibility,quality-assurance" \
    "Phase 5: Release Preparation" \
    "$(cat <<'EOF'
**Description:**
Comprehensive testing across browsers, devices, and screen sizes.

**Tasks:**
- [ ] Desktop browser testing:
  - [ ] Chrome (latest 2 versions)
  - [ ] Firefox (latest 2 versions)
  - [ ] Safari (latest 2 versions)
  - [ ] Edge (latest 2 versions)
- [ ] Mobile browser testing:
  - [ ] iOS Safari
  - [ ] Chrome Android
  - [ ] Samsung Internet
- [ ] Responsive testing:
  - [ ] Mobile (320px - 768px)
  - [ ] Tablet (768px - 1024px)
  - [ ] Desktop (1024px+)
  - [ ] Large screens (1920px+)
- [ ] Feature detection:
  - [ ] CSS Grid fallbacks
  - [ ] Modern JS polyfills
  - [ ] Progressive enhancement
- [ ] Visual regression testing:
  - [ ] Screenshot comparisons
  - [ ] Layout consistency
  - [ ] Font rendering
- [ ] Document browser support matrix

**Acceptance Criteria:**
- No breaking issues in major browsers
- Graceful degradation for older browsers
- Consistent experience across devices
- Documented browser support
EOF
)"

create_issue 26 \
    "Set up performance monitoring and continuous optimization" \
    "performance,monitoring,analytics" \
    "Phase 5: Release Preparation" \
    "$(cat <<'EOF'
**Description:**
Implement tools and processes for ongoing performance monitoring and optimization.

**Tasks:**
- [ ] Core Web Vitals monitoring:
  - [ ] LCP tracking
  - [ ] FID/INP tracking
  - [ ] CLS tracking
  - [ ] Performance budgets
- [ ] Real User Monitoring (RUM):
  - [ ] Client-side performance API
  - [ ] Custom performance marks
  - [ ] Error tracking
  - [ ] User timing API
- [ ] Synthetic monitoring:
  - [ ] Lighthouse CI integration
  - [ ] WebPageTest automation
  - [ ] Performance regression alerts
- [ ] Analytics integration:
  - [ ] Google Analytics 4
  - [ ] Custom events
  - [ ] Performance tracking
  - [ ] User behavior insights
- [ ] Performance dashboard:
  - [ ] Key metrics visualization
  - [ ] Historical trends
  - [ ] Alerts and notifications
- [ ] Optimization documentation

**Acceptance Criteria:**
- Automated performance tracking
- Clear performance metrics
- Alerting for regressions
- Data-driven optimization
EOF
)"

create_issue 27 \
    "Ensure theme meets all WordPress.org directory requirements" \
    "compliance,wordpress-standards,release" \
    "Phase 5: Release Preparation" \
    "$(cat <<'EOF'
**Description:**
Prepare theme for potential WordPress.org directory submission.

**Tasks:**
- [ ] License compliance:
  - [ ] GPL v2+ license
  - [ ] License headers in files
  - [ ] Third-party licenses documented
  - [ ] No non-GPL code
- [ ] Code requirements:
  - [ ] No PHP errors/warnings
  - [ ] WordPress coding standards
  - [ ] Proper internationalization
  - [ ] Secure code practices
- [ ] Feature compliance:
  - [ ] No plugin territory features
  - [ ] Proper theme features only
  - [ ] Standard WordPress APIs
  - [ ] No admin notices
- [ ] File requirements:
  - [ ] Required files present
  - [ ] No development files
  - [ ] Proper file structure
  - [ ] Screenshot.png (1200x900)
- [ ] Documentation:
  - [ ] Clear readme.txt
  - [ ] Changelog maintenance
  - [ ] Credit attributions
- [ ] Theme check plugin validation

**Acceptance Criteria:**
- Passes Theme Check plugin
- Meets all directory requirements
- Ready for submission
- Professional presentation
EOF
)"

echo -e "\n✅ All issues created successfully!"
echo "Total issues created: 27"
echo ""
echo "Next steps:"
echo "1. Review the created issues in your repository"
echo "2. Assign team members to specific issues"
echo "3. Start with Phase 1 issues (#1, #2, #3, #5, #17)"
echo "4. Set up your project board to track progress"