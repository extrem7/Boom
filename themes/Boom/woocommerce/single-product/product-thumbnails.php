<?php

defined('ABSPATH') || exit;


if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
?>
<div class="product-thumbnails">
    <?
    $active = 'active';
    foreach ($attachment_ids as $id):
        $img = wp_prepare_attachment_for_js($id);
        ?>
        <div class="thumbnail <?= $active ?>"><img src="<?= $img['url'] ?>" alt="<?= $img['alt'] ?>"></div>
        <?
        $active = '';
    endforeach; ?>
</div>