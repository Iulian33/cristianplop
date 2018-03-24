<?php if (!get_field('header_image_slider_option') == 'none') { ?>
    <div class="headerImage">
        <?php if (get_field('header_image_slider_option') == 'slider') { ?>
            <?php if (have_rows('header_slider')): ?>
                <div class="pageSlider owl-carousel">
                    <?php while (have_rows('header_slider')): the_row();
                        $sliderImage = get_sub_field('image_slide');
                        ?>
                        <div class="sliderImage">
                            <img src="<?php echo $sliderImage['url']; ?>" alt="<?php the_sub_field('title'); ?>">
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        <?php } else if (get_field('header_image_slider_option') == 'image') { ?>
            <?php $pageImage = get_field('header_image', get_the_ID());
            if ($pageImage) { ?>
                <div class="pageImage">
                    <img src="<?php echo $pageImage['url']; ?>" alt="<?php the_title(); ?>">
                </div>

            <?php } else {
                $defaultImage = get_field('standard_header_image', 'option');
                ?>
                <div class="pageImage">
                    <img src="<?php echo $defaultImage['url']; ?>" alt="<?php the_title(); ?>">
                </div>
            <?php } ?>

        <?php } else { ?>
            <?php $defaultImage = get_field('standard_header_image', 'option'); ?>
            <div class="pageImage">
                <img src="<?php echo $defaultImage['url']; ?>" alt="<?php the_title(); ?>">
            </div>
        <?php } ?>
    </div>
<?php } ?>