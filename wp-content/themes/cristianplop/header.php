<?php
/**
 * The header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 * @package Site Theme
 */ ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php sitefavicon(); ?>
    <!--[if lt IE 9]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head();
    $resume_pdf_link = get_field('pdf_resume','option');
    $resume_txt_link = get_field('cv_text_link','option');
    $body_backgroud = get_field('body_background','option'); ?>
</head>

<body style="background-image: url(<?php echo $body_backgroud['url'];?>); ">
<div class="circle-view">
</div>
<?php include('theme-includes/theme-loader.php'); ?>

<div class="mainContainer">
    <header class="main-header">
        <div class="container">
            <div class="innerWrapper">
                <div class="siteLogo">
                    <?php siteLogo(); ?>
                </div>
                <div class="cv-link-container">
                    <a href="<?php echo $resume_pdf_link['url']; ?>" download>
                        <?php echo $resume_txt_link ;?>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <?php get_template_part('templates/sections/hero-header'); ?>
