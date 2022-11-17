<?php
function getCategoryPosts() {
    return new WP_Query([
        'paged' => get_query_var('paged') ?: 1,
        'category__in' => get_query_var( 'cat' ),
    ]);
}

function getCategoryChildren() {
    $cat_id = get_category( get_query_var( 'cat' ) );
    $cat_id = $cat_id->cat_ID;

    $sub_cats = get_categories([
        'parent' => $cat_id,
        'hide_empty' => 0,
    ]);

    if (!empty($sub_cats)) {
        return get_posts( [
            'category' =>  $sub_cats[0]->cat_ID
        ] );
    }

    return false;
}

function getCategoryLanding() {
    return get_categories( [
        'parent' => 0,
        'hide_empty' => 0,
        'orderby' => 'id'
    ]);
}

function custom_posts_per_page($query){
    if(is_category()){ $query->set('posts_per_page', 12); }
}
add_action('pre_get_posts','custom_posts_per_page');


function getSimilarPosts() {
    $category = get_the_category();
    return new WP_Query([
        'category__in' => $category[0]->term_id,
        'orderby' => 'rand',
        'posts_per_page' => 6,
        'post__not_in' => [get_the_ID()]
    ]);
}