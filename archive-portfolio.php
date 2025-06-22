<?php
/**
 * Template for displaying portfolio archive
 *
 * This template is used when the KawaiiUltra Functionality plugin is active.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Portfolio', 'kawaii-ultra'); ?></h1>
        
        <?php if (is_tax()) : ?>
            <?php $term = get_queried_object(); ?>
            <p class="archive-description">
                <?php 
                printf(
                    /* translators: %s: taxonomy term name */
                    esc_html__('Viewing portfolio items in: %s', 'kawaii-ultra'),
                    '<strong>' . esc_html($term->name) . '</strong>'
                );
                ?>
            </p>
            <?php if ($term->description) : ?>
                <div class="taxonomy-description">
                    <?php echo wp_kses_post($term->description); ?>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <p class="archive-description">
                <?php esc_html_e('Browse our portfolio of work and projects.', 'kawaii-ultra'); ?>
            </p>
        <?php endif; ?>
    </header>

    <?php if (taxonomy_exists('portfolio_category')) : ?>
        <div class="portfolio-filters">
            <h3><?php esc_html_e('Filter by Category:', 'kawaii-ultra'); ?></h3>
            <?php
            $categories = get_terms([
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
            ]);
            
            if (!empty($categories) && !is_wp_error($categories)) :
            ?>
                <ul class="portfolio-category-filter">
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('portfolio')); ?>" <?php echo !is_tax() ? 'class="current"' : ''; ?>><?php esc_html_e('All', 'kawaii-ultra'); ?></a></li>
                    <?php foreach ($categories as $category) : ?>
                        <li>
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" <?php echo (is_tax('portfolio_category', $category->slug)) ? 'class="current"' : ''; ?>>
                                <?php echo esc_html($category->name); ?>
                                <span class="count">(<?php echo intval($category->count); ?>)</span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        
        <div class="portfolio-grid">
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="portfolio-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="portfolio-content">
                        <h2 class="portfolio-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <?php if (has_excerpt()) : ?>
                            <div class="portfolio-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        // Display portfolio categories
                        $portfolio_cats = get_the_terms(get_the_ID(), 'portfolio_category');
                        if ($portfolio_cats && !is_wp_error($portfolio_cats)) :
                        ?>
                            <div class="portfolio-categories">
                                <?php foreach ($portfolio_cats as $cat) : ?>
                                    <span class="portfolio-category">
                                        <a href="<?php echo esc_url(get_term_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="portfolio-meta">
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php esc_html_e('View Project', 'kawaii-ultra'); ?>
                            </a>
                        </div>
                    </div>

                </article>

            <?php endwhile; ?>
        </div>

        <?php
        // Pagination
        the_posts_pagination([
            'prev_text' => esc_html__('Previous', 'kawaii-ultra'),
            'next_text' => esc_html__('Next', 'kawaii-ultra'),
        ]);
        ?>

    <?php else : ?>
        
        <div class="no-portfolio-items">
            <h2><?php esc_html_e('No portfolio items found', 'kawaii-ultra'); ?></h2>
            <p><?php esc_html_e('No portfolio items have been published yet.', 'kawaii-ultra'); ?></p>
            
            <?php if (current_user_can('publish_posts')) : ?>
                <p>
                    <a href="<?php echo esc_url(admin_url('post-new.php?post_type=portfolio')); ?>" class="button">
                        <?php esc_html_e('Add Portfolio Item', 'kawaii-ultra'); ?>
                    </a>
                </p>
            <?php endif; ?>
        </div>

    <?php endif; ?>

</main>

<?php
get_sidebar();
get_footer();
?>