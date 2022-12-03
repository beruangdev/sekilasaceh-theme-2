<article id="post-<?php the_ID(); ?>" class="flex flex-wrap container mx-auto" <?php post_class(); ?>>
    <div class="xl:basis-8/12 xl:pr-12">
        <div class="entry-header mb-4">
            <?php the_title(sprintf('<h1 class="entry-title text-xl lg:text-3xl font-bold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
        </div>

        <?= the_post_thumbnail("medium_large", ["class" => "w-full aspect-video object-cover object-center mb-3"]) ?>

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
    <div class="xl:basis-4/12 h-[500px] bg-yellow-700 hidden">

    </div>
    <!-- SIDEBAR END -->

</article>
