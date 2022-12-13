<?php

/**
 * A template partial to output pagination for the Twenty Twenty default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$prev_text = sprintf(
    '%s <span class="nav-prev-text">%s</span>',
    '<span aria-hidden="true">&larr;</span>',
    /*
	 * Translators: This text contains HTML to allow the text to be shorter on small screens.
	 * The text inside the span with the class nav-short will be hidden on small screens.
	 */
    // __( 'Berita <span class="nav-short">terbaru</span>', 'twentytwenty' )
    ""
);
$next_text = sprintf(
    '<span class="nav-next-text">%s</span> %s',
    /*
	 * Translators: This text contains HTML to allow the text to be shorter on small screens.
	 * The text inside the span with the class nav-short will be hidden on small screens.
	 */
    "",
    // __('Older <span class="nav-short">Posts</span>', 'twentytwenty'),
    '<span aria-hidden="true">&rarr;</span>'
);

$next_text = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3">
<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
</svg>
';

$posts_pagination = get_the_posts_pagination(
    array(
        'mid_size'  => 3,
        'prev_text' => $prev_text,
        'next_text' => $next_text,
    )
);

// If we're not outputting the previous page link, prepend a placeholder with `visibility: hidden` to take its place.
if (strpos($posts_pagination, 'prev page-numbers') === false) {
    $posts_pagination = str_replace('<div class="nav-links grid grid-rows-1 grid-flow-col gap-3">', '<div class="nav-links grid grid-rows-1 grid-flow-col gap-3"><span class="prev page-numbers placeholder" aria-hidden="true">' . $prev_text . '</span>', $posts_pagination);
}

// If we're not outputting the next page link, append a placeholder with `visibility: hidden` to take its place.
if (strpos($posts_pagination, 'next page-numbers') === false) {
    $posts_pagination = str_replace('</div>', '<span class="next page-numbers placeholder" aria-hidden="true">' . $next_text . '</span></div>', $posts_pagination);
}

if ($posts_pagination) { ?>

    <div class="pagination-wrapper section-inner mt-3 flex flex-wrap justify-center items-center">

        <hr class="styled-separator pagination-separator is-style-wide" aria-hidden="true" />

        <?php echo $posts_pagination; ?>

    </div>
    <!-- .pagination-wrapper -->

<?php
}
