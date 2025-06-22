<?php
/**
 * Sanitization utility class
 *
 * Provides data sanitization helpers for theme options and user input.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Utils;

/**
 * Sanitization class
 *
 * Collection of sanitization methods for various data types.
 */
class Sanitization {

    /**
     * Sanitize checkbox input
     *
     * @since 1.0.0
     * @param mixed $checked The checkbox value to sanitize.
     * @return bool Sanitized checkbox value.
     */
    public function sanitize_checkbox($checked): bool {
        return isset($checked) && true === $checked;
    }

    /**
     * Sanitize select input
     *
     * @since 1.0.0
     * @param string                $input   The select value to sanitize.
     * @param \WP_Customize_Setting $setting The customizer setting object.
     * @return string Sanitized select value.
     */
    public function sanitize_select(string $input, \WP_Customize_Setting $setting): string {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        
        return array_key_exists($input, $choices) ? $input : $setting->default;
    }

    /**
     * Sanitize text input with HTML allowed
     *
     * @since 1.0.0
     * @param string $input The text to sanitize.
     * @return string Sanitized text.
     */
    public function sanitize_text(string $input): string {
        return wp_kses_post(force_balance_tags($input));
    }

    /**
     * Sanitize plain text field
     *
     * @since 1.0.0
     * @param string $input The text to sanitize.
     * @return string Sanitized text.
     */
    public function sanitize_text_field(string $input): string {
        return sanitize_text_field($input);
    }

    /**
     * Sanitize URL input
     *
     * @since 1.0.0
     * @param string $input The URL to sanitize.
     * @return string Sanitized URL.
     */
    public function sanitize_url(string $input): string {
        return esc_url_raw($input);
    }

    /**
     * Sanitize email input
     *
     * @since 1.0.0
     * @param string $input The email to sanitize.
     * @return string Sanitized email.
     */
    public function sanitize_email(string $input): string {
        return sanitize_email($input);
    }

    /**
     * Sanitize hex color
     *
     * @since 1.0.0
     * @param string $color The hex color to sanitize.
     * @return string Sanitized hex color.
     */
    public function sanitize_hex_color(string $color): string {
        return sanitize_hex_color($color);
    }

    /**
     * Sanitize integer input
     *
     * @since 1.0.0
     * @param mixed $input The value to sanitize as integer.
     * @return int Sanitized integer.
     */
    public function sanitize_integer($input): int {
        return absint($input);
    }

    /**
     * Sanitize float input
     *
     * @since 1.0.0
     * @param mixed $input The value to sanitize as float.
     * @return float Sanitized float.
     */
    public function sanitize_float($input): float {
        return (float) $input;
    }

    /**
     * Sanitize textarea input
     *
     * @since 1.0.0
     * @param string $input The textarea content to sanitize.
     * @return string Sanitized textarea content.
     */
    public function sanitize_textarea(string $input): string {
        return sanitize_textarea_field($input);
    }

    /**
     * Sanitize HTML input
     *
     * @since 1.0.0
     * @param string $input The HTML to sanitize.
     * @param array  $allowed_tags Optional. Allowed HTML tags.
     * @return string Sanitized HTML.
     */
    public function sanitize_html(string $input, array $allowed_tags = []): string {
        if (empty($allowed_tags)) {
            $allowed_tags = wp_kses_allowed_html('post');
        }

        return wp_kses($input, $allowed_tags);
    }

    /**
     * Sanitize CSS input
     *
     * @since 1.0.0
     * @param string $input The CSS to sanitize.
     * @return string Sanitized CSS.
     */
    public function sanitize_css(string $input): string {
        return wp_strip_all_tags($input);
    }

    /**
     * Sanitize array of values
     *
     * @since 1.0.0
     * @param array    $input    The array to sanitize.
     * @param callable $callback The sanitization callback function.
     * @return array Sanitized array.
     */
    public function sanitize_array(array $input, callable $callback): array {
        return array_map($callback, $input);
    }
}