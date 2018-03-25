<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Site Theme
 */
?>
<div class="container">
    <footer class="mainFooter">
        <div class="socials-container">
            <ul class="socials-list">
                <?php if (have_rows('footer_socials','option')):
                    while (have_rows('footer_socials','option')) : the_row(); ?>
                        <li>
                            <a href="<?php the_sub_field('social_media_url'); ?>"
                               target="_blank">
                                <?php the_sub_field('social_media_name'); ?>
                            </a>
                        </li>
                    <?php endwhile;
                endif; ?>
            </ul>
        </div>
    </footer>
</div>
</div>

<div id="mobilemenu" class="displayNone"></div>
<?php wp_footer(); ?>
</body>
</html>
