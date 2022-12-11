<li class="flex py-3" id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
    <div class="h-20 md:h-20 aspect-[1/1] flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
        <a href="<?= esc_url(get_permalink()) ?>">
            <?= the_post_thumbnail("post-thumbnail", ["class" => "w-full object-cover object-center", "style" => "width: 100%;height: 100%;max-width: 640px;object-fit: cover;object-position: center;"]) ?>
        </a>
    </div>

    <div class="ml-2 xl:ml-4 flex flex-1 flex-col">
        <div class="flex flex-wrap">
            <?php foreach (get_the_category() as $category) : ?>
                <a href="<?= get_category_link($category) ?>" class="bg-red-500 rounded-sm text-white text-xs px-1 py-1 flex flex-wrap mb-1 w-fit relative z-0"><?= $category->name ?></a>
            <?php endforeach ?>
        </div>
        <div class="flex justify-between text-sm font-medium text-gray-900 mt-auto">
            <a href="<?= esc_url(get_permalink()) ?>" class="entry-title text-xs md:text-base font-bold mb-1 w-full leading-5" rel="bookmark"><?= the_title() ?></a>
        </div>
        <div class="flex text-xs">
            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-xs text-gray-400"><?= human_time_diff( get_the_time("G"), time() ) ?></time>
        </div>
    </div>
</li>
