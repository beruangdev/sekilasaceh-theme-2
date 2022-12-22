<?php
$query_featured = $args["query_featured"];
?>

<?php if ($query_featured->have_posts()) : ?>
    <div class="splide_thumbnails_wrapper basis-full md:basis-8/12">

        <section class="splide main mb-2">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php while ($query_featured->have_posts()) : $query_featured->the_post() ?>
                        <li class="splide__slide">
                            <a href="<?= the_permalink() ?>">
                                <?= the_post_thumbnail("medium_large", ["class" => "aspect-video object-cover object-center", "style" => "max-width:100%; height: 100%"]) ?>
                            </a>

                            <div class="absolute bottom-0 left-0 w-full text-white text-2xl font-bold p-4 pt-6 cursor-pointer" style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.1) 10%, rgba(0,0,0,0.3) 30%, rgba(0,0,0,0.5) 100%);" onclick="location.href='<?= the_permalink() ?>'">
                                <a href="<?= esc_url(get_category_link(get_the_category()[0]->cat_ID)) ?>" class="bg-red-500 hover:bg-red-700 text-white hover:text-white hover:no-underline  text-xs px-2 py-1 mb-1 skew-div relative z-0 ml-4">
                                    <?= get_the_category()[0]->name ?>
                                </a>
                                <h3><a href="<?= the_permalink() ?>" class="text-lg font-semibold text-white hover:text-gray-200 hover:no-underline"><?= the_title() ?></a></h3>
                            </div>
                        </li>
                    <?php endwhile ?>
                </ul>
            </div>

            <!-- <div class="splide__progress">
                <div class="splide__progress__bar">
                </div>
            </div> -->

            <div class="absolute right-4 bottom-4">
                <button class="splide__toggle p-1 w-8 h-8 flex flex-wrap justify-center items-center rounded-full bg-red-700 hover:bg-red-800 text-white" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="splide__toggle__play">
                        <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="splide__toggle__pause">
                        <path fill-rule="evenodd" d="M6.75 5.25a.75.75 0 01.75-.75H9a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H7.5a.75.75 0 01-.75-.75V5.25zm7.5 0A.75.75 0 0115 4.5h1.5a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H15a.75.75 0 01-.75-.75V5.25z" clip-rule="evenodd" />
                    </svg>

                </button>
            </div>

        </section>

        <section class="splide thumbnail-slider">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php while ($query_featured->have_posts()) : $query_featured->the_post() ?>
                        <li class="splide__slide">
                            <?= the_post_thumbnail("thumbnail", ["class" => "aspect-[16/10] object-cover object-center", "style" => "max-width:100%; height: 100%"]) ?>
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
