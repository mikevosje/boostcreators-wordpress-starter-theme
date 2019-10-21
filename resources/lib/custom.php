<?php

function mytheme_setup()
{
    add_theme_support('align-wide');
}

add_action('after_setup_theme', 'mytheme_setup');

define('WPCF7_AUTOP', true);

// Move Yoast to bottom
function yoasttobottom()
{
    return 'low';
}

add_filter('wpseo_metabox_prio', 'yoasttobottom');

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', __NAMESPACE__ . '\\cc_mime_types');
