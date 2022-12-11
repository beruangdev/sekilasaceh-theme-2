<?php get_header(); ?>

<div class="container mx-auto py-8">
    <div class="flex flex-wrap">
        <div class="basis-12/12 md:basis-8/12 ">
            <?php get_template_part("template-parts/front-page/posts") ?>
        </div>

        <div class="basis-12/12 md:basis-4/12 md:block">
            <?php get_template_part("template-parts/front-page/opini") ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
