<?php

// Enable featured image block
add_theme_support( 'post-thumbnails' );

// Remove default thumbnail sizes
function nothing_remove_default_images($sizes)
{
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'nothing_remove_default_images');
