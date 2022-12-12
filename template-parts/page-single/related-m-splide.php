<?php $query_related = $args["query_related"] ?>
<div class="bg-gray-200 py-5">
    <div class="mb-3 pl-5">
        <h3 class="text-lg">
            RELATED
        </h3>
    </div>

    <?php if ($query_related->have_posts()) : ?>
        <div class="splide free-mode">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    $index = 0;
                    ?>
                    <?php while ($query_related->have_posts()) : ?>
                        <?php $query_related->the_post(); ?>

                        <li class="splide__slide">
                            <div class="flex flex-wrap flex-col">
                                <a href="<?= esc_url(get_permalink()) ?>" class="mb-2">
                                    <?= the_post_thumbnail("post-thumbnail", ["class" => "w-full object-cover object-center aspect-video", "style" => "max-width:unset;"]) ?>
                                </a>

                                <a href="<?= esc_url(get_permalink()) ?>" class="entry-title text-[0.8rem] font-semibold mb-1 w-full leading-5" rel="bookmark"><?= the_title() ?></a>

                                <div class="flex flex-wrap gap-4">
                                    <?php foreach (get_the_category() as $category) : ?>
                                        <a href="<?= get_category_link($category) ?>" class="text-xs mb-1 text-red-500 "><?= $category->name ?></a>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </li>
                        <?php
                        $index++;
                        ?>
                    <?php endwhile ?>
                </ul>
            </div>

            <!-- Add the progress bar element -->
            <div class="my-slider-progress">
                <div class="my-slider-progress-bar"></div>
            </div>
        </div>

    <?php else : ?>
        <?php get_template_part("template-parts/content/content-empty") ?>
    <?php endif; ?>
</div>
