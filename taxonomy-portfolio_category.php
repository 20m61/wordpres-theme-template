<?php
/**
 * Template for displaying portfolio category archive
 *
 * This template is used when the KawaiiUltra Functionality plugin is active.
 *
 * @package KawaiiUltra\Theme
 * @since 1.0.0
 */

get_header();

$term = get_queried_object();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <h1 class="page-title">
            <?php 
            printf(
                /* translators: %s: portfolio category name */
                esc_html__('Portfolio Category: %s', 'kawaii-ultra'),
                '<span>' . esc_html($term->name) . '</span>'
            );
            ?>
        </h1>
        
        <?php if (!empty($term->description)) : ?>
            <div class="taxonomy-description">
                <?php echo wp_kses_post($term->description); ?>
            </div>
        <?php endif; ?>

        <div class="archive-meta">
            <?php 
            printf(
                /* translators: %d: number of portfolio items */
                esc_html(_n('%d portfolio item', '%d portfolio items', $term->count, 'kawaii-ultra')),
                intval($term->count)
            );
            ?>
        </div>
    </header>

    <div class="taxonomy-navigation">
        <a href="<?php echo esc_url(get_post_type_archive_link('portfolio')); ?>" class="back-to-portfolio">
            <?php esc_html_e('← All Portfolio Items', 'kawaii-ultra'); ?>
        </a>
        
        <?php if (taxonomy_exists('portfolio_category')) : ?>
            <div class="other-categories">
                <h3><?php esc_html_e('Other Categories:', 'kawaii-ultra'); ?></h3>
                <?php
                $categories = get_terms([
                    'taxonomy' => 'portfolio_category',
                    'hide_empty' => true,
                    'exclude' => [$term->term_id],
                ]);
                
                if (!empty($categories) && !is_wp_error($categories)) :
                ?>
                    <ul class="category-list">
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                    <?php echo esc_html($category->name); ?>
                                    <span class="count">(<?php echo intval($category->count); ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (have_posts()) : ?>
        
        <div class="portfolio-category-grid">
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-category-item'); ?>>
                    
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
                        // Display other portfolio categories for this item
                        $other_portfolio_cats = get_the_terms(get_the_ID(), 'portfolio_category');
                        if ($other_portfolio_cats && !is_wp_error($other_portfolio_cats)) :
                            // Remove current category from the list
                            $other_portfolio_cats = array_filter($other_portfolio_cats, function($cat) use ($term) {
                                return $cat->term_id !== $term->term_id;
                            });
                            
                            if (!empty($other_portfolio_cats)) :
                        ?>
                            <div class="portfolio-other-categories">
                                <span class="categories-label"><?php esc_html_e('Also in:', 'kawaii-ultra'); ?></span>
                                <?php foreach ($other_portfolio_cats as $cat) : ?>
                                    <span class="portfolio-category">
                                        <a href="<?php echo esc_url(get_term_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php 
                            endif;
                        endif; 
                        ?>

                        <?php
                        // Display portfolio tags if they exist
                        $portfolio_tags = get_the_terms(get_the_ID(), 'portfolio_tag');
                        if ($portfolio_tags && !is_wp_error($portfolio_tags)) :
                        ?>
                            <div class="portfolio-tags">
                                <span class="tags-label"><?php esc_html_e('Tags:', 'kawaii-ultra'); ?></span>
                                <?php foreach ($portfolio_tags as $tag) : ?>
                                    <span class="portfolio-tag">
                                        <a href="<?php echo esc_url(get_term_link($tag)); ?>"><?php echo esc_html($tag->name); ?></a>
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
            <p>
                <?php 
                printf(
                    /* translators: %s: category name */
                    esc_html__('No portfolio items have been published in the "%s" category yet.', 'kawaii-ultra'),
                    esc_html($term->name)
                );
                ?>
            </p>
            
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