<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  

// funtions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well

add_action('after_setup_theme', function(){
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
});

// Main switch to get fontend assets from a Vite dev server OR from production built folder
// it is recommeded to move it into wp-config.php

include "inc/inc.vite.php";
include "inc/template-function.php";
include "inc/template-tags.php";
