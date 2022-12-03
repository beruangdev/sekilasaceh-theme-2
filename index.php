<?php get_header(); ?>

<div class="container mx-auto my-8">
    <div class="flex flex-wrap">
        <div class="basis-12/12 md:basis-8/12 md:pr-8">
            <?php if (have_posts()) : ?>
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                        <?php get_template_part('template-parts/content', get_post_format()); ?>
                    <?php endwhile; ?>
                </ul>
                <?php get_template_part('template-parts/pagination'); ?>
            <?php endif; ?>
        </div>


        <div class="basis-12/12 md:basis-4/12 bg-red-600 md:block h-[0px] hidden"></div>

    </div>
</div>

<?php get_footer(); ?>
