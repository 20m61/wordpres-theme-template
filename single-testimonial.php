<?php
/**
 * Template for displaying single testimonials
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
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('testimonial-single'); ?>>
            
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <div class="testimonial-content">
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="testimonial-author-photo">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>

                <div class="testimonial-quote">
                    <blockquote>
                        <?php
                        the_content();

                        wp_link_pages([
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'kawaii-ultra'),
                            'after'  => '</div>',
                        ]);
                        ?>
                    </blockquote>

                    <cite class="testimonial-author">
                        <?php the_title(); ?>
                    </cite>
                </div>

            </div>

            <?php
            // Display testimonial categories if they exist
            $testimonial_cats = get_the_terms(get_the_ID(), 'testimonial_category');
            if ($testimonial_cats && !is_wp_error($testimonial_cats)) :
            ?>
                <div class="testimonial-categories">
                    <h3><?php esc_html_e('Categories:', 'kawaii-ultra'); ?></h3>
                    <ul>
                        <?php foreach ($testimonial_cats as $cat) : ?>
                            <li><a href="<?php echo esc_url(get_term_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <footer class="entry-footer">
                <?php
                // Testimonial navigation
                the_post_navigation([
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'kawaii-ultra') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'kawaii-ultra') . '</span> <span class="nav-title">%title</span>',
                ]);
                ?>
            </footer>

        </article>

    <?php endwhile; ?>

    <div class="testimonial-navigation">
        <a href="<?php echo esc_url(get_post_type_archive_link('testimonial')); ?>" class="back-to-testimonials">
            <?php esc_html_e('← Back to Testimonials', 'kawaii-ultra'); ?>
        </a>
    </div>

</main>

<?php
get_sidebar();
get_footer();
?>