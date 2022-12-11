<article id="post-<?php the_ID(); ?>" class="flex flex-wrap container mx-auto" <?php post_class(); ?>>
    <div class="xl:basis-8/12 xl:pr-12">
        <div class="entry-header mb-4">
            <h1 class="entry-title text-xl lg:text-3xl font-bold leading-tight mb-2">
                <a href="<?= get_permalink() ?>"><?= the_title() ?></a>
            </h1>

            <div class="flex flex-wrap justify-between">

                <div class="flex flex-wrap">
                    <?php foreach (get_the_category() as $category) : ?>
                        <a href="<?= get_category_link($category) ?>" class="bg-red-500 rounded-sm text-white text-xs px-2 py-1 flex flex-wrap mb-1 w-fit skew-div relative z-0 ml-4"><?= $category->name ?></a>
                    <?php endforeach ?>
                </div>

                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>

            </div>
        </div>

        <?= the_post_thumbnail("medium_large", ["class" => "w-full aspect-video object-cover object-center mb-3", "style" => "max-width:unset;height:unset;aspect-ratio: 16/9;"]) ?>

        <div class="entry-content">
            <?php the_content(); ?>

            <?php
            wp_link_pages(
                array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'tailpress') . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'tailpress') . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                )
            );
            ?>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="xl:basis-4/12 ">
        <?php get_template_part("template-parts/sidebar/related_post") ?>
    </div>
    <!-- SIDEBAR END -->

</article>
