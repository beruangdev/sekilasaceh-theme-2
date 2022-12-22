<li class="flex py-3 container-card-horizontal" id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
    <div class=" h-20 md:h-20 aspect-[1/1] flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
        <a href="<?= esc_url(get_permalink()) ?>">
            <?= the_post_thumbnail("thumbnail", ["class" => "w-full object-cover object-center", "style" => "width: 100%;height: 100%;max-width: 640px;object-fit: cover;object-position: center;"]) ?>
        </a>
    </div>

    <div class="ml-2 xl:ml-4 flex flex-1 flex-col">
        <div class="flex justify-between mb-auto">
            <a href="<?= esc_url(get_permalink()) ?>" class="entry-title text-base md:text-lg font-bold mb-1 w-full" rel="bookmark"><?= the_title() ?></a>
        </div>
        <div class="flex flex-wrap items-center">
            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-xs text-gray-400"><?= human_time_diff(get_the_time("G"), time()) ?></time>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mx-1 text-gray-400">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm6-2.438c0-.724.588-1.312 1.313-1.312h4.874c.725 0 1.313.588 1.313 1.313v4.874c0 .725-.588 1.313-1.313 1.313H9.564a1.312 1.312 0 01-1.313-1.313V9.564z" clip-rule="evenodd" />
            </svg>


            <?php foreach (get_the_category() as $category) : ?>
                <a href="<?= get_category_link($category) ?>" class="text-red-500 font-medium text-xs"><?= $category->name ?></a>
            <?php endforeach ?>
        </div>
    </div>
</li>
