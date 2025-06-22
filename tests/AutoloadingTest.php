<?php
/**
 * Basic autoloading test
 *
 * Verifies that Composer autoloading works correctly.
 *
 * @package KawaiiUltra\Theme\Tests
 */

namespace KawaiiUltra\Theme\Tests;

use PHPUnit\Framework\TestCase;
use KawaiiUltra\Theme\Core\Theme;
use KawaiiUltra\Theme\Core\Assets;
use KawaiiUltra\Theme\Core\Setup;
use KawaiiUltra\Theme\Admin\Customizer;
use KawaiiUltra\Theme\Utils\Sanitization;

/**
 * Autoloading test class
 */
class AutoloadingTest extends TestCase {

    /**
     * Test that main theme class can be instantiated
     */
    public function test_theme_class_autoloading(): void {
        $this->assertTrue(class_exists(Theme::class));
        $theme = new Theme();
        $this->assertInstanceOf(Theme::class, $theme);
    }

    /**
     * Test that core classes can be instantiated
     */
    public function test_core_classes_autoloading(): void {
        $this->assertTrue(class_exists(Assets::class));
        $this->assertTrue(class_exists(Setup::class));
        
        $assets = new Assets();
        $setup = new Setup();
        
        $this->assertInstanceOf(Assets::class, $assets);
        $this->assertInstanceOf(Setup::class, $setup);
    }

    /**
     * Test that admin classes can be instantiated
     */
    public function test_admin_classes_autoloading(): void {
        $this->assertTrue(class_exists(Customizer::class));
        
        $customizer = new Customizer();
        $this->assertInstanceOf(Customizer::class, $customizer);
    }

    /**
     * Test that utility classes can be instantiated
     */
    public function test_utility_classes_autoloading(): void {
        $this->assertTrue(class_exists(Sanitization::class));
        
        $sanitization = new Sanitization();
        $this->assertInstanceOf(Sanitization::class, $sanitization);
    }

    /**
     * Test theme constants and methods
     */
    public function test_theme_constants(): void {
        $theme = new Theme();
        
        $this->assertIsString($theme->get_version());
        $this->assertIsString($theme->get_text_domain());
        $this->assertEquals('kawaii-ultra', $theme->get_text_domain());
    }
}