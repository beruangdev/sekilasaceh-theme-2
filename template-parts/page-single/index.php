<article class="flex flex-wrap container mx-auto py-8">
    <!-- id="post-<?php the_ID(); ?>" class="flex flex-wrap" -->
    <!-- post_class("") -->

    <div class="lg:basis-8/12 lg:pr-12">


        <div class="entry-header mb-4">
            <h1 class="entry-title text-xl lg:text-3xl font-medium leading-tight mb-4">
                <?= the_title() ?>
            </h1>

            <div class="flex flex-wrap justify-between items-center">

                <div class="flex flex-wrap">
                    <?php foreach (get_the_category() as $category) : ?>
                        <a href="<?= get_category_link($category) ?>" class="bg-red-500 rounded-sm text-white text-xs px-1 py-1 flex flex-wrap mb-1 w-fit skew-div relative z-0 ml-4"><?= $category->name ?></a>
                    <?php endforeach ?>
                </div>

                <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-xs text-gray-400"><?php echo get_the_date(); ?></time>

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

    <?php
    $args  = array(
        'posts_per_page' => 10,
        'post_type' => 'post',
        'post_status' => 'publish',
        'tax_query' => buildTaxonomyForRelatedPosts90238793278346723(get_post()),
    );
    $query_related = new WP_Query($args);
    function buildTaxonomyForRelatedPosts90238793278346723(WP_Post $post)
    {
        switch ($post->post_type) {
            case 'post':
                $taxonomies = ['category', 'post_tag'];
                break;
            case 'news':
                $taxonomies = ['newscategory', 'newstags'];
                break;
            default:
                return [];
        }

        $taxQuery = [
            'relation' => 'OR',
        ];

        foreach ($taxonomies as $taxonomy) {
            $taxQuery[] = [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => array_filter(wp_get_object_terms($post->ID, $taxonomy, ['fields' => 'slugs']), function ($termSlug) {
                    return strtolower($termSlug) !== 'uncategorized';
                }),
            ];
        }

        return $taxQuery;
    }
    ?>
    <?php wp_reset_postdata() ?>
    <!-- SIDEBAR -->
    <div class="lg:basis-4/12 max-w-[-webkit-fill-available]">
        <!-- Releated -->
        <div class="hidden lg:block">

            <?php get_template_part("template-parts/page-single/related", null, compact("query_related")) ?>
        </div>
        <!-- Releated Mobile -->
        <div class="block lg:hidden">
            <?php get_template_part("template-parts/page-single/related-m-splide", null, compact("query_related")) ?>
        </div>
        <!-- Related END -->
    </div>
    <!-- SIDEBAR END -->

</article>
