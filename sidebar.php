<?php
/**
 * The sidebar containing the main widget area
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="container">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
</aside>