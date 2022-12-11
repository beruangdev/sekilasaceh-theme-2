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
<?php if ($query_related->have_posts()) : ?>
    <div class="pl-4 border-0 border-l border-solid border-gray-200">
        <div class="pl-5">
            <h3 class="bg-red-500 text-white text-base font-bold px-6 py-1 skew-div relative w-fit">
                Related
            </h3>
        </div>
        <ul role="list" class="my-2 divide-y divide-gray-200">
            <?php while ($query_related->have_posts()) : ?>
                <?php $query_related->the_post(); ?>
                <?php get_template_part('template-parts/components/card_horizontal_related', get_post_format()); ?>
            <?php endwhile; ?>
        </ul>
    </div>
<?php else : ?>
    <?php get_template_part("template-parts/content/content-empty") ?>
<?php endif; ?>
<?php wp_reset_postdata() ?>
