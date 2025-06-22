<?php
/**
 * Customizer class
 *
 * Handles theme customizer settings and controls.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

namespace KawaiiUltra\Theme\Admin;

use KawaiiUltra\Theme\Utils\Sanitization;

/**
 * Customizer class
 *
 * Manages WordPress customizer settings for the theme.
 */
class Customizer {

    /**
     * Sanitization utility instance
     *
     * @var Sanitization
     */
    private $sanitization;

    /**
     * Constructor
     *
     * @since 1.0.0
     */
    public function __construct() {
        $this->sanitization = new Sanitization();
    }

    /**
     * Initialize customizer
     *
     * @since 1.0.0
     * @return void
     */
    public function init(): void {
        add_action('customize_register', [$this, 'customize_register']);
    }

    /**
     * Register customizer settings and controls
     *
     * @since 1.0.0
     * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
     * @return void
     */
    public function customize_register(\WP_Customize_Manager $wp_customize): void {
        // Add section for theme options
        $wp_customize->add_section('kawaii_ultra_theme_options', [
            'title'       => esc_html__('Theme Options', 'kawaii-ultra'),
            'description' => esc_html__('Customize theme settings', 'kawaii-ultra'),
            'priority'    => 30,
        ]);

        $this->add_primary_color_setting($wp_customize);
        $this->add_footer_text_setting($wp_customize);
        $this->add_search_setting($wp_customize);
    }

    /**
     * Add primary color setting
     *
     * @since 1.0.0
     * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
     * @return void
     */
    private function add_primary_color_setting(\WP_Customize_Manager $wp_customize): void {
        $wp_customize->add_setting('kawaii_ultra_primary_color', [
            'default'           => '#0073aa',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ]);

        $wp_customize->add_control(
            new \WP_Customize_Color_Control(
                $wp_customize,
                'kawaii_ultra_primary_color',
                [
                    'label'    => esc_html__('Primary Color', 'kawaii-ultra'),
                    'section'  => 'kawaii_ultra_theme_options',
                    'settings' => 'kawaii_ultra_primary_color',
                ]
            )
        );
    }

    /**
     * Add footer text setting
     *
     * @since 1.0.0
     * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
     * @return void
     */
    private function add_footer_text_setting(\WP_Customize_Manager $wp_customize): void {
        $wp_customize->add_setting('kawaii_ultra_footer_text', [
            'default'           => esc_html__('© 2025 Your Website', 'kawaii-ultra'),
            'sanitize_callback' => [$this->sanitization, 'sanitize_text_field'],
            'transport'         => 'refresh',
        ]);

        $wp_customize->add_control('kawaii_ultra_footer_text', [
            'label'    => esc_html__('Footer Text', 'kawaii-ultra'),
            'section'  => 'kawaii_ultra_theme_options',
            'settings' => 'kawaii_ultra_footer_text',
            'type'     => 'text',
        ]);
    }

    /**
     * Add search setting
     *
     * @since 1.0.0
     * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
     * @return void
     */
    private function add_search_setting(\WP_Customize_Manager $wp_customize): void {
        $wp_customize->add_setting('kawaii_ultra_show_search', [
            'default'           => true,
            'sanitize_callback' => [$this->sanitization, 'sanitize_checkbox'],
            'transport'         => 'refresh',
        ]);

        $wp_customize->add_control('kawaii_ultra_show_search', [
            'label'    => esc_html__('Show Search in Header', 'kawaii-ultra'),
            'section'  => 'kawaii_ultra_theme_options',
            'settings' => 'kawaii_ultra_show_search',
            'type'     => 'checkbox',
        ]);
    }

    /**
     * Get primary color
     *
     * @since 1.0.0
     * @return string Primary color hex code.
     */
    public function get_primary_color(): string {
        return get_theme_mod('kawaii_ultra_primary_color', '#0073aa');
    }

    /**
     * Get footer text
     *
     * @since 1.0.0
     * @return string Footer text.
     */
    public function get_footer_text(): string {
        return get_theme_mod(
            'kawaii_ultra_footer_text',
            esc_html__('© 2025 Your Website', 'kawaii-ultra')
        );
    }

    /**
     * Get search visibility setting
     *
     * @since 1.0.0
     * @return bool Whether to show search in header.
     */
    public function get_show_search(): bool {
        return get_theme_mod('kawaii_ultra_show_search', true);
    }
}