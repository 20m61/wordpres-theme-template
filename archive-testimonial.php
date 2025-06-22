<?php
/**
 * Template for displaying testimonials archive
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
        <h1 class="page-title"><?php esc_html_e('Testimonials', 'kawaii-ultra'); ?></h1>
        
        <?php if (is_tax()) : ?>
            <?php $term = get_queried_object(); ?>
            <p class="archive-description">
                <?php 
                printf(
                    /* translators: %s: taxonomy term name */
                    esc_html__('Viewing testimonials in: %s', 'kawaii-ultra'),
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
                <?php esc_html_e('Read what our clients have to say about our work.', 'kawaii-ultra'); ?>
            </p>
        <?php endif; ?>
    </header>

    <?php if (taxonomy_exists('testimonial_category')) : ?>
        <div class="testimonials-filters">
            <h3><?php esc_html_e('Filter by Category:', 'kawaii-ultra'); ?></h3>
            <?php
            $categories = get_terms([
                'taxonomy' => 'testimonial_category',
                'hide_empty' => true,
            ]);
            
            if (!empty($categories) && !is_wp_error($categories)) :
            ?>
                <ul class="testimonial-category-filter">
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('testimonial')); ?>" <?php echo !is_tax() ? 'class="current"' : ''; ?>><?php esc_html_e('All', 'kawaii-ultra'); ?></a></li>
                    <?php foreach ($categories as $category) : ?>
                        <li>
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" <?php echo (is_tax('testimonial_category', $category->slug)) ? 'class="current"' : ''; ?>>
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
        
        <div class="testimonials-grid">
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                
                <article id="post-<?php the_ID(); ?>" <?php post_class('testimonial-item'); ?>>
                    
                    <div class="testimonial-content">
                        
                        <div class="testimonial-quote">
                            <blockquote>
                                <?php 
                                // Show excerpt if available, otherwise show content
                                if (has_excerpt()) {
                                    the_excerpt();
                                } else {
                                    the_content();
                                }
                                ?>
                            </blockquote>
                        </div>

                        <div class="testimonial-author">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="testimonial-author-photo">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="testimonial-author-info">
                                <h3 class="testimonial-author-name">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <?php
                                // Display testimonial categories
                                $testimonial_cats = get_the_terms(get_the_ID(), 'testimonial_category');
                                if ($testimonial_cats && !is_wp_error($testimonial_cats)) :
                                ?>
                                    <div class="testimonial-categories">
                                        <?php foreach ($testimonial_cats as $cat) : ?>
                                            <span class="testimonial-category">
                                                <a href="<?php echo esc_url(get_term_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="testimonial-meta">
                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php esc_html_e('Read Full Testimonial', 'kawaii-ultra'); ?>
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
        
        <div class="no-testimonials">
            <h2><?php esc_html_e('No testimonials found', 'kawaii-ultra'); ?></h2>
            <p><?php esc_html_e('No testimonials have been published yet.', 'kawaii-ultra'); ?></p>
            
            <?php if (current_user_can('publish_posts')) : ?>
                <p>
                    <a href="<?php echo esc_url(admin_url('post-new.php?post_type=testimonial')); ?>" class="button">
                        <?php esc_html_e('Add Testimonial', 'kawaii-ultra'); ?>
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