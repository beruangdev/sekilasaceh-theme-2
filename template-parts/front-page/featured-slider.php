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

<div class="flex flex-wrap container">
    <!-- Slider main container -->
    <div class="swiper basis-full md:basis-8/12">
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
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->

            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div> -->
            <!-- <div class="swiper-button-next"></div> -->

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>

            <div class="swiper-progressbar"></div>
        <?php else : ?>
            <?php get_template_part("template-parts/content/content-empty") ?>
        <?php endif ?>
    </div>
    <?php wp_reset_postdata() ?>

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
                    <?= the_post_thumbnail("medium_large", ["class" => "w-full object-cover object-center", "style" => "width: 100%;height: 100%;max-width: 640px;object-fit: cover;object-position: center;"]) ?>

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


<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        // If we need pagination
        // pagination: {
        //     el: '.swiper-pagination',
        // },
        // Navigation arrows
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },

        pagination: {
            el: ".swiper-progressbar",
            type: "progressbar",
        },

        // And if we need scrollbar
        // scrollbar: {
        //     el: '.swiper-scrollbar',
        //     draggable: true,
        //     dragSize: 100,
        // },
    });
</script>
