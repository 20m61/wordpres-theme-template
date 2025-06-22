<?php
/**
 * Template for displaying single portfolio items
 *
 * This template is used when the KawaiiUltra Functionality plugin is active.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages([
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'kawaii-ultra'),
                    'after'  => '</div>',
                ]);
                ?>
            </div>

            <?php
            // Display portfolio categories if they exist
            $portfolio_cats = get_the_terms(get_the_ID(), 'portfolio_category');
            if ($portfolio_cats && !is_wp_error($portfolio_cats)) :
            ?>
                <div class="portfolio-categories">
                    <h3><?php esc_html_e('Categories:', 'kawaii-ultra'); ?></h3>
                    <ul>
                        <?php foreach ($portfolio_cats as $cat) : ?>
                            <li><a href="<?php echo esc_url(get_term_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php
            // Display portfolio tags if they exist
            $portfolio_tags = get_the_terms(get_the_ID(), 'portfolio_tag');
            if ($portfolio_tags && !is_wp_error($portfolio_tags)) :
            ?>
                <div class="portfolio-tags">
                    <h3><?php esc_html_e('Tags:', 'kawaii-ultra'); ?></h3>
                    <ul>
                        <?php foreach ($portfolio_tags as $tag) : ?>
                            <li><a href="<?php echo esc_url(get_term_link($tag)); ?>"><?php echo esc_html($tag->name); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <footer class="entry-footer">
                <?php
                // Portfolio navigation
                the_post_navigation([
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'kawaii-ultra') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'kawaii-ultra') . '</span> <span class="nav-title">%title</span>',
                ]);
                ?>
            </footer>

        </article>

    <?php endwhile; ?>

    <div class="portfolio-navigation">
        <a href="<?php echo esc_url(get_post_type_archive_link('portfolio')); ?>" class="back-to-portfolio">
            <?php esc_html_e('← Back to Portfolio', 'kawaii-ultra'); ?>
        </a>
    </div>

</main>

<?php
get_sidebar();
get_footer();
?>