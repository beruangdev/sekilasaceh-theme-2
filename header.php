<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title>
        <?php if (is_front_page() && is_home()) {
            echo get_bloginfo("name");
        } else {
            echo wp_title("");
        } ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> -->

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white antialiased body-font font-poppins min-h-screen'); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="min-h-screen flex flex-col">

        <?php get_template_part('template-parts/navbar'); ?>

        <div id="content" class="site-content">
            <?php if ($_SERVER['REQUEST_URI'] == '/') : ?>
                <?php get_template_part('template-parts/front-page/featured-slider'); ?>
            <?php endif ?>
            <main>
