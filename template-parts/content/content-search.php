<?php if (have_posts()) : ?>
    <ul role="list" class="my-6 divide-y divide-gray-200">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php get_template_part('template-parts/components/card_horizontal', get_post_format()); ?>
        <?php endwhile; ?>
    </ul>
    <?php get_template_part('template-parts/pagination'); ?>
<?php else : ?>
    <?php get_template_part("template-parts/content/content-empty") ?>
<?php endif; ?>
<?php wp_reset_postdata() ?>
