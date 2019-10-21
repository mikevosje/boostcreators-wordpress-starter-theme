<?php

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{
    // check function exists
    if (function_exists('acf_register_block_type')) {

        //Register an Gutenberg block.
        //The name of the block will be acf/header-met-informatie
        //https://www.advancedcustomfields.com/resources/acf_register_block_type/

        // acf_register_block_type(array(
        //     'name'            => 'header-met-informatie',
        //     'title'           => __('Header met informatie'),
        //     'description'     => __('Header met informatie'),
        //     'render_template' => 'blocks/header_met_informatie.php',
        //     'category'        => 'common', category, you can make these yourself, check the docs in the bottom of this file
        //     'icon'            => 'admin-comments',
        //     'align'           => 'full',
        //     'keywords'        => array('header', 'informatie'), search words
        // ));
    }
}
add_filter('allowed_block_types', 'misha_allowed_block_types');

function misha_allowed_block_types($allowed_blocks)
{
    global $post_ID;
    //if post ID === frontpage id, load only these blocks
    if ($post_ID === (int) get_option('page_on_front')) {
        return array(
            'acf/intro',
            'core/paragraph',
        );
        //if post type === example, load only these blocks
    } elseif (get_post_type() == 'example') {
        return array(
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/embed',
        );
        //in other pages, load these blocks
    } else {
        return array(
            'core/paragraph',
            'core/heading',
            'core/image',
            'core/embed',
            'core/list',
        );
    }
}

//callback function, do not remove or replace this
function my_acf_block_render_callback($block)
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(STYLESHEETPATH . "/template-parts/block/content-{$slug}.php")) {
        include(STYLESHEETPATH . "/template-parts/block/content-{$slug}.php");
    }
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
