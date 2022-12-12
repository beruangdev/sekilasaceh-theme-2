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
?>

<?php if ($query_featured->have_posts()) : ?>
    <div class="splide_thumbnails_wrapper basis-full md:basis-8/12">

        <section class="splide main mb-2">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php while ($query_featured->have_posts()) : $query_featured->the_post() ?>
                        <li class="splide__slide">
                            <?= the_post_thumbnail("medium_large", ["class" => "aspect-video object-cover object-center", "style" => "max-width:100%;"]) ?>

                            <div class="absolute bottom-0 left-0 w-full text-white text-2xl font-bold p-4 cursor-pointer" onclick="location.href='<?= the_permalink() ?>'">
                                <a href="<?= esc_url(get_category_link(get_the_category()[0]->cat_ID)) ?>" class="bg-red-500 text-white text-xs px-2 py-1 mb-1 skew-div relative z-0 ml-4">
                                    <?= get_the_category()[0]->name ?>
                                </a>
                                <h3><a href="<?= the_permalink() ?>" class="text-lg font-semibold"><?= the_title() ?></a></h3>
                            </div>
                        </li>
                    <?php endwhile ?>
                </ul>
            </div>
        </section>

        <section class="splide thumbnail-slider">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php while ($query_featured->have_posts()) : $query_featured->the_post() ?>
                        <li class="splide__slide">
                            <?= the_post_thumbnail("thumbnail", ["class" => "aspect-[16/10] object-cover object-center", "style" => "max-width:100%;"]) ?>
                        </li>
                    <?php endwhile ?>
                </ul>
            </div>
        </section>

    </div>

<?php else : ?>
    <?php get_template_part("template-parts/content/content-empty") ?>
<?php endif ?>
<?php wp_reset_postdata() ?>
