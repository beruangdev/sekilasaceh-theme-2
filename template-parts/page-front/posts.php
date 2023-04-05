<?php
$args  = array(
    'posts_per_page' => 10,
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field'    => 'slug',
            // 'terms'    => ['featured', "opini", "infografis"],
            'operator' => 'NOT IN',
        ],
    ]
);
$query_posts = new WP_Query($args);
wp_reset_postdata();
?>
<?php if ($query_posts->have_posts()) : ?>
    <div class="flex flex-wrap justify-between">
        <div class="flex flex-wrap flex-col">
            <h3 class="text-lg font-bold">
                BERITA TERBARU
            </h3>
            <h3 class="text-lg font-bold leading-[0.2rem] text-red-500">
                _______
            </h3>
        </div>
    </div>
    <ul role="list" class="my-6 divide-y divide-gray-200">
        <?php while ($query_posts->have_posts()) : ?>
            <?php $query_posts->the_post(); ?>
            <?php get_template_part('template-parts/components/card_horizontal', get_post_format()); ?>
        <?php endwhile; ?>
    </ul>
    <?php get_template_part('template-parts/pagination'); ?>
<?php else : ?>
    <?php get_template_part("template-parts/content/content-empty") ?>
<?php endif; ?>