<?php
/**
 * The template for displaying search results pages.
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="container">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php printf(__('Search Results for: %s', 'jhfw'),
                        '<span>' . get_search_query() . '</span>'); ?>
                </h1>
            </header><!-- .page-header -->

            <?php while (have_posts()) : the_post(); ?>
                <?php
                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part('templates/content/content', 'search');
                ?>
            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part('templates/content/content', 'none'); ?>

        <?php endif; ?>
    </div>
</div><!--mainContent-->
<?php get_footer(); ?>
