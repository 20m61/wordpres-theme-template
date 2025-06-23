# Frontend Development GitHub Issues

## Issue #6: Implement Full Gutenberg Block Editor Support
**Title:** Migrate theme to block-based templates with Full Site Editing

**Labels:** `enhancement`, `frontend`, `high-priority`, `gutenberg`

**Assignee:** @copilot

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

---

## Issue #7: Configure theme.json for Design System
**Title:** Implement comprehensive theme.json for global styles and block settings

**Labels:** `enhancement`, `frontend`, `design-system`

**Assignee:** @copilot

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

---

## Issue #8: Refactor CSS Architecture with Sass and BEM
**Title:** Implement modular Sass architecture with BEM naming convention

**Labels:** `enhancement`, `frontend`, `css`, `refactoring`

**Assignee:** @copilot

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

---

## Issue #9: Create Kawaii Block Patterns Library
**Title:** Develop comprehensive library of reusable Kawaii block patterns

**Labels:** `enhancement`, `frontend`, `design-system`, `content`

**Assignee:** @copilot

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

---

## Issue #10: Implement Modern JavaScript Architecture
**Title:** Set up ES6+ modules with proper component structure

**Labels:** `enhancement`, `frontend`, `javascript`, `refactoring`

**Assignee:** @copilot

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