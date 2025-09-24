<?php
/**
 * Template Name: Page Builder
 *
 * This template uses ACF repeater fields to build pages dynamically
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();

        // Check if page has page builder blocks
        $blocks = get_field('page_builder_blocks');

        if ($blocks && is_array($blocks) && !empty($blocks)) {
            // Use page builder blocks
            get_template_part('template-parts/green-house/page-builder-blocks');
        } else {
            // Fallback to regular page content
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                            </header>

                            <div class="entry-content">
                                <?php
                                the_content();

                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'future'),
                                    'after'  => '</div>',
                                ));
                                ?>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <?php
        }

    endwhile;
    ?>
</main>

<?php
get_footer();
