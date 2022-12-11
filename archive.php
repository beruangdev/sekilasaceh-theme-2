<?php
get_header();
$the_archive_title = "";
if (is_category()) {
    $the_archive_title = single_cat_title('', false);
} elseif (is_tag()) {
    $the_archive_title = single_tag_title('', false);
} elseif (is_author()) {
    $the_archive_title = '<span class="vcard">' . get_the_author() . '</span>';
} elseif (is_tax()) { //for custom post types
    $the_archive_title = sprintf(__('%1$s'), single_term_title('', false));
} elseif (is_post_type_archive()) {
    $the_archive_title = post_type_archive_title('', false);
}
$description = get_the_archive_description();
?>

<div class="container mx-auto py-8 md:pt-0">

    <header class="page-header alignwide mb-4 w-full flex flex-wrap items-center flex-col gap-6">
        <h3 class="bg-red-500 text-white text-2xl font-bold px-8 py-2 skew-div relative">
            <?= $the_archive_title ?>
        </h3>

        <?php if ($description) : ?>
            <div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
        <?php endif; ?>
    </header>

    <div class="flex flex-wrap">
        <div class="basis-12/12 md:basis-8/12 md:pr-8">
            <?php if (have_posts()) : ?>
                <ul role="list" class="my-6 divide-y divide-gray-200">
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <?php get_template_part('template-parts/components/card_horizontal', get_post_format()); ?>
                    <?php endwhile; ?>
                </ul>
                <?php get_template_part('template-parts/pagination'); ?>

            <?php else : ?>
                <?php get_template_part('template-parts/content/content-none'); ?>
            <?php endif; ?>
        </div>
        <div class="basis-12/12 md:basis-4/12 bg-red-600 md:block h-[0px] hidden"></div>
    </div>
</div>

<?php get_footer(); ?>
