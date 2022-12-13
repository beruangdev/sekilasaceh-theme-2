<?php
$args  = array(
    'posts_per_page' => 5,
    'post_type' => 'post',
    'post_status' => 'publish',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'featured'
        ],
    ],
);
$query_featured = new WP_Query($args);
wp_reset_postdata();
?>
<div class="flex flex-wrap container">
    
    <?php get_template_part("template-parts/page-front/featured-splide", null, compact("query_featured")) ?>

    <?php
    $args  = array(
        'posts_per_page' => 1,
        'post_type' => 'post',
        'post_status' => 'publish',
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'infografis'
            ]
        ],
    );
    $query_infografis = new WP_Query($args);
    ?>
    <div class="basis-full md:basis-4/12 md:pl-8 hidden md:block">
        <?php if ($query_infografis->have_posts()) : ?>
            <?php while ($query_infografis->have_posts()) : $query_infografis->the_post() ?>
                <div class="relative h-full">
                    <a href="<?= the_permalink() ?>">
                        <?= the_post_thumbnail("medium_large", ["class" => "w-full object-cover object-center", "style" => "width: 100%;height: 100%;max-width: 640px;object-fit: cover;object-position: center;"]) ?>
                    </a>
                    
                    <div class="absolute left-0 bottom-0 w-full px-3 pb-2 pt-8" style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 60%, rgba(0,0,0,0.5) 100%);">
                        <?php foreach (get_the_category() as $key => $category) : ?>
                            <a href="<?= esc_url(get_category_link($category->cat_ID)) ?>" class="bg-red-500 text-white text-xs px-2 py-1 mb-1 skew-div relative z-0 ml-4">
                                <?= $category->name ?>
                            </a>
                        <?php endforeach ?>
                        <h3><a href="<?= the_permalink() ?>" class="text-lg font-semibold text-white"><?= the_title() ?></a></h3>
                    </div>

                </div>
            <?php endwhile ?>
        <?php else : ?>
            <?php get_template_part("template-parts/content/content-empty") ?>
        <?php endif ?>
    </div>
</div>
<?php wp_reset_postdata() ?>
