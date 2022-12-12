<?php get_header(); ?>


<?php if ($_SERVER['REQUEST_URI'] == '/') : ?>
    <?php get_template_part('template-parts/page-front/featured'); ?>
<?php endif ?>

<div class="container mx-auto py-8">
    <div class="flex flex-wrap">
        <div class="basis-12/12 md:basis-8/12 ">
            <?php get_template_part("template-parts/page-front/posts") ?>
        </div>

        <div class="basis-12/12 md:basis-4/12 hidden md:block">
            <?php get_template_part("template-parts/page-front/opini") ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
