<?php

// Change REST API url to WordPress URL
add_filter('rest_url', function ($url) {
    $url = str_replace(home_url(), site_url().'/index.php', $url);
    return $url;
});

// Enable featured image block
add_theme_support('post-thumbnails');

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

// Register Custom Post Type
function nothing_cpt_team_member()
{
    $labels = array(
        'name'                  => _x('Team Members', 'Post Type General Name', 'mainstage'),
        'singular_name'         => _x('Team Member', 'Post Type Singular Name', 'mainstage'),
        'menu_name'             => __('Team Members', 'mainstage'),
        'name_admin_bar'        => __('Team Member', 'mainstage'),
        'archives'              => __('Team Member Archives', 'mainstage'),
        'attributes'            => __('Team Member Attributes', 'mainstage'),
        'parent_item_colon'     => __('Parent Team Member:', 'mainstage'),
        'all_items'             => __('All Team Members', 'mainstage'),
        'add_new_item'          => __('Add New Team Member', 'mainstage'),
        'add_new'               => __('Add New', 'mainstage'),
        'new_item'              => __('New Team Member', 'mainstage'),
        'edit_item'             => __('Edit Team Member', 'mainstage'),
        'update_item'           => __('Update Team Member', 'mainstage'),
        'view_item'             => __('View Team Member', 'mainstage'),
        'view_items'            => __('View Team Members', 'mainstage'),
        'search_items'          => __('Search Team Member', 'mainstage'),
        'not_found'             => __('Not found', 'mainstage'),
        'not_found_in_trash'    => __('Not found in Trash', 'mainstage'),
        'featured_image'        => __('Featured Image', 'mainstage'),
        'set_featured_image'    => __('Set featured image', 'mainstage'),
        'remove_featured_image' => __('Remove featured image', 'mainstage'),
        'use_featured_image'    => __('Use as featured image', 'mainstage'),
        'insert_into_item'      => __('Insert into item', 'mainstage'),
        'uploaded_to_this_item' => __('Uploaded to this team member', 'mainstage'),
        'items_list'            => __('Team member list', 'mainstage'),
        'items_list_navigation' => __('Team members list navigation', 'mainstage'),
        'filter_items_list'     => __('Filter team members list', 'mainstage'),
    );
    $args = array(
        'label'                 => __('Team Member', 'mainstage'),
        'description'           => __('Mainstage Team Members', 'mainstage'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-users',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type('team_member', $args);
}
add_action('init', 'nothing_cpt_team_member', 0);
