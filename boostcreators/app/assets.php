<?php

namespace App;

use WpGlide\WpGlide;

//add image size 1600px for headers
add_image_size('1600px', 1600, 0, false);
//add image size 1200px for headers
add_image_size('1200px', 1200, 0, false);

$format = strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false ? 'webp' : 'jpg';
$quality = strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false ? 80 : 90;

$wpGlide = WpGlide::getInstance();
$wpGlide->init(
    // Glide server config. See: http://glide.thephpleague.com/1.0/config/setup/
    [],

    // Base path. By default set to 'img/' and the final URL will look like so: http://example.com/BASE-PATH/SIZE-SLUG/image.jpg.
    'img/',

    // Path to WordPress upload directory. If not set the default upload directory will be used.
    ABSPATH
);
$wpGlide->addSize('full', [
    'q'  => $quality,
    'fm' => $format,
])->addSize('tablet', [
    'w' => 767,
    'q'  => $quality,
    'fm' => $format,
])->addSize('mobile', [
    'w' => 450,
    'q'  => $quality,
    'fm' => $format,
]);

add_filter('render_block', __NAMESPACE__ . '\\my_block_filter', 10, 3);
function my_block_filter($block_content, $block)
{
    if (is_admin()) {
        return $block_content;
    }

    if ($block['blockName'] === 'core/paragraph') {
        $content = "<div class='container my-5'>";
        $content .= $block_content;
        $content .= "</div>";

        return $content;
    }

    if ($block['blockName'] === 'core-embed/youtube' || $block['blockName'] === 'core-embed/vimeo') {
        $content = "<div class='container my-5'>";
        $content .= "<div class='embed-responsive embed-responsive-16by9'>";
        $content .= $block_content;
        $content .= "</div>";
        $content .= "</div>";

        return $content;
    }

    return $block_content;
}
