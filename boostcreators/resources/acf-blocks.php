<?php

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{
    // check function exists
    if (function_exists('acf_register_block_type')) {

        //Register an Gutenberg block.
        //The name of the block will be acf/header-met-informatie
        //https://www.advancedcustomfields.com/resources/acf_register_block_type/

        acf_register_block_type(array(
            'name'            => 'header',
            'title'           => __('Header'),
            'description'     => __('Header'),
            'render_callback' => 'my_acf_block_render_callback',
            'category'        => 'common',
            'icon'            => 'admin-comments',
            'align'           => 'full',
            'keywords'        => array('header'),
        ));
    }
}

function my_acf_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);
    echo App\template('blocks/' . $slug, ['block' => $block]);
}

//register custom block category
//https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
function my_plugin_block_categories($categories, $post)
{
    if ($post->post_type !== 'post') {
        return $categories;
    }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'my-category',
                'title' => __('My category', 'my-plugin'),
                'icon'  => 'wordpress',
            ),
        )
    );
}
add_filter('block_categories', 'my_plugin_block_categories', 10, 2);
