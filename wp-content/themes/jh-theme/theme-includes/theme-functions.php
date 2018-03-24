<?php
/**
 * The helper file
 * Here goes all custom fuctions made by user
 * @package Site Helpers
 */

//get custom numbers of words from content
function my_content($limit, $text = false, $word = false)
{
    if (!$word) {
        $word = __('Read more', 'jhfw');
    }
    if ($text) {
        $content = $text;
    } else {
        $content = get_the_content();
    }
    $content = strip_tags($content);
    $content = explode(" ", $content);
    if (count($content) > $limit) {
        $trim = true;
    }
    $content = array_slice($content, 0, $limit, true);
    if ($trim) {
        $index = count($content) - 1;
        $last = $content[$index];
        if ($word) {
            $last = $last . '<a href="' . get_permalink() . '"> ' . $word . '</a>';
        }
        $content[$index] = $last;
    }
    $content = implode(" ", $content);

    return $content;
}


// Custom query pagination

/**
 * Display navigation to next/previous set of posts when applicable.
 * @since Twenty Fourteen 1.0
 * @global WP_Query $wp_query /$custom_query  WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
// Custom Pagination
if (!function_exists('custom_paging_nav')) {
    function custom_paging_nav($custom_query) {
        global $wp_rewrite;

        // Don't print empty markup if there's only one page.
        if ($custom_query->max_num_pages < 2) {
            return;
        }

        $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';
        $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base' => $pagenum_link,
            'format' => $format,
            'total' => $custom_query->max_num_pages,
            'current' => $paged,
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => __('&larr; Previous', 'twentyfourteen'),
            'next_text' => __('Next &rarr;', 'twentyfourteen'),
        ));

        if ($links) { ?>

            <nav class="navigation paging-navigation" role="navigation">
                <div class="screen-reader-text"><?php _e('Posts navigation', 'twentyfourteen'); ?></div>
                <div class="pagination loop-pagination">
                    <?php echo $links; ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->

            <?php
        }
    }
}


// Default pagination

/**
 * Display navigation to next/previous set of posts when applicable.
 * @since Twenty Fourteen 1.0
 * @global WP_Query $wp_query /$custom_query  WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */

if (!function_exists('default_paging_nav')) {

    function default_paging_nav()
    {

        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ($wp_query->max_num_pages < 2) {
            return;
        }

        $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';

        $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base' => $pagenum_link,
            'format' => $format,
            'total' => $wp_query->max_num_pages,
            'current' => $paged,
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => __('&larr; Previous', 'twentyfourteen'),
            'next_text' => __('Next &rarr;', 'twentyfourteen'),
        ));

        if ($links) {

            ?>
            <nav class="navigation paging-navigation" role="navigation">
                <div class="screen-reader-text"><?php _e('Posts navigation', 'twentyfourteen'); ?></div>
                <div class="pagination loop-pagination">
                    <?php echo $links; ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
            <?php
        }
    }
}

function sitefavicon() {
    $favicon = get_field('site_favicon', 'option');

    if ($favicon) {
        $fav_url = $favicon['url'];
    } else {
        $fav_url = get_template_directory_uri() . "/images/favicon.png";
    }
    ?>
    <link rel="shortcut icon" href="<?php echo $fav_url; ?>">
<?php }

function siteLogo() { ?>
    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
        <?php
        $site_logo = get_field('site_logo', 'option');
        if (!$site_logo) {
            $img_src = get_template_directory_uri() . "/images/JH-insign.png";
        } else {
            $img_src = $site_logo['url'];
        }
        ?>
        <img src="<?php echo $img_src; ?>" alt="<?php bloginfo('name'); ?>"/>
    </a>
<?php }

function fw_print($item) {
    echo '<pre class="fw-print">';
    var_dump($item);
    echo '</pre>';
}


// Your Custom Helpers ...