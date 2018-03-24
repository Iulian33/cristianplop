<?php
/*
 *Template Name: Home test
*/
get_header();
$page_id = get_the_ID();
$home_title = get_field('home_title_heading',$page_id);
$home_short_txt = get_field('home_short_phrase',$page_id);
$home_description = get_field('home_description',$page_id); ?>

<div class="mainContent">
    <div class="container">
        <h1 class="home-title">
            <?php echo $home_title; ?>
        </h1>
        <div class="row">
            <div class="col-sm-4 phrase-col">
                <span class="short-txt">
                    <?php echo $home_short_txt; ?>
                </span>
                <span class="styled-line">
                    <?php _e('it’s designed.','jhfw'); ?>
                </span>
            </div>
            <div class="col-sm-7 description-col">
                <?php echo $home_description; ?>
            </div>
        </div>
    </div>
</div><!--mainContent-->

<?php get_footer(); ?>
