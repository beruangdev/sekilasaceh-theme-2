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
<div class="swiper featured-post basis-full md:basis-8/12">
    <?php if ($query_featured->have_posts()) : ?>

        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php while ($query_featured->have_posts()) : $query_featured->the_post() ?>
                <div class="swiper-slide relative">

                    <?= the_post_thumbnail("medium_large", ["class" => "w-full aspect-video object-cover object-center", "style" => "max-width:100%;"]) ?>

                    <a class="absolute inset-0" style="background: rgb(0,0,0);background: linear-gradient(4deg, rgba(0,0,0,0.6589986336331408) 0%, rgba(0,0,0,0.6085784655659139) 18%, rgba(0,0,0,0) 100%);" href="<?= the_permalink() ?>">
                    </a>

                    <div class="absolute bottom-0 left-0 w-full text-white text-2xl font-bold p-4 cursor-pointer" onclick="location.href='<?= the_permalink() ?>'">
                        <a href="<?= esc_url(get_category_link(get_the_category()[0]->cat_ID)) ?>" class="bg-red-500 text-white text-xs px-2 py-1 mb-1 skew-div relative z-0 ml-4">
                            <?= get_the_category()[0]->name ?>
                        </a>
                        <h3><a href="<?= the_permalink() ?>" class="text-lg font-semibold"><?= the_title() ?></a></h3>
                    </div>


                </div>
            <?php endwhile ?>
        </div>

        <div class="swiper-pagination"></div>
        <!-- If we need scrollbar -->
        <!-- <div class="swiper-scrollbar"></div> -->
        <!-- <div class="swiper-progressbar"></div> -->
    <?php else : ?>
        <?php get_template_part("template-parts/content/content-empty") ?>
    <?php endif ?>
</div>
<?php wp_reset_postdata() ?>
