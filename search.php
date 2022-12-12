<?php

get_header();
?>
<div class="container mx-auto py-8">
    <div class="flex flex-wrap flex-col">
        <h1 class="page-title text-lg font-semibold">Hasil pencarian untuk <?= get_search_query() ?></h1>
        <p class="text-base">Terdapat <?= $wp_query->found_posts ?> hasil</p>
    </div>
    <div class="flex flex-wrap">
        <div class="basis-12/12 md:basis-8/12 ">
            <?php get_template_part("template-parts/content/content-search") ?>
        </div>

        <div class="basis-12/12 md:basis-4/12 md:block">
        </div>
    </div>
</div>

<?php
get_footer();
