<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="container">

        <?php if (have_posts()) : ?>
            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>
            </header><!-- .page-header -->
            <?php /* Start the Loop */ ?>
            <?php while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>

                        <?php if ('post' == get_post_type()) : ?>
                            <div class="entry-meta">
                                <?php JH_posted_on(); ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->

                    <footer class="entry-footer">
                        <?php JH_entry_footer(); ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-## -->

            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p> No posts in this post type </p>
        <?php endif; ?>
    </div>
</div><!--mainContent-->
<?php get_footer(); ?>
