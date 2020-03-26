<?php
function scaled_image_path($attachment_id, $size = 'thumbnail')
{
    $file = get_attached_file($attachment_id, true);
    if (empty($size) || $size === 'full') {
        // for the original size get_attached_file is fine
        return realpath($file);
    }
    if (!wp_attachment_is_image($attachment_id)) {
        return false; // the id is not referring to a media
    }
    $info = image_get_intermediate_size($attachment_id, $size);
    if (!is_array($info) || !isset($info['file'])) {
        return false; // probably a bad size argument
    }

    return realpath(str_replace(wp_basename($file), $info['file'], $file));
}

function check_if_webp_exists_image_src($url, $attachment_id,  $size, $icon)
{
    $url_new = is_array($url) ? $url[0] : $url;
    if (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) {
        $mime_type = get_post_mime_type($attachment_id);
        //check if file is no gif, pdf, svg
        if (strpos($mime_type, 'gif') === false && strpos($mime_type, 'pdf') === false && strpos($mime_type, 'svg') === false) {
            $path = scaled_image_path($attachment_id, $size);
            if (!$path) {
                return $url;
            }
            $ext             = pathinfo($url_new, PATHINFO_EXTENSION);
            $sourcewithoutext = str_replace('.' . $ext, '', $path);
            $webpurl         = str_replace($ext, 'webp', $url);
            if (is_file($sourcewithoutext . '.webp')) {
                return $webpurl;
            } else {
                create_webp($path);
                return $webpurl;
            }
        }
    }

    return $url;
}

function check_if_webp_exists($url, $post_id)
{
    if (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false) {
        $mime_type = get_post_mime_type($post_id);
        //check if file is no gif, pdf, svg
        if (strpos($mime_type, 'gif') === false && strpos($mime_type, 'pdf') === false && strpos($mime_type, 'svg') === false) {
            $uploaddirobject = wp_get_upload_dir();
            $uploaddir       = $uploaddirobject['basedir'];
            $metadata        = wp_get_attachment_metadata($post_id);
            $source          = $uploaddir . '/' . $metadata['file'];
            $ext             = pathinfo($url, PATHINFO_EXTENSION);
            $sourcewithoutext = str_replace('.' . $ext, '', $source);
            $webpurl         = str_replace($ext, 'webp', $url);
            if (is_file($sourcewithoutext . '.webp')) {
                return $webpurl;
            } else {
                create_webp($source);

                return $webpurl;
            }
        }
    }

    return $url;
}

add_filter('wp_get_attachment_image_src', __NAMESPACE__ . '\\check_if_webp_exists_image_src', 10, 4);

function create_webp($file)
{
    if (strpos($file, '.png') !== false) {
        $webp_dir = str_replace('.png', '.webp', $file);
        $output   = exec('cwebp -q 80 ' . $file . ' -o ' . $webp_dir . ' 2>&1 &');
        if (WP_DEBUG) {
            echo "<pre>$output</pre>";
        }
    }
    if (strpos($file, '.jpg') !== false) {
        $webp_dir = str_replace('.jpg', '.webp', $file);
        $output   = exec('cwebp -q 80 ' . $file . ' -o ' . $webp_dir . ' 2>&1 &');
        if (WP_DEBUG) {
            echo "<pre>$output</pre>";
        }
    }
}

//add image size 1600px for headers
add_image_size('1600px', 1600, 0, false);
