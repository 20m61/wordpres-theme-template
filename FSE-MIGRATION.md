# Full Site Editing Migration Guide

This guide helps users transition from the traditional PHP template system to Full Site Editing (FSE) block-based templates.

## What Changed

The KawaiiUltra theme has been migrated to WordPress Full Site Editing, enabling visual customization through the WordPress Site Editor.

### Before (PHP Templates)
- Templates were PHP files (`header.php`, `footer.php`, `index.php`)
- Customization required code editing
- Limited visual editing capabilities

### After (Block Templates)
- Templates are HTML files with WordPress blocks (`templates/index.html`, `parts/header.html`)
- Visual customization through WordPress Site Editor
- No code editing required for layout changes

## Migration Benefits

### For Users
- **Visual Editing**: Customize layouts without code
- **Live Preview**: See changes in real-time
- **Block-based**: Use any WordPress block in templates
- **Responsive**: Built-in responsive design tools

### For Developers
- **Modern Architecture**: Latest WordPress standards
- **Better Performance**: Optimized template rendering
- **Easier Maintenance**: Block-based structure
- **Version Control**: Templates stored as HTML

## Key Changes

### Template Locations
| Old Location | New Location | Notes |
|--------------|--------------|-------|
| `header.php` | `parts/header.html` | Now a template part |
| `footer.php` | `parts/footer.html` | Now a template part |
| `sidebar.php` | `parts/sidebar.html` | Now a template part |
| `index.php` | `templates/index.html` | Main blog template |
| `single-portfolio.php` | `templates/single-portfolio.html` | Portfolio item template |
| `archive-portfolio.php` | `templates/archive-portfolio.html` | Portfolio archive template |

### New Templates
- `templates/404.html` - Custom 404 page
- `templates/blank.html` - Minimal template for custom layouts
- `templates/page-no-title.html` - Page template without title

## How to Customize

### Using the Site Editor

1. **Access Site Editor**
   - Go to `Appearance > Site Editor` in WordPress admin
   - Or visit `/wp-admin/site-editor.php`

2. **Edit Templates**
   - Click "Templates" to see all available templates
   - Select a template to edit
   - Use visual block editor to modify layout

3. **Edit Template Parts**
   - Click "Template Parts" for reusable components
   - Edit header, footer, or sidebar
   - Changes apply to all templates using that part

### Common Customizations

#### Changing Header Layout
1. Go to `Site Editor > Template Parts > Header`
2. Modify the navigation, logo, or search bar
3. Save changes - updates all pages using this header

#### Customizing Colors
1. Go to `Site Editor > Styles > Colors`
2. Adjust the kawaii color palette
3. Changes apply theme-wide

#### Modifying Footer
1. Go to `Site Editor > Template Parts > Footer`
2. Edit social links, copyright, or layout
3. Save to update all pages

#### Adding Custom Blocks
1. Edit any template or template part
2. Click "+" to add new blocks
3. Choose from WordPress blocks or custom kawaii blocks

## Advanced Customization

### Custom CSS
Add custom CSS through:
- `Site Editor > Styles > Additional CSS`
- `Appearance > Customize > Additional CSS`

### Block Patterns
Use pre-designed kawaii patterns:
- In Site Editor, click "+" to add blocks
- Go to "Patterns" tab
- Find "Kawaii" category patterns

### Template Hierarchy
FSE follows WordPress template hierarchy:
- `single-portfolio.html` for portfolio items
- `archive-portfolio.html` for portfolio archives
- `page.html` for static pages
- `single.html` for blog posts

## Troubleshooting

### Templates Not Showing
- Clear any caching plugins
- Ensure theme is properly activated
- Check `theme.json` for syntax errors

### Customizations Not Saving
- Check user permissions
- Verify WordPress version (6.0+)
- Clear browser cache

### Missing Template Parts
- Template parts are in `parts/` directory
- Reference them using `<!-- wp:template-part {"slug":"header"} /-->`

### Reverting Changes
- Use WordPress revision system in Site Editor
- Templates can be reset to theme defaults
- Individual blocks can be reverted

## Developer Information

### Theme.json Configuration
The theme uses `theme.json` for:
- Color palette definition
- Typography settings
- Spacing controls
- Block-specific styling

### Custom Blocks
Kawaii custom blocks remain functional:
- Kawaii Button (`kawaii-ultra/button`)
- Kawaii Card (`kawaii-ultra/card`) 
- Kawaii Gallery (`kawaii-ultra/gallery`)

### Template Structure
Templates use WordPress block markup:
```html
<!-- wp:group {"align":"full"} -->
<div class="wp-block-group alignfull">
    <!-- wp:heading -->
    <h2 class="wp-block-heading">Title</h2>
    <!-- /wp:heading -->
</div>
<!-- /wp:group -->
```

### Legacy Support
- PHP templates backed up to `legacy-templates/` (gitignored)
- `functions.php` retained for backward compatibility
- Plugin-specific functionality preserved

## Best Practices

### For Site Editors
- Test changes on staging site first
- Use template parts for repeated elements
- Maintain consistent kawaii styling
- Preview on different screen sizes

### For Developers
- Use `theme.json` for global styles
- Create custom block patterns for common layouts
- Follow WordPress block markup standards
- Document customizations for team members

## Getting Help

### Resources
- [WordPress FSE Documentation](https://wordpress.org/documentation/article/full-site-editing/)
- [Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [Theme.json Reference](https://developer.wordpress.org/themes/theme-json/)

### Support
- Create issues on the theme repository
- Check WordPress community forums
- Consult the theme documentation

## Migration Checklist

- [ ] Backup current site
- [ ] Update WordPress to 6.0+
- [ ] Activate updated theme
- [ ] Review Site Editor templates
- [ ] Test all page types
- [ ] Verify custom content displays correctly
- [ ] Check mobile responsiveness
- [ ] Update any custom CSS if needed
- [ ] Train content editors on new interface

---

*This migration brings KawaiiUltra into the modern WordPress era while preserving the adorable aesthetic that makes it special! 🌸✨*