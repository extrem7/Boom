<?php

defined('ABSPATH') || exit;

if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();
$img = wp_prepare_attachment_for_js($post_thumbnail_id);
?>

<img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>">