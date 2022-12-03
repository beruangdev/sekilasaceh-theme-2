<?php
$the_query_featured = new \WP_Query([
    'posts_per_page'    => 5,
    'post_type' => 'post',
    "tag" => "featured",
]);
?>

<?php if ($the_query_featured->have_posts()) : ?>
    <!-- Slider main container -->
    <div class="swiper w-full max-w-[700px]">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php while ($the_query_featured->have_posts()) : $the_query_featured->the_post() ?>
                <div class="swiper-slide relative">

                    <?= the_post_thumbnail("medium_large", ["class" => "w-full aspect-video object-cover object-center"]) ?>

                    <a class="absolute inset-0" style="background: rgb(0,0,0);background: linear-gradient(4deg, rgba(0,0,0,0.6589986336331408) 0%, rgba(0,0,0,0.6085784655659139) 18%, rgba(0,0,0,0) 100%);" href="<?= the_permalink() ?>">
                    </a>


                    <div class="absolute bottom-0 left-0 w-full text-white text-2xl font-bold p-4">
                        <a href="<?= esc_url(get_category_link(get_the_category()[0]->cat_ID)) ?>" class="bg-red-500 rounded-sm text-white text-xs px-2 py-1 flex flex-wrap mb-1 w-fit">
                            <?= get_the_category()[0]->name ?>
                        </a>
                        <h2><a href="<?= the_permalink() ?>" class="text-lg font-semibold"><?= the_title() ?></a></h2>
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
    </div>

<?php endif ?>

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
