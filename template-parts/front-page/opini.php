<?php
$args  = array(
    'posts_per_page' => 5,
    'post_type' => 'post',
    'post_status' => 'publish',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'opini'
        ],
    ],
);
$query_opini = new WP_Query($args);
?>
<?php if ($query_opini->have_posts()) : ?>
    <div class="pl-4 border-0 border-l border-solid border-gray-200">
        <div class="pl-8">
            <h3 class="bg-red-500 text-white text-base font-bold px-6 py-1 skew-div relative w-fit">
                Opini
            </h3>
        </div>
        <ul role="list" class="my-2 divide-y divide-gray-200">
            <?php while ($query_opini->have_posts()) : ?>
                <?php $query_opini->the_post(); ?>
                <?php get_template_part('template-parts/components/card_horizontal_opini', get_post_format()); ?>
            <?php endwhile; ?>
        </ul>
    </div>
<?php else : ?>
    <?php get_template_part("template-parts/content/content-empty") ?>
<?php endif; ?>
<?php wp_reset_postdata() ?>
