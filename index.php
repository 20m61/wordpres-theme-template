<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <?php if (have_posts()) : ?>
                
                <?php if (is_home() && !is_front_page()) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php
                            if (is_singular()) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                            endif;
                            ?>
                        </header>

                        <div class="entry-content">
                            <?php
                            if (is_singular()) :
                                the_content();
                            else :
                                the_excerpt();
                            endif;
                            ?>
                        </div>

                        <footer class="entry-footer">
                            <?php
                            if (is_single()) :
                                $categories_list = get_the_category_list(esc_html__(', ', 'kawaii-ultra'));
                                if ($categories_list) :
                                    printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'kawaii-ultra') . '</span>', $categories_list);
                                endif;

                                $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'kawaii-ultra'));
                                if ($tags_list) :
                                    printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'kawaii-ultra') . '</span>', $tags_list);
                                endif;
                            endif;
                            ?>
                        </footer>
                    </article>

                <?php endwhile; ?>

                <?php the_posts_navigation(); ?>

            <?php else : ?>

                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Nothing here', 'kawaii-ultra'); ?></h1>
                    </header>

                    <div class="page-content">
                        <?php if (is_home() && current_user_can('publish_posts')) : ?>
                            <p>
                                <?php
                                printf(
                                    wp_kses(
                                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kawaii-ultra'),
                                        array(
                                            'a' => array(
                                                'href' => array(),
                                            ),
                                        )
                                    ),
                                    esc_url(admin_url('post-new.php'))
                                );
                                ?>
                            </p>
                        <?php elseif (is_search()) : ?>
                            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kawaii-ultra'); ?></p>
                            <?php get_search_form(); ?>
                        <?php else : ?>
                            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kawaii-ultra'); ?></p>
                            <?php get_search_form(); ?>
                        <?php endif; ?>
                    </div>
                </section>

            <?php endif; ?>
        </div>
    </main>
</div>

<?php
get_sidebar();
get_footer();