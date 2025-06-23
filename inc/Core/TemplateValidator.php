<?php
/**
 * Template Validator class
 *
 * Validates FSE templates and provides helpful feedback.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Core;

/**
 * Template Validator class
 *
 * Validates block templates and template parts for FSE.
 */
class TemplateValidator {

    /**
     * Required templates for the theme
     *
     * @var array
     */
    private $required_templates = [
        'index.html',
        '404.html',
    ];

    /**
     * Required template parts for the theme
     *
     * @var array
     */
    private $required_template_parts = [
        'header.html',
        'footer.html',
    ];

    /**
     * Initialize template validation
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('admin_notices', [$this, 'validate_templates_admin_notice']);
        add_action('admin_init', [$this, 'validate_theme_json']);
    }

    /**
     * Validate that required templates exist
     *
     * @since 1.0.0
     * @return array Array of validation results.
     */
    public function validate_required_templates(): array {
        $results = [];
        $templates_dir = get_template_directory() . '/templates/';

        foreach ($this->required_templates as $template) {
            $file_path = $templates_dir . $template;
            $results[$template] = [
                'exists' => file_exists($file_path),
                'path' => $file_path,
                'readable' => file_exists($file_path) && is_readable($file_path)
            ];
        }

        return $results;
    }

    /**
     * Validate that required template parts exist
     *
     * @since 1.0.0
     * @return array Array of validation results.
     */
    public function validate_required_template_parts(): array {
        $results = [];
        $parts_dir = get_template_directory() . '/parts/';

        foreach ($this->required_template_parts as $part) {
            $file_path = $parts_dir . $part;
            $results[$part] = [
                'exists' => file_exists($file_path),
                'path' => $file_path,
                'readable' => file_exists($file_path) && is_readable($file_path)
            ];
        }

        return $results;
    }

    /**
     * Validate theme.json syntax
     *
     * @since 1.0.0
     * @return array Validation results.
     */
    public function validate_theme_json(): array {
        $theme_json_path = get_template_directory() . '/theme.json';
        $results = [
            'exists' => file_exists($theme_json_path),
            'valid_json' => false,
            'error' => null
        ];

        if ($results['exists']) {
            $content = file_get_contents($theme_json_path);
            $decoded = json_decode($content, true);
            
            if (json_last_error() === JSON_ERROR_NONE) {
                $results['valid_json'] = true;
                $results['data'] = $decoded;
            } else {
                $results['error'] = json_last_error_msg();
            }
        }

        return $results;
    }

    /**
     * Display admin notice for template validation issues
     *
     * @since 1.0.0
     * @return void
     */
    public function validate_templates_admin_notice(): void {
        if (!current_user_can('manage_options')) {
            return;
        }

        $template_results = $this->validate_required_templates();
        $parts_results = $this->validate_required_template_parts();
        $theme_json_results = $this->validate_theme_json();

        $missing_templates = array_filter($template_results, function($result) {
            return !$result['exists'];
        });

        $missing_parts = array_filter($parts_results, function($result) {
            return !$result['exists'];
        });

        // Show notice for missing templates
        if (!empty($missing_templates)) {
            printf(
                '<div class="notice notice-warning"><p><strong>%s</strong> %s: %s</p></div>',
                esc_html__('KawaiiUltra Theme Warning:', 'kawaii-ultra'),
                esc_html__('Missing required templates', 'kawaii-ultra'),
                esc_html(implode(', ', array_keys($missing_templates)))
            );
        }

        // Show notice for missing template parts
        if (!empty($missing_parts)) {
            printf(
                '<div class="notice notice-warning"><p><strong>%s</strong> %s: %s</p></div>',
                esc_html__('KawaiiUltra Theme Warning:', 'kawaii-ultra'),
                esc_html__('Missing required template parts', 'kawaii-ultra'),
                esc_html(implode(', ', array_keys($missing_parts)))
            );
        }

        // Show notice for invalid theme.json
        if (!$theme_json_results['valid_json']) {
            if (!$theme_json_results['exists']) {
                printf(
                    '<div class="notice notice-error"><p><strong>%s</strong> %s</p></div>',
                    esc_html__('KawaiiUltra Theme Error:', 'kawaii-ultra'),
                    esc_html__('theme.json file is missing. Full Site Editing features may not work correctly.', 'kawaii-ultra')
                );
            } elseif ($theme_json_results['error']) {
                printf(
                    '<div class="notice notice-error"><p><strong>%s</strong> %s %s</p></div>',
                    esc_html__('KawaiiUltra Theme Error:', 'kawaii-ultra'),
                    esc_html__('theme.json contains invalid JSON:', 'kawaii-ultra'),
                    esc_html($theme_json_results['error'])
                );
            }
        }
    }

    /**
     * Get all available templates
     *
     * @since 1.0.0
     * @return array Available templates.
     */
    public function get_available_templates(): array {
        $templates_dir = get_template_directory() . '/templates/';
        $templates = [];

        if (is_dir($templates_dir)) {
            $files = glob($templates_dir . '*.html');
            foreach ($files as $file) {
                $templates[] = basename($file);
            }
        }

        return $templates;
    }

    /**
     * Get all available template parts
     *
     * @since 1.0.0
     * @return array Available template parts.
     */
    public function get_available_template_parts(): array {
        $parts_dir = get_template_directory() . '/parts/';
        $parts = [];

        if (is_dir($parts_dir)) {
            $files = glob($parts_dir . '*.html');
            foreach ($files as $file) {
                $parts[] = basename($file);
            }
        }

        return $parts;
    }

    /**
     * Check if template contains required blocks
     *
     * @since 1.0.0
     * @param string $template_path Path to template file.
     * @param array  $required_blocks Required block types.
     * @return array Validation results.
     */
    public function validate_template_blocks(string $template_path, array $required_blocks = []): array {
        if (!file_exists($template_path)) {
            return ['valid' => false, 'error' => 'Template file not found'];
        }

        $content = file_get_contents($template_path);
        $results = ['valid' => true, 'missing_blocks' => []];

        foreach ($required_blocks as $block) {
            if (strpos($content, 'wp:' . $block) === false) {
                $results['missing_blocks'][] = $block;
                $results['valid'] = false;
            }
        }

        return $results;
    }
}