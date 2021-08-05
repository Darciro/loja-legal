<?php

add_theme_support('post-thumbnails');


function my_excerpt_length($length){
    return 9;
}
add_filter('excerpt_length', 'my_excerpt_length');

function my_content_length($length){
    return 9;
}
add_filter('content_length', 'my_content_length');